
@foreach($categories as $category)
    <h3>Category: {{ $category->name }}</h3>
    @if($category->latestPost)
        <p>{{ $category->latestPost->title }}</p>
        <p>{{ $category->latestPost->content }}</p>
    @else
        <p>No posts available.</p>
    @endif
@endforeach
