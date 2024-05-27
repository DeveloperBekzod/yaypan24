<li class="posts__item">
    <a href="{{ route('postDetail', $post->slug())}}">
        <img src="/img/posts/{{$post->image}}" alt="{{$post->title()}}" class="posts__img">
        <h2 class="posts__title">{{$post->title()}}</h2>
        <span class="posts__date">{{$post->created_at->setTimezone('Asia/Tashkent')->format('H:i / d.m.Y')}}</span>
    </a>
</li>
