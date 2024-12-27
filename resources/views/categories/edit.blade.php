@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Category') }}</div>

                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{ __('Title') . __(':') }}
                        <br />
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" />
                        <br />
                        <input type="submit" value="{{ __('Update Category') }}" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
