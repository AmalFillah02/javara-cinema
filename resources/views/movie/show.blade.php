@extends('layouts.layout')

@section('content')
<!-- =============== START OF MOVIE DETAIL INTRO =============== -->
<section class="movie-detail-intro overlay-gradient ptb100"
    style="background: url({{ asset('images/branding/posters/bg-film.jpg') }});">
</section>
<!-- =============== END OF MOVIE DETAIL INTRO =============== -->



<!-- =============== START OF MOVIE DETAIL INTRO 2 =============== -->
<section class="movie-detail-intro2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="movie-poster">
                    <img src="{{ asset('storage/' . $movie->image) }}" style="height: 440px" alt="">
                </div>


                <div class="movie-details">
                    <h3 class="title">{{ $movie->title }}</h3>

                    <ul class="movie-subtext">
                        <li>{{ $movie->maturity_rating }}</li>
                        <li>{{ $movie->running_time->format('G \h i\m\i\n') }}
                        </li>
                        <li>{{ $movie->category->title }}</li>
                        <li>{{ $movie->release_date->format('d M Y') }}</li>
                    </ul>

                    <a href="#reserve-now" class="btn btn-main btn-effect">Get tickets</a>
                    <a href="#" class="btn rate-movie"><i class="icon-heart"></i></a>

                    <div class="rating mt10">
                        @include('components.rating-stars', ['rating' => $movie->rating])
                        <span>{{ number_format($movie->rating, 1) }}/5</span>
                    </div>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</section>
<!-- =============== End OF MOVIE DETAIL INTRO 2 =============== -->


<!-- =============== START OF MOVIE DETAIL MAIN SECTION =============== -->
<section class="movie-detail-main ptb100">
    <div class="container">

        <div class="row">
            <!-- Start of Movie Main -->
            <div class="col-lg-8 col-sm-12">
                <div class="inner pr50">

                    <!-- Storyline -->
                    <div class="storyline">
                        <h3 class="title">Storyline</h3>

                        <p>{{ $movie->storyline }}</p>
                    </div>

                    <!-- Shows -->
                    <div class="movie-media mt50">
                        <h3 id="reserve-now" class="title">Jadwal Film</h3>
                        {{-- {{ ddd($shows->first()->date) }} --}}
                        @if ($shows->isNotEmpty())
                        <table class="table-responsive showtime-table table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Mulai</th>
                                    <th scope="col">Berakhir</th>
                                    <th scope="col">Harga Tiket</th>
                                    <th scope="col">Kursi Tersisa</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            @foreach ($shows as $show)
                            <tr class="{{ $show->remaining_seats < 5 ? 'table-danger' : '' }}">
                                <th>{{ $show->date->toDateString() }}</th>
                                <th>{{ $show->start_time->toTimeString() }}</th>
                                <th>{{ $show->end_time->toTimeString() }}</th>
                                <td>{{ $show->price . ' ' . config('app.currency') }}
                                </td>
                                <td>{{ $show->remaining_seats . '/' . $show->room->size }}
                                </td>
                                <td><a href="#reservation-popup"
                                        class="btn btn-second btn-effect open-reservation-popup"
                                        onclick="populateUI({{ $show->id . ',\'' . $show->date . '\',' . $show->price . ',' . (auth()->check() ? 'true' : 'false') }})">Pesan</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @include('components.reservation-modal')
                        @else
                        <div class="alert-film-warning text-center">
                            Saat ini film belum tayang. Coba kembali nanti ya!
                        </div>
                        @endif
                    </div>

                </div>
            </div>
            <!-- End of Movie Main -->


            <!-- Start of Sidebar -->
            <div class="col-lg-4 col-sm-12">
                <div class="sidebar">

                    <!-- Start of Details Widget -->
                    <aside class="widget widget-movie-details">
                        <h3 class="title">Detail Film</h3>

                        <ul>
                            <li><strong>Tanggal rilis:
                                </strong>{{ $movie->release_date->toFormattedDateString() }}
                            </li>
                            <li><strong>Sutradara:
                                </strong>{{ $movie->director }}</li>
                            <li><strong>Bahasa:
                                </strong>{{ $movie->language }}</li>
                            <li><strong>Durasi Film:
                                </strong>{{ $movie->running_time->format('G \h i\m\i\n') }}
                            </li>
                            <li><strong>Maturity rating:
                                </strong>{{ $movie->maturity_rating }}</li>
                        </ul>
                    </aside>
                    <!-- End of Details Widget -->

                </div>
            </div>
            <!-- End of Sidebar -->
        </div>

    </div>
</section>
<!-- =============== END OF MOVIE DETAIL MAIN SECTION =============== -->



<!-- =============== START OF RECOMMENDED MOVIES SECTION =============== -->
<section class="recommended-movies bg-light ptb100">
    <div class="container">

        <!-- Start of row -->
        <div class="row">
            <div class="col-md-8 col-sm-12 text-center mx-auto">
                <h2 class="title">Film lainnya</h2>
            </div>
        </div>
        <!-- End of row -->


        <!-- Start of Latest Movies Slider -->
        <div class="owl-carousel recommended-slider mt20">
            @each('components.movie-item-image', $recommendations, 'movie')
        </div>
        <!-- End of Latest Movies Slider -->

    </div>
</section>
<!-- =============== END OF RECOMMENDED MOVIES SECTION =============== -->

@endsection