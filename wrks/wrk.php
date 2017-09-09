<?php
include("../beans/db_connection.php");
include("wrk_employee.php");
include("wrk_formation_type.php");
include("wrk_nmsstandard.php");
include("wrk_internal_qualification.php");

class Wrk
{
    private $db_connection;
    private $wrk_employee;
    private $wrk_formationtype;
    private $wrk_nmsstandard;
    private $wrk_internalqualification;

    public function __construct()
    {
        //dev
        $this->db_connection = new DBConnection("hrm_edelcert", "root", "root", "localhost");
        //prod
        //$this->db_connection = new BDConnection("speechme_speechmeeting", "speechme_root", "Emf+123", "localhost");
        $this->wrk_employee = new WrkEmployee();
        $this->wrk_formationtype = new WrkFormationType();
        $this->wrk_nmsstandard = new WrkNMSStandard();
        $this->wrk_internalqualification = new WrkInternalQualification();
    }

    public function get_employees_list()
    {
        return $this->wrk_employee->get_employees_list($this->db_connection);
    }

    public function get_employee_administration($pk_employee)
    {
        return $this->wrk_employee->get_employee_administration($this->db_connection, $pk_employee);
    }

    public function get_employee_formation($pk_employee)
    {
        return $this->wrk_employee->get_employee_formation($this->db_connection, $pk_employee);
    }

    public function get_employee_professionnalexperience($pk_employee)
    {
        return $this->wrk_employee->get_employee_professionnalexperience($this->db_connection, $pk_employee);
    }

    public function get_employee_consultingexperience($pk_employee)
    {
        return $this->wrk_employee->get_employee_consultingexperience($this->db_connection, $pk_employee);
    }

    public function get_employee_auditexperience($pk_employee)
    {
        return $this->wrk_employee->get_employee_auditexperience($this->db_connection, $pk_employee);
    }

    public function get_employee_internalqualification($pk_employee)
    {
        return $this->wrk_employee->get_employee_internalqualification($this->db_connection, $pk_employee);
    }

    public function get_employee_auditobservation($pk_employee)
    {
        return $this->wrk_employee->get_employee_auditobservation($this->db_connection, $pk_employee);
    }

    public function get_employee_objective($pk_employee)
    {
        return $this->wrk_employee->get_employee_objective($this->db_connection, $pk_employee);
    }

    public function get_employee_mandatesheet($pk_employee)
    {
        return $this->wrk_employee->get_employee_mandatesheet($this->db_connection, $pk_employee);
    }

    public function add_employee($employee)
    {
        $pk_employee = $this->wrk_employee->add_employee($this->db_connection, $employee);
        $this->wrk_internalqualification->add_default_internal_qualification($this->db_connection, $pk_employee);
        return $pk_employee;
    }

    public function get_formation_types_list()
    {
        return $this->wrk_formationtype->get_formation_types_list($this->db_connection);
    }

    public function get_nmsstandard_list()
    {
        return $this->wrk_nmsstandard->get_nmsstandard_list($this->db_connection);
    }

    public function get_internal_qualification_list($employee)
    {
        return $this->wrk_internalqualification->get_internal_qualification_list($this->db_connection, $employee);
    }

    public function delete_employee($pk_employee)
    {
        return $this->wrk_employee->delete_employee($this->db_connection, $pk_employee);
    }

    public function update_employee_admin($employee)
    {
        return $this->wrk_employee->update_employee_admin($this->db_connection, $employee);
    }

    public function update_employee_formations($employee_formations)
    {
        return $this->wrk_employee->update_employee_formations($this->db_connection, $employee_formations);
    }

    public function empty_employee_formations($pk_employee)
    {
        return $this->wrk_employee->empty_employee_formations($this->db_connection, $pk_employee);
    }

    public function update_employee_professionnalExperiences($employee_professionnalExperience)
    {
        return $this->wrk_employee->update_employee_professionnalExperiences($this->db_connection, $employee_professionnalExperience);
    }

    public function empty_employee_professionnalExperiences($pk_employee)
    {
        return $this->wrk_employee->empty_employee_professionnalExperiences($this->db_connection, $pk_employee);
    }

    public function update_employee_consultingExperiences($employee_consultingExperiences)
    {
        return $this->wrk_employee->update_employee_consultingExperiences($this->db_connection, $employee_consultingExperiences);
    }

    public function empty_employee_consultingExperiences($pk_employee)
    {
        return $this->wrk_employee->empty_employee_consultingExperiences($this->db_connection, $pk_employee);
    }
}


?>