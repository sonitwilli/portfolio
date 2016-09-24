@extends('admin.master')
@section('content')
    <div class="content-header">
        <div class="header-section">
            <h1>{{--<i class="fa fa-spinner fa-3x fa-spin"></i>--}}<i class="gi gi-pencil"></i> Banner<br><small>Create and Edit Banner</small></h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Pages</li>
        <li><a href="{!! url('admin/banner/list') !!}">Banner Center</a></li>
        <li>{!! $action !!} Banner</li>
    </ul>
    @if($action == 'Edit')
        <div class="row text-center">
            <div class="col-sm-6 col-lg-3">
                <a href="{!! url('admin/banner/create') !!}" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background-success">
                        <h4 class="widget-content-light"><strong>Add New</strong> Banner</h4>
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
                <form action="{!! url('admin/banner/create') !!}" method="post" class="form-horizontal form-bordered">
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
                                            <input type="text" id="name{!! $country->language !!}" name="name{!! $country->language !!}" data-id="{!! (!empty($result))?$result->id:0 !!}" data-lang="{!! $country->language !!}" data-url="{!! url('admin/banner/check-link') !!}" class="form-control" value="{!! (!empty($result) && $result != null && !empty($result->metaData[$i]))?$result->metaData[$i]->name:old('name'.$country->language) !!}" placeholder="Name...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="description{!! $country->language !!}">Description</label>
                                        <div class="col-md-9">
                                            <textarea id="description{!! $country->language !!}" name="description{!! $country->language !!}" class="form-control" rows="5">{!! (!empty($result) && $result != null && !empty($result->metaData[$i]))?stripslashes($result->metaData[$i]->description):old('description'.$country->language) !!}</textarea>
                                        </div>
                                    </div>
                                    {{--<div class="form-group">
                                        <label class="col-md-3 control-label" for="content{!! $country->language !!}">Content</label>
                                        <div class="col-md-12">
                                            <textarea id="content{!! $country->language !!}" data-id="content{!! $country->language !!}" name="content{!! $country->language !!}" class="ckeditor">{!! (!empty($result) && $result != null && !empty($result->metaData[$i]))?stripslashes($result->metaData[$i]->content):old('content'.$country->language) !!}</textarea>
                                        </div>
                                    </div>--}}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="slug{!! $country->language !!}">Slug</label>
                                        <div class="col-md-9">
                                            <input type="text" id="slug{!! $country->language !!}" name="slug{!! $country->language !!}" class="form-control" value="{!! (!empty($result) && $result != null && !empty($result->metaData[$i]))?$result->metaData[$i]->slug:old('slug'.$country->language) !!}" placeholder="Slug">
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
                                    <input type="text" id="name" name="name" data-lang="general" data-id="{!! (!empty($result))?$result->id:0 !!}" data-url="{!! url('admin/banner/check-link') !!}" class="form-control" value="{!! (!empty($result))?$result->name:old('name') !!}" placeholder="Name...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="description">Description</label>
                                <div class="col-md-9">
                                    <textarea id="description" name="description" class="form-control" rows="5">{!! (!empty($result))?stripslashes($result->description):old('description') !!}</textarea>
                                </div>
                            </div>
                            {{--<div class="form-group">
                                <label class="col-md-3 control-label" for="content">Content</label>
                                <div class="col-md-12">
                                    <textarea id="content" name="content" class="ckeditor" data-id="content">{!! (!empty($result))?stripslashes($result->content):old('content') !!}</textarea>
                                </div>
                            </div>--}}
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slug">Slug</label>
                                <div class="col-md-9">
                                    <input type="text" id="slug" name="slug" class="form-control" value="{!! (!empty($result))?$result->slug:old('slug') !!}" placeholder="Slug">
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
                                <input type="checkbox" id="publish" name="publish" @if(!empty($result) && $result->publish == 1) checked @elseif($action == 'Create') checked @endif><span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Featured?</label>
                        <div class="col-md-9">
                            <label class="switch switch-primary">
                                <input type="checkbox" id="featured" name="featured" @if(!empty($result) && $result->featured == 1) checked @endif><span></span>
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
                <form action="{!! url('admin/banner/meta-data') !!}" method="post" class="form-horizontal form-bordered">
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
                                    <textarea id="meta-description" name="meta-description" class="form-control" rows="6" placeholder="Enter meta description..">{!! (!empty($result))?$result->descriptions:old('meta-description') !!}</textarea>
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

            <!-- Product Images Block -->
            <div class="block">
                <!-- Product Images Title -->
                <div class="block-title">
                    <h2><i class="fa fa-picture-o"></i> <strong>Featured</strong> Images</h2>
                </div>
                <!-- END Product Images Title -->

                <!-- Product Images Content -->
                <div class="block-section">
                    <form id="my-awesome-dropzone" data-multiple="false" data-maxfile="1" action="{!! url('admin/banner/images') !!}" class="dropzone images">
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
                                    <a href="javascript:void(0)" class="btn btn-xs btn-danger delete-image" data-url="{!! url('admin/banner/delete-image') !!}" data-id="{!! $result->id !!}" data-token="{!! csrf_token() !!}"><i class="fa fa-trash-o"></i> Delete</a>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <!-- END Product Images Content -->
                </div>

                <!-- END Product Images Content -->
            </div>
            @if(!empty($result))
            <div class="block">
                <!-- Product Images Title -->
                <div class="block-title">
                    <h2><i class="fa fa-picture-o"></i> <strong>Multiple</strong> Images</h2>
                </div>
                <!-- END Product Images Title -->

                <!-- Product Images Content -->
                <div class="block-section">
                    <form id="multiple-dropzone" data-multiple="true" data-maxfile="5" action="{!! url('admin/banner/multiple-images') !!}" class="dropzone images">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" value="{!! (!empty($result))?$result->id:0 !!}">
                        <div class="dropzone-previews"></div>
                        <div class="fallback"> <!-- this is the fallback if JS isn't working -->
                            <input name="file" type="file" multiple />
                        </div>
                        <div class="help-block">5 files Max</div>
                        <div class="help-block">Max file size 2MB</div>
                    </form>
                    <div class="form-horizontal" style="padding-top: 15px;">
                        <div class="form-group form-actions">
                            <div class="col-md-9 col-md-offset-3">
                                <button id="multiple-images" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped table-vcenter">
                        <tbody>
                        @if(count($result->mediaData) > 0)
                            @foreach($result->mediaData as $media)
                            <tr>
                                <td style="width: 20%;">
                                    <a href="{!! Storage::url($media->images) !!}" data-toggle="lightbox-image">
                                        <img src="{!! Storage::url($media->images) !!}" alt="" class="img-responsive center-block" style="max-width: 110px;">
                                    </a>
                                </td>
                                <td class="text-center">
                                    <input name="media_title" value="{{ $media->name }}" placeholder="Title for image"  data-url="{!! url('admin/media/update-name') !!}" data-id="{!! $media->id !!}" data-token="{!! csrf_token() !!}" class="form-control">
                                    <input name="media_order" value="{{ $media->order_by }}" placeholder="Order"  data-url="{!! url('admin/media/update-order') !!}" data-id="{!! $media->id !!}" data-token="{!! csrf_token() !!}" class="form-control">
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-xs btn-danger delete-image" data-url="{!! url('admin/media/delete-image') !!}" data-id="{!! $media->id !!}" data-token="{!! csrf_token() !!}"><i class="fa fa-trash-o"></i> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <!-- END Product Images Content -->
                </div>

                <!-- END Product Images Content -->
            </div>
            @endif
            <!-- END Product Images Block -->
        </div>
    </div>
@endsection
