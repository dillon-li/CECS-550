@extends('layouts.app')

@section('content')

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
                            <label for="name" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label">Upload Product Image:</label>
                          <div class="col-md-6">
                            <input type="file" name="img" id="img">
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                              <img id="preview" style="display:none; max-width:100%; max-height:100%" />
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
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
