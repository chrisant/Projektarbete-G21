<h2>Databas</h2>

<p>&nbsp;</p>
<pre><?php if (count($this->messages) > 0) print_r($this->messages); ?></pre>
<p>&nbsp;</p>

<p>Här kan vi snabbt och enkelt fixa en databas med det vi beöver.</p>
<p>Funktionerna nedan tar för givet att databasinställningarna är korrekta i
    <code>/app/libraries/Config.php</code></p>
<p>En databas ska alltså vara skapad, men inga tabeller bör finnas i den</p>

<p>&nbsp;</p>
<a href="<?= PUBLIC_PATH ?>/admin/createTables">&rarr; Skapa tabellerna</a>

<p>&nbsp;</p><p>&nbsp;</p>
<p>Finns dock inte mycket exempeldata ännu</p>

<p>&nbsp;</p>
<a href="<?= PUBLIC_PATH ?>/admin/createContent">&rarr; Fyll i exempeldata</a>



<p>&nbsp;</p>

<p>OBS: att använda länkarna flera gånger på
    samma databas skapar enbart konstiga errormeddelanden</p>
<p>Radera tabeller först om ni ska köra in dem igen.</p>