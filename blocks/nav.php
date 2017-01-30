<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td
            <?php
                if (isset($n)) {
                    if ($n==1) {
                        echo "class='nav_a'";
                    }
                    else {
                        echo "class='nav_t'";
                    }
                }
            ?>
            class='nav_a' width='25%'><p><strong><a href="index.php">Главная</a></strong></p></td>
        <td <?php
                if (isset($n)) {
                    if ($n==2) {
                        echo "class='nav_a'";
                    }
                    else {
                        echo "class='nav_t'";
                    }
                }
            ?>
            class='nav_t' width='25%'><p><strong><a href="about_us.php">О Нас</a></strong></p></td>
    </tr>
</table>