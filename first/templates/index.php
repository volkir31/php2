<!doctype html>
<?php
/**
 * @var View $this
 */

use App\View;

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .admin{
            font-size: 26px;
        }
    </style>
</head>
<body>
<a href="?ctrl=admin" class="admin">Admin panel</a>
<ul>
    <?php
    foreach ($this->articles as $datum) {
        ?>
        <li>
            <a href="?ctrl=article&id=<?= $datum->id ?>">
                <h1><?= $datum->title ?></h1>
                <h2><?= $datum->article ?></h2>
            </a>
        </li>
        <?php
    }
    ?>
</ul>
</body>
</html>