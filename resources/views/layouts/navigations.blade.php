<ul class="navbar__menu basic-flex">
	@foreach ($categories as $category)
		<li class="menu__item"><a href="{{route('categoryPosts', $category['slug_'.\App::getLocale()])}}">{{$category['name_'.\App::getLocale()]}}</a></li>
		@endforeach
	{{-- <li class="menu__item"><a href="">Узбекистана</a></li>
	<li class="menu__item"><a href="#">Мир</a></li>
	<li class="menu__item"><a href="#">Экономика</a></li>
	<li class="menu__item"><a href="#">Политика</a></li>
	<li class="menu__item"><a href="#">Общество</a></li>
	<li class="menu__item"><a href="#">Технологии</a></li>
	<li class="menu__item"><a href="#">Спорт</a></li>
	<li class="menu__item"><a href="#">Культура</a></li>
	<li class="menu__item"><a href="#">Происшествия</a></li>
	<li class="menu__item"><a href="#">Туризм</a></li> --}}
</ul>