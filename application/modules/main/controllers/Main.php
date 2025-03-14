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

    public function add_currency_page()
    {
        $data = array(
            "title" => "หน้าเพิ่มรายการ สกุลเงิน"
        );
        getHead();
        getContent("add_currency" , $data);
        getFooter();
    }

    public function load_accode_list()
    {
        $this->main->load_accode_list();
    }

    public function load_currency_list()
    {
        $this->main->load_currency_list();
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

    public function saveCurrencyTb()
    {
        $this->main->saveCurrencyTb();
    }

    public function saveEditCurrencyToDb()
    {
        $this->main->saveEditCurrencyToDb();
    }

    public function delAccode()
    {
        $this->main->delAccode();
    }

    public function delCurrency()
    {
        $this->main->delCurrency();
    }

    public function delAccodeM()
    {
        $this->main->delAccodeM();
    }

    public function getaccodeFromDb()
    {
        $this->main->getaccodeFromDb();
    }

    public function getCurrencyFromDb()
    {
        $this->main->getCurrencyFromDb();
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


    public function testemail()
    {
        require("PHPMailer_5.2.0/class.phpmailer.php");
        require("PHPMailer_5.2.0/class.smtp.php");
    
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->CharSet = "utf-8";  // ในส่วนนี้ ถ้าระบบเราใช้ tis-620 หรือ windows-874 สามารถแก้ไขเปลี่ยนได้
        $mail->SMTPDebug = 1;
        $mail->SMTPSecure = "ssl";                                    // set mailer to use SMTP
        $mail->Host = "smtp.zoho.com";  // specify main and backup server
        $mail->Port = 465; // พอร์ท
        $mail->SMTPAuth = true;     // turn on SMTP authentication
        $mail->Username = "admin@winnersmileestate.com"; // SMTP username
        $mail->Password = "Admin*1234"; // SMTP password
        $mail->From = "admin@winnersmileestate.com";
        $mail->FromName = "ทดสอบ Email";
    
    
        // foreach($to as $email){
        //     $mail->AddAddress($email);
        // }
    
        // foreach($cc as $email){
        //     $mail->AddCC($email);
        // }
    
        // $mail->AddAddress("chainarong_k@saleecolour.com");
        $mail->AddBCC("chainarong_k@saleecolour.com");
        // $mail->AddCC("chainarong_k@saleecolour.onmicrosoft.com");
    
        $mail->WordWrap = 50;                                 // set word wrap to 50 characters
        $mail->IsHTML(true);                                  // set email format to HTML
        $mail->Subject = "ทดสอบส่ง Email";
        $mail->Body = '
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Sarabun&display=swap");
    
            h3{
                font-family: Tahoma, sans-serif;
                font-size:14px;
            }
    
            table {
                font-family: Tahoma, sans-serif;
                font-size:14px;
                border-collapse: collapse;
                width: 90%;
              }
              
              td, th {
                border: 1px solid #ccc;
                text-align: left;
                padding: 8px;
              }
              
              tr:nth-child(even) {
                background-color: #F5F5F5;
              }
    
              .bghead{
                  text-align:center;
                  background-color:#D3D3D3;
              }
            </style>
        '.'ส่ง Email ได้แล้ว';
        
        $mail->send();
    }



}/* End of file Main.php */
?>