@extends('layouts.admin-app')

@section('title','编辑图文-新鲜生活')

@section('actions')
    <a href="{{ url('admin/blog/home') }}" class="btn btn-danger">返回</a>
@stop

@section('breadcrumb')
    <li><a href="{{ url('admin/blog/home') }}">新鲜生活</a></li>
    <li class="active">编辑图文</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">编辑标题信息</h4>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/blog/header') }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-2 control-label">标题信息:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}">
                            @if($errors->has('title'))
                                <div class="help-block">
                                    <span>{{ $errors->first('title') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('caption') ? 'has-error' : '' }}">
                        <label for="caption" class="col-md-2 control-label">标题介绍:</label>
                        <div class="col-md-9">
                            <textarea name="caption" id="caption" class="form-control" cols="30" rows="10">{{ $blog->caption }}</textarea>
                            @if($errors->has('caption'))
                                <div class="help-block">
                                    <span>{{ $errors->first('caption') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-2">
                            <button type="submit" class="btn btn-primary btn-block">确认修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach($blog->posts as $id => $post)
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">图文#{{ $id+1 }}</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ url('admin/blog/'.$id) }}" method="post" role="form" id="main-form">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title" class="control-label">标题</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                            @if($errors->has('title'))
                                <div class="help-block">
                                    <span>{{ $errors->first('title') }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">内容详情</label>
                            <main id="post-{{ $id }}" editor></main>
                        </div>
                        <div class="form-group">
                            <div id="dropzone" class="dropzone"></div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block">确认修改</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    @include('admin.partials.site',['url' => 'admin/blog/'])
@endsection

@push('scripts.footer')
<script>
    $(function () {
        @foreach($blog->posts as $id => $post)
        setTimeout(function () {
            @if($post->content !== '')
            $("#post-{{ $id }}[editor]").summernote('code', '{!! addslashes($post->content) !!}');
            @endif
        }, 350);
        @endforeach

        $("#main-form").each(function () {
            $(this).on('submit', function (e) {
                e.preventDefault();
                var $form = e.target;

                $.ajax({
                    url: $form.action,
                    type: 'PATCH',
                    data: {
                        _token: $("input[name=_token]").val(),
                        title: $("input[name=title]").val(),
                        caption: $("textarea[name=caption]").val(),
                        content: $($($form).find("[editor]")[0]).summernote('code')
                    },
                    success: function (data) {
                        if (data.status != 'error')
                            toastr.success(data.message);
                        else
                            toastr.error(data.message);

                    }
                });
            });
        });
    });
</script>
@endpush