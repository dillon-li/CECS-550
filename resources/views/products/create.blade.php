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
                <div class="panel-heading" style="text-align:center">Create a new product</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/product/create') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Caption</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="caption" value="{{ old('caption') }}" required autofocus>

                                @if ($errors->has('caption'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('caption') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea rows="4" cols="50" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="clone">
                        <div class="form-group">
                          <label class="col-md-4 control-label">Upload Product Image:</label>
                          <div class="col-md-6">
                            <input type="file" name="img[]" id="img">
                          </div>
                        </div>

                        <!-- Image Preview
                        <div class="form-group">
                          <label class="col-md-4 control-label"></label>
                              <div class="col-md-6">
                                <img id="preview" style="display:none; max-width:100%; max-height:100%" />
                              </div>
                        </div>
                      -->


                        <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                            <label for="stock" class="col-md-4 control-label">Current Stock of this Variation:</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="stock[]" value="{{ old('stock') }}" required autofocus>

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
                            <input type="number" step="any" class="form-control" name="price" placeholder="ex. 12.00" value="{{ old('price') }}">

                            @if ($errors->has('price'))
                            <span class="help-block">
                              <strong>{{ $errors->first('price') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>
                      </div>

                        <div class="form-group" id="variation">
                          <div class="col-md-6 col-md-offset-4">
                            <button type="button" class="btn btn-primary" onclick="addFields()">
                              <i class="fa fa-btn"></i> Add Another Variation
                            </button>
                          </div>
                        </div>

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-block btn-success" id="button"><span class="semibold">Add Product</span></button>
                        </div>

                    </form>

                    <script type="text/javascript">
                    function preview(input) {
                      if (input.files && input.files[0]) {
                        var freader = new FileReader();
                        freader.onload = function (e) {
                          $("#preview").show();
                          $('#preview').attr('src', e.target.result);
                        }
                        freader.readAsDataURL(input.files[0]);
                      }
                    }

                    $("#img").change(function(){
                      preview(this);
                    });

                    /*
                    function addVariation()
                    {
                      $("#clone" + $count).show();
                      $count = $count + 1;
                      if ($count > 4)
                      {
                        $("#variation").hide();
                      }
                    } */

                    function addFields() {
                      $('#clone').last().clone({
                        withDataAndEvents: true
                      }).insertBefore('#variation').find("input").val("").end();
                    }


                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
