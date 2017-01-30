<?php
include ("lock.php");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title>
        Страница добавления новой категории
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
                        <form action="add_cat.php" method="post">
                            <label><p>Введите название категории: <br><input name="title" id="title" type="text"/></p></label>
                            <label><p>Введите краткое категории: <br><input name="meta_d" id="meta_d" type="text"/></p></label>
                            <label><p>Введите ключевые слова: <br><input name="meta_k" id="meta_k" type="text"/></p></label>
                            <label><p>Введите полынй текст категории с тегами: <br><textarea name="text" id="text" type="text" cols="40" rows="20"></textarea></p></label>
                            <p><input name="submit" type="submit" value="Занести категорию в базу"></p>

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
