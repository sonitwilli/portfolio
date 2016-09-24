@extends('admin.master')
@section('content')
    <div class="content-header">
        <div class="header-section">
            <h1>{{--<i class="fa fa-spinner fa-3x fa-spin"></i>--}}<i class="gi gi-pencil"></i> Language<br><small>Create and Edit Language</small></h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Pages</li>
        <li><a href="{!! url('admin/language/list') !!}">Language Center</a></li>
        <li>{!! $action !!} Language</li>
    </ul>
    @if($action == 'Edit')
    <div class="row text-center">
        <div class="col-sm-6 col-lg-3">
            <a href="{!! url('admin/language/create') !!}" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-success">
                    <h4 class="widget-content-light"><strong>Add New</strong> Language</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
            </a>
        </div>
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
                <form action="{!! url('admin/language/create') !!}" method="post" class="form-horizontal form-bordered">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" value="{!! (!empty($result))?$result->id:0 !!}" name="id">
                    @if(Session::get('success'))
                        <div class="alert alert-success text-center">
                            Success
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Name</label>
                        <div class="col-md-9">
                            <input type="text" id="name" name="name" class="form-control" value="{!! (!empty($result))?$result->name:old('name') !!}" placeholder="Name...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="language">Slug</label>
                        <div class="col-md-9">
                            <input type="text" id="language" name="language" class="form-control" value="{!! (!empty($result))?$result->language:old('language') !!}" placeholder="Language">
                            <div class="help-block">ex: en</div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                        </div>
                    </div>
                <!-- END General Data Content -->
                </form>
            </div>
            <!-- END General Data Block -->
        </div>
    </div>
@endsection
