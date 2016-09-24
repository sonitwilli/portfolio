/**
 * Created by phuongle on 19/08/2016.
 */
var initMap = function () {
    var txtLongitude = $("#txtLongitude").val(), txtLatitude = $("#txtLatitude").val();
    if(txtLongitude == '') {
        txtLongitude = "106.71762039999999";
    }
    if(txtLatitude == '') {
        txtLatitude = "10.7927837";
    }
    var LatLng = new google.maps.LatLng(txtLatitude,txtLongitude);
    var map = new google.maps.Map(document.getElementById('mapCanvas'), {
        center: LatLng,
        zoom: 17,
        scrollwheel:  false
    });
    var input = /** @type {!HTMLInputElement} */(
        document.getElementById('txtAddress'));

    var types = document.getElementById('type-selector');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        position: LatLng,
        anchorPoint: new google.maps.Point(0, -29),
        draggable: true
    });

    google.maps.event.addListener(marker,"drag",function () {
        infowindow.setContent('<div><strong>' + $("#txtAddress").val() + '</strong><br> draging...');
        updateMarkerPosition(marker.getPosition());
    });
    google.maps.event.addListener(marker, "dragend", function () {
        geocodePosition(marker.getPosition());
    });

    autocomplete.addListener('place_changed', function() {
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }


        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
            map.setZoom(17);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.

        }
        marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        updateMarkerPosition(marker.getPosition());
        geocodePosition(marker.getPosition());
        infowindow.open(map, marker);

        google.maps.event.addListener(marker,"drag",function () {
            infowindow.setContent('<div><strong>' + place.name + '</strong><br> draging...');
            updateMarkerPosition(marker.getPosition());
        });
        google.maps.event.addListener(marker, "dragend", function () {
            geocodePosition(marker.getPosition());
        })
    });

    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.
    function setupClickListener(id, types) {
        var radioButton = document.getElementById(id);
        radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
        });
    }

    var geocoder = new google.maps.Geocoder();

    function geocodePosition(pos) {
        geocoder.geocode({
            latLng: pos
        }, function(responses) {
            if (responses && responses.length > 0) {
                $("#txtAddress").val(responses[0].formatted_address);
                infowindow.setContent('<div><strong>' + responses[0].formatted_address + '</strong><br>' + responses[0].formatted_address);
            } else {
                infowindow.setContent('<div><strong>Cannot determine address at this location.</strong><br>');
            }
        });
    }

    function updateMarkerPosition(latLng) {
        document.getElementById('txtLatitude').value = latLng.lat();
        document.getElementById('txtLongitude').value = latLng.lng();
        txtLatitude = latLng.lat();
        txtLongitude = latLng.lng();
    }




    setupClickListener('changetype-all', []);
    setupClickListener('changetype-address', ['address']);
    setupClickListener('changetype-establishment', ['establishment']);
    setupClickListener('changetype-geocode', ['geocode']);
}
var form_url = $("form#my-awesome-dropzone").attr('action'),
    multiple = $("form#my-awesome-dropzone").data('multiple'),
    maxfile = $("form#my-awesome-dropzone").data('maxfile');
Dropzone.options.myAwesomeDropzone = {
    url: form_url,
    autoProcessQueue: false,
    uploadMultiple: multiple,
    parallelUploads: maxfile,
    maxFiles: maxfile,
    paramName: "images",
    createImageThumbnails: true,
    maxThumbnailFilesize: maxfile,
    acceptedFiles: "image/*",
    maxFilesize: 5,

    init: function() {
        var myDropzone = this;

        // Here's the change from enyo's tutorial...

        $("#submit-all").click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
            setTimeout(function(){location.reload()}, 1000);
        });
        this.on("addedfile", function (file) {

            // Create the remove button
            var removeButton = Dropzone.createElement("<div class='text-center'><button class='btn btn-xs btn-danger'>Remove File</button></div>");

            // Listen to the click event
            removeButton.addEventListener("click", function (e) {
                // Make sure the button click doesn't submit the form:
                e.preventDefault();
                e.stopPropagation();

                // Remove the file preview.
                myDropzone.removeFile(file);
                // If you want to the delete the file on the server as well,
                // you can do the AJAX request here.
            });

            // Add the button to the file preview element.
            file.previewElement.appendChild(removeButton);
        });
    }

};
var form_url = $("form#multiple-dropzone").attr('action'),
    multiple = $("form#multiple-dropzone").data('multiple'),
    maxfile = $("form#multiple-dropzone").data('maxfile');
Dropzone.options.multipleDropzone = {
    url: form_url,
    autoProcessQueue: false,
    uploadMultiple: multiple,
    parallelUploads: maxfile,
    maxFiles: maxfile,
    paramName: "images",
    createImageThumbnails: true,
    maxThumbnailFilesize: maxfile,
    acceptedFiles: "image/*",
    maxFilesize: 5,

    init: function() {
        var myDropzone = this;

        // Here's the change from enyo's tutorial...

        $("#multiple-images").click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
            setTimeout(function(){location.reload()}, 1000);
        });
        this.on("addedfile", function (file) {

            // Create the remove button
            var removeButton = Dropzone.createElement("<div class='text-center'><button class='btn btn-xs btn-danger'>Remove File</button></div>");

            // Listen to the click event
            removeButton.addEventListener("click", function (e) {
                // Make sure the button click doesn't submit the form:
                e.preventDefault();
                e.stopPropagation();

                // Remove the file preview.
                myDropzone.removeFile(file);
                // If you want to the delete the file on the server as well,
                // you can do the AJAX request here.
            });

            // Add the button to the file preview element.
            file.previewElement.appendChild(removeButton);
        });
    }

};
var MasterJs = function () {
    var masterjs = {
        view: {
            check_status: "span.check_status",
            update_order: "input.update_order",
            change_group: "select.change_group",
            price: "input[name='price']",
            media_title: "input[name='media_title']",
            media_order: "input[name='media_order']",
            update_status_order: ".update-status-orders",
            hidden_del:".hidden-delete"
        },
        onSubmit:function (data, url, method, callback) {
            $.ajax({
                method:method,
                url:url,
                data:data,
                success:function (data) {
                    if (typeof callback !== 'undefined'){
                        callback(data)
                    }
                }
            });
        }
    };
    return {
        init: function () {
            if (hidden_delete == 1) {
                $(masterjs.view.hidden_del).remove();
            }
            var check_status = $('body').on('click',masterjs.view.check_status, function () {
                var url = $(this).data('url'), $this = $(this);
                $.ajax({
                    url:url,
                    method: "GET",
                    success: function (data) {
                        if(data.status == 200) {
                            if(data.result == "hidden" || data.result == "normal"){
                                $this.removeClass("label-success");
                                $this.addClass("label-danger");
                                $this.html(data.result);
                            } else {
                                $this.removeClass("label-danger");
                                $this.addClass("label-success");
                                $this.html(data.result);
                            }
                        }
                    }
                })
            }); check_status;
            var update_order = $('body').on('keyup',masterjs.view.update_order, function () {
                var url = $(this).data('url'), $this = $(this);
                $.ajax({
                    url:url,
                    method: "GET",
                    data:{val:$this.val()},
                    success: function (data) {
                        if(data.status == 200) {
                            $this.val(data.result)
                        }
                    }
                })
            }); update_order;
            $('.ckeditor').each(function () {
                CKEDITOR.replace( $(this).data('id'),
                    {
                        filebrowserBrowseUrl : '/backend/js/helpers/ckeditor/ckfinder/ckfinder.html',
                        filebrowserImageBrowseUrl : '/backend/js/helpers/ckeditor/ckfinder/ckfinder.html?type=Images',
                        filebrowserFlashBrowseUrl : '/backend/js/helpers/ckeditor/ckfinder/ckfinder.html?type=Flash',
                        filebrowserUploadUrl : '/backend/js/helpers/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                        filebrowserImageUploadUrl : '/backend/js/helpers/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl : '/backend/js/helpers/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                        filebrowserWindowWidth : '700',
                        filebrowserWindowHeight : '500'
                });
            });
            $('body').on('change',masterjs.view.change_group, function () {
               var url = $(this).data('url'), val = $(this).val();
                $.ajax({
                    url:url,
                    data:{val:val},
                    method:'GET'
                })
            });
            $(masterjs.view.price).priceFormat({
                clearPrefix: true,
                prefix: '',
                centsLimit:0
            });
            $(masterjs.view.media_title).keydown(function (event) {
                var url = $(this).data('url'), id = $(this).data('id'), token = $(this).data('token'), value = $(this).val();
                if (event.which == 13){
                    event.preventDefault();
                }
            }).change(function () {
                var url = $(this).data('url'), id = $(this).data('id'), token = $(this).data('token'), value = $(this).val();
                masterjs.onSubmit({id:id, _token:token, name:value}, url, "POST",function (data) {
                    if(data.status == 200){
                        var growlType = "success";
                        $.bootstrapGrowl('<h4>Hi there!</h4> <p>You already updated!</p>', {
                            type: growlType,
                            delay: 2500,
                            allow_dismiss: true
                        });
                    }
                });
            });
            $(masterjs.view.media_order).change(function () {
                var url = $(this).data('url'), id = $(this).data('id'), token = $(this).data('token'), value = $(this).val();
                masterjs.onSubmit({id:id, _token:token, order_by:value}, url, "POST",function (data) {
                    if(data.status == 200){
                        var growlType = "success";
                        $.bootstrapGrowl('<h4>Hi there!</h4> <p>You already updated!</p>', {
                            type: growlType,
                            delay: 2500,
                            allow_dismiss: true
                        });
                    }
                });
            });
            $("body").on('click',masterjs.view.update_status_order, function (event) {
                var url = $(this).data('url'), id = $(this).data('id'), value = $(this).data('value'), $this = $(this);
                masterjs.onSubmit({id:id, value:value},url,"GET",function (data) {
                    if(data.status == 200){
                        $this.parents('div.btn-group').children('a').html(data.data);
                        $('body').click();
                    }
                    
                })
                event.preventDefault();
            })
        }
    };
}();
(function () {
    $('.scroller').each(function() {
        if ($(this).attr("data-initialized")) {
            return; // exit
        }
        var height;
        if ($(this).attr("data-height")) {
            height = $(this).attr("data-height");
        } else {
            height = $(this).css('height');
        }

        $(this).slimScroll({
            allowPageScroll: true, // allow page scroll when the element scroll is ended
            size: '7px',
            color: ($(this).attr("data-handle-color") ? $(this).attr("data-handle-color") : '#bbb'),
            wrapperClass: ($(this).attr("data-wrapper-class") ? $(this).attr("data-wrapper-class") : 'slimScrollDiv'),
            railColor: ($(this).attr("data-rail-color") ? $(this).attr("data-rail-color") : '#eaeaea'),
            position: 'right',
            height: height,
            alwaysVisible: ($(this).attr("data-always-visible") == "1" ? true : false),
            railVisible: ($(this).attr("data-rail-visible") == "1" ? true : false),
            disableFadeOut: true
        });

        $(this).attr("data-initialized", "1");
    });
    var delete_image = $(".delete-image").on("click",function () {
        var id = $(this).data('id'),
            url = $(this).data('url'),
            _token = $(this).data('token'),
            $this = $(this);
        $.ajax({
            url:url,
            data:{id:id,_token:_token},
            method:'post',
            success:function (data) {
                if (data.status === 200){
                    $.bootstrapGrowl('<h4>Hi there!</h4> <p>You already updated!</p>', {
                        type: "success",
                        delay: 2500,
                        allow_dismiss: true
                    });
                    $this.parents('tr').remove();
                }

            }
        })

    }); delete_image;
    var delete_all = $('.delete-all').on('click', function(){
        if(confirm('Are you sure???'))
            $(this).parents('form').submit();
        else
            return false;
    }); delete_all;
    var auto_links = $("input[name*='name']").keyup(function () {
        var links, name = $(this).val(), lang = $(this).data('lang');
        links = cleanUnicode(name);
        if(lang=='general'){
            $("input[name='slug']").val(links);
        } else {
            $("input[name='slug"+lang+"']").val(links);
        }
    }).keydown(function( event ) {
        if ( event.which == 13 ) {
            event.preventDefault();
        }
    }).change(function () {
        var links, name = $(this).val(), lang = $(this).data('lang'), url = $(this).data('url'), id = $(this).data('id');
        links = cleanUnicode(name);
        $.ajax({
             url:url,
             data:{slug:links,lang:lang,id:id},
             method:'GET',
             success:function (data) {
                 if(lang=='general'){
                     $("input[name='slug']").val(data.result);
                 } else {
                     $("input[name='slug"+lang+"']").val(data.result);
                 }
            }
         })
    }); auto_links;
    $('.scroller input').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue',
        increaseArea: '20%' // optional
    });
    var cleanUnicode = function (str){
        str= str.toLowerCase();
        str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
        str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
        str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
        str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
        str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
        str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
        str= str.replace(/đ/g,"d");
        str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|\;|\||\{|\}|\~|\“|\”|\™|\–|\-/g,"-");
        str= str.replace(/^\-+|\-+$|\_/g,"");
        str= str.replace(/\\/g,"");
        str= str.replace(/-+-/g,"-");
        return str;
    }
    MasterJs.init();
    Index.init();
})(jQuery);

