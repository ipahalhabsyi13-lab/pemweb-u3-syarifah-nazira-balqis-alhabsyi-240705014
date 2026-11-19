
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<section class="hero">
    <h1>Dashboard ♡</h1>

    <p>
        Selamat datang kembali, {{ $user->name }}!
        Berikut ringkasan aktivitas artikel kamu.
    </p>
</section>

<div class="stats-grid">

    <div class="card stat-card">
        <h3>Total Artikel</h3>
        <p class="stat-number">{{ $totalArticles }}</p>
        <p class="muted">Seluruh artikel di sistem.</p>
    </div>

    <div class="card stat-card yellow">
        <h3>Artikel Saya</h3>
        <p class="stat-number">{{ $myArticles }}</p>
        <p class="muted">Artikel yang kamu buat.</p>
    </div>

</div>

<div class="section-title">
    <h2>Aksi Cepat</h2>
</div>

<div class="row">

    <div class="card">
        <h3>♡ Tambah Artikel</h3>
        <p class="muted">Buat artikel dan bagikan informasi baru.</p>

        <a href="{{ route('articles.create') }}" class="btn">
            + Tambah Artikel
        </a>
    </div>

    <div class="card">
        <h3>✿ Kelola Artikel</h3>
        <p class="muted">Lihat dan kelola artikel yang tersedia.</p>

        <a href="{{ route('articles.index') }}" class="btn btn-yellow">
            Lihat Artikel
        </a>
    </div>

</div>

<div class="section-title">
    <h2>Artikel Terbaru</h2>
</div>

@if ($latestArticles->isNotEmpty())

    @foreach ($latestArticles as $article)

        <div class="card">

            <div style="display:flex; gap:18px; align-items:center; flex-wrap:wrap;">

                <img src="{{ $article->image_url }}"
                     alt="{{ $article->title }}"
                     style="width:120px;height:90px;object-fit:cover;border-radius:12px;">

                <div style="flex:1;">

                    <h3>
                        <a href="{{ route('articles.show', $article) }}">
                            {{ $article->title }}
                        </a>
                    </h3>

                    <p class="muted">
                        Oleh {{ $article->user->name }}
                        · {{ $article->created_at->format('d M Y') }}
                    </p>

                    <p>
                        {{ \Illuminate\Support\Str::limit($article->body, 100) }}
                    </p>

                </div>

            </div>

        </div>

    @endforeach

@else

    <div class="card">
        <p class="muted">Belum ada artikel.</p>
    </div>

@endif

<div class="card">
    <h3>Informasi Akun ♡</h3>

    <p><strong>Nama:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
</div>

@endsection
