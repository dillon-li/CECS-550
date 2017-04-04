@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Order Summary</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/cart/payment') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th></th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Quantity</th>
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
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label"></label>
                          <a href="/cart">
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-btn fa-pencil"></i> Edit Order
                              </button>
                            </a>
                      </div>

                      <hr><hr>
                      <div class="form-group">
                          <label class="col-md-4 control-label">Your Subtotal:</label>

                          <div class="col-md-6">
                            ${{ $subtotal }}
                          </div>
                      </div>



                      <div class="panel-footer">
                        <script
                          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                          data-key={{env('STRIPE_KEY')}}
                          data-amount={{$total_cents}}
                          data-name="Stripe.com"
                          data-description="Widget"
                          data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                          data-locale="auto"
                          data-zip-code="true">
                        </script>
                      </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
