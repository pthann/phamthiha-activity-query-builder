@foreach ($posts as $post)
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->created_at->format('d/m/Y') }}</p>  // Ví dụ: định dạng ngày created_at
@endforeach
