<!DOCTYPE html>
<html lang="ru">

<head>
    @meta_tags
     <title> @yield('title') - YAYPAN 24</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    {{-- <div class="layer">
    <div class="modal-box basic-flex">
      <button type="button" class="btn hide-modal-btn">x</button>
      <h4>Подписывайтесь на наш канал в Telegram и будьте всегда в курсе самых последних новостей:</h4>
      <div class="telegram-join  basic-flex">
        <a href="#"><img src="/img/tg.png" alt="Telegram">Подписатся</a>
      </div>
    </div>
  </div> --}}
    <div class="menu-mask"></div>
    <main>
        <header class="main-header">
            <div class="container">
                <div class="basic-flex header__top">
                    <a href="{{ route('index') }}" class="logo">
                        <img src="/img/logo.png" alt="YAYPANLIKLAR24">
                    </a>
                    <div class="currencies basic-flex">
                        <div class="currency"><span>$</span><span>{{ $currencyData['usd']['Rate'] }}</span></div>
                        <div class="currency"><span>P</span><span>{{ $currencyData['rub']['Rate'] }}</span></div>
                        <div class="currency"><span>E</span><span>{{ $currencyData['eur']['Rate'] }}</span></div>
                    </div>
                    <div class="header__actions basic-flex">
                        <form method="GET" action="{{ route('search') }}" class="search-form basic-flex">
                            <input type="search" name="key" class="search-input">
                            <button type="submit" class="btn search-btn"></button>
                        </form>
                        <div class="languages">
                            <a
                                href="javascript:void(0);"class="btn language__option language__option--{{ \App::getLocale() }} language__option--active">
                                {{ \App::getLocale() == 'ru' ? 'РУ' : 'o\'z' }}
                            </a>
                            <div class="languages__list">
                                <a href="{{ route('language', \App::getLocale() == 'ru' ? 'uz' : 'ru') }}"
                                    class="btn language__option language__option--{{ \App::getLocale() == 'ru' ? 'uz' : 'ru' }}"
                                    data-status="disabled">
                                    {{ \App::getLocale() == 'ru' ? 'o\'z' : 'РУ' }}
                                </a>
                            </div>
                        </div>
                        <a href="#" class="telegram-join basic-flex" style="color: white">
                            <img src="/img/tg.png" alt="Telegram">{{__('follow')}}
                        </a>
                    </div>
                </div>
                <button type="button" class="btn btn-menu"><span class="hamburger"></span></button>
                <nav class="navbar">
                    <div class="currencies-responsive basic-flex">
                        <div class="currency"><span>$</span><span>{{ $currencyData['usd']['Rate'] }}</span></div>
                        <div class="currency"><span>P</span><span>{{ $currencyData['rub']['Rate'] }}</span></div>
                        <div class="currency"><span>E</span><span>{{ $currencyData['eur']['Rate'] }}</span></div>
                    </div>
                    @include('layouts.navigations')
                </nav>
                <div class="advertisement-box">
                    <h4>{{__('ads')}}</h1>
                </div>
            </div>
        </header>

        @include('layouts.statistics')

        @yield('content')

    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer__top basic-flex">
                <a href="{{ route('index') }}" class="footer_logo"><img src="/img/logo.png"
                        alt="YAYPANLIKLAR24"></a>
                <div class="join-telegram-wrapper basic-flex">
                    <p>{{__('telegram')}}:</p>
                    <a href="https://t.me/bekzod0500" class="join-telegram">{{__('follow')}}</a>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="about-site">
                    <h4>{{__('about')}}</h4>
                    <p>{{__('about-text')}}</p>
                </div>
                <ul class="footer-menu">
                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">{{__('site-about')}}</a>
                    </li>
                    <li class="footer-menu__item"><a href="{{ route('contact') }}" class="footer-menu__link">{{__('write')}}</a></li>
                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">{{__('ad')}}</a></li>
                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">{{__('send')}}</a></li>
                </ul>
                <ul class="footer-menu">
                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">{{__('use')}}</a></li>
                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">{{__('theme')}}</a></li>
                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">{{__('us')}}</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/main.js') }}"></script>

    @yield('js')

</body>

</html>
