<?php

class WrkInternalQualification
{
    private $connection;

    public function get_internal_qualification_list(DBConnection $db_connection, $employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT internalqualification.pk_internalQualifications, internalqualification.process, internalqualification_employee.yesno, internalqualification_employee.fk_employee, internalqualification_employee.result, internalqualification_employee.validationDate, internalqualification_employee.attachement FROM internalqualification inner join internalqualification_employee on internalqualification.pk_internalQualifications = internalqualification_employee.fk_internalQualification where internalqualification_employee.fk_employee =" . $employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if($row["yesno"] == 0){
                    $row["yesno"] = false;
                }else{
                    $row["yesno"] = true;
                }
                $emparray[] = $row;
            }
        } else {
            echo "No formationType available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }
}

?>