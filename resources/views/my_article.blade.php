@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-secondary" href="{{ route('articles.create') }}"
            style="width: fit-content; margin-right: 10px">Tambah Artikel</a>
        <div class="row my-3">

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
                        <div class="row mb-3 mx-3">
                            <div class="col-6">
                                <a class="btn btn-warning w-100" href="{{ route('articles.edit', ['article' => $article]) }}">
                                    {{ __('Edit') }}
                                </a>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-{{ $article->id }}">
                                    {{ __('Delete') }}
                                </button>
                            </div>
                        </div>

                        <!-- Modal Delete -->
                        <div class="modal fade" id="exampleModal-{{ $article->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin ingin menghapus artikel ini? <br><br>
                                        <b>Title : {{ $article->title }} </b>
                                    </div>
                                    <div class="modal-footer">
                                        <form id="article-{{ $article->id }}" method="POST"
                                            action="{{ route('articles.destroy', ['article' => $article]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                data-bs-dismiss="modal">Hapus</button>
                                        </form>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endForeach
        </div>
    </div>
@endsection
