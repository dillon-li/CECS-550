@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Your Information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('account/edit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="username" value="{{ $user->username }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>
                              <div class="col-md-6">
                                  <label class="radio-inline"><input type="radio" name="gender" value="Male" @if($user->gender == "Male") checked="checked" @endif required>Male</label>
                                  <label class="radio-inline"><input type="radio" name="gender" value="Female" @if($user->gender == "Female") checked="checked" @endif>Female</label>
                                  <label class="radio-inline"><input type="radio" name="gender" value="NA" @if($user->gender == "NA") checked="checked" @endif>Not Specified</label>
                                  @if ($errors->has('gender'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('gender') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-block btn-success" id="button"><span class="semibold">Save</span></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
