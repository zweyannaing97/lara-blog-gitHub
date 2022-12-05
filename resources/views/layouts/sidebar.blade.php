<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{route('home')}}">
        Home
    </a>
    <a class="list-group-item list-group-item-action" href="{{route('photo.index')}}">
        Gallery
    </a>
</div>

<p class="small mb-1 text-black-50">Manage Category</p>
<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{route('category.index')}}">
        Category List
    </a>
    <a class="list-group-item list-group-item-action" href="{{route('category.create')}}">
        Create Category
    </a>
</div>

<p class="small mb-1 text-black-50">Manage Post</p>
<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{route('post.index')}}">
        Post List
    </a>
    <a class="list-group-item list-group-item-action" href="{{route('post.create')}}">
        Create Post
    </a>
</div>

@admin
<p class="small mb-1 text-black-50">Manage User</p>
<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{route('user.index')}}">
        User List
    </a>
</div>
@endadmin
