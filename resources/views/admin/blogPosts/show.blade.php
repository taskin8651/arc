@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.blogPost.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.id') }}
                        </th>
                        <td>
                            {{ $blogPost->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.title') }}
                        </th>
                        <td>
                            {{ $blogPost->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.slug') }}
                        </th>
                        <td>
                            {{ $blogPost->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.content') }}
                        </th>
                        <td>
                            {!! $blogPost->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.quotes') }}
                        </th>
                        <td>
                            {{ $blogPost->quotes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\BlogPost::STATUS_SELECT[$blogPost->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.gallary') }}
                        </th>
                        <td>
                            @if($blogPost->gallary)
                                <a href="{{ $blogPost->gallary->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $blogPost->gallary->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.gallary_1') }}
                        </th>
                        <td>
                            @if($blogPost->gallary_1)
                                <a href="{{ $blogPost->gallary_1->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $blogPost->gallary_1->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.gallary_2') }}
                        </th>
                        <td>
                            @if($blogPost->gallary_2)
                                <a href="{{ $blogPost->gallary_2->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $blogPost->gallary_2->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.gallary_3') }}
                        </th>
                        <td>
                            @if($blogPost->gallary_3)
                                <a href="{{ $blogPost->gallary_3->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $blogPost->gallary_3->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection