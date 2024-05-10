<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{ $products->count() }}</strong> items for you!</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">50</a></li>
                                            <li><a href="#">100</a></li>
                                            <li><a href="#">150</a></li>
                                            <li><a href="#">200</a></li>
                                            <li><a href="#">All</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">Featured</a></li>
                                            <li><a href="#">Price: Low to High</a></li>
                                            <li><a href="#">Price: High to Low</a></li>
                                            <li><a href="#">Release Date</a></li>
                                            <li><a href="#">Avg. Rating</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            @forelse($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6 ">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap h-100">
                                            <div class="product-img product-img-zoom">
                                                <a
                                                    href="{{ route('product-details', ['category' => $product->productCategory->slug, 'sub_category' => $product->productSubCategory->name ,'slug' => $product->slug]) }}">
                                                    <img class="default-img img-fluid" src="{{ asset('storage/' . $product->product_image) }}" alt="">
                                                </a> <!--to set the url parameters-->

                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>

                                        </div>
                                        <!--Featured products-->
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop.html">{{ $product->productCategory->name }}</a>
                                            </div>
                                            <h2><a href="{{ route('product-details', ['category' => $product->productCategory->slug, 'sub_category' => $product->productSubCategory->slug ,'slug' => $product->slug]) }}">{{ $product->title }}</a></h2> <!--to set the url parameters-->
                                            <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                            </div>
                                            <div class="product-price">
                                                <span>LKR {{ $product->price }}/hr</span>
                                                <span class="old-price">LKR {{ $product->price + 1500 }}/hr</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Rent" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse



                        </div>


                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    {{ $products->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-12 col-mg-6"></div>--}}
{{--                            <div class="col-lg-12 col-mg-6"></div>--}}
{{--                        </div>--}}
{{--                        <div class="widget-category mb-30">--}}
{{--                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>--}}
{{--                            <ul class="categories">--}}
{{--                                <li>--}}
{{--                                    @forelse($product_categories as $product_category)--}}
{{--                                        <h5 class="style-1 mb-30  ">--}}
{{--                                            <a href="#">{{ $product_category->name }}</a></h5>--}}
{{--                                    @empty--}}
{{--                                    @endforelse--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}



                        <!-- Fillter By Price -->

                        <form wire:submit.prevent="filterProducts">
                            <div class="sidebar-widget price_range range mb-30">
                                <div class="widget-header position-relative mb-20 pb-10">
                                    <h5 class="widget-title mb-10">Filter by price</h5>
                                    <div class="bt-1 border-color-1"></div>
                                </div>

                                <div class="list-group">
                                    <div class="list-group-item mb-10 mt-10">
                                        <label class="fw-900">Price</label>

                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox"  id="price1" value="500" wire:model.defer="price" wire:key="price1">
                                            <label class="form-check-label" for="price1"><span>0-500 LKR</span></label>
                                        </div>
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox"  id="price2" value="1500" wire:model.defer="price" wire:key="price2">
                                            <label class="form-check-label" for="price2"><span>500-1500 LKR</span></label>
                                        </div>
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox"  id="price3" value="2500" wire:model.defer="price" wire:key="price3">
                                            <label class="form-check-label" for="price3"><span>1500-2500 LKR</span></label>
                                        </div>
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox"  id="price4" value="above2500" wire:model.defer="price" wire:key="price4">
                                            <label class="form-check-label" for="price4"><span>2500 LKR & Above</span></label>
                                        </div>

                                        <label class="fw-900 mt-15">Categories</label>
                                        @forelse($product_categories as $category)
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" id="category_{{ $category->id }}" value="{{ $category->id }}" wire:model.defer="selectedCategories">
                                                <label class="form-check-label" for="category_{{ $category->id }}"><span>{{ $category->name }}</span></label>
                                                <br>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Filter</button>
                                <button type="button" class="btn btn-sm btn-outline-primary bg-white" style="color: black;" wire:click="clearFilter">Clear Filter</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
