<?php
include ("blocks/bd.php");
include ("lock.php");
if (isset($_POST['title']))       {$title = $_POST['title'];if ($title == '') {unset($title);}}
if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
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
                        if (isset($title) && isset($meta_d) && isset($meta_k) && isset($text))
                        {

                            $result = mysql_query ("
                              INSERT INTO categories (title, meta_d, meta_k, text)
                                        VALUES ('$title', '$meta_d','$meta_k','$text')");

                            if ($result == 'true') {echo "<p>Категория успешно добавленна</p>";}
                            else {echo "<p>Категория не добавленна !</p>";}


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
