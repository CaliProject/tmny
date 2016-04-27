@extends('layouts.admin-app')

@section('title','时令产品')

@section('actions')
    <a href="{{ url('admin/portfolio/add') }}" class="btn btn-primary">添加产品</a>
    <a href="{{ url('admin/portfolio/edit') }}" class="btn btn-primary">编辑</a>
@stop

@section('breadcrumb')
    <li class="active">时令产品</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">{{ $portfolio->title }}</h4>
            </div>
            <div class="panel-body">
                {{ $portfolio->caption }}
            </div>
        </div>
    </div>
    @foreach($portfolio->products as $id => $product)
        <div class="col-md-3 col-xs-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                        <h4 class="panel-title">{{ $product->name }}</h4>
                </div>
                <div class="panel-body">
                    <div class="text-center">
                        <img src="{{ url($product->image) }}" alt="没有找到图片信息" class="img-thumbnail">
                    </div>
                    <hr>
                    {{ $product->caption }}
                    <hr>
                    <div class="text-center">
                        <img src="{{ url($product->qrcode) }}" alt="二维码" class="img-thumbnail">
                    </div>
                    <hr>
                    <form action="{{ url('admin/portfolio/'.$id) }}" method="post" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-block">删除</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    @include('admin.partials.showsite')
@endsection