@extends('layouts.app')

@section('content')

<div class='new-container'>
  <h2 class='page-header'>新しく投稿する</h2>
  <br>

  <!-- エラーメッセージ表示 -->
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif



  {!! Form::open(['url' => 'post/create']) !!}
  <div class="form-group">
    {!! Form::text('newPost', old('newPost'), ['required' => true, 'class' => 'form-control create-form', 'placeholder' => '投稿内容']) !!}
    <!-- require属性で、フォームの入力必須を促す。 -->
  </div>
  <br>
  <button type="submit" class="new-btn btn btn-success pull-right">投稿</button>
  {!! Form::close() !!}
</div>

@endsection
