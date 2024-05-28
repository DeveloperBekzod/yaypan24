<div class="container">
    <div class="covid-block basic-flex ">
        <div class="covid-block__title basic-flex">
            <div class="covid-title__img"></div>
            <a href="#" class="covid-title__text">{{__('virus')}}</a>
        </div>
        <div class="covid-block__stats basic-flex">
            <div class="stats__item basic-flex">
                <div class="stats__img"></div>
                <div class="stats-text-box">
                    <h4>{{__('ils')}}</h4>
                    <p>{{ $stat['onVentilatorCumulative'] }}</p>
                </div>
            </div>
            <div class="stats__item basic-flex">
                <div class="stats__img"></div>
                <div class="stats-text-box">
                    <h4>{{__('wells')}}</h4>
                    <p>{{ $stat['onVentilatorCurrently'] }}</p>
                </div>
            </div>
            <div class="stats__item basic-flex">
                <div class="stats__img"></div>
                <div class="stats-text-box">
                    <h4>{{__('die')}}</h4>
                    <p>{{ $stat['states'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
