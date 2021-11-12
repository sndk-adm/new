<?php
session_start();
//ログイン済みの場合
if (!isset($_SESSION['email_db'])) {
  echo '<br>';
  echo "<a href='/index.php'>こちらからログインしてください</a>";
  echo '<br>';
  exit;
   }
   else{
   }
?>

<!DOCTYPE html>
<html>
 <head>
   <meta charset="UTF-8">
    <title>LOGIN MENU</title>
    <LINK rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="wrapper">
    <!-- ヘッダー開始 -->
    <ul id="nav">
      <li><a href="home.php">HOME</a></li>
      <li><a href="home.php">USER SETTING</a></li>
      <li><a href="index.php">APPLICATION</a></li>
      <li><a href="index.php">ADMIN</a></li>
    </ul>

    <?php
    session_start();
    //ログインユーザー情報

    if ($_SESSION['prefix_en']==0) {
      $_SESSION['prefix_en']='Mr.';}
      elseif ($_SESSION['prefix_en']==1) {
      $_SESSION['prefix_en']='Ms.';}
      elseif ($_SESSION['prefix_en']==2) {
      $_SESSION['prefix_en']='Mrs.';}
    else {}

     echo '<br>';
     echo "Welcome Code :".$_SESSION['empcode']." - ".$_SESSION['prefix_en'].$_SESSION['name_en_db']." ".$_SESSION['surname_en_db'];
     echo '<br>';
    $_SESSION['email_db'];
    $_SESSION['login_pass_db'];
    ?>
    <!-- ヘッダー終了 -->
    <!-- メイン開始 --> 
    <div class="ck">
    <h2>Information</h2>
    <table class="info">
    <tr>
      <th>Employee Code</th> <!--表の見出し-->
      <td> 140047 </td> <!--表のデータ-->
    </tr>
    <tr>
      <th>Employee Name</th>
      <td> Taro </td>
    </tr>
    </table>
        
    </div>
    <!-- メイン終了 -->
    <!-- フッター開始 -->
    <div id="footer">
        <small>&copy;Copyright SIAM NDK.All rights reserved.</small>
    </div>
    <!-- フッター終了 -->
  </div>
</body>
</html>
