@extends('layouts.backend.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12 col-sm-12">
            	<div class="card">
                    <div class="header">
                        <h2>
                            Product Details                           
                        </h2>
                    </div>
	            	<div class="body table-responsive">
	                    <table class="table">
	                        <tbody>
                                
                                    <tr><td><b>{!! title_case('productname') !!}</b>:</td><td>{!! $product->productname !!}</td></tr>
                                    <tr><td><b>{!! title_case('productcode') !!}</b>:</td><td>{!! $product->productcode !!}</td></tr>
                                    <tr><td><b>{!! title_case('productunit') !!}</b>:</td><td>{!! $product->productunit !!}</td></tr>
                                    <tr><td><b>{!! title_case('description') !!}</b>:</td><td>{!! $product->description !!}</td></tr>
                                    <tr><td><b>{!! title_case('purchaseprice') !!}</b>:</td><td>{!! $product->purchaseprice !!}</td></tr>
                                    <tr><td><b>{!! title_case('bodyrate') !!}</b>:</td><td>{!! $product->bodyrate !!}</td></tr>
                                    <tr><td><b>{!! title_case('salesprice') !!}</b>:</td><td>{!! $product->salesprice !!}</td></tr>
                                    <tr><td><b>{!! title_case('discount') !!}</b>:</td><td>{!! $product->discount !!}</td></tr>
                                    <tr><td><b>{!! title_case('totalstock') !!}</b>:</td><td>{!! $product->totalstock !!}</td></tr>
                                    <tr><td><b>{!! title_case('availability') !!}</b>:</td><td>{!! $product->availability !!}</td></tr>
                                    <tr><td><b>{!! title_case('category') !!}</b>:</td><td>{!! $product->category->name !!}</td></tr>
                                    <tr><td><b>{!! title_case('createdby') !!}</b>:</td><td>{!! $product->user->name !!}</td></tr>
                                    <tr><td><b>{!! title_case('supplier') !!}</b>:</td><td claas="text-uppercase"><a href="{{ route('admin.viewsupplier', ['id'=> $product->supplier->id]) }}">{!! $product->supplier->propitername !!}</a></td></tr>

                                    @if(isset($product->image))
                                    <tr>
                                        <td>
                                            {!! title_case('image') !!}
                                        </td>
                                        <td>
                                            <img src="{{ asset('images/product/'.$product->image) }}" width="100" height="100">
                                        </td>
                                    </tr>
                                    @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection