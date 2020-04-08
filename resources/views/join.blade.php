@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('global.join_the_organization') }}</div>

                <div class="card-body">
                    <form action="{{ route('join.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="organization_id" value="{{ $organization->id }}" />
                        {{ trans('global.do_you_want_to_join_organization') }}<b>{{ $organization->name }}</b>{{ trans('global.question_mark') }}
                        <br />
                        {{ trans('global.join_as') }}
                        <br />
                        <select name="role_id" class="form-control">
                            <option value="1">{{ trans('global.simple_user') }}</option>
                            <option value="3">{{ trans('global.publisher') }}</option>
                        </select>
                        <br />
                        <input type="submit" value="{{ trans('global.yes_join') }}" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
