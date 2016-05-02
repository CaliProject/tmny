@extends('layouts.admin-app')

@section('title','添加图文-新鲜生活')

@section('actions')
    <a href="{{ url('admin/blog/home') }}" class="btn btn-danger">返回</a>
@stop

@section('breadcrumb')
    <li><a href="{{ url('admin/blog/home') }}">新鲜生活</a></li>
    <li class="active">添加图文</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">添加图文</h4>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/blog/add') }}" method="post" class="form-horizontal" role="form" id="main-form">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-2 control-label">标题:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            @if($errors->has('title'))
                                <div class="help-block">
                                    <span>{{ $errors->first('title') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
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
                    <hr>
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-2">
                            <a href="{{ url('admin/blog/home') }}" class="btn btn-danger btn-block">返回</a>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-block">确认添加</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts.footer')
<script>
    $(function () {
        $("#main-form").on('submit', function (e) {
            e.preventDefault();
            var $form = e.target;

            $.ajax({
                url: $form.action,
                type: $form.method,
                data: {
                    _token: $("input[name=_token]").val(),
                    title: $("input[name=title]").val(),
                    content: $("[editor]").summernote('code')
                },
                success: function (data) {
                    if (data.status != 'error') {
                        toastr.success(data.message);
                        setTimeout(function () {
                            window.location.href = "{{ url('admin/blog/home') }}";
                        }, 1000);
                    } else {
                        toastr.error(data.message);
                    }
                }
            });
        });
    });
</script>
@endpush