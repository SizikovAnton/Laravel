<h1>Список категорий новостей</h1>

<ul>
    @foreach ($categories as $key => $category)
        <li><a href="{{ route('news.category', ['id' => $key]) }}">{{ $category['name'] }}</a></li>
    @endforeach
</ul>