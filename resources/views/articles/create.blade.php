@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Article') }}</div>
                <div class="card-body">
                    <form action="{{ route('articles.store') }}" method="POST">
                        @csrf
                        {{ __('Title') . __(':') }}
                        <br />
                        <input type="text" name="title" class="form-control" />
                        <br />
                        {{ __('Full text') . __(':') }}
                        <br />
                        <textarea class="form-control" rows="10" name="full_text"></textarea>
                        <br />
                        {{ __('Category') . __(':') }}
                        <br />
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <br />
                        @can('publish-articles')
                        <input type="checkbox" name="published" value="1" />{{ __('Published') }}
                        <br /><br />
                        @endcan
                        <input type="submit" value="{{ __('Save Article') }}" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
