@extends('layouts.admin')

@section('title')
    | Crea nuovo Post
@endsection

@section('content')
    <div class="container">

        <h1>Crea un nuovo Post</h1>

        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}" aria-describedby="emailHelp">
                @error('title')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"
                    rows="3">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="form-control" name="category_id" id="category_id" aria-label="Default select example">
                    <option value="">Seleziona una Categoria</option>
                    @foreach ($categories as $category)
                        <option @if ($category->id == old('category_id')) selected @endif value="{{ $category->id }}">
                            {{ $category->name }} </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <p>Seleziona i Tag</p>
                @foreach ($tags as $tag)
                    <div class="custom-control custom-checkbox d-inline-block mr-3">
                        <input type="checkbox" class="custom-control-input" name="tags[]" value="{{ $tag->id }}"
                            id="tag-{{ $tag->id }}" @if (in_array($tag->id, old('tags', []))) checked @endif>
                        <label class="custom-control-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <div class="form-group">
                    <label for="image">Inserisci un immagine</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                </div>
                @error('image')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-dark">Reset</button>
        </form>

    </div>
@endsection
