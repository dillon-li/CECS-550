@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Account Information</div>
                <div class="panel-body">
                        {{ csrf_field() }}

                      <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Name</label>
                          {{$user->name}}
                      </div>

                      <div class="form-group">
                        <label for="username" class="col-md-4 control-label">Username</label>
                          {{$user->username}}
                      </div>

                      <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Email</label>
                          {{$user->email}}
                      </div>

                      @if ($shipping->count() == 0)
                      <div class="form-group">
                        <label for="zipcode" class="col-md-4 control-label">Address</label>
                          <a href="/account/address">Add a shipping address</a>
                      </div>
                      @endif

                </div>
            </div>
        </div>
    </div>
</div>

@if ($shipping->count() > 0)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Shipping Addresses</div>
                @foreach ($shipping as $address)
                <div class="panel-body">
                  <div class="form-group">
                    <label for="street" class="col-md-4 control-label">Street</label>
                      {{$shipping->street}}
                  </div>

                  <div class="form-group">
                    <label for="city" class="col-md-4 control-label">City, State</label>
                      {{$shipping->city}}, {{$shipping->state}}
                  </div>

                  <div class="form-group">
                    <label for="zipcode" class="col-md-4 control-label">Zipcode</label>
                      {{$shipping->zipcode}}
                  </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

@endsection
