@extends('layouts.app')

@section('content')

<!-- What Admin Sees -->
@if(Auth::user()->role == 'admin')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List of Active Users</div>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users_all as $user)
                          <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            @if(Auth::user()->role != 'admin')
                            <td>
                              <a href="/account/{{$user->id}}/ban" onclick="return confirm('Are you sure you want to ban this account?')">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-btn fa-trash"></i> Ban
                                </button>
                              </a>
                            </td>
                            @endif
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- What normal member sees -->
@else
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Past Orders</div>

                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Some stuff here</div>

                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Some stuff here</div>

                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endif



@endsection
