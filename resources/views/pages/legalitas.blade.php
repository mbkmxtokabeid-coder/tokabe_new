@extends('pages.template')

<style>
    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .item {
        width: 250px;
        height: 300px;
        background-color: rgb(241, 211, 107);
        border-radius: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 20px;
        margin: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }

    .item img {
        max-width: 150px;
        height: auto;
        margin-bottom: 15px;
    }

    .item a {
        display: block;
    }

    .item {
        width: 250px;
        height: 300px;
        background-color: rgb(241, 211, 107);
        border-radius: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 20px;
        margin: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: transform 0.5s ease;
    }

    .item:hover {
        animation: smooth-bounce 0.8s ease-in-out;
    }

    /* Efek goyang vertikal santai (smooth bounce) */
    @keyframes smooth-bounce {
        0% {
            transform: translateY(0);
        }

        30% {
            transform: translateY(-6px);
        }

        50% {
            transform: translateY(4px);
        }

        70% {
            transform: translateY(-2px);
        }

        100% {
            transform: translateY(0);
        }
    }

    .item img {
        max-width: 150px;
        height: auto;
        margin-bottom: 15px;
    }

    .item a {
        display: block;
    }
</style>
@section('title', __('Tokabe.id - Legality'))
@section('content')
    <div class="cba_demo_one">
        <!-- Preloder Start -->
        <!-- Preloder End -->
        <div class="section-wrapper ps-rel" data-scroll-section>
            <x-navbar />
            <!-- hero-area-start -->
            @php
                $items = collect([
                    ['text' => __('Home'), 'link' => route('home')],
                    ['text' => __('Legality'), 'link' => route('legalitas')]
                ])
            @endphp
            <x-hero-breadcrumb :items="$items"/>
            <!-- hero-area-end -->
            <div class="container">
                <div class="item">
                    <img src="{{ asset('images/npwp.png') }}" alt="NPWP Icon" loading="lazy">
                    <a href="#">40705xxxxxx4000</a>
                </div>
                <div class="item">
                    <img src="{{ asset('images/nib.jpeg') }}" alt="NIB Icon" loading="lazy">
                    <a href="#">28042xxxxxx93</a>
                </div>
                <div class="item">
                    <img src="{{ asset('images/AHU-logo.png') }}" alt="AHU Icon" loading="lazy">
                    <a href="#">AHU - 003xxxx.AH.01.01. TAHUN 2023</a>
                </div>
                <div class="item">
                    <img src="{{ asset('images/kadin.png') }}" alt="Kadin Icon" loading="lazy">
                    <a href="#">10201-24xxxxxx611</a>
                </div>
                <div class="item">
                    <img src="{{ asset('images/bpjs.png') }}" alt="BPJS Icon" loading="lazy">
                    <a href="#">24xxxx73</a>
                </div>
                <div class="item">
                    <img src="{{ asset('images/Logo-BNSP.png') }}" alt="BNSP Icon" loading="lazy">
                    <a href="#">Event Organizer-No. Reg EVN.2518.xxxx 2025</a>
                </div>
                <div class="item">
                    <img src="{{ asset('images/Logo-BNSP.png') }}" alt="BNSP Icon" loading="lazy">
                    <a href="#">Meeting Inventive Convention and Exhibition-No. Reg EVN.2518.xxxx 2025</a>
                </div>
            </div>
        </div>
    </div>
@endsection