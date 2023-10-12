@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp
<section class="sidebar">

    <div class="user-profile">
        <div class="ulogo">
            <a href="index.html">
                <!-- logo for regular state and mobile devices -->
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{ URL::to('backend/images/logo-dark.png') }}" alt="">
                    <h3><b>Sajib</b> Admin</h3>
                </div>
            </a>
        </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i data-feather="pie-chart"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @php
        $brand = (auth()->guard('admin')->user()->brand == 1);
        $category = (auth()->guard('admin')->user()->category == 1);
        $product = (auth()->guard('admin')->user()->product == 1);
        $slider = (auth()->guard('admin')->user()->slider == 1);
        $coupon = (auth()->guard('admin')->user()->coupon == 1);
        $shipping = (auth()->guard('admin')->user()->shipping == 1);
        $order = (auth()->guard('admin')->user()->order_pro == 1);
        $report = (auth()->guard('admin')->user()->report == 1);
        $user = (auth()->guard('admin')->user()->user == 1);
        $stock = (auth()->guard('admin')->user()->stock == 1);
        $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
        $review = (auth()->guard('admin')->user()->review == 1);
        $blog = (auth()->guard('admin')->user()->blog == 1);
        $setting = (auth()->guard('admin')->user()->setting == 1);
        $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
        @endphp
        @if( $brand )
        <li class="treeview">
            <a href="#">
                <i data-feather="message-circle"></i>
                <span>Brands</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route=='brand.index')?'active':'' }}"><a href="{{ route('brand.index') }}"><i class="ti-more"></i>All Brand</a></li>
            </ul>
        </li>
        @endif
        @if( $category )
        <li class="treeview {{ ($route=='all.category')?'active':'' }} ">
            <a href="">
                <i data-feather="mail"></i> <span>Category</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route=='all.category')?'active':'' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
                <li class="{{ ($route=='all.subcategory')?'active':'' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All SubCategory</a></li>
                <li class="{{ $route=='sub.subcategory'?'active':'' }}"><a href="{{ route('sub.subcategory') }}"><i class="ti-more"></i>Sub-SubCategory</a></li>
            </ul>
        </li>
        @endif
        @if( $product )
        <li class="treeview">
            <a href="#">
                <i data-feather="file"></i>
                <span>Products</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='add.product'?'active':'' }}"><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Product</a></li>
                <li class="{{ $route=='manage.product'?'active':'' }}"><a href="{{ route('manage.product') }}"><i class="ti-more"></i>Manage Product</a></li>

            </ul>
        </li>
        @endif
        @if( $slider )
        <li class="treeview">
            <a href="#">
                <i data-feather="file"></i>
                <span>Sliders</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='slider.show'?'active':'' }}"><a href="{{ route('slider.show') }}"><i class="ti-more"></i>Manage Sliders</a></li>


            </ul>
        </li>
        @endif
        @if( $coupon )
        <li class="treeview">
            <a href="#">
                <i data-feather="file"></i>
                <span>Coupon</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='manage.coupon'?'active':'' }}"><a href="{{ route('manage.coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>


            </ul>
        </li>
        @endif
        @if( $shipping )
        <li class="treeview">
            <a href="#">
                <i data-feather="file"></i>
                <span>Shipping</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='all.division'?'active':'' }}"><a href="{{ route('all.division') }}"><i class="ti-more"></i>Division</a></li>
                <li class="{{ $route=='all.district'?'active':'' }}"><a href="{{ route('all.district') }}"><i class="ti-more"></i>District</a></li>
                <li class="{{ $route=='all.state'?'active':'' }}"><a href="{{ route('all.state') }}"><i class="ti-more"></i>State</a></li>


            </ul>
        </li>
        @endif

        @if( $order )
        <li class="treeview">
            <a href="#">
                <i data-feather="file"></i>
                <span>Orders</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='pending.orders'?'active':'' }}"><a href="{{ route('pending.orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
                <li class="{{ $route=='confirm.order'?'active':'' }}"><a href="{{ route('confirm.order') }}"><i class="ti-more"></i>Confirm Orders</a></li>
                <li class="{{ $route=='processing.order'?'active':'' }}"><a href="{{ route('processing.order') }}"><i class="ti-more"></i>Processing Orders</a></li>
                <li class="{{ $route=='picked.order'?'active':'' }}"><a href="{{ route('picked.order') }}"><i class="ti-more"></i>Picked Orders</a></li>
                <li class="{{ $route=='shipped.order'?'active':'' }}"><a href="{{ route('shipped.order') }}"><i class="ti-more"></i>Shipped Orders</a></li>
                <li class="{{ $route=='delivered.order'?'active':'' }}"><a href="{{ route('delivered.order') }}"><i class="ti-more"></i>Delivered Orders</a></li>
                <li class="{{ $route=='cancel.order'?'active':'' }}"><a href="{{ route('cancel.order') }}"><i class="ti-more"></i>Cancel Orders</a></li>


            </ul>
        </li>
        @endif

        @if( $report )
        <li class="treeview">
            <a href="#">
                <i data-feather="credit-card"></i>
                <span>Reports</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='all.report'?'active':'' }}"><a href="{{ route('all.report') }}"><i class="ti-more"></i>All Reports</a></li>

            </ul>
        </li>
        @endif
        @if( $user )
        <li class="treeview">
            <a href="#">
                <i data-feather="credit-card"></i>
                <span>All User</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='all.user'?'active':'' }}"><a href="{{ route('all.user') }}"><i class="ti-more"></i>All User</a></li>

            </ul>
        </li>
        @endif
        @if( $adminuserrole )
        <li class="treeview">
            <a href="#">
                <i data-feather="credit-card"></i>
                <span>Admin User</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='admin.user'?'active':'' }}"><a href="{{ route('admin.user') }}"><i class="ti-more"></i>All User</a></li>
                <li class="{{ $route=='add.admin.user'?'active':'' }}"><a href="{{ route('add.admin.user') }}"><i class="ti-more"></i>Add Admin User</a></li>

            </ul>
        </li>
        @endif
        @if( $stock )

        <li class="treeview">
            <a href="#">
                <i data-feather="credit-card"></i>
                <span>Manage Stock</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='product.stock'?'active':'' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a></li>

            </ul>
        </li>
        @endif


        @if( $returnorder )
        <li class="treeview">
            <a href="#">
                <i data-feather="credit-card"></i>
                <span>Return Order</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='return.order'?'active':'' }}"><a href="{{ route('return.order') }}"><i class="ti-more"></i>Return Request</a></li>
                <li class="{{ $route=='all.return.order.approve'?'active':'' }}"><a href="{{ route('all.return.order.approve') }}"><i class="ti-more"></i>All Approve Request</a></li>

            </ul>
        </li>
        @endif
        @if( $review )
        <li class="treeview">
            <a href="#">
                <i data-feather="credit-card"></i>
                <span>Review</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='pending.review'?'active':'' }}"><a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a></li>
                <li class="{{ $route=='approve.review.show'?'active':'' }}"><a href="{{ route('approve.review.show') }}"><i class="ti-more"></i>All Approve Review</a></li>

            </ul>
        </li>
        @endif





        <li class="header nav-small-cap">EXTRA</li>
        @if( $blog )
        <li class="treeview">
            <a href="#">
                <i data-feather="credit-card"></i>
                <span>Blog</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='blag.category'?'active':'' }}"><a href="{{ route('blag.category') }}"><i class="ti-more"></i>Blog Category</a></li>
                <li class="{{ $route=='add.new.post'?'active':'' }}"><a href="{{ route('add.new.post') }}"><i class="ti-more"></i>Add new Blog Post</a></li>
                <li class="{{ $route=='view.new.post'?'active':'' }}"><a href="{{ route('view.new.post') }}"><i class="ti-more"></i>View Blog Post</a></li>

            </ul>
        </li>

        @endif

        @if( $setting )
        <li class="treeview">
            <a href="#">
                <i data-feather="credit-card"></i>
                <span>Site-Setting</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='site.setting'?'active':'' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Manage Site-Setting</a></li>
                <li class="{{ $route=='seo.page'?'active':'' }}"><a href="{{ route('seo.page') }}"><i class="ti-more"></i>Manage Seo-Setting</a></li>


            </ul>
        </li>

        @endif

    </ul>
</section>
