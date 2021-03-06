@extends('layouts.backend.app')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <a href="{{ route('admin.categorylist') }}" style="cursor: pointer !impotant;">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Category</div>
                            <div class="number count-to">{{ $categoryCount ? $categoryCount : 0}}</div>
                            
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.productlist') }}" style="cursor: pointer !impotant;">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">All Products</div>
                            <div class="number count-to">{{ $productCount ? $productCount : 0 }}</div>
                        </div>
                    </div>
                </div>
            </a>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">forum</i>
                    </div>
                    <div class="content">
                        <div class="text">All Sales</div>
                        <div class="number count-to">{{ $salesCount ? $salesCount : 0 }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">Monthly Sales</div>
                        <div class="number count-to">{{ $monthlySales ? $monthlySales : 0 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="">
                            <span class="m-r-10"><a data-placement="bottom" data-toggle="tooltip" title="Create Product" href="{{ route('admin.createproduct') }}" class="btn btn-sm btn-info"><i class="material-icons">add</i></a></span> Product List
                        </h2>
                        
                    </div>

                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover category_list dataTable" id="supplier_list">
                                <thead>
                                    <tr>
                                        <th class="align-center">productname</th>
                                        <th class="align-center">purchaseprice</th>
                                        <th class="align-center">salesprice</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="align-center">
                                        <th class="align-center">productname</th>
                                        <th class="align-center">purchaseprice</th>
                                        <th class="align-center">salesprice</th>
                                        
                                        
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

    </div>
</section>
@endsection

@section('javascript')

<script src="{{ asset('assets/backend/plugins/jquery-countto/jquery.countTo.js') }}"></script>

<script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>

<script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>


<script type="text/javascript">
    $(document).ready( function () {
        $('#supplier_list').DataTable({
            "pageLength": 10,
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('admin.ajaxproduct') }}",
            "columns": [
                { data: 'productname',render: function ( data, type, row ) {

                    return data ? data.substr( 0, 25 ) : '...';

                    }
                },
                
                { data: 'purchaseprice',render: function ( data, type, row ) {

                    return data;

                    }
                },
                
                { data: 'salesprice',render: function ( data, type, row ) {

                    return data;

                    }
                },
                

            ]

        });
    });

    var hasNotification = "{{Session::has('supplier')}}";
    if(hasNotification){

        var getNotification = "{{Session::get('supplier')}}";

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