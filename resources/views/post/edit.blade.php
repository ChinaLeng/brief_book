@extends('layout.main')
@section('content')
    <div class="col-sm-8 blog-main">
        <form action="/posts/update" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $value)
                        <li>{{ $value }}</li>
                    @endforeach
                </div>
            @endif
            <input type="hidden" name="id" value="{{ $post->id }}">
            <div class="form-group">
                <label>标题</label>
                <input name="title" type="text" class="form-control" value="{{ old('title')? old('title'):$post->title }}" placeholder="请输入您的标题" required>
            </div>
            <div class="form-group">
                <label>内容</label>
                <textarea id="content"  style="height:400px;max-height:500px;" name="content" class="form-control" placeholder="这里是内容">{{ old('content')? old('content'):$post->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-default">提交</button>
        </form>
        <br>

    </div><!-- /.blog-main -->
@endsection
