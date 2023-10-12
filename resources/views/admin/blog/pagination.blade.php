<div class="text-right">
    <div class="pagination-container">
        <ul class="list-inline list-unstyled">
@if( $paginator->onFirstPage() )
    @else
            <li class="prev"><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
            @endif

            @foreach( $elements as $element )
                @foreach($element as $key=>$url)
                @if( $paginator->currentPage()==$key )
            <li class="active"><a href="{{ $url }}">{{ $key }}</a></li>
            @else
                <li><a href="{{ $url }}">{{ $key }}</a></li>
            @endif

        @endforeach
    @endforeach




@if( $paginator->hasMorePages() )
            <li class="next"><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
    @else
    @endif
        </ul><!-- /.list-inline -->
    </div><!-- /.pagination-container -->
</div><!-- /.text-right -->
