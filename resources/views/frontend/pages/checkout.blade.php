@extends('frontend.layouts.master')
@section('title')
    {{ $settings->site_name }} || Checkout
@endsection
@section('content')
    <!--============================
                    BREADCRUMB START
                ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>check out</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>

                            <li><a href="javascript:;">check out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                    BREADCRUMB END
                ==============================-->


    <!--============================
                    CHECK OUT PAGE START
                ==============================-->
    <section id="wsus__cart_view">
        <div class="container">

            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="wsus__check_form">
                        <h5>Shipping Details <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">add
                                new address</a></h5>
                        {{-- <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Company Name (Optional)">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <select class="select_2" name="state">
                                            <option value="AL">Country / Region *</option>
                                            <option value="">dhaka</option>
                                            <option value="">barisal</option>
                                            <option value="">khulna</option>
                                            <option value="">rajshahi</option>
                                            <option value="">bogura</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Street Address *">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Apartment, suite, unit, etc. (optional)">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Town / City *">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="State *">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Zip *">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Phone *">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="email" placeholder="Email *">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="accordion checkout_accordian" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    <div class="wsus__check_single_form">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Same as shipping address
                                                            </label>
                                                        </div>
                                                    </div>
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body p-0">
                                                    <div class="wsus__check_form p-0" style="box-shadow: none;">
                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="First Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="Last Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text"
                                                                        placeholder="Company Name (Optional)">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <select class="select_2" name="state">
                                                                        <option value="AL">Country / Region *</option>
                                                                        <option value="">dhaka</option>
                                                                        <option value="">barisal</option>
                                                                        <option value="">khulna</option>
                                                                        <option value="">rajshahi</option>
                                                                        <option value="">bogura</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="Street Address *">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text"
                                                                        placeholder="Apartment, suite, unit, etc. (optional)">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="Town / City *">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="State *">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="Zip *">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="Phone *">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="email" placeholder="Email *">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="wsus__check_single_form">
                                        <h5>Additional Information</h5>
                                        <textarea cols="3" rows="4"
                                            placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                    </div>
                                </div>
                            </div> --}}
                        <div class="row">
                            @foreach ($addresses as $address)
                                <div class="col-xl-6">
                                    <div class="wsus__checkout_single_address">
                                        <div class="form-check">
                                            <input class="form-check-input shipping_address" data-id="{{ $address->id }}"
                                                type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Select Address
                                            </label>
                                        </div>
                                        <ul>
                                            <li><span>Name :</span> {{ $address->name }}</li>
                                            <li><span>Phone :</span>{{ $address->phone }}</li>
                                            <li><span>Email :</span>{{ $address->email }}</li>
                                            <li><span>Country :</span> {{ $address->country }}</li>
                                            <li><span>State :</span> {{ $address->state }}</li>
                                            <li><span>City :</span> {{ $address->city }}</li>
                                            <li><span>Zip Code :</span> {{ $address->zip }}</li>

                                            <li><span>Address :</span> {{ $address->address }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="wsus__order_details" id="sticky_sidebar">
                        <p class="wsus__product">shipping Methods</p>

                        @foreach ($shippingMethods as $method)
                            @if ($method->type == 'min_cost' && getCartTotal() >= $method->min_cost)
                                <div class="form-check">
                                    <input class="form-check-input shipping_method" type="radio" name="exampleRadios"
                                        id="exampleRadios1" value="{{ $method->id }}" data-id="{{ $method->cost }}"
                                        checked>

                                    <label class="form-check-label" for="exampleRadios1">
                                        {{ $method->name }}
                                        <span>cost:{{ $settings->currency_icon }}{{ $method->cost }} </span>
                                    </label>
                                </div>
                            @elseif ($method->type == 'flat_cost')
                                <div class="form-check">
                                    <input class="form-check-input shipping_method" type="radio" name="exampleRadios"
                                        id="exampleRadios1" value="{{ $method->id }}" data-id="{{ $method->cost }}">
                                    <label class="form-check-label" for="exampleRadios1">
                                        {{ $method->name }}
                                        <span>cost:{{ $settings->currency_icon }}{{ $method->cost }} </span>
                                    </label>
                                </div>
                            @endif
                        @endforeach

                        <div class="wsus__order_details_summery">
                            <p>subtotal: <span>{{ $settings->currency_icon }}{{ getCartTotal() }}</span></p>
                            <p>shipping fee: <span id="shipping_fee">{{ $settings->currency_icon }}0</span></p>
                            <p>copun(-): <span>{{ $settings->currency_icon }}{{ getCartDiscount() }}</span></p>
                            <p><b>total:</b> <span><b id="total_amount" data-id="{{ getMainCartToal() }}">
                                        {{ $settings->currency_icon }}{{ getMainCartToal() }}</b></span>
                            </p>
                        </div>

                        <div class="terms_area">
                            <div class="form-check">
                                <input class="form-check-input agree_term" type="checkbox" value="" id="flexCheckChecked3"
                                    checked>
                                <label class="form-check-label" for="flexCheckChecked3">
                                    I have read and agree to the website <a href="#">terms and conditions *</a>
                                </label>
                            </div>
                        </div>


                        <form action="" id="checkOutForm">
                            <input type="hidden" name="shipping_method_id" value="" id="shipping_method_id">
                            <input type="hidden" name="shipping_address_id" value="" id="shipping_address_id">
                        </form>



                        <a href="" id="submitCheckoutForm" class="common_btn">Place Order</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="wsus__popup_address">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">add new address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="wsus__check_form p-3">


                            <form action="{{ route('user.checkout.address.create') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Name *" name="name"
                                                value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Phone *" name="phone"
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="email" placeholder="Email *" name="email"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <select class="select_2" name="country">
                                                <option value="">Country / Region *</option>

                                                @foreach (config('setting.country_list') as $key => $country)
                                                    <option {{ $country == old('country') ? 'selected' : '' }}
                                                        value="{{ $country }}">{{ $country }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="State *" name="state"
                                                value="{{ old('state') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Town / City *" name="city"
                                                value="{{ old('city') }}">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Zip *" name="zip"
                                                value="{{ old('zip') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Address *" name="address"
                                                value="{{ old('address') }}">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__check_single_form">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============================
                    CHECK OUT PAGE END
                ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('input[type="radio"]').prop('checked', false);
            $('#shipping_method_id').val("");
            $('#shipping_address_id').val("");
            $('.shipping_method').on('click', function() {
                let shippingFee = $(this).data('id');
                let currentTotalAmount = $('#total_amount').data('id')
                let totalAmount = currentTotalAmount + shippingFee;

                $('#shipping_method_id').val($(this).val());
                $('#shipping_fee').text("{{ $settings->currency_icon }}" + shippingFee);

                $('#total_amount').text("{{ $settings->currency_icon }}" + totalAmount)
            })
            $('.shipping_address').on('click', function() {
                $('#shipping_address_id').val($(this).data('id'));
            })




            $('#submitCheckoutForm').on('click', function(e) {

                e.preventDefault();

                if ($('#shipping_method_id').val() == "") {
                    toastr.error('Shipping method is requred');
                } else if ($('#shipping_address_id').val() == "") {
                    toastr.error('Shipping address is requred');
                }else if(!$('.agree_term').prop('checked')){
                    toastr.error('請按同意');
                } else {

                    $.ajax({

                        url: "{{ route('user.checkout.form-submit') }}",
                        method: 'POST',
                        data: $('#checkOutForm').serialize(),
                        beforeSend: function(){
                            $('#submitCheckoutForm').html('<i class="fas fa-spinner fa-spin fa-1x"></i>')
                        },
                        success: function(data) {
                            if(data.status == 'success'){
                                $('#submitCheckoutForm').text('Place Order')
                                window.location.href = data.redirect_url;
                            }
                            // $('#submitCheckoutForm').text('Place Order')
                         


                        },
                        error: function(data) {
                            console.log(data);
                        }
                    })
                }



            })


        })
    </script>
@endpush
