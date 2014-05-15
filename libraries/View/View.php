<?php namespace G21\Libraries;

class View {


    public static function make($string)
    {
        // Filtrera ut mapp och filnamn. Separerat med '.'
        // alla segment är mappar tills det sista segmentet, vilket är filnamnet.
        $segments = explode('.', $string);

        // Variabel för att bygga upp filnamn
        $file = '';

        // Om någon mot förmodan skapar en komplex mappstruktur med odefinierat antal
        // nivåer av mappar använder vi oss av en for-loop för att ta bygga upp
        // mappstrukturen för att slutligen ladda filen vi behöver.
        for ($i = 0; $i < count($segments) - 1; $i++)
        {
            // I varje iteration konkatenerar vi mapparna med '/' mellan dem.
            $file .= $segments[$i] . '/';
        }
        // Lägg till filnamnet och filändelse
        $file .= $segments[count($segments) - 1] . '.php';

        // inkludera filen
        require APP . 'views/' . $file;
        return true;

    }
}