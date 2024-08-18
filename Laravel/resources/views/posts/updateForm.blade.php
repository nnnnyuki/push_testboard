@extends('layouts.app')

@section('content')


<div class='new-container'>
  <h2 class='page-header'>投稿内容を変更する</h2>

  <!-- エラーメッセージ表示 -->
  @if ($errors->any())
  <div class="alert">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif


  {!! Form::open(['url' => '/post/update']) !!}

  <div class="form-group">

    {!! Form::hidden('id', $post->id) !!}
    {!! Form::text('upPost', old('upPost', $post->contents), ['required' => true, 'class' => 'update-form form-control', 'placeholder' => '更新内容']) !!}
  </div>
  <button type="submit" class="new-btn btn btn-primary pull-right">更新</button>

  {!! Form::close() !!}
</div>

@endsection
