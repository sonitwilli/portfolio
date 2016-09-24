function Init_JS() {
    //Error Block
    $('div.alert').delay(5000).slideUp();

    //Detail Portfolio
    // $('.item_content').click(function () {
    //    var menu_id = $('.item_content').html();
    //    console.log(menu_id);
    // });

    //Home Portfolio
    $('.web').addClass('active');
    $('.web_content').show();
    $('.print').removeClass('active');
    $('.print_content').css('display', 'none');
    $('.app').removeClass('active');
    $('.app_content').css('display', 'none');
    $('.brand').removeClass('active');
    $('.brand_content').css('display', 'none');

    $('.web').click(function () {
        console.log('web');
        $('.app').removeClass('active');
        $('.app_content').css('display','none');
        $('.print').removeClass('active');
        $('.print_content').css('display','none');
        $('.brand').removeClass('active');
        $('.brand_content').css('display','none');
        $('.web').addClass('active');
        $('.web_content').show();
    });
    $('.print').click(function () {
        console.log('print');
        $('.web').removeClass('active');
        $('.web_content').css('display','none');
        $('.app').removeClass('active');
        $('.app_content').css('display','none');
        $('.brand').removeClass('active');
        $('.brand_content').css('display','none');
        $('.print').addClass('active');
        $('.print_content').show();
    });
    $('.app').click(function () {
        console.log('app');
        $('.web').removeClass('active');
        $('.web_content').css('display','none');
        $('.print').removeClass('active');
        $('.print_content').css('display','none');
        $('.brand').removeClass('active');
        $('.brand_content').css('display','none');
        $('.app').addClass('active');
        $('.app_content').show();
    });
    $('.brand').click(function () {
        console.log('brand');
        $('.web').removeClass('active');
        $('.web_content').css('display','none');
        $('.print').removeClass('active');
        $('.print_content').css('display','none');
        $('.app').removeClass('active');
        $('.app_content').css('display','none');
        $('.brand').addClass('active');
        $('.brand_content').show();
    });

    //Home Our Team
    $('.flexslider.owl-ourteam').flexslider({
        animation: "slide",
        direction: "vertical",
        slideshow: false
    });
    $('.home-ourteam-wrapper .nav-up').click(function () {
        $('.owl-ourteam .flex-next').click();
    });
    $('.home-ourteam-wrapper .nav-down').click(function () {
        $('.owl-ourteam .flex-prev').click();
    });

    //Team Page
    var $teamItem = $('.open-ourteam-id');
    $teamItem.click(function(){
        var $this = $(this);
        var teamid = $this.data('ourteamid');
        if($this.hasClass('active')) {return false;}
        // set status -- ourteam block
        $teamItem.removeClass('active');
        $this.addClass('active');
        // open large ourteam
        $('.block-ourteam-exp.item.active').addClass('closing');
        setTimeout(function(){
            $('.block-ourteam-exp.item.active').removeClass('closing');
            $('.block-ourteam-exp.item.active').removeClass('active');
            // active current id
            $('#'+teamid).addClass('opening');
            setTimeout(function(){
                $('#'+teamid).removeClass('opening');
                $('#'+teamid).addClass('active');
            },1100);
        }, 1000);
    });

    //About Page

            $('.popup-with-form').magnificPopup({
                type: 'inline',
                preloader: false,
                mainClass: 'mfp-fade',
                removalDelay: 300,
//			  focus: '#name',

                // When elemened is focused, some mobile browsers in some cases zoom in
                // It looks not nice, so we disable it:
                callbacks: {
                    beforeOpen: function() {
                        if($(window).width() < 700) {
                            this.st.focus = false;
                        } else {
//					this.st.focus = '#name';
                        }
                    }
                }
            });



    // var jssor_1_options = {
    //     $AutoPlay: false,
    //     $DragOrientation: 0,
    //     $PlayOrientation: 2,
    //     $ArrowNavigatorOptions: {
    //         $Class: $JssorArrowNavigator$
    //     },
    // };
    //
    // var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
    //
    // function ScaleSlider() {
    //     var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
    //     if (refSize) {
    //         refSize = Math.min(refSize, 817);
    //         jssor_1_slider.$ScaleWidth(refSize);
    //     }
    //     else {
    //         window.setTimeout(ScaleSlider, 30);
    //     }
    // }
    // ScaleSlider();
    // $(window).bind("load", ScaleSlider);
    // $(window).bind("resize", ScaleSlider);
    // $(window).bind("orientationchange", ScaleSlider);
    // //responsive code end
    //
    // $('.nav-about2 .button--previous').click(function(){
    //     var total = parseInt($('.nav-about2 .input-total').val());
    //     var current = parseInt($('.nav-about2 .input-current-value').val());
    //     if(current <= 1) {return false;}
    //     $('.jssora08l').click();
    //     var newCurrent = current - 1;
    //     $('.nav-about2 .number .count').html(newCurrent<10?'0'+newCurrent:newCurrent);
    //     $('.nav-about2 .input-current-value').val(newCurrent);
    // });
    // $('.nav-about2 .button--next').click(function(){
    //     var total = parseInt($('.nav-about2 .input-total').val());
    //     var current = parseInt($('.nav-about2 .input-current-value').val());
    //     if(current >= total) {return false;}
    //     $('.jssora08r').click();
    //     var newCurrent = current + 1;
    //     $('.nav-about2 .number .count').html(newCurrent<10?'0'+newCurrent:newCurrent);
    //     $('.nav-about2 .input-current-value').val(newCurrent);
    // });

}


