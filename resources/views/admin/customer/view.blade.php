@extends('layouts.backend.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12 col-sm-12">
            	<div class="card">
                    <div class="header">
                        <h2>
                            Customer Details                           
                        </h2>
                    </div>
	            	<div class="body table-responsive">
	                    <table class="table">
	                        <tbody>
	                            <tr><td><b>{!! title_case('customername') !!}</b>:</td><td>{!! $customer->customername !!}</td></tr>
								<tr><td><b>{!! title_case('mobile') !!}</b>:</td><td>{!! $customer->mobile !!}</td></tr>
								
								<tr><td><b>{!! title_case('mobile') !!}</b>:</td><td>{!! $customer->mobile !!}</td></tr>
								
								<tr><td><b>{!! title_case('email') !!}</b>:</td><td>{!! $customer->email !!}</td></tr>

								<tr><td><b>{!! title_case('due') !!}</b>:</td><td>{!! $customer->due !!}</td></tr>

								<tr><td><b>{!! title_case('Last deposit') !!}</b>:</td><td>{!! $customer->deposit !!}</td></tr>

								<tr><td><b>{!! title_case('city') !!}</b>:</td><td>{!! $customer->city !!}</td></tr>
								<tr><td><b>{!! title_case('zipcode') !!}</b>:</td><td>{!! $customer->zipcode !!}</td></tr>
								<tr><td><b>{!! title_case('address') !!}</b>:</td><td>{!! $customer->address !!}</td></tr>
								<tr><td><b>{!! title_case('country') !!}</b>:</td><td>{!! $customer->country !!}</td></tr>

								@if(isset($customer->image))
								<tr>
									<td>
										{!! title_case('image') !!}
									</td>
									<td>
										<img src="{{ asset('images/customer/'.$customer->image) }}" width="100" height="100">
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