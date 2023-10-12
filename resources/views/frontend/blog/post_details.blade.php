@extends('frontend.front_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>{{ $post_detail->title_eng }}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        <div class="blog-post wow fadeInUp">
                            <img class="img-responsive" src="{{ URL::to('') }}/images/blog/{{ $post_detail->photo }}" alt="">
                            <h1>@if(session()->get('language')=='english'){{ $post_detail->title_eng }}@else{{ $post_detail->title_ban }}@endif</h1>
                            <span class="review">7 Comments</span>
                            <span class="date-time">{{ Carbon\Carbon::parse($post_detail->created_at)->format('d F Y') }}</span>
                            <p>@if(session()->get('language')=='english'){!! htmlspecialchars_decode($post_detail->long_des_eng) !!}@else{!! htmlspecialchars_decode($post_detail->long_des_ban) !!}@endif</p>
                            <div >




                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox_xnde"></div>



                            </div>
                        </div>




                        <div class="blog-review wow fadeInUp">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="title-review-comments">16 comments</h3>
                                </div>



                                    @foreach( $post_detail->comments as $comment )

                                    <div class="blog-comments-responce outer-top-xs ">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                @if($comment->comment_id == null)
                                                <img src="{{ asset('images/user/'.$comment->user->profile_photo_path) }}" alt="Responsive image" class="img-rounded img-responsive">
                                            </div>
                                            <div class="col-md-7 col-sm-7 outer-bottom-xs">
                                                <div style="display: flex;flex-direction: column;" class="blog-sub-comments inner-bottom-xs">
                                                    <h4>{{ $comment->user->name }}</h4>

                                                    <p style="color:green;">{{ $comment->text }}</p>
                                                        @endif

                                                    <span  class="review-action pull-right">
                                                        @if($comment->comment_id == null)
                                                        {{ $comment->created_at->diffForHumans() }} &sol;
                                                        &sol;
                                                        <a reply_id="{{ $comment->id }}" id="reply_btn" href=""> Reply</a>
                                                            @endif
                                                    </span>
                                                    @guest
                                                        <p style="color: red;">At first login first</p>
                                                        @else
                                                        @php
                                                            $reply = \App\Models\Comment::where('comment_id','!=','null')->where('comment_id',$comment->id)->get();
                                                        @endphp
                                                    @foreach($reply as $rpl)
                                                        <div class="form-inline">
                                                            <img style="width: 30px;height: 30px;border-radius: 50%;" src="{{ asset('images/user/'.$rpl->user->profile_photo_path) }}" alt="">
                                                            <strong>{{ $rpl->user->name }}</strong>

                                                            <p style="color: red;"><span style="color:blue;">Reply: </span> {{ $rpl->text }}</p>
                                                        </div>
                                                        @endforeach
                                                    <div class="reply-box-{{ $comment->id }}" style="display: none;">

                                                        <form action="{{ route('reply.store') }}" method="POST">
                                                            @csrf
                                                           <div class="form-group">
                                                               <input name="reply" class="form-control" type="text">
                                                           </div>
                                                            <div class="form-group">
                                                                <input name="post_id" class="form-control" value="{{ $post_detail->id }}" type="hidden">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="comment_id" class="form-control" value="{{ $comment->id }}" type="hidden">
                                                            </div>
                                                            <div class="form-group">
                                                                <input value="Reply" class="btn btn-danger" type="submit">
                                                            </div>
                                                        </form>

                                                    </div>
                                                        @endguest
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

{{--                                <div class="post-load-more col-md-12"><a class="btn btn-upper btn-primary" href="#">Load more</a></div>--}}
                            </div>
                        </div>
                           @guest
                               <p class="text-danger">At first login first</p>-->
                            @else
                            <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Leave A Comment</h4>
                                </div>

                                <form action="{{ route('comment.store') }}" method="POST">
                                    @csrf
                                <div class="col-md-12">

                                        <div class="form-group">
                                            <input name="post_id" type="hidden" value="{{ $post_detail->id }}">
                                            <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
                                            <textarea name="comment" class="form-control unicase-form-control" id="exampleInputComments" ></textarea>
                                        </div>

                                </div>
                                <div class="col-md-12 outer-bottom-small m-t-20">
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
                                </div>
                                </form>
                            </div>

                        </div>

                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-612acb27ec919900"></script>


    <script>
        (function ($){
           $(document).ready(function (){
               $(document).on('click','#reply_btn',function (e){
                   e.preventDefault();
                   let id = $(this).attr('reply_id');
                   $('.reply-box-'+id).toggle();
               })
           })
        })(jQuery)
    </script>

@endsection
