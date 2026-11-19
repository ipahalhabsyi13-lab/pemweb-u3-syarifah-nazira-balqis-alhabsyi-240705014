
@extends('layouts.app')

@section('title', $article->title)

@section('content')

<section class="card">

    <a href="{{ route('home') }}">← Kembali ke Home</a>

    <h1>{{ $article->title }}</h1>

    <p class="muted">
        Dipublikasikan pada
        {{ $article->created_at->format('d M Y') }}
        oleh {{ $article->user->name }}
    </p>

    <img src="{{ $article->image_url }}"
         alt="{{ $article->title }}"
         class="detail-image">

    <div class="article-body">
        {!! nl2br(e($article->body)) !!}
    </div>

    <hr style="border:0;border-top:1px solid #f0e4df;margin:25px 0;">

    <a href="{{ route('home') }}" class="btn btn-yellow">
        ← Kembali
    </a>

    <a href="{{ route('articles.index') }}" class="btn">
        Semua Artikel
    </a>

    @auth

        @if ($article->user_id === auth()->id())

            <a href="{{ route('articles.edit', $article) }}"
               class="btn btn-small">
                Edit Artikel
            </a>

        @endif

    @endauth

</section>

@endsection
