<p>Startsida</p>

<?php if (isset($_SESSION['message'])) : ?>
    <p><?= $_SESSION['message'] ?></p>
<?php endif ?>