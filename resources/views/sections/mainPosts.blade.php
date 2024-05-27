<section class="posts">
    <div class="container">
        <ul class="posts__list basic-flex">
            @foreach ($specialposts as $post)
                <x-post-item :$post/>
            @endforeach
        </ul>
    </div>
</section>
