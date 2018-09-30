@extends('layouts.backend.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Create Supplier                            
                        </h2>
                    </div>
                    <div class="body">
                        <form method="POST" action="{{ route('admin.createsupplier') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label for="companyname">Company Name</label>
                                    <div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="text" id="companyname" class="form-control" name="companyname" value="{{ old('companyname') }}">
                                        </div>
                                        @if ($errors->has('companyname'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('companyname') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label for="propitername">Name</label>
                                    <div class="form-group{{ $errors->has('propitername') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="text" id="propitername" class="form-control" name="propitername" value="{{ old('propitername') }}">
                                        </div>
                                        @if ($errors->has('propitername'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('propitername') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <label for="email">Email</label>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="example@gmail.com">
                                        </div>
                                        @if ($errors->has('email'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('email') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="mobile">Mobile</label>
                                    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="text" id="mobile" class="form-control" name="mobile" value="{{ old('mobile') }}">
                                        </div>
                                        @if ($errors->has('mobile'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('mobile') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="telephone">Telephone</label>
                                    <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="text" id="telephone" class="form-control" name="telephone" value="{{ old('telephone') }}">
                                        </div>
                                        @if ($errors->has('telephone'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('telephone') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label for="productssale">Products sales</label>
                                    <div class="form-group{{ $errors->has('productssale') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <textarea name="productssale" id="ckeditor" class="form-control" >{{ old('productssale') ? old('productssale') : '<h2>Supplier Sales</h2>
                                            <p>Supplier offers various types of products </p>
                                            <ul>
                                                <li>... 0tk/kg on 24-09-2018</li>
                                                <li></li>
                                            </ul>' }}
                                        </textarea>
                                        </div>
                                        @if ($errors->has('productssale'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('productssale') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label for="address">Address</label>
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <textarea name="address" rows="4" class="form-control no-resize" >{{ old('address') }}</textarea>
                                        </div>
                                        @if ($errors->has('address'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('address') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                           <div class="row clearfix">
                                <div class="col-sm-4">
                                    <label for="city">City</label>
                                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="text" id="city" class="form-control" name="city" value="{{ old('city') }}">
                                        </div>
                                        @if ($errors->has('city'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('city') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="zipcode">Zipcode</label>
                                    <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="text" id="zipcode" class="form-control" name="zipcode" value="{{ old('zipcode') }}">
                                        </div>
                                        @if ($errors->has('zipcode'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('zipcode') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="country">Country</label>
                                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="text" id="country" class="form-control" name="country" value="{{ old('country') }}">
                                        </div>
                                        @if ($errors->has('country'))
                                            <small class="alert alert-warning">
                                                {{ $errors->first('country') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
	                            <div class="col-sm-6">
	                                <label for="image">Upload Image</label>
	                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
	                                    <div class="form-line">
	                                        <input type="file" id="image" class="form-control" name="image">
	                                    </div>
	                                    @if ($errors->has('image'))
	                                    <small class="alert alert-warning">
	                                        {{ $errors->first('image') }}
	                                    </small>
	                                    @endif
	                                </div>
	                            </div>
                        	</div>

                            <br>
                            <button type="submit" class="btn bg-teal m-t-15 waves-effect">CREATE</button>
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
    <script src="{{ asset('assets/backend/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/forms/editors.js') }}"></script>
@endsection

@section('css')
<link href="{{ asset('assets/backend/plugins/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet" />

@endsection