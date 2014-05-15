# Projektarbete grupp 21
## Webbprogrammering och E-Tjänster

Här finns en början på ett PHP MVC ramverk/framework.
Det är byggt med tanke på att det ska vara mycket flexibelt och
lätt att forma vilken sorts applikation vi önskar utveckla.
[MVC på Wikipedia](http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller)

Vi följer också principerna för SRP ([Wikipedia](http://en.wikipedia.org/wiki/Single_responsibility_principle)).

### Mappen "Public"

För ökad säkerhet separeras applikationsfilerna från de publika
filerna på servern. Webbservern ska peka direkt på mappen "public".
Alltså om man går till root, alltså /, på servern kommer man till
den mappen.

#### index.php

Filen index.php i mappen "public" är den enda offentliga php-filen.
Den ansvarar för att hämta övriga php-filer som behövs för att
instansiera klasser och hantera all övrig funktionalitet på sidan.


