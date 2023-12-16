<section>
    <div class="text-sm breadcrumbs">
        <ul>
            <li>
                <x-icon name="s-home"/>
            </li>
            <li>
                <a href="{{ route('posts.index') }}">Posts</a>
            </li>
            <li>
                Show
            </li>
        </ul>
    </div>
    <div class="card w-full bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <div class="flex justify-between text-sm">
                <div>{{ $post->user->name }}</div>
                <div>{{ $post->user->created_at }}</div>
            </div>
            <div class="whitespace-pre-line">{{ $post->content }}</div>

            <livewire:posts.comments.index-comment-component :post="$post" />
        </div>
    </div>
</section>
