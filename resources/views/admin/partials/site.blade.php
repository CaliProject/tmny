<div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h4 class="panel-title">编辑SEO</h4>
        </div>
        <div class="panel-body">
            <form action="{{ url($url.'SEO') }}" method="post" class="form-horizontal" role="form">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <div class="form-group{{ $errors->has('keywords') ? 'has-error' : '' }}">
                    <label for="keywords" class="col-md-2 control-label">SEO:</label>
                    <div class="col-md-9">
                        <select name="keywords[]" id="keywords" multiple class="form-control">
                            @foreach(explode(',',$site->keywords) as $keywords)
                                <option value="{{ $keywords }}" selected>{{ $keywords }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('keywords'))
                            <div class="help-block">
                                <span>{{ $errors->first('keywords') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">确认修改</button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h4 class="panel-title">编辑背景图片</h4>
        </div>
        <div class="panel-body">
            <img src="{{ url($site->background) }}" alt="没有找到图片信息" class="img-thumbnail">
            <form action="{{ url($url.'background') }}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <div class="form-group{{ $errors->has('image') ? 'has-error' : '' }}">
                    <label for="image" class="col-md-2 control-label">上传新的图片</label>
                    <div class="col-md-9">
                        <input type="file" name="image" id="image" class="form-control" accept="image/jpeg,image/png,image/jpg,image/gif">
                        @if($errors->has('image'))
                            <div class="help-block">
                                <span>{{ $errors->first('image') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="old_image" value="{{ $site->background }}">
                <button type="submit" class="btn btn-primary btn-block">确认修改</button>
            </form>
        </div>
    </div>
</div>