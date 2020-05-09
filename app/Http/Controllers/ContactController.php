<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; 

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function confirm(Request $request)
    {
              //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
              $request->validate([
                'email' => 'required|email',
                'firstname' => 'required',
                'lastname' => 'required',
                'body'  => 'required',
            ]);
            
            $inputs = $request;

            //入力内容確認ページのviewに変数を渡して表示
            return view('contact.confirm', [
                'inputs' => $inputs,
            ]);


    }

    public function send(Request $request)
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $request->validate([
            'email' => 'required|email',
            'firstname' => 'required',
            'lastname' => 'required',
            'body'  => 'required'
        ]);


        // 第1引数：メールの内容の表示に使うテンプレート(blade)
        // 第2引数：テンプレートファイルに渡すデータ(配列で渡す)
        // 第3引数：コールバック関数で送信先やタイトルの指定
        Mail::send(
            'contact.mail',
            [
                'email'     => $request->email,
                'firstname'          => $request->firstname,
                'lastname'      => $request->lastname,
                'body' => $request->body,
            ],
            function($message) {
                $message
                ->to('suzukisayaka0109@gmail.com')       // 送信先アドレス
                ->subject('メールが届きました'); // メールタイトル
            }
        );
        
            //送信完了ページのviewを表示
            return view('contact.thanks');
        }
    }
