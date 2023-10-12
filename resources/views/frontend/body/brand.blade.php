<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            @php
                $brands = \App\Models\Brand::all();
            @endphp
            @foreach($brands as $brand)
            <div class="item m-t-15"> <a href="#" class="image"> <img style="width: 100px;height: 100px;" data-echo="{{ URL::to('') }}/images/brand/{{ $brand->brand_image }}" src="{{ URL::to('') }}/images/brand/{{ $brand->brand_image }}" alt=""> </a> </div>
            <!--/.item-->
            @endforeach

        </div>
        <!-- /.owl-carousel #logo-slider -->
    </div>
    <!-- /.logo-slider-inner -->

</div>
<!-- /.logo-slider -->
