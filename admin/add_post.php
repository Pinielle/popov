<?php
    include ("blocks/bd.php");
    include ("lock.php");
    if (isset($_POST['title']))       {$title = $_POST['title'];if ($title == '') {unset($title);}}
    if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
    if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
    if (isset($_POST['date']))        {$date = $_POST['date']; if ($date == '') {unset($date);}}
    if (isset($_POST['description'])) {$description = $_POST['description']; if ($description == '') {unset($description);}}
    if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
    if (isset($_POST['author']))      {$author = $_POST['author']; if ($author == '') {unset($author);}}
    if (isset($_POST['cat']))         {$cat = $_POST['cat']; if ($cat == '') {unset($cat);}}
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
                    <?php
                        include ("blocks/lefttd.php");
                        include ('model/Post.php');
                    ?>
                    <td valign="top">
                        <?php
                        if (isset($title) && isset($meta_d) && isset($meta_k) && isset($date) && isset($description) && isset($text) && isset($author) && isset($cat))
                        {

                            $post = new Post();
                            $data = array(
                                'title' => $title,
                                'metaD' => $meta_d,
                                'metaK' => $meta_k,
                                'date' => $date,
                                'shortDescription' => $description,
                                'description' => $text,
                                'author' => $author,
                                'category' => $cat
                            );
                            $post->setData($data);

                            $result = $post->save();

                            if ($result == 'true') {echo "<p>Заметка успешно добавленна</p>";}
                            else {echo "<p>Заметка не добавленна !</p>";}


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
