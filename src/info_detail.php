<?php
require 'parts/auto-login.php';
$announcement_id = $_POST['announcement_id'];
$sql_update = $pdo->prepare('UPDATE Announce_check SET read_check = ? WHERE announcement_id = ? AND user_id = ?');
$sql_update->execute([
    1,
    $announcement_id,
    $_SESSION['user']['user_id']
]);
if (isset($_POST['read'])) {
    $sql_update = $pdo->prepare('UPDATE Announce_check SET read_check = ? WHERE announcement_id = ? AND user_id = ?');
    $sql_update->execute([
        0,
        $announcement_id,
        $_SESSION['user']['user_id']
    ]);
}
if (isset($_POST['delete'])) {
    $sql_delete = $pdo->prepare('DELETE FROM Announce_check WHERE announcement_id = ? AND user_id=?');
    $sql_delete->execute([
        $announcement_id,
        $_SESSION['user']['user_id']
    ]);
    $redirect_url = 'https://aso2201203.babyblue.jp/Nomodon/src/info.php';
    header("Location: $redirect_url");
    exit();
}
?>

<?php
require 'header.php';
?>
<link rel="stylesheet" href="css/info_detail.css">
<?php
$info_sql = $pdo->prepare('SELECT * FROM Notification WHERE announcement_id=?');
$info_sql->execute([$announcement_id]);
$info_row = $info_sql->fetch();
$user_sql = $pdo->prepare('SELECT * FROM Users WHERE user_id=?');
$user_sql->execute([$info_row['send_person']]);
$user_row = $user_sql->fetch();
?>
<h1><?php echo $user_row['user_name']; ?>さんから、アナウンスが来ました</h1>
<h2><?php echo $info_row['content'] ?></h2>
<p>
    <span>未読にする</span>
<form action="info_detail.php" method="post">
    <input type="hidden" name="announcement_id" value=<?php echo $announcement_id; ?>>
    <input type="hidden" name="read" value="0">
    <input type="submit" value="変更">
</form>
</p>
<p>
    <span>削除</span>
<form action="info_detail.php" method="post">
    <input type="hidden" name="announcement_id" value=<?php echo $announcement_id; ?>>
    <input type="hidden" name="delete" value="0">
    <input type="submit" value="削除">
</form>
</p>
<a href="info.php">戻る</a>