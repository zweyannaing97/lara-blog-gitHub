@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post</a></li>
            <li class="breadcrumb-item active" aria-current="page">Post Create</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Create Post</h4>
            <hr>
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                    @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Select Category</label>
                    <select id="category" type="text" name="category" class="form-select @error('category') is-invalid @enderror" value="{{old('category')}}">
                        @foreach(\App\Models\Category::all() as $category)
                            <option
                                value="{{$category->id}}"
                                {{$category->id == old('category') ? 'selected' : '' }}>
                                {{$category->title}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Post Description</label>
                    <textarea name="description" id="description" cols="10" rows="6"  class="form-control @error('description') is-invalid @enderror">
                        {{old('description')}}
                    </textarea>
                    @error('description')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <div class="mb-3">
                        <label for="featured_image" class="form-label">Post Title</label>
                        <input id="featured_image" type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" value="{{old('featured_image')}}">
                        @error('featured_image')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Create Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
