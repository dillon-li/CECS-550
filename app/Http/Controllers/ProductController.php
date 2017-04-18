<?php

namespace CECS550\Http\Controllers;

use Illuminate\Http\Request;
use File;
use CECS550\Product;

class ProductController extends Controller
{
    public function createPage()
    {
      return view('products.create');
    }

    public function create(Request $request)
    {
  /*    $this->validate($request, [
        'name' => 'required',
        'description' => 'required',
        'img' => 'required|max:100000|mimes:jpg,png,gif'
      ]); */

      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      $attributes = ["pic"];

      $files = $request->file('img');

      $filename = str_slug(preg_replace('/\s+/', '', $request->name).'_PRODUCT.'.$files[0]->getClientOriginalExtension());
      $files[0]->move(base_path().'/public/images/products/'.preg_replace('/\s+/', '', $request->name).'/', $filename);
      $filepath = '/images/products/'.$request->name.'/'.$filename;
      $filepath = preg_replace('/\s+/', '', $filepath);

      // Create Product
      $product = \Stripe\Product::create(array(
        "name" => $request->name,
        "caption" => $request->caption,
        "description" => $request->description,
        "attributes" => $attributes,
        "metadata" => [
          "img_path" => $filepath,
          "tags" => $request->tags
        ]));

        switch ($request->category) {
          case "Headgear":
            $category_pic = base_path().'/public/images/categories/cap.jpg';
            break;
          case "Pants":
            $category_pic = base_path().'/public/images/categories/pants2.jpg';
            break;
          case "Shirts":
            $category_pic = base_path().'/public/images/categories/tees.jpg';
            break;
          case "Footwear":
            $category_pic = base_path().'/public/images/categories/footware1.jpg';
            break;
          case "Miscellaneous":
            $category_pic = base_path().'/public/images/categories/tees7.jpg';
            break;
        }

        Product::create([
          'name' => $request->name,
          'stripe_id' => $product->id,
          'category' => $request->category,
          'category_pic' => $category_pic
        ]);

        $sku = \Stripe\SKU::create(array(
          "product" => $product->id,
          "price" => $request->price[0] * 100,
          "inventory" => array(
            "type" => "finite",
            "quantity" => $request->stock[0]
          ),
          "attributes" => array(
            "pic" => $filepath
          ),
          "currency" => "usd",
          "metadata" => [
            "img_path" => $filepath,
            "description" => $request->sku_description[0]
            ]));
      // Create SKUs
      $count = 0;
      foreach ($files as $file)
      {
        if ($count != 0) {
          $filename = str_slug(preg_replace('/\s+/', '', $request->name).$count.$file->getClientOriginalExtension());
          $file->move(base_path().'/public/images/products/'.preg_replace('/\s+/', '', $request->name).'/', $filename);
          $filepath = '/images/products/'.$request->name.'/'.$filename;
          $filepath = preg_replace('/\s+/', '', $filepath);

          $sku = \Stripe\SKU::create(array(
            "product" => $product->id,
            "price" => $request->price[$count] * 100,
            "inventory" => array(
              "type" => "finite",
              "quantity" => $request->stock[$count]
            ),
            "attributes" => array(
              "pic" => $filepath
            ),
            "currency" => "usd",
            "metadata" => [
              "img_path" => $filepath,
              "description" => $request->sku_description[$count]
              ]));
            }
          $count = $count + 1;
      }

      return redirect()->action('HomeController@index');
    }

    public function delete($id)
    {
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      $product = \Stripe\Product::retrieve($id);
      foreach ($product->skus->data as $sku) {
        $sku = \Stripe\SKU::retrieve($sku->id);
        $sku->delete();
      }
      $product->delete();

      $product_db = Product::where('stripe_id', $id)->first();
      $product_db->delete();

      return redirect()->action('HomeController@index');
    }

    public function editPage($id)
    {
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      $product = \Stripe\Product::retrieve($id);
      $skus = $product->skus->data;
      $details = [
        "product" => $product,
        "skus" => $skus
      ];
      return view('products.edit')->with($details);
    }

    public function edit($id, Request $request)
    {
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      $product = \Stripe\Product::retrieve($request->id);
      $skus = $product->skus->data;
      $product["name"] = $request->name;
      $product["caption"] = $request->caption;
      $product["description"] = $request->description;
      $product->metadata["tags"] = $request->tags;
      $product->save();

      switch ($request->category) {
        case "Headgear":
          $category_pic = base_path().'/public/images/categories/cap.jpg';
          break;
        case "Pants":
          $category_pic = base_path().'/public/images/categories/pants2.jpg';
          break;
        case "Shirts":
          $category_pic = base_path().'/public/images/categories/tees.jpg';
          break;
        case "Footwear":
          $category_pic = base_path().'/public/images/categories/footware1.jpg';
          break;
        case "Miscellaneous":
          $category_pic = base_path().'/public/images/categories/tees7.jpg';
          break;
      }

      $product_db = Product::where('stripe_id', $request->id)->first();
      $product_db['category'] = $request->category;
      $product_bd['category_pic'] = $category_pic;
      $product_db->save();

      foreach ($skus as $sku)
      {
        if ($request->hasFile($sku->id.'img'))
        {
          $file = $request->file($sku->id.'img');
          $filename = preg_replace('/\s+/', '', $request->name)."/".$sku->id.".".$file->getClientOriginalExtension();
          $path = base_path().'/public/images/products';
          $filepath = '/images/products/'.$filename;
          $filepath = preg_replace('/\s+/', '', $filepath);
          if(file_exists($filepath))
          {
            File::delete($filepath);
          }
          $file->move(base_path().'/public/images/products/'.preg_replace('/\s+/', '', $request->name).'/', $filename);
          $sku->metadata->img_path = $filepath;
        }
        $pricestr = $sku->id.'price';
        $invstr = $sku->id.'stock';
        $sku["price"] = $request->$pricestr * 100;
        $sku->inventory["quantity"] = $request->$invstr;
        $sku->metadata->description = $request->sku_description;
        $sku->save();
      }

      return redirect()->action('HomeController@index');
    }

    public function view($id)
    {
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      $product = \Stripe\Product::retrieve($id);
      $skus = $product->skus->data;

      $details = [
        "product" => $product,
        "skus" => $skus
      ];

      return view('products.individual')->with($details);
    }

    public function viewCategory($category)
    {
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      $products_db = Product::where('category', $category)->get();
      if ($products_db->count() == 0)
      {
        $products = 0;
      }
      else {
        $count = 0;
        foreach ($products_db as $p)
        {
          $products[$count] = \Stripe\Product::retrieve($p->stripe_id);
          $count++;
        }
      }

      $details = [
        "products" => $products,
        "category" => $category
      ];

      return view('products.category')->with($details);
    }

    public function viewAll()
    {
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      $products = \Stripe\Product::all();

      $details = [
        "products" => $products['data'],
        "category" => "All"
      ];

      return view('products.category')->with($details);
    }

}
