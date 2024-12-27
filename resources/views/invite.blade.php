@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Invite a Teammate') }}</div>
                <div class="card-body">
                    {{ __('Link for new users:') }}
                    <br />
                    {{ route('register') }}?organization_id={{ auth()->user()->organization_id ? auth()->user()->organization_id : auth()->id() }}
                    <br /><br />
                    {{ __('Link for existing users:') }}
                    <br />
                    {{ route('join.create') }}?organization_id={{ auth()->user()->organization_id ? auth()->user()->organization_id : auth()->id() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
