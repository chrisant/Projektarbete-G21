<?php namespace G21\Libraries\Validation;

abstract class Validator {

    /**
     * Resultatet av valideringen.
     * Ändras till false om validering misslyckas.
     *
     * @var bool
     */
    public $result = true;


    /**
     * Arrayen valideringsreglerna sparas i
     * Barnklassen ansvarar för att fylla i de modellspecifika reglerna.
     *
     * @var array
     */
    protected $rules = array();


    /**
     * Arrayen med felmeddelanden.
     * Meddelanden läggs till vartefter de kontrolleras
     *
     * @var array
     */
    protected $errors = array();


    /**
     * Variabel som finns för att undvika kollisioner med valideringen av
     * längd på värden.
     *
     * @var bool
     */
    protected $validKey;

    /**
     * Metoden för validering.
     * Ta reda på vilka regler som gäller för varje attribut och
     * kalla alla relevanta valideringsmetoder.
     *
     * @param $values
     *
     * @return array
     */
    public function validate($values)
    {
        // Gå igenom alla attribut i objektet
        foreach ($values as $key => $value)
        {
            $this->validKey = true;


            // Hämta reglerna för det aktuella attributet
            $r = $this->rules[$key];

            // Kontrollera om vädet är ifyllt
            if ($this->validKey)
                if (strpos($r, 'required') !== false)
                    $this->errors[$key] =
                        $this->validateExists($key, $value, explode('|', $r));

            // Kontrollera minimumlängd
            if ($this->validKey)
                if (strpos($r, 'min') !== false)
                    $this->errors[$key] =
                        $this->validateMin($key, $value, explode('|', $r));

            // Kontrollera maxlängd
            if ($this->validKey)
                if (strpos($r, 'max') !== false)
                    $this->errors[$key] =
                        $this->validateMax($key, $value, explode('|', $r));

            // Kontrollera giltig e-post
            if ($this->validKey)
                if (strpos($r, 'email') !== false)
                    $this->errors[$key] =
                        $this->validateEmail($key, $value);

            // Kontrollera matchande variabler
            if ($this->validKey)
                if (strpos($r, 'match') !== false)
                    $this->errors[$key] =
                        $this->validateMatching($key, $value, $values, explode('|', $r));

            // Kontrollera om unikt i tabell
            if ($this->validKey)
                if (strpos($r, 'unique'))
                    $this->errors[$key] =
                        $this->validateUnique($key, $value, explode('|', $r));
        }

        return $this->errors;
    }


    /**
     * @param $key
     * @param $value
     * @return null|string
     */
    public function validateExists($key, $value)
    {
        // Kontrollera längden på värdet. 0 = finns inte
        if (strlen($value) == 0)
        {
            $this->result = false;
            $this->validKey = false;
            return ucfirst($key) . " is required";
        }
        // Om inget fel hittades returnerar vi ett tomt värde till arrayen
        return null;
    }


    /**
     * @param $key
     * @param $value
     * @param $rules
     * @return null|string
     */
    public function validateMax($key, $value, $rules)
    {
        foreach ($rules as $rule)
        {
            // Utför endast valideringen med rätt regel
            if (strpos($rule, 'max') !== false)
            {
                // Hämta ut maxvärdet ur regeln
                $rule = ltrim($rule, 'max:');

                // Kontrollera längden på värdet
                if (strlen($value) > $rule)
                {
                    $this->result = false;
                    $this->validKey = false;
                    return ucfirst($key) . " can't be longer than $rule characters";
                }
            }
        }
        // Om inget fel hittades returnerar vi ett tomt värde till arrayen
        return null;
    }


    /**
     * @param $key
     * @param $value
     * @param $rules
     * @return null|string
     */
    public function validateMin($key, $value, $rules)
    {
        foreach ($rules as $rule)
        {
            // Utför endast valideringen med rätt regel
            if (strpos($rule, 'min') !== false)
            {
                // Hämta ut maxvärdet ur regeln
                $rule = trim($rule, 'min:');

                // Kontrollera längden på värdet
                if (strlen($value) < $rule)
                {
                    $this->result = false;
                    $this->validKey = false;
                    return ucfirst($key) . " must be $rule characters or longer";
                }
            }
        }
        // Om inget fel hittades returnerar vi ett tomt värde till arrayen
        return null;
    }


    /**
     * Kontrollera att värdet är en giltig e-post
     *
     * @param $key
     * @param $value
     *
     * @return null|string
     */
    private function validateEmail($key, $value)
    {
        // Kontrollera att det är en e-post
        if ( !filter_var($value, FILTER_VALIDATE_EMAIL) )
        {
            $this->result = false;
            $this->validKey = false;
            return ucfirst($key) . " must be a valid email";
        }

        // Om inget fel hittades returnerar vi ett tomt värde till arrayen
        return null;
    }


    /**
     * @param $key
     * @param $value
     * @param $values
     * @param $rules
     * @return null|string
     */
    private function validateMatching($key, $value, $values, $rules)
    {
        foreach ($rules as $rule)
        {
            // Utför valideringen endast med rätt regel
            if (strpos($rule, 'match') !== false)
            {
                // Hämta ut nyckeln vi ska matcha med ur regeln
                $match = ltrim($rule, 'match');
                $match = ltrim($match, ':');

                // Hämta värdet baserat på nyckeln
                $value2 = $values[$match];

                // Jämför de två värdena
                if ($value != $value2)
                {
                    $this->result = false;
                    $this->validKey = false;
                    return ucfirst($key) . " and " . ucfirst($match) . " must match";
                }
            }
        }

        // Om inget fel hittades returnerar vi ett tomt värde till arrayen
        return null;
    }


    /**
     * @param $key
     * @param $value
     * @param $rules
     * @return null
     */
    private function validateUnique($key, $value, $rules)
    {
        foreach ($rules as $rule)
        {
            // Utför valideringen endast med rätt regel
            if (strpos($rule, 'unique'))
            {
                // Hämta ut nyckeln vi ska matcha med ur regeln
                $rule = ltrim($rule, 'unique');
                $rule = ltrim($rule, ':');

                // Kontrollera om värdet finns i specifierad tabell i databasen
                // TO BE IMPLEMENTED
                $unique = true;

                // Om värdet inte var unikt
                if (!$unique)
                {
                    $this->result = false;
                    $this->validKey = false;
                    return ucfirst($key) . " must be unique in table: " . ucfirst($rule);
                }
            }
        }
        // Om inget fel hittades returnerar vi ett tomt värde till arrayen
        return null;
    }
}