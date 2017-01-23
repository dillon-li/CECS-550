@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('account/address/add') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="street" class="col-md-4 control-label">Street</label>

                            <div class="col-md-6">
                                <input id="city" class="form-control" name="street" value="{{ old('street') }}" required autofocus>

                                @if ($errors->has('street'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="city" class="col-md-4 control-label">City</label>

                        <div class="col-md-6">
                          <input id="city" class="form-control" name="city" value="{{ old('city') }}" required autofocus>

                          @if ($errors->has('city'))
                          <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                          <label for="state" class="col-md-4 control-label">State</label>

                          <div class="col-md-6">
                              <input id="state" class="form-control" name="state" required>

                              @if ($errors->has('state'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('state') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="zipcode" class="col-md-4 control-label">Zip Code</label>

                            <div class="col-md-6">
                                <input id="zipcode" class="form-control" name="zipcode" required>

                                @if ($errors->has('zipcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Shipping Address
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
