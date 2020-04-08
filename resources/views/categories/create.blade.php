@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('global.new_category') }}</div>

                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        {{ trans('global.name') }}{{ trans('global.colon_mark') }}
                        <br />
                        <input type="text" name="name" class="form-control" />
                        <br />
                        <input type="submit" value="{{ trans('global.save_category') }}" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
