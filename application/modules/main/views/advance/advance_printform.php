<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('IT Dept');
    $pdf->SetTitle('ใบเบิกเงินทดรองจ่าย (Advance)');
    $pdf->SetSubject('ใบเบิกเงินทดรองจ่าย (Advance)');
    $pdf->SetKeywords('ใบเบิกเงินทดรองจ่าย (Advance)');

    // set default header data

    // $pdf->SetHeaderData('Document Library');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);


    // set header and footer fonts
    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


    // set margins

    // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

    // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

    // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetMargins(10, 5, 10, true);


    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {

        require_once(dirname(__FILE__) . '/lang/eng.php');

        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set font

    $pdf->SetFont('thsarabun', '', 12);


    // Print a table

    // add a page

    $pdf->AddPage();

    // create some HTML content

    $html = '';
    $html .= '
    <div style="text-align:center;">
        <span style="font-size:26px;"><b>ใบเบิกเงินทดรองจ่าย (Advance)</b></span><br>
        <span style="font-size:22px;"><b>เลขที่ &nbsp;' . $adv_mainData->wdf_formno . '</b></span>
    </div>
    <hr><br>';


    // เงื่อนไข การ Check บริษัท
    $sc = "";
    $ca = "";
    $pa = "";
    $st = "";

    if ($adv_mainData->wdf_areaid == "sc") {
        $sc = 'checked="checked"';
    }
    if ($adv_mainData->wdf_areaid == "pa") {
        $pa = 'checked="checked"';
    }
    if ($adv_mainData->wdf_areaid == "ca") {
        $ca = 'checked="checked"';
    }
    if ($adv_mainData->wdf_areaid == "tb") {
        $tb = 'checked="checked"';
    }
    if($adv_mainData->wdf_areaid == "st"){
        $st = 'checked="checked"';
    }
    // เงื่อนไข การ Check บริษัท

    $currency = $adv_mainData->wdf_currency;
    if($currency === null){
        $currency = "THB";
    }


    // เงื่อนไขการ Check ประเภทของการจ่ายเงิน
    $receiveMethod1 = "";
    $receiveMethod2 = "";

    if($adv_mainData->wdf_ap_moneymethod == "เงินสด/โอน"){
        $receiveMethod1 = 'checked="checked"';
    }
    if($adv_mainData->wdf_ap_moneymethod == "เช็ค"){
        $receiveMethod2 = 'checked="checked"';
    }
    // เงื่อนไขการ Check ประเภทของการจ่ายเงิน


    $html .= '
    <br>
    <table>
        <tr>
            <td>
                <label style="font-size:18px;"><b>เลือกบริษัท</b></label><br>

                <input readonly="true" type="radio" id="adv_areasln" name="adv_area" class="custom-control-input" value="sln" ' . $sc . '>
                <label class="custom-control-label" for="adv_areasln">Salee Colour Public Company Limited.</label><br>

                <input readonly="true" type="radio" id="adv_areapoly" name="adv_area" class="custom-control-input" value="poly" ' . $pa . '>
                <label class="custom-control-label" for="adv_areapoly">Poly Meritasia Co.,Ltd.</label><br>

                <input readonly="true" type="radio" id="adv_areaca" name="adv_area" class="custom-control-input" value="ca" ' . $ca . '>
                <label class="custom-control-label" for="adv_areaca">Composite Asia Co.,Ltd.</label><br>

                <input readonly="true" type="radio" id="adv_areaca" name="adv_area" class="custom-control-input" value="ca" ' . $st . '>
                <label class="custom-control-label" for="adv_areaca">Subterra Co.,Ltd.</label><br>

                <input readonly="true" type="radio" id="adv_areatb" name="adv_area" class="custom-control-input" value="tb" ' . $tb . '>
                <label class="custom-control-label" for="adv_areatb">The bubbles Co.,Ltd.</label>
            </td>
            <td>
                <label style="font-size:18px;"><b>ประเภทการจ่ายเงิน</b></label><br>
                <input readonly="true" type="radio" id="adv_recive1" name="adv_recive" class="custom-control-input" value="1" '.$receiveMethod1.'>
                <label class="custom-control-label" for="adv_recive1">เงินสด/โอน</label><br>
                <input readonly="true" type="radio" id="adv_recive2" name="adv_recive" class="custom-control-input" value="2" '.$receiveMethod2.'>
                <label class="custom-control-label" for="adv_recive2">เช็ค</label>
            </td>
            <td>
                <label style="font-size:18px;"><b>หมายเหตุ</b></label><br>
                <textarea readonly="true" cols="30" rows="3" name="text">' . $adv_mainData->wdf_ap_memo . '</textarea>
            </td>
        </tr>
    </table>

    <br><br>

    <table>
        <tr>
            <td>
                <label style="font-size:18px;"><b>ชื่อผู้ร้องขอ</b></label><br>
                <input readonly="true" size="20" name="adv_name" id="adv_name" type="text" value="' . $adv_mainData->wdf_user . '">
            </td>
            <td>
                <label style="font-size:18px;"><b>รหัสพนักงาน</b></label><br>
                <input readonly="true" size="20" name="adv_ecode" id="adv_ecode" type="text" value="' . $adv_mainData->wdf_ecode . '">
            </td>
            <td>
                <label style="font-size:18px;"><b>แผนก</b></label><br>
                <input readonly="true" size="20" name="check_advdeptcode" id="check_advdeptcode" type="text" value="' . $adv_mainData->wdf_dept . '">
            </td>
            <td>
                <label style="font-size:18px;"><b>วันที่ออกเอกสาร</b></label><br>
                <input readonly="true" size="20" name="adv_datetime" id="adv_datetime" type="text" value="' . conDateTimeFromDb($adv_mainData->wdf_datetime) . '">
            </td>
        </tr>
    </table>


    <table>
        <tr>
            <td>
                <label style="font-size:18px;"><b>ชื่อผู้รับเงิน</b></label><br>
                <input readonly="true" size="20" name="adv_userreceive" id="adv_userreceive" type="text" value="' . $adv_mainData->wdf_userreceive . '">
            </td>
            <td colspan="3">
                <label style="font-size:18px;"><b>รายละเอียดผู้รับเงิน</b></label><br>
                <input readonly="true" size="80" name="adv_detailreceive" id="adv_detailreceive" type="text" value="' . $adv_mainData->wdf_userreceived_detail . '">
            </td>
        </tr>
    </table>
    <br>
    <hr>
    ';

    $html .= '
    <div style="text-align:center;">
        <span style="font-size:22px;"><b>รายการ</b></span>
    </div>
    <br>
    <table border="1" id="advt_tableViewFull" style="width:1100px">
        <thead>
            <tr>
                <th width="50px" align="center" style="font-size:16px;"><b>ลำดับ</b></th>
                <th width="200px" align="center" style="font-size:16px;"><b>รายการเบิก</b></th>
                <th width="50px" align="center" style="font-size:16px;"><b>รหัสฝ่าย</b></th>
                <th width="80px" align="center" style="font-size:16px;"><b>Account code</b></th>
                <th align="center" style="font-size:16px;"><b>Account code (Name)</b></th>
                <th width="100px" align="center" style="font-size:16px;"><b>จำนวนเงิน ('.$currency.')</b></th>
            </tr>
        </thead>
        <tbody>';



    $i = 1;
    foreach ($adv_transData as $rs) {

        $html .= '
                <tr>
                    <td width="50px" align="center">' . $i . '</td>
                    <td width="200px" align="center">' . $rs->tr_detailname . '</td>
                    <td width="50px" align="center">' . $rs->tr_detaildeptcode . '</td>
                    <td width="80px" align="center">' . $rs->tr_detailaccode . '</td>
                    <td align="center">' . $rs->tr_detailaccodename . '</td>
                    <td width="100px" align="center" class="priceviewfull">' . number_format($rs->tr_money, 2) . '</td>
                </tr>

                ';
        $i++;
    }
    $html .= '
            <tr>
                <td colspan="4" style="text-align:center;">ยอดรวม</td>
                <td colspan="2" style="text-align:center;">' . number_format($adv_mainData->wdf_pricenonevat, 2) . '</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:center;">Vat '.$adv_mainData->wdf_vat1.'%</td>
                <td colspan="2" style="text-align:center;">' . number_format($adv_mainData->wdf_pricevat1, 2) . '</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:center;">หักภาษี ณ ที่จ่าย '.$adv_mainData->wdf_vat2.'%</td>
                <td colspan="2" style="text-align:center;">' . number_format($adv_mainData->wdf_pricevat2, 2) . '</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:center;">ยอดรวมทั้งสิ้น</td>
                <td colspan="2" style="text-align:center;">' . number_format($adv_mainData->wdf_pricewithvat, 2) . '</td>
            </tr>
        </tbody>
    </table>
    <br><br><br>

    ';


    $html .= '
    <div style="text-align:center;">
        <span style="font-size:22px;"><b>รายการ ใช้จ่ายจริง (Clear Money)</b></span>
    </div>
    <br>
    <div class="row">
    <table border="1" id="advt_tableViewFull" style="width:1100px">
        <thead>
            <tr>
                <th width="50px" align="center" style="font-size:16px;"><b>ลำดับ</b></th>
                <th width="200px" align="center" style="font-size:16px;"><b>รายการเบิก</b></th>
                <th width="50px" align="center" style="font-size:16px;"><b>รหัสฝ่าย</b></th>
                <th width="80px" align="center" style="font-size:16px;"><b>Account code</b></th>
                <th align="center" style="font-size:16px;"><b>Account code (Name)</b></th>
                <th width="100px" align="center" style="font-size:16px;"><b>จำนวนเงิน ('.$currency.')</b></th>
            </tr>
        </thead>
        <tbody>';



    $i = 1;
    if($adv_transDataClear == ""){
        $html .= '
        <tr>
            <td width="50px" align="center">' . $i . '</td>
            <td width="200px" align="center">-</td>
            <td width="50px" align="center">-</td>
            <td width="80px" align="center">-</td>
            <td align="center">-</td>
            <td width="100px" align="center" class="priceviewfull">-</td>
        </tr>

        ';
    }else{
        foreach ($adv_transDataClear as $rs) {

            $html .= '
            <tr>
                <td width="50px" align="center">' . $i . '</td>
                <td width="200px" align="center">' . $rs->tr_detailname . '</td>
                <td width="50px" align="center">' . $rs->tr_detaildeptcode . '</td>
                <td width="80px" align="center">' . $rs->tr_detailaccode . '</td>
                <td align="center">' . $rs->tr_detailaccodename . '</td>
                <td width="100px" align="center" class="priceviewfull">' . number_format($rs->tr_money, 2) . '</td>
            </tr>
    
            ';
    
            $i++;
        }
    }


    $html .= '
            <tr>
                <td colspan="4" style="text-align:center;">ยอดรวม</td>
                <td colspan="2" style="text-align:center;">' . number_format($adv_mainData->wdf_pricenonevat_clear, 2) . '</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:center;">Vat '.$adv_mainData->wdf_vat1_clear.'%</td>
                <td colspan="2" style="text-align:center;">' . number_format($adv_mainData->wdf_pricevat1_clear, 2) . '</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:center;">หักภาษี ณ ที่จ่าย '.$adv_mainData->wdf_vat2_clear.'%</td>
                <td colspan="2" style="text-align:center;">' . number_format($adv_mainData->wdf_pricevat2_clear, 2) . '</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:center;">ยอดรวมทั้งสิ้น</td>
                <td colspan="2" style="text-align:center;">' . number_format($adv_mainData->wdf_pricewithvat_clear, 2) . '</td>
            </tr>
        </tbody>
    </table>
    <br><br><br>

    ';

    $html .= '
    <table>
        <tr style="text-align:center;">
            <td>
                <span style="font-size:18px;"><b>ผู้ร้องขอ</b></span><br>
                <span>'.$adv_mainData->wdf_user.'</span><br>
                <span>'.conDateTimeFromDb($adv_mainData->wdf_datetime).'</span><br>
                <span><b>ฝ่าย&nbsp;'.$adv_mainData->wdf_dept.'</b></span>
            </td>
            <td>
                <span style="font-size:18px;"><b>ผู้อนุมัติ</b></span><br>
                <span>'.$adv_mainData->wdf_mgr_user.'</span><br>
                <span>'.conDateTimeFromDb($adv_mainData->wdf_mgr_datetime).'</span><br>
                <span><b>ผู้จัดการฝ่าย&nbsp;'.$adv_mainData->wdf_mgr_dept.'</b></span>
            </td>
            <td>
                <span style="font-size:18px;"><b>ผู้ตรวจสอบ</b></span><br>
                <span>'.$adv_mainData->wdf_acc_user.'</span><br>
                <span>'.conDateTimeFromDb($adv_mainData->wdf_acc_datetime).'</span><br>
                <span><b>ฝ่าย&nbsp;'.$adv_mainData->wdf_acc_dept.'</b></span>
            </td>
        </tr>
    </table>
    ';



    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // reset pointer to the last page
    $pdf->lastPage();


    // Print all HTML colors
    ob_end_clean();


    $filename = "$formno.pdf";

    //Close and output PDF document
    $pdf->Output($filename, 'I');


    //============================================================+

    // END OF FILE

    //============================================================+

?>
</body>
</html>