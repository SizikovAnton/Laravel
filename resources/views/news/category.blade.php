<h1>{{ $category['name'] }}</h1>

@foreach ($news as $item)
    <div>
        <a href="{{ route('news.id', ['id' => $item['id']]) }}">{{ $item['name'] }}</a>
        <p>{{ $item['description'] }}</p>
    </div>
    <hr>
@endforeach