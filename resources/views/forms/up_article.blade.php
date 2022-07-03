@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Edit Artikel') }}</div>

                <div class="card-body">
                    <form id="article" method="POST" action="{{ route('articles.update', ['article' => $article]) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="title" class="col-3 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-8">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ $article->title }}" required autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="content"
                                class="col-3 col-form-label text-md-end">{{ __('Body Artikel') }}</label>

                            <div class="col-8">
                                <textarea name="content" form="article" class="form-control @error('content') is-invalid @enderror"
                                    value="{{ $article->content }}" required autofocus>
                            {{ $article->content }}</textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-3 col-form-label text-md-end">{{ __('Link Gambar') }}</label>

                            <div class="col-8">
                                <input id="image" type="text" class="form-control @error('image') is-invalid @enderror"
                                    name="image" value="{{ $article->image }}" required autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category_id"
                                class="col-3 col-form-label text-md-end">{{ __('Kategori') }}</label>

                            <div class="col-8">
                                <select name="category_id" class="@error('category') is-invalid @enderror" required>
                                    <option value={{ null }}>Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value={{ (int) $category->id }}
                                            {{ $category->id == $selectedID ? 'selected' : '' }}>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
