@extends('layouts.admin-app')

@section('title','编辑标题')

@section('content')
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>About</h2>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/editAboutHeader') }}" class="form-horizontal" method="post" role="form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title" class="col-md-3 control-label">标题</label>
                        <div class="col-md-8">
                            <textarea name="title" id="title" cols="30" rows="10" class="form-control">{{ $header }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{ url('admin/about') }}" class="btn btn-danger">返回</a>
                            <button type="submit" class="btn btn-primary">确认修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection