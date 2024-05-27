<ul class="news__list basic-flex">
    @foreach ($posts as $post)
        <x-latest-post :$post/>
    @endforeach
</ul>
