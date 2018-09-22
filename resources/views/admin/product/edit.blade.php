@extends('layouts.backend.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit Product                            
                        </h2>
                    </div>
                    <div class="body">
                        <form method="POST" action="{{ route('admin.updateproduct') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="category">Product Category</label>
                                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <select name="category" class="form-control show-tick" data-live-search="true">
                                                <option value="">-- Please select category --</option>
                                                @if($categoryList)
                                                    @foreach($categoryList as $key => $category)
                                                        <option value="{{ $key }}" {{ $key == $product->category_id ? 'selected' : ''}}> {{ $category }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @if ($errors->has('category'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('category') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="productname">Product Name</label>
                                    <div class="form-group{{ $errors->has('productname') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="text" id="productname" class="form-control" name="productname" value="{{ $product->productname }}">
                                        </div>
                                        @if ($errors->has('productname'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('productname') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="productcode">Product Code</label>
                                    <div class="form-group{{ $errors->has('productcode') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="text" id="username" class="form-control" name="productcode" value="{!! $product->productcode !!}" disabled="disabled">
                                        </div>
                                        @if ($errors->has('productcode'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('productcode') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{!! $product->id !!}" >
                                <div class="col-sm-6">
                                    <label for="productimage">Product Image</label>
                                    <div class="form-group{{ $errors->has('productimage') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="file" id="productimage" class="form-control" name="productimage">
                                        </div>
                                        @if ($errors->has('productimage'))
                                        <small class="alert alert-warning">
                                            {{ $errors->first('productimage') }}
                                        </small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label for="description">Product Description</label>
                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <textarea name="description" rows="4" class="form-control no-resize" >{!! $product->description !!}</textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('description') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <label for="password">Purchase Price</label>
                                    <div class="input-group spinner{{ $errors->has('purchaseprice') ? ' has-error' : '' }}" data-trigger="spinner">
                                        <div class="form-line">
                                            <input name="purchaseprice" type="text" class="form-control text-center" value="{!! $product->purchaseprice !!}" data-rule="currency">
                                        </div>
                                        <span class="input-group-addon">
                                            <a href="javascript:;" class="spin-up" data-spin="up"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                            <a href="javascript:;" class="spin-down" data-spin="down"><i class="glyphicon glyphicon-chevron-down"></i></a>
                                        </span>
                                        @if ($errors->has('purchaseprice'))
                                        <small class="alert alert-warning">
                                            {{ $errors->first('purchaseprice') }}
                                        </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="bodyrate">Body Rate</label>
                                    <div class="input-group spinner{{ $errors->has('bodyrate') ? ' has-error' : '' }}" data-trigger="spinner">
                                        <div class="form-line">
                                            <input name="bodyrate" type="text" class="form-control text-center" value="{!! $product->bodyrate !!}" data-rule="currency">
                                        </div>
                                        <span class="input-group-addon">
                                            <a href="javascript:;" class="spin-up" data-spin="up"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                            <a href="javascript:;" class="spin-down" data-spin="down"><i class="glyphicon glyphicon-chevron-down"></i></a>
                                        </span>
                                        @if ($errors->has('bodyrate'))
                                        <small class="alert alert-warning">
                                            {{ $errors->first('bodyrate') }}
                                        </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="salesprice">Sales Price</label>
                                    <div class="input-group spinner{{ $errors->has('salesprice') ? ' has-error' : '' }}" data-trigger="spinner">
                                        <div class="form-line">
                                            <input name="salesprice" type="text" class="form-control text-center" value="{!! $product->salesprice !!}" data-rule="currency">
                                        </div>
                                        <span class="input-group-addon">
                                            <a href="javascript:;" class="spin-up" data-spin="up"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                            <a href="javascript:;" class="spin-down" data-spin="down"><i class="glyphicon glyphicon-chevron-down"></i></a>
                                        </span>
                                        @if ($errors->has('salesprice'))
                                        <small class="alert alert-warning">
                                            {{ $errors->first('salesprice') }}
                                        </small>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <label for="discount">Discount</label>
                                    <div class="input-group spinner{{ $errors->has('discount') ? ' has-error' : '' }}" data-trigger="spinner">
                                        <div class="form-line">
                                            <input name="discount" type="text" class="form-control text-center" value="{!! $product->discount !!}" data-rule="currency">
                                        </div>
                                        <span class="input-group-addon">
                                            <a href="javascript:;" class="spin-up" data-spin="up"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                            <a href="javascript:;" class="spin-down" data-spin="down"><i class="glyphicon glyphicon-chevron-down"></i></a>
                                        </span>
                                        @if ($errors->has('discount'))
                                        <small class="alert alert-warning">
                                            {{ $errors->first('discount') }}
                                        </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="totalstock">Total Stock</label>
                                    <div class="form-group{{ $errors->has('totalstock') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="text" id="totalstock" class="form-control"  name="totalstock" value="{!! $product->totalstock !!}">
                                        </div>
                                        @if ($errors->has('totalstock'))
                                        <small class="alert alert-warning">
                                            {{ $errors->first('totalstock') }}
                                        </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="productunit">Product unit</label>
                                    <div class="form-group{{ $errors->has('productunit') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <select name="productunit" class="form-control show-tick">
                                                <option value="">-- Please select productunit --</option>
                                                @if($unitList)
                                                    @foreach($unitList as $key => $unit)
                                                        <option value="{{ $key }}" {{ $key == $product->productunit ? 'selected' : ''}}> {{ $unit }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @if ($errors->has('productunit'))
                                        <small class="alert alert-warning">
                                            {{ $errors->first('productunit') }}
                                        </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="availability">Availability</label>
                                    <div class="form-group{{ $errors->has('availability') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <select name="availability" class="form-control show-tick">
                                                <option value="">-- Please select availability --</option>
                                                <option value="1" {{ '1' == $product->availability ? 'selected' : ''}}>In Stock</option>
                                                <option value="0" {{ '0' == $product->availability ? 'selected' : ''}}>Outof Stock</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('availability'))
                                        <small class="alert alert-warning">
                                            {{ $errors->first('availability') }}
                                        </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="supplier">Purchasd From</label>
                                    <div class="form-group{{ $errors->has('supplier') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <select name="supplier" class="form-control show-tick" data-live-search="true">
                                                <option value="">-- Please select supplier --</option>
                                                <option value="1">Abdur Rahman</option>
                                                <option value="2">Barkat Ullah</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('supplier'))
                                        <small class="alert alert-warning">
                                            {{ $errors->first('supplier') }}
                                        </small>
                                        @endif
                                    </div>

                                </div>
                            </div>

                            <br>
                            <button type="submit" class="btn bg-teal m-t-15 waves-effect">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('javascript')
    <script src="{{ asset('assets/backend/plugins/jquery-spinner/js/jquery.spinner.js') }}"></script>
@endsection

@section('css')
<link href="{{ asset('assets/backend/plugins/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet" />

@endsection