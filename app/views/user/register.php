<form action="<?= PUBLIC_PATH ?>/user/store" method="post">
    <div>
        <input type="text" name="name" placeholder="Namn">
    </div>
    <div>
        <input type="email" name="email" placeholder="E-post">
    </div>
    <div>
        <input type="text" name="phone" placeholder="Telefon">
    </div>
    <div>
        <input type="password" name="password" placeholder="L&ouml;senord">
    </div>
    <div>
        <input type="password" name="confirm-password" placeholder="Bekr&auml;fta L&ouml;senord">
    </div>
    <div>
        <input type="submit" value="Registrera">
    </div>
</form>