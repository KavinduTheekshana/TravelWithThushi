@extends('layouts.frontend')

@section('content')

    <div id="page" class="page">

        @include('frontend.components.header')

        <main id="content" class="site-main">

        @section('single_page_img', asset($package->image))
        @section('single_page_name', $package->title)
        @include('frontend.components.inner_banner')


        <div class="single-page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 primary right-sidebar">
                        <div class="single-packge-wrap">
                            <div class="single-package-head d-flex align-items-center">
                                <div class="package-title">
                                    <h2>{{ $package->title }}</h2>
                                    <div class="rating-start-wrap">
                                        <div class="rating-start">
                                            <span style="width: 100%"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="package-price">
                                    <h6 class="price-list">
                                        <span>${{ $package->price }}</span>
                                        / per person
                                    </h6>
                                </div>
                            </div>
                            <div class="package-meta">
                                <ul>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        {{ $package->days }} DAYS / {{ $package->nights }} NIGHTS
                                    </li>
                                    <li>
                                        <i class="fas fa-user-friends"></i>
                                        pax: {{ $package->peoples }}
                                    </li>
                                    {{-- <li>
                                   <i class="fas fa-swimmer"></i>
                                   Category : Hangout
                                </li> --}}

                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $package->location }}
                                    </li>
                                </ul>
                            </div>
                            <figure class="single-package-image">
                                <img src="{{ asset($package->image) }}" alt="">
                            </figure>
                            <div class="package-content-detail">
                                <article class="package-overview">
                                    <p> {!! $package->description !!}</p>
                                </article>

                            </div>


                            @foreach ($package_details as $details)
                                <div class="package-content-detail">
                                    <article class="package-overview">
                                        <h3 class="m-0">DAY {{ $details->day }} | {{ $details->title }}</h3>
                                        <h6>- {{ $details->location }}</h6>
                                        <img src="{{ asset($details->image) }}" alt="">
                                        <p> {!! $details->description !!}</p>
                                    </article>
                                </div>
                            @endforeach

                            <div class="package-content-detail">

                                <article class="package-include bg-light-grey">
                                    <h3>INCLUDE & EXCLUDE :</h3>
                                    <ul>
                                        <li><i class="fas fa-check"></i>Accommodation</li>
                                        <li><i class="fas fa-times"></i>Entrance fees</li>
                                        <li><i class="fas fa-check"></i>Breakfast and Dinner</li>
                                        <li><i class="fas fa-times"></i>Room Service Fees</li>
                                        <li><i class="fas fa-check"></i>Private Vehicle with a Driver</li>
                                        <li><i class="fas fa-times"></i>Private expenses</li>
                                        <li><i class="fas fa-check"></i>Guide service</li>
                                        <li><i class="fas fa-times"></i>Room service fees</li>
                                    </ul>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="booking-form-wrap">
                                <div class="booking-form-inner primary-bg">
                                    <h3>BOOKING FORM</h3>
                                    <p>Plan Your Perfect Getaway with Convenient and Hassle-Free Booking</p>
                                    {{-- <form method="POST" action="{{ route('booking.send') }}" class="booking-form" enctype="multipart/form-data">
                                        @csrf --}}
                                    <form id="boockingForm" class="booking-form">
                                        @csrf
                                        <input type="text" name="package_id" value="{{ $package->id }}" hidden>
                                        <input type="text" name="package_name" value="{{ $package->title }}" hidden>


                                        <p>
                                            <input type="text" name="name" placeholder="Your Name...">
                                        </p>
                                        <p>
                                            <input type="email" name="email" placeholder="Your Email...">
                                        </p>

                                        <p>
                                            <input type="text" name="phone" placeholder="Your Phone Number...">
                                        </p>

                                        <p>
                                            <input type="text" name="country" placeholder="Your Country...">
                                        </p>

                                        <p class="width-5">
                                            <label>Checkin Date</label>
                                            <input class="input-date-picker" type="text" name="checkin"
                                                placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                                        </p>
                                        <p class="width-5">
                                            <label>Checkout Date</label>
                                            <input class="input-date-picker" type="text" name="checkout"
                                                placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                                        </p>

                                  
                                        <p>
                                            <button type="submit" class="outline-btn outline-btn-white mt-3">INQUIRY
                                                NOW</button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <div class="related-package">
                                <h3>RELATED IMAGES</h3>
                                <p>Explore the World Through Our Eyes

                                    Unveiling the Beauty of Global Destinations
                                </p>
                                <div class="related-package-slide">

                                    @foreach ($package_details as $details)
                                        <div class="related-package-item package-details-single">
                                            <img src="{{ asset($details->image) }}" alt="{{ $details->title }}">
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="package-list">
                                <div class="overlay"></div>
                                <h4>MORE PACKAGES</h4>
                                <ul>
                                    @foreach ($package_list as $list)
                                        <li>
                                            <a href="{{ route('packages.single', ['slug' => $list->slug]) }}"><i
                                                    aria-hidden="true"
                                                    class="icon icon-arrow-right-circle"></i>{{ $list->title }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    @include('frontend.components.footer')
    @include('frontend.components.top')
    @include('frontend.components.search')
    @include('frontend.components.owner')
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#boockingForm').on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route('booking.send') }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.success
                    });
                },
                error: function(xhr) {
                    // Handle error response
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    });

                }
            });
        });
    });
</script>
@endpush