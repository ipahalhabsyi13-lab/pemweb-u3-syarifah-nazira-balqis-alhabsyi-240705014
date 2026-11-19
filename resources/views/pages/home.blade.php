
@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section class="hero">
    <h1>Welcome to Sweet News ♡</h1>

    <p>
        Temukan berbagai informasi dan berita menarik.
        Baca artikel terbaru dan bagikan informasi bermanfaat
        bersama Sweet News.
    </p>

    @guest
        <a href="{{ route('login') }}" class="btn">
            Mulai Membaca
        </a>
        <a href="{{ route('register') }}" class="btn btn-yellow">
            Daftar Sekarang
        </a>
    @endguest

    @auth
        <a href="{{ route('articles.create') }}" class="btn">
            + Tulis Artikel
        </a>
    @endauth
</section>

<div class="section-title">
    <h2>Artikel Terbaru ♡</h2>
    <p class="muted">Informasi terbaru untuk menemani harimu.</p>
</div>

@if ($articles->isNotEmpty())

    <div class="article-grid">

        @foreach ($articles as $article)

            <article class="card article-card">

                <img src="{{ $article->image_url }}"
                     alt="{{ $article->title }}">

                <div class="article-content">

                    <p class="muted">
                        {{ $article->created_at->format('d M Y') }}
                        · {{ $article->user->name }}
                    </p>

                    <h3>{{ $article->title }}</h3>

                    <p>
                        {{ \Illuminate\Support\Str::limit($article->body, 120) }}
                    </p>

                    <a href="{{ route('articles.show', $article) }}"
                       class="btn btn-small">
                        Baca Selengkapnya →
                    </a>

                </div>
            </article>

        @endforeach

    </div>

@else

    <div class="card">
        <p class="muted">Belum ada artikel yang tersedia.</p>
    </div>

@endif

@endsection
