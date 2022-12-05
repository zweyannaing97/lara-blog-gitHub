@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div class="gallery">
                            @forelse(Auth::user()->photos as $photo)
                                 <img src="{{asset('storage/'.$photo->name)}}" height="100" alt="">
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
