<form action="add_post.php" method="post">
    <label><p>Введите название урока: <br><input name="title" id="title" type="text"/></p></label>
    <label><p>Введите краткое описание: <br><input name="meta_d" id="meta_d" type="text"/></p></label>
    <label><p>Введите ключевые слова: <br><input name="meta_k" id="meta_k" type="text"/></p></label>
    <label><p>Введите дату: <br><input name="date" id="date" type="text" value="2017-01-10"/></p></label>
    <label><p>Введите краткое описание урока с теками абзацев: <br><textarea name="description" id="description" cols="40" rows="5" type="text"></textarea></p></label>
    <label><p>Введите полынй текст урока с тегами: <br><textarea name="text" id="text" type="text" cols="40" rows="20"></textarea></p></label>
    <label><p>Введите автора урока: <br><input name="author" id="author" type="text"/></p></label>
    <p><input name="submit" type="submit" value="Занести урок в базу"></p>

</form>