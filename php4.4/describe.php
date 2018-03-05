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
        }
    }

    if (!empty($_GET) && (count($_GET) === 4)) {
        if ($_GET['action'] === 'changeType') {
            $obj->lastParam($_GET['action'], $_GET['nameField'], $_GET['lastType'], $_GET['key']);
        }
    }
    $ifMistake = true;
    $ifMistake2 = true;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rename'])) {
        $ifMistake = $obj->setNewName(trim($_POST['change']));
        if ($ifMistake) {
            $obj->redirect('describe');
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changeType'])) {
        $ifMistake2 = $obj->setNewType(trim($_POST['change']));
        if ($ifMistake2) {
            $obj->redirect('describe');
        }
    }
    
    $res = $obj->getDescription();

    if (isset($_POST['finish'])) {
        $obj->logout();
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
        <?php

            if (isset($_SESSION['rename'])) {
                print '<h4 style="color: blue;">Переименовать поле</h4>' . "\n";
                print '<div>' . "\n";
                    print '<form method="POST">' . "\n";
                        print '<span>Предыдущее имя: "' . $_SESSION['rename'] . "\"<span>\n";
                        print '<br>Новое имя значение: ' . "\n";
                        print '<input type="text" name="change" placeholder="Новое имя или тип поля" />' . "\n";
                        print '<input type="submit" name="rename" value="Переименовать" />' . "\n";
                    print '</form>' . "\n";
                print '</div>' . "\n";
            }

            if (!$ifMistake) {
                print '<hr>';
                print '<span style="color: red;">Недопустимое имя для поля<span>';
                print '<hr>';
            }

            if (isset($_SESSION['changeType'])) {
                print '<h4 style="color: blue;">Изменить тип</h4>' . "\n";
                print '<div>' . "\n";
                    print '<form method="POST">' . "\n";
                        print '<span>Предыдущий тип поля: "' . $_SESSION['lastType'] . "\"<span>\n";
                        print '<br>Новый тип: ' . "\n";

                        print '<input type="text" name="change" placeholder="Новый тип поля" />' . "\n";

                        print '<input type="submit" name="changeType" value="Изменить тип" />' . "\n";
                    print '</form>' . "\n";
                print '</div>' . "\n";
            }

            if (!$ifMistake2) {
                print '<hr>';
                print '<span style="color: red;">Недопустимый тип для поля<span>';
                print '<hr>';
            }

        ?>

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
                         . htmlspecialchars($value['Field']) . '&lastType=' . $value['Type'] . '&key=' . $value['Key'] . '&action=changeType">' . $value['Type'] . '</a></td>' . "\n";
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
