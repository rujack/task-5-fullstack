@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Edit Kategori') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-8">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $category->name }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-12">
                                <p class="text-center"><em>*Aksi ini akan mengubah semua nama kategori artikel yang terkait</em></p>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-12">
                                <div class="text-center">

                                    <button type="submit" class="btn btn-success ">
                                        {{ __('Simpan') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
