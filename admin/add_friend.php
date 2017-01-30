<?php
include ("blocks/bd.php");
include ("lock.php");
if (isset($_POST['title']))       {$title = $_POST['title'];if ($title == '') {unset($title);}}
if (isset($_POST['link']))        {$link = $_POST['link']; if ($link == '') {unset($link);}}

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title>
        Transit
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
                        if (isset($title) && isset($link))
                        {

                            $result = mysql_query ("
                              INSERT INTO friends (title,link)
                                        VALUES ('$title', '$link')");

                            if ($result == 'true') {echo "<p>Друг успешно добавлен</p>";}
                            else {echo "<p>Друг не добавлен !</p>";}


                        }
                        else

                        {
                            echo "<p>Федя дичь</p>";
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
