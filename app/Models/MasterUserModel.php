<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterUserModel extends Model
{
    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
    }

    public function getCourse() {

       $query = $this->db->query('select course_id, course_name from master_course order by course_name');
       return $query->getResult();
    }

    public function getCourseName($course_id) {
        $result = $this->db->query('select  course_name from master_course where course_id = \''.$course_id.'\'')->getRow()->course_name;
       return $result;
    }
    
    public function getUserByOrg($org) {
        $table = new \CodeIgniter\View\Table();

        $builder = $this->db->table('master_user');
        $builder->select('concat(first_name,\' \',last_name) as name, email_id, org_name, designation, phone_no,created_date');
        $builder->where('org_name', $org);
        $query = $builder->get();
    
        $template = [
            'table_open' => '<table id="tbl-result" class="display dataTable">'
        
        ];
        $table->setTemplate($template);
        $table->setHeading('Name', 'Email ID', 'Organisation', 'Designation', 'Contact No.', 'Created Date');

           return $table->generate($query);
    }
    

    public function getUserByMinistry($org) {
        $table = new \CodeIgniter\View\Table();

        $builder = $this->db->table('master_user');
        $builder->select('concat(first_name,\' \',last_name) as name, email_id, org_name, designation, phone_no,created_date');
        $builder->join('master_st', 'master_user.user_id = user_enrolment_course.user_id ');
        $builder->where('org_name', $org);
        $query = $builder->get();
    
        $template = [
            'table_open' => '<table id="tbl-result" class="display dataTable">'
        
        ];
        $table->setTemplate($template);
        $table->setHeading('Name', 'Email ID', 'Organisation', 'Designation', 'Contact No.', 'Created Date');

           return $table->generate($query);
    }
    

}
?>