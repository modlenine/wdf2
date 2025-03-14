<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model("salary_model" , "salary");
    }
    

    public function index()
    {
        $data = array(
            "title" => "หน้าใบเบิกจ่ายเงินเดือน"
        );
        getHead();
        getContent("salary/salary_index" , $data);
        getFooter();
    }

    public function addnew()
    {
        $data = array(
            "title" => "หน้าเพิ่มรายการ ใบเบิกจ่ายเงินเดือน"
        );
        getHead();
        getContent("salary/salary_addnew" , $data);
        getFooter();
    }

    public function getAcCodeList()
    {
        $this->salary->getAcCodeList();
    }

    public function saveDataSalaryNew()
    {
        $this->salary->saveDataSalaryNew();
    }

    public function saveDataSalaryNew_edit()
    {
        $this->salary->saveDataSalaryNew_edit();
    }

    public function salary_list()
    {
        $this->salary->salary_list();
    }

    public function salary_list_filter($startDate , $endDate , $company , $user , $dept , $status)
    {
        $this->salary->salary_list_filter($startDate , $endDate , $company , $user , $dept , $status);
    }

    public function testcode()
    {
        $countAppNow = countApprove("1001651634304" , "sc");
        $checkApproveStatus = 1;
        foreach($countAppNow->result() as $rs){
            echo $rs->apv_approve."<br>";
            if($rs->apv_approve == "อนุมัติ"){
                $checkApproveStatus = $checkApproveStatus*1;
            }else if($rs->apv_approve == "ไม่อนุมัติ"){
                $checkApproveStatus = $checkApproveStatus*0;
            }
        }
        echo $checkApproveStatus;
    }

    public function salary_viewfull_page($formcode , $formno)
    {
        $data = array(
            "title" => "หน้าแสดงข้อมูลฉบับเต็ม ใบเบิกจ่ายเงินเดือน",
            "formcode" => $formcode,
            "formno" => $formno
        );
        getHead();
        getContent("salary/salary_viewfull" , $data);
        getFooter();
    }

    public function salary_getDataviewfull()
    {
        $this->salary->salary_getDataviewfull();
    }

    public function salary_edit_page($formcode , $formno)
    {
        $data = array(
            "title" => "หน้าแก้ไขข้อมูล ใบเบิกจ่ายเงินเดือน",
            "formcode" => $formcode,
            "formno" => $formno
        );
        getHead();
        getContent("salary/salary_edit" , $data);
        getFooter();
    }

    public function delFile_edit_sal()
    {
        $this->salary->delFile_edit_sal();
    }

    
    public function cancel_sal()
    {
        $this->salary->cancel_sal();
    }

    public function save_checkbudget_sal()
    {
        $this->salary->save_checkbudget_sal();
    }

    public function getdata_checkbudget_sal()
    {
        $this->salary->getdata_checkbudget_sal();
    }

    public function checkpaygroup_sal()
    {
        $this->salary->checkpaygroup_sal();
    }

    public function getdata_approveGroup_sal()
    {
        $this->salary->getdata_approveGroup_sal();
    }

    public function saveManager_sal()
    {
        $this->salary->saveManager_sal();
    }

    public function getData_ManagerApproved_sal()
    {
        $this->salary->getData_ManagerApproved_sal();
    }

    public function savePayGroup_sal()
    {
        $this->salary->savePayGroup_sal();
    }

    public function saveAp_sal()
    {
        $this->salary->saveAp_sal();
    }

    public function getdata_apApprove_sal()
    {
        $this->salary->getdata_apApprove_sal();
    }

    public function saveAcc_sal()
    {
        $this->salary->saveAcc_sal();
    }

    public function getdata_accApprove_sal()
    {
        $this->salary->getdata_accApprove_sal();
    }

    public function getdata_financeApprove_sal()
    {
        $this->salary->getdata_financeApprove_sal();
    }

    public function saveFn_sal()
    {
        $this->salary->saveFn_sal();
    }

    public function getdata_userReceive_sal()
    {
        $this->salary->getdata_userReceive_sal();
    }

    public function saveUserReceive_sal()
    {
        $this->salary->saveUserReceive_sal();
    }


    public function getUserPermission_sal()
    {
        $this->salary->getUserPermission_sal();
    }

    public function getMaximumMoney_sal()
    {
        $this->salary->getMaximumMoney_sal();
    }


    public function loadDataForFilter_sal()
    {
        $this->salary->loadDataForFilter_sal();
    }


    public function salary_report()
    {
        $data = array(
            "title" => "หน้ารายงาน"
        );
        getHead();
        getContent("salary/salary_report" , $data);
        getFooter();
    }


    public function salary_reportlist_filter($startDate , $endDate , $company , $user , $dept , $status)
    {
        $this->salary->salary_reportlist_filter($startDate , $endDate , $company , $user , $dept , $status);
    }


    public function salary_printform($formcode , $formno)
    {
        require_once('TCPDF/tcpdf.php');
        $adv_mainData = getMaindataForPrintForm($formcode , $formno , "sal");
        $adv_transData = getTransdataForPrintForm($formcode , "sal" , "sal");
        $data = array(
            "title" => "Print Form Salary",
            "formcode" => $formcode,
            "formno" => $formno,
            "adv_mainData" => $adv_mainData,
            "adv_transData" => $adv_transData
        );

        getContent("salary/salary_printform" , $data);
    }


    public function getSalCurrencyFromDb()
    {
        $this->salary->getSalCurrencyFromDb();
    }


}

/* End of file Controllername.php */
?>