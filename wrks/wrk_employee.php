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
            echo "No employees available";
        }
        $this->connection->close();
        return json_encode($emparray);
    }

    public function get_employee_administration(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT pk_employee, lastName, firstName, birthDate, address,postCode, location, avs, phone, email, picture, currentTitle, comingToOfficeDate, currentHourlyWage, cv, criminalRecord FROM employee WHERE pk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray = $row;
            }
        } else {
            echo "No employee administration available";
        }
        $this->connection->close();
        return json_encode($emparray);
    }

    public function get_employee_formation(DBConnection $db_connection, $pk_employee)
    {
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
            //echo "[]";
        }
        $this->connection->close();
        return json_encode($emparray);
    }

    public function get_employee_professionnalexperience(DBConnection $db_connection, $pk_employee)
    {
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
            //echo "[]";
        }
        $this->connection->close();
        return json_encode($emparray);
    }

    public function get_employee_consultingexperience(DBConnection $db_connection, $pk_employee)
    {
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
            //echo "[]";
        }
        $this->connection->close();
        return json_encode($emparray);
    }

    public function get_employee_auditexperience(DBConnection $db_connection, $pk_employee)
    {
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
            //echo "[]";
        }
        $this->connection->close();
        return json_encode($emparray);
    }

    public function get_employee_auditobservation(DBConnection $db_connection, $pk_employee)
    {
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
            //echo "[]";
        }
        $this->connection->close();
        return json_encode($emparray);
    }

    public function get_employee_objective(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM objective WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["validate"] == 0) {
                    $row["validate"] = false;
                } else {
                    $row["validate"] = true;
                }
                $emparray[] = $row;
            }
        } else {
            //echo "[]";
        }
        $this->connection->close();
        return json_encode($emparray);
    }

    public function get_employee_mandatesheet(DBConnection $db_connection, $pk_employee)
    {
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
            //echo "[]";
        }
        $this->connection->close();
        return json_encode($emparray);
    }

    public function add_employee(DBConnection $db_connection, $employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        //$username = checkUsername($employee->firstName . $employee->lastName);
        $username = $employee->firstName . $employee->lastName;

        $sql = "INSERT INTO employee (pk_employee, lastName, firstName, username, birthDate, address, postCode, location, avs, phone, email, picture, currentTitle, comingToOfficeDate, currentHourlyWage, cv, criminalRecord)
            VALUES (NULL, '" . $employee->lastName . "', '" . $employee->firstName . "', '" . $username . "', '" . $employee->birthDate . "', '" . $employee->address . "', '" . $employee->postCode . "', '"
            . $employee->location . "', '" . $employee->avs . "', '" . $employee->phone . "', '" . $employee->email . "', '" . $employee->picture . "', '" . $employee->currentTitle
            . "', '" . $employee->comingToOfficeDate . "', '" . $employee->currentHourlyWage . "', '" . $employee->cv . "', '" . $employee->criminalRecord . "')";
        if ($this->connection->query($sql)) {
            $last_id = $this->connection->insert_id;
        } else {
            $last_id = null;
        }

        $this->connection->close();
        $this->create_dirs($last_id);
        return $last_id;
    }

    public function delete_employee(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "DELETE FROM employee WHERE employee.pk_employee = $pk_employee";
        if ($this->connection->query($sql)) {
            $message = "OK";
        } else {
            $message = "KO";
        }

        $this->connection->close();
        return $message;
    }

    public function update_employee_admin(DBConnection $db_connection, $employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "UPDATE employee SET lastName = '$employee->lastName', firstName = '$employee->firstName', birthDate = '$employee->birthDate', 
                  address = '$employee->address', postCode = '$employee->postCode', location = '$employee->location', avs = '$employee->avs', 
                  phone = '$employee->phone', email = '$employee->email', currentTitle = '$employee->currentTitle', comingToOfficeDate = '$employee->comingToOfficeDate', 
                  currentHourlyWage = '$employee->currentHourlyWage', picture = '$employee->picture',cv = '$employee->cv', criminalRecord = '$employee->criminalRecord' WHERE employee.pk_employee = $employee->pk_employee";
        if ($this->connection->query($sql)) {
            $message = "OK";
        } else {
            $message = "KO";
        }

        $this->connection->close();
        return $message;
    }

    public function update_employee_formations(DBConnection $db_connection, $employee_formations)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "SELECT * FROM formation WHERE formation.fk_employee = " . $employee_formations[0]->fk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $oldFormations[] = $row;
            }
        }

        foreach ($employee_formations as $updatedFormation) {
            if ($updatedFormation->pk_formation == null) {
                //if there's new formations (insert)
                $sql = "INSERT INTO formation (pk_formation, formativeOrganization, fk_formationType, EAScope, fromDate, toDate, attachement, fk_employee) 
                      VALUES (NULL, '$updatedFormation->formativeOrganization', '$updatedFormation->fk_formationType', '$updatedFormation->EAScope', 
                      '$updatedFormation->fromDate', '$updatedFormation->toDate', '$updatedFormation->attachement', '$updatedFormation->fk_employee')";
                if ($this->connection->query($sql)) {
                    $message .= "New formation « $updatedFormation->formativeOrganization » added \n";
                } else {
                    $message .= "Error while adding new formation « $updatedFormation->formativeOrganization » \n";
                }
            } else {
                //if formation already exist (update)
                $sql = "UPDATE formation SET formativeOrganization = '$updatedFormation->formativeOrganization', 
                          fk_formationType = '$updatedFormation->fk_formationType', EAScope = '$updatedFormation->EAScope', 
                          fromDate = '$updatedFormation->fromDate', toDate = '$updatedFormation->toDate', 
                          attachement = '$updatedFormation->attachement' WHERE formation.pk_formation = $updatedFormation->pk_formation";
                if ($this->connection->query($sql)) {
                    $message .= "Formation with pk $updatedFormation->pk_formation updated \n";
                } else {
                    $message .= "Error while updating formation with pk $updatedFormation->pk_formation \n";
                }
            }
        }
        foreach ($oldFormations as $oldFormation) {
            $stillExist = false;
            foreach ($employee_formations as $updatedFormation) {
                $message .= "updated pk" . $updatedFormation->pk_formation . "\n" . "old pk " . $oldFormation["pk_formation"] . "\n";
                if ($updatedFormation->pk_formation == $oldFormation["pk_formation"]) {

                    $stillExist = true;
                }
            }
            if (!$stillExist) {
                $sql = "DELETE FROM formation WHERE formation.pk_formation = " . $oldFormation["pk_formation"];
                if ($this->connection->query($sql)) {
                    $message .= "Formation with pk " . $oldFormation["pk_formation"] . " deleted \n";
                } else {
                    $message .= "Error while deleting formation with pk " . $oldFormation["pk_formation"] . "\n";
                }
            }
        }

        $this->connection->close();
        return $message;
    }

    public function empty_employee_formations(DBConnection $db_connection, $pk_employee)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "DELETE FROM formation WHERE formation.fk_employee = " . $pk_employee;
        if ($this->connection->query($sql)) {
            $message .= "Formations with fk employee " . $pk_employee . " deleted \n";
        } else {
            $message .= "Error while deleting formations with fk employee " . $pk_employee . "\n";
        }

        $this->connection->close();
        return $message;
    }

    public function update_employee_professionnalExperiences(DBConnection $db_connection, $employee_professionnalExperience)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "SELECT * FROM professionnalexperience WHERE professionnalexperience.fk_employee = " . $employee_professionnalExperience[0]->fk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $oldProfessionnalExperiences[] = $row;
            }
        }

        foreach ($employee_professionnalExperience as $updatedProfExp) {
            if ($updatedProfExp->pk_professionnalExperience == null || $updatedProfExp->pk_professionnalExperience == "0") {
                //if there's new profexp (insiert)
                $sql = "INSERT INTO professionnalexperience (pk_professionnalExperience, organizationName, organizationActivity, fonction, EAScope, fromDate, toDate, attachement, fk_employee) 
                      VALUES (NULL, '$updatedProfExp->organizationName', '$updatedProfExp->organizationActivity', '$updatedProfExp->fonction', 
                      '$updatedProfExp->EAScope', '$updatedProfExp->fromDate', '$updatedProfExp->toDate', '$updatedProfExp->attachement', '$updatedProfExp->fk_employee')";
                if ($this->connection->query($sql)) {
                    $message .= "New professionnal experience « $updatedProfExp->organizationName » added \n";
                } else {
                    $message .= "Error while adding new professionnal experience « $updatedProfExp->organizationName » \n";
                }
            } else {
                //if profexp already exist (update)
                $sql = "UPDATE professionnalexperience SET organizationName = '$updatedProfExp->organizationName', 
                          organizationActivity = '$updatedProfExp->organizationActivity', fonction = '$updatedProfExp->fonction', 
                          EAScope = '$updatedProfExp->EAScope', fromDate = '$updatedProfExp->fromDate', 
                          toDate = '$updatedProfExp->toDate', attachement = '$updatedProfExp->attachement' WHERE professionnalexperience.pk_professionnalExperience = $updatedProfExp->pk_professionnalExperience";
                if ($this->connection->query($sql)) {
                    $message .= "Professionnal experience with pk $updatedProfExp->pk_professionnalExperience updated \n";
                } else {
                    $message .= "Error while updating professionnal experience with pk $updatedProfExp->pk_professionnalExperience \n";
                }
            }
        }
        foreach ($oldProfessionnalExperiences as $oldProfessionnalExperience) {
            $stillExist = false;
            foreach ($employee_professionnalExperience as $updatedProfExp) {
                $message .= "updated pk" . $updatedProfExp->pk_professionnalExperience . "\n" . "old pk " . $oldProfessionnalExperience["pk_professionnalExperience"] . "\n";
                if ($updatedProfExp->pk_professionnalExperience == $oldProfessionnalExperience["pk_professionnalExperience"]) {

                    $stillExist = true;
                }
            }
            if (!$stillExist) {
                $sql = "DELETE FROM professionnalexperience WHERE professionnalexperience.pk_professionnalExperience = " . $oldProfessionnalExperience["pk_professionnalExperience"];
                if ($this->connection->query($sql)) {
                    $message .= "Professionnal experience with pk " . $oldProfessionnalExperience["pk_professionnalExperience"] . " deleted \n";
                } else {
                    $message .= "Error while deleting professionnal experience with pk " . $oldProfessionnalExperience["pk_professionnalExperience"] . "\n";
                }
            }
        }

        $this->connection->close();
        return $message;
    }

    public function empty_employee_professionnalExperiences(DBConnection $db_connection, $pk_employee)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "DELETE FROM professionnalexperience WHERE professionnalexperience.fk_employee = " . $pk_employee;
        if ($this->connection->query($sql)) {
            $message .= "Professionnal experiences with fk employee " . $pk_employee . " deleted \n";
        } else {
            $message .= "Error while deleting professionnal experiences with fk employee " . $pk_employee . "\n";
        }

        $this->connection->close();
        return $message;
    }

    public function update_employee_consultingExperiences(DBConnection $db_connection, $employee_consultingExperiences)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "SELECT * FROM consultingexperience WHERE consultingexperience.fk_employee = " . $employee_consultingExperiences[0]->fk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $oldConsultingExperiences[] = $row;
            }
        }

        foreach ($employee_consultingExperiences as $updatedConExp) {
            if ($updatedConExp->pk_consultingExperience == null || $updatedConExp->pk_consultingExperience == "0") {
                //if there's new conexp (insiert)
                $sql = "INSERT INTO consultingexperience (pk_consultingExperience, organizationName, organizationActivity, fk_NMSStandard, EAScope, organization, year, fk_employee) 
                      VALUES (NULL, '$updatedConExp->organizationName', '$updatedConExp->organizationActivity', '$updatedConExp->fk_NMSStandard', 
                      '$updatedConExp->EAScope', '$updatedConExp->organization', '$updatedConExp->year', '$updatedConExp->fk_employee')";
                if ($this->connection->query($sql)) {
                    $message .= "New consulting experience « $updatedConExp->organizationName » added \n";
                } else {
                    $message .= "Error while adding new consulting experience « $updatedConExp->organizationName » \n";
                }
            } else {
                //if conexp already exist (update)
                $sql = "UPDATE consultingexperience SET organizationName = '$updatedConExp->organizationName', 
                          organizationActivity = '$updatedConExp->organizationActivity', fk_NMSStandard = '$updatedConExp->fk_NMSStandard', 
                          EAScope = '$updatedConExp->EAScope', organization = '$updatedConExp->organization', 
                          year = '$updatedConExp->year' WHERE consultingexperience.pk_consultingExperience = $updatedConExp->pk_consultingExperience";
                if ($this->connection->query($sql)) {
                    $message .= "Consulting experience with pk $updatedConExp->pk_consultingExperience updated \n";
                } else {
                    $message .= "Error while updating consulting experience with pk $updatedConExp->pk_consultingExperience \n";
                }
            }
        }
        foreach ($oldConsultingExperiences as $oldConsultingExperience) {
            $stillExist = false;
            foreach ($employee_consultingExperiences as $updatedConExp) {
                $message .= "updated pk" . $updatedConExp->pk_consultingExperience . "\n" . "old pk " . $oldConsultingExperience["pk_consultingExperience"] . "\n";
                if ($updatedConExp->pk_consultingExperience == $oldConsultingExperience["pk_consultingExperience"]) {
                    $stillExist = true;
                }
            }
            if (!$stillExist) {
                $sql = "DELETE FROM consultingexperience WHERE consultingexperience.pk_consultingExperience = " . $oldConsultingExperience["pk_consultingExperience"];
                if ($this->connection->query($sql)) {
                    $message .= "Consulting experience with pk " . $oldConsultingExperience["pk_consultingExperience"] . " deleted \n";
                } else {
                    $message .= "Error while deleting consulting experience with pk " . $oldConsultingExperience["pk_consultingExperience"] . "\n";
                }
            }
        }

        $this->connection->close();
        return $message;
    }

    public function empty_employee_consultingExperiences(DBConnection $db_connection, $pk_employee)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "DELETE FROM consultingexperience WHERE consultingexperience.fk_employee = " . $pk_employee;
        if ($this->connection->query($sql)) {
            $message .= "Consulting experiences with fk employee " . $pk_employee . " deleted \n";
        } else {
            $message .= "Error while deleting consulting experiences with fk employee " . $pk_employee . "\n";
        }

        $this->connection->close();
        return $message;
    }

    public function update_employee_auditExperiences(DBConnection $db_connection, $employee_auditExperiences)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "SELECT * FROM auditexperience WHERE auditexperience.fk_employee = " . $employee_auditExperiences[0]->fk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $oldAuditExperiences[] = $row;
            }
        }

        foreach ($employee_auditExperiences as $updatedAuditExp) {
            if ($updatedAuditExp->pk_auditExperience == null || $updatedAuditExp->pk_auditExperience == "0") {
                //if there's new auditexp (insiert)
                $sql = "INSERT INTO auditexperience (pk_auditExperience, organizationName, organizationActivity, fk_NMSStandard, EAScope, oc, year, fk_employee) 
                      VALUES (NULL, '$updatedAuditExp->organizationName', '$updatedAuditExp->organizationActivity', '$updatedAuditExp->fk_NMSStandard', 
                      '$updatedAuditExp->EAScope', '$updatedAuditExp->oc', '$updatedAuditExp->year', '$updatedAuditExp->fk_employee')";
                if ($this->connection->query($sql)) {
                    $message .= "New audit experience « $updatedAuditExp->organizationName » added \n";
                } else {
                    $message .= "Error while adding new audit experience « $updatedAuditExp->organizationName » \n";
                }
            } else {
                //if auditexp already exist (update)
                $sql = "UPDATE auditexperience SET organizationName = '$updatedAuditExp->organizationName', 
                          organizationActivity = '$updatedAuditExp->organizationActivity', fk_NMSStandard = '$updatedAuditExp->fk_NMSStandard', 
                          EAScope = '$updatedAuditExp->EAScope', oc = '$updatedAuditExp->oc', 
                          year = '$updatedAuditExp->year' WHERE auditexperience.pk_auditExperience = $updatedAuditExp->pk_auditExperience";
                if ($this->connection->query($sql)) {
                    $message .= "Audit experience with pk $updatedAuditExp->pk_auditExperience updated \n";
                } else {
                    $message .= "Error while updating audit experience with pk $updatedAuditExp->pk_auditExperience \n";
                }
            }
        }
        foreach ($oldAuditExperiences as $oldAuditExperience) {
            $stillExist = false;
            foreach ($employee_auditExperiences as $updatedAuditExp) {
                $message .= "updated pk" . $updatedAuditExp->pk_auditExperience . "\n" . "old pk " . $oldAuditExperience["pk_auditExperience"] . "\n";
                if ($updatedAuditExp->pk_auditExperience == $oldAuditExperience["pk_auditExperience"]) {
                    $stillExist = true;
                }
            }
            if (!$stillExist) {
                $sql = "DELETE FROM auditexperience WHERE auditexperience.pk_auditExperience = " . $oldAuditExperience["pk_auditExperience"];
                if ($this->connection->query($sql)) {
                    $message .= "Audit experience with pk " . $oldAuditExperience["pk_auditExperience"] . " deleted \n";
                } else {
                    $message .= "Error while deleting audit experience with pk " . $oldAuditExperience["pk_auditExperience"] . "\n";
                }
            }
        }

        $this->connection->close();
        return $message;
    }

    public function empty_employee_auditExperiences(DBConnection $db_connection, $pk_employee)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "DELETE FROM auditexperience WHERE auditexperience.fk_employee = " . $pk_employee;
        if ($this->connection->query($sql)) {
            $message .= "Audit experiences with fk employee " . $pk_employee . " deleted \n";
        } else {
            $message .= "Error while deleting audit experiences with fk employee " . $pk_employee . "\n";
        }

        $this->connection->close();
        return $message;
    }

    public function update_employee_auditObservations(DBConnection $db_connection, $employee_auditObservations)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "SELECT * FROM auditobservation WHERE auditobservation.fk_employee = " . $employee_auditObservations[0]->fk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $oldAuditObservations[] = $row;
            }
        }

        foreach ($employee_auditObservations as $updatedAuditObs) {
            if ($updatedAuditObs->pk_auditObservation == null || $updatedAuditObs->pk_auditObservation == "0") {
                //if there's new auditobs (insiert)
                $sql = "INSERT INTO auditobservation (pk_auditObservation, organization, observer, attachement, EAScope, comment, date, fk_employee) 
                      VALUES (NULL, '$updatedAuditObs->organization', '$updatedAuditObs->observer', '$updatedAuditObs->attachement', 
                      '$updatedAuditObs->EAScope', '$updatedAuditObs->comment', '$updatedAuditObs->date', '$updatedAuditObs->fk_employee')";
                if ($this->connection->query($sql)) {
                    $message .= "New audit observation « $updatedAuditObs->organization » added \n";
                } else {
                    $message .= "Error while adding new audit observation « $updatedAuditObs->organization » \n";
                }
            } else {
                //if auditobs already exist (update)
                $sql = "UPDATE auditobservation SET organization = '$updatedAuditObs->organization', observer = '$updatedAuditObs->observer', 
                      attachement = '$updatedAuditObs->attachement', comment = '$updatedAuditObs->comment', date = '$updatedAuditObs->date' 
                      WHERE auditobservation.pk_auditObservation = $updatedAuditObs->pk_auditObservation";
                if ($this->connection->query($sql)) {
                    $message .= "Audit experience with pk $updatedAuditObs->pk_auditObservation updated \n";
                } else {
                    $message .= "Error while updating audit experience with pk $updatedAuditObs->pk_auditObservation \n";
                }
            }
        }
        foreach ($oldAuditObservations as $oldAuditObservation) {
            $stillExist = false;
            foreach ($employee_auditObservations as $updatedAuditObs) {
                if ($updatedAuditObs->pk_auditObservation == $oldAuditObservation["pk_auditObservation"]) {
                    $stillExist = true;
                }
            }
            if (!$stillExist) {
                $sql = "DELETE FROM auditobservation WHERE auditobservation.pk_auditObservation = " . $oldAuditObservation["pk_auditObservation"];
                if ($this->connection->query($sql)) {
                    $message .= "Audit observation with pk " . $oldAuditObservation["pk_auditObservation"] . " deleted \n";
                } else {
                    $message .= "Error while deleting audit observation with pk " . $oldAuditObservation["pk_auditObservation"] . "\n";
                }
            }
        }

        $this->connection->close();
        return $message;
    }

    public function empty_employee_auditObservations(DBConnection $db_connection, $pk_employee)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "DELETE FROM auditobservation WHERE auditobservation.fk_employee = " . $pk_employee;
        if ($this->connection->query($sql)) {
            $message .= "Audit observations with fk employee " . $pk_employee . " deleted \n";
        } else {
            $message .= "Error while deleting audit observations with fk employee " . $pk_employee . "\n";
        }

        $this->connection->close();
        return $message;
    }

    public function update_employee_mandateSheets(DBConnection $db_connection, $employee_mandateSheets)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "SELECT * FROM mandatesheet WHERE mandatesheet.fk_employee = " . $employee_mandateSheets[0]->fk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $oldMandateSheets[] = $row;
            }
        }

        foreach ($employee_mandateSheets as $updatedMandateSheet) {
            if ($updatedMandateSheet->pk_mandateSheet == null || $updatedMandateSheet->pk_mandateSheet == "0") {
                //if there's new mandate sheet (insert)
                $sql = "INSERT INTO mandatesheet (pk_mandateSheet, organization, EAScope, date, fees, attachement, fk_employee) 
                      VALUES (NULL, '$updatedMandateSheet->organization', '$updatedMandateSheet->EAScope', '$updatedMandateSheet->date', 
                      '$updatedMandateSheet->fees', '$updatedMandateSheet->attachement', '$updatedMandateSheet->fk_employee')";
                if ($this->connection->query($sql)) {
                    $message .= "New mandate sheet « $updatedMandateSheet->organization » added \n";
                } else {
                    $message .= "Error while adding new mandate sheet « $updatedMandateSheet->organization » \n";
                }
            } else {
                //if mandate sheet already exist (update)
                $sql = "UPDATE mandatesheet SET organization = '$updatedMandateSheet->organization', EAScope = '$updatedMandateSheet->EAScope', 
                      date = '$updatedMandateSheet->date', fees = '$updatedMandateSheet->fees', attachement = '$updatedMandateSheet->attachement' 
                      WHERE mandatesheet.pk_mandateSheet = $updatedMandateSheet->pk_mandateSheet";
                if ($this->connection->query($sql)) {
                    $message .= "Mandate sheet with pk $updatedMandateSheet->pk_mandateSheet updated \n";
                } else {
                    $message .= "Error while updating mandate sheet with pk $updatedMandateSheet->pk_mandateSheet \n";
                }
            }
        }
        foreach ($oldMandateSheets as $oldMandateSheet) {
            $stillExist = false;
            foreach ($employee_mandateSheets as $updatedMandateSheet) {
                if ($updatedMandateSheet->pk_mandateSheet == $oldMandateSheet["pk_mandateSheet"]) {
                    $stillExist = true;
                }
            }
            if (!$stillExist) {
                $sql = "DELETE FROM mandatesheet WHERE mandatesheet.pk_mandateSheet = " . $oldMandateSheet["pk_mandateSheet"];
                if ($this->connection->query($sql)) {
                    $message .= "Mandate sheet with pk " . $oldMandateSheet["pk_mandateSheet"] . " deleted \n";
                } else {
                    $message .= "Error while deleting mandate sheet with pk " . $oldMandateSheet["pk_mandateSheet"] . "\n";
                }
            }
        }

        $this->connection->close();
        return $message;
    }

    public function empty_employee_mandateSheets(DBConnection $db_connection, $pk_employee)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "DELETE FROM mandatesheet WHERE mandatesheet.fk_employee = " . $pk_employee;
        if ($this->connection->query($sql)) {
            $message .= "Mandate sheet with fk employee " . $pk_employee . " deleted \n";
        } else {
            $message .= "Error while deleting mandate sheet with fk employee " . $pk_employee . "\n";
        }

        $this->connection->close();
        return $message;
    }

    public function update_employee_objectives(DBConnection $db_connection, $employee_objectives)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "SELECT * FROM objective WHERE objective.fk_employee = " . $employee_objectives[0]->fk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $oldObjectives[] = $row;
            }
        }

        foreach ($employee_objectives as $updatedObjective) {
            if ($updatedObjective->pk_objective == null || $updatedObjective->pk_objective == "0") {
                //if there's new objective (insert)
                $sql = "INSERT INTO objective (pk_objective, mediumLongTermObjectives, auditorStrategy, date, validate, fk_employee) 
                      VALUES (NULL, '$updatedObjective->mediumLongTermObjectives', '$updatedObjective->auditorStrategy', '$updatedObjective->date', 
                      '$updatedObjective->validate', '$updatedObjective->fk_employee')";
                if ($this->connection->query($sql)) {
                    $message .= "New objective « $updatedObjective->mediumLongTermObjectives » added \n";
                } else {
                    $message .= "Error while adding new objective « $updatedObjective->mediumLongTermObjectives » \n";
                }
            } else {
                //if objective already exist (update)
                $sql = "UPDATE objective SET mediumLongTermObjectives = '$updatedObjective->mediumLongTermObjectives', 
                      auditorStrategy = '$updatedObjective->auditorStrategy', date = '$updatedObjective->date', 
                      validate = '$updatedObjective->validate' WHERE objective.pk_objective = $updatedObjective->pk_objective";
                if ($this->connection->query($sql)) {
                    $message .= "Objective with pk $updatedObjective->pk_objective updated \n";
                } else {
                    $message .= "Error while updating objective with pk $updatedObjective->pk_objective \n";
                }
            }
        }
        foreach ($oldObjectives as $oldObjective) {
            $stillExist = false;
            foreach ($employee_objectives as $updatedObjective) {
                if ($updatedObjective->pk_objective == $oldObjective["pk_objective"]) {
                    $stillExist = true;
                }
            }
            if (!$stillExist) {
                $sql = "DELETE FROM objective WHERE objective.pk_objective = " . $oldObjective["pk_objective"];
                if ($this->connection->query($sql)) {
                    $message .= "Objective with pk " . $oldObjective["pk_objective"] . " deleted \n";
                } else {
                    $message .= "Error while deleting objective with pk " . $oldObjective["pk_objective"] . "\n";
                }
            }
        }

        $this->connection->close();
        return $message;
    }

    public function empty_employee_objectives(DBConnection $db_connection, $pk_employee)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "DELETE FROM objective WHERE objective.fk_employee = " . $pk_employee;
        if ($this->connection->query($sql)) {
            $message .= "Objective with fk employee " . $pk_employee . " deleted \n";
        } else {
            $message .= "Error while deleting objective with fk employee " . $pk_employee . "\n";
        }

        $this->connection->close();
        return $message;
    }

    private function checkUsername($username)
    {
        $sql = "SELECT username FROM employee";
        $result = mysqli_query($this->connection, $sql);
        $num = 0;

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["username"] == $username) {
                    $username .= $num;
                    $num++;
                }
            }
        }
        $this->connection->close();
        return $username;
    }

    public function get_userId(DBConnection $db_connection, $username)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT pk_employee FROM employee WHERE username = '$username'";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray = $row["pk_employee"];
            }
        }
        $this->connection->close();
        return $emparray;
    }

    public function update_password(DBConnection $db_connection, $employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "SELECT * FROM employee WHERE pk_employee = '$employee->pk_employee' AND password = '$employee->oldPassword'";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $sql = "UPDATE employee SET password = '$employee->newPassword' WHERE employee.pk_employee = $employee->pk_employee";
            if ($this->connection->query($sql)) {
                $message = 1;
            } else {
                $message = 2;
            }
        } else {
            $message = 3;
        }

        $this->connection->close();
        return $message;
    }

    public function is_admin(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT isAdmin FROM employee WHERE pk_employee = $pk_employee";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray = $row["isAdmin"];
            }
        }
        $this->connection->close();
        return $emparray;
    }

    public function create_dirs($pk_employee)
    {
        mkdir("../attachements/auditobservation/$pk_employee");
        mkdir("../attachements/criminalrecord/$pk_employee");
        mkdir("../attachements/cv/$pk_employee");
        mkdir("../attachements/formation/$pk_employee");
        mkdir("../attachements/internalqualification/$pk_employee");
        mkdir("../attachements/mandatesheet/$pk_employee");
        mkdir("../attachements/picture/$pk_employee");
        mkdir("../attachements/professionnalexperience/$pk_employee");
    }
}

?>