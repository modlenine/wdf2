<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Advance extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model("advance_model" , "advance");
    }
    

    public function index()
    {
        $data = array(
            "title" => "หน้าใบเบิกเงินทดรองจ่าย"
        );
        getHead();
        getContent("advance/advance_index" , $data);
        getFooter();
    }

    public function get_wdfdatalist_json()
    {
        $doctype = "adv";
        $ecode = getUser()->ecode;
        get_wdfdatalist($doctype ,$ecode);
    }

    public function addnew()
    {
        $data = array(
            "title" => "หน้าเพิ่มรายการ ใบเบิกเงินทดรองจ่าย"
        );
        getHead();
        getContent("advance/advance_addnew" , $data);
        getFooter();
    }

    public function getAcCodeList()
    {
        $this->advance->getAcCodeList();
    }

    public function saveDataAdvanceNew()
    {
        $this->advance->saveDataAdvanceNew();
    }

    public function saveDataAdvanceNew_edit()
    {
        $this->advance->saveDataAdvanceNew_edit();
    }

    public function advance_list()
    {
        $this->advance->advance_list();
    }

    public function advance_list_filter($startDate , $endDate , $company , $user , $dept , $status)
    {
        $this->advance->advance_list_filter($startDate , $endDate , $company , $user , $dept , $status);
    }

    public function testcode()
    {

        echo getEmail_manager("1001697609175" , "ADV2310000123" , 1007 , "sc")->row()->memberemail;

    }

    public function advance_viewfull_page($formcode , $formno)
    {
        $data = array(
            "title" => "หน้าแสดงข้อมูลฉบับเต็ม ใบเบิกเงินสำรองจ่าย",
            "formcode" => $formcode,
            "formno" => $formno
        );
        getHead();
        getContent("advance/advance_viewfull" , $data);
        getFooter();
    }

    public function advance_getDataviewfull()
    {
        $this->advance->advance_getDataviewfull();
    }

    public function advance_edit_page($formcode , $formno)
    {
        $data = array(
            "title" => "หน้าแก้ไขข้อมูล ใบเบิกเงินสำรองจ่าย",
            "formcode" => $formcode,
            "formno" => $formno
        );
        getHead();
        getContent("advance/advance_edit" , $data);
        getFooter();
    }

    public function delFile_edit()
    {
        $this->advance->delFile_edit();
    }

    
    public function cancel_adv()
    {
        $this->advance->cancel_adv();
    }

    public function save_checkbudget()
    {
        $this->advance->save_checkbudget();
    }

    public function getdata_checkbudget()
    {
        $this->advance->getdata_checkbudget();
    }

    public function checkpaygroup()
    {
        $this->advance->checkpaygroup();
    }

    public function getdata_approveGroup()
    {
        $this->advance->getdata_approveGroup();
    }

    public function saveManager()
    {
        $this->advance->saveManager();
    }

    public function getData_ManagerApproved()
    {
        $this->advance->getData_ManagerApproved();
    }

    public function savePayGroup()
    {
        $this->advance->savePayGroup();
    }

    public function saveAp()
    {
        $this->advance->saveAp();
    }

    public function getdata_apApprove()
    {
        $this->advance->getdata_apApprove();
    }

    public function saveAcc()
    {
        $this->advance->saveAcc();
    }

    public function getdata_accApprove()
    {
        $this->advance->getdata_accApprove();
    }

    public function getdata_financeApprove()
    {
        $this->advance->getdata_financeApprove();
    }

    public function saveFn()
    {
        $this->advance->saveFn();
    }

    public function getdata_userReceive()
    {
        $this->advance->getdata_userReceive();
    }

    public function saveUserReceive()
    {
        $this->advance->saveUserReceive();
    }

    public function getdata_userClearMoney()
    {
        $this->advance->getdata_userClearMoney();
    }

    public function saveUserclearmoney()
    {
        $this->advance->saveUserclearmoney();
    }

    public function checkUserClearFile()
    {
        $this->advance->checkUserClearFile();
    }

    public function getFile_userClearMoney()
    {
        $this->advance->getFile_userClearMoney();
    }

    public function delClearFile_edit()
    {
        $this->advance->delClearFile_edit();
    }

    public function getdata_financeClearMoney()
    {
        $this->advance->getdata_financeClearMoney();
    }

    public function editStatusUserclearmoney()
    {
        $this->advance->editStatusUserclearmoney();
    }

    public function saveFnClear()
    {
        $this->advance->saveFnClear();
    }

    public function getdata_apClearMoney()
    {
        $this->advance->getdata_apClearMoney();
    }

    public function saveApClear()
    {
        $this->advance->saveApClear();
    }

    public function getdata_accClearMoney()
    {
        $this->advance->getdata_accClearMoney();
    }

    public function saveAccClear()
    {
        $this->advance->saveAccClear();
    }

    public function saveManagerClear()
    {
        $this->advance->saveManagerClear();
    }


    public function getData_ManagerApprovedClear()
    {
        $this->advance->getData_ManagerApprovedClear();
    }


    public function savePayGroupClear()
    {
        $this->advance->savePayGroupClear();
    }

    public function getdata_financeClearMoney2()
    {
        $this->advance->getdata_financeClearMoney2();
    }

    public function saveFnClear2()
    {
        $this->advance->saveFnClear2();
    }

    public function saveUserReceiveClear()
    {
        $this->advance->saveUserReceiveClear();
    }

    public function getdata_userReceiveClear()
    {
        $this->advance->getdata_userReceiveClear();
    }

    public function getUserPermission()
    {
        $this->advance->getUserPermission();
    }

    public function loadDataForFilter()
    {
        $this->advance->loadDataForFilter();
    }

    public function advance_report()
    {
        $data = array(
            "title" => "หน้ารายงาน"
        );
        getHead();
        getContent("advance/advance_report" , $data);
        getFooter();
    }

    public function advance_reportlist_filter($startDate , $endDate , $company , $user , $dept , $status)
    {
        $this->advance->advance_reportlist_filter($startDate , $endDate , $company , $user , $dept , $status);
    }

    public function advance_printform($formcode , $formno)
    {
        require_once('TCPDF/tcpdf.php');
        $adv_mainData = getMaindataForPrintForm($formcode , $formno , "adv");
        $adv_transData = getTransdataForPrintForm($formcode , "adv" , "null");
        $adv_transDataClear = getTransdataForPrintForm($formcode , "adv" , "clear");
        $data = array(
            "title" => "Print Form Advance",
            "formcode" => $formcode,
            "formno" => $formno,
            "adv_mainData" => $adv_mainData,
            "adv_transData" => $adv_transData,
            "adv_transDataClear" => $adv_transDataClear,
        );

        getContent("advance/advance_printform" , $data);
    }

    public function getAdvCurrencyFromDb()
    {
        $this->advance->getAdvCurrencyFromDb();
    }



}

/* End of file Controllername.php */
?>