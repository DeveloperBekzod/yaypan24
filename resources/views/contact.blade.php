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
                    <h3 class="form__wrapper-title">{{__('write')}}</h3>
                    <form method="POST" action="{{route('sendMessage')}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form__top">
                            <label><input type="text" placeholder="Имя" name="name" value="{{old('name')}}"></label>
                            <label><input type="email" placeholder="Электронная почта" name="email" value="{{old('email')}}"></label>
                            <label><input type="text" placeholder="Номер телефона" name="telephone" value="{{old('telephone')}}"></label>
                            <label><input type="text" placeholder="Тема" name="subject" value="{{old('subject')}}"></label>
                            <textarea class="contact-tetxarea" placeholder="Текст" name="message">{{old('message')}}</textarea>
                        </div>
                        <div class="form__bottom">
                            <input type="file" name="file" id="file" class="inputfile">
                            <label for="file" class="basic-flex">Прикрепить файл</label>
                            <div class="form-group" style="margin-bottom: 20px">
                                <div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}}></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger"
                                          style="color: crimson">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div>
                            {{-- <label class="basic-flex verification-code-wrapper">
                                <input type="text" placeholder="Код">
                                <span class="verification-code">4 k 7 Z a</span>
                            </label> --}}

                            <button type="submit" class="btn send-btn">{{__('submit')}}</button>
                        </div>
                    </form>
                </div>
                <div class="business__card">
                    <h3 class="card__title">YAYPANLIKLAR24</h3>
                    <div class="card__item basic-flex">
                        <span card__item-title>{{__('email')}}</span>
                        <a class="email__link" href="mailto:info@yaypanliklar24.uz">info@yaypanliklar24.uz</a>
                    </div>
                    <div class="card__item basic-flex">
                        <span card__item-title>{{__('smm')}}</span>
                        <div class="card__social-items basic-flex">
                            <a href="#" class="social__item"></a>
                            <a href="#" class="social__item"></a>
                            <a href="#" class="social__item"></a>
                        </div>
                    </div>
                    <div class="card__item basic-flex">
                        <span card__item-title>{{__('channel')}}</span>
                        <a class="card-join-telegram basic-flex" href="#">{{__('follow')}}</a>
                    </div>
                    <div class="card__item basic-flex">
                        <span card__item-title>{{__('app')}}</span>
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
