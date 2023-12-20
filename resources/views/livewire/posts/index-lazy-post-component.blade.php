<section>
    <div class="text-sm breadcrumbs">
        <ul>
            <li>
                <x-icon name="s-home"/>
            </li>
            <li>Posts</li>
        </ul>
    </div>
    <div class="card w-full bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Posts</h2>
            <livewire:posts.table-post-component lazy />
        </div>
        <livewire:posts.delete-post-component/>
    </div>
</section>
