<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('spaces_only', function ($attribute, $value, $parameters, $validator) {
            // Validatorから引数までが定形文。'spaces_only'はルール名。入力が全角スペースのみの場合は無効とする。
            return !preg_match('/^[\x{3000}\s]+$/u', $value);
            // 入力値が全角スペース（\x{3000}）または半角スペース（\s）のみで構成。
            // ^ と $ は文字列の開始と終了
            // + は1回以上の繰り返し
            // /u はUnicodeモード
        });
    }
}
