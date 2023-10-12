
@php

    $all_cat = \App\Models\Category::all();

@endphp

<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">




        <ul class="nav">
            @foreach( $all_cat as $cat )
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon {{ $cat->category_icon }} " aria-hidden="true">@if( session()->get('language' )=='english'){{ $cat->category_name_en }} @else {{ $cat->category_name_ban }} @endif</i></a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">




                                <div class="col-sm-12 col-md-3">
                                    @php
                                        $sub_cat = App\Models\SubCategory::where('category_id',$cat->id)->get();
                                    @endphp
                                    @foreach( $sub_cat as $sub )
                                        <a href="{{ route('catWise.product',$sub->id) }}"><h2> @if( session()->get('language')=='english' ){{ $sub->sub_cat_name_eng }} @else {{ $sub->sub_cat_name_ban }} @endif</h2></a>
                                        @php
                                            $subsub_cat = App\Models\SubSubCategory::where('subcategory_id',$sub->id)->get();
                                        @endphp
                                        @foreach( $subsub_cat as $subsub )
                                            <ul class="links list-unstyled">
                                                <li><a href="{{ route('SubSubCatWise.product',$subsub->id) }}">@if( session()->get('language')=='english' ){{ $subsub->sub_subcategory_name_eng }} @else {{ $subsub->sub_subcategory_name_bang }} @endif</a></li>

                                            </ul>
                                        @endforeach
                                    @endforeach
                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->

        @endforeach

        <!-- /.menu-item -->

        </ul>

        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->
