<div class="sidebar-content">
    <!-- Brand -->
    <a href="{!! url('admin/dashboard') !!}" class="sidebar-brand">
        <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>BCA</strong>CMS</span>
    </a>
    <!-- END Brand -->

    <!-- User Info -->
    <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
        <div class="sidebar-user-avatar">
            <a href="javascript:void(0)">
                <img src="{!! (Auth::user()->images == '')?"/backend/img/placeholders/avatars/avatar2.jpg":getImage(Auth::user()->images) !!}" alt="avatar">
            </a>
        </div>
        <div class="sidebar-user-name">{!! $user->name !!}</div>
        <div class="sidebar-user-links">
            <a href="{!! url('admin/user/edit/'.Auth::user()->id) !!}" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
            <a href="{!! url('admin/contact/index') !!}" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
            <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
            <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>
            <a href="{!! url('admin/user/logout') !!}" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
        </div>
    </div>
    <!-- END User Info -->

    <!-- Sidebar Navigation -->
    <ul class="sidebar-nav">
        <li>
            <a href="{!! url('admin') !!}" class="@if($active == 'dashboard') active @endif"><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
        </li>
        <li class="@if($active == 'ecommerce') active @endif">
            <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-shopping_cart sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">eCommerce</span></a>
            <ul>
                <li>
                    <a href="{!! url('admin/products/category') !!}" @if(!empty($sub_action) && $sub_action == "category") class="active" @endif>Categories</a>
                </li>
                <li>
                    <a href="{!! url('admin/products/orders') !!}" @if(!empty($sub_action) && $sub_action == "order") class="active" @endif>Orders</a>
                </li>
                <li>
                    <a href="{!! url('admin/products/list') !!}" @if(!empty($sub_action) && $sub_action == "products") class="active" @endif>Products</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-header">
            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a><a href="javascript:void(0)" data-toggle="tooltip" title="Create the most amazing pages with the widget kit!"><i class="fa fa-file-text-o"></i></a></span>
            <span class="sidebar-header-title">Article</span>
        </li>
        {{--<li>
            <a href="{!! url('admin/article/category') !!}" class="@if($active == 'article_category') active @endif"><i class="gi gi-list sidebar-nav-icon"></i>List Category</a>
        </li>--}}
        <li>
            <a href="{!! url('admin/article/list') !!}" class="@if($active == 'article') active @endif"><i class="fa fa-file-text sidebar-nav-icon"></i>Article</a>
        </li>
        <li class="sidebar-header">
            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
            <span class="sidebar-header-title">Banners</span>
        </li>
        {{--<li>
            <a href="{!! url('admin/banner/category') !!}" class="@if($active == 'banner_category') active @endif"><i class="gi gi-list sidebar-nav-icon"></i>List Category</a>
        </li>--}}
        <li>
            <a href="{!! url('admin/banner/list') !!}" class="@if($active == 'banner') active @endif"><i class="gi gi-pushpin sidebar-nav-icon"></i>Banner</a>
        </li>
        <li class="sidebar-header">
            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
            <span class="sidebar-header-title">Block</span>
        </li>
        <li>
            <a href="{!! url('admin/block/category') !!}" class="@if($active == 'block_category') active @endif"><i class="gi gi-list sidebar-nav-icon"></i>List Category</a>
        </li>
        <li>
            <a href="{!! url('admin/block/list') !!}" class="@if($active == 'block') active @endif"><i class="gi gi-pushpin sidebar-nav-icon"></i>Block</a>
        </li>
        <li class="sidebar-header">
            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
            <span class="sidebar-header-title">Attribute</span>
        </li>
        <li>
            <a href="{!! url('admin/menu') !!}" class="@if($active == 'menu') active @endif"><i class="gi gi-justify sidebar-nav-icon"></i>Menu</a>
        </li>
        <li>
            <a href="{!! url('admin/contact/list') !!}" class="@if($active == 'contact') active @endif"><i class="fa fa-envelope-o sidebar-nav-icon"></i>Contact</a>
        </li>
        <li>
            <a href="{!! url('admin/faqs/list') !!}" class="@if($active == 'faqs') active @endif"><i class="fa fa-question-circle sidebar-nav-icon"></i>FAQ</a>
        </li>
        <li class="sidebar-header">
            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
            <span class="sidebar-header-title">System</span>
        </li>
        @if(Auth::user()->type == 1)
        <li>
            <a href="{!! url('admin/user/list') !!}" class="@if($active == 'users') active @endif"><i class="gi gi-group sidebar-nav-icon"></i> Users</a>
        </li>
        @endif
        <li>
            <a href="{!! url('admin/setting/edit') !!}" class="@if($active == 'setting') active @endif"><i class="fa fa-wrench sidebar-nav-icon"></i>Setting</a>
        </li>
        <li>
            <a href="{!! url('admin/language/list') !!}" class="@if($active == 'language') active @endif"><i class="gi gi-globe sidebar-nav-icon"></i>Language</a>
        </li>
    </ul>
    <!-- END Sidebar Navigation -->

    <!-- Sidebar Notifications -->
    <div class="sidebar-header sidebar-nav-mini-hide">
        <span class="sidebar-header-options clearfix">
            <a href="javascript:void(0)" onclick="location.reload();"data-toggle="tooltip" title="Refresh"><i class="gi gi-refresh"></i></a>
        </span>
        <span class="sidebar-header-title">Activity</span>
    </div>
    <!-- END Sidebar Notifications -->
</div>

