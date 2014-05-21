<?php namespace G21\Libraries;

abstract class Model {

    protected $db;
    protected $table;
    protected $fields = array();
    protected $values = array();

    public function __construct($input = array())
    {
        // Instansiera databasobjektet
        $this->db = new Database();

        // Spara värden till modellen
        foreach ($this->fields as $field)
        {
            $this->values[$field] = $input[$field];
        }
    }

    public static function find($key, $value)
    {

    }

    public static function all()
    {

    }

    public function save()
    {
        // Bygg och förbered SQL
        $stmt = $this->db->prepare( $this->buildSQL() );

        // Utför SQL och spara modellen
        // Returnerar true/false beroende på resultat
        return $stmt->execute();
    }

    private function buildSQL()
    {
        // Början på SQL-strängen
        $insert = 'INSERT INTO ' . $this->table . ' ';

        // Påbörja kolumnsträngen
        $columns = '(';

        // Bygg strängen med alla kolumner
        foreach ($this->fields as $field)
        {
            $columns .= $field . ',';
        }

        // Ta bort det sista kommatecknet och lägg till slutparentesen
        $columns = rtrim($columns, ',') . ') ';

        // Påbörja värde-strängen
        $values = 'VALUES (';

        // Bygg strängen med alla värden
        foreach ($this->values as $value)
        {
            $values .= '\'' . $value . '\',';
        }

        // Ta bort det sista kommatecknet och lägg till slutparentesen
        $values = rtrim($values, ',') . ')';

        return $insert . $columns . $values;
    }


}