@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Account Information</div>
                <div class="panel-body">

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

                      <div class="form-group">
                        <label for="gender" class="col-md-4 control-label">Gender</label>
                          @if($user->gender == "NA")
                            Not Specified
                          @else
                            {{$user->gender}}
                          @endif
                      </div>

                      <div class="panel-footer">
                          <a href="account/edit"><button class="btn btn-block btn-success" id="button"><span class="semibold">Edit Profile</span></button></a>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Shipping Addresses</div>
                @if ($shipping->count() > 0)
                @foreach ($shipping as $address)
                <div class="panel-body">
                  <div class="form-group">
                    <label for="street" class="col-md-4 control-label">Ship to:</label>
                      {{$address->name}}
                  </div>

                  <div class="form-group">
                    <label for="street" class="col-md-4 control-label">Street</label>
                      {{$address->street}}
                  </div>

                  <div class="form-group">
                    <label for="city" class="col-md-4 control-label">City, State</label>
                      {{$address->city}}, {{$address->state}}
                  </div>

                  <div class="form-group">
                    <label for="zipcode" class="col-md-4 control-label">Zipcode</label>
                      {{$address->zipcode}}
                  </div>
                </div>
                <div class="panel-footer">
                    <a href="account/address/edit/{{$address->id}}"><button class="btn btn-block btn-success" id="button"><span class="semibold">Edit this Address</span></button></a>
                </div>
                @endforeach
                @endif

                    <div class="panel-footer">
                       <a href="/account/address">Add a shipping address</a>
                    </div>


            </div>
        </div>
    </div>
</div>

@endsection
