@extends('layouts.app')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col"><a href='/item_ditail'>#</a></th>
      <th scope="col">商品詳細画面</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row"><a href='/user_login'>0</a></th>
      <td>ログイン画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/new_user'>1</a></th>
      <td>新規登録画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/pw_guid'>2</a></th>
      <td>パスワード案内画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/pw_resetting'>3</a></th>
      <td>パスワード再設定画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/pw_comp'>4</a></th>
      <td>パスワード再設定完了画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/web_home'>5</a></th>
      <td>ホーム画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/item_ditail'>6</a></th>
      <td>商品詳細画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/item_cart'>7</a></th>
      <td>カート画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/buy_verification'>8</a></th>
      <td>購入情報確定画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/buy_confirm'>9</a></th>
      <td>購入確定画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/favorite_list'>10</a></th>favorite
      <td>お気に入り画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/favorite_nothing'>11</a></th>
      <td>お気に入りなし画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/buy_history'>12</a></th>
      <td>購入履歴画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/buyhistory_nothing'>13</a></th>
      <td>購入履歴なし画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/management_home'>14</a></th>
      <td>管理者画面ホーム</td>
    </tr>
    <tr>
      <th scope="row"><a href='/item_register'>15</a></th>
      <td>商品登録画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/item_edit'>16</a></th>
      <td>商品編集画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/profile_edit'>17</a></th>
      <td>プロフィール画面</td>
    </tr>
    <tr>
      <th scope="row"><a href='/login_header'>18</a></th>
      <td>ログイン後ヘッダー</td>
    </tr>
  </tbody>
</table>
@endsection


login_header