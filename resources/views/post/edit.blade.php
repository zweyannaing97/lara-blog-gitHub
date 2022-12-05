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
            <h4>Edit Post</h4>
            <hr>
            <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data" id="postUploadForm">
                @csrf
                @method('put')
            </form>
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input form="postUploadForm" id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title',$post->title)}}">
                    @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Select Category</label>
                    <select form="postUploadForm" id="category" type="text" name="category" class="form-select @error('category') is-invalid @enderror" value="{{old('category')}}">
                        @foreach(\App\Models\Category::all() as $category)
                            <option
                                value="{{$category->id}}"
                                {{$category->id == old('category',$post->category) ? 'selected' : '' }}>
                                {{$category->title}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div>
                    <div>
                        @foreach($post->photos as $photo)
                            <div class="d-md-inline-block position-relative">
                                <img src="{{asset('storage/'.$photo->name)}}" height="100" alt="">
                                <form action="{{ route('photo.destroy',$photo->id) }}" class="d-inline-block" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger position-absolute bottom-0 end-0">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label for="photos" class="form-label">Post Photo</label>
                        <input multiple id="photos" type="file" name="photos[]" class="form-control @error('photos.*') is-invalid @enderror @error('photos') is-invalid @enderror" value="{{old('photos')}}">
                        @error('photos')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        @error('photos.*')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Post Description</label>
                    <textarea form="postUploadForm" name="description" id="description" cols="10" rows="6"  class="form-control @error('description') is-invalid @enderror">
                        {{old('description',$post->description)}}
                    </textarea>
                    @error('description')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            @isset($post->featured_image)
                                <img  src="{{asset("storage/".$post->featured_image)}}" width="70" alt="">
                            @endisset
                        </div>
                        <div class="mb-3">
                            <label for="featured_image" class="form-label">Featured <Image></Image></label>
                            <input form="postUploadForm" id="featured_image" type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" value="{{old('featured_image')}}">
                            @error('featured_image')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <button form="postUploadForm" class="btn btn-primary">Update Post</button>
                </div>

        </div>
    </div>
@endsection
