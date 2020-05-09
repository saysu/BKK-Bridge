@extends('layouts.app')

@section('content')

<header class='guide text-center mb-3 font-weight-bold'>BKK Bridge ガイド</header>

<hr>

<div class="container mt-3 mb-4">
    <div class="row mb-2 mt-2">
        <div class="col-md-4 text-center">
            <img src="/image/setting.png" class="roundedicon mt-3" alt="">
            <p class="mt-3 font-weight-bold">マイページ設定方法</p>
            <p>まずは右上のアイコンよりプロフィールの詳細登録をお願いします！</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="/image/guy.png" class="roundedicon mt-3" alt="">
            <p class="mt-3 font-weight-bold">オーガナイザーとしてイベントの作成</p>
            <p>トップページのイベントを作るより自由に作成ください</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="/image/party.png" class="roundedicon mt-3" alt="">

            <p class="mt-3 font-weight-bold">ボタン一つで気軽にイベントへ参加可能！</p>
            <p>イベント詳細画面より右上の参加するを押してください</p>
        </div>

    </div>

    
    <div class="row">
        <div class="col-md-12 mt-2">

            <p class="qa text-center font-weight-bold mt-3"><span>よくある質問</span></p>
            <div class="card">
                <div class="card-header font-weight-bold">
                    Q: 誰でもイベント作成は可能でしょうか。
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">A: はい。参加可能です！イベント詳細画面より『参加する』ボタンを押してください！</li>

                </ul>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12 pt-4">
          <div class="card">
              <div class="card-header font-weight-bold">
                  Q: 急遽都合が悪くなり参加が難しくなりました。この場合、どちらに連絡をすれば宜しいでしょうか。
              </div>
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">A: イベント詳細画面にございます、『コメントする』へお願いします。</li>

              </ul>
          </div>
      </div>
  </div>

  <div class="row">
    <div class="col-md-12 pt-4">
        <div class="card">
            <div class="card-header font-weight-bold">
                Q: まだ参加できるかわかりません。ただ気になるイベントがある場合、どうすれば宜しいでしょうか。
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">A: イベント詳細画面の、『お気に入りに入れる』を押すことでマイページにキープできます。</li>

            </ul>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-12 pt-4">
      <div class="card">
          <div class="card-header font-weight-bold">
              Q: ログインPWを忘れてしまいました。どうすれば宜しいでしょうか。
          </div>
          <ul class="list-group list-group-flush">
              <li class="list-group-item">A: トップ、メールのアイコンをクリックしお問い合わせフォームよりご連絡ください。</li>

          </ul>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 pt-4">
      <div class="card">
          <div class="card-header font-weight-bold">
              Q: イベントの急遽、中止が決まりました。削除の方法を教えてください。
          </div>
          <ul class="list-group list-group-flush">
              <li class="list-group-item">A: まずはコメント欄にキャンセルの旨をお伝えください。その後、詳細下にございますゴミ箱アイコンよりイベント削除をお願いいたします。</li>

          </ul>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 pt-4">
      <div class="card">
          <div class="card-header font-weight-bold">
              Q: イベント作成、イベント参加時にこちらのサイトへ支払う手数料はございますでしょうか。
          </div>
          <ul class="list-group list-group-flush">
              <li class="list-group-item">A: 全て無料でございます。プレミアム会員希望の方より有料となっておりますので気になるかたはコンタクトよりお願いいたします。</li>

          </ul>
      </div>
  </div>
</div>
        @endsection
