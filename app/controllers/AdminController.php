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

        $db = new Database();
        $db->setAttribute( Database::ATTR_ERRMODE, Database::ERRMODE_EXCEPTION );

        $users =
            'CREATE TABLE users(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL,
                phone VARCHAR(20) NOT NULL,
                password VARCHAR(128) NOT NULL,
                salt VARCHAR(62) NOT NULL
            )';

        $listings =
            'CREATE TABLE listings(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(50) NOT NULL,
                images VARCHAR(500) NOT NULL,
                description TEXT NOT NULL,
                created TIMESTAMP NOT NULL,
                updated TIMESTAMP NOT NULL
            )';

        $tags =
            'CREATE TABLE tags(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(50) NOT NULL
            )';

        $listing_tag_pivot =
            'CREATE TABLE listing_tag_pivot(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                listing INT(11) NOT NULL,
                tag INT(11) NOT NULL
            )';

        $conversations =
            'CREATE TABLE conversations(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                sender INT(11) NOT NULL,
                recipent INT(11) NOT NULL,
                started TIMESTAMP NOT NULL
            )';

        $messages =
            'CREATE TABLE messages(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                conversation INT(11) NOT NULL,
                sender INT(11) NOT NULL,
                sent TIMESTAMP NOT NULL
            )';

        $msg = [];

        try {
            $db->exec($users);
        } catch (\PDOException $e) {
            $msg[] =  $e->getMessage();
        }

        try {
            $db->exec($listings);
        } catch (\PDOException $e) {
            $msg[] =  $e->getMessage();
        }

        try {
            $db->exec($tags);
        } catch (\PDOException $e) {
            $msg[] =  $e->getMessage();
        }

        try {
            $db->exec($listing_tag_pivot);
        } catch (\PDOException $e) {
            $msg[] =  $e->getMessage();
        }

        try {
            $db->exec($conversations);
        } catch (\PDOException $e) {
            $msg[] =  $e->getMessage();
        }

        try {
            $db->exec($messages);
        } catch (\PDOException $e) {
            $msg[] =  $e->getMessage();
        }

        if (count($msg) == 0) $msg[] = 'Tabellerna skapade';

        return $this->databas($msg);
    }

    public function createContent()
    {
        return $this->databas('&rarr; Exempeldata sparat');
    }

}