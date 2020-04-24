<!DOCTYPE html>
<html lang="es">

    <?php 
    require __DIR__  . '/vendor/autoload.php';
    require_once('./config/header.html'); ?>

<body>
    <?php require_once('./src/components/navbar.html'); ?>
    <?php require_once('./router/router.php'); ?>
</body>

</html>