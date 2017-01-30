<?php
include ("lock.php");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title>
        Страница добавления новой заметки
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
                        <form action="add_post.php" method="post">
                            <label><p>Введите название заметки: <br><input name="title" id="title" type="text"/></p></label>
                            <label><p>Введите краткое описание: <br><input name="meta_d" id="meta_d" type="text"/></p></label>
                            <label><p>Введите ключевые слова: <br><input name="meta_k" id="meta_k" type="text"/></p></label>
                            <label><p>Введите дату: <br><input name="date" id="date" type="text" value="<?php $date = date('Y-m-d'); echo $date; ?>"/></p></label>
                            <label><p>Введите краткое описание заметки с теками абзацев: <br><textarea name="description" id="description" cols="40" rows="5" type="text"></textarea></p></label>
                            <label><p>Введите полынй текст заметки с тегами: <br><textarea name="text" id="text" type="text" cols="40" rows="20"></textarea></p></label>
                            <label><p>Введите автора заметки: <br><input name="author" id="author" type="text"/></p></label>
                            <label><p>Введите категорию заметки: <br>
                                    <select name="cat" size="0">
                                        <?php

                                        include ("blocks/bd.php");
                                        $result = mysql_query("SELECT title,id FROM categories",$db);

                                        if (!$result) {
                                            echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@admin.com <br>
                                                    <strong>Код ошибки: </strong></p>";
                                            exit(mysql_error());
                                        }

                                        if (mysql_num_rows($result) > 0) {
                                            $myrow = mysql_fetch_array($result);

                                            do {
                                                printf("<option value='%s'>%s</option>",$myrow["id"],$myrow["title"]);
                                            }
                                            while ($myrow = mysql_fetch_array($result));
                                        }
                                        else {
                                            echo"<p>Информация по запросу не может быть извлечена, в таблице нет записей</p>";
                                            exit();
                                        }

                                        ?>

                                    </select> </p></label>
                            <p><input name="submit" type="submit" value="Занести заметку в базу"></p>

                        </form>
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
