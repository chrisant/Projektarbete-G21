<h2>Databas</h2>

<p>&nbsp;</p>
<pre><?php if (count($this->messages) > 0) print_r($this->messages); ?></pre>
<p>&nbsp;</p>

<p>H&auml;r kan vi snabbt och enkelt fixa en databas med det vi beh&ouml;ver.</p>
<p>Funktionerna nedan tar f&ouml;r givet att databasinst&auml;llningarna &auml;r korrekta i
    <code>/app/libraries/Config.php</code></p>
<p>En databas ska allts&aring; vara skapad, men inga tabeller b&ouml;r finnas i den</p>

<p>&nbsp;</p>
<a href="<?= PUBLIC_PATH ?>/admin/createTables">&rarr; Skapa tabellerna</a>

<p>&nbsp;</p><p>&nbsp;</p>
<p>...har inte skapat funktionen f&ouml;r exempeldata &auml;nnu.</p>
<!--
<p>&nbsp;</p>
<a href="<?= PUBLIC_PATH ?>/admin/createContent">&rarr; Fyll i exempeldata</a> <?php echo $this->message ?>

-->

<p>&nbsp;</p>

<p>OBS: att anv&auml;nda l&auml;nkarna flera g&aring;nger p&aring;
    samma databas skapar enbart konstiga errormeddelanden</p>