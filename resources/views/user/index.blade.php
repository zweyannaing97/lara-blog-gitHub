@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User List</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>User List</h4>
            <hr>
            <div class="d-flex justify-content-between">
                <div class="">
                    @if(request('keyword'))
                        <span class="mb-0">Search By : "{{request('keyword')}}"</span>
                        <a href="{{route('user.index')}}">
                            <button class="btn btn-outline-danger btn-sm">Cancel</button>
                        </a>
                    @endif
                </div>
                <form action="{{route('user.index')}}" method="get">
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
                    <td>Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Control</td>
                    <td>Created</td>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            {{$user->role}}
                        </td>
                        <td class="">
                            <a href="{{route('user.show',$user->id)}}">
                                <button class="btn btn-sm btn-outline-info">Show</button>
                            </a>
                            @can('update',$user)
                                <a href="{{route('user.edit',$user->id)}}">
                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                </a>
                            @endcan
                            @can('delete',$user)
                                <a>
                                    <form action="{{route('user.destroy',$user->id)}}" method="user" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-secondary">Delete</button>
                                    </form>
                                </a>
                            @endcan
                        </td>
                        <td>
                            <p class="small text-black-50 mb-0">{{$user->created_at->format('d M Y')}}</p>
                            <p class="small text-black-50 mb-0">{{$user->created_at->format('h : m A')}}</p>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="6">There is no user</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div>
                {{$users->onEachSide(1)->links()}}
            </div>
        </div>
    </div>
@endsection
