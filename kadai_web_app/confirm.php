<?php

$name = $_POST['employee_name'];
$age = $_POST['employee_age'];
$department = $_POST['department'];

$errors = [];

if(empty($name)) {
  $errors[] = 'お名前を入力してください';
}

if(empty($age)) {
  $errors[] = '年齢を入力してください';
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>確認画面</title>
</head>
<body>
  <h2>入力内容をご確認ください。</h2>
  <p>問題なければ「確定」、修正する場合は「キャンセル」をクリックしてください。</p>
  <table border="1">
    <tr>
      <th>項目</th>
      <th>入力内容</th>
    </tr>
    <tr>
      <td>社員名</td>
      <td><?php echo $name; ?></td>
    </tr>
    <tr>
      <td>年齢</td>
      <td><?php echo $age; ?></td>
    </tr>
    <tr>
      <td>所属部署</td>
      <td><?php echo $department; ?></td>
    </tr>
  </table>
  <p>
    <button id="confirm-btn" onclick="location.href='complete.php';">確定</button>
    <button id="cansel-btn" onclick="history.back();">キャンセル</button><br>
    <?php
    if(!empty($errors)) {
      foreach($errors as $error) {
        echo '<font color="red">' .$error . '</font>' . '<br>';
      }

      echo '<script> document.getElementById("confirm-btn").disabled = true; </script>';
    }
    ?>
  </p>
</body>
</html>