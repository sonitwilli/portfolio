@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <!-- General Data Block -->
            <div class="block">
                <!-- General Data Title -->
                <div class="block-title">
                    <h2><i class="fa fa-pencil"></i> <strong>General</strong> Data</h2>
                </div>
                <!-- END General Data Title -->

                <!-- General Data Content -->
                <form action="{!! url('admin/setting/content') !!}" method="post" class="form-horizontal form-bordered">
                    {!! csrf_field() !!}
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
                        <label class="col-md-3 control-label" for="product-category">Add Language</label>
                        <div class="col-md-8">
                            <!-- Chosen plugin (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://harvesthq.github.io/chosen/ -->
                            <select id="language" name="language[]" class="select-chosen" data-placeholder="Choose language.." style="width: 250px;" multiple>
                                @if(count($country) > 0)
                                    @foreach($country as $k)
                                        @if(count($result) > 0 && $result->language != null && in_array($k->id, explode(",",$result->language)))
                                            <option value="{!! $k->id !!}" selected>{!! $k->name !!}</option>
                                        @else
                                            <option value="{!! $k->id !!}">{!! $k->name !!}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            <div class="help-block">default:{!! url('en') !!}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Name</label>
                        <div class="col-md-9">
                            <input type="text" id="name" name="name" class="form-control" value="{!! ($result)?$result->name:old('name') !!}" placeholder="Company name...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="address">Address</label>
                        <div class="col-md-9">
                            <input type="text" id="address" name="address" class="form-control" value="{!! ($result)?$result->address:old('address') !!}" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="email">Email</label>
                        <div class="col-md-9">
                            <input type="text" id="email" name="email" class="form-control" value="{!! ($result)?$result->email:old('email') !!}" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="phone">Phone</label>
                        <div class="col-md-9">
                            <input type="text" id="phone" name="phone" class="form-control" value="{!! ($result)?$result->phone:old('phone') !!}" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Latitude:</b></label>
                        <div class="col-md-9">
                            <input name="latitude" id="txtLatitude" class="form-control" value="{!! ($result)?$result->lat:old('latitude') !!}" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Longitude:</b></label>
                        <div class="col-md-9">
                            <input name="longitude" id="txtLongitude" class="form-control" value="{!! ($result)?$result->lng:old('longitude') !!}" type="text">
                        </div>
                    </div>
                    <input placeholder="14 Ham Nghi st. Ben Nghe Ward, 1 District" id="txtAddress" class="controls" value="{!! ($result)?$result->address:old('address') !!}" type="text">
                    <div id="type-selector" class="controls hidden">
                        <input type="radio" name="type" id="changetype-all" checked="checked">
                        <label for="changetype-all">All</label>

                        <input type="radio" name="type" id="changetype-establishment">
                        <label for="changetype-establishment">Establishments</label>

                        <input type="radio" name="type" id="changetype-address">
                        <label for="changetype-address">Addresses</label>

                        <input type="radio" name="type" id="changetype-geocode">
                        <label for="changetype-geocode">Geocodes</label>
                    </div>
                    <div id="mapCanvas" style="width: 100%; height: 350px;"></div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Published?</label>
                        <div class="col-md-9">
                            <label class="switch switch-primary">
                                <input type="checkbox" id="status" name="status" checked><span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                        </div>
                    </div>
                </form>
                <!-- END General Data Content -->
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
                <form action="{!! url('admin/setting/meta-data') !!}" method="post" class="form-horizontal form-bordered">
                    {!! csrf_field() !!}
                    <!-- Default Tabs -->
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active"><a href="#tabs-general" data-toggle="tooltip" title="Language General">General</a></li>
                        @if(count($result) > 0 && $result->language != null)
                        <?php $language = explode(",", $result->language);?>
                        @foreach($language as $k)
                            <?php $country = Models\Languages::where('id',$k)->first()?>
                            <li><a href="#tabs-{!! $country->language !!}" data-toggle="tooltip" title="Language {!! $country->language !!}">{!! $country->name !!}</a></li>
                        @endforeach
                        @endif

                    </ul>

                    <div class="tab-content">
                        @if(count($result) > 0 && $result->language != null)
                            <?php $language = explode(",", $result->language); $i = 0;?>
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
                        <div class="tab-pane active" id="tabs-general">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="meta-title">Meta Title</label>
                                <div class="col-md-9">
                                    <input type="text" id="meta-title" name="meta-title" class="form-control" value="{!! ($result)?$result->title:old('meta-title') !!}" placeholder="Enter meta title..">
                                    <div class="help-block">55 Characters Max</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="meta-keywords">Meta Keywords</label>
                                <div class="col-md-9">
                                    <input type="text" id="meta-keywords" name="meta-keywords" class="form-control" value="{!! ($result)?$result->keywords:old('meta-keywords') !!}" placeholder="keyword1, keyword2, keyword3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="meta-description">Meta Description</label>
                                <div class="col-md-9">
                                    <textarea id="meta-description" name="meta-description" class="form-control" rows="6" placeholder="Enter meta description..">{!! ($result)?$result->description:old('meta-description') !!}</textarea>
                                    <div class="help-block">115 Characters Max</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="google-plus">Google plus</label>
                        <div class="col-md-9">
                            <input type="text" id="google-plus" name="google-plus" class="form-control" value="{!! ($result)?$result->google_url:old('google-plus') !!}" placeholder="Enter google plus..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="facebook-plus">Facebook page</label>
                        <div class="col-md-9">
                            <input type="text" id="facebook-plus" name="facebook-plus" class="form-control" value="{!! ($result)?$result->facebook_url:old('facebook-plus') !!}" placeholder="Enter facebook page..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="twitter-page">Twitter page</label>
                        <div class="col-md-9">
                            <input type="text" id="twitter-page" name="twitter-page" class="form-control" value="{!! ($result)?$result->twitter_url:old('twitter-page') !!}" placeholder="Enter twitter page..">
                        </div>
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
                    <h2><i class="fa fa-picture-o"></i> <strong>Logo</strong> Images</h2>
                </div>
                <!-- END Product Images Title -->

                <!-- Product Images Content -->
                <div class="block-section">
                    <form id="my-awesome-dropzone" data-multiple="false" data-maxfile="1" action="{!! url('admin/setting/avatar') !!}" class="dropzone images">
                        {!! csrf_field() !!}
                        <div class="dropzone-previews"></div>
                        <div class="fallback"> <!-- this is the fallback if JS isn't working -->
                            <input name="file" type="file" multiple />
                        </div>
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
                            @if($result != null && $result->images != null)
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
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger delete-image" data-url="{!! url('admin/setting/delete-image') !!}" data-id="{!! $result->id !!}" data-token="{!! csrf_token() !!}"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- END Product Images Content -->
                </div>

                <!-- END Product Images Content -->
            </div>
            <!-- END Product Images Block -->
        </div>
    </div>
@endsection
