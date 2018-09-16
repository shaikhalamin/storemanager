@extends('layouts.backend.app')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <ol class="breadcrumb breadcrumb-col-cyan">
	            <li><a href="javascript:void(0);">Admin</a></li>
	            <li><a href="javascript:void(0);">Category</a></li>
	            <li class="active">List</li>
	        </ol>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="">
                        	Category List
                        </h2>
                        
                    </div>

                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover category_list dataTable" id="category_list">
                                <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>slug</th>
                                        <th>created_at</th>
                                        <th>action</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>name</th>
                                        <th>slug</th>
                                        <th>created_at</th>
                                        <th>action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('javascript')

<script src="{{ asset('assets/backend/plugins/jquery-countto/jquery.countTo.js') }}"></script>

<script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>

<script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>

<script type="text/javascript">
	$(document).ready( function () {
        $('#category_list').DataTable({
        	"pageLength": 10,
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('admin.ajaxcategory') }}",
            "columns": [
	            { data: 'name',render: function ( data, type, row ) {

		            return data ? data.substr( 0, 25 ) : '...';

		        	}
		        },
	            { data: 'slug',render: function ( data, type, row ) {

		            return data ? data.substr( 0, 25 ) : '...';

		        	}
		        },
	            { data: 'created_at',render: function ( data, type, row ) {

		            return data ? data.substr( 0, 25 ) : '...';

		        	}
		        },
		        { data: 'action'},

            ]

        });
    });

	var hasNotification = "{{Session::has('category')}}";
	if(hasNotification){

		var getNotification = "{{Session::get('category')}}";

		$.notify({
			// options
			message: getNotification
		},{
			// settings
			element: 'body',
			position: null,
			type: "blue-grey",
			allow_dismiss: true,
			newest_on_top: false,
			showProgressbar: false,
			placement: {
				from: "top",
				align: "right"
			},
			offset: 20,
			spacing: 10,
			z_index: 1031,
			delay: 3000,
			timer: 1000,
			url_target: '_blank',
			mouse_over: null,
			animate: {
				enter: 'animated bounceInRight',
				exit: 'animated bounceOutRight'
			},
			onShow: null,
			onShown: null,
			onClose: null,
			onClosed: null,
			icon_type: 'class',
			template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert bg-{0}" role="alert">' +
				'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
				'<span data-notify="icon"></span> ' +
				'<span data-notify="title">{1}</span> ' +
				'<span data-notify="message">{2}</span>' +
				'<div class="progress" data-notify="progressbar">' +
					'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
				'</div>' +
				'<a href="{3}" target="{4}" data-notify="url"></a>' +
			'</div>' 
		});
	}


</script>

@endsection
