<h2>Registrera ett anv&auml;ndarkonto</h2>
<form action="<?= PUBLIC_PATH ?>/user/store" method="post">
    <div>
        <input type="text" name="name" placeholder="Namn"
            <?php   echo( isset($this->old['name']) ?
                   'value="' . $this->old['name'] . '"' : '' );
            echo( isset($this->errors['name']) ?
                'class="error"': '' ); ?>>

        <?php echo( isset($this->errors['name']) ?
            '<span class="error-message">' . $this->errors['name'] . '</span>' : '' );
        ?>
    </div>
    <div>
        <input type="email" name="email" placeholder="E-post"
            <?php   echo( isset($this->old['email']) ?
                'value="' . $this->old['email'] . '"' : '' );
            echo( isset($this->errors['email']) ?
                'class="error"': '' ); ?>>

        <?php echo( isset($this->errors['email']) ?
            '<span class="error-message">' . $this->errors['email'] . '</span>' : '' );
        ?>
    </div>
    <div>
        <input type="text" name="phone" placeholder="Telefon"
            <?php   echo( isset($this->old['phone']) ?
                'value="' . $this->old['phone'] . '"' : '' );
            echo( isset($this->errors['phone']) ?
                'class="error"': '' ); ?>>

        <?php echo( isset($this->errors['phone']) ?
            '<span class="error-message">' . $this->errors['phone'] . '</span>' : '' );
        ?>
    </div>
    <div>
        <input type="password" name="password" placeholder="L&ouml;senord"
            <?php echo( isset($this->errors['password']) ? 'class="error"': '' ); ?>>

        <?php echo( isset($this->errors['password']) ?
            '<span class="error-message">' . $this->errors['password'] . '</span>' : '' );
        ?>
    </div>
    <div>
        <input type="password" name="confirm-password" placeholder="Bekr&auml;fta L&ouml;senord"
            <?php echo( isset($this->errors['confirm-password']) ? 'class="error"': '' ); ?>>

        <?php echo( isset($this->errors['confirm-password']) ?
            '<span class="error-message">' . $this->errors['confirm-password'] . '</span>' : '' );
        ?>
    </div>
    <div>
        <input type="submit" value="Registrera">
    </div>
</form>

<pre>
    <br>
    errors:
    <?= print_r($this->errors, 1) ?>
    <br>
    old input:
    <?= print_r($this->old, 1) ?>
</pre>