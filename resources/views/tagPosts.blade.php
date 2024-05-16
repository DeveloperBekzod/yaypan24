@extends('layouts.site')

@section('content')

<section class="news">
	<div class="container">
		<div class="news__wrapper basic-flex">
			<div class="column-news">
				<h2 class="news__title">#{{$tag['name_'.\App::getLocale()]}} Последние новости</h2>
				@include('sections.latestPosts')
				{{$posts->links()}}
				<button type="button" class="btn load-more-btn">Больше новостей</button>
			</div>
			@include('sections.popularPosts')
		</div>
	</div>
</section>
@endsection