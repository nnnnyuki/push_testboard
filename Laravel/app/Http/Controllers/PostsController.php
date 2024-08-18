<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //


    //投稿掲示板初期ページ
    public function index()
    {
        $list = DB::table('posts')->get();
        return view('posts.index', ['posts_list' => $list]);
    }

    //投稿ページ
    public function createForm()
    {
        return view('posts.createForm');
    }

    //投稿機能（裏）
    public function create(Request $request)
    {
        $user = Auth::user()->name;
        $validated = $request->validate([
            'newPost' => 'required|string|spaces_only|max:100',
        ], [
            'newPost.max' => '投稿内容は100文字以下で入力してくださ。',
        ]);
        // バリデーションとAPPServiceProvideを追記が必要。
        //文字数の制限をするにはバリデーションを利用した制限で可能だが、そのままだと「newPostは100文字以上～」という文になってしまうのでvalidateの第二引数にカスタムメッセージを設定する。

        // デバッグ用
        // dd($validated);

        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'user_name' => $user,
            'contents' => $post
        ]);
        return redirect('/index');
    }

    //投稿内容更新ページ
    public function updateForm($id)
    {
        $post = DB::table('posts')
            ->where('id', $id)
            ->first();
        return view('posts.updateForm', ['post' => $post]);
    }

    //投稿内容更新処理
    public function update(Request $request)
    {
        $validated = $request->validate([
            'upPost' => 'required|string|spaces_only|max:100',
        ], [
            'upPost.max' => '投稿内容は100文字以下で入力してくださ。',
        ]);
        // バリデーションとAPPServiceProvideを追記が必要。

        // dd($validated);

        $id = $request->input('id');
        $up_contents = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(['contents' => $up_contents]);
        return redirect('/index');
    }

    //投稿内容削除処理
    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/index');
    }



    //検索処理
    public function indexSearch(Request $request)
    {
        $search = trim($request->input('keyword'));
        //trim関数を使用してkeywordで取得したデータ文字の前後を取り除いておく。


        //str_replace関数を使用して半角全角の余白を無いものとする。
        $no_margin = str_replace([' ', '　'], '', $search);


        //検索キーワードが空またはスペースの場合、全ての投稿を取得する。
        //emptyで変数の存在をチェックさせる。
        if (empty($no_margin)) {
            $posts_list = DB::table('posts')
                ->get();
        } else {
            $posts_list = DB::table('posts')
                ->where('contents', 'LIKE', '%' . $search . '%')
                // ->orWhere('contents', 'LIKE', '%' . $search . '%')
                ->get();
        }

        $is_empty_search = ($posts_list->isEmpty() && !empty($search));
        //検索結果が空であり、かつ（&&）検索結果が空でない場合
        //isEmptyは配列というﾗｯﾊﾟｰに対して使う関数。emptyは配列の中身もしくは変数。


        return view('posts.index', compact('posts_list', 'is_empty_search'));
        //compact関数は変数名とその値から配列を作成する
    }



    //auth機能を読み込むためのメソッド（コンソトラクタメソッドとしての介入）
    public function __construct()
    {
        $this->middleware('auth');
    }
}
