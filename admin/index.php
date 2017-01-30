<?php
include ("lock.php");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
            <title>
                Main Page of Admin
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
                                <p>Wellcome to Admin Parth</p>
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
