<?php
require_once('config.php');
//データベースへ接続、テーブルがない場合は作成
try {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //例外処理
  $pdo->exec("create table if not exists LOGIN_EMP(
      id serial primary key,
      empcode char(10) unique,
      prefix_en int not null,
      name_en varchar(20) not null,
      surname_en varchar(20) not null,
      date_birth date not null,
      email char(30) unique,
      password varchar(30) not null,
      created timestamp not null default current_timestamp
    )");
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}

//POSTのValidate。
if (!$email = filter_char($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  echo '入力された値が不正です。';
  return false;
}
//パスワードの正規表現
if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password'])) {
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
} else {
  echo 'パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください。';
  return false;
}
//登録処理
try {
  $stmt = $pdo->prepare("insert into LOGIN_EMP(empcode,prefix_en,name_en,surname_en,date_birth,email, password) value(?, ?)");
  $stmt->execute([$empcode,$prefix_en,$name_en,$surname_en,$date_birth,$email, $password]);
  echo '登録完了';
} catch (\Exception $e) {
  echo '登録済みです。';
}
?>
