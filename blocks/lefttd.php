<td width="182" valign="top" class="left">
    <div class="nav_title">Категории</div>

    <?php
        $result2 = mysql_query("SELECT * FROM categories",$db);

        if (!$result2) {
            echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@admin.com <br>
                  <strong>Код ошибки: </strong></p>";
            exit(mysql_error());
        }

        if (mysql_num_rows($result2) > 0) {
            $myrow2 = mysql_fetch_array($result2);

            do {
                printf("<p><a class='nav_link' href='view_cat.php?cat=%s'>%s</a></p>",$myrow2["id"], $myrow2["title"]);
            }

            while ($myrow2 = mysql_fetch_array($result2));

        }
        else {
            echo "<p>Информация по запросу не может быть извлечена, в таблице нет записей</p>";
            exit();
        }
    ?>

    <div class="nav_title">Последние заметки</div>

    <?php

    include ("blocks/bd.php");
    $result3 = mysql_query("SELECT id,title FROM data ORDER BY date DESC, id DESC LIMIT 5",$db);

    if (!$result3) {
        echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@admin.com <br>
                <strong>Код ошибки: </strong></p>";
        exit(mysql_error());
    }

    if (mysql_num_rows($result3) > 0) {
        $myrow3 = mysql_fetch_array($result3);

        do {
            printf("<p><a class='nav_link' href='view_post.php?id=%s'>%s</a></p>",$myrow3["id"], $myrow3["title"]);
        }

        while ($myrow3 = mysql_fetch_array($result3));
    }
    else {
        echo"<p>Информация по запросу не может быть извлечена, в таблице нет записей</p>";
        exit();
    }

    ?>

    <div class="nav_title">Архив</div>
    <?php
        $result4 = mysql_query("SELECT DISTINCT left(date,7) AS month FROM data ORDER by month DESC",$db);

        if (!$result4) {
            echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@admin.com <br>
                    <strong>Код ошибки: </strong></p>";
            exit(mysql_error());
        }
        if (mysql_num_rows($result4) > 0) {
            $myrow4 = mysql_fetch_array($result4);

            do {
                printf("<p><a class='nav_link' href='view_date.php?date=%s'>%s</a></p>",$myrow4["month"], $myrow4["month"]);
            }

            while ($myrow4 = mysql_fetch_array($result4));
        }
        else {
            echo"<p>Информация по запросу не может быть извлечена, в таблице нет записей</p>";
            exit();
        }
    ?>

    <div class="nav_title">Друзья</div>
    <?php
    $result7 = mysql_query("SELECT * FROM friends",$db);

    if (!$result7) {
        echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@admin.com <br>
                  <strong>Код ошибки: </strong></p>";
        exit(mysql_error());
    }

    if (mysql_num_rows($result7) > 0) {
        $myrow7 = mysql_fetch_array($result7);

        do {
            printf("<p><a class='nav_link' href='%s' target='_blank'>%s</a></p>",$myrow7["link"], $myrow7["title"]);
        }

        while ($myrow7 = mysql_fetch_array($result7));

    }
    else {
        echo "<p>Информация по запросу не может быть извлечена, в таблице нет записей</p>";
        exit();
    }
    ?>

    <div class="nav_title">Поиск</div>
    <form action="view_search.php" method="post" name="form_s">
        <p class="search_t">Поисковый запрос должен быть не менее 4-х символов</p>
        <p><input name="search" type="text" size="15" maxlength="40"><br><input class="search_b" name="submit_s" type="submit" value="Искать"></p>
    </form>




</td>