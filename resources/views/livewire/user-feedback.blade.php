<div>

    @push("styles")
        <style>
            .rating {
                /*float:left;*/
                border:none;
            }
            .rating:not(:checked) > input {
                position:absolute;
                top:-9999px;
                clip:rect(0, 0, 0, 0);
            }
            .rating:not(:checked) > label {
                float:right;
                width:1em;
                padding:0 .1em;
                overflow:hidden;
                white-space:nowrap;
                cursor:pointer;
                font-size:200%;
                line-height:1.2;
                color:#ddd;
            }
            .rating:not(:checked) > label:before {
                content:'★ ';
            }
            .rating > input:checked ~ label {
                color: #f70;
            }
            .rating:not(:checked) > label:hover, .rating:not(:checked) > label:hover ~ label {
                color: gold;
            }
            .rating > input:checked + label:hover, .rating > input:checked + label:hover ~ label, .rating > input:checked ~ label:hover, .rating > input:checked ~ label:hover ~ label, .rating > label:hover ~ input:checked ~ label {
                color: #ea0;
            }
            .rating > label:active {
                position:relative;
            }
        </style>
    @endpush

    <ul class="nav nav-tabs text-uppercase">

        <li class="nav-item">
            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{ $total_reviews_count }})</a>
        </li>
    </ul>
    <div class="tab-content shop_info_tab entry-main-content">

        <div class="tab-pane fade show active" id="Reviews">

            <!--Comments-->
            <div class="comments-area">
                <div class="row">
                    <div class="col-lg-8">
                        <h4 class="mb-30">Customer Feedback</h4>
                        <div class="comment-list">

                            @forelse($reviews as $review)
                                <!--single-comment -->
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb text-center " style="margin-right: 40px;">
{{--                                            <img src="assets/imgs/page/avatar-7.jpg" alt="">--}}
                                            <h6><a href="#">{{ Str::mask($review->user->name, "*", 1, -2) }} @if($review->user->id == auth()->id()) (You)  @endif</a></h6>
                                            <p class="font-xxs">Since {{\Carbon\Carbon::parse($review->user->created_at)->diffForHumans() }}</p>
                                        </div>
                                        <div class="desc ml-2">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:{{$review->rating * 20}}%">
                                                </div>
                                            </div>
                                            <p>{{$review->comment}}</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <p class="font-xs mr-30">
                                                        {{ \Carbon\Carbon::parse($review->created_at)->toFormattedDayDateString() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
<div class="alert alert-info">No reviews found.</div>

                            @endforelse

                            {{$reviews->links()}}
                        </div>
                    </div>
                    @if($reviews->count() > 0)

                    <div class="col-lg-4">
                        <h4 class="mb-30">Customer reviews</h4>
                        <div class="d-flex mb-30">
                            <div class="product-rate d-inline-block mr-15">
                                <div class="product-rating" style="width:90%">
                                </div>
                            </div>
                            <h6>4.8 out of 5</h6>
                        </div>


                        <div class="progress">
                            <span>5 star</span>
                            <div class="progress-bar" role="progressbar" style="width: {{ $reviews->count() > 0 ? $reviews->where('rating', 5)->count() / $reviews->count() * 100 : 0 }}%;" aria-valuenow="{{ $reviews->count() > 0 ? $reviews->where('rating', 5)->count() / $reviews->count() * 100 : 0 }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $reviews->count() > 0 ? round($reviews->where('rating', 5)->count() / $reviews->count() * 100, 2) : 0 }}%
                            </div>
                        </div>

                        <div class="progress">
                            <span>4 star</span>
                            <div class="progress-bar" role="progressbar" style="width: {{ $reviews->count() > 0 ? $reviews->where('rating', 4)->count() / $reviews->count() * 100 : 0 }}%;" aria-valuenow="{{ $reviews->count() > 0 ? $reviews->where('rating', 4)->count() / $reviews->count() * 100 : 0 }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $reviews->count() > 0 ? round($reviews->where('rating', 4)->count() / $reviews->count() * 100, 2) : 0 }}%
                            </div>
                        </div>

                        <div class="progress">
                            <span>3 star</span>
                            <div class="progress-bar" role="progressbar" style="width: {{ $reviews->count() > 0 ? $reviews->where('rating', 3)->count() / $reviews->count() * 100 : 0 }}%;" aria-valuenow="{{ $reviews->count() > 0 ? $reviews->where('rating', 3)->count() / $reviews->count() * 100 : 0 }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $reviews->count() > 0 ? round($reviews->where('rating', 3)->count() / $reviews->count() * 100, 2) : 0 }}%
                            </div>
                        </div>

                        <div class="progress">
                            <span>2 star</span>
                            <div class="progress-bar" role="progressbar" style="width: {{ $reviews->count() > 0 ? $reviews->where('rating', 2)->count() / $reviews->count() * 100 : 0 }}%;" aria-valuenow="{{ $reviews->count() > 0 ? $reviews->where('rating', 2)->count() / $reviews->count() * 100 : 0 }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $reviews->count() > 0 ? round($reviews->where('rating', 2)->count() / $reviews->count() * 100, 2) : 0 }}%
                            </div>
                        </div>

                        <div class="progress mb-30">
                            <span>1 star</span>
                            <div class="progress-bar" role="progressbar" style="width: {{ $reviews->count() > 0 ? $reviews->where('rating', 1)->count() / $reviews->count() * 100 : 0 }}%;" aria-valuenow="{{ $reviews->count() > 0 ? $reviews->where('rating', 1)->count() / $reviews->count() * 100 : 0 }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $reviews->count() > 0 ? round($reviews->where('rating', 1)->count() / $reviews->count() * 100, 2) : 0 }}%
                            </div>
                        </div>

                        <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                    </div>

                        @endif
                </div>
            </div>

            @if($product_check_if_rented_by_user && !$review_existence)
                @guest
                    <div class="alert alert-info">You need to login to add a review.</div>
                @endguest

                @auth
                    <!--comment form-->
                    <div class="comment-form">
                        <h4 class="mb-15">Add a review </h4> <span class="text-muted"><smalll>You are reviewing as {{ auth()->user()->name }}</smalll></span>
                        <div class="row">
                            <div class="col-lg-8 col-md-12">

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            {{$error}} <br>
                                        @endforeach
                                    </div>
                                @endif


                                <form class="form-contact comment_form" wire:submit.prevent="save" id="commentForm">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <fieldset class="rating d-inline-block">
                                                <input type="radio" id="star5" wire:model.defer="rating" value="5" />
                                                <label for="star5">5 stars</label>
                                                <input type="radio" id="star4" wire:model.defer="rating" value="4" />
                                                <label for="star4">4 stars</label>
                                                <input type="radio" id="star3" wire:model.defer="rating" value="3" />
                                                <label for="star3">3 stars</label>
                                                <input type="radio" id="star2" wire:model.defer="rating" value="2" />
                                                <label for="star2">2 stars</label>
                                                <input type="radio" id="star1" wire:model.defer="rating" value="1" />
                                                <label for="star1">1 star</label>
                                            </fieldset>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100" wire:model.defer="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="button button-contactForm">Submit
                                            Review</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth


            @endif


        </div>
    </div>
</div>
