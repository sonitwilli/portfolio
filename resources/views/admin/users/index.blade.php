@extends('admin.master')
@section('content')
    <div class="content-header">
        <div class="header-section">
            <h1><i class="gi gi-group"></i> Users<br><small>Your Users Center</small></h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Pages</li>
        <li>Users Center</li>
        <li><a href="{!! url('admin/users/list') !!}">View Users</a></li>
    </ul>
    <!-- Quick Stats -->
    <div class="row text-center">
        <div class="pull-right col-sm-6 col-lg-3">
            <a href="{!! url('admin/user/create') !!}" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-success">
                    <h4 class="widget-content-light"><strong>Add New</strong> User</h4>
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
            <h2><strong>All</strong> Users</h2>
        </div>
        <!-- END All Products Title -->

        @if(Session::get('delete'))
            <div class="alert alert-success text-center">
                Success
            </div>
    @endif
    <!-- All Products Content -->
        <form action="{!! url('admin/user/delete') !!}" method="post">
            {!! csrf_field() !!}
            <table id="general-table" class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th style="width: 80px;" class="text-center"><input type="checkbox"></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Groups</th>
                    <th style="width: 150px;" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                {!! $result !!}
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="btn-group btn-group-sm pull-right">
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                            <div class="btn-group btn-group-sm dropup">
                                <a href="javascript:void(0)" class="btn btn-primary pull-right dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                    {{--<li><a href="javascript:void(0)" onclick="App.pagePrint();"><i class="fa fa-print"></i> Print</a></li>--}}
                                    <li class="dropdown-header"><i class="fa fa-share pull-right"></i> Export As</li>
                                    <li>
                                        <a href="{!! url('admin/user/export-pdf') !!}">.pdf</a>
                                        <a href="{!! url('admin/user/export-xls') !!}">.xlxs</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {!! HtmlTfoot() !!}
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
        <!-- END All Products Content -->
    </div>
@endsection