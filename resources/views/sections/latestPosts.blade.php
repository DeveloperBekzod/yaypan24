<section class="news">
	<div class="container">
		<div class="news__wrapper basic-flex">
			<div class="column-news">
				<h2 class="news__title">Последние новости</h2>
				<ul class="news__list basic-flex">
					@foreach ($latestpost as $post)
						<li class="news__item">
							<a href="#" class="basic-flex news__link">
								<div class="news-image-wrapper"><img src="/img/posts/{{$post->image}}" alt="{{$post['title_'.\App::getLocale()]}}"></div>
								<div class="news-box basic-flex">
									<h4 class="news__title">{{$post['title_'.\App::getLocale()]}}</h4>
									<p class="news__description">После прорыва дамбы Сардобинского водохранилища возбуждено уголовное дело, сообщили в пресс-службе Генпрокуратуры Узбекистана.
									</p>
									<span class="news__date basic-flex">{{$post->created_at->format('H:i / d.m.Y')}}</span>
								</div>
							</a>
						</li>
					@endforeach
					</ul>
					<button type="button" class="btn load-more-btn">Больше новостей</button>
			</div>
			<div class="popular-news">
				<div class="popular-news-wrapper">
					<h4 class="popular-news__title">Cамые популярные новости</h4>
					<ul class="popular-news__list">
						<li class="popular-news__item">
							<a href="#">
								<p class="popular-news__description">По факту прорыва Сардобинского водохранилища возбуждено уголовное дело</p>
								<span class="popular-news__date">11:31 / 15.05.2020</span>
							</a>
						</li>
						<li class="popular-news__item">
							<a href="#">
								<p class="popular-news__description">По факту прорыва Сардобинского водохранилища возбуждено уголовное дело</p>
								<span class="popular-news__date">11:31 / 15.05.2020</span>
							</a>
						</li>
						<li class="popular-news__item">
							<a href="#">
								<p class="popular-news__description">По факту прорыва Сардобинского водохранилища возбуждено уголовное дело</p>
								<span class="popular-news__date">11:31 / 15.05.2020</span>
							</a>
						</li>
						<li class="popular-news__item">
							<a href="#">
								<p class="popular-news__description">По факту прорыва Сардобинского водохранилища возбуждено уголовное дело</p>
								<span class="popular-news__date">11:31 / 15.05.2020</span>
							</a>
						</li>
					</ul>
				</div>
				<div class="ads-placeholder">
						<h4>ADS PLACEHOLDER</h4>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="apps-block container basic-flex">
	<div class="apps-block__image"></div>
	<div class="apps-block__content">
		<h4>Всегда будьте в курсе последних новостей!</h4>
		<p>Установите мобильное приложение NAMANGANLIKLAR24 и все новости в вашем кармане!</p>
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