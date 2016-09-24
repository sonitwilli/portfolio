@extends('admin.master')
@section('content')
    <div class="content-header">
        <div class="header-section">
            <h1><i class="gi gi-pushpin"></i> Orders<br><small>Your Orders Center</small></h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Pages</li>
        <li>Orders Center</li>
        <li><a href="{!! url('admin/orders/list') !!}">View Orders</a></li>
    </ul>
    <!-- Quick Stats -->
    <div class="row text-center">
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background">
                    <h4 class="widget-content-light"><strong>Pending</strong> Orders</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen">{!! number_format(\Models\Orders::where('publish', 0)->count(), 0, '.', ',') !!}</span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>Orders</strong> Today</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{!! number_format(\Models\Orders::whereDay('created_at', date('d'))->count(), 0, '.', ',') !!}</span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>Orders</strong> This Month</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{!! number_format(\Models\Orders::whereMonth('created_at', date('m'))->count(), 0, '.',',') !!}</span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>Orders</strong> Last Month</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{!! number_format(\Models\Orders::whereMonth('created_at', date('m') - 1)->count(), 0, '.',',') !!}</span></div>
            </a>
        </div>
    </div>
    <!-- END Quick Stats -->

    <!-- All orders Block -->
    <div class="block full">
        <!-- All orders Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
            </div>
            <h2><strong>All</strong> Orders</h2>
        </div>
        <!-- END All Orders Title -->

        @if(Session::get('delete'))
            <div class="alert alert-success text-center">
                Success
            </div>
    @endif
    <!-- All Orders Content -->
        <form action="{!! url('admin/products/orders/delete') !!}" method="post">
            {!! csrf_field() !!}
            <table id="general-table" class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th style="width: 80px;" class="text-center"><input type="checkbox"></th>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Products</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th style="width: 150px;" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                {!! $result !!}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="8">
                        {!! HtmlTfoot() !!}
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
        <!-- END All orders Content -->
    </div>
@endsection