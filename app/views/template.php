<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title><?php echo $title; ?></title>
</head>

<body>
    <header>
        <?php require ROOT . "/app/views/partials/header.php"; ?>
    </header>
    <div class="container">
        <?php require ROOT . "/app/views/" . $view; ?>
    </div>

</body>

</html>