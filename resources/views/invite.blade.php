@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('global.invite_a_teammate') }}</div>
                <div class="card-body">
                    {{ trans('global.link_for_new_users') }}
                    <br />
                    {{ route('register') }}?organization_id={{ auth()->user()->organization_id ? auth()->user()->organization_id : auth()->id() }}
                    <br /><br />
                    {{ trans('global.link_for_existing_users') }}
                    <br />
                    {{ route('join.create') }}?organization_id={{ auth()->user()->organization_id ? auth()->user()->organization_id : auth()->id() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
