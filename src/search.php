<?php
require 'parts/auto-login.php';
$search_text = $_POST['search'];
?>

<?php
// require 'header.php';
?>
<h1>検索結果</h1>
<h2><?php echo $search_text; ?></h2>
<p>
    <span>詳細検索</span><br>
<form action="search.php" method="post">
    <select name="a_p">
        <option value="a">全件一致</option>
        <option value="p">部分一致</option>
    </select>
    <select name="a_u_t">
        <option value="a">全て</option>
        <option value="u">ユーザー</option>
        <option value="t">タグ</option>
    </select>
    <input type="submit" value="絞込">
    <input type="hidden" name="search" value="<?php echo $search_text ?>">
</form>
</p>
<?php
$judge = 0;
$pe_user_sql = $pdo->prepare('SELECT * FROM Users WHERE user_name=?');
$pe_user_sql->execute([$search_text]);
$pe_user_raw = $pe_user_sql->fetchAll(PDO::FETCH_ASSOC);
if ($pe_user_raw) {
    $judge = 1;
}
$pe_tag_sql = $pdo->prepare('SELECT * FROM Tag_list WHERE tag_name=?');
$pe_tag_sql->execute([$search_text]);
$pe_tag_raw = $pe_tag_sql->fetchAll(PDO::FETCH_ASSOC);
if ($pe_tag_raw) {
    $judge = 1;
}
$se_user_sql = $pdo->prepare('SELECT * FROM Users WHERE user_name LIKE ?');
$se_user_sql->execute(['%' . $search_text . '%']);
$se_user_raw = $se_user_sql->fetchAll(PDO::FETCH_ASSOC);
if ($se_user_raw) {
    $judge = 1;
}
$se_tag_sql = $pdo->prepare('SELECT * FROM Tag_list WHERE tag_name LIKE ?');
$se_tag_sql->execute(['%' . $search_text . '%']);
$se_tag_raw = $se_tag_sql->fetchAll(PDO::FETCH_ASSOC);
if ($se_user_raw) {
    $judge = 1;
}

if ($judge == 1) {
    echo '<table>';
    if (isset($_POST['a_u_t'])) {
        if ($_POST['a_u_t'] != "t") {
            if ($pe_user_raw) {
                foreach ($pe_user_raw as $row) {
                    ?>
                    <tr>
                        <td>アイコン</td>
                        <td><?php echo $row['user_name']; ?></td>
                    </tr>
                    <?php
                }
            }
        }

    }

    if (isset($_POST['a_u_t'])) {
        if ($_POST['a_u_t'] != "u") {
            if ($pe_tag_raw) {
                foreach ($pe_tag_raw as $row) {
                    ?>
                    <tr>
                        <td>タグ</td>
                        <td><?php echo $row['tag_name']; ?></td>
                    </tr>
                    <?php
                }
            }
        }
    }
    if (isset($_POST['a_u_t'])) {


        if (isset($_POST['a_u_t'])) {
            if ($_POST['a_u_t'] != "t") {

                if ($se_user_raw) {
                    foreach ($se_user_raw as $row) {
                        if ($search_text != $row['user_name']) {
                            ?>
                            <tr>
                                <td>アイコン</td>
                                <td><?php echo $row['user_name']; ?></td>
                            </tr>
                            <?php
                        }
                    }
                }
            }
        }
        if (isset($_POST['a_u_t'])) {

            if (isset($_POST['a_u_t'])) {
                if ($_POST['a_u_t'] == "u") {
                }
                if ($se_tag_raw) {
                    foreach ($se_tag_raw as $row) {
                        if ($search_text != $row['tag_name']) {
                            ?>
                            <tr>
                                <td>タグ</td>
                                <td><?php echo $row['tag_name']; ?></td>
                            </tr>
                            <?php
                        }
                    }
                }
            }
        }
        if (isset($_POST['a_u_t'])) {
        }
    }
    echo '</table>';
} else {
    echo '一致するものがありません';
}
?>

<a href="main.php">メインへ</a>