@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('global.edit_category') }}</div>

                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{ trans('global.title') }}{{ trans('global.colon_mark') }}
                        <br />
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" />
                        <br />
                        <input type="submit" value="{{ trans('global.update_category') }}" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
