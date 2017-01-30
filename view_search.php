<?php
    include ("blocks/bd.php");
    if (isset($_POST['submit_s'])) {
        $submit_s = $_POST['submit_s'];
    }

    if (isset($_POST['search'])) {
        $search = $_POST['search'];
    }

    if (isset($_POST['submit_s'])) {
        if (empty($search) or strlen($search)<4) {
            exit("<p>Поисковый запрос не введен либо меньше 4-х символов</p>");
        }
    }

    else {
        exit("<p>Вы обратились к файлу без необходимых параметров</p>");
    }

    $search = trim($search);
    $search = stripslashes($search);
    $search = htmlspecialchars($search);


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title>
        <?php echo "Заметки по запросу - $search"; ?>
    </title>
    <link href="style.css" rel="stylesheet" type="text/css">
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
                        $result = mysql_query("SELECT title, description, view, author, id, date FROM data WHERE MATCH (text) AGAINST('$search')");

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

                            while ($myrow2 = mysql_fetch_array($result2));

                        }
                        else {
                            echo"<p>Информация по вашему запросу на блоге не найденна</p>";
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