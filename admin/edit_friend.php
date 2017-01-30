<?php
include ("blocks/bd.php");
include ("lock.php");
if (isset($_GET['id'])) {
    $id=$_GET['id'];
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title>
        Страница редактирования друзей
    </title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
    <!-- Podkluchaem shapku site-->
    <?php include("blocks/headers.php");
    ?>
    <tr>
        <td>
            <table width="690" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <!-- Podkluchaem left block site-->
                    <?php include ("blocks/lefttd.php")
                    ?>
                    <td valign="top">
                        <?php

                        $id = isset($_GET['id']) ? $_GET['id'] : 0;
                        if (!$id) {

                            $result = mysql_query("SELECT id,title FROM friends", $db);

                            $myrow = mysql_fetch_array($result);

                            do {

                                printf("<p><a href='edit_friend.php?id=%s'>%s</a></p>", $myrow["id"], $myrow["title"]);


                            } while ($myrow = mysql_fetch_array($result));
                        }

                        else {
                            $result = mysql_query("SELECT * FROM friends WHERE id =$id", $db);
                            $myrow = mysql_fetch_array($result);

                            echo "<h2 valign='center'>Редактирование друга</h2>";


                            echo <<<HERE
                                <form name='form1' method='post' action='update_friend.php'>
                                <label><p>Введите имя друга: <br><input value="$myrow[title]" name="title" id="title" type="text"/></p></label>
                                <label><p>Введите ссылку на друга: <br><input value="$myrow[link]" name="link" id="link" type="text"/></p></label>
                                <input name="id" type="hidden" value="$myrow[id]">
                                <p><input name="submit" type="submit" value="Сохранить изменения"></p>

                            </form>        
HERE;
                        }
                        ?>


                    </td>


                </tr>
            </table>
        </td>
    </tr>
    <!-- Podkluchaem niz site-->
    <?php include("blocks/footer.php")?>
</table>
</body>
</html>
