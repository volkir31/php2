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
    <link rel="stylesheet" href="../templates/index.css">
    <title>Document</title>
</head>
<body>
<ul class="article">
    <?php
    foreach ($this->getData('articles') as $datum) {
        ?>
        <li>
            <p><?=$datum->id?></p>
            <a href="?ctrl=article&id=<?= $datum->id ?>">
                <h1><?= $datum->title ?></h1>
            </a>
                <h2><?= $datum->article ?></h2>

        </li>
        <?php
    }
    ?>
</ul>
</body>
</html>