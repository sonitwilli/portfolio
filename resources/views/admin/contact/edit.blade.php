@extends('admin.master')
@section('content')
    <div class="content-header">
        <div class="header-section">
            <h1>{{--<i class="fa fa-spinner fa-3x fa-spin"></i>--}}<i class="gi gi-pencil"></i> Contact<br><small>Create and Edit Block</small></h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Pages</li>
        <li><a href="{!! url('admin/contact/list') !!}">Contact Center</a></li>
        <li>{!! $action !!} Contact</li>
    </ul>
    @if(Session::get('success'))
        <div class="alert alert-success text-center">
            Success
        </div>
    @endif
    <div class="row">
        <div class="col-lg-8">
            <!-- General Data Block -->

            <div class="block">
                <!-- General Data Title -->
                <div class="block-title">
                    <h2><i class="fa fa-pencil"></i> <strong>General</strong> Data</h2>
                </div>
                <form action="{!! url('admin/block/create') !!}" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Name</label>
                        <div class="col-md-9">
                            <p class="form-control-static">{!! (!empty($result) && $result != null)?stripslashes($result->name):old('name') !!}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Email</label>
                        <div class="col-md-9">
                            <p class="form-control-static">{!! (!empty($result) && $result != null)?stripslashes($result->email):old('name') !!}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Phone</label>
                        <div class="col-md-9">
                            <p class="form-control-static">{!! (!empty($result) && $result != null)?stripslashes($result->phone):old('name') !!}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Address</label>
                        <div class="col-md-9">
                            <p class="form-control-static">{!! (!empty($result) && $result != null)?stripslashes($result->address):old('name') !!}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Message</label>
                        <div class="col-md-9">
                            <p class="form-control-static">{!! (!empty($result) && $result != null)?stripslashes($result->content):old('name') !!}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Created at</label>
                        <div class="col-md-9">
                            <p class="form-control-static">{!! (!empty($result) && $result != null)?convertDateTime($result->created_at):old('name') !!}</p>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="button" onclick="location.href='{!! url('admin/contact/list') !!}'" class="btn btn-sm btn-warning"><i class="gi gi-undo"></i> Back</button>
                        </div>
                    </div>
                    <!-- END General Data Content -->

                </form>
            </div>
            <!-- END General Data Block -->
        </div>
    </div>
@endsection
