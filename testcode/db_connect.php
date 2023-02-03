<?php


class DB_CONNECT {
    // Construct
    function __construct(){
        // Trying connect to DB
        $this->connect();
    }
    // Deconstruct
    function __destruct(){
        // Closing connection to DB

        $this->close();
    }

    function connect() {

        $filepath = realpath (dirname(__FILE__));

        require_once($filepath."/dbconfig.php");

        // connect to mysql (phpadmin) DB
        $con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());

        $db = mysql_select_db(DB_DATABASE) or die(mysql_error()) or die(mysql_error());

        return $con;
    }

    function close(){
        // close DB connection
        mysql_close();



    }


}

?>