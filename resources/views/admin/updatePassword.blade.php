@extends('layouts.admin-app')

@section('title','修改密码')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                修改密码
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/password') }}" method="post" class="form-horizontal col-md-10 col-md-offset-1" role="form">
                    {!! csrf_field() !!}
                    {!! method_field('PATCH') !!}
                    <div class="form-group{{ session()->has('old_error') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">原密码</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="old_password" value="{{ old('old_password') }}" required>
                            @if(session()->has("old_error"))
                            <div class="help-block">
                                <span>{{ session('old_error') }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">新的密码</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password" required>
                            @if($errors->has('password'))
                                <div class="help-block">
                                    <span>{{ $errors->first('password') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">确认新的密码</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-primary btn-block">确认修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection