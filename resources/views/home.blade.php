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
                            @if($user->role != 'admin')
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

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List of Products</div>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Caption</th>
                            <th>Picture</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($products as $product)
                            <td><a href="/product/{{$product->id}}">{{$product->name}}</a></td>
                            <td>{{$product->caption}}</td>
                            <td>
                              <img style="width:250px; height:250px; text-align:center; vertical-align:middle" src={{$product->metadata->img_path}}></img>
                            </td>
                            <td>
                              <a href="/product/{{$product->id}}/edit">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil"></i> Edit
                                </button>
                              </a>
                              <a href="/product/{{$product->id}}/delete" onclick="return confirm('Are you sure you want to delete this product?')">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-btn fa-trash"></i> Delete
                                </button>
                              </a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                    <a href="/product/create">
                      <button type="button" class="btn btn-primary">
                          <i class=""></i> Create New Product
                      </button>
                    </a>
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
                <div class="panel-heading">Your Past Orders</div>
                  @if(isset($charges))
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Transaction ID</th>
                          <th>Description</th>
                          <th>No. Items Purchased</th>
                          <th>Amount Charged</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($charges["data"] as $charge)
                          <tr>
                            <td>{{$charge->id}}</td>
                            <td>{{$charge->description}}</td>
                            <td></td>
                            <td>{{$charge->amount / 100}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                  @else
                    You have not ordered anything.
                  @endif
                <div class="panel-body">

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
