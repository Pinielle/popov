<?php
include ("lock.php");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title>
        Страница добавления нового друга
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
                        <h3>Страница добавления сайта друга</h3>
                        <form action="add_friend.php" method="post">
                            <label><p>Введите имя друга: <br><input name="title" id="title" type="text"/></p></label>
                            <label><p>Введите ссылку на друга: <br><input name="link" id="link" type="text"/></p></label>
                            <p><input name="submit" type="submit" value="Занести друга в базу"></p>

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
