<?php

    include ("blocks/bd.php");
    If (isset($_POST['author'])) {
        $author = $_POST['author'];
    }
    If (isset($_POST['text'])) {
        $text = $_POST['text'];
    }
    If (isset($_POST['pr'])) {
        $pr = $_POST['pr'];
    }
    If (isset($_POST['sub_com'])) {
        $sub_com = $_POST['sub_com'];
    }

    If (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    if (isset($sub_com)) {
        if (isset($author)) {trim($author);}
        else {$author = "";}

        if (isset($text)) {trim($text);}
        else {$text = "";}

        if (empty($author) or empty($text)) {
            exit("<p>Вы ввели не всю информацию, вернитесь назад и заполните все поля!<br><input name='back' type='button' value='Вернутся назад' onclick='history.back();'></p>");
        }

        $author = stripslashes($author);
        $text = stripslashes($text);

        $author = htmlspecialchars($author);
        $text = htmlspecialchars($text);

        $result = mysql_query("SELECT sum FROM comments_setting",$db);
        $myrow = mysql_fetch_array($result);

        if ($pr == $myrow["sum"]) {
            $date = date('Y-m-d');
            $result2 = mysql_query ("INSERT INTO comments (post,author,text,date) VALUES ('$id','$author','$text','$date')",$db);

            $address = "piniella@mail.ru";
            $subject = "Новый комментарий в блоге";
            $result3 = mysql_query("SELECT title FROM data WHERE id='$id'",$db);
            $myrow3 = mysql_fetch_array($result3);
            $post_title = $myrow3["title"];
            $message ="Появился новый комментарий к заметке-".$post_title."\nКомментарий добавил(а):".$author."\nТекст комментария: ".$text."\nСсылка на заметку: http://blog.dev/view_post.php?id=".$id."";
            $test = mail($address,$subject,$message,"Content-type:text/plain; Charset=windows-1251su\r\n");

            echo "<html><head><meta http-equiv='refresh' content='0; URL=view_post.php?id=$id'></head></html>";
            exit;
        }
        else {
            exit("<p>Вы ввели не правильную сумму чисел<br><input name='back' type='button' value='Вернутся назад' onclick='history.back();'></p>");
        }
    }
?>


