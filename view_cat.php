<?php
    include ("blocks/bd.php");
    if (isset($_GET['cat'])) {
        $cat=$_GET['cat'];
    }

    if (!isset($cat)) {
        $cat = 1;
    }

    $result = mysql_query("SELECT * FROM categories WHERE id='$cat'",$db);

    if (!$result) {
        echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@admin.com <br>
              <strong>Код ошибки: </strong></p>";
        exit(mysql_error());
    }

    if (mysql_num_rows($result) > 0) {
        $myrow = mysql_fetch_array($result);

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
        <?php echo "Заметки категории - $myrow[title]"; ?>
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
                        <?php echo $myrow["text"];

                            $result = mysql_query("SELECT title, description, view, author, id, date FROM data WHERE cat='$cat'",$db);

                            if (!$result) {
                                echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@admin.com <br>
                                     <strong>Код ошибки: </strong></p>";
                                exit(mysql_error());
                            }

                            if (mysql_num_rows($result) > 0) {
                                $myrow = mysql_fetch_array($result);

                                do {
                                    printf("<table align = 'center' class='post' >
                                    <tr >
                                        <td class='post_title' >
                                        <p class='post_name'><a href='view_post.php?id=%s'>%s</a></p>
                                       
                                        <p class='.post_adds'>Date: %s</p>
                                        <p class='.post_adds'>Author: %s</p></td >
                                    </tr >
                                    
                                    <tr >
                                        <td>%s<br><p class='post_view'>Просмотров: %s</p></td >
                                    </tr >
                                    
                                </table ><br><br>",$myrow["id"], $myrow["title"], $myrow["date"], $myrow["author"], $myrow["description"], $myrow["view"]);
                                }

                                while ($myrow = mysql_fetch_array($result));

                            }
                            else {
                                echo"<p>Информация по запросу не может быть извлечена, в таблице нет записей</p>";
                                exit();
                            }
                        ?></td>


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