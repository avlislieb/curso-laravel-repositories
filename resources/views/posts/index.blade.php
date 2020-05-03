@extends("layouts.app")

@section('content')
    <div class="container ">
        <h1>listagem post</h1>

        @forelse($listPost as $post)
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
            <hr class="my-2">
        @empty
            <p>Nenhum post cadastrado</p>
        @endforelse

        {!! $listPost->links() !!}
    </div>



@endsection
