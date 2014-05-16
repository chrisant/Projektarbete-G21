<?php namespace G21\Libraries;

use G21\Libraries\Exceptions\InvalidViewException;

class View {


    public static function make($string)
    {
        // Filtrera ut mapp och filnamn. Separerat med '.'
        // alla segment är mappar tills det sista segmentet, vilket är filnamnet.
        $segments = explode('.', $string);


        // Bygg upp mappstrukturen utifrån den angivna filen.
        $file = '';
        for ($i = 0; $i < count($segments) - 1; $i++)
        {
            // I varje iteration konkatenerar vi mapparna med '/' mellan dem.
            $file .= $segments[$i] . '/';
        }
        // Lägg till filnamnet och filändelse
        $file .= APP . 'views/' . $segments[count($segments) - 1] . '.php';


        if ( file_exists($file) )
        {
            // Inkludera header
            require layout_header;

            // Inkludera den specifika filen
            require $file;

            // Inkludera footer
            require layout_footer;

            return true;
        }
        else
            throw new InvalidViewException();
    }
}