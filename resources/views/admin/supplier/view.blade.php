@extends('layouts.backend.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12 col-sm-12">
            	<div class="card">
                    <div class="header">
                        <h2>
                            Supplier Details                           
                        </h2>
                    </div>
	            	<div class="body table-responsive">
	                    <table class="table">
	                        <tbody>
	                            <tr><td><b>{!! title_case('companyname') !!}</b>:</td><td>{!! $supplier->companyname !!}</td></tr>
								<tr><td><b>{!! title_case('propitername') !!}</b>:</td><td>{!! $supplier->propitername !!}</td></tr>
								<tr><td><b>{!! title_case('mobile') !!}</b>:</td><td>{!! $supplier->mobile !!}</td></tr>
								<tr><td><b>{!! title_case('telephone') !!}</b>:</td><td>{!! $supplier->telephone !!}</td></tr>
								<tr><td><b>{!! title_case('email') !!}</b>:</td><td>{!! $supplier->email !!}</td></tr>
								<tr><td><b>{!! title_case('city') !!}</b>:</td><td>{!! $supplier->city !!}</td></tr>
								<tr><td><b>{!! title_case('zipcode') !!}</b>:</td><td>{!! $supplier->zipcode !!}</td></tr>
								<tr><td><b>{!! title_case('address') !!}</b>:</td><td>{!! $supplier->address !!}</td></tr>
								<tr><td><b>{!! title_case('country') !!}</b>:</td><td>{!! $supplier->country !!}</td></tr>

								@if(isset($supplier->image))
								<tr>
									<td>
										{!! title_case('image') !!}
									</td>
									<td>
										<img src="{{ asset('images/supplier/'.$supplier->image) }}" width="100" height="100">
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