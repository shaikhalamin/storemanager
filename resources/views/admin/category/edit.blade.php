@extends('layouts.backend.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
							Edit Category                            
                        </h2>
                    </div>
                    <div class="body">
                        <form method="POST" action="{{ route('admin.updatecategory') }}">
                        	{{ csrf_field() }}
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" />
                                            <label class="form-label">Category Name</label>
                                        </div>
                                        <input type="hidden" name="id" value="{{ $category->id }}">
                                        @if ($errors->has('name'))
			                                <small class="text-danger">
			                                    {{ $errors->first('name') }}
			                                </small>
		                            	@endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection