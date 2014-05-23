<?php namespace G21\Controllers;

use G21\Libraries\Controller;
use G21\Libraries\Database;

class AdminController extends Controller {

    public function index()
    {
        return $this->view->render('admin.home');
    }

    public function databas($messages = array())
    {
        $this->view->messages = $messages;
        return $this->view->render('admin.database');
    }

    public function createTables()
    {
        // Instansiera och ställ in ett databasobjekt
        $db = new Database();
        $db->setAttribute( Database::ATTR_ERRMODE, Database::ERRMODE_EXCEPTION );

        // Skapa två arrayer vi behöver nedan
        $msg = [];
        $sql = [];

        // Skapa SQL-queryn att köra
        $sql[] =
            'CREATE TABLE users(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL,
                phone VARCHAR(20) NOT NULL,
                role int(11) NOT NULL,
                password VARCHAR(128) NOT NULL,
                salt VARCHAR(62) NOT NULL
            )';

        $sql[] =
            'CREATE TABLE roles(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                role VARCHAR(50) NOT NULL
            )';

        $sql[] =
            'CREATE TABLE listings(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                author VARCHAR(50) NOT NULL,
                title VARCHAR(50) NOT NULL,
                type VARCHAR(20) NOT NULL,
                images VARCHAR(500) NOT NULL,
                description TEXT NOT NULL,
                created TIMESTAMP NOT NULL,
                updated TIMESTAMP NOT NULL
            )';

        $sql[] =
            'CREATE TABLE tags(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                tag VARCHAR(50) NOT NULL
            )';

        $sql[] =
            'CREATE TABLE listing_tag_pivot(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                listing INT(11) NOT NULL,
                tag INT(11) NOT NULL
            )';

        $sql[] =
            'CREATE TABLE conversations(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                sender INT(11) NOT NULL,
                recipent INT(11) NOT NULL,
                started TIMESTAMP NOT NULL
            )';

        $sql[] =
            'CREATE TABLE messages(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                conversation INT(11) NOT NULL,
                sender INT(11) NOT NULL,
                body TEXT NOT NULL,
                sent TIMESTAMP NOT NULL
            )';

        // Försök köra varje SQL-query och fånga alla undantag
        foreach ($sql as $s)
        {
            try {
                $db->exec($s);
            } catch (\PDOException $e) {
                $msg[] =  $e->getMessage();
            }
        }

        // Om inga errormeddelanden finns lägger vi in ett meddelande att det lyckades
        if (count($msg) == 0) $msg[] = 'Tabellerna skapade';

        // Returnera databassidan med relevant info
        return $this->databas($msg);
    }

    public function createContent()
    {
        // Instansiera och ställ in ett databasobjekt
        $db = new Database();
        $db->setAttribute( Database::ATTR_ERRMODE, Database::ERRMODE_EXCEPTION );

        // Skapa två arrayer vi behöver nedan
        $msg = [];
        $sql = [];

        $m1 = 'Hejsan, meddelande ett här';
        $m2 = 'This is message two';
        $m3 = 'And yet another message';
        $m4 = 'The fourth message in this data';
        $m5 = 'The fifth and final message in the example data array';


        // Skapa SQL-queryn att köra
        $sql[] = 'INSERT INTO conversations (sender, recipent) VALUES (1, 2)';
        $sql[] = 'INSERT INTO conversations (sender, recipent) VALUES (2, 3)';

        $sql[] = "INSERT INTO messages (conversation, sender, body) VALUES (1, 1, '$m1')";
        $sql[] = "INSERT INTO messages (conversation, sender, body) VALUES (1, 2, '$m2')";
        $sql[] = "INSERT INTO messages (conversation, sender, body) VALUES (1, 2, '$m3')";
        $sql[] = "INSERT INTO messages (conversation, sender, body) VALUES (2, 2, '$m4')";
        $sql[] = "INSERT INTO messages (conversation, sender, body) VALUES (2, 3, '$m5')";

        // Försök köra varje SQL-query och fånga alla undantag
        foreach ($sql as $s)
        {
            try {
                $db->exec($s);
            } catch (\PDOException $e) {
                $msg[] =  $e->getMessage();
            }
        }

        // Om inga errormeddelanden finns lägger vi in ett meddelande att det lyckades
        if (count($msg) == 0) $msg[] = 'Exempelvärden skapade';

        // Returnera databassidan med relevant info
        return $this->databas($msg);
    }

}