@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('global.articles') }}</div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('articles.create') }}">{{ trans('global.new_article') }}</a>
                    <br /><br />
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ trans('global.title') }}</th>
                            @can('see-article-user')
                                <th>User</th>
                            @endcan
                            <th>{{ trans('global.created_at') }}</th>
                            <th>{{ trans('global.published_at') }}</th>
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
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-info">{{ trans('global.edit') }}</a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-sm btn-danger" value="{{ trans('global.delete') }}"
                                                onclick="return confirm({{ trans('global.are_you_sure') }})" />
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">{{ trans('global.no_articles_found') }}</td>
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
