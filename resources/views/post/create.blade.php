@extends('layout.main')
@section('content')

        <div class="col-sm-8 blog-main">
            <form action="/create" method="POST">
                {{ csrf_field() }}
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $value)
                            <li>{{ $value }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="form-group">
                    <label>标题</label>
                    <input name="title" type="text" class="form-control" value="{{ old('title') }}" placeholder="请输入您的标题" required>
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea id="content"  style="height:400px;max-height:500px;" name="content" class="form-control" placeholder="这里是内容">{{ old('content') }}</textarea>
                </div>
                <button type="submit" class="btn btn-default">提交</button>
            </form>
            <br>

        </div><!-- /.blog-main -->
@endsection
