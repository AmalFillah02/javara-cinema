@extends('layouts.layout')

@section('content')
    @include('home.hero-slider')

    <!-- =============== START OF TOP MOVIES SECTION =============== -->
    <section class="top-movies2">
        <div class="container">
            <div class="row">
                @php
                    $containerClasses = ['col-sm-6 col-xs-12', 'col-sm-6 d-none d-sm-block', 'd-none d-lg-block', 'd-none d-lg-block'];
                @endphp
                @foreach ($top4movies as $movie)
                    @include('components.movie-item-dark', [
                        'movie' => $movie,
                        'containerClass' => $containerClasses[$loop->index],
                    ])
                @endforeach
            </div>
        </div>
    </section>
    <!-- =============== END OF TOP MOVIES SECTION =============== -->

    <!-- =============== START OF HOW IT WORKS SECTION =============== -->
    <section class="how-it-works4 pt50 pb100">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Bingung mau pesan tiketnya?</h2>
                    <h6 class="subtitle">Mari lihat alur dibawah ini</h6>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6 col-sm-12">

                    <div class="icon-box2">
                        <i class="icon-login"></i>
                        <h4 class="title">Daftar Akun</h4>
                        <p>Mendaftar akunmu adalah hal pertama yang harus kamu lakukan.</p>
                    </div>

                    <div class="icon-box2">
                        <i class="fa fa-film"></i>
                        <h4 class="title">Pilih Film</h4>
                        <p>Pilih film yang kamu inginkan dari kumpulan film yang ada di halaman. Bingung pilih film? Lihat  <a href={{ route('movies.index') }} class="text-primary">rekomendari dari kami.</a></p>
                    </div>

                    
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="icon-box2">
                        <i class="fa fa-ticket"></i>
                        <h4 class="title">Reservasi tiketmu</h4>
                        <p>Pesan tiketmu untuk film yang telah kamu pilih.</p>
                    </div>

                    <div class="icon-box2">
                        <i class="icon-heart"></i>
                        <h4 class="title">Selamat bersenang-senang 😊</h4>
                        <p>Selamat bersenang-senang dengan filmmu, jangan lupa untuk pesan snack dan minuman yaaa. Jagalah kebersihan bioskop juga.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- =============== END OF HOW IT WORKS SECTION =============== -->

    <!-- =============== START OF LATEST RELEASES SECTION =============== -->
    <section class="latest-releases bg-light ptb100">
        <div class="container">

            <!-- Start of row -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Film Terbaru</h2>
                    <h6 class="subtitle">Lihat semua film terbaru dari kami.</h6>
                </div>
            </div>
            <!-- End of row -->
        </div>
        <!-- End of Container -->

        <!-- Start of Latest Releases Slider -->
        <div class="owl-carousel latest-releases-slider">
            @each('components.movie-item', $newest_movies, 'movie')
        </div>
        <!-- End of Latest Releases Slider -->

        <div class="text-center pt-3">
            <a class="btn btn-main btn-effect" style="background-color: #191919" href="{{ route('movies.index') }}">Lihat Semua Film</a>
        </div>
    </section>
    <!-- =============== END OF LATEST RELEASES SECTION =============== -->

    <!-- =============== START OF FEATURES SECTION =============== -->
    <section class="features">
        <div class="row">

            <div class="col-md-6 col-sm-12 with-bg overlay-gradient"
                style="background: url({{ asset('images/other/people-cinema.jpg') }})"></div>

            <div class="col-md-6 col-sm-12 bg-white">
                <div class="features-wrapper">
                    <h3 class="title">Apakah anda ingin menonton film terbaru?</h3>
                    @guest
                        <p>Daftar akun dan anda akan mendapatkan notifikasi jika ada film terbaru.</p>
                        <a class="btn btn-main btn-effect" href="{{ route('register') }}">Daftar</a>
                    @endguest

                    @auth
                        <p>Mulai pesan tiketmu dan selamat menonton!</p>
                        <a class="btn btn-main btn-effect" href="{{ route('movies.index') }}">Lihat Film</a>
                    @endauth
                </div>
            </div>

        </div>
    </section>
    <!-- =============== END OF FEATURES SECTION =============== -->

    <!-- =============== END OF SUBSCRIBE SECTION =============== -->
    <section class="subscribe bg-light2 ptb100">
        <div class="container">

            <!-- Start of row -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    @guest
                        <h2 class="title">Bergabunglah dengan kami!</h2>
                        <h6 class="subtitle">Masukkan email anda untuk mendapatkan informasi film terbaru dari kami!</h6>
                    @endguest

                    @auth
                        <h2 class="title">Terimakasih telah bergbung{{ config('app.name') }}!</h2>
                        <h6 class="subtitle">Kami berharap anda menikmati film bersama kami!</h6>
                    @endauth
                </div>
            </div>
            <!-- End of row -->


            @guest
                <!-- Start of row -->
                <div class="row justify-content-center">
                    <div class="col-md-7 col-sm-10 col-12">

                        <!-- Subscribe Form -->
                        <form method="POST" action="{{ route('leads') }}" class="mt50">
                            @csrf
                            <!-- Form -->
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="xxxx@example.com" autocomplete="off">
                                    <label for="email"></label>
                                    <button type="submit" class="btn btn-main btn-effect">Bergangung dengan kami</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- End of row -->
            @endguest


        </div>
    </section>
    @include('components.flash-message')
    <!-- =============== END OF SUBSCRIBE SECTION =============== -->
@endsection
