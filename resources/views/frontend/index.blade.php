@extends('frontend.front_master')
@section('content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                  @include('frontend.product.vertical_menu')
                    <!-- ================================== TOP NAVIGATION : END ================================== -->

                    <!-- ============================================== HOT DEALS ============================================== -->
                  @include('frontend.body.hot_deals')
                    <!-- ============================================== HOT DEALS: END ============================================== -->

                    <!-- ============================================== SPECIAL OFFER ============================================== -->

                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">Special Offer</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">



                            @foreach( $special_offer as $offers )

                                <div class="item">
                                    <div class="products special-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="{{ route('product.details',$offers->id) }}"> <img src="{{ URL::to('') }}/images/thumbnail/{{ $offers->product_thumbnail }}" alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="{{ route('product.details',$offers->id) }}">@if( session()->get('language')=='english' ){{ $offers->product_name_eng }}@else{{ $offers->product_name_ban }}@endif </a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            @if( $offers->product_discount_price != null)
                                                            <div class="product-price"> <span class="price"> {{ $offers->product_discount_price }}$ </span> </div>
                                                            @else
                                                                <div class="product-price"> <span class="price"> {{ $offers->product_selling_price }}$ </span> </div>
                                                                @endif
                                                            <!-- /.product-price -->

                                                        </div>

                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>


                                    </div>
                                </div>

                                @endforeach





                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                    <!-- ============================================== PRODUCT TAGS ============================================== -->
                    @include('frontend.product.product_tags')
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                    <!-- ============================================== SPECIAL DEALS ============================================== -->

                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">Special Deals</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">



                                <div class="item">
                                    <div class="products special-product">
                                    @foreach( $special_deals as $special )


                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="{{ route('product.details',$special->id) }}"> <img src="{{ URL::to('') }}/images/thumbnail/{{ $special->product_thumbnail }}"  alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">@if( session()->get('language')=='english' ){{ $special->product_name_eng }}@else{{ $special->product_name_ban }}@endif</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price"> {{ $special->product_discount_price }} </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>

                                        @endforeach

                                    </div>
                                </div>




                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                        <h3 class="section-title">Newsletters</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <p>Sign Up for Our Newsletter!</p>
                            <form>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                                </div>
                                <button class="btn btn-primary">Subscribe</button>
                            </form>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                    <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                        <div id="advertisement" class="advertisement">
                            <div class="item">
                                <div class="avatar"><img src="frontend/assets/images/testimonials/member1.png" alt="Image"></div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">John Doe <span>Abc Company</span> </div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="frontend/assets/images/testimonials/member3.png" alt="Image"></div>
                                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="frontend/assets/images/testimonials/member2.png" alt="Image"></div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.item -->

                        </div>
                        <!-- /.owl-carousel -->
                    </div>

                    <!-- ============================================== Testimonials: END ============================================== -->

                    <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image"> </div>
                </div>
                <!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->


                <!-- ============================================== CONTENT ============================================== -->
<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
    <!-- ========================================== SECTION – HERO ========================================= -->

    <div id="hero">
        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

            @foreach( $sliders as $slider )

            <div class="item" style="background-image: url({{ URL::to('') }}/images/slider/{{ $slider->slider_img }});">
                <div class="container-fluid">
                    <div class="caption bg-color vertical-center text-left">
                        <div class="big-text fadeInDown-1"> @if( session()->get('language') == 'english' ){{ $slider->title_eng }} @else {{ $slider->title_ban }} @endif</div>
                        <div class="excerpt fadeInDown-2 hidden-xs"> <span>@if( session()->get('language') == 'english' ){{ $slider->short_des_eng }} @else {{ $slider->short_des_ban }} @endif</span> </div>
                        <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                    </div>
                    <!-- /.caption -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.item -->
        @endforeach

            <!-- /.item -->

        </div>
        <!-- /.owl-carousel -->
    </div>

    <!-- ========================================= SECTION – HERO : END ========================================= -->

    <!-- ============================================== INFO BOXES ============================================== -->
    <div class="info-boxes wow fadeInUp">
        <div class="info-boxes-inner">
            <div class="row">
                <div class="col-md-6 col-sm-4 col-lg-4">
                    <div class="info-box">
                        <div class="row">
                            <div class="col-xs-12">
                                <h4 class="info-box-heading green">money back</h4>
                            </div>
                        </div>
                        <h6 class="text">30 Days Money Back Guarantee</h6>
                    </div>
                </div>
                <!-- .col -->

                <div class="hidden-md col-sm-4 col-lg-4">
                    <div class="info-box">
                        <div class="row">
                            <div class="col-xs-12">
                                <h4 class="info-box-heading green">free shipping</h4>
                            </div>
                        </div>
                        <h6 class="text">Shipping on orders over $99</h6>
                    </div>
                </div>
                <!-- .col -->

                <div class="col-md-6 col-sm-4 col-lg-4">
                    <div class="info-box">
                        <div class="row">
                            <div class="col-xs-12">
                                <h4 class="info-box-heading green">Special Sale</h4>
                            </div>
                        </div>
                        <h6 class="text">Extra $5 off on all items </h6>
                    </div>
                </div>
                <!-- .col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.info-boxes-inner -->

    </div>
    <!-- /.info-boxes -->
    <!-- ============================================== INFO BOXES : END ============================================== -->
    <!-- ============================================== SCROLL TABS ============================================== -->
    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
        <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Products</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                @foreach( $all_cat as $cat )
                <li><a data-transition-type="backSlide" href="#category{{ $cat->id }}" data-toggle="tab">@if( session()->get('language')=='english' ){{ $cat->category_name_en }} @else {{ $cat->category_name_ban }} @endif</a></li>
                @endforeach
            </ul>
            <!-- /.nav-tabs -->
        </div>


        <div class="tab-content outer-top-xs">

            <div class="tab-pane active" id="all">
                <div class="product-slider">
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">


                            @foreach( $products as $product )


                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="{{ route('product.details',$product->id) }}"><img  src="{{ URL::to('') }}/images/thumbnail/{{ $product->product_thumbnail }}" alt=""></a> </div>
                                        <!-- /.image -->
                                        @php
                                         $discount = $product->product_selling_price - $product->product_discount_price;
                                        $percentage = ($discount/$product->product_selling_price)*100;
                                        @endphp
                                        @if( $product->product_discount_price )
                                        <div class="tag hot"><span>{{ round($percentage) }}%</span></div>
                                        @else
                                            <div class="tag new"><span>new</span></div>
                                            @endif
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="{{ route('product.details',$product->id) }}">@if( session()->get('language')=='english' ){{ $product->product_name_eng }} @else {{ $product->product_name_ban }} @endif</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                            @if( $product->product_discount_price==null )
                                    <span class="price"> {{ $product->product_selling_price }} $</span>
                                            @else
                                           <div class="product-price"><span class="price"> {{ $product->product_discount_price }}$ </span><span class="price-before-discount text-danger">{{ $product->product_selling_price }}</span></div>
                                            @endif
                                        <!-- /.product-price -->
                                    </div>

                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button  modal_id="{{ $product->id }}" class="btn btn-primary icon modal_btn "  type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>

                                                <button type="button" id="{{ $product->id }}" onclick="addToWishlist(this.id)" class="btn btn-primary icon modal_btn"  title="Wishlist"> <i class="icon fa fa-heart"></i> </button>
                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                    @endforeach





                        <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->

                </div>
                <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->

            @foreach( $all_cat as $category )
            <div class="tab-pane" id="category{{ $category->id }}">
                <div class="product-slider">
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                        @php
                            $cat_search = App\Models\Product::where('category_id',$category->id)->get();
                        @endphp

                        @forelse( $cat_search as $category )

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="{{ route('product.details',$category->id) }}"><img  src="{{ URL::to('') }}/images/thumbnail/{{ $category->product_thumbnail }}" alt=""></a> </div>
                                        <!-- /.image -->

                                        @php
                                            $discount = $category->product_selling_price - $category->product_discount_price;
                                           $percentage = ($discount/$category->product_selling_price)*100;
                                        @endphp
                                        @if( $category->product_discount_price )
                                            <div class="tag hot"><span>{{ round($percentage) }}%</span></div>
                                        @else
                                            <div class="tag new"><span>new</span></div>
                                        @endif
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="{{ route('product.details',$category->id) }}">{{ $category->product_name_eng }}</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        @if( $category->product_discount_price==null )
                                            <span class="price"> {{ $category->product_selling_price }} $</span>
                                        @else
                                            <div class="product-price"><span class="price"> {{ $category->product_discount_price }}$ </span><span class="price-before-discount text-danger">{{ $category->product_selling_price }}</span></div>
                                    @endif
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    @php
                                        $id = $category->id;
                                        $products = \App\Models\Product::find($id);
                                    @endphp
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button  modal_id="{{ $products->id }}" class="btn btn-primary icon modal_btn "  type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>

                                                <button type="button" id="{{ $products->id }}" onclick="addToWishlist(this.id)" class="btn btn-primary icon modal_btn"  title="Wishlist"> <i class="icon fa fa-heart"></i> </button>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @empty
                            <h5 class="text-danger">no product found</h5>
                        @endforelse







                    </div>
                    <!-- /.home-owl-carousel -->
                </div>
                <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->

            @endforeach






        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.scroll-tabs -->
    <!-- ============================================== SCROLL TABS : END ============================================== -->
    <!-- ============================================== WIDE PRODUCTS ============================================== -->
    <div class="wide-banners wow fadeInUp outer-bottom-xs">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <div class="wide-banner cnt-strip">
                    <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner1.jpg') }}" alt=""> </div>
                </div>
                <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
                <div class="wide-banner cnt-strip">
                    <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner2.jpg') }}" alt=""> </div>
                </div>
                <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.wide-banners -->

    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
    <section class="section featured-product wow fadeInUp">
        <h3 class="section-title">Featured products</h3>
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

            @foreach( $featured as $product )
            <div class="item item-carousel">
                <div class="products">
                    <div class="product">
                        <div class="product-image">
                            <div class="image"> <a href="{{ route('product.details',$product->id) }}"><img  src="{{ URL::to('') }}/images/thumbnail/{{ $product->product_thumbnail }}" alt=""></a> </div>
                            <!-- /.image -->
                            @php
                                $amount = $product->product_selling_price - $product->product_discount_price;
                                $discount = ($amount/$product->product_selling_price)*100;
                            @endphp
                            @if($product->product_discount_price)
                            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                            @else
                                <div class="tag new"><span>new</span></div>
                            @endif
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                            <h3 class="name"><a href="{{ route('product.details',$product->id) }}">@if( session()->get('language')=='english' ){{ $product->product_name_eng }}@else{{ $product->product_name_ban }}@endif</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>
                            <div class="product-price">
                                @if( $product->product_discount_price )
                                <span class="price"> {{ $product->product_discount_price }}$ </span> <span class="price-before-discount">{{ $product->product_selling_price }}$</span>
                                @else
                                    <span class="price"> {{ $product->product_selling_price }}$ </span>
                                @endif
                            </div>
                            <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                        <button  modal_id="{{ $product->id }}" class="btn btn-primary icon modal_btn "  type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                    </li>

                                        <button type="button" id="{{ $product->id }}" onclick="addToWishlist(this.id)" class="btn btn-primary icon modal_btn"  title="Wishlist"> <i class="icon fa fa-heart"></i> </button>

                                    <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                </ul>
                            </div>
                            <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                    </div>
                    <!-- /.product -->

                </div>
                <!-- /.products -->
            </div>

            @endforeach


        </div>
        <!-- /.home-owl-carousel -->
    </section>
    <!-- /.section -->
    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
    <!-- ============================================== WIDE PRODUCTS ============================================== -->






{{--skip category--}}

    <section class="section featured-product wow fadeInUp">
        <h3 class="section-title">{{ $skip_cat_0->category_name_en }}</h3>
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

            @foreach( $skip_product_0 as $product )
                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"> <a href="{{ route('product.details',$product->id) }}"><img  src="{{ URL::to('') }}/images/thumbnail/{{ $product->product_thumbnail }}" alt=""></a> </div>
                                <!-- /.image -->
                                @php
                                    $amount = $product->product_selling_price - $product->product_discount_price;
                                    $discount = ($amount/$product->product_selling_price)*100;
                                @endphp
                                @if($product->product_discount_price)
                                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                @else
                                    <div class="tag new"><span>new</span></div>
                                @endif
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="{{ route('product.details',$product->id) }}">@if( session()->get('language')=='english' ){{ $product->product_name_eng }}@else{{ $product->product_name_ban }}@endif</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price">
                                    @if( $product->product_discount_price )
                                        <span class="price"> {{ $product->product_discount_price }}$ </span> <span class="price-before-discount">{{ $product->product_selling_price }}$</span>
                                    @else
                                        <span class="price"> {{ $product->product_selling_price }}$ </span>
                                    @endif
                                </div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button  modal_id="{{ $product->id }}" class="btn btn-primary icon modal_btn "  type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>

                                        <button type="button" id="{{ $product->id }}" onclick="addToWishlist(this.id)" class="btn btn-primary icon modal_btn"  title="Wishlist"> <i class="icon fa fa-heart"></i> </button>

                                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                    </div>
                    <!-- /.products -->
                </div>

            @endforeach


        </div>
        <!-- /.home-owl-carousel -->
    </section>



    <div class="wide-banners wow fadeInUp outer-bottom-xs">
        <div class="row">
            <div class="col-md-12">
                <div class="wide-banner cnt-strip">
                    <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}" alt=""> </div>
                    <div class="strip strip-text">
                        <div class="strip-inner">
                            <h2 class="text-right">New Mens Fashion<br>
                                <span class="shopping-needs">Save up to 40% off</span></h2>
                        </div>
                    </div>
                    <div class="new-label">
                        <div class="text">NEW</div>
                    </div>
                    <!-- /.new-label -->
                </div>
                <!-- /.wide-banner -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.wide-banners -->
    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
{{--    brand product show--}}
    <section class="section featured-product wow fadeInUp">
        <h3 class="section-title">{{  $skip_brand_0->brand_name_en }}</h3>
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

            @foreach( $skip_brand_product_0 as $product )
                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"> <a href="{{ route('product.details',$product->id) }}"><img  src="{{ URL::to('') }}/images/thumbnail/{{ $product->product_thumbnail }}" alt=""></a> </div>
                                <!-- /.image -->
                                @php
                                    $amount = $product->product_selling_price - $product->product_discount_price;
                                    $discount = ($amount/$product->product_selling_price)*100;
                                @endphp
                                @if( $product->product_discount_price )
                                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                @else
                                    <div class="tag new"><span>new</span></div>
                                @endif
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="{{ route('product.details',$product->id) }}">@if( session()->get('language')=='english' ){{ $product->product_name_eng }}@else{{ $product->product_name_ban }}@endif</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price">
                                    @if( $product->product_discount_price )
                                        <span class="price"> {{ $product->product_discount_price }}$ </span> <span class="price-before-discount">{{ $product->product_selling_price }}$</span>
                                    @else
                                        <span class="price"> {{ $product->product_selling_price }}$ </span>
                                    @endif
                                </div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button  modal_id="{{ $product->id }}" class="btn btn-primary icon modal_btn "  type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>

                                        <button type="button" id="{{ $product->id }}" onclick="addToWishlist(this.id)" class="btn btn-primary icon modal_btn"  title="Wishlist"> <i class="icon fa fa-heart"></i> </button>
                                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                    </div>
                    <!-- /.products -->
                </div>

            @endforeach


        </div>
        <!-- /.home-owl-carousel -->
    </section>






    <!-- ============================================== BEST SELLER ============================================== -->

    <section class="section featured-product wow fadeInUp">
        <h3 class="section-title">{{ $skip_cat_1->category_name_en }}</h3>
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

            @foreach( $skip_product_1 as $product )
                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"> <a href="{{ route('product.details',$product->id) }}"><img  src="{{ URL::to('') }}/images/thumbnail/{{ $product->product_thumbnail }}" alt=""></a> </div>
                                <!-- /.image -->
                                @php
                                    $amount = $product->product_selling_price - $product->product_discount_price;
                                    $discount = ($amount/$product->product_selling_price)*100;
                                @endphp
                                @if($product->product_discount_price)
                                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                @else
                                    <div class="tag new"><span>new</span></div>
                                @endif
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="{{ route('product.details',$product->id) }}">@if( session()->get('language')=='english' ){{ $product->product_name_eng }}@else{{ $product->product_name_ban }}@endif</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price">
                                    @if( $product->product_discount_price )
                                        <span class="price"> {{ $product->product_discount_price }}$ </span> <span class="price-before-discount">{{ $product->product_selling_price }}$</span>
                                    @else
                                        <span class="price"> {{ $product->product_selling_price }}$ </span>
                                    @endif
                                </div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button  modal_id="{{ $product->id }}" class="btn btn-primary icon modal_btn "  type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>

                                        <button type="button" id="{{ $product->id }}" onclick="addToWishlist(this.id)" class="btn btn-primary icon modal_btn"  title="Wishlist"> <i class="icon fa fa-heart"></i> </button>

                                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                    </div>
                    <!-- /.products -->
                </div>

            @endforeach


        </div>
        <!-- /.home-owl-carousel -->
    </section>


    <!-- ============================================== BEST SELLER : END ============================================== -->

    <!-- ============================================== BLOG SLIDER ============================================== -->
    <section class="section latest-blog outer-bottom-vs wow fadeInUp">
        <h3 class="section-title">latest form blog</h3>
        <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">

                @foreach( $posts as $post )
                <div class="item">
                    <div class="blog-post">
                        <div class="blog-post-image">
                            <div class="image"> <a href="{{ route('post.details',$post->id) }}"><img src="{{ URL::to('') }}/images/blog/{{ $post->photo }}" alt=""></a> </div>
                        </div>
                        <!-- /.blog-post-image -->

                        <div class="blog-post-info text-left">
                            <h3 class="name"><a href="#">@if(session()->get('language')=='english'){{ $post->title_eng }}@else{{ $post->title_ban }}@endif</a></h3>
                            <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                            <p class="text">@if(session()->get('language')=='english'){!! Str::limit($post->long_des_eng,150) !!}@else{!! Str::limit($post->long_des_ban,150) !!}@endif</p>


                            <a href="{{ route('post.details',$post->id) }}" class="lnk btn btn-primary">Read more</a>

                        </div>
                        <!-- /.blog-post-info -->

                    </div>
                    <!-- /.blog-post -->
                </div>
                <!-- /.item -->
            @endforeach


                <!-- /.item -->







            </div>
            <!-- /.owl-carousel -->
        </div>
        <!-- /.blog-slider-container -->
    </section>
    <!-- /.section -->
    <!-- ============================================== BLOG SLIDER : END ============================================== -->

    <!-- ============================================== New Arrival PRODUCTS ============================================== -->
    <section class="section featured-product wow fadeInUp">
        <h3 class="section-title">{{  $skip_brand_1->brand_name_en }}</h3>
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

            @foreach( $skip_brand_product_1 as $product )
                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"> <a href="{{ route('product.details',$product->id) }}"><img  src="{{ URL::to('') }}/images/thumbnail/{{ $product->product_thumbnail }}" alt=""></a> </div>
                                <!-- /.image -->
                                @php
                                    $amount = $product->product_selling_price - $product->product_discount_price;
                                    $discount = ($amount/$product->product_selling_price)*100;
                                @endphp
                                @if( $product->product_discount_price )
                                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                @else
                                    <div class="tag new"><span>new</span></div>
                                @endif
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="{{ route('product.details',$product->id) }}">@if( session()->get('language')=='english' ){{ $product->product_name_eng }}@else{{ $product->product_name_ban }}@endif</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price">
                                    @if( $product->product_discount_price )
                                        <span class="price"> {{ $product->product_discount_price }}$ </span> <span class="price-before-discount">{{ $product->product_selling_price }}$</span>
                                    @else
                                        <span class="price"> {{ $product->product_selling_price }}$ </span>
                                    @endif
                                </div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button modal_id="{{ $product->id }}" class="btn btn-primary icon modal_btn "  type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>

                                        <button type="button" id="{{ $product->id }}" onclick="addToWishlist(this.id)" class="btn btn-primary icon modal_btn"  title="Wishlist"> <i class="icon fa fa-heart"></i> </button>
                                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                    </div>
                    <!-- /.products -->
                </div>

            @endforeach


        </div>
        <!-- /.home-owl-carousel -->
    </section>
    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

</div>


@endsection
