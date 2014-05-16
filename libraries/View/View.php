<?php namespace G21\Libraries;

use G21\Libraries\Exceptions\InvalidViewException;

class View {

    protected $models = array();

    /**
     * @param $view
     * @return bool
     */
    public function make($view)
    {
        return $this->render(
            $this->generateFilePath($view)
        );
    }

    /**
     * @param $string
     * @return string
     * @throws Exceptions\InvalidViewException
     */
    private function generateFilePath($string)
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

        // Lägg till hela sökvägen
        $file = APP . 'views/' . $file . $segments[count($segments) - 1] . '.php';


        // Kontrollera att filen faktiskt finns
        if ( file_exists($file) )
            return $file;
        else
            throw new InvalidViewException();
    }

    /**
     * @param $file
     * @return bool
     */
    private function render($file)
    {
        // Inkludera header
        require layout_header;

        // Inkludera den specifika filen
        require $file;

        // Inkludera footer
        require layout_footer;

        return true;

    }

    public function useModel($model)
    {
        $this->models[] = $model;
    }

}