<?php
include ("blocks/bd.php");
include ("lock.php");
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title>
        DROP
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
                        if (isset($id)) {
                            $result = mysql_query ("DELETE FROM data WHERE id='$id'");
                            if ($result == 'true') {
                                echo "<p>Заметка успшно удаленна</p>";
                            }
                            else {
                                echo "<p>Заметка не удаленна</p>";
                            }
                        }
                        else {
                            echo "<p>Вы запустили данный файл без параметра id и поэтому удалить заметку не возможно</p>";
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
