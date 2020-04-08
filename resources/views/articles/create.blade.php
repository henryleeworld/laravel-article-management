@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('global.new_article') }}</div>
                <div class="card-body">
                    <form action="{{ route('articles.store') }}" method="POST">
                        @csrf
                        {{ trans('global.title') }}{{ trans('global.colon_mark') }}
                        <br />
                        <input type="text" name="title" class="form-control" />
                        <br />
                        {{ trans('global.full_text') }}{{ trans('global.colon_mark') }}
                        <br />
                        <textarea class="form-control" rows="10" name="full_text"></textarea>
                        <br />
                        {{ trans('global.category') }}{{ trans('global.colon_mark') }}
                        <br />
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <br />
                        @can('publish-articles')
                        <input type="checkbox" name="published" value="1" />{{ trans('global.published') }}
                        <br /><br />
                        @endcan
                        <input type="submit" value="{{ trans('global.save_article') }}" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
