<div class="container">
    <h1 class="mt-0 mb-0 text-white">Tiket Reservasi Saya</h1>
    <hr>
    @if ($reservations->isNotEmpty())
        <table class="table table-responsive table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Film</th>
                    <th scope="col">Tanggal Pesan</th>
                    <th scope="col">Nomor Kursi</th>
                    <th scope="col">Harga</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            @foreach ($reservations as $reservation)
                <tr class="text-white">
                    <th>{{ $reservation->show->movie->title }}</th>
                    <th>{{ $reservation->show->date->toDayDateTimeString() }}</th>
                    <td>{{ $reservation->seat_number }}</td>
                    <td>Rp. {{ number_format($reservation->show->price, 0, ',', '.') }}</td>
                    @if ($reservation->show->date > Carbon\Carbon::now()->add(3, 'hour'))
                        <td class="disabled">
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input class="btn btn-second text-white" type="submit" value="Batalkan Reservasi">
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
    @else
        <div class="alert-film-warning text-center">
            Kamu belum memiliki reservasi.
        </div>
    @endif
</div>
