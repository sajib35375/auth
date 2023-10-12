@php
    $tags_eng = App\Models\Product::groupBy('product_tags_eng')->select('product_tags_eng')->get();

    $tags_ban = App\Models\Product::groupBy('product_tags_ban')->select('product_tags_ban')->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if( session()->get('language')=='english' )
                @foreach( $tags_eng as $tag )
                <a class="item active" title="Phone" href="{{ route('tagwise.product',$tag->product_tags_eng) }}">{{ $tag->product_tags_eng }}</a>
                @endforeach
            @else
                @foreach( $tags_ban as $tag )
                <a class="item active" title="Phone" href="{{ route('tagwise.product',$tag->product_tags_ban) }}">{{ $tag->product_tags_ban }}</a>
                @endforeach
            @endif
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
