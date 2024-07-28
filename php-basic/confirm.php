<?php

session_start();

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$gender = $_POST['user_gender'];
$category = $_POST['category'];
$message = $_POST['message'];

$errors = [];

if (empty($name) ) {
    $errors[] = 'お名前を入力してください。';
}

if (empty($email)) {
    $errors[] = 'メールアドレスを入力してください。';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'メールアドレスの入力形式が正しくありません。';
}

if(empty($message)) {
    $errors[] = 'お問い合わせ内容を入力してください。';
} elseif(mb_strlen($message) > 100) {
    $errors[] = 'お問い合わせ内容が100文字を超えています。';
}

if(empty($errors)) {
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['gender'] = $gender;
    $_SESSION['category'] = $category;
    $_SESSION['message'] = $message;

    setcookie('name', $name, time() + 3600);
    setcookie('email', $email, time() + 3600);
}

?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP基礎編</title>
</head>
<body>
    <h2>入力内容をご確認ください。</h2>
    <p>問題がなければ「確定」、修正をする場合は「キャンセル」をクリックしてください。</p>

    <table border="1">
        <tr>
            <th>項目</th>
            <th>入力内容</th>
        </tr>
        <tr>
            <td>お名前</td>
            <td><?php echo $name; ?></td>
        </tr>
        <tr>
            <td>メールアドレス</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td>性別</td>
            <td><?php echo $gender; ?></td>
        </tr>
        <tr>
            <td>お問い合わせ種別</td>
            <td><?php echo $category; ?></td>
        </tr>
        <tr>
            <td>お問い合わせ内容</td>
            <td><?php echo $message; ?></td>
        </tr>
    </table>
    <p>
        <button id="confirm-btn" onclick="location.href='complete.php';">確定</button>
        <button id="cansel-btn" onclick="history.back();">キャンセル</button>
        <?php
        if(!empty($errors)) {
            foreach($errors as $error) {
                echo '<font color="red">' . $error . '</font>' . '<br>';
            }
            echo '<script> document.getElementById("confirm-btn").disabled = true; </script>';
        }


        ?>
    </p>
</body>
</html>