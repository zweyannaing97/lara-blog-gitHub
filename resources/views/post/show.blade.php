@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post</a></li>
            <li class="breadcrumb-item active" aria-current="page">Post Edit</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>{{$post->title}}</h4>
            <hr>
            @isset($post->featured_image)
                <img src="{{asset("storage/".$post->featured_image)}}" alt="">
            @endisset
            <div class="">
                <span  class="badge bg-secondary">{{\App\Models\Category::find($post->category_id)->title}}</span>
                <span  class="badge bg-secondary">{{\App\Models\User::find($post->user_id)->name}}</span>
                <span class="badge bg-secondary mb-0">{{$post->created_at->format('d M Y')}}</span>
                <span class="badge bg-secondary mb-0">{{$post->created_at->format('h : m A')}}</span>
            </div>
            <p>
                {{$post->description}}
            </p>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{route('post.create')}}" class="btn btn-outline-primary">Create New Post</a>
                <a href="{{route('post.index')}}" class="btn btn-primary">All Posts</a>
            </div>
        </div>
    </div>
@endsection
