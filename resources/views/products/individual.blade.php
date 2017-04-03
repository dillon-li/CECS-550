@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center">Product ID: {{$product->id}}</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form">

                  <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-6">
                      <img style="width:250px; height:250px; text-align:center; vertical-align:middle" src={{$product->metadata->img_path}}></img>
                    </div>
                  </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name:</label>
                            <div class="col-md-6">
                                {{ $product->name }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Caption:</label>
                            <div class="col-md-6">
                                {{ $product->caption }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Description:</label>
                            <div class="col-md-6">
                              {{ $product->description }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Price:</label>
                            <div class="col-md-6">
                              {{ $skus[0]->price / 100}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Current Stock:</label>
                            <div class="col-md-6">
                              {{ $skus[0]->inventory->quantity }}
                            </div>
                        </div>

                        <?php $x = 0; ?>
                        @foreach($skus as $sku)
                          @if($x != 0)
                          <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                              <img style="width:250px; height:250px; text-align:center; vertical-align:middle" src={{$sku->metadata->img_path}}></img>
                            </div>
                          </div>

                          <div class="form-group">
                              <label for="name" class="col-md-4 control-label">Price:</label>
                              <div class="col-md-6">
                                {{ $sku->price / 100}}
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="name" class="col-md-4 control-label">Current Stock:</label>
                              <div class="col-md-6">
                                {{ $sku->inventory->quantity }}
                              </div>
                          </div>
                          @endif
                          <?php $x = 10; ?>
                        @endforeach

                        <div class="form-group">
                          <label class="col-md-4 control-label"></label>
                          <div class="col-md-6">
                            <img id="preview" style="display:none; max-width:100%; max-height:100%" />
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
