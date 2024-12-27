@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Category') }}</div>

                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        {{ __('Name') . __(':') }}
                        <br />
                        <input type="text" name="name" class="form-control" />
                        <br />
                        <input type="submit" value="{{ __('Save Category') }}" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
