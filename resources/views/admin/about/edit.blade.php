@extends('layouts.admin-app')

@section('title','编辑板块')

@section('breadcrumb')
    <li><a href="{{ url('admin/about') }}">关于天美</a></li>
    <li class="active">编辑-关于天美</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4>编辑标题</h4>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/about/edit') }}" class="form-horizontal" id="main-form" role="form" method="post">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group">
                        <label for="title" class="col-md-2 control-label">标题</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" id="title"
                                   value="{{ $about->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="caption" class="col-md-2 control-label">标题内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="caption" id="caption"
                                      rows="5">{{ $about->caption }}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-md-2 control-label">内容详情</label>
                        <div class="col-md-10">
                            <main editor></main>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">确认修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.partials.site',['url' => 'admin/about/'])
@endsection

@push('scripts.footer')
<script>
    $(function () {
        setTimeout(function () {
            @if($about->content !== '')
            $("[editor]").summernote('code', '{!! addslashes($about->content) !!}');
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