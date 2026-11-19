
@extends('layouts.app')

@section('title', 'Daftar Artikel')

@section('content')

<section class="hero">
    <h1>Daftar Artikel ♡</h1>
    <p>Kelola dan temukan berbagai artikel menarik di sini.</p>

    <a href="{{ route('articles.create') }}" class="btn">
        + Tambah Artikel
    </a>
</section>

@if (session('success'))
    <div class="flash">
        {{ session('success') }}
    </div>
@endif

<section class="card">

    <h2>Semua Artikel</h2>

    @if ($articles->isNotEmpty())

        <ul class="article-list">

            @foreach ($articles as $article)

                <li>

                    <h3>
                        <a href="{{ route('articles.show', $article) }}">
                            {{ $article->title }}
                        </a>
                    </h3>

                    <small>
                        Oleh {{ $article->user->name }}
                        · {{ $article->created_at->format('d M Y') }}
                    </small>

                    <p>
                        {{ \Illuminate\Support\Str::limit($article->body, 120) }}
                    </p>

                    <a href="{{ route('articles.show', $article) }}"
                       class="btn btn-small">
                        Detail
                    </a>

                    @if ($article->user_id === auth()->id())

                        <a href="{{ route('articles.edit', $article) }}"
                           class="btn btn-small btn-yellow">
                            Edit
                        </a>

                        <form action="{{ route('articles.destroy', $article) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-small btn-danger">
                                Hapus
                            </button>

                        </form>

                    @endif

                </li>

            @endforeach

        </ul>

        {{ $articles->links('pagination::default') }}

    @else

        <p class="muted">Belum ada artikel yang tersedia.</p>

    @endif

</section>

@endsection
