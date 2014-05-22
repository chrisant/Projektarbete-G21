<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>G21</title>
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/style.css">
</head>

<body>


    <header>
        <div class="wrapper">
            <nav>
                <ul>
                    <li><a href="<?= PUBLIC_PATH ?>">Start</a></li>
                    <?php if(empty($_SESSION)) : ?>
                        <li><a href="<?= PUBLIC_PATH ?>/login">Logga in</a></li>
                        <li><a href="<?= PUBLIC_PATH ?>/user/register">Skapa användarkonto</a></li>
                    <?php endif ?>
                    <?php if(!empty($_SESSION)) : ?>
                        <li><a href="<?= PUBLIC_PATH ?>/admin">Admin</a></li>
                        <li><a href="<?= PUBLIC_PATH ?>/annons/skapa">Skapa annons</a></li>
                        <li><a href="<?= PUBLIC_PATH ?>/login/terminate">Logga ut</a></li>
                    <?php endif ?>
                </ul>
            </nav>


            <h1 class="site-name">
                <a href="<?= PUBLIC_PATH ?>">CommuniSale</a>
            </h1>


        </div>

    </header>

    <main>
        <div class="wrapper">
