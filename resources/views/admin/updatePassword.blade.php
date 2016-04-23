@extends('layouts.admin-app')

@section('title','修改密码')

@section('content')
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    修改密码
                </div>
                <div class="panel-body">
                    <form action="{{ url('admin/updatePassword') }}" method="post" class="form-horizontal" role="form">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-md-3 control-label">原密码</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="old_password">
                                {{--@if($status == 'old_error')--}}
                                    {{--<div class="help-block">--}}
                                        {{--<span>{{ $message }}</span>--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">新的密码</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="new_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">确认新的密码</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                                {{--@if($status == 'new_error')--}}
                                {{--<div class="help-block">--}}
                                    {{--<span>{{ $message }}</span>--}}
                                {{--</div>--}}
                                {{--@endif--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">确认修改</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


@endsection