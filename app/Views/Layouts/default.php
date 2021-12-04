<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="><?= $this->meta['description']; ?>">
    <meta name="keywords" content="><?= $this->meta['keyword']; ?>">
    <title><?= $this->meta['title']; ?></title>
</head>

<body>
    <h1>Шаблон DEFAULT</h1>
    <?= $content ?>

    <?php $logs = \RedBeanPHP\R::getDatabaseAdapter()->getDatabase()->getLogger();
        dd($logs->grep('SELECT'));
    ?>
</body>

</html>