<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8">
<title>mission_4-1-2</title>
</head>

<body>
<?php
//データベースの作成
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);
$tb="test5";

//テーブルの作成
$sql = "CREATE TABLE test5"
."("
."id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,"
."name char(32),"
."comment char(32),"
."time TEXT"
.");";
$stmt = $pdo->query($sql);
?>






<?php
$name=$_POST['name'];
$comment=$_POST['comment'];
$pass="pas";

$dsn = 'mysql:dbname=tt_128_99sv_coco_com;host=localhost';
$user = 'tt-128.99sv-coco';
$password = 'V8wcPZC4';
$pdo = new PDO($dsn,$user,$password);
$tb="test5";

//編集
if(!empty($_POST['name']) && !empty($_POST['comment']) && !empty($_POST['hidd'])){

$id=$_POST['hidd'];
   $name2=$name;
   $comment2=$comment;
   $result=$pdo->query("update test5 set name='$name2',comment='$comment2' where id=$id");
}
//データを入力
if(!empty($_POST['name'])&&($_POST['comment'])&&empty($_POST['hidd'])){

$sql = $pdo->prepare("INSERT INTO test5 (name,comment,time) VALUES (:name,:comment,:time)");
$results=$pdo->query('SELECT*FROM test5 ORDER BY id;');
foreach($results as $row){

}

$name = $_POST['name'];
$comment = $_POST['comment'];
$time = date('Y/m/d/ H:i:s');


$sql->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
$sql->bindParam(':comment',$_POST['comment'],PDO::PARAM_STR);
$sql->bindParam(':time',$time,PDO::PARAM_STR);

$sql->execute();
}


//削除
$pass="pas";
if(!empty($_POST['delete'])){
if($_POST['password1']==$pass){
$id = $_POST['delete'];
$sql="delete from test5 where id=$id";
$result=$pdo->query($sql);
}
else{
echo "パスワードが一致しません";
}
}




//編集対象番号
if(isset($_POST["edit"])){
if($_POST['password1'] == $pass){
$num2 = $_POST['edit'];

//編集の場所
$sql='SELECT*FROM test5 ORDER BY id';
$results=$pdo->query($sql);
foreach($results as $row){
//編集対象番号と一致する場合は配列の値の名前とコメントを取得する
if($row['id'] == $num2){
$hi=$row['id'];
$hname=$row['name'];
$hcomment=$row['comment'];
}
}
}
}
?>
パスワード「pas」
<form action = "mission_4-1-2.php" method = "post">
<input type="text" name="name" value="<?php echo $hname; ?>"placeholder="名前"><br/>
<input type="text" name="comment" value="<?php echo $hcomment; ?>"placeholder="コメント"><br/>
<input type = "hidden" name = "hidd" value ="<?php echo $hi; ?>" >
<input type="submit" value="送信"><br/>
</form>

<form action = "mission_4-1-2.php" method = "post">
<input type="text" name="delete" value=""placeholder="削除対象番号"><br/>
<input type = "text" name = "password1" value = ""placeholder="パスワード"><br/>
<input type="submit" value="削除"><br/>
</form>

<form action = "mission_4-1-2.php" method = "post">
<input type = "text" name="edit" value=""placeholder="編集対象番号"><br/>
<input type = "text" name = "password1" value = ""placeholder="パスワード"><br/>
 <input type="submit" value="編集"><br/>
</form>


<?php
//if(!empty($_POST['name'])&&($_POST['comment'])){

$dsn = 'mysql:dbname=tt_128_99sv_coco_com;host=localhost';
$user = 'tt-128.99sv-coco';
$password = 'V8wcPZC4';
$pdo = new PDO($dsn,$user,$password);
$tb="test5";
//入力したデータをセレクトにより表示する
$sql = 'SELECT*FROM test5';
$results = $pdo->query('SELECT*FROM test5 ORDER BY id;');
$all=$results->fetchAll(PDO::FETCH_ASSOC);
foreach($all as $row){

//$rowの中にはテーブルのカラム名が入る
echo $row['id'].',';
echo $row['name'].',';
echo $row['comment'].',';
echo $row['time'].'<br>';
}
//}
?>
</body>
</html>
