Här finns en början på ett ramverk/framework som bygger på
principerna för MVC. Det är byggt med tanke på att det ska vara
mycket flexibelt och lätt att forma vilken sorts applikation
som önskas genom att använda sig av detta.
http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller

En annan princip som följs är SRP, i vilken det är viktigt att
se till att alla klasser bara har sin egen funktion.
Funktionalitet som behövs, men inte hör till en klass specifika funktion
separeras ut till sin egen klass. Alla klasser sparas i en egen fil.
http://en.wikipedia.org/wiki/Single_responsibility_principle


------------------------------
    Mappen "Public"
------------------------------

Dessutom ska så få filer som möjligt visas till massorna.
Därför finns en mapp som heter "public" som enbart
innehåller de filer som användaren direkt behöver komma åt
via webbläsaren. Detta är för att minska på säkerhetsrisker
och i allmänhet göra det svårare att förstöra sidan.

För att göra någon sorts liknelse kan man säga att om man
låser in en tjuv i en cell är det dumt att lägga nyckeln
för att ta sig ut inuti cellen.

Webservern (exempelvis Apache) kan komma åt alla filer som
behövs för att köra applikationen men när användaren
besöker sidan skickar servern till mappen "public" och gör
det omöjligt att utifrån komma åt de filer som finns utanför
mappen eller "högre upp" i mapphierarkin.


------------------------------
    index.php
------------------------------

Filen index.php i mappen "public" är den enda offentliga
php-filen. Den filen pekar i sin tur på övriga php-filer som
behövs för att instansiera klasser och hantera all övrig
funktionalitet på sidan.


