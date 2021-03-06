<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model("main_model" , "main");
    }
    

    public function index()
    {
        $data = array(
            "title" => "Index page"
        );
        getHead();
        getContent("index" , $data);
        getFooter();
    }


    public function add_accode_page()
    {
        $data = array(
            "title" => "หน้าเพิ่มรายการ Account code"
        );
        getHead();
        getContent("add_accode" , $data);
        getFooter();
    }

    public function load_accode_list()
    {
        $this->main->load_accode_list();
    }

    public function load_accode_master()
    {
        $this->main->load_accode_master();
    }

    public function saveAcCodeTb()
    {
        $this->main->saveAcCodeTb();
    }

    public function saveEditAcCodeToDb()
    {
        $this->main->saveEditAcCodeToDb();
    }

    public function delAccode()
    {
        $this->main->delAccode();
    }

    public function delAccodeM()
    {
        $this->main->delAccodeM();
    }

    public function getaccodeFromDb()
    {
        $this->main->getaccodeFromDb();
    }

    public function getaccodeMFromDb()
    {
        $this->main->getaccodeMFromDb();
    }


    public function add_accodeM_page()
    {
        $data = array(
            "title" => "หน้าเพิ่มรายการทางบัญชี"
        );
        getHead();
        getContent("add_accode_master" , $data);
        getFooter();
    }


    public function load_accodeM_list()
    {
        $this->main->load_accodeM_list();
    }

    public function saveAcCodeMasterToDb()
    {
        $this->main->saveAcCodeMasterToDb();
    }


    public function saveEditAcCodeMToDb()
    {
        $this->main->saveEditAcCodeMToDb();
    }

    public function manageuser_permission()
    {
        $data = array(
            "title" => "หน้าบริหารจัดการ ผู้ใช้งานโปรแกรม (Beta)"
        );

        getHead();
        getContent("manage_user" , $data);
        getFooter();
    }

    public function getlist_userpermission()
    {
        $this->main->getlist_userpermission();
    }

    public function saveUserpermission()
    {
        $this->main->saveUserpermission();
    }

    public function getDataUserPermission()
    {
        $this->main->getDataUserPermission();
    }

    public function saveEditUserPermission()
    {
        $this->main->saveEditUserPermission();
    }

    public function getDataWaitApprove()
    {
        $this->main->getDataWaitApprove();
    }

    public function getUserApp()
    {
        $this->main->getUserApp();
    }



}/* End of file Main.php */
?>