<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Class_name extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            "user_level_id" => array(
                "type" => "int",
                "constraint" => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            "keterangan" => array(
                "type" => "varchar",
                "constraint" => 25,
                "null" => false,
            ),
            "parent_user" => array(
                "type" => "int",
                "constraint" => 10,
                "null" => false,
                'unsigned' => TRUE,
            )
        ));
        $this->dbforge->add_key('user_level_id', TRUE);
        $this->dbforge->create_table('blog');
    }

    public function down()
    {
    }
}

/* End of file Class_name.php */
