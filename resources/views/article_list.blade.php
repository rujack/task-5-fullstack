@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
                <div class="col-md-6 col-sm-12 col-lg-4">
                    <div class="card card-spacer">
                        <div class="card-header">
                            <h3>{{ $article->title }}</h3><span class="badge bg-secondary mb-2 mt-2"
                            style="width: fit-content;">{{ $article->category->name }}</span>
                            <small><strong>{{ $article->created_at->format('m/d/Y') }}</strong></small>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <small class="text-muted">By: {{ $article->user->name }}</small>
                            <img src={{ $article->image }} alt="sample image" class="rounded w-100"
                                style="width: fit-content">
                            <p>{{ $article->content }}</p>

                        </div>
                    </div>
                </div>
            @endForeach
        </div>
    </div>
@endsection
