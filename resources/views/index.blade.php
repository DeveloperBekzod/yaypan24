@extends('layouts.site')

@section('title')
    Home page
@endsection

@section('content')

@include('sections.mainPosts')
<div class="container">
	<div class="notification basic-flex">
		<div class="notification__text basic-flex">
			<h3>{{__('notification')}}</h3>
		</div>
		<button type="button" class="notification__button btn">{{__('on-notification')}}</button>
	</div>
</div>

<section class="news">
	<div class="container">
		<div class="news__wrapper basic-flex">
			<div class="column-news">
				<h2 class="news__title">{{__('latest')}}</h2>
				@include('sections.latestPosts')
				<button type="button" class="btn load-more-btn">{{__('more')}}</button>
			</div>
			@include('sections.popularPosts')
		</div>
	</div>
</section>

<div class="apps-block container basic-flex">
	<div class="apps-block__image"></div>
	<div class="apps-block__content">
		<h4>{{__('keep-always')}}</h4>
		<p>{{__('install')}}</p>
	</div>
	<div class="apps-block__links basic-flex">
		<div class="links__item">
			<a href="#"><img src="img/googleplay.png" alt="googleplay"></a>
		</div>
		<div class="links__item">
			<a href="#"><img src="img/appstore.png" alt="googleplay"></a>
		</div>
	</div>
</div>
@endsection
