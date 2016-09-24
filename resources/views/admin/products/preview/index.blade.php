@extends('admin.master')
@section('content')
    <div class="content-header">
        <div class="header-section">
            <h1><i class="gi gi-pushpin"></i> Products<br><small>Your Products Center</small></h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Pages</li>
        <li>Products Center</li>
        <li><a href="{!! url('admin/products/list') !!}">View Products</a></li>
    </ul>
    <!-- Quick Stats -->
    <div class="row text-center">
        <div class="pull-right col-sm-6 col-lg-3">
            <a href="{!! url('admin/products/create') !!}" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-success">
                    <h4 class="widget-content-light"><strong>Add New</strong> Products</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-danger">
                    <h4 class="widget-content-light"><strong>Out of</strong> Stock</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-danger animation-expandOpen">{!! number_format(\Models\Products::where('condition', 3)->count(), 0, '.', ',') !!}</span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>Top</strong> Sellers</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{!! number_format(\Models\Products::where('sale','>', 0)->count(), 0, '.', ',') !!}</span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>All</strong> Products</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{!! number_format(\Models\Products::count()) !!}</span></div>
            </a>
        </div>
    </div>
    <!-- END Quick Stats -->

    <!-- All Products Block -->
    <div class="block full">
        <!-- All Products Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
            </div>
            <h2><strong>All</strong> Products</h2>
        </div>
        <!-- END All Products Title -->

        @if(Session::get('delete'))
            <div class="alert alert-success text-center">
                Success
            </div>
    @endif
    <!-- All Products Content -->
        <form action="{!! url('admin/products/delete') !!}" method="post">
            {!! csrf_field() !!}
            <table id="general-table" class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th style="width: 80px;" class="text-center"><input type="checkbox"></th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Added</th>
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
        <!-- END All Products Content -->
    </div>
@endsection