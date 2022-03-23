<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ログイン入力</title>
</head>

<body>
  スタッフログイン<br /><br />
  <form action="admin_login_top.php" method="POST">
    スタッフコード<br />
    <input type="text" name="admin_id" />
    <br /><br />
    スタッフネーム<br />
    <input type="text" name="name" />
    <br /><br />
    パスワード<br />
    <input type="password" name="password" />
    <br /><br />
    <input type="submit" value="ログイン" />
  </form>
</body>

</html>
