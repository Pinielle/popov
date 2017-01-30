<?php

include ("blocks/bd.php");
$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='about'",$db);

if (!$result) {
    echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@admin.com <br>
                <strong>Код ошибки: </strong></p>";
    exit(mysql_error());
}

if (mysql_num_rows($result) > 0) {
    $myrow = mysql_fetch_array($result);
}
else {
    echo"<p>Информация по запросу не может быть извлечена, в таблице нет записей</p>";
    exit();
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title>
        <?php echo $myrow["title"]; ?>
    </title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <meta name="description" content="<?php echo $myrow["meta_d"]?>">
    <meta name="keywords" content="<?php echo $myrow["meta_k"]?>">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
    <?php include ("blocks/header.php"); ?>
    <tr>
        <td valign="top">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <?php include ("blocks/lefttd.php"); ?>
                    <td valign="top">
                        <?php $n=2; include ("blocks/nav.php");?>
                        <?php echo $myrow["text"]; ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <?php include ("blocks/footer.php"); ?>
    </tr>
</table>
</body>
</html>