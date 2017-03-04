@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center">Create a new product</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $product->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="description" value="{{ $product->caption }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label"></label>
                          <img style="width:250px; height:250px; text-align:center; vertical-align:middle" src={{$product->metadata->img_path}}></img>
                        </div>

                        <!--
                        <div class="form-group">
                          <label class="col-md-4 control-label">Upload Different Product Image:</label>
                          <div class="col-md-6">
                            <input type="file" name="img">
                          </div>
                        </div>
                      -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-block btn-success" id="button"><span class="semibold">Edit Product</span></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
