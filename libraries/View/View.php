<?php namespace G21\Libraries;

use G21\Libraries\Exceptions\InvalidViewException;
use G21\Libraries\Model\BaseModel;

class View {

    private $data;

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function render($view, $full = true)
    {
        // Kontrollera om vi valt att använda den minimala vyn
        if (!$full) {
            return $this->generateBasic($view);
        }
        // Annars renderar vi den vanliga vyn
        return $this->generateView($view);

    }

    private function generateView($view)
    {
        if ($file = $this->generateFilePath($view))
        {
            // Inkludera header
            require SITE_PATH . 'app/views/layout/_header.php';

            // Inkludera den aktuella vyn
            require $file;

            // Inkludera footer
            require SITE_PATH . 'app/views/layout/_footer.php';

            return true;
        }
        return false;
    }

    private function generateBasic($view)
    {
        if ($file = $this->generateFilePath($view))
        {
            // Inkludera header
            require SITE_PATH . 'app/views/layout/_header-basic.php';

            // Inkludera den aktuella vyn
            require $file;

            // Inkludera footer
            require SITE_PATH . 'app/views/layout/_footer-basic.php';

            return true;
        }
        return false;
    }

    private function generateFilePath($file)
    {
        // Filtrera ut alla mappar och filnamnet
        $segments = explode('.', $file);

        // bygg upp mappstrukturen
        $file = '';
        for ($i = 0; $i < count($segments) - 1; $i++)
        {
            $file .= $segments[$i] . '/';
        }

        //lägg till hela sökvägen
        $file = SITE_PATH . 'app/views/' . $file .$segments[count($segments) -1] . '.php';

        if ( file_exists($file) )
            return $file;
        else
            throw new \Exception('Invalid view file');
    }

}