@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Join the Organization') }}</div>

                <div class="card-body">
                    <form action="{{ route('join.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="organization_id" value="{{ $organization->id }}" />
                        {{ __('Do you want to join organization ') }}<b>{{ $organization->name }}</b>{{ __('?') }}
                        <br />
                        {{ __('Join as:') }}
                        <br />
                        <select name="role_id" class="form-control">
                            <option value="1">{{ __('Simple User') }}</option>
                            <option value="3">{{ __('Publisher') }}</option>
                        </select>
                        <br />
                        <input type="submit" value="{{ __('Yes, Join') }}" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
