@extends('admin.master')
@section('content')
    <div class="content-header">
        <div class="header-section">
            <h1>{{--<i class="fa fa-spinner fa-3x fa-spin"></i>--}}<i class="gi gi-pencil"></i> Menu<br><small>Create and Edit Menu</small></h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Pages</li>
        <li><a href="{!! url('admin/menu') !!}">Menu Center</a></li>
        <li>{!! $action !!} Menu</li>
    </ul>
    @if($action == 'Edit')
        <div class="row text-center">
            <div class="col-sm-6 col-lg-3">
                <a href="{!! url('admin/menu/create') !!}" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background-success">
                        <h4 class="widget-content-light"><strong>Add New</strong> Menu</h4>
                    </div>
                    <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
                </a>
            </div>
        </div>
    @endif
    @if(Session::get('success'))
        <div class="alert alert-success text-center">
            Success
        </div>
    @endif
    <div class="row">
        <div class="col-lg-6">
            <!-- General Data Block -->

            <div class="block">
                <!-- General Data Title -->
                <div class="block-title">
                    <h2><i class="fa fa-pencil"></i> <strong>General</strong> Data</h2>
                </div>
                <form action="{!! url('admin/menu/create') !!}" method="post" class="form-horizontal form-bordered">
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
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active"><a href="#tabs-content-general" data-toggle="tooltip" title="General">General</a></li>
                        @if(!empty($setting) && count($setting) > 0 && $setting->language != null)
                            <?php $language = explode(",", $setting->language);?>
                            @foreach($language as $k)
                                <?php $country = Models\Languages::where('id',$k)->first()?>
                                <li><a href="#tabs-content-{!! $country->language !!}" data-toggle="tooltip" title="{!! $country->language !!}">{!! $country->name !!}</a></li>
                            @endforeach
                        @endif
                    </ul>

                    <div class="tab-content">
                        @if(!empty($setting) && count($setting) > 0 && $setting->language != null)
                            <?php $language = explode(",", $setting->language); $i = 0;?>
                            @foreach($language as $k)
                                <?php $country = Models\Languages::where('id',$k)->first(); ?>
                                <div class="tab-pane" id="tabs-content-{!! $country->language !!}">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name{!! $country->language !!}">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="name{!! $country->language !!}" name="name{!! $country->language !!}" data-id="{!! (!empty($result))?$result->id:0 !!}" data-lang="{!! $country->language !!}" data-url="{!! url('admin/menu/check-link') !!}" class="form-control" value="{!! (!empty($result) && $result != null && !empty($result->metaData[$i]))?$result->metaData[$i]->name:old('name'.$country->language) !!}" placeholder="Name...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="slug{!! $country->language !!}">Slug</label>
                                        <div class="col-md-9">
                                            <input type="text" readonly id="slug{!! $country->language !!}" name="slug{!! $country->language !!}" class="form-control" value="{!! (!empty($result) && $result != null && !empty($result->metaData[$i]))?$result->metaData[$i]->slug:old('slug'.$country->language) !!}" placeholder="Slug">
                                        </div>
                                    </div>
                                </div>
                                <?php $i++;?>
                            @endforeach
                        @endif
                        <div class="tab-pane active" id="tabs-content-general">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="name" name="name" data-lang="general" data-id="{!! (!empty($result))?$result->id:0 !!}" data-url="{!! url('admin/menu/check-link') !!}" class="form-control" value="{!! (!empty($result))?$result->name:old('name') !!}" placeholder="Name...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slug">Slug</label>
                                <div class="col-md-9">
                                    <input type="text" id="slug" readonly name="slug" class="form-control" value="{!! (!empty($result))?$result->slug:old('address') !!}" placeholder="Slug">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="order_by">Order By</label>
                        <div class="col-md-9">
                            <input type="text" id="order_by" name="order_by" class="form-control" value="{!! (!empty($result))?$result->order_by:old('order_by') !!}" placeholder="Order By">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="category">Category</label>
                        <div class="col-md-8">
                            <div class="scroller" data-height="200" data-always-visible="1">
                                {!! $category !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Published?</label>
                        <div class="col-md-9">
                            <label class="switch switch-primary">
                                <input type="checkbox" id="publish" name="publish" checked><span></span>
                            </label>
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
        <div class="col-lg-6">
            <!-- Meta Data Block -->
            <div class="block">
                <!-- Meta Data Title -->
                <div class="block-title">
                    <h2><i class="fa fa-google"></i> <strong>Meta</strong> Data</h2>
                </div>
                <!-- END Meta Data Title -->

                <!-- Meta Data Content -->
                <form action="{!! url('admin/menu/meta-data') !!}" method="post" class="form-horizontal form-bordered">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{!! (!empty($result))?$result->id:0 !!}">
                    <!-- Default Tabs -->
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active"><a href="#tabs-general" data-toggle="tooltip" title="Language General">General</a></li>
                        @if(!empty($setting) && count($setting) > 0 && $setting->language != null)
                            <?php $language = explode(",", $setting->language);?>
                            @foreach($language as $k)
                                <?php $country = Models\Languages::where('id',$k)->first()?>
                                <li><a href="#tabs-{!! $country->language !!}" data-toggle="tooltip" title="Language {!! $country->language !!}">{!! $country->name !!}</a></li>
                            @endforeach
                        @endif

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-general">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="meta-title">Meta Title</label>
                                <div class="col-md-9">
                                    <input type="text" id="meta-title" name="meta-title" class="form-control" value="{!! (!empty($result))?$result->title:old('meta-title') !!}" placeholder="Enter meta title..">
                                    <div class="help-block">55 Characters Max</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="meta-keywords">Meta Keywords</label>
                                <div class="col-md-9">
                                    <input type="text" id="meta-keywords" name="meta-keywords" class="form-control" value="{!! (!empty($result))?$result->keywords:old('meta-keywords') !!}" placeholder="keyword1, keyword2, keyword3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="meta-description">Meta Description</label>
                                <div class="col-md-9">
                                    <textarea id="meta-description" name="meta-description" class="form-control" rows="6" placeholder="Enter meta description..">{!! (!empty($result))?$result->description:old('meta-description') !!}</textarea>
                                    <div class="help-block">115 Characters Max</div>
                                </div>
                            </div>
                        </div>
                        @if(!empty($setting) && count($setting) > 0 && $setting->language != null)
                            <?php $language = explode(",", $setting->language); $i = 0;?>
                            @foreach($language as $k)
                                <?php $country = Models\Languages::where('id',$k)->first(); ?>
                                <div class="tab-pane" id="tabs-{!! $country->language !!}">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="meta{!! $country->language !!}">Meta Title</label>
                                        <div class="col-md-9">
                                            <input type="text" id="meta{!! $country->language !!}" name="title{!! $country->language !!}" class="form-control" value="{!! (!empty($result) && $result != null && !empty($result->metaData[$i]))?$result->metaData[$i]->title:old('title'.$country->language) !!}" placeholder="Enter meta title..">
                                            <div class="help-block">55 Characters Max</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="meta{!! $country->language !!}">Meta Keywords</label>
                                        <div class="col-md-9">
                                            <input type="text" id="meta{!! $country->language !!}" name="keywords{!! $country->language !!}" class="form-control" value="{!! (!empty($result) && $result != null && !empty($result->metaData[$i]))?$result->metaData[$i]->keywords:old('keywords'.$country->language) !!}" placeholder="keyword1, keyword2, keyword3">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="meta{!! $country->language !!}">Meta Description</label>
                                        <div class="col-md-9">
                                            <textarea id="meta{!! $country->language !!}" name="description{!! $country->language !!}" class="form-control" rows="6" placeholder="Enter meta description..">{!! (!empty($result) && $result != null && !empty($result->metaData[$i]))?$result->metaData[$i]->descriptions:old('description'.$country->language) !!}</textarea>
                                            <div class="help-block">115 Characters Max</div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++;?>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                        </div>
                    </div>
                </form>
                <!-- END Meta Data Content -->
            </div>
            <!-- END Meta Data Block -->
        </div>
    </div>
@endsection
