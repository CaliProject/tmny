@extends('layouts.admin-app')

@section('title', '更换背景音乐')

@section('breadcrumb')
    <li><a href="{{ url('admin') }}">首页</a></li>
    <li class="active">更换背景音乐</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">选择背景音乐</h4>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form action="{{ url('admin/music') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        {!! method_field('PATCH') !!}
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="music" class="col-md-2">选择音乐文件</label>
                            <input type="file" accept="audio/*" name="music" class="col-md-10" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block">上传修改</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop