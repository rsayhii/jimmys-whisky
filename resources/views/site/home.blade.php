{{-- resources/views/site/home.blade.php --}}

@extends('layouts.app')

@section('content')

    {{-- Hero Section --}}
    @include('site.components.hero')

     {{-- Hero Service --}}
    @include('site.components.service')

    {{-- Categories Section --}}
    @include('site.components.categories')

      {{-- bestsellers Section --}}
    @include('site.components.bestsellers')

    {{-- Swiss Section  
    @include('site.components.swiss')
   --}}

    {{------ highlight-------}}
    <div class="w-full ">
        <!-- Laptop/Desktop View -->
        <img src="{{ asset('assets/highlight/laptop.webp') }}" alt="Highlight" class="hidden md:block w-full h-auto object-cover">
        
        <!-- Phone/Mobile View -->
        <img src="{{ asset('assets/highlight/phone.jpeg') }}" alt="Highlight" class="block md:hidden w-full h-auto object-cover">
    </div>

    {{-- Video Section --}}
    @include('site.components.video')

    {{-- perfume Video Section --}}
    {{-- @include('site.components.perfumevideo') --}}

    {{-- testimonial Section --}}
    @include('site.components.testimonial')

   {{-- Newsletter/CTA Section --}}
    @include('site.components.newsletter')

   

    
@endsection
