
@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')

<section class="hero">
    <h1>Tulis Artikel Baru ♡</h1>
    <p>Bagikan informasi dan cerita menarik melalui artikel kamu.</p>
</section>

<section class="card">

    <h2>Form Tambah Artikel</h2>

    @if ($errors->any())

        <div class="error">
            <strong>Periksa kembali data kamu:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('articles.store') }}" method="POST">

        @csrf

        <label for="title">Judul Artikel</label>

        <input type="text"
               id="title"
               name="title"
               value="{{ old('title') }}"
               placeholder="Masukkan judul artikel..."
               required>

        <label for="image">URL Gambar (Opsional)</label>

        <input type="url"
               id="image"
               name="image"
               value="{{ old('image') }}"
               placeholder="https://example.com/gambar.jpg">

        <p class="muted">
            Jika dikosongkan, sistem akan menggunakan gambar placeholder.
        </p>

        <label for="body">Isi Artikel</label>

        <textarea id="body"
                  name="body"
                  rows="10"
                  placeholder="Tuliskan isi artikel di sini..."
                  required>{{ old('body') }}</textarea>

        <br><br>

        <button type="submit">
            ♡ Simpan Artikel
        </button>

        <a href="{{ route('articles.index') }}"
           class="btn btn-yellow">
            Batal
        </a>

    </form>

</section>

@endsection
