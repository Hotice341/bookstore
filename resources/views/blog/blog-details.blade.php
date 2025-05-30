@extends('layouts.app')
@section('content')
    <div class="page-content">
        <!-- Blog Large -->
        <section class="content-inner-1 bg-img-fix">
            <div class="min-container">
                <!-- blog start -->
                <div class="dz-blog blog-single style-1">
                    <div class="dz-media rounded-md">
                        <img src="{{ $blog->image }}" alt="">
                    </div>

                    <div class="dz-info">
                        <div class="dz-meta  border-0 py-0 mb-2">
                            <ul class="border-0 pt-0">
                                <li class="post-date">
                                    <i class="far fa-calendar fa-fw m-r10"></i>
                                    {{ $blog->created_at->format('j F, Y') }}
                                </li>

                                <li class="post-author">
                                    <i class="far fa-user fa-fw m-r10"></i>By
                                    <a href="javascript:void(0);"> {{ $blog->user->name }}</a>
                                </li>
                            </ul>
                        </div>

                        <h4 class="dz-title">{{ $blog->title }}</h4>

                        <div class="dz-post-text">
                            <p>
                                {{ $blog->content }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row extra-blog style-1">
                    <div class="col-lg-12">
                        <h4 class="blog-title">RELATED BLOGS</h4>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="dz-blog style-1 bg-white m-b30">
                            <div class="dz-media">
                                <a href="blog-detail.html"><img src="images/blog/default/blog1.jpg" alt=""></a>
                            </div>
                            <div class="dz-info">
                                <h5 class="dz-title">
                                    <a href="blog-detail.html">How Library Can Increase Your Profit!</a>
                                </h5>
                                <p class="m-b0">Pellentesque vel nibh gravida erat interdum lacinia vel in lectus. Sed fermentum  pulvinar.</p>
                                <div class="dz-meta meta-bottom">
                                    <ul class="">
                                        <li class="post-date"><i class="far fa-calendar fa-fw m-r10"></i>7 March, 2024</li>
                                        <li class="post-author"><i class="far fa-user fa-fw m-r10"></i>By <a href="javascript:void(0);"> Johne Doe</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="dz-blog style-1 bg-white m-b30">
                            <div class="dz-media">
                                <a href="blog-detail.html"><img src="images/blog/large/blog4.jpg" alt=""></a>
                            </div>
                            <div class="dz-info">
                                <h5 class="dz-title">
                                    <a href="blog-detail.html">Library Can Improve Your Business</a>
                                </h5>
                                <p class="m-b0">Pellentesque vel nibh gravida erat interdum lacinia vel in lectus. Sed fermentum  pulvinar.</p>
                                <div class="dz-meta meta-bottom">
                                    <ul class="">
                                        <li class="post-date"><i class="far fa-calendar fa-fw m-r10"></i>7 March, 2024</li>
                                        <li class="post-author"><i class="far fa-user fa-fw m-r10"></i>By <a href="javascript:void(0);"> Johne Doe</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear" id="comment-list">
                    <div class="post-comments comments-area style-1 clearfix">
                        <h4 class="comments-title">4 COMMENTS</h4>
                        <div id="comment">
                            <ol class="comment-list">
                                <li class="comment even thread-even depth-1 comment" id="comment-2">
                                    <div class="comment-body">
                                        <div class="comment-author vcard">
                                            <img src="images/profile4.jpg" alt="" class="avatar"/>
                                            <cite class="fn">Michel Poe</cite> <span class="says">says:</span>
                                            <div class="comment-meta">
                                                <a href="javascript:void(0);">December 22, 2024 at 6:14 am</a>
                                            </div>
                                        </div>
                                        <div class="comment-content dz-page-text">
                                            <p>Donec suscipit porta lorem eget condimentum. Morbi vitae mauris in leo venenatis varius. Aliquam nunc enim, egestas ac dui in, aliquam vulputate erat.</p>
                                        </div>
                                        <div class="reply">
                                            <a rel="nofollow" class="comment-reply-link" href="javascript:void(0);"><i class="fa fa-reply"></i> Reply</a>
                                        </div>
                                    </div>
                                    <ol class="children">
                                        <li class="comment byuser comment-author-w3itexpertsuser bypostauthor odd alt depth-2 comment" id="comment-3">
                                            <div class="comment-body" id="div-comment-3">
                                                <div class="comment-author vcard">
                                                    <img src="images/profile3.jpg" alt="" class="avatar"/>
                                                    <cite class="fn">Celesto Anderson</cite> <span class="says">says:</span>
                                                    <div class="comment-meta">
                                                        <a href="javascript:void(0);">December 22, 2024 at 6:14 am</a>
                                                    </div>
                                                </div>
                                                <div class="comment-content dz-page-text">
                                                    <p>Donec suscipit porta lorem eget condimentum. Morbi vitae mauris in leo venenatis varius. Aliquam nunc enim, egestas ac dui in, aliquam vulputate erat.</p>
                                                </div>
                                                <div class="reply">
                                                    <a class="comment-reply-link" href="javascript:void(0);"><i class="fa fa-reply"></i> Reply</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </li>
                                <li class="comment even thread-odd thread-alt depth-1 comment" id="comment-4">
                                    <div class="comment-body" id="div-comment-4">
                                        <div class="comment-author vcard">
                                            <img src="images/profile2.jpg" alt="" class="avatar"/>
                                            <cite class="fn">Ryan</cite> <span class="says">says:</span>
                                            <div class="comment-meta">
                                                <a href="javascript:void(0);">December 22, 2024 at 6:14 am</a>
                                            </div>
                                        </div>
                                        <div class="comment-content dz-page-text">
                                            <p>Donec suscipit porta lorem eget condimentum. Morbi vitae mauris in leo venenatis varius. Aliquam nunc enim, egestas ac dui in, aliquam vulputate erat.</p>
                                        </div>
                                        <div class="reply">
                                            <a class="comment-reply-link" href="javascript:void(0);"><i class="fa fa-reply"></i> Reply</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="comment odd alt thread-even depth-1 comment" id="comment-5">
                                    <div class="comment-body" id="div-comment-5">
                                        <div class="comment-author vcard">
                                            <img src="images/profile1.jpg" alt="" class="avatar"/>
                                            <cite class="fn">Stuart</cite> <span class="says">says:</span>
                                            <div class="comment-meta">
                                                <a href="javascript:void(0);">December 22, 2024 at 6:14 am</a>
                                            </div>
                                        </div>
                                        <div class="comment-content dz-page-text">
                                            <p>Donec suscipit porta lorem eget condimentum. Morbi vitae mauris in leo venenatis varius. Aliquam nunc enim, egestas ac dui in, aliquam vulputate erat.</p>
                                        </div>
                                        <div class="reply">
                                            <a rel="nofollow" class="comment-reply-link" href="javascript:void(0);"><i class="fa fa-reply"></i> Reply</a>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <div class="default-form comment-respond style-1" id="respond">
                            <h4 class="comment-reply-title" id="reply-title">LEAVE A REPLY <small> <a rel="nofollow" id="cancel-comment-reply-link" href="javascript:void(0)" style="display:none;">Cancel reply</a> </small></h4>
                            <div class="clearfix">
                                <form method="post" id="comments_form" class="comment-form" novalidate>
                                    <p class="comment-form-author"><input id="name" placeholder="Author" name="author" type="text" value=""></p>
                                    <p class="comment-form-email"><input id="email" required="required" placeholder="Email" name="email" type="email" value=""></p>
                                    <p class="comment-form-comment"><textarea id="comments" placeholder="Type Comment Here" class="form-control4" name="comment" cols="45" rows="3" required="required"></textarea></p>
                                    <p class="col-md-12 col-sm-12 col-xs-12 form-submit">
                                        <button id="submit" type="submit" class="submit btn btn-primary btnhover3 filled">
                                            Submit Now <i class="fa fa-angle-right m-l10"></i>
                                        </button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- blog END -->
            </div>
        </section>
        <!-- Feature Box -->
    </div>
@endsection
