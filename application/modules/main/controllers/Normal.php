<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Normal extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model("normal_model" , "normal");
    }
    

    public function index()
    {
        $data = array(
            "title" => "หน้าใบเบิกเงินทดรองจ่าย"
        );
        getHead();
        getContent("normal/normal_index" , $data);
        getFooter();
    }

    public function addnew()
    {
        $data = array(
            "title" => "หน้าเพิ่มรายการ ใบเบิกเงินทดรองจ่าย"
        );
        getHead();
        getContent("normal/normal_addnew" , $data);
        getFooter();
    }

    public function getAcCodeList()
    {
        $this->normal->getAcCodeList();
    }

    public function saveDataNormalNew()
    {
        $this->normal->saveDataNormalNew();
    }

    public function saveDataNormalNew_edit()
    {
        $this->normal->saveDataNormalNew_edit();
    }

    public function normal_list()
    {
        $this->normal->normal_list();
    }

    public function normal_list_filter($startDate , $endDate , $company , $user , $dept , $status)
    {
        $this->normal->normal_list_filter($startDate , $endDate , $company , $user , $dept , $status);
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

    public function normal_viewfull_page($formcode , $formno)
    {
        $data = array(
            "title" => "หน้าแสดงข้อมูลฉบับเต็ม ใบขอเบิกจ่าย",
            "formcode" => $formcode,
            "formno" => $formno
        );
        getHead();
        getContent("normal/normal_viewfull" , $data);
        getFooter();
    }

    public function normal_getDataviewfull()
    {
        $this->normal->normal_getDataviewfull();
    }

    public function normal_edit_page($formcode , $formno)
    {
        $data = array(
            "title" => "หน้าแก้ไขข้อมูล ใบขอเบิกจ่าย",
            "formcode" => $formcode,
            "formno" => $formno
        );
        getHead();
        getContent("normal/normal_edit" , $data);
        getFooter();
    }

    public function delFile_edit_nor()
    {
        $this->normal->delFile_edit_nor();
    }

    
    public function cancel_nor()
    {
        $this->normal->cancel_nor();
    }

    public function save_checkbudget_nor()
    {
        $this->normal->save_checkbudget_nor();
    }

    public function getdata_checkbudget_nor()
    {
        $this->normal->getdata_checkbudget_nor();
    }

    public function checkpaygroup_nor()
    {
        $this->normal->checkpaygroup_nor();
    }

    public function getdata_approveGroup_nor()
    {
        $this->normal->getdata_approveGroup_nor();
    }

    public function saveManager_nor()
    {
        $this->normal->saveManager_nor();
    }

    public function getData_ManagerApproved_nor()
    {
        $this->normal->getData_ManagerApproved_nor();
    }

    public function savePayGroup_nor()
    {
        $this->normal->savePayGroup_nor();
    }

    public function saveAp_nor()
    {
        $this->normal->saveAp_nor();
    }

    public function getdata_apApprove_nor()
    {
        $this->normal->getdata_apApprove_nor();
    }

    public function saveAcc_nor()
    {
        $this->normal->saveAcc_nor();
    }

    public function getdata_accApprove_nor()
    {
        $this->normal->getdata_accApprove_nor();
    }

    public function getdata_financeApprove_nor()
    {
        $this->normal->getdata_financeApprove_nor();
    }

    public function saveFn_nor()
    {
        $this->normal->saveFn_nor();
    }

    public function getdata_userReceive_nor()
    {
        $this->normal->getdata_userReceive_nor();
    }

    public function saveUserReceive_nor()
    {
        $this->normal->saveUserReceive_nor();
    }

    public function getdata_userClearMoney()
    {
        $this->normal->getdata_userClearMoney();
    }

    public function saveUserclearmoney()
    {
        $this->normal->saveUserclearmoney();
    }

    public function checkUserClearFile()
    {
        $this->normal->checkUserClearFile();
    }

    public function getFile_userClearMoney()
    {
        $this->normal->getFile_userClearMoney();
    }

    public function delClearFile_edit()
    {
        $this->normal->delClearFile_edit();
    }

    public function getdata_financeClearMoney()
    {
        $this->normal->getdata_financeClearMoney();
    }

    public function editStatusUserclearmoney()
    {
        $this->normal->editStatusUserclearmoney();
    }

    public function saveFnClear()
    {
        $this->normal->saveFnClear();
    }

    public function getdata_apClearMoney()
    {
        $this->normal->getdata_apClearMoney();
    }

    public function saveApClear()
    {
        $this->normal->saveApClear();
    }

    public function getdata_accClearMoney()
    {
        $this->normal->getdata_accClearMoney();
    }

    public function saveAccClear()
    {
        $this->normal->saveAccClear();
    }

    public function saveManagerClear()
    {
        $this->normal->saveManagerClear();
    }


    public function getData_ManagerApprovedClear()
    {
        $this->normal->getData_ManagerApprovedClear();
    }


    public function savePayGroupClear()
    {
        $this->normal->savePayGroupClear();
    }

    public function getdata_financeClearMoney2()
    {
        $this->normal->getdata_financeClearMoney2();
    }

    public function saveFnClear2()
    {
        $this->normal->saveFnClear2();
    }

    public function saveUserReceiveClear()
    {
        $this->normal->saveUserReceiveClear();
    }

    public function getdata_userReceiveClear()
    {
        $this->normal->getdata_userReceiveClear();
    }

    public function getUserPermission_nor()
    {
        $this->normal->getUserPermission_nor();
    }

    public function loadDataForFilter_nor()
    {
        $this->normal->loadDataForFilter_nor();
    }


    public function normal_report()
    {
        $data = array(
            "title" => "หน้ารายงาน"
        );
        getHead();
        getContent("normal/normal_report" , $data);
        getFooter();
    }


    public function normal_reportlist_filter($startDate , $endDate , $company , $user , $dept , $status)
    {
        $this->normal->normal_reportlist_filter($startDate , $endDate , $company , $user , $dept , $status);
    }


    public function normal_printform($formcode , $formno)
    {
        require_once('TCPDF/tcpdf.php');
        $adv_mainData = getMaindataForPrintForm($formcode , $formno , "wdf");
        $adv_transData = getTransdataForPrintForm($formcode , "wdf" , "wdf");
        $data = array(
            "title" => "Print Form Normal",
            "formcode" => $formcode,
            "formno" => $formno,
            "adv_mainData" => $adv_mainData,
            "adv_transData" => $adv_transData
        );

        getContent("normal/normal_printform" , $data);
    }



    public function getNorCurrencyFromDb()
    {
        $this->normal->getNorCurrencyFromDb();
    }



}

/* End of file Controllername.php */
?>