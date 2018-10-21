@extends('layouts.backend.app')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="">
                        	Products By Category
                        </h2>
                        
                    </div>

                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover category_list dataTable" id="product_list">
                                <thead>
                                    <tr>
                                        <th class="align-center">productname</th>
										<th class="align-center">productcode</th>
										<th class="align-center">productunit</th>
										<th class="align-center">purchaseprice</th>
										<th class="align-center">salesprice</th>
										<th class="align-center">totalstock</th>
										<th class="align-center">action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="align-center">productname</th>
										<th class="align-center">productcode</th>
										<th class="align-center">productunit</th>
										<th class="align-center">purchaseprice</th>
										<th class="align-center">salesprice</th>
										<th class="align-center">totalstock</th>
										<th class="align-center">action</th>
                                    </tr>
                                </tfoot>
                                <tbody class="align-center">
                                   
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
        $('#product_list').DataTable({
        	"pageLength": 10,
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('admin.getcatproducts', ['catid'=> $catid]) }}",
            "columns": [

	            { data: 'productname',render: function ( data, type, row ) {

		            return data ? data.substr( 0, 50 ) : '...';

		        	}
		        },
	            { data: 'productcode',render: function ( data, type, row ) {

		            return data ? data.substr( 0, 25 ) : '...';

		        	}
		        },
	            { data: 'productunit',render: function ( data, type, row ) {

		            return data ? data.substr( 0, 25 ) : '...';

		        	}
		        },
		        { data: 'purchaseprice',render: function ( data, type, row ) {

		            return data ? data.substr( 0, 50 ) : '...';

		        	}
		        },
	            { data: 'salesprice',render: function ( data, type, row ) {

		            return data ? data.substr( 0, 25 ) : '...';

		        	}
		        },
		        { data: 'totalstock',render: function ( data, type, row ) {

		            return data ? data.substr( 0, 25 ) : '...';

		        	}
		        },
		        { data: 'action'},

            ]

        });
    });

</script>

@endsection

