@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    This is Home || {{Auth::user()->isAuthor() ? 'yes' : "no"}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
