@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Post List</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Post List</h4>
            <hr>
            <div class="d-flex justify-content-between">
                <div class="">
                    @if(request('keyword'))
                        <span class="mb-0">Search By : "{{request('keyword')}}"</span>
                        <a href="{{route('post.index')}}">
                            <button class="btn btn-outline-danger btn-sm">Cancel</button>
                        </a>
                    @endif
                </div>
                <form action="{{route('post.index')}}" method="get">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" required>
                        <button class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Title</td>
                    <td>Category</td>
                    <td>Owner</td>
                    <td>Control</td>
                    <td>Created</td>
                </tr>
                </thead>
                <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                            {{\App\Models\Category::find($post->category_id)->title}}
                        </td>
                        <td>
                            {{\App\Models\User::find($post->user_id)->name}}
                        </td>
                        <td class="">
                            <a href="{{route('post.show',$post->id)}}">
                                <button class="btn btn-sm btn-outline-info">Show</button>
                            </a>
                            <a href="{{route('post.edit',$post->id)}}">
                                <button class="btn btn-sm btn-outline-secondary">Edit</button>
                            </a>
                            <a>
                                <form action="{{route('post.destroy',$post->id)}}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-outline-secondary">Delete</button>
                                </form>
                            </a>
                        </td>
                        <td>
                            <p class="small text-black-50 mb-0">{{$post->created_at->format('d M Y')}}</p>
                            <p class="small text-black-50 mb-0">{{$post->created_at->format('h : m A')}}</p>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="6">There is no post</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div>
                {{$posts->onEachSide(1)->links()}}
            </div>
        </div>
    </div>
@endsection
