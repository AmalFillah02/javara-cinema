@extends('manager.layout')

@section('content')
<h1 class="h3 mb-0 text-gray-800">Manajemen Film</h1>
<p>*Menghapus sebuah film juga akan menghapus pertunjukannya beserta semua reservasi yang terkait.</p>
@if ($movies->isNotEmpty())
<table class="showtime-table table table-striped table-hover rounded">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Poster</th>
            <th scope="col">Judul</th>
            <th scope="col">Kategori</th>
            <th scope="col">Rating</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    @foreach ($movies as $movie)
    <tr>
        <th>{{ $movie->id }}</th>
        <th><img src="{{ asset('storage/'.$movie->image) }}" height="70px"></img></th>
        <th>{{ $movie->title }}</th>
        <td>{{ $movie->category->title }}</td>
        <td><i class="fa fa-star"></i>{{ $movie->rating }}</td>
        <td>
            <a href="{{ route('manager.movies.edit',$movie->id) }}"
               class="btn btn-warning text-white">Edit</a>
        </td>
        <td>
            <form action="{{ route('manager.movies.destroy',$movie->id) }}"
                  method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger text-white"
                       type="submit"
                       value="Hapus">
            </form>
        </td>
    </tr>
    @endforeach
</table>
@else
<div class="bg-light p-3 font-weight-bold rounded text-center">
    Tidak ada film yang tersedia.
</div>
@endif
@include('components.flash-message')
@endsection