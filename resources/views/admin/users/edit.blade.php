@extends('admin.master')
@section('content')
    <div class="content-header">
        <div class="header-section">
            <h1>{{--<i class="fa fa-spinner fa-3x fa-spin"></i>--}}<i class="gi gi-pencil"></i> User<br><small>Create and Edit Block</small></h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Pages</li>
        <li><a href="{!! url('admin/user/list') !!}">User Center</a></li>
        <li>{!! $action !!} User</li>
    </ul>
    @if($action == 'Edit')
        <div class="row text-center">
            <div class="col-sm-6 col-lg-3">
                <a href="{!! url('admin/user/create') !!}" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background-success">
                        <h4 class="widget-content-light"><strong>Add New</strong> User</h4>
                    </div>
                    <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
                </a>
            </div>
        </div>
    @endif
    @if(Session::get('success'))
        <div class="alert alert-success text-center">
            {!! Session::get('success') !!}
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
                <form action="{!! url('admin/user/create') !!}" method="post" class="form-horizontal form-bordered">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{!! (!empty($result))?$result->id:0 !!}">
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
                        <label class="col-md-3 control-label" for="first_name">Name</label>
                        <div class="col-md-4">
                            <input type="text" id="first_name" name="first_name" class="form-control" value="{!! (!empty($result))?$result->firstname:old('first_name') !!}" placeholder="First Name...">
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="last_name" name="last_name" class="form-control" value="{!! (!empty($result))?$result->lastname:old('last_name') !!}" placeholder="Last Name...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="email">Email</label>
                        <div class="col-md-8">
                            <input type="text" id="email" name="email" class="form-control" value="{!! (!empty($result))?$result->email:old('email') !!}" placeholder="Email">
                            <span class="help-block">This is email using activation this account</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="password">Password</label>
                        <div class="col-md-8">
                            <input type="password" id="password" name="password" class="form-control" value="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="category">Choose Group</label>
                        <div class="col-md-8">
                            <select name="type" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
                                <option value="1" @if(!empty($result) && $result->type == 1) selected @endif>Administrator</option>
                                <option value="2" @if(!empty($result) && $result->type == 2) selected @endif>Add + Edit</option>
                                <option value="3" @if(!empty($result) && $result->type == 3) selected @endif>Other</option>
                            </select>
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
        @if(!empty($result) && Auth::user()->id == $result->id)
        <div class="col-md-4">
            <div class="block">
                <!-- Product Images Title -->
                <div class="block-title">
                    <h2><i class="fa fa-picture-o"></i> <strong>Avatar</strong></h2>
                </div>
                <!-- END Product Images Title -->

                <!-- Product Images Content -->
                <div class="block-section">
                    <form id="my-awesome-dropzone" data-multiple="false" data-maxfile="1" action="{!! url('admin/user/images') !!}" class="dropzone images">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" value="{!! (!empty($result))?$result->id:0 !!}">
                        <div class="dropzone-previews"></div>
                        <div class="fallback"> <!-- this is the fallback if JS isn't working -->
                            <input name="file" type="file" multiple />
                        </div>
                        <div class="help-block">1 files Max</div>
                        <div class="help-block">Max file size 2MB</div>
                    </form>
                    <div class="form-horizontal" style="padding-top: 15px;">
                        <div class="form-group form-actions">
                            <div class="col-md-9 col-md-offset-3">
                                <button id="submit-all" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped table-vcenter">
                        <tbody>
                        @if(!empty($result) && $result != null && $result->images != null)
                            <tr>
                                <td style="width: 20%;">
                                    <a href="{!! Storage::url($result->images) !!}" data-toggle="lightbox-image">
                                        <img src="{!! Storage::url($result->images) !!}" alt="" class="img-responsive center-block" style="max-width: 110px;">
                                    </a>
                                </td>
                                <td class="text-center">
                                    <label class="switch switch-primary">
                                        <input type="checkbox" checked><span></span>
                                    </label>
                                    publish
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-xs btn-danger delete-image" data-url="{!! url('admin/user/delete-image') !!}" data-id="{!! $result->id !!}" data-token="{!! csrf_token() !!}"><i class="fa fa-trash-o"></i> Delete</a>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <!-- END Product Images Content -->
                </div>

                <!-- END Product Images Content -->
            </div>
        </div>
        @endif
    </div>
@endsection
