<hr>

<h3>Comment</h3>

@if(!is_null(session('message')))
    <div class="alert alert-success">
        <ul class="m-0">
            <li>{{ session('message') }}</li>
        </ul>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="m-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('comment.store') }}" method="POST" class="form">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <div class="form-group">
        <input type="text" name="title" placeholder="title" class="form-control">
    </div>
    <div class="form-group">
        <textarea name="body" id="" placeholder="comment" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-primary">
            Send
        </button>
        <button type="reset" class="btn btn-outline-danger">
            Reset
        </button>
        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary float-right">Voltar</a>
    </div>
</form>

<hr>

<h3>Comments ({{ $post->Comment->count() }})</h3>

@forelse($post->Comment as $comment)
    <p>
        <b>{{ $comment->User->name }} commented:</b>
        {{ $comment->title }} - {{ $comment->body }}
    </p>
@empty

@endforelse
