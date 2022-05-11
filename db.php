
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'propositos');



class Db
{
    function __construct()
    {

        try {
            $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        } catch (Exception $e) {
            die('Connection Failed: ' . $e->getMessage());
        }
    }


    function row($sql)
    {
        $arr = $this->array($sql);

        if (sizeof($arr) == 0) {
            return null;
        }
        return $arr[0];
    }

    function array($sql)
    {
        try {
            $query = mysqli_query($this->db, $sql);

            $res = array();
            while ($row = mysqli_fetch_array($query)) {
                $res[] = $row;
            }
            return $res;
        } catch (\Throwable $th) {
            return array();
        }
    }

    function query($sql)
    {
        try {
            return $this->db->query($sql);
        } catch (\Throwable $th) {
            echo $th;
            return false;
        }
    }

    function insert($sql)
    {
        $this->query($sql);
        return $this->db->insert_id;
    }

    function login($email, $password)
    {

        $usuario = $this->row("SELECT * from usuarios where email = '$email' and password = '$password'");

        return $usuario;
    }
}
