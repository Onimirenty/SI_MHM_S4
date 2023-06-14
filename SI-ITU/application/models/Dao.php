<?php 
class Dao extends CI_Model 
{

    public function __construct() {
        $this->conn = null;
    }

    private function connexion() {
        $host = "localhost";
        $port = 5432;
        $dbname = "a";
        $user = "mirenty";
        $password = "0000";
        $this->conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
        return $this->conn;
    }

    public function query($query) {
        $this->connexion();
        $result = pg_query($this->conn, $query);
        $res = pg_fetch_all($result);
        pg_free_result($result);
        pg_close($this->conn);
        return $res;
    }

    public function request($req) {
        $this->connexion();
        $result = pg_query($this->conn, $req);
        pg_free_result($result);
        pg_close($this->conn);
    }

    /* $a[0]['column_name'] */
    public function getColNames($tableName) {
        $query = "SELECT column_name FROM information_schema.columns WHERE table_name = '{$tableName}'";
        $result = $this->query($query);
        $colNames = array();
        foreach ($result as $row) {
            array_push($colNames, $row);
        }
        return $colNames;
    }

    public function getAll($tableName) {
        $pg = new Dao();
        $result = $pg->query("SELECT * FROM {$tableName}");
        $array = array();
        foreach ($result as $row) {
            array_push($array, $row);
        }
        return $array;
    }

    public function getById($tableName, $id) {
        $pg = new Dao();
        $result = $pg->query("SELECT * FROM {$tableName} WHERE id={$id}");
        $array = array();
        foreach ($result as $row) {
            array_push($array, $row);
        }
        return $array;
    }

    public function getByColumn($tableName, $columnName) {
        $pg = new Dao();
        $result = $pg->query("SELECT {$columnName} FROM {$tableName}");
        $array = array();
        foreach ($result as $row) {
            array_push($array, $row);
        }
        return $array;
    }

    /* $req[0]['id']  */
    public function getByCondition($tableName, $condition="1=1") {
        $pg = new Dao();
        $result = $pg->query("SELECT * FROM {$tableName} WHERE {$condition}");
        $array = array();
        foreach ($result as $row) {
            array_push($array, $row);
        }
        return $array;
    }

    public function getByConditionAsDictionary($tableName, $condition="1=1") {
        $pg = new Dao();
        $result = $pg->query("SELECT * FROM {$tableName} WHERE {$condition}");
        $colNames = $this->getColNames($tableName);
        $array = array();
        foreach ($result as $row) {
            $d = array();
            for ($i = 0; $i < count($row); $i++) {
                $d[$colNames[$i]] = $row[$i];
            }
            array_push($array, $d);
        }
        return $array;
    }

    function ajouter_virgules($tab, $auto_increment_column = null) 
    {
        $elements =array( );
        foreach ($tab as $element) {
            if ($element != $auto_increment_column) {
                $elements[] = strval($element);
            }
        }
        return implode(',', $elements);
    }
        function insert1($table_name, $values) {
            // $req = "trade_view.dates = %s and trade_view.devise_etrangere = %f";
            // $result = sprintf($req, $date, $de);
        $columns = array_keys($values);
        $value_list = array_values($values);
        $column_string = ajouter_virgules($columns);
        $value_string = ajouter_virgules($value_list);
        $query = "INSERT INTO $table_name . ($column_string) VALUES ($value_string)";
        // exécution de la requête SQL avec la méthode appropriée
    }

    function insertAssociativeArray($table_name, $values)   
    {
        $this->db->insert($table_name, $values);

        if ($this->db->affected_rows() > 0) 
        {
            return true;
        } 
        else 
        {
            return false;
        }   
    }


}
?>