
@foreach($posts as $post)
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->content }}</p>
    <p>Category: {{ $post->category->name }}</p>
@endforeach
