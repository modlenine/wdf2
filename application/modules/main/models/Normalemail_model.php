<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Normalemail_model extends CI_Model
{

   public function __construct()
   {
      parent::__construct();
      //Do your magic here
      date_default_timezone_set("Asia/Bangkok");
   }



   function createQrcode_nor($linkQrcode, $id)
   {
      // $obj = new emailfn();
      // $obj->gci()->load->library("Ciqrcode");
      require("phpqrcode/qrlib.php");
      // $this->load->library('phpqrcode/qrlib');

      $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'] . '/intsys/wdf2/uploads/qrcode/';
      $urlQrcode = $linkQrcode;
      // $filename1 = 'qrcode' . rand(2, 200) . ".png";
      $filename1 = 'qrcode' . $id . ".png";
      $folder = $SERVERFILEPATH;

      $filename = $folder . $filename1;

      QRcode::png(
         $urlQrcode,
         $filename,
         // $outfile = false,
         $level = QR_ECLEVEL_H,
         $size = 4,
         $margin = 2
      );

      // echo "<img src='http://192.190.10.27/crf/upload/qrcode/".$filename1."'>";
      return $filename1;
   }



   // ส่ง Email หาบัญชีเพื่อตรวจสอบ Budget
   public function send_tobudget($formcode , $formno)
   {
      $subject = "[$formno] มีรายการใบขอเบิกจ่าย (Normal) ใหม่รอตรวจสอบวงเงิน";
      $short_url = base_url('normal_view.html/') . $formcode."/".$formno;
      $emaildata = getDataForEmail($formcode , $formno , "wdf");

      $body = '
         <h2>รายการใบขอเบิกจ่าย (Normal) ใหม่รอตรวจสอบวงเงิน</h2>
         <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . $emaildata->wdf_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_datetime) . '</td>
         </tr>


         <tr>
            <td><strong>บริษัท</strong></td>
            <td>' . conAreaidtoName($emaildata->wdf_areaid) . '</td>
            <td><strong>ผู้ขอ</strong></td>
            <td>' . $emaildata->wdf_user . '</td>
         </tr>


         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . $emaildata->wdf_ecode . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . $emaildata->wdf_dept . '</td>
         </tr>

         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('normal_view.html/') . $formcode."/".$formno . '">' . $formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('uploads/qrcode/') . $this->createQrcode_nor($short_url,$formno) . '"></td>
         </tr>


         </table>
         ';

      $to = "";
      $cc = "";

      //  Email Zone
      $optionTo = getEmail_acc_BySection("u_budget_section");

      $ecodeAr = array();
      $ecodeccAr = array();

      $to = array();
      foreach ($optionTo->result_array() as $result) {
         $to[] = $result['u_email'];
         $ecodeAr[] = $result['u_ecode'];
      }


      $optioncc = getEmail_onMemberTbl("('$emaildata->wdf_ecode')");
      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
         $ecodeccAr[] = $resultcc['ecode'];
      }

      $to = array_unique($to);
      $cc = array_unique($cc);
      $ecodeAr = array_unique($ecodeAr);
      $ecodeccAr = array_unique($ecodeccAr);

      emailSaveData($subject, $body, $to, $cc);
      //  Email Zone

      // Notification center program
      $ecodeActionArr = $ecodeAr;
      $ecodeReadArr = $ecodeccAr;

      $title = $subject;
      $status = $emaildata->wdf_status;
      $link = base_url('normal_view.html/') . $formcode."/".$formno;
      $programname = "WDF";

      $this->notifycenter->insertdataaction_template($ecodeActionArr , $title , $status , $link , $formno , $programname);
      $this->notifycenter->insertdataRead_template($ecodeReadArr , $title , $status , $link , $formno , $programname);
   }
   // ส่ง Email หาบัญชีเพื่อตรวจสอบ Budget



   // ส่ง Email To Manager
   public function send_to_manager($formcode , $formno)
   {
      $subject = "[$formno] มีรายการใบขอเบิกจ่าย (Normal) ใหม่ รอผู้จัดการอนุมัติ";
      $short_url = base_url('normal_view.html/') . $formcode."/".$formno;
      $emaildata = getDataForEmail($formcode , $formno , "wdf");

      $body = '
         <h2>รายการใบขอเบิกจ่าย (Normal) ใหม่ รอผู้จัดการอนุมัติ</h2>
         <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . $emaildata->wdf_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_datetime) . '</td>
         </tr>


         <tr>
            <td><strong>บริษัท</strong></td>
            <td>' . conAreaidtoName($emaildata->wdf_areaid) . '</td>
            <td><strong>ผู้ขอ</strong></td>
            <td>' . $emaildata->wdf_user . '</td>
         </tr>


         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . $emaildata->wdf_ecode . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . $emaildata->wdf_dept . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผลการตรวจสอบวงเงิน จากบัญชี</strong></td>
         </tr>
         <tr>
            <td><strong>วงเงินคงเหลือ</strong></td>
            <td colspan="3">' . number_format($emaildata->wdf_bg_creditlimit, 2)  . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_bg_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_bg_datetime) . '</td>
         </tr>



         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('normal_view.html/') . $formcode."/".$formno . '">' . $formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('uploads/qrcode/') . $this->createQrcode_nor($short_url,$formno) . '"></td>
         </tr>


         </table>
         ';

      $to = "";
      $cc = "";

      //  Email Zone
      $optionTo = getEmail_manager($formcode , $formno , $emaildata->wdf_deptcode , $emaildata->wdf_areaid);

      $ecodeAr = array();
      $ecodeccAr = array();

      $to = array();
      foreach ($optionTo->result_array() as $result) {
         $to[] = $result['memberemail'];
         $ecodeAr[] = $result['ecode'];
      }


      $optioncc = getEmail_onMemberTbl("('$emaildata->wdf_ecode')");
      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
         $ecodeccAr[] = $resultcc['ecode'];
      }

      $to = array_unique($to);
      $cc = array_unique($cc);
      $ecodeAr = array_unique($ecodeAr);
      $ecodeccAr = array_unique($ecodeccAr);

      emailSaveData($subject, $body, $to, $cc);
      //  Email Zone

      // Notification center program
      $ecodeActionArr = $ecodeAr;
      $ecodeReadArr = $ecodeccAr;

      $title = $subject;
      $status = $emaildata->wdf_status;
      $link = base_url('normal_view.html/') . $formcode."/".$formno;
      $programname = "WDF";

      $this->notifycenter->insertdataaction_template($ecodeActionArr , $title , $status , $link , $formno , $programname);
      $this->notifycenter->insertdataRead_template($ecodeReadArr , $title , $status , $link , $formno , $programname);
   }
   // ส่ง Email To Manager



   // ส่ง Email To AP Pay Group = 5
   public function send_to_ap($formcode , $formno)
   {
      $subject = "[$formno] มีรายการใบขอเบิกจ่าย (Normal) ใหม่ รอบัญชี(AP)ตรวจสอบ";
      $short_url = base_url('normal_view.html/') . $formcode."/".$formno;
      $emaildata = getDataForEmail($formcode , $formno , "wdf");

      $body = '
         <h2>รายการใบขอเบิกจ่าย (Normal) ใหม่ รอบัญชี(AP)ตรวจสอบ</h2>
         <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . $emaildata->wdf_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_datetime) . '</td>
         </tr>


         <tr>
            <td><strong>บริษัท</strong></td>
            <td>' . conAreaidtoName($emaildata->wdf_areaid) . '</td>
            <td><strong>ผู้ขอ</strong></td>
            <td>' . $emaildata->wdf_user . '</td>
         </tr>


         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . $emaildata->wdf_ecode . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . $emaildata->wdf_dept . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผลการตรวจสอบวงเงิน จากบัญชี</strong></td>
         </tr>
         <tr>
            <td><strong>วงเงินคงเหลือ</strong></td>
            <td colspan="3">' . number_format($emaildata->wdf_bg_creditlimit, 2)  . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_bg_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_bg_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก ผู้จัดการฝ่าย</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_appr . '</td>
         </tr>
         <tr>
            <td><strong>เหตุผล</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_mgr_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_mgr_datetime) . '</td>
         </tr>



         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('normal_view.html/') . $formcode."/".$formno . '">' . $formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('uploads/qrcode/') . $this->createQrcode_nor($short_url,$formno) . '"></td>
         </tr>


         </table>
         ';

      $to = "";
      $cc = "";

      //  Email Zone
      $optionTo = getEmail_acc_BySection("u_ap_section");

      $ecodeAr = array();
      $ecodeccAr = array();

      $to = array();
      foreach ($optionTo->result_array() as $result) {
         $to[] = $result['u_email'];
         $ecodeAr[] = $result['u_ecode'];
      }


      $optioncc = getEmail_onMemberTbl("('$emaildata->wdf_ecode')");
      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
         $ecodeccAr[] = $resultcc['ecode'];
      }

      $to = array_unique($to);
      $cc = array_unique($cc);
      $ecodeAr = array_unique($ecodeAr);
      $ecodeccAr = array_unique($ecodeccAr);

      emailSaveData($subject, $body, $to, $cc);
      //  Email Zone

      // Notification center program
      $ecodeActionArr = $ecodeAr;
      $ecodeReadArr = $ecodeccAr;

      $title = $subject;
      $status = $emaildata->wdf_status;
      $link = base_url('normal_view.html/') . $formcode."/".$formno;
      $programname = "WDF";

      $this->notifycenter->insertdataaction_template($ecodeActionArr , $title , $status , $link , $formno , $programname);
      $this->notifycenter->insertdataRead_template($ecodeReadArr , $title , $status , $link , $formno , $programname);
   }
   // ส่ง Email To AP Pay Group = 5


   // ส่ง Email To Excutive Pay Group = 4 , 3 , 2 , 1
   public function send_to_excutive($formcode , $formno)
   {
      
      $short_url = base_url('normal_view.html/') . $formcode."/".$formno;
      $emaildata = getDataForEmail($formcode , $formno , "wdf");

      $subject = "[$formno] มีรายการใบขอเบิกจ่าย (Normal) ใหม่ รอผู้บริหารกลุ่ม $emaildata->wdf_appgroup อนุมัติ";

      $body = '
         <h2>รายการใบขอเบิกจ่าย (Normal) ใหม่ รอผู้บริหารกลุ่ม '.$emaildata->wdf_appgroup.' อนุมัติ</h2>
         <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . $emaildata->wdf_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_datetime) . '</td>
         </tr>


         <tr>
            <td><strong>บริษัท</strong></td>
            <td>' . conAreaidtoName($emaildata->wdf_areaid) . '</td>
            <td><strong>ผู้ขอ</strong></td>
            <td>' . $emaildata->wdf_user . '</td>
         </tr>


         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . $emaildata->wdf_ecode . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . $emaildata->wdf_dept . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผลการตรวจสอบวงเงิน จากบัญชี</strong></td>
         </tr>
         <tr>
            <td><strong>วงเงินคงเหลือ</strong></td>
            <td colspan="3">' . number_format($emaildata->wdf_bg_creditlimit, 2)  . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_bg_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_bg_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก ผู้จัดการฝ่าย</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_appr . '</td>
         </tr>
         <tr>
            <td><strong>เหตุผล</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_mgr_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_mgr_datetime) . '</td>
         </tr>';


      $body .='
         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('normal_view.html/') . $formcode."/".$formno . '">' . $formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('uploads/qrcode/') . $this->createQrcode_nor($short_url,$formno) . '"></td>
         </tr>


         </table>
         ';

      $to = "";
      $cc = "";

      //  Email Zone

      // if($emaildata->wdf_appgroup == 4){
      //    $optionTo = getDataAppUser($emaildata->wdf_appgroup , $formcode , $emaildata->wdf_areaid);
      // }
      $optionTo = getDataAppUser($emaildata->wdf_appgroup , $formcode , $emaildata->wdf_areaid);

      $ecodeAr = array();
      $ecodeccAr = array();

      $to = array();
      foreach ($optionTo->result_array() as $result) {
         $to[] = $result['apv_email'];
         $ecodeAr[] = $result['apv_ecode'];
      }


      $optioncc = getEmail_onMemberTbl("('$emaildata->wdf_ecode')");
      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
         $ecodeccAr[] = $resultcc['ecode'];
      }

      $to = array_unique($to);
      $cc = array_unique($cc);
      $ecodeAr = array_unique($ecodeAr);
      $ecodeccAr = array_unique($ecodeccAr);

      emailSaveData($subject, $body, $to, $cc);
      //  Email Zone

      // Notification center program
      $ecodeActionArr = $ecodeAr;
      $ecodeReadArr = $ecodeccAr;

      $title = $subject;
      $status = $emaildata->wdf_status;
      $link = base_url('normal_view.html/') . $formcode."/".$formno;
      $programname = "WDF";

      $this->notifycenter->insertdataaction_template($ecodeActionArr , $title , $status , $link , $formno , $programname);
      $this->notifycenter->insertdataRead_template($ecodeReadArr , $title , $status , $link , $formno , $programname);
   }
   // ส่ง Email To Excutive Pay Group = 5


   // ส่ง Email To AP Pay Group = 4 , 3 , 2 , 1
   public function send_to_apExcutive($formcode , $formno)
   {
      
      $short_url = base_url('normal_view.html/') . $formcode."/".$formno;
      $emaildata = getDataForEmail($formcode , $formno , "wdf");

      $subject = "[$formno] มีรายการใบขอเบิกจ่าย (Normal) ใหม่ รอบัญชี(AP)ตรวจสอบ";

      $body = '
         <h2>รายการใบขอเบิกจ่าย (Normal) ใหม่ รอบัญชี(AP)ตรวจสอบ</h2>
         <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . $emaildata->wdf_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_datetime) . '</td>
         </tr>


         <tr>
            <td><strong>บริษัท</strong></td>
            <td>' . conAreaidtoName($emaildata->wdf_areaid) . '</td>
            <td><strong>ผู้ขอ</strong></td>
            <td>' . $emaildata->wdf_user . '</td>
         </tr>


         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . $emaildata->wdf_ecode . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . $emaildata->wdf_dept . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผลการตรวจสอบวงเงิน จากบัญชี</strong></td>
         </tr>
         <tr>
            <td><strong>วงเงินคงเหลือ</strong></td>
            <td colspan="3">' . number_format($emaildata->wdf_bg_creditlimit, 2)  . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_bg_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_bg_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก ผู้จัดการฝ่าย</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_appr . '</td>
         </tr>
         <tr>
            <td><strong>เหตุผล</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_mgr_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_mgr_datetime) . '</td>
         </tr>';

         $queryDataExcutive = getDataApprovedUser($emaildata->wdf_appgroup , $formcode , $emaildata->wdf_areaid);
         foreach($queryDataExcutive->result() as $rs){
            $body .='
            
            <tr>
               <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก '.$rs->apv_posiname.'</strong></td>
            </tr>
            <tr>
               <td><strong>ผลการอนุมัติ</strong></td>
               <td colspan="3">' . $rs->apv_approve . '</td>
            </tr>
            <tr>
               <td><strong>เหตุผล</strong></td>
               <td colspan="3">' . $rs->apv_approve_memo . '</td>
            </tr>
            <tr>
               <td><strong>ผู้อนุมัติ</strong></td>
               <td>' . $rs->apv_approve_user . '</td>
               <td><strong>ลงวันที่</strong></td>
               <td>' . conDateTimeFromDb($rs->apv_approve_datetime) . '</td>
            </tr>
            
            ';
         }


      $body .='
         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('normal_view.html/') . $formcode."/".$formno . '">' . $formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('uploads/qrcode/') . $this->createQrcode_nor($short_url,$formno) . '"></td>
         </tr>


         </table>
         ';

      $to = "";
      $cc = "";

      //  Email Zone
      $optionTo = getEmail_acc_BySection("u_ap_section");

      $ecodeAr = array();
      $ecodeccAr = array();

      $to = array();
      foreach ($optionTo->result_array() as $result) {
         $to[] = $result['u_email'];
         $ecodeAr[] = $result['u_ecode'];
      }


      $optioncc = getEmail_onMemberTbl("('$emaildata->wdf_ecode')");
      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
         $ecodeccAr[] = $resultcc['ecode'];
      }

      $to = array_unique($to);
      $cc = array_unique($cc);
      $ecodeAr = array_unique($ecodeAr);
      $ecodeccAr = array_unique($ecodeccAr);

      emailSaveData($subject, $body, $to, $cc);
      //  Email Zone

      // Notification center program
      $ecodeActionArr = $ecodeAr;
      $ecodeReadArr = $ecodeccAr;

      $title = $subject;
      $status = $emaildata->wdf_status;
      $link = base_url('normal_view.html/') . $formcode."/".$formno;
      $programname = "WDF";

      $this->notifycenter->insertdataaction_template($ecodeActionArr , $title , $status , $link , $formno , $programname);
      $this->notifycenter->insertdataRead_template($ecodeReadArr , $title , $status , $link , $formno , $programname);
   }
   // ส่ง Email To Excutive Pay Group = 4 , 3 , 2 , 1




   // ส่ง Email To Account Pay Group = 5
   public function send_to_account($formcode , $formno)
   {
      $subject = "[$formno] มีรายการใบขอเบิกจ่าย (Normal) ใหม่ รอบัญชี(Assist Manager , Manager)ตรวจสอบ";
      $short_url = base_url('normal_view.html/') . $formcode."/".$formno;
      $emaildata = getDataForEmail($formcode , $formno , "wdf");

      $body = '
         <h2>รายการใบขอเบิกจ่าย (Normal) ใหม่ รอบัญชี(Assist Manager , Manager)ตรวจสอบ</h2>
         <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . $emaildata->wdf_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_datetime) . '</td>
         </tr>


         <tr>
            <td><strong>บริษัท</strong></td>
            <td>' . conAreaidtoName($emaildata->wdf_areaid) . '</td>
            <td><strong>ผู้ขอ</strong></td>
            <td>' . $emaildata->wdf_user . '</td>
         </tr>


         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . $emaildata->wdf_ecode . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . $emaildata->wdf_dept . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผลการตรวจสอบวงเงิน จากบัญชี</strong></td>
         </tr>
         <tr>
            <td><strong>วงเงินคงเหลือ</strong></td>
            <td colspan="3">' . number_format($emaildata->wdf_bg_creditlimit, 2)  . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_bg_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_bg_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก ผู้จัดการฝ่าย</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_appr . '</td>
         </tr>
         <tr>
            <td><strong>เหตุผล</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_mgr_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_mgr_datetime) . '</td>
         </tr>



         <tr>
               <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(AP)</strong></td>
         </tr>
         <tr>
               <td><strong>ผลการตรวจสอบ</strong></td>
               <td>' . $emaildata->wdf_ap_appr . '</td>
               <td><strong>ประเภทการจ่ายเงิน</strong></td>
               <td>' . $emaildata->wdf_ap_moneymethod . '</td>
         </tr>
         <tr>
               <td><strong>หมายเหตุ</strong></td>
               <td colspan="3">' . $emaildata->wdf_ap_memo . '</td>
         </tr>
         <tr>
               <td><strong>ผู้ดำเนินการ</strong></td>
               <td colspan="3">' . $emaildata->wdf_ap_user . '</td>
         </tr>
         <tr>
               <td><strong>ฝ่าย</strong></td>
               <td>' . $emaildata->wdf_ap_dept . '</td>
               <td><strong>ลงวันที่</strong></td>
               <td>' . conDateTimeFromDb($emaildata->wdf_ap_datetime) . '</td>
         </tr>



         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('normal_view.html/') . $formcode."/".$formno . '">' . $formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('uploads/qrcode/') . $this->createQrcode_nor($short_url,$formno) . '"></td>
         </tr>


         </table>
         ';

      $to = "";
      $cc = "";

      //  Email Zone
      $optionTo = getEmail_acc_BySection("u_acc_section");

      $ecodeAr = array();
      $ecodeccAr = array();

      $to = array();
      foreach ($optionTo->result_array() as $result) {
         $to[] = $result['u_email'];
         $ecodeAr[] = $result['u_ecode'];
      }


      $optioncc = getEmail_onMemberTbl("('$emaildata->wdf_ecode')");
      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
         $ecodeccAr[] = $resultcc['ecode'];
      }

      $to = array_unique($to);
      $cc = array_unique($cc);
      $ecodeAr = array_unique($ecodeAr);
      $ecodeccAr = array_unique($ecodeccAr);

      emailSaveData($subject, $body, $to, $cc);
      //  Email Zone

      // Notification center program
      $ecodeActionArr = $ecodeAr;
      $ecodeReadArr = $ecodeccAr;

      $title = $subject;
      $status = $emaildata->wdf_status;
      $link = base_url('normal_view.html/') . $formcode."/".$formno;
      $programname = "WDF";

      $this->notifycenter->insertdataaction_template($ecodeActionArr , $title , $status , $link , $formno , $programname);
      $this->notifycenter->insertdataRead_template($ecodeReadArr , $title , $status , $link , $formno , $programname);
   }
   // ส่ง Email To Account Pay Group = 5



   // ส่ง Email To Account Pay Group = 4 , 3 , 2 , 1
   public function send_to_accountExcutive($formcode , $formno)
   {
      
      $short_url = base_url('normal_view.html/') . $formcode."/".$formno;
      $emaildata = getDataForEmail($formcode , $formno , "wdf");

      $subject = "[$formno] มีรายการใบขอเบิกจ่าย (Normal) ใหม่ รอบัญชี(Assist Manager , Manager)ตรวจสอบ";

      $body = '
         <h2>รายการใบขอเบิกจ่าย (Normal) ใหม่ รอบัญชี(Assist Manager , Manager)ตรวจสอบ</h2>
         <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . $emaildata->wdf_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_datetime) . '</td>
         </tr>


         <tr>
            <td><strong>บริษัท</strong></td>
            <td>' . conAreaidtoName($emaildata->wdf_areaid) . '</td>
            <td><strong>ผู้ขอ</strong></td>
            <td>' . $emaildata->wdf_user . '</td>
         </tr>


         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . $emaildata->wdf_ecode . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . $emaildata->wdf_dept . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผลการตรวจสอบวงเงิน จากบัญชี</strong></td>
         </tr>
         <tr>
            <td><strong>วงเงินคงเหลือ</strong></td>
            <td colspan="3">' . number_format($emaildata->wdf_bg_creditlimit, 2)  . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_bg_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_bg_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก ผู้จัดการฝ่าย</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_appr . '</td>
         </tr>
         <tr>
            <td><strong>เหตุผล</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_mgr_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_mgr_datetime) . '</td>
         </tr>';


         $queryDataExcutive = getDataApprovedUser($emaildata->wdf_appgroup , $formcode , $emaildata->wdf_areaid);
         foreach($queryDataExcutive->result() as $rs){
            $body .='
            
            <tr>
               <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก '.$rs->apv_posiname.'</strong></td>
            </tr>
            <tr>
               <td><strong>ผลการอนุมัติ</strong></td>
               <td colspan="3">' . $rs->apv_approve . '</td>
            </tr>
            <tr>
               <td><strong>เหตุผล</strong></td>
               <td colspan="3">' . $rs->apv_approve_memo . '</td>
            </tr>
            <tr>
               <td><strong>ผู้อนุมัติ</strong></td>
               <td>' . $rs->apv_approve_user . '</td>
               <td><strong>ลงวันที่</strong></td>
               <td>' . conDateTimeFromDb($rs->apv_approve_datetime) . '</td>
            </tr>
            
            ';
         }


      $body .='
         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(AP)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td>' . $emaildata->wdf_ap_appr . '</td>
            <td><strong>ประเภทการจ่ายเงิน</strong></td>
            <td>' . $emaildata->wdf_ap_moneymethod . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ap_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ap_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_ap_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_ap_datetime) . '</td>
         </tr>




         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('normal_view.html/') . $formcode."/".$formno . '">' . $formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('uploads/qrcode/') . $this->createQrcode_nor($short_url,$formno) . '"></td>
         </tr>


         </table>
         ';

      $to = "";
      $cc = "";

      //  Email Zone
      $optionTo = getEmail_acc_BySection("u_acc_section");

      $ecodeAr = array();
      $ecodeccAr = array();

      $to = array();
      foreach ($optionTo->result_array() as $result) {
         $to[] = $result['u_email'];
         $ecodeAr[] = $result['u_ecode'];
      }


      $optioncc = getEmail_onMemberTbl("('$emaildata->wdf_ecode')");
      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
         $ecodeccAr[] = $resultcc['ecode'];
      }

      $to = array_unique($to);
      $cc = array_unique($cc);
      $ecodeAr = array_unique($ecodeAr);
      $ecodeccAr = array_unique($ecodeccAr);

      emailSaveData($subject, $body, $to, $cc);
      //  Email Zone

      // Notification center program
      $ecodeActionArr = $ecodeAr;
      $ecodeReadArr = $ecodeccAr;

      $title = $subject;
      $status = $emaildata->wdf_status;
      $link = base_url('normal_view.html/') . $formcode."/".$formno;
      $programname = "WDF";

      $this->notifycenter->insertdataaction_template($ecodeActionArr , $title , $status , $link , $formno , $programname);
      $this->notifycenter->insertdataRead_template($ecodeReadArr , $title , $status , $link , $formno , $programname);
   }
   // ส่ง Email To Account Pay Group = 4 , 3 , 2 , 1



   // ส่ง Email To Finance Pay Group = 5
   public function send_to_finance($formcode , $formno)
   {
      $subject = "[$formno] มีรายการใบขอเบิกจ่าย (Normal) ใหม่ รอบัญชี(Finance)ตรวจสอบ";
      $short_url = base_url('normal_view.html/') . $formcode."/".$formno;
      $emaildata = getDataForEmail($formcode , $formno , "wdf");

      $body = '
         <h2>รายการใบขอเบิกจ่าย (Normal) ใหม่ รอบัญชี(Finance)ตรวจสอบ</h2>
         <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . $emaildata->wdf_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_datetime) . '</td>
         </tr>


         <tr>
            <td><strong>บริษัท</strong></td>
            <td>' . conAreaidtoName($emaildata->wdf_areaid) . '</td>
            <td><strong>ผู้ขอ</strong></td>
            <td>' . $emaildata->wdf_user . '</td>
         </tr>


         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . $emaildata->wdf_ecode . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . $emaildata->wdf_dept . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผลการตรวจสอบวงเงิน จากบัญชี</strong></td>
         </tr>
         <tr>
            <td><strong>วงเงินคงเหลือ</strong></td>
            <td colspan="3">' . number_format($emaildata->wdf_bg_creditlimit, 2)  . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_bg_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_bg_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก ผู้จัดการฝ่าย</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_appr . '</td>
         </tr>
         <tr>
            <td><strong>เหตุผล</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_mgr_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_mgr_datetime) . '</td>
         </tr>



         <tr>
               <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(AP)</strong></td>
         </tr>
         <tr>
               <td><strong>ผลการตรวจสอบ</strong></td>
               <td>' . $emaildata->wdf_ap_appr . '</td>
               <td><strong>ประเภทการจ่ายเงิน</strong></td>
               <td>' . $emaildata->wdf_ap_moneymethod . '</td>
         </tr>
         <tr>
               <td><strong>หมายเหตุ</strong></td>
               <td colspan="3">' . $emaildata->wdf_ap_memo . '</td>
         </tr>
         <tr>
               <td><strong>ผู้ดำเนินการ</strong></td>
               <td colspan="3">' . $emaildata->wdf_ap_user . '</td>
         </tr>
         <tr>
               <td><strong>ฝ่าย</strong></td>
               <td>' . $emaildata->wdf_ap_dept . '</td>
               <td><strong>ลงวันที่</strong></td>
               <td>' . conDateTimeFromDb($emaildata->wdf_ap_datetime) . '</td>
         </tr>



         <tr>
               <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(Assist Manager , Manager)</strong></td>
         </tr>
         <tr>
               <td><strong>ผลการตรวจสอบ</strong></td>
               <td colspan="3">' . $emaildata->wdf_acc_appr . '</td>
         </tr>
         <tr>
               <td><strong>หมายเหตุ</strong></td>
               <td colspan="3">' . $emaildata->wdf_acc_memo . '</td>
         </tr>
         <tr>
               <td><strong>ผู้ดำเนินการ</strong></td>
               <td colspan="3">' . $emaildata->wdf_acc_user . '</td>
         </tr>
         <tr>
               <td><strong>ฝ่าย</strong></td>
               <td>' . $emaildata->wdf_acc_dept . '</td>
               <td><strong>ลงวันที่</strong></td>
               <td>' . conDateTimeFromDb($emaildata->wdf_acc_datetime) . '</td>
         </tr>



         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('normal_view.html/') . $formcode."/".$formno . '">' . $formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('uploads/qrcode/') . $this->createQrcode_nor($short_url,$formno) . '"></td>
         </tr>


         </table>
         ';

      $to = "";
      $cc = "";

      //  Email Zone
      $optionTo = getEmail_acc_BySection("u_finance_section");

      $ecodeAr = array();
      $ecodeccAr = array();

      $to = array();
      foreach ($optionTo->result_array() as $result) {
         $to[] = $result['u_email'];
         $ecodeAr[] = $result['u_ecode'];
      }


      $optioncc = getEmail_onMemberTbl("('$emaildata->wdf_ecode')");
      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
         $ecodeccAr[] = $resultcc['ecode'];
      }

      $to = array_unique($to);
      $cc = array_unique($cc);
      $ecodeAr = array_unique($ecodeAr);
      $ecodeccAr = array_unique($ecodeccAr);

      emailSaveData($subject, $body, $to, $cc);
      //  Email Zone

      // Notification center program
      $ecodeActionArr = $ecodeAr;
      $ecodeReadArr = $ecodeccAr;

      $title = $subject;
      $status = $emaildata->wdf_status;
      $link = base_url('normal_view.html/') . $formcode."/".$formno;
      $programname = "WDF";

      $this->notifycenter->insertdataaction_template($ecodeActionArr , $title , $status , $link , $formno , $programname);
      $this->notifycenter->insertdataRead_template($ecodeReadArr , $title , $status , $link , $formno , $programname);
   }
   // ส่ง Email To Finance Pay Group = 5



   // ส่ง Email To Finance Pay Group = 4 , 3 , 2 , 1
   public function send_to_financeExcutive($formcode , $formno)
   {
      
      $short_url = base_url('normal_view.html/') . $formcode."/".$formno;
      $emaildata = getDataForEmail($formcode , $formno , "wdf");

      $subject = "[$formno] มีรายการใบขอเบิกจ่าย (Normal) ใหม่ รอบัญชี(Finance)ตรวจสอบ";

      $body = '
         <h2>รายการใบขอเบิกจ่าย (Normal) ใหม่ รอบัญชี(Finance)ตรวจสอบ</h2>
         <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . $emaildata->wdf_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_datetime) . '</td>
         </tr>


         <tr>
            <td><strong>บริษัท</strong></td>
            <td>' . conAreaidtoName($emaildata->wdf_areaid) . '</td>
            <td><strong>ผู้ขอ</strong></td>
            <td>' . $emaildata->wdf_user . '</td>
         </tr>


         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . $emaildata->wdf_ecode . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . $emaildata->wdf_dept . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผลการตรวจสอบวงเงิน จากบัญชี</strong></td>
         </tr>
         <tr>
            <td><strong>วงเงินคงเหลือ</strong></td>
            <td colspan="3">' . number_format($emaildata->wdf_bg_creditlimit, 2)  . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_bg_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_bg_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก ผู้จัดการฝ่าย</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_appr . '</td>
         </tr>
         <tr>
            <td><strong>เหตุผล</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_mgr_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_mgr_datetime) . '</td>
         </tr>';


         $queryDataExcutive = getDataApprovedUser($emaildata->wdf_appgroup , $formcode , $emaildata->wdf_areaid);
         foreach($queryDataExcutive->result() as $rs){
            $body .='
            
            <tr>
               <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก '.$rs->apv_posiname.'</strong></td>
            </tr>
            <tr>
               <td><strong>ผลการอนุมัติ</strong></td>
               <td colspan="3">' . $rs->apv_approve . '</td>
            </tr>
            <tr>
               <td><strong>เหตุผล</strong></td>
               <td colspan="3">' . $rs->apv_approve_memo . '</td>
            </tr>
            <tr>
               <td><strong>ผู้อนุมัติ</strong></td>
               <td>' . $rs->apv_approve_user . '</td>
               <td><strong>ลงวันที่</strong></td>
               <td>' . conDateTimeFromDb($rs->apv_approve_datetime) . '</td>
            </tr>
            
            ';
         }


      $body .='
         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(AP)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td>' . $emaildata->wdf_ap_appr . '</td>
            <td><strong>ประเภทการจ่ายเงิน</strong></td>
            <td>' . $emaildata->wdf_ap_moneymethod . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ap_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ap_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_ap_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_ap_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(Assist Manager , Manager)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_appr . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_acc_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_acc_datetime) . '</td>
         </tr>



         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('normal_view.html/') . $formcode."/".$formno . '">' . $formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('uploads/qrcode/') . $this->createQrcode_nor($short_url,$formno) . '"></td>
         </tr>


         </table>
         ';

      $to = "";
      $cc = "";

      //  Email Zone
      $optionTo = getEmail_acc_BySection("u_finance_section");

      $ecodeAr = array();
      $ecodeccAr = array();

      $to = array();
      foreach ($optionTo->result_array() as $result) {
         $to[] = $result['u_email'];
         $ecodeAr[] = $result['u_ecode'];
      }


      $optioncc = getEmail_onMemberTbl("('$emaildata->wdf_ecode')");
      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
         $ecodeccAr[] = $resultcc['ecode'];
      }

      $to = array_unique($to);
      $cc = array_unique($cc);
      $ecodeAr = array_unique($ecodeAr);
      $ecodeccAr = array_unique($ecodeccAr);

      emailSaveData($subject, $body, $to, $cc);
      //  Email Zone

      // Notification center program
      $ecodeActionArr = $ecodeAr;
      $ecodeReadArr = $ecodeccAr;

      $title = $subject;
      $status = $emaildata->wdf_status;
      $link = base_url('normal_view.html/') . $formcode."/".$formno;
      $programname = "WDF";

      $this->notifycenter->insertdataaction_template($ecodeActionArr , $title , $status , $link , $formno , $programname);
      $this->notifycenter->insertdataRead_template($ecodeReadArr , $title , $status , $link , $formno , $programname);
   }
   // ส่ง Email To Finance Pay Group = 4 , 3 , 2 , 1



   // ส่ง Email To User Pay Group = 5
   public function send_to_user($formcode , $formno)
   {
      $subject = "[$formno] มีรายการใบขอเบิกจ่าย (Normal) ใหม่ รอผู้ร้องขอเซ็นรับเงิน";
      $short_url = base_url('normal_view.html/') . $formcode."/".$formno;
      $emaildata = getDataForEmail($formcode , $formno , "wdf");

      $body = '
         <h2>รายการใบขอเบิกจ่าย (Normal) ใหม่ รอผู้ร้องขอเซ็นรับเงิน</h2>
         <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . $emaildata->wdf_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_datetime) . '</td>
         </tr>


         <tr>
            <td><strong>บริษัท</strong></td>
            <td>' . conAreaidtoName($emaildata->wdf_areaid) . '</td>
            <td><strong>ผู้ขอ</strong></td>
            <td>' . $emaildata->wdf_user . '</td>
         </tr>


         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . $emaildata->wdf_ecode . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . $emaildata->wdf_dept . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผลการตรวจสอบวงเงิน จากบัญชี</strong></td>
         </tr>
         <tr>
            <td><strong>วงเงินคงเหลือ</strong></td>
            <td colspan="3">' . number_format($emaildata->wdf_bg_creditlimit, 2)  . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_bg_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_bg_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก ผู้จัดการฝ่าย</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_appr . '</td>
         </tr>
         <tr>
            <td><strong>เหตุผล</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_mgr_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_mgr_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(AP)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td>' . $emaildata->wdf_ap_appr . '</td>
            <td><strong>ประเภทการจ่ายเงิน</strong></td>
            <td>' . $emaildata->wdf_ap_moneymethod . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ap_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ap_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_ap_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_ap_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(Assist Manager , Manager)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_appr . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_acc_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_acc_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(Finance)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td colspan="3">' . $emaildata->wdf_fn_appr . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_fn_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_fn_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_fn_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_fn_datetime) . '</td>
         </tr>



         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('normal_view.html/') . $formcode."/".$formno . '">' . $formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('uploads/qrcode/') . $this->createQrcode_nor($short_url,$formno) . '"></td>
         </tr>


         </table>
         ';

      $to = "";
      $cc = "";

      //  Email Zone
      $optionTo = getEmail_onMemberTbl("('$emaildata->wdf_ecode')");

      $ecodeAr = array();
      $ecodeccAr = array();

      $to = array();
      foreach ($optionTo->result_array() as $result) {
         $to[] = $result['memberemail'];
         $ecodeAr[] = $result['ecode'];
      }


      $optioncc = getEmail_acc_BySection("u_userreceive_section");
      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['u_email'];
         $ecodeccAr[] = $resultcc['u_ecode'];
      }

      $to = array_unique($to);
      $cc = array_unique($cc);
      $ecodeAr = array_unique($ecodeAr);
      $ecodeccAr = array_unique($ecodeccAr);

      emailSaveData($subject, $body, $to, $cc);
      //  Email Zone

      // Notification center program
      $ecodeActionArr = $ecodeAr;
      $ecodeReadArr = $ecodeccAr;

      $title = $subject;
      $status = $emaildata->wdf_status;
      $link = base_url('normal_view.html/') . $formcode."/".$formno;
      $programname = "WDF";

      $this->notifycenter->insertdataaction_template($ecodeActionArr , $title , $status , $link , $formno , $programname);
      $this->notifycenter->insertdataRead_template($ecodeReadArr , $title , $status , $link , $formno , $programname);
   }
   // ส่ง Email To User Pay Group = 5
   
   
   
   // ส่ง Email To User Pay Group = 4 , 3 , 2 , 1
   public function send_to_userExcutive($formcode , $formno)
   {
      
      $short_url = base_url('normal_view.html/') . $formcode."/".$formno;
      $emaildata = getDataForEmail($formcode , $formno , "wdf");

      $subject = "[$formno] มีรายการใบขอเบิกจ่าย (Normal) ใหม่ รอผู้ร้องขอเซ็นรับเงิน";

      $body = '
         <h2>รายการใบขอเบิกจ่าย (Normal) ใหม่ รอผู้ร้องขอเซ็นรับเงิน</h2>
         <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . $emaildata->wdf_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_datetime) . '</td>
         </tr>


         <tr>
            <td><strong>บริษัท</strong></td>
            <td>' . conAreaidtoName($emaildata->wdf_areaid) . '</td>
            <td><strong>ผู้ขอ</strong></td>
            <td>' . $emaildata->wdf_user . '</td>
         </tr>


         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . $emaildata->wdf_ecode . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . $emaildata->wdf_dept . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผลการตรวจสอบวงเงิน จากบัญชี</strong></td>
         </tr>
         <tr>
            <td><strong>วงเงินคงเหลือ</strong></td>
            <td colspan="3">' . number_format($emaildata->wdf_bg_creditlimit, 2)  . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_bg_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_bg_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก ผู้จัดการฝ่าย</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_appr . '</td>
         </tr>
         <tr>
            <td><strong>เหตุผล</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_mgr_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_mgr_datetime) . '</td>
         </tr>';


         $queryDataExcutive = getDataApprovedUser($emaildata->wdf_appgroup , $formcode , $emaildata->wdf_areaid);
         foreach($queryDataExcutive->result() as $rs){
            $body .='
            
            <tr>
               <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก '.$rs->apv_posiname.'</strong></td>
            </tr>
            <tr>
               <td><strong>ผลการอนุมัติ</strong></td>
               <td colspan="3">' . $rs->apv_approve . '</td>
            </tr>
            <tr>
               <td><strong>เหตุผล</strong></td>
               <td colspan="3">' . $rs->apv_approve_memo . '</td>
            </tr>
            <tr>
               <td><strong>ผู้อนุมัติ</strong></td>
               <td>' . $rs->apv_approve_user . '</td>
               <td><strong>ลงวันที่</strong></td>
               <td>' . conDateTimeFromDb($rs->apv_approve_datetime) . '</td>
            </tr>
            
            ';
         }


      $body .='
         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(AP)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td>' . $emaildata->wdf_ap_appr . '</td>
            <td><strong>ประเภทการจ่ายเงิน</strong></td>
            <td>' . $emaildata->wdf_ap_moneymethod . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ap_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ap_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_ap_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_ap_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(Assist Manager , Manager)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_appr . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_acc_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_acc_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(Finance)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td colspan="3">' . $emaildata->wdf_fn_appr . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_fn_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_fn_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_fn_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_fn_datetime) . '</td>
         </tr>



         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('normal_view.html/') . $formcode."/".$formno . '">' . $formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('uploads/qrcode/') . $this->createQrcode_nor($short_url,$formno) . '"></td>
         </tr>


         </table>
         ';

      $to = "";
      $cc = "";

      //  Email Zone
      $optionTo = getEmail_onMemberTbl("('$emaildata->wdf_ecode')");

      $ecodeAr = array();
      $ecodeccAr = array();

      $to = array();
      foreach ($optionTo->result_array() as $result) {
         $to[] = $result['memberemail'];
         $ecodeAr[] = $result['ecode'];
      }


      $optioncc = getEmail_acc_BySection("u_userreceive_section");
      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['u_email'];
         $ecodeccAr[] = $resultcc['u_ecode'];
      }

      $to = array_unique($to);
      $cc = array_unique($cc);
      $ecodeAr = array_unique($ecodeAr);
      $ecodeccAr = array_unique($ecodeccAr);

      emailSaveData($subject, $body, $to, $cc);
      //  Email Zone

      // Notification center program
      $ecodeActionArr = $ecodeAr;
      $ecodeReadArr = $ecodeccAr;

      $title = $subject;
      $status = $emaildata->wdf_status;
      $link = base_url('normal_view.html/') . $formcode."/".$formno;
      $programname = "WDF";

      $this->notifycenter->insertdataaction_template($ecodeActionArr , $title , $status , $link , $formno , $programname);
      $this->notifycenter->insertdataRead_template($ecodeReadArr , $title , $status , $link , $formno , $programname);
   }
   // ส่ง Email To User Pay Group = 4 , 3 , 2 , 1



   // ส่ง Email To User Pay Group = 5
   public function send_to_userComplete($formcode , $formno)
   {
      $subject = "[$formno] รายการใบขอเบิกจ่าย (Normal) ดำเนินการเสร็จสิ้น";
      $short_url = base_url('normal_view.html/') . $formcode."/".$formno;
      $emaildata = getDataForEmail($formcode , $formno , "wdf");

      $body = '
         <h2>รายการใบขอเบิกจ่าย (Normal) ดำเนินการเสร็จสิ้น</h2>
         <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . $emaildata->wdf_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_datetime) . '</td>
         </tr>


         <tr>
            <td><strong>บริษัท</strong></td>
            <td>' . conAreaidtoName($emaildata->wdf_areaid) . '</td>
            <td><strong>ผู้ขอ</strong></td>
            <td>' . $emaildata->wdf_user . '</td>
         </tr>


         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . $emaildata->wdf_ecode . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . $emaildata->wdf_dept . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผลการตรวจสอบวงเงิน จากบัญชี</strong></td>
         </tr>
         <tr>
            <td><strong>วงเงินคงเหลือ</strong></td>
            <td colspan="3">' . number_format($emaildata->wdf_bg_creditlimit, 2)  . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_bg_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_bg_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก ผู้จัดการฝ่าย</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_appr . '</td>
         </tr>
         <tr>
            <td><strong>เหตุผล</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_mgr_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_mgr_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(AP)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td>' . $emaildata->wdf_ap_appr . '</td>
            <td><strong>ประเภทการจ่ายเงิน</strong></td>
            <td>' . $emaildata->wdf_ap_moneymethod . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ap_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ap_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_ap_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_ap_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(Assist Manager , Manager)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_appr . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_acc_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_acc_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(Finance)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td colspan="3">' . $emaildata->wdf_fn_appr . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_fn_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_fn_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_fn_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_fn_datetime) . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผู้ร้องขอเซ็นรับเงิน</strong></td>
         </tr>
         <tr>
            <td><strong>ลายเซ็นผู้รับเงิน</strong></td>
            <td colspan="3"><img src="' . $emaildata->wdf_ur_signature . '" alt="" width="500" height="250"></td>
         </tr>
         <tr>
            <td><strong>ลงชื่อ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ur_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_ur_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_ur_datetime) . '</td>
         </tr>



         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('normal_view.html/') . $formcode."/".$formno . '">' . $formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('uploads/qrcode/') . $this->createQrcode_nor($short_url,$formno) . '"></td>
         </tr>


         </table>
         ';

      $to = "";
      $cc = "";

      //  Email Zone
      $optionTo = getEmail_onMemberTbl("('$emaildata->wdf_ecode')");

      $ecodeccAr = array();

      $to = array();
      foreach ($optionTo->result_array() as $result) {
         $to[] = $result['memberemail'];
         $ecodeccAr[] = $result['ecode'];
      }


      $optioncc = getEmail_manager($formcode , $formno , $emaildata->wdf_deptcode , $emaildata->wdf_areaid);
      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
         $ecodeccAr[] = $resultcc['ecode'];
      }

      $to = array_unique($to);
      $cc = array_unique($cc);
      $ecodeccAr = array_unique($ecodeccAr);

      emailSaveData($subject, $body, $to, $cc);
      //  Email Zone

      // Notification center program
      $ecodeReadArr = $ecodeccAr;

      $title = $subject;
      $status = $emaildata->wdf_status;
      $link = base_url('normal_view.html/') . $formcode."/".$formno;
      $programname = "WDF";

      $this->notifycenter->insertdataRead_template($ecodeReadArr , $title , $status , $link , $formno , $programname);
   }
   // ส่ง Email To User Pay Group = 5
   
   
   
   // ส่ง Email To User Pay Group = 4 , 3 , 2 , 1
   public function send_to_userExcutiveComplete($formcode , $formno)
   {
      
      $short_url = base_url('normal_view.html/') . $formcode."/".$formno;
      $emaildata = getDataForEmail($formcode , $formno , "wdf");

      $subject = "[$formno] รายการใบขอเบิกจ่าย (Normal) ดำเนินการเสร็จสิ้น";

      $body = '
         <h2>รายการใบขอเบิกจ่าย (Normal) ดำเนินการเสร็จสิ้น</h2>
         <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . $emaildata->wdf_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_datetime) . '</td>
         </tr>


         <tr>
            <td><strong>บริษัท</strong></td>
            <td>' . conAreaidtoName($emaildata->wdf_areaid) . '</td>
            <td><strong>ผู้ขอ</strong></td>
            <td>' . $emaildata->wdf_user . '</td>
         </tr>


         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . $emaildata->wdf_ecode . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . $emaildata->wdf_dept . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผลการตรวจสอบวงเงิน จากบัญชี</strong></td>
         </tr>
         <tr>
            <td><strong>วงเงินคงเหลือ</strong></td>
            <td colspan="3">' . number_format($emaildata->wdf_bg_creditlimit, 2)  . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_bg_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_bg_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_bg_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก ผู้จัดการฝ่าย</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_appr . '</td>
         </tr>
         <tr>
            <td><strong>เหตุผล</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td colspan="3">' . $emaildata->wdf_mgr_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_mgr_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_mgr_datetime) . '</td>
         </tr>';


         $queryDataExcutive = getDataApprovedUser($emaildata->wdf_appgroup , $formcode , $emaildata->wdf_areaid);
         foreach($queryDataExcutive->result() as $rs){
            $body .='
            
            <tr>
               <td colspan="4" class="bghead"><strong>ผลการอนุมัติจาก '.$rs->apv_posiname.'</strong></td>
            </tr>
            <tr>
               <td><strong>ผลการอนุมัติ</strong></td>
               <td colspan="3">' . $rs->apv_approve . '</td>
            </tr>
            <tr>
               <td><strong>เหตุผล</strong></td>
               <td colspan="3">' . $rs->apv_approve_memo . '</td>
            </tr>
            <tr>
               <td><strong>ผู้อนุมัติ</strong></td>
               <td>' . $rs->apv_approve_user . '</td>
               <td><strong>ลงวันที่</strong></td>
               <td>' . conDateTimeFromDb($rs->apv_approve_datetime) . '</td>
            </tr>
            
            ';
         }


      $body .='
         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(AP)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td>' . $emaildata->wdf_ap_appr . '</td>
            <td><strong>ประเภทการจ่ายเงิน</strong></td>
            <td>' . $emaildata->wdf_ap_moneymethod . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ap_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ap_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_ap_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_ap_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(Assist Manager , Manager)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_appr . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_acc_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_acc_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_acc_datetime) . '</td>
         </tr>



         <tr>
            <td colspan="4" class="bghead"><strong>ผลการดำเนินงานของบัญชี(Finance)</strong></td>
         </tr>
         <tr>
            <td><strong>ผลการตรวจสอบ</strong></td>
            <td colspan="3">' . $emaildata->wdf_fn_appr . '</td>
         </tr>
         <tr>
            <td><strong>หมายเหตุ</strong></td>
            <td colspan="3">' . $emaildata->wdf_fn_memo . '</td>
         </tr>
         <tr>
            <td><strong>ผู้ดำเนินการ</strong></td>
            <td colspan="3">' . $emaildata->wdf_fn_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_fn_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_fn_datetime) . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><strong>ผู้ร้องขอเซ็นรับเงิน</strong></td>
         </tr>
         <tr>
            <td><strong>ลายเซ็นผู้รับเงิน</strong></td>
            <td colspan="3"><img src="' . $emaildata->wdf_ur_signature . '" alt="" width="500" height="250"></td>
         </tr>
         <tr>
            <td><strong>ลงชื่อ</strong></td>
            <td colspan="3">' . $emaildata->wdf_ur_user . '</td>
         </tr>
         <tr>
            <td><strong>ฝ่าย</strong></td>
            <td>' . $emaildata->wdf_ur_dept . '</td>
            <td><strong>ลงวันที่</strong></td>
            <td>' . conDateTimeFromDb($emaildata->wdf_ur_datetime) . '</td>
         </tr>



         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('normal_view.html/') . $formcode."/".$formno . '">' . $formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('uploads/qrcode/') . $this->createQrcode_nor($short_url,$formno) . '"></td>
         </tr>


         </table>
         ';

      $to = "";
      $cc = "";

      //  Email Zone
      $optionTo = getEmail_onMemberTbl("('$emaildata->wdf_ecode')");
      $ecodeccAr = array();

      $to = array();
      foreach ($optionTo->result_array() as $result) {
         $to[] = $result['memberemail'];
         $ecodeccAr[] = $result['ecode'];
      }


      $optioncc = getEmail_manager($formcode , $formno , $emaildata->wdf_deptcode , $emaildata->wdf_areaid);
      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
         $ecodeccAr[] = $resultcc['ecode'];
      }

      $to = array_unique($to);
      $cc = array_unique($cc);
      $ecodeccAr = array_unique($ecodeccAr);

      emailSaveData($subject, $body, $to, $cc);
      //  Email Zone

      // Notification center program
      $ecodeReadArr = $ecodeccAr;

      $title = $subject;
      $status = $emaildata->wdf_status;
      $link = base_url('normal_view.html/') . $formcode."/".$formno;
      $programname = "WDF";

      $this->notifycenter->insertdataRead_template($ecodeReadArr , $title , $status , $link , $formno , $programname);
   }
   // ส่ง Email To User Pay Group = 4 , 3 , 2 , 1





   /* End of file ModelName.php */
}
/* End of file ModelName.php */
