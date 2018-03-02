<?php
    require_once __DIR__ . '/core/functions_1.php';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Таблицы текущей БД</title>
    <meta charset="utf-8">
</head>
<body>
    <style>
    table {
        border-collapse: collapse;
        margin-top: 20px;
    }

    .col tr:first-child {
        background-color: #eee;
        font-weight: bold;
        padding: 0px 10px 0px 10px;
    }

    .col2 tr:first-child {
        background-color: #8dbc73;
        font-weight: bold;
        padding: 0px 10px 0px 10px;
    }

    td {
        border: 1px solid black;
        text-align: center;
        padding: 0px 10px 0px 10px;
    }

    .col_1 {
        padding: 0px 10px 0px 10px;
    }

    </style>

    <h3>Таблицы</h3>
    <table class="col">
        <tr>
            <td>N</td>
            <td>Название</td>
            <td>Внести изменения</td>
        </tr>
        <?php
            if ($row) {
                $param = 'Tables_in_' . $dbname;
                $i = 1;
                print "<tr>\n";
                foreach ($row as $value) {
                    print "<tr>\n";
                    print '<td>' . $i . "</td>\n";
                    print '<td>' . htmlspecialchars($value[$param]) . "</td>\n";
                    print '<td>';
                        print '<a class="col_1" href="describe.php' . '?id=' . htmlspecialchars($value[$param]) . '&action=description">Смотреть</a>' . "\n";
                        // print '<a class="col_1" href="describe.php' . '?id=' . htmlspecialchars($value[$param]) . '&action=change">Изменить</a>' . "\n";
                    print "</td>\n";
                    print "</tr>\n";
                    $i++;
                }
            } 
        ?>        
    </table>

</body>
</html>
