@extends('layouts.app')

@section('content')


<div class='new-container'>
  <h2 class='page-header'>投稿内容を変更する</h2>

  {!! Form::open(['url' => '/post/update']) !!}

  <div class="form-group">

    {!! Form::hidden('id', $post->id) !!}
    {!! Form::input('text', 'upPost', $post->contents, ['required', 'class' => 'update-form form-control']) !!}

  </div>
  <button type="submit" class="new-btn btn btn-primary pull-right">更新</button>

  {!! Form::close() !!}
</div>

@endsection
