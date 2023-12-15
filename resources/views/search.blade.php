@extends('layouts.site')

@section('title')
	Search page {{$key}}
@endsection

@section('content')

<section class="news">
	<div class="container">
		<div class="news__wrapper basic-flex">
			<div class="column-news">
				<h2 class="news__title">
					@if (count($posts)>0) "{{$key}}" bo'yicha {{count($posts)}} ta natija topildi.
					@else "{{$key}}" bo'yicha hech narsa topilmadi.
					@endif</h2>
				@include('sections.latestPosts')
				<button type="button" class="btn load-more-btn">Больше новостей</button>
			</div>
			@include('sections.popularPosts')
		</div>
	</div>
</section>
@endsection