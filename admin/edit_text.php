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
        Page for Edit Text
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
                        <p><strong>Выберете страницу для редактирования</strong></p>
                        <?php

                        $id = isset($_GET['id']) ? $_GET['id'] : 0;
                        if (!$id) {

                            $result = mysql_query("SELECT id,title FROM settings", $db);

                            $myrow = mysql_fetch_array($result);

                            do {

                                printf("<p><a href='edit_text.php?id=%s'>%s</a></p>", $myrow["id"], $myrow["title"]);


                            } while ($myrow = mysql_fetch_array($result));
                        }

                        else {
                            $result = mysql_query("SELECT * FROM settings WHERE id =$id", $db);
                            $myrow = mysql_fetch_array($result);

                            echo <<<HERE
                            <form action="update_text.php" method="post">
                                <label><p>Введите название страницы (title): <br><input value="$myrow[title]" name="title" id="title" type="text"/></p></label>
                                <label><p>Введите краткое описание страницы: <br><input value="$myrow[meta_d]" name="meta_d" id="meta_d" type="text"/></p></label>
                                <label><p>Введите ключевые слова: <br><input value="$myrow[meta_k]" name="meta_k" id="meta_k" type="text"/></p></label>
                                <label><p>Введите полынй текст урока с тегами: <br><textarea name="text" id="text" type="text" cols="40" rows="20">$myrow[text]</textarea></p></label>
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



