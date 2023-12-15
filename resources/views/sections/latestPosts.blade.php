<ul class="news__list basic-flex">
	@foreach ($posts as $post)
		<li class="news__item">
			<a href="{{route('postDetail', $post['slug_'.\App::getLocale()])}}" class="basic-flex news__link">
				<div class="news-image-wrapper"><img src="/img/posts/{{$post->image}}" alt="{{$post['title_'.\App::getLocale()]}}"></div>
				<div class="news-box basic-flex">
					<h4 class="news__title">{{$post['title_'.\App::getLocale()]}}</h4>
					<p class="news__description">{!! \Str::limit($post['text_'.\App::getLocale()], 150) !!}</p>
					<span class="news__date basic-flex">{{$post->created_at->format('H:i / d.m.Y')}}</span>
				</div>
			</a>
		</li>
	@endforeach
	</ul>