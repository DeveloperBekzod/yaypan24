<ul class="navbar__menu basic-flex">
	@foreach ($categories as $category)
		<li class="menu__item">
			<a href="{{route('categoryPosts', $category->slug())}}">{{$category->name()}}</a>
		</li>
		@endforeach
</ul>
