@extends('layouts.app')

@section('content')


<div class='main-container'>
  <h2 class='page-header page-header2 sub-title'>投稿一覧</h2>
  <div>
    <form method="GET" action="">
      @csrf
      <input class="search-text" type="text" name="keyword" value="{{ request('keyword') }}" placeholder="ここに検索内容を入力してください">
      <input type="submit" value="検索" class="btn main-btn">
    </form>
  </div>
  @if($is_empty_search)
  <br>
  <p>検索結果は０件です</p>
  <br>
  @else
  <div class="btn-index">
    <div class="btn_container">
      <a class='main-btn' href="/create-form">投稿する</a>
    </div>
    <table class='table table-hover'>
      <tr>
        <th>名前</th>
        <th>投稿内容</th>
        <th>投稿日時</th>
      </tr>
      @foreach ($posts_list as $list)
      <tr>
        <td>{{ $list->user_name }}</td>
        <td>{{ $list->contents }}</td>
        <td>{{ $list->created_at }}</td>
        <td><a href="/post/{{ $list->id }}/update-form" class="main-btn">更新</a></td>
        <td><a href="/post/{{ $list->id }}/delete" class="main-btn main-btn2" onclick="return confirm('削除しても良いですか？')">削除</a></td>
      </tr>
      @endforeach
    </table>
    @endif
  </div>
</div>

@endsection
