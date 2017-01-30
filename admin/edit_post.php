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
        Страница редактирования заметки
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

                            $result = mysql_query("SELECT id,title FROM data", $db);

                            $myrow = mysql_fetch_array($result);

                            do {

                                printf("<p><a href='edit_post.php?id=%s'>%s</a></p>", $myrow["id"], $myrow["title"]);


                            } while ($myrow = mysql_fetch_array($result));
                        }

                        else {
                            $result = mysql_query("SELECT * FROM data WHERE id =$id", $db);
                            $myrow = mysql_fetch_array($result);

                            $result2 = mysql_query("SELECT * FROM categories", $db);
                            $myrow2 = mysql_fetch_array($result2);

                            echo "<h2 valign='center'>Редактирование заметки</h2>";

                            echo "<form name='form1' method='post' action='update_post.php'><p>Выберите категорию <br> <select name='cat'>";

                                    do {
                                        if ($myrow['cat'] == $myrow2['id']) {
                                            printf("<option value='%s' selected>%s</option>", $myrow2["id"], $myrow2["title"]);
                                        } else {
                                            printf("<option value='%s'>%s</option>", $myrow2["id"], $myrow2["title"]);
                                        }
                                    }
                                    while ($myrow2 = mysql_fetch_array($result2));


                                    echo "</select></p>";

                            echo <<<HERE
                                <label><p>Введите название заметки: <br><input value="$myrow[title]" name="title" id="title" type="text"/></p></label>
                                <label><p>Введите краткое описание: <br><input value="$myrow[meta_d]" name="meta_d" id="meta_d" type="text"/></p></label>
                                <label><p>Введите ключевые слова: <br><input value="$myrow[meta_k]" name="meta_k" id="meta_k" type="text"/></p></label>
                                <label><p>Введите дату: <br><input value="$myrow[date]" name="date" id="date" type="text" value="2017-01-10"/></p></label>
                                <label><p>Введите краткое описание заметки с теками абзацев: <br><textarea " name="description" id="description" cols="40" rows="5" type="text">$myrow[description]</textarea></p></label>
                                <label><p>Введите полынй текст заметки с тегами: <br><textarea name="text" id="text" type="text" cols="40" rows="20">$myrow[text]</textarea></p></label>
                                <label><p>Введите автора заметки: <br><input value="$myrow[author]" name="author" id="author" type="text"/></p></label>
                                
                                
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
