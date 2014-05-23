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

            <div class="header-logo">
                <h1 class="site-name">
                    <a href="<?= PUBLIC_PATH ?>">CommuniSale</a>
                </h1>
            </div>

            <nav class="navigation">
                <span class="dropdown">
                    <a href="#">Meny</a>
                    <ul>
                        <li><a href="#">Avancerad Sökning</a></li>
                        <li><a href="#">BLA</a></li>
                        <li><a href="#">wat</a></li>
                    </ul>
                </span>
                <?php if(!isset($_SESSION['id'])) : ?>
                    <span class="dropdown">
                        <a href="<?= PUBLIC_PATH ?>/login">Logga in</a>
                        <ul>
                            <li><a href="<?= PUBLIC_PATH ?>/user/register">Skapa användarkonto</a></li>
                        </ul>
                    </span>
                <?php endif ?>
                <?php if(isset($_SESSION['id'])) : ?>
                    <span class="dropdown">
                        <a href="#">Profil</a>
                        <ul>
                            <li><a href="<?= PUBLIC_PATH ?>/admin">Admin</a></li>
                            <li><a href="<?= PUBLIC_PATH ?>/annons/skapa">Skapa annons</a></li>
                            <li><a href="<?= PUBLIC_PATH ?>/login/terminate">Logga ut</a></li>
                        </ul>
                    </span>
                <?php endif ?>
            </nav>

            <div class="header-search">
                <form>
                    <input type="text" name="search" placeholder="Sök">
                    <input type="submit" value="&rarr;">
                </form>
            </div>

            <div class="clearfix"></div>

            <div class="featured-tags">
                <ul>
                    <li><a href="#">Lista</a></li>
                    <li><a href="#">på</a></li>
                    <li><a href="#">vanligt</a></li>
                    <li><a href="#">förekommande</a></li>
                    <li><a href="#">taggar</a></li>
                    <li><a href="#">både</a></li>
                    <li><a href="#">berodende</a></li>
                    <li><a href="#">på</a></li>
                    <li><a href="#">användaren</a></li>
                    <li><a href="#">och</a></li>
                    <li><a href="#">communityt</a></li>
                    <li><a href="#">som</a></li>
                    <li><a href="#">helhet</a></li>
                </ul>
            </div>

        </div>
    </header>

    <main>
        <div class="wrapper">
