@extends('layouts.admin-app')

@section('title','编辑产业链条')

@section('actions')
    <a href="{{ url('admin/services/home') }}" class="btn btn-danger pull-right">返回</a>
@stop

@section('breadcrumb')
    <li><a href="{{ url('admin/services/home') }}">产业链条</a></li>
    <li class="active">编辑-产业链条</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">编辑头部</h4>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/services/edit') }}" method="post" class="form-horizontal" role="form" id="main-form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-2 control-label">头部标题</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ $services->title }}">
                            @if($errors->has('title'))
                                <div class="help-block">
                                    <span>{{ $errors->first('title') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('caption') ? 'has-error' : '' }}">
                        <label for="caption" class="col-md-2 control-label">头部内容</label>
                        <div class="col-md-9">
                            <textarea name="caption" id="caption" class="form-control" cols="30"
                                      rows="10">{{ $services->caption }}</textarea>
                            @if($errors->has('caption'))
                                <div class="help-block">
                                    <span>{{ $errors->first('caption') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-md-2 control-label">内容详情</label>
                        <div class="col-md-10">
                            <main editor></main>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <div id="dropzone" class="dropzone"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">确认修改</button>
                </form>
            </div>
        </div>
    </div>
    @include('admin.partials.site',['url' => 'admin/services/'])
@stop

@push('scripts.footer')
<script>
    $(function () {
        setTimeout(function () {
            @if($services->content !== '')
            $("[editor]").summernote('code', '{!! addslashes($services->content) !!}');
            @endif
        }, 500);

        $("#main-form").on('submit', function (e) {
            e.preventDefault();
            var $form = e.target;

            $.ajax({
                url: $form.action,
                type: 'PATCH',
                data: {
                    _token: $("input[name=_token]").val(),
                    title: $("input[name=title]").val(),
                    caption: $("textarea[name=caption]").val(),
                    content: $("[editor]").summernote('code')
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
</script>
@endpush