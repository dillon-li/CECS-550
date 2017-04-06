@extends('layouts.app')

@section('content')

<style>
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: text;
    appearance: none;
    margin: 0;
}
input[type=number] {
  -moz-appearance:textfield;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center">Edit your product</div>
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

                        <div class="form-group{{ $errors->has('caption') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Caption</label>

                            <div class="col-md-6">
                                <input id="caption" type="text" class="form-control" name="caption" value="{{ $product->caption }}" required autofocus>

                                @if ($errors->has('caption'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('caption') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea rows="4" cols="50" class="form-control" name="description" required autofocus>{{ $product->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tags (comma separated): </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tags" value="{{ $product->metadata->tags }}" placeholder="ex. hoodies,winter,cards" required autofocus>

                                @if ($errors->has('tags'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr><hr>

                        @foreach($skus as $sku)

                        <div class="form-group">
                          <label class="col-md-4 control-label">Current Image:</label>
                          <div class="col-md-6">
                            <img style="width:250px; height:250px; text-align:center; vertical-align:middle" src={{$sku->metadata->img_path}}></img>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label">Upload Different Product Image</label>
                          <div class="col-md-6">
                            <input type="file" name="{{$sku->id.'img'}}" id="img">
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sku_description" value="{{ old('sku_description') }}" placeholder="ex. Red, black, small, large, etc." required autofocus>

                                @if ($errors->has('sku_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sku_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                            <label for="stock" class="col-md-4 control-label">Current Stock of this Variation:</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="{{$sku->id.'stock'}}" value="{{ $sku->inventory->quantity }}" required autofocus>

                                @if ($errors->has('stock'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stock') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label">Price</label>

                          <div class="col-md-6">
                            <input type="number" step="any" class="form-control" name="{{$sku->id.'price'}}" placeholder="ex. 12.00" value="{{ $sku->price / 100 }}">

                            @if ($errors->has('price'))
                            <span class="help-block">
                              <strong>{{ $errors->first('price') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>

                        <hr><hr>

                        @endforeach

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
