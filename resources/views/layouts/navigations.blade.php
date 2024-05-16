<ul class="navbar__menu basic-flex">
	@foreach ($categories as $category)
		<li class="menu__item">
			<a href="{{route('categoryPosts', $category['slug_'.\App::getLocale()])}}">{{$category['name_'.\App::getLocale()]}}</a>
		</li>
		@endforeach
</ul>