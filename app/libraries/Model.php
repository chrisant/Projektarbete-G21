<?php namespace G21\Libraries;

//use PDO;
use G21\Libraries\Database as DB;

abstract class Model {

    /**
     * Tabellnamnet för modellen.
     *
     * @var string
     */
    protected $table;


    /**
     * Array med namn på alla kolumner i tabellen
     *
     * @var array
     */
    protected $fields = array();


    /**
     * Array med alla värden i modellen.
     * Använder värden från $fields som nycklar.
     *
     * @var array
     */
    protected $values = array();


    /**
     * Instansen av databasen
     *
     * @var Database
     */
    protected $db;


    protected $ignored;


    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->values)) {
            return $this->values[$name];
        }
    }


    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->values[$name] = $value;
    }


    /**
     * Konstruktorn instansierar databasen så vi kan hämta/spara värden.
     */
    public function __construct()
    {
        // Instansiera databasobjektet
        $this->db = new Database();
    }


    /**
     * Spara värden till modellobjektet
     * @param array $input
     */
    public function create($input = array())
    {
        // Spara värden till modellen
        foreach ($this->fields as $field)
        {
            $this->{$field} = $input[$field];
        }
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
            if ( !in_array($field, $this->ignored) )
                $columns .= $field . ',';
        }

        // Ta bort det sista kommatecknet och lägg till slutparentesen
        $columns = rtrim($columns, ',') . ') ';

        // Påbörja värde-strängen
        $values = 'VALUES (';

        // Bygg strängen med alla värden
        foreach ($this->values as $key => $value)
        {
            if ( !in_array($key, $this->ignored) )
                $values .= '\'' . $value . '\',';
        }

        // Ta bort det sista kommatecknet och lägg till slutparentesen
        $values = rtrim($values, ',') . ')';

        return $insert . $columns . $values;
    }






    public function find($key, $value, $order = ['id', 'ASC'])
    {
        // Förebered SQL
        $query = $this->db->prepare(
            'SELECT * FROM ' . $this->table .
            ' WHERE ' . $key . ' = ' . $value .
            ' ORDER BY ' . $order[0] . ' ' . $order[1]
        );

        // Utför queryn
        $query->execute();

        // Returnera en array med objekten från databasen
        return $query->fetchAll(DB::FETCH_OBJ);
    }

    public function findById($id)
    {
        // Förebered SQL
        $query = $this->db->prepare(
            'SELECT * FROM ' . $this->table .
            ' WHERE id = ' . $id
        );

        // Utför queryn
        $query->execute();

        // Returnera objektet från databasen
        return $query->fetch(DB::FETCH_OBJ);
    }

    public function all($order = ['id', 'ASC'])
    {
        // Förebered SQL
        $query = $this->db->prepare(
            'SELECT * FROM ' . $this->table .
            ' ORDER BY ' . $order[0] . ' ' . $order[1]
        );

        // Utför queryn
        $query->execute();

        // Returnera en array med objekten från databasen
        return $query->fetchAll(DB::FETCH_OBJ);
    }

}