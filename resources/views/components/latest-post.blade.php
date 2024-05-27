<li class="news__item">
    <a href="{{route('postDetail', $post->slug())}}" class="basic-flex news__link">
        <div class="news-image-wrapper"><img src="/img/posts/{{$post->image}}" alt="{{$post->title()}}"></div>
        <div class="news-box basic-flex">
            <h4 class="news__title">{{$post->title()}}</h4>
            <p class="news__description">{!! \Str::limit($post->text(), 150) !!}</p>
            <span class="news__date basic-flex">{{$post->created_at->format('H:i / d.m.Y')}}</span>
        </div>
    </a>
</li>
