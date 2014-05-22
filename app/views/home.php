<p>Startsida</p>

<?php if (isset($_SESSION['message'])) : ?>
    <p><?= $_SESSION['message'] ?></p>
    <?php session_unset($_SESSION['message']) ?>
<?php endif ?>