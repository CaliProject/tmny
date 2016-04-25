<div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h4 class="panel-title">{{ $title }}</h4>
        </div>
        <div class="panel-body">
            <form action="{{ $url }}" method="post" class="form-horizontal" role="form">
                {{ csrf_field() }}
                {{ isset($method) ? method_field($method) : '' }}
                <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title" class="col-md-2 control-label">板块标题</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="title" name="title"
                               value="{{ isset($provide) ? old('title') ? : $provide->title : '' }}">
                        @if($errors->has('title'))
                            <div class="help-block">
                                <span>{{ $errors->first('title') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('body') ? 'has-error' : '' }}">
                    <label for="body" class="col-md-2 control-label">板块内容</label>
                    <div class="col-md-9">
                                <textarea name="body" id="body" class="form-control" cols="30"
                                          rows="10">{{ isset($provide) ? old('body') ? : $provide->body : '' }}</textarea>
                        @if($errors->has('body'))
                            <div class="help-block">
                                <span>{{ $errors->first('body') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">{{ $button }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>