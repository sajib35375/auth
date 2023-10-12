@php

    $hot_deals = App\Models\Product::where('hot_deals',1)->where('product_discount_price','!=',NULL)->get();


@endphp

<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">


        @foreach( $hot_deals as $deals )

            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image"> <img src="{{ URL::to('') }}/images/thumbnail/{{ $deals->product_thumbnail }}" alt=""> </div>
                        @php
                            $discount = $deals->product_selling_price - $deals->product_discount_price;
                           $percentage = ($discount/$deals->product_selling_price)*100;
                        @endphp
                        @if( $deals->product_discount_price )
                            <div class="sale-offer-tag"><span>{{ round($percentage) }}%<br>off</span></div>
                        @else
                            <div style="background-color: #46AAD7;" class="sale-offer-tag"><span>new</span></div>
                        @endif
                        <div class="timing-wrapper">
                            <div class="box-wrapper">
                                <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                            </div>
                            <div class="box-wrapper hidden-md">
                                <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name"><a href="{{ route('product.details',$deals->id) }}">@if( session()->get('language')=='english' ){{ $deals->product_name_eng }}@else{{ $deals->product_name_ban }}@endif </a></h3>
                        <div class="rating rateit-small"></div>
                        @if( $deals->product_discount_price )
                            <div class="product-price"> <span class="price"> {{ $deals->product_discount_price }} $</span> <span class="price-before-discount">{{ $deals->product_selling_price }} $</span> </div>
                        @else
                            <div  class="product-price"><span class="price"> {{ $deals->product_selling_price }} $</span></div>
                    @endif

                    <!-- /.product-price -->

                    </div>
                    <!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <li class="add-cart-button btn-group">
                                <button  modal_id="{{ $deals->id }}" class="btn btn-primary icon modal_btn "  type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                            </li>

                            <button type="button" id="{{ $deals->id }}" onclick="addToWishlist(this.id)" class="btn btn-primary icon modal_btn"  title="Wishlist"> <i class="icon fa fa-heart"></i> </button>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
            </div>

        @endforeach

    </div>
    <!-- /.sidebar-widget -->
</div>
