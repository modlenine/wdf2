<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Po extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model("Po_model" , "po");
    }
    

    public function index()
    {
        $data = array(
            "title" => "หน้าใบเบิกเงินผ่าน PO"
        );
        getHead();
        getContent("po/po_index" , $data);
        getFooter();
    }

    public function addnew()
    {
        $data = array(
            "title" => "หน้าเพิ่มรายการ ใบเบิกขอเบิกจ่าย (PO)"
        );
        getHead();
        getContent("po/po_addnew" , $data);
        getFooter();
    }

    public function getAcCodeList()
    {
        $this->po->getAcCodeList();
    }



    public function saveDataPoNew()
    {
        $this->po->saveDataPoNew();
    }

    public function uploadImageDropzone()
    {
        $this->po->uploadImageDropzone();
    }

    public function saveDataPoNew_edit()
    {
        $this->po->saveDataPoNew_edit();
    }

    public function po_list()
    {
        $this->po->po_list();
    }

    public function po_list_filter($startDate , $endDate , $company , $user , $dept , $status)
    {
        $this->po->po_list_filter($startDate , $endDate , $company , $user , $dept , $status);
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

    public function po_viewfull_page($formcode , $formno)
    {
        $data = array(
            "title" => "หน้าแสดงข้อมูลฉบับเต็ม ใบขอเบิกจ่าย (PO)",
            "formcode" => $formcode,
            "formno" => $formno
        );
        getHead();
        getContent("po/po_viewfull" , $data);
        getFooter();
    }

    public function po_getDataviewfull()
    {
        $this->po->po_getDataviewfull();
    }

    public function po_edit_page($formcode , $formno)
    {
        $data = array(
            "title" => "หน้าแก้ไขข้อมูล ใบขอเบิกจ่าย (PO)",
            "formcode" => $formcode,
            "formno" => $formno
        );
        getHead();
        getContent("po/po_edit" , $data);
        getFooter();
    }

    public function delFile_edit_po()
    {
        $this->po->delFile_edit_po();
    }

    
    public function cancel_po()
    {
        $this->po->cancel_po();
    }



    public function saveManager_po()
    {
        $this->po->saveManager_po();
    }

    public function getData_ManagerApproved_po()
    {
        $this->po->getData_ManagerApproved_po();
    }

 

    public function saveAp_po()
    {
        $this->po->saveAp_po();
    }

    public function getdata_apApprove_po()
    {
        $this->po->getdata_apApprove_po();
    }

    public function saveAcc_po()
    {
        $this->po->saveAcc_po();
    }

    public function getdata_accApprove_po()
    {
        $this->po->getdata_accApprove_po();
    }

    public function getdata_financeApprove_po()
    {
        $this->po->getdata_financeApprove_po();
    }

    public function saveFn_po()
    {
        $this->po->saveFn_po();
    }

    public function uploadfileFnSec()
    {
        $this->po->uploadfileFnSec();
    }



    public function getUserPermission_po()
    {
        $this->po->getUserPermission_po();
    }


    public function loadDataForFilter_po()
    {
        $this->po->loadDataForFilter_po();
    }


    public function po_report()
    {
        $data = array(
            "title" => "หน้ารายงาน"
        );
        getHead();
        getContent("po/po_report" , $data);
        getFooter();
    }


    public function po_reportlist_filter($startDate , $endDate , $company , $user , $dept , $status)
    {
        $this->po->po_reportlist_filter($startDate , $endDate , $company , $user , $dept , $status);
    }


    public function po_printform($formcode , $formno)
    {
        require_once('TCPDF/tcpdf.php');
        $adv_mainData = getMaindataForPrintForm($formcode , $formno , "po");
        $adv_transData = getTransdataForPrintForm($formcode , "po" , "po");
        $data = array(
            "title" => "Print Form Po",
            "formcode" => $formcode,
            "formno" => $formno,
            "adv_mainData" => $adv_mainData,
            "adv_transData" => $adv_transData
        );

        getContent("po/po_printform" , $data);
    }


    public function getPoCurrencyFromDb()
    {
        $this->po->getPoCurrencyFromDb();
    }


    public function uploadfile()
    {
        $this->load->view("po/uploadfile");
    }

    public function del_file_fnSec()
    {
        $this->po->del_file_fnSec();
    }

    public function getVendinformation()
    {
        $this->po->getVendinformation();
    }

    public function getPoByVendor()
    {
        $this->po->getPoByVendor();
    }

    public function getPoDetail()
    {
        $this->po->getPoDetail();
    }


}

/* End of file Controllername.php */




?>