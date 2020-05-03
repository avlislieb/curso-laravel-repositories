@extends("layouts.app")


@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>
            {{ $post->body }}
        </p>

        @if(auth()->check())
            @include('posts.comments.comment', compact('post'))
        @else
             <p>
                 Precisa esta logado pra ver os comentarios <a href="{{ route("login") }}">clique pra fazer login</a>
             </p>
             <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Voltar</a>
        @endif
    </div>
@endsection
