@extends('admin.master')
@section('content')
    <div class="content-header">
        <div class="header-section">
            <h1><i class="gi gi-globe"></i> Language<br><small>Your Language Center</small></h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Pages</li>
        <li>Language Center</li>
        <li><a href="{!! url('admin/menu') !!}">View Language</a></li>
    </ul>
    <!-- Quick Stats -->
    <div class="row text-center">
        <div class="pull-right col-sm-6 col-lg-3">
            <a href="{!! url('admin/language/create') !!}" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-success">
                    <h4 class="widget-content-light"><strong>Add New</strong> Language</h4>
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
            <h2><strong>All</strong> Language</h2>
        </div>
        <!-- END All Products Title -->

        @if(Session::get('delete'))
            <div class="alert alert-success text-center">
                Success
            </div>
        @endif
        <!-- All Products Content -->
        <form action="{!! url('admin/language/delete') !!}" method="post">
            {!! csrf_field() !!}
        <table id="general-table" class="table table-bordered table-striped table-vcenter">
            <thead>
            <tr>
                <th style="width: 80px;" class="text-center"><input type="checkbox"></th>
                <th>Name</th>
                <th>Language</th>
                <th style="width: 150px;" class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if(count($result) > 0)
                @foreach($result as $item)
                    <tr>
                        <td class="text-center"><input type="checkbox" id="checkbox-{!! $item->id !!}" name="id[]" value="{!! $item->id !!}"></td>
                        <td><a href="{!! url('admin/language/edit/'.$item->id) !!}">{!! $item->name !!}</a></td>
                        <td>{!! $item->language !!}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="{!! url('admin/language/edit/'.$item->id) !!}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="{!! url('admin/language/delete/'.$item->id) !!}" onclick="return confirm('Are you sure???')" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    {!! HtmlTfoot() !!}
                </td>
            </tr>
            </tfoot>
        </table>
        </form>
        <!-- END All Products Content -->
    </div>
@endsection