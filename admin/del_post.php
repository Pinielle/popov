<?php
include ("blocks/bd.php");
include ("lock.php");
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title>
        Удаление заметки
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
                        <p>Выберете заметку для удаления</p>
                        <form action="drop_post.php" method="post">
                            <?php
                            $result = mysql_query("SELECT title,id FROM data", $db);
                            $myrow = mysql_fetch_array($result);

                            do {
                                printf("<p><input name='id' type='radio' value='%s'><label> %s</label></p>", $myrow["id"], $myrow["title"]);
                            }
                            while ($myrow = mysql_fetch_array($result));

                            ?>

                            <p><input name="submit" type="submit" value="Удалить заметку"/></p>
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
