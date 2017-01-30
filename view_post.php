<?php
    include ("blocks/bd.php");
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
    }

    if (!isset($id)) {
        $id = 1;
    }

    $result = mysql_query("SELECT * FROM data WHERE id='$id'",$db);

    if (!$result) {
        echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@admin.com <br>
                  <strong>Код ошибки: </strong></p>";
        exit(mysql_error());
    }

    if (mysql_num_rows($result) > 0) {
        $myrow = mysql_fetch_array($result);
        $new_view =$myrow["view"] + 1;
        $update = mysql_query("UPDATE data SET view='$new_view' WHERE id='$id'",$db);

    }
    else {
        echo"<p>Информация по запросу не может быть извлечена, в таблице нет записей</p>";
        exit();
    }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title>
        <?php echo $myrow["title"]; ?>
    </title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <meta name="description" content="<?php echo $myrow["meta_d"]?>">
    <meta name="keywords" content="<?php echo $myrow["meta_k"]?>">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
    <?php include ("blocks/header.php"); ?>
    <tr>
        <td valign="top">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <?php include ("blocks/lefttd.php"); ?>
                    <td valign='top'>
                        <?php
                            printf("<p class='post_title1'>%s</p><p class='post_add'>Автор: %s</p><p class='post_add'>Дата: %s</p><p>%s</p><p class='post_view'>Просмотров: %s</p>",
                                $myrow["title"],$myrow["author"],$myrow["date"],$myrow["text"],$myrow["view"]);

                            echo "<p class='post_comments'>Комментарии к этой заметке: </p>";
                            $result3 = mysql_query("SELECT * FROM comments WHERE post='$id'",$db);
                            if (mysql_num_rows($result3) > 0); {
                                $myrow3 = mysql_fetch_array($result3);
                                do {
                                    printf("<div class='post_div'><p class='post_comments_add'>Коментанрий добавил(а): <strong>%s</strong> <br> <strong>Дата: %s </strong></p>
                                            <p>%s</p></div>",$myrow3["author"],$myrow3["date"], $myrow3["text"]);
                                }
                                While ($myrow3 = mysql_fetch_array($result3));
                        }
                            $result4 = mysql_query("SELECT img FROM comments_setting",$db);
                            $myrow4 = mysql_fetch_array($result4);
                        ?>
                        <p class="post_comments">Добавить ваш комментарий:</p>
                        <form action="comment.php" method="post" name="form_com">
                            <p><label>Ваше имя:</label><input name="author" type="text" size="20" maxlength="30"></p>
                            <p><label>Текст комментария:<br><textarea name="text" rows="4" cols="36"></textarea></label></p>
                            <p>Введите сумму с картинки: <br><img style="margin-top: 2px; display: inline-block;" src="<?php echo $myrow4["img"]; ?>" width="80" height="40">
                                <input style="margin-top: 12px; float: left;" name="pr" type="text" size="5" maxlength="5"></p>
                            <input name="id" type="hidden" value="<?php echo $id; ?>">
                            <p><input name="sub_com" type="submit" value="Комментировать"></p>
                        </form>
                    </td>


                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <?php include ("blocks/footer.php"); ?>
    </tr>
</table>
</body>
</html>