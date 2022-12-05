@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Category List</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Category List</h4>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Title</td>
                        <td>Post Count</td>
                        <td>Control</td>
                        <td>Created</td>
                    </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>
                            {{$category->title}}
                            <br>
                            <span class="badge bg-secondary">{{$category->slug}}</span>
                        </td>
                        <td>
                            {{$category->posts()->count()}}
                        </td>
                        <td class="">
                            @can('update',$category)
                            <a href="{{route('category.edit',$category->id)}}">
                                <button class="btn btn-sm btn-outline-secondary">Edit</button>
                            </a>
                            @endcan
                            @can('delete',$category)
                            <a>
                                <form action="{{route('category.destroy',$category->id)}}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-outline-secondary">Delete</button>
                                </form>
                            </a>
                            @endcan
                        </td>
                        <td>
                            <p class="small text-black-50 mb-0">{{$category->created_at->format('d M Y')}}</p>
                            <p class="small text-black-50 mb-0">{{$category->created_at->format('h : m A')}}</p>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
