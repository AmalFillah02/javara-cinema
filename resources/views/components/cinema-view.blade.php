<div class="reservation-movie-details pt-2 pb-2">
    <div>Film: <strong id="movie-title" class="font-weight-bold">{{ $movie->title }}</strong></div>
    <div>Tanggal: <strong id="show-date" class="font-weight-bold"></strong></div>
    <div>Harga: <strong class="font-weight-bold"><strong id="show-price"></strong> {{ config('app.currency') }}</strong></div>
</div>

<ul class="showcase">
    <li>
        <div class="seat"></div>
        <small>Tersedia</small>
    </li>
    <li>
        <div class="seat selected"></div>
        <small>Terpilih</small>
    </li>
    <li>
        <div class="seat sold"></div>
        <small>Terjual</small>
    </li>
</ul>
<div class="container cinema-container">
    <div class="screen"></div>
    <div class="seats-container">

    </div>
</div>

<p class="reservation-text"text-align-center>
    Anda telah memilih <span id="seats-count">0</span> kursi dengan harga <span id="total-price">0</span> {{ config('app.currency') }}
</p>