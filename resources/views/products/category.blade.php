@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center">Viewing Products in {{$category}}</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form">

                  @if ($products != 0)

                  @foreach($products as $product)
                  <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-6">
                        <a href="/product/{{$product->id}}"><img style="width:250px; height:250px; text-align:center; vertical-align:middle" src={{$product->metadata->img_path}}></img></a>
                    </div>
                  </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name:</label>
                            <div class="col-md-6">
                              <a href="/product/{{$product->id}}">
                                {{ $product->name }}
                              </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Caption:</label>
                            <div class="col-md-6">
                                {{ $product->caption }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Description:</label>
                            <div class="col-md-6">
                              {{ $product->description }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Price</label>
                            <div class="col-md-6">
                              ${{ $product->skus->data[0]->price / 100}}
                            </div>
                        </div>
                      @endforeach

                    @else

                    There are no products in this category yet

                    @endif

                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
