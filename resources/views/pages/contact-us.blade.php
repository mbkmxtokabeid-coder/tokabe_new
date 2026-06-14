@extends('pages.template')
@section('title', __('Tokabe.id - Contact Us'))
@section('content')
    <div class="cba_demo_one">
        <div class="section-wrapper ps-rel" data-scroll-section>
            <x-navbar />
            <!-- hero-area-start -->
            @php
                $items = collect([
                    ['text' => __('Home'), 'link' => route('home')],
                    ['text' => __('Contact Us'), 'link' => route('contact')],
                ]);
            @endphp
            <x-hero-breadcrumb :items="$items" />
            <!-- hero-area-end -->
            <!-- adderes-part -->
            <div class="adderes-part cb-br-20 cb-bg-color-white mt-20">
                <div class="row">
                    <div class="col-12 col-lg-4 d-flex align-items-center mb-5 mb-lg-0">
                        <div class="adderes-logo cb-bg-color-brown cb-br-20 center mr-15">
                            <i class="icon icon-messages cb-fs-24"></i>
                        </div>
                        <div class="adderes-content">
                            <h3 class="cb-ff cb-fs-24 cb-fw-600 cb-lh-30">{{ __('Email Address') }}</h3>
                            <p class="cb-ff cb-fs-18 cb-fw-400 cb-color-gray300 cb-lh-27">info@tokabe.id</p>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 d-flex align-items-center mb-5 mb-lg-0">
                        <div class="adderes-logo cb-bg-color-brown cb-br-20 center mr-15">
                            <i class="icon icon-call cb-fs-24"></i>
                        </div>
                        <div class="adderes-content">
                            <a href="tel:+628115239999">
                                <h3 class="cb-ff cb-fs-24 cb-fw-600 cb-lh-30">{{ __('Phone number') }}</h3>
                                <p class="cb-ff cb-fs-18 cb-fw-400 cb-color-gray300 cb-lh-27">0811-5239-999</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 d-flex align-items-center mb-5 mb-lg-0">
                        <div class="adderes-logo cb-bg-color-brown cb-br-20 center mr-15">
                            <i class="icon icon-location cb-fs-24"></i>
                        </div>
                        <a href="https://maps.app.goo.gl/m2DKjqNtE15Muzqg6">
                            <div class="adderes-content">

                                <h3 class="cb-ff cb-fs-24 cb-fw-600 cb-lh-30">Address</h3>
                                <p class="cb-ff cb-fs-18 cb-fw-400 cb-color-gray300 cb-lh-27">Komplek Setiabudi Point No.
                                    D-10
                                    Medan, Indonesia</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- contact-part-end -->

            <!-- contact-part-start -->
            <div class="container container-1290 mt-130">
                <div class="contact-us-part">
                    <h1 class="cb-ff cb-fs-60 cb-color-gray-400 mb-40">{{ __('Contact Us') }}</h1>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="contact-form">
                                    <div class="row">
                                        <div class="col-12 col-lg-6 mb-30">
                                            <input type="text" name="name" placeholder="{{ __('Your Name...') }}"
                                                class="cb-ff cb-fs-18 cb-color-gray-300 cb-br-20 con-inp">
                                            @error('name')
                                                <div class="cb-ff text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-lg-6 mb-30">
                                            <input type="text" name="phone" placeholder="{{ __('Your WA Number...') }}"
                                                class="cb-ff cb-fs-18 cb-color-gray-300 cb-br-20 con-inp">
                                            @error('phone')
                                                <div class="cb-ff text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-lg-6 mb-30">
                                            <input type="text" name="email" placeholder="{{ __('Your E-mail...') }}"
                                                class="cb-ff cb-fs-18 cb-color-gray-300 cb-br-20 con-inp">
                                            @error('email')
                                                <div class="cb-ff text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-lg-6 mb-30">
                                            <input type="text" name="subject" placeholder="{{ __('Subject...') }}"
                                                class="cb-ff cb-fs-18 cb-color-gray-300 cb-br-20 con-inp">
                                        </div>
                                        <div class="col-12 mb-30">
                                            <textarea class="cb-br-20 cb-ff cb-fs-18 cb-color-black-500 con-textarea cb-br-20" name="message"
                                                placeholder="{{ __('Your Message') }}"></textarea>
                                            @error('message')
                                                <div class="cb-ff text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="contact-btn cb-br-50 btn-effect cb-bg-color-brown mb-5 mb-lg-0">
                                            <button type="submit"
                                                class="cb-ff cb-fs-18 cb-fw-600 cb-lh-22 text-capitalize ps-abs">{{ __('Send Message') }}<i class="icon icon-right-arrow ml-10"></i></button>
                                            <span></span>
                                        </div>
                                        <div class="col-12 mt-30">
                                            {!! NoCaptcha::display() !!}
                                            @if ($errors->has('g-recaptcha-response'))
                                                <span
                                                    class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="contact-img imghover img-effect overflow-hidden">
                                <figure>
                                    <img src="{{ asset('images/service-details-01.jpg') }}" alt="contactbillboard" class="cb-br-20" loading="lazy">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! NoCaptcha::renderJs() !!}
@endsection
