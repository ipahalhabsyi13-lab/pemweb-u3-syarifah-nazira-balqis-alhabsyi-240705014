@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <section class="card">
        <h2>Login</h2>

        @if ($errors->any())
            <div class="error">
<ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" type="email" name="email"
                   value="{{ old('email') }}" required
                   autocomplete="email" autofocus>

            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                   required autocomplete="current-password">

            <label>
                <input type="checkbox" name="remember" value="1">
                Remember me
            </label>
            <button type="submit">Masuk</button>
        </form>

        <p class="muted">
            Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
        </p>
    </section>
@endsection
