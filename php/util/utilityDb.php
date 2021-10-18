<?php
    require "./util/configDb.php";
    $rentoolDB = new DBmenager();

    class DBmenager {
        private $mysqli_conn = null;

        //costruttore
        function DBmenager(){
            $this->openConnection();
        }

        function openConnection(){
            if (!$this->isOpened()){
                global $dbHostname;
                global $dbUsername;
                global $dbPassword;
                global $dbName;
                // apro la connessione al server
                $this->mysqli_conn = new mysqli ($dbHostname, $dbUsername, $dbPassword);
                if ($this->mysqli_conn->connect_error)
                    die('Connect Error (' .  $this->mysqli_conn->connect_errno. ') '. $this->mysqli_conn->connect_error);
                // seleziono il server
                $this->mysqli_conn->select_db($dbName) or  
                    die('Can\'t use pweb: ' . mysqli_error());
            }
        }
        // controllo se la connessione e' aperta
        function isOpened(){
            return ($this->mysqli_conn != null);
        }

        // utility per le query
        function performQuery($queryText){
            if(!$this->isOpened())
                $this->openConnection();

            return $this->mysqli_conn->query($queryText);
        }
        // evita attacchi ostili dall'esterno
        function sqlInjectionFilter($parameter){
            if(!$this->isOpened())
                $this->openConnection();

            return $this->mysqli_conn->real_escape_string($parameter);
        }
        // chiudi la connessione
        function closeConnection(){
            if($this->mysqli_conn !== null)
                $this->mysqli_conn->close();

            $this->mysqli_conn = null;
        }
    }
?>