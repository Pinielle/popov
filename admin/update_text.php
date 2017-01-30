<?php
include ("blocks/bd.php");
include ("lock.php");
if (isset($_POST ['title'])) {
    $title = $_POST['title'];
    if ($title == '') {
        unset($title);
    }
}
if (isset($_POST ['meta_d'])) {
    $meta_d = $_POST['meta_d'];
    if ($meta_d == '') {
        unset($meta_d);
    }
}
if (isset($_POST ['meta_k'])) {
    $meta_k = $_POST['meta_k'];
    if ($meta_k == '') {
        unset($meta_k);
    }
}
if (isset($_POST ['text'])) {
    $text = $_POST['text'];
    if ($text == '') {
        unset($text);
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

}

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
                        if (isset($title) && isset($text) && isset($meta_k) && isset($meta_d)) {
                            $result = mysql_query (
                                "UPDATE `settings` SET
                                    `title` = '" . $title . "',
                                    `meta_d` = '" . $meta_d . "',
                                    `meta_k` = '" . $meta_d . "',
                                    `text` = '" . $text . "'
                                    WHERE `id` = '" . $id . "'; "
                            );
                            if ($result == 'true') {
                                echo "<p>Страница успешно обновленна</p>";
                            }
                            else {
                                echo "<p>Страница не обновленна</p>";
                            }
                        }
                        else {
                            echo "<p>Вы ввели не всю информацию, страница не обновленна</p>";
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
