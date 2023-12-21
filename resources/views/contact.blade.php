@extends('layouts.site')

@section('title')
	Contact
@endsection

@section('content')
<section class="contact-details">
	<div class="container">
		<div class="contact-details__wrapper basic-flex">    
			<div class="form__wrapper">
				@if (session('message'))
					<h2>{{session('message')}}</h2>
				@endif
				<h3 class="form__wrapper-title">Напишите нам
				</h3>
				<form method="POST" action="{{route('sendMessage')}}" enctype="multipart/form-data">
					@csrf
					<div class="form__top">
						<label><input type="text" placeholder="Имя" name="name" value="{{old('name')}}" required></label>
						<label><input type="email" placeholder="Электронная почта" name="email" value="{{old('email')}}" required></label>
						<label><input type="text" placeholder="Номер телефона" name="telephone" value="{{old('telephone')}}" required></label>
						<label><input type="text" placeholder="Тема" name="subject" value="{{old('subject')}}"></label>
						<textarea class="contact-tetxarea" placeholder="Текст" name="message" required>{{old('message')}}</textarea>
					</div>
					<div class="form__bottom">
						<input type="file" name="file" id="file" class="inputfile">
						<label for="file" class="basic-flex">Прикрепить файл</label>
						<div class="form-group" style="margin-bottom: 20px">
							<div class=" g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
								@if ($errors->has('g-recaptcha-response'))
									<span class="text-danger" style="color: crimson">{{ $errors->first('g-recaptcha-response') }}</span>
								@endif
						</div>
						{{-- <label class="basic-flex verification-code-wrapper">
							<input type="text" placeholder="Код">
							<span class="verification-code">4 k 7 Z a</span>
						</label> --}}
						
						<button type="submit" class="btn send-btn">Отправить</button>
					</div>
				</form>
			</div>
			<div class="business__card">
				<h3 class="card__title">NAMANGANLIKLAR24</h3>
				<div class="card__item basic-flex">
					<span card__item-title>Электронная почта</span>
					<a class="email__link" href="mailto:info@namanganliklar24.uz">info@namanganliklar24.uz</a>
				</div>
				<div class="card__item basic-flex">
					<span card__item-title>Социальные сети</span>
					<div class="card__social-items basic-flex">
						<a href="#" class="social__item"></a>
						<a href="#" class="social__item"></a>
						<a href="#" class="social__item"></a>
					</div>
				</div>
				<div class="card__item basic-flex">
					<span card__item-title>Телеграм канал</span>
					<a class="card-join-telegram basic-flex" href="#">Подписатся</a>
				</div>
				<div class="card__item basic-flex">
					<span card__item-title>Мобильная приложение</span>
					<div class="card__apps-wrapper basic-flex">
						<a href="#"><img src="/img/googleplay-wh.png" alt="GooglePlay"></a>
						<a href="#"><img src="/img/appstore-white.png" alt="AppStore"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('js')
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection