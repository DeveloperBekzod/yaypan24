<section class="posts">
	<div class="container">
		<ul class="posts__list basic-flex">
			@foreach ($specialpost as $post)
				<li class="posts__item">
					<a href="{{ route('postDetail', $post['slug_'.\App::getLocale()])}}">
						<img src="/img/posts/{{$post->image}}" alt="{{$post['title_'.\App::getLocale()]}}" class="posts__img">
						<h2 class="posts__title">{{$post['title_'.\App::getLocale()]}}</h2>
						<span class="posts__date">{{$post->created_at->setTimezone('Asia/Tashkent')->format('H:i / d.m.Y')}}</span>
					</a>
				</li>
			@endforeach
		</ul>
	</div>
</section>
