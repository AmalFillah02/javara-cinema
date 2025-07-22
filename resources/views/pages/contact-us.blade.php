@extends('layouts.layout')

@section('content')
<section class="page-header overlay-gradient"
    style="background: url({{ asset('images/branding/posters/movie-collection.jpg') }});">
    <div class="container">
        <div class="inner">
            <h2 class="title">Contact Us</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Kontak</li>
            </ol>
        </div>
    </div>
</section>

<main class="contact-page ptb100">
    <div class="container">
        <div class="row">


            <!-- Start of Contact Details -->
            <div class="col-md-4 col-sm-12">
                <h3 class="title">Informasi</h3>

                <div class="details-wrapper">
                    <p>{{ config('app.name') }} adalah aplikasi berbasis
                        website yang memudahkan pengguna untuk memasan tiketmu bioskop tanpa
                        harus mengatri di tempat. aplikasi ini dipersembahkan untuk Javara Cinema Jepara.</p>

                    @php
                    $url = preg_replace('#^https?://#', '', url('/'));
                    $email = 'info@' . $url;
                    @endphp

                    <ul class="contact-details">
                        <li>
                            <i class="icon-phone"></i>
                            <strong>Admin:</strong>
                            <span>(+62) 82-138-199-126 </span>
                        </li>
                        <li>
                            <i class="icon-paper-plane"></i>
                            <strong>E-Mail:</strong>
                            <span><a href="mailto:amalfillah02@gmail.com">amalfillah02@gmail.com</a></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Start of Contact Details -->


            <!-- Start of Contact Form -->
            <div class="col-md-8 col-sm-12">
                <h3 class="title">Hubungi Kami</h3>

                <!-- Start of Contact Form -->
                <form id="contact-form">

                    <!-- contact result -->
                    <div id="contact-result"></div>
                    <!-- end of contact result -->

                    <!-- Form Group -->
                    <div class="form-group">
                        <input class="form-control input-box"
                            type="text"
                            name="name"
                            placeholder="Nama"
                            autocomplete="off"
                            style="background-color: #383737ff; color: #ffffff;">
                    </div>

                    <!-- Form Group -->
                    <div class="form-group">
                        <input class="form-control input-box" type="email" name="email" placeholder="Email"
                            autocomplete="off" style="background-color: #383737ff; color: #ffffff;">
                    </div>


                    <!-- Form Group -->
                    <div class="form-group">
                        <input class="form-control input-box" style="background-color: #383737ff; color: #ffffff;" type="text" name="subject" placeholder="Subjek"
                            autocomplete="off">
                    </div>

                    <!-- Form Group -->
                    <div class="form-group mb20">
                        <textarea class="form-control textarea-box" rows="8" name="message" placeholder="Tulis pesanmu untuk kami..." style="background-color: #383737ff; color: #ffffff;"></textarea>
                    </div>

                    <!-- Form Group -->
                    <div class="form-group text-center">
                        <button class="btn btn-main btn-effect" type="submit" style="background-color: #383737ff; color: #ffffff;">Send message</button>
                    </div>
                </form>
                <!-- End of Contact Form -->
            </div>
            <!-- Start of Contact Form -->

        </div>
    </div>
</main>
@endsection