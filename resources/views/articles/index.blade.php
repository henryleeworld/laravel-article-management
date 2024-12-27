@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Articles') }}</div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('articles.create') }}">{{ __('New Article') }}</a>
                    <br /><br />
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Title') }}</th>
                            @can('see-article-user')
                                <th>User</th>
                            @endcan
                            <th>{{ __('Created at') }}</th>
                            <th>{{ __('Published at') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                                <tr>
                                    <td>{{ $article->title }}</td>
                                    @can('see-article-user')
                                        <td>{{ $article->user->name }}</td>
                                    @endcan
                                    <td>{{ $article->created_at }}</td>
                                    <td>{{ $article->published_at }}</td>
                                    <td>
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-info">{{ __('Edit') }}</a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-sm btn-danger" value="{{ __('Delete') }}"
                                                onclick="return confirm({{ __('Are you sure?') }})" />
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">{{ __('No articles found.') }}</td>
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
