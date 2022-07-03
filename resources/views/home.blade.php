@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-spacer">
                <div class="card-header">{{__('Dashboard')}}</div>

                <div class="card-body d-flex flex-column">
                    {{__('You are logged in!')}}    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
