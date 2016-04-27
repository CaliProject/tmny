@extends('layouts.admin-app')

@section('title','时令基地')

@section('breadcrumb')
    <li class="active">时令基地</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">编辑时令基地内容</h4>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form action="{{ url('admin/basement') }}" method="POST">
                        <div class="form-group">
                            <label for="title" class="control-label">头部标题</label>
                            <input type="text" name="title" class="form-control" value="{{ $basement->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="caption" class="control-label">头部内容</label>
                            <input type="text" name="caption" class="form-control" value="{{ $basement->caption }}" required>
                        </div>
                        <div class="form-group">
                            <main editor></main>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block">更新内容</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts.footer')
<script>
    $(function () {
        setTimeout(function () {
            @if($basement->content !== '')
            $("[editor]").summernote('code', '{!! addslashes($basement->content) !!}');
            @endif
        }, 500);

        $("form").on('submit', function (e) {
            e.preventDefault();
            var $form = e.target;

            $.ajax({
                url: $form.action,
                type: $form.method,
                dataType: 'json',
                data: {
                    _token:"{{ csrf_token() }}",
                    content: $('[editor]').summernote('code'),
                    title: $('input[name=title]').val(),
                    caption: $('input[name=caption]').val()
                },
                success: function (data) {
                    if (data.status != 'error')
                        toastr.success(data.message);
                    else
                        toastr.error(data.message);
                }
            });
        })
    });
</script>
@endpush