<?php

class WrkEmployee
{
    private $connection;

    public function get_employees_list(DBConnection $db_connection)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT pk_employee, lastName, firstName, phone, email, currentTitle FROM employee";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            echo "No user available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_administration(DBConnection $db_connection, $pk_employee){
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT lastName, firstName, birthDate, address,postCode, location, avs, phone, email, picture, currentTitle, comingToOfficeDate, currentHourlyWage, cv FROM employee WHERE pk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray = $row;
            }
        } else {
            echo "No user available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_formation(DBConnection $db_connection, $pk_employee){
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM formation WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            echo "No user available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_professionnalexperience(DBConnection $db_connection, $pk_employee){
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM professionnalexperience WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            echo "No user available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_consultingexperience(DBConnection $db_connection, $pk_employee){
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM consultingexperience WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            echo "No user available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_auditexperience(DBConnection $db_connection, $pk_employee){
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM auditexperience WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            echo "No user available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    //TODO
    public function get_employee_internalqualification(DBConnection $db_connection, $pk_employee){
        
    }

    public function get_employee_auditobservation(DBConnection $db_connection, $pk_employee){
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM auditobservation WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            echo "No user available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_objective(DBConnection $db_connection, $pk_employee){
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM objective WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            echo "No user available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_mandatesheet(DBConnection $db_connection, $pk_employee){
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM mandatesheet WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            echo "No user available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function add_employee(BDConnexion $bd_connexion, $employee){
        $message = "";
        $this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
        $this->connexion->set_charset("utf8");
        if($this->connexion->connect_error){
            die("Connection failed: " . $this->connexion->connect_error);
        }
        $sql = "INSERT INTO employee (pk_employee, lastName, firstName, birthDate, address, postCode, location, avs, phone, email, picture, currentTitle, comingToOfficeDate, currentHourlyWage, cv) VALUES (NULL, '" . $employee["lastName"] . "', '" . $employee["firstName"] . "', '" . $employee["birthDate"] . "', '" . $employee["address"] . "', '" . $employee["postCode"] . "', '" . $employee["location"] . "', '" . $employee["avs"] . "', '" . $employee["phone"] . "', '" . $employee["email"] . "', '" . $employee["picture"] . "', '" . $employee["currentTitle"] . "', '" . $employee["comingToOfficeDate"] . "', '" . $employee["currentHourlyWage"] . "', '" . $employee["cv"] . "')";
        if($this->connexion->query($sql)){
            $message = "OK";
        }else{
            $message = "KO";
        }
        
        $this->connexion->close();
        return $message;
    }
}

?>