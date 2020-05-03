@extends("layouts.app")

@section('content')

    <div class="flex-center position-ref full-height">

            <div class="container">
                <div class="h2 m-b-md">
                    Laravel Repositories
                </div>

                <div class="links">
                    <a href="{{ route('posts.index') }}">Posts</a>
                </div>
            </div>
        </div>

@endsection
