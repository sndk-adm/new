<html>
<head><title>PHP TEST</title></head>
<body>

<?php

function convert_enc($str){
    $from_enc = 'EUC_JP';
    $to_enc = 'SJIS';

    return mb_convert_encoding($str, $to_enc, $from_enc);
    }

$dsn = 'pgsql:dbname=dfl9gst6l1jfl3 host=ec2-3-211-245-154.compute-1.amazonaws.com  port=5432';
$user = 'hhmxfllafjsciw';
$password = 'dd16a7e2edfc599031962ac809ded8807cfe6d41cbb2c8b73681578bf5841f5f';

$empcode = ($_POST['EMPCODE']);
$prefix_en = ($_POST['PREFIX_EN']);
$name_en = ($_POST['NAME']);
$surname_en = ($_POST['SURNAME']);
$date_birth = ($_POST['DATE_BIRTH']);
$email=($_POST['email']);
$passcode=($_POST['password']);

echo "$empcode" ;
echo '<br>';
echo "$prefix_en" ;
echo '<br>';
echo "$name_en" ;
echo '<br>';
echo "$surname_en" ;
echo '<br>';
echo "$email" ;
echo '<br>';
echo "$passcode" ;
echo '<br>';

try{
    $dbh = new PDO($dsn, $user, $password, $option);

    print('接続に成功しました。<br>');

    $stmt = $dbh->prepare("insert into login_emp(empcode,prefix_en,name_en,surname_en,email,password) values_
  (:empcode,:prefix_en,:name_en,:surname_en,:email,:password)");

  $stmt->bindParam(':empcode', $empcode, PDO:: PARAM_STR);
  $stmt->bindParam(':prefix_en', $prefix_en, PDO:: PARAM_STR);
  $stmt->bindParam(':name_en', $name_en, PDO:: PARAM_STR);
  $stmt->bindParam(':surname_en', $surname_en, PDO:: PARAM_STR);
  $stmt->bindParam(':email', $email, PDO:: PARAM_STR);
  $stmt->bindParam(':password', $password, PDO:: PARAM_STR);
  $stmt->execute();

    $sql = 'SELECT * FROM login_emp';
    $stmt = $dbh->query($sql);
    foreach ($stmt as $row) {
        echo $row['id'].'：'.$row['email'].'：'.$row['name_en'];
        echo '<br>';
        }
    
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}


$dbh = null;

?>

</body>
</html>