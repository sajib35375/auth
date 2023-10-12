<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                        <li><a href="{{ route('view.wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="{{ route('my.cart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                        <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
                        <li><a data-toggle="modal" href="#order_tracking_modal"><i class="icon fa fa-lock"></i>OrderTracking</a></li>
                        @auth
                        <li><a href="{{ route('dashboard') }}"><i class="icon fa fa-lock"></i>Profile</a></li>
                        @else
                            <li><a href="{{ url('/login') }}"><i class="icon fa fa-lock"></i>Login</a></li>
                        @endauth

                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">@if( session()->get('language')=='english' )Language  @else ভাষা @endif</span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if( session()->get('language')=='english' )

                                    <li><a href="{{ route('bangla.language') }}">বাংলা</a></li>
                                @else
                                    <li><a href="{{ route('english.language') }}">English</a></li>

                                @endif
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    @php
                        $setting = App\Models\SiteSetting::find(1);
                    @endphp
                    <div class="logo"> <a href="{{ route('home.index') }}"> <img src="{{ URL::to('') }}/images/logo/{{ $setting->logo }}" alt="logo"> </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= --> </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form method="POST" action="{{ route('search.product') }}">
                            @csrf
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>

                                        <ul class="dropdown-menu" role="menu" >
                                            @php
                                                $categories = App\Models\Category::all();
                                            @endphp
                                            @foreach( $categories as $category )
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">@if( session()->get('language')=='english' ){{ $category->category_name_en }}  @else {{ $category->category_name_ban }} @endif</a></li>
                                            @endforeach
                                        </ul>

                                    </li>
                                </ul>
                                <input id="search" onfocus="search_product_show()" onblur="search_product_hide()" name="search" class="search-field" placeholder="Search here..." />
                                <button type="submit" class="search-button"  ></button> </div>
                        </form>
                        <div id="adsearch"></div>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="Qty"></span></div>
                                <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price">
                                        <span class="sign">$</span><span class="value" id="cartSubTotal"></span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                            <div id="miniCart">

                            </div>


                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span  class="text">Sub Total :</span ><span class='price' id="SubTotal"></span> </div>
                                    <div class="clearfix"></div>
                                    <a href="#" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>
                                @php
                                $categories = App\Models\Category::all();
                                @endphp
                                @foreach( $categories as $category )
                                <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">@if( session()->get('language')=='english' ){{ $category->category_name_en }}  @else {{ $category->category_name_ban }} @endif</a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                @php
                                                    $subcategories = App\Models\SubCategory::where('category_id',$category->id)->get();
                                                @endphp
                                                @foreach( $subcategories as $subcat )
                                                <div class="row">

                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <a href="{{ route('catWise.product',$subcat->id) }}"><h2 class="title">@if( session()->get('language')=='english' ){{ $subcat->sub_cat_name_eng }}  @else {{ $subcat->sub_cat_name_ban }} @endif</h2></a>
                                                        @php
                                                        $subsubcat = App\Models\SubSubCategory::where('subcategory_id',$subcat->id)->get();
                                                        @endphp
                                                        @foreach( $subsubcat as $item )
                                                        <ul class="links">
                                                            <li><a href="{{ route('SubSubCatWise.product',$item->id) }}">@if( session()->get('language')=='english' ){{ $item->sub_subcategory_name_eng }}  @else {{ $item->sub_subcategory_name_bang }} @endif</a></li>

                                                        </ul>
                                                        @endforeach
                                                    </div>
                                                    <!-- /.col -->
                                                    @endforeach


                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="frontend/assets/images/banners/top-menu-banner.jpg" alt=""> </div>
                                                    <!-- /.yamm-content -->
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                @endforeach


                                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                                <li class="dropdown  navbar-right special-menu"> <a href="{{ route('blog.index') }}">Blog</a> </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

{{--    order tracking modal--}}

    <div id="order_tracking_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Order Tracking</h2>
                </div>
                <div class="modal-body">

                        <form action="{{ route('tracking.order') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Input Invoice Number</label>
                                <input name="order_track" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <input value="Track Now" class="btn btn-danger" type="submit">
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>

</header>

<style>

    .search-area {
        position: relative;
    }



    #adsearch {
        position: absolute;
        top: 100%;
        left: 0px;
        width: 100%;
        z-index: 999;
        background: white;
        margin-top: 10px;
        border-radius: 15px;
    }




</style>

<script>
    function search_product_show(){
        $('#adsearch').slideDown();
    }

    // function search_product_hide(){
    //     $('#adsearch').slideUp();
    // }


</script>
