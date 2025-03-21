<header>
    <div class="container">
        <div class="row">
            <div class="col-2 col-md-1 d-lg-none">
                <div class="wsus__mobile_menu_area">
                    <span class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                </div>
            </div>
            <div class="col-xl-2 col-7 col-md-8 col-lg-2">
                <div class="wsus_logo_area">
                    <a class="wsus__header_logo" href="index.html">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="logo" class="img-fluid w-100">
                    </a>
                </div>
            </div>
            <div class="col-xl-5 col-md-6 col-lg-4 d-none d-lg-block">
                <div class="wsus__search">
                    <form>
                        <input type="text" placeholder="Search...">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-xl-5 col-3 col-md-3 col-lg-6">
                <div class="wsus__call_icon_area">
                    <div class="wsus__call_area">
                        <div class="wsus__call">
                            <i class="fas fa-user-headset"></i>
                        </div>
                        <div class="wsus__call_text">
                            <p>example@gmail.com</p>
                            <p>+886-123456</p>
                        </div>
                    </div>
                    <ul class="wsus__icon_area">
                        <li><a href="wishlist.html"><i class="fal fa-heart"></i><span>05</span></a></li>
                        <li><a href="compare.html"><i class="fal fa-random"></i><span>03</span></a></li>
                        <li><a class="wsus__cart_icon" href="#"><i
                                    class="fal fa-shopping-bag"></i><span id="card-count">{{Cart::content()->count()}}</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wsus__mini_cart">
        <h4>shopping cart <span class="wsus_close_mini_cart"><i class="far fa-times"></i></span></h4>
        <ul class="mini_cart_wrapper">


            @foreach (Cart::content() as $sidebarProduct )
            <li id="mini_cart_{{$sidebarProduct->rowId}}">
                <div class="wsus__cart_img">
                    <a href="#"><img src="{{asset($sidebarProduct->options->image)}}" alt="product" class="img-fluid w-100"></a>
                    <a class="wsis__del_icon remove_sidebar_product" data-id="{{$sidebarProduct->rowId}}" href="#"><i class="fas fa-minus-circle"></i></a>
                </div>
                <div class="wsus__cart_text">
                    <a class="wsus__cart_title" href="{{route('product-detail', $sidebarProduct->options->slug)}}">{{$sidebarProduct->name}}</a>
                    <br>
                    <p>
                        {{$settings->currency_icon}} {{$sidebarProduct->price}}
                    </p>
                    <small>Variant total:{{$settings->currency_icon}}  {{$sidebarProduct->options->variants_total}}</small>
                    <br>
                    <small> Qty: {{$sidebarProduct->qty}}</small>
             
                </div>
            </li>
            @endforeach
            @if (Cart::content()->count() ==0)
            <li class="text-center">Shopping Cart is Empty!</li>
            @endif
          
          
        </ul>
        <div class="mini_cart_actions  {{Cart::content()->count() ==0 ? 'd-none':'' }}">
            <h5>sub total <span id="mini_cart_subtotal">{{$settings->currency_icon}}{{getCartTotal()}}</span></h5>
            <div class="wsus__minicart_btn_area">
                <a class="common_btn" href="{{route('cart-details')}}">view cart</a>
                <a class="common_btn" href="check_out.html">checkout</a>
            </div>
        </div>
       
    </div>

</header>









@php
    $categories = \App\Models\Category::where('status', 1)
    ->with(['subCategories' =>function($query){
        $query->where('status',1)
        ->with(['childCategories' =>function($query){
        $query->where('status',1);
    }]);
    }])
    ->get();

@endphp


<nav class="wsus__main_menu d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="relative_contect d-flex">
                    <div class="wsus_menu_category_bar">
                        <i class="far fa-bars"></i>
                    </div>
                    <ul class="wsus_menu_cat_item show_home toggle_menu">
                        {{-- <li><a href="#"><i class="fas fa-star"></i> hot promotions</a></li> --}}

                        @foreach ($categories as $category)
                            <li><a class="{{ count($category->subCategories) > 0 ? 'wsus__droap_arrow' : '' }}"
                                    href="#"><i class="{{ $category->icon }}"></i> {{ $category->name }} </a>
                                @if (count($category->subCategories) > 0)
                                    <ul class="wsus_menu_cat_droapdown">

                                        @foreach ($category->subCategories as $subCategory)
                                            <li><a href="#">{{ $subCategory->name }}<i
                                                        class="{{ count($subCategory->childCategories) > 0 ? 'fas fa-angle-right' : '' }}"></i></a>
                                                @if (count($subCategory->childCategories) > 0)
                                                    <ul class="wsus__sub_category">
                                                        @foreach ($subCategory->childCategories as $childCategory)
                                                            <li><a href="#">{{ $childCategory->name }}</a> </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach


                        <li><a href="#"><i class="fal fa-gem"></i> View All Categories</a></li>
                    </ul>

                    <ul class="wsus__menu_item">
                        <li><a class="active" href="{{url('/')}}">home</a></li>
                        <li><a href="product_grid_view.html">shop <i class="fas fa-caret-down"></i></a>
                            <div class="wsus__mega_menu">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="wsus__mega_menu_colum">
                                            <h4>women</h4>
                                            <ul class="wsis__mega_menu_item">
                                                <li><a href="#">New Arrivals</a></li>
                                                <li><a href="#">Best Sellers</a></li>
                                                <li><a href="#">Trending</a></li>
                                                <li><a href="#">Clothing</a></li>
                                                <li><a href="#">Shoes</a></li>
                                                <li><a href="#">Bags</a></li>
                                                <li><a href="#">Accessories</a></li>
                                                <li><a href="#">Jewlery & Watches</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="wsus__mega_menu_colum">
                                            <h4>men</h4>
                                            <ul class="wsis__mega_menu_item">
                                                <li><a href="#">New Arrivals</a></li>
                                                <li><a href="#">Best Sellers</a></li>
                                                <li><a href="#">Trending</a></li>
                                                <li><a href="#">Clothing</a></li>
                                                <li><a href="#">Shoes</a></li>
                                                <li><a href="#">Bags</a></li>
                                                <li><a href="#">Accessories</a></li>
                                                <li><a href="#">Jewlery & Watches</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="wsus__mega_menu_colum">
                                            <h4>category</h4>
                                            <ul class="wsis__mega_menu_item">
                                                <li><a href="#"> Healthy & Beauty</a></li>
                                                <li><a href="#">Gift Ideas</a></li>
                                                <li><a href="#">Toy & Games</a></li>
                                                <li><a href="#">Cooking</a></li>
                                                <li><a href="#">Smart Phones</a></li>
                                                <li><a href="#">Cameras & Photo</a></li>
                                                <li><a href="#">Accessories</a></li>
                                                <li><a href="#">View All Categories</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="wsus__mega_menu_colum">
                                            <h4>women</h4>
                                            <ul class="wsis__mega_menu_item">
                                                <li><a href="#">New Arrivals</a></li>
                                                <li><a href="#">Best Sellers</a></li>
                                                <li><a href="#">Trending</a></li>
                                                <li><a href="#">Clothing</a></li>
                                                <li><a href="#">Shoes</a></li>
                                                <li><a href="#">Bags</a></li>
                                                <li><a href="#">Accessories</a></li>
                                                <li><a href="#">Jewlery & Watches</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="vendor.html">vendor</a></li>
                        <li><a href="blog.html">blog</a></li>
                        <li><a href="daily_deals.html">campain</a></li>
                        <li class="wsus__relative_li"><a href="#">pages <i class="fas fa-caret-down"></i></a>
                            <ul class="wsus__menu_droapdown">
                                <li><a href="404.html">404</a></li>
                                <li><a href="faqs.html">faq</a></li>
                                <li><a href="invoice.html">invoice</a></li>
                                <li><a href="about_us.html">about</a></li>
                                <li><a href="product_grid_view.html">product</a></li>
                                <li><a href="check_out.html">check out</a></li>
                                <li><a href="team.html">team</a></li>
                                <li><a href="change_password.html">change password</a></li>
                                <li><a href="custom_page.html">custom page</a></li>
                                <li><a href="forget_password.html">forget password</a></li>
                                <li><a href="privacy_policy.html">privacy policy</a></li>
                                <li><a href="product_category.html">product category</a></li>
                                <li><a href="brands.html">brands</a></li>
                            </ul>
                        </li>
                        <li><a href="track_order.html">track order</a></li>
                        <li><a href="daily_deals.html">daily deals</a></li>
                    </ul>
                    <ul class="wsus__menu_item wsus__menu_item_right">
                        <li><a href="contact.html">contact</a></li>
                        <li><a href="dsahboard.html">my account</a></li>
                        <li><a href="{{ route('login') }}">login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>


<section id="wsus__mobile_menu">
    <span class="wsus__mobile_menu_close"><i class="fal fa-times"></i></span>
    <ul class="wsus__mobile_menu_header_icon d-inline-flex">

        <li><a href="wishlist.html"><i class="far fa-heart"></i> <span>2</span></a></li>

        <li><a href="compare.html"><i class="far fa-random"></i> </i><span>3</span></a></li>
    </ul>
    <form>
        <input type="text" placeholder="Search">
        <button type="submit"><i class="far fa-search"></i></button>
    </form>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                role="tab" aria-controls="pills-home" aria-selected="true">Categories</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                role="tab" aria-controls="pills-profile" aria-selected="false">main menu</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="wsus__mobile_menu_main_menu">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <ul class="wsus_mobile_menu_category">
                     @foreach ($categories as $categoryItem )
                     <li><a href="#" class="{{count($categoryItem->subCategories)>0 ? 'accordion-button':''}} collapsed" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThreew-{{$loop->index}}" aria-expanded="false"
                        aria-controls="flush-collapseThreew-{{$loop->index}}"><i class="{{$categoryItem->icon}}"></i> {{$categoryItem->name}}</a>
                        @if (count($categoryItem->subCategories)>0){
                            <div id="flush-collapseThreew-{{$loop->index}}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <ul>
                                        @foreach ($categoryItem->subCategories as $subCategoryItem )
                                        <li><a href="">{{$subCategoryItem->name}}</a></li>
                                        @endforeach
                                      
                                        
                                    </ul>
                                </div>
                            </div>
                        }
                            
                        @endif
                   
                </li>
                     @endforeach
                        
                   
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="wsus__mobile_menu_main_menu">
                <div class="accordion accordion-flush" id="accordionFlushExample2">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">shop</a>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <ul>
                                        <li><a href="#">men's</a></li>
                                        <li><a href="#">wemen's</a></li>
                                        <li><a href="#">kid's</a></li>
                                        <li><a href="#">others</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li><a href="vendor.html">vendor</a></li>
                        <li><a href="blog.html">blog</a></li>
                        <li><a href="daily_deals.html">campain</a></li>
                        <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree101" aria-expanded="false"
                                aria-controls="flush-collapseThree101">pages</a>
                            <div id="flush-collapseThree101" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <ul>
                                        <li><a href="404.html">404</a></li>
                                        <li><a href="faqs.html">faq</a></li>
                                        <li><a href="invoice.html">invoice</a></li>
                                        <li><a href="about_us.html">about</a></li>
                                        <li><a href="team.html">team</a></li>
                                        <li><a href="product_grid_view.html">product grid view</a></li>
                                        <li><a href="product_grid_view.html">product list view</a></li>
                                        <li><a href="team_details.html">team details</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li><a href="track_order.html">track order</a></li>
                        <li><a href="daily_deals.html">daily deals</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
