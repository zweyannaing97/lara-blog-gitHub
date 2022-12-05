@extends('master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <h1 class="text-center">Blog Posts</h1>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        @if(request('keyword'))
                            <span class="mb-0">Search By : "{{request('keyword')}}"</span>
                            <a href="{{route('page.index')}}">
                                <button class="btn btn-outline-danger btn-sm">Cancel</button>
                            </a>
                        @endif
                    </div>
                    <form method="get" class="my-3">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" value="{{request('keyword')}}">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                @forelse($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3>{{$post->title}}</h3>
                            <a href="{{route('page.category',$post->category->slug)}}">
                                <span class="badge bg-secondary">{{$post->category->title}}</span>
                            </a>
                            <p>{{$post->excerpt}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <p class="mb-0">{{$post->user->name}}</p>
                                    <p class="mb-0">{{$post->created_at->diffforHumans()}}</p>
                                </div>
                                <a href="{{route('page.detail',$post->slug)}}" class="btn btn-primary">
                                    See More
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body">
                            <h4>There is no post yet!</h4>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="col-lg-8">
                {{$posts->onEachSide(1)->links()}}
            </div>
        </div>
    </div>
@stop
