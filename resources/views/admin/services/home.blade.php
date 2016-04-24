@extends('layouts.admin-app')

@section('title','产业链条')

@section('actions')
    <a href="{{ url('admin/services/add') }}" class="btn btn-primary">添加板块</a>
    <a href="{{ url('admin/services/edit') }}" class="btn btn-primary">编辑</a>
@stop

@section('breadcrumb')
    <li class="active">产业链条</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">{{ $header->title }}</h4>
            </div>
            <div class="panel-body">
                {{ $header->caption }}
            </div>
        </div>
        @foreach($provides as $id => $provide)
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">{{ $provide->title }}</h4>
                    </div>
                    <div class="panel-body">
                        {{ $provide->body }}
                        <hr>
                        <form action="{{ url('admin/services/'.$id) }}" method="post" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger pull-right">删除</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
