<?php
    require_once __DIR__ . '/core/session.php';
    startChange($_GET);
    $obj = new DescriptionTable($_SESSION['id'], $db);

    if (!empty($_GET) && (count($_GET) === 2)) {
        if ($_GET['action'] === 'delete') {
            if ( $obj->deliteField($_GET['nameField'])) {
                redirect('describe');
            }
        } elseif ($_GET['action'] === 'rename') {
            $obj->lastParam($_GET['action'], $_GET['nameField']);
        } elseif ($_GET['action'] === 'changeType') {
            $obj->lastParam($_GET['action'], $_GET['nameField']);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rename'])) {
        $obj->setNewName($_POST['change']);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changeType'])) {
        $obj->setNewType($_POST['change']);
    }
    
    $res = $obj->getDescription();

    if (isset($_POST['finish'])) {
        logout();
    }
    

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Описание таблицы</title>
    <meta charset="utf-8">
</head>
<body>
    <style>
    table {
        border-collapse: collapse;
        margin-top: 20px;
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

    <h3>Описание таблицы: <?php print $_SESSION['id']; ?> </h3>


    <h4 style="color: blue;">Переименовать или изменить тип поля</h4>
        <div>
            <form method="POST">
                <input type="text" name="change" placeholder="Новое имя или тип поля" />
                    <?php
                        if ((!empty($_GET)) && ($_GET['action'] === 'rename')) {
                            print '<input type="submit" name="rename" value="Переименовать/Изменить тип" />';
                        } else {
                            print '<input type="submit" name="changeType" value="Переименовать/Изменить тип" />';
                        }
                    ?>
            </form>
        </div>

    <table class="col2">
        <tr>
            <td>N</td>
            <td>Field</td>
            <td>Type</td>
            <td>Null</td>
            <td>Key</td>
            <td>Default</td>
            <td>Extra</td>
            <td>Delete</td>
        </tr>
        <?php
            if ($res) {
                $m = 1;
                foreach ($res as $value) {
                    print "<tr>\n";
                    print '<td>' . $m . "</td>\n";
                        print '<td><a class="col_1" style="color: green" href="?nameField='
                         . htmlspecialchars($value['Field']) . '&action=rename">' . $value['Field'] . '</a></td>' . "\n";
                        print '<td><a class="col_1" style="color: blue" href="?nameField='
                         . htmlspecialchars($value['Field']) . '&action=changeType">' . $value['Type'] . '</a></td>' . "\n";
                    print '<td>' . $value['Null'] . "</td>\n";
                    print '<td>' . $value['Key'] . "</td>\n";
                    print '<td>' . $value['Default'] . "</td>\n";
                    print '<td>' . $value['Extra'] . "</td>\n";
                    print "<td>\n";
                        print '<a class="col_1" style="color: red" href="' . '?nameField=' . htmlspecialchars($value['Field']) . '&action=delete">Delete field</a>' . "\n";
                    print "</td>\n";
                    print "</tr>\n";
                    $m++;
                }

            }

        ?>
    </table>

    <div style="margin-top: 25px;">
        <form method="POST">
            <input type="submit" name="finish" value="Завершить просмотр" />
        </form>
    </div>

</body>
</html>
