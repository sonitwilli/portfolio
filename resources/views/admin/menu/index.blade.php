@extends('admin.master')
@section('content')
    <div class="content-header">
        <div class="header-section">
            <h1><i class="gi gi-justify"></i> Menu<br><small>Your Menu Center</small></h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Pages</li>
        <li>Menu Center</li>
        <li><a href="{!! url('admin/menu') !!}">View Menu</a></li>
    </ul>
    <!-- Quick Stats -->
    <div class="row text-center">
        <div class="pull-right col-sm-6 col-lg-3">
            <a href="{!! url('admin/menu/create') !!}" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-success">
                    <h4 class="widget-content-light"><strong>Add New</strong> Menu</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
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
            <h2><strong>All</strong> Menu</h2>
        </div>
        <!-- END All Products Title -->

        @if(Session::get('delete'))
            <div class="alert alert-success text-center">
                Success
            </div>
    @endif
    <!-- All Products Content -->
        <form action="{!! url('admin/menu/delete') !!}" method="post">
            {!! csrf_field() !!}
            <table id="general-table" class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th style="width: 80px;" class="text-center"><input type="checkbox"></th>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="width: 150px;" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                {!! $result !!}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6">
                        {!! HtmlTfoot() !!}
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
        <!-- END All Products Content -->
    </div>
@endsection