@extends('layouts.app')

@section('content')




<div class='new-container'>
  <h2 class='page-header'>新しく投稿する</h2>
  <br>
  {!! Form::open(['url' => 'post/create']) !!}
  <div class="form-group">
    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control create-form', 'placeholder' => '投稿内容']) !!}
  </div>
  <br>
  <button type="submit" class="new-btn btn btn-success pull-right">投稿</button>
  {!! Form::close() !!}
</div>



@endsection
