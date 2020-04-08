@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('global.categories') }}</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('categories.create') }}">{{ trans('global.new_category') }}</a>
                    <br /><br />
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ trans('global.name') }}</th>
                            <th>{{ trans('global.created_at') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-info">{{ trans('global.edit') }}</a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-sm btn-danger" value="Delete"
                                                onclick="return confirm({{ trans('global.are_you_sure') }})" />
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">{{ trans('global.no_categories_found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
