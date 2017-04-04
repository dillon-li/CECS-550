@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Shopping Cart</div>
                <div class="panel-body">
                  @if ($content->count() == 0)
                    Your shopping cart is empty
                  @else
                        <?php // dd($content); ?>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($content as $cartItem)
                              <tr>
                                <td>
                                  <img style="width:250px; height:250px; text-align:center; vertical-align:middle" src={{$cartItem->pic}}></img>
                                </td>
                                <td>{{ $cartItem->name }}</td>
                                <td>{{ $cartItem->price / 100 }}</td>
                                <td>{{ $cartItem->qty }}</td>
                                <td><a href="/cart/delete/{$cartItem->rowId}"> Remove Item </a></td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                      </div>

                      <hr>

                      Your Subtotal: ${{ $subtotal }}
                      <div class="panel-footer">
                        <a href="/cart/payment"
                          <button type="button" class="btn btn-block btn-success" id="button"><span class="semibold">Proceed to Checkout</span></button>
                        </a>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
