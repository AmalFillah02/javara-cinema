@extends('manager.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Film</h1>
<form action="{{ route('manager.movies.store') }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        @include('components.form-input',[
        'name'=>'image',
        'classes'=>'col-6',
        'label'=>'Poster Film*',
        'required'=>'required',
        'type'=>'file',
        ])
        @include('components.form-input',[
        'name'=>'title',
        'classes'=>'col-6',
        'label'=>'Judul*',
        'required'=>'required',
        'type'=>'text',
        'value'=>old('title'),
        ])
    </div>
    <div class="row">
        @include('components.form-select',[
        'name'=>'category_id',
        'label'=>'Kategori*',
        'classes'=>'col-6',
        'options'=>$categories,
        'required'=>'required',
        'selected'=> old('category_id'),
        ])
        @include('components.form-input',[
        'name'=>'language',
        'classes'=>'col-6',
        'label'=>'Bahasa*',
        'required'=>'required',
        'type'=>'text',
        'value'=>old('language'),
        ])
    </div>

    <div class="row">
        @include('components.form-input',[
        'name'=>'rating',
        'classes'=>'col-6',
        'label'=>'Rating Film*',
        'required'=>'required',
        'type'=>'number',
        'value'=>old('rating'),
        'extra_attr'=>'min=0 max=5 step=0.01',
        ])
        @include('components.form-date',[
        'name'=>'release_date',
        'label'=>'Tanggal Rilis*',
        'classes'=>'col-6',
        'value'=>old('release_date'),
        'required'=>'required',
        ])
    </div>

    <div class="row">
        @include('components.form-input',[
        'name'=>'director',
        'classes'=>'col-6',
        'label'=>'Sutradara*',
        'required'=>'required',
        'type'=>'text',
        'value'=>old('director'),
        ])
        @include('components.form-select', [
        'name' => 'maturity_rating',
        'classes' => 'col-6',
        'label' => 'Maturity Rating*',
        'required' => 'required',
        'options' => [
        'SU' => 'Semua Umur (SU)',
        '13+' => '13 Tahun Ke Atas',
        '17+' => '17 Tahun Ke Atas',
        '21+' => '21 Tahun Ke Atas',
        ],
        'selected' => old('maturity_rating'),
        ])
    </div>
    <div class="row">
        @include('components.form-input', [
        'name' => 'running_time',
        'label' => 'Durasi Film (HH:MM:SS)*',
        'classes' => 'col-6',
        'value' => old('running_time'),
        'required' => 'required',
        'type' => 'text',
        'placeholder' => '02:50:23',
        ])
        @include('components.form-textarea',[
        'name'=>'storyline',
        'classes'=>'col-6',
        'label'=>'Sinopsis*',
        'required'=>'required',
        'value'=>old('storyline'),
        ])
    </div>

    <div class="row justify-content-end">
        <input class="btn btn-success m-2"
            type="submit"
            value="Tambahkan">
    </div>
</form>
@include('components.flash-message')
@endsection