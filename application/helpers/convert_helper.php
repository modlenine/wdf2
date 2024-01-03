<?php
class convertfn{
    public $ci;
    function __construct()
    {
        $this->ci = &get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }
    public function gci()
    {
        return $this->ci;
    }
}

function getcon()
{
    $obj = new convertfn();
    return $obj->gci();
}

function conDateTimeFromDb($datetime)
{
    if($datetime != ""){
        $datetimeIn = date_create($datetime);
        return date_format($datetimeIn,"d/m/Y H:i:s");
    }else{
        return $datetime;
    }
    
}

function conOnlyTimeFromDb($datetime)
{
    if($datetime != ""){
        $datetimeIn = date_create($datetime);
        return date_format($datetimeIn,"H:i:s");
    }else{
        return $datetime;
    }
}

function conDateFromDb($datetime)
{
    if($datetime != ""){
        $datetimeIn = date_create($datetime);
        return date_format($datetimeIn,"d/m/Y");
    }else{
        return $datetime;
    }
    
}

function conDateFormat($datetime)
{
    if($datetime != ""){
        $datetimeIn = date_create($datetime);
        return date_format($datetimeIn,"Y-m-d");
    }else{
        return $datetime;
    }
}



function conPrice($priceinput)
{
    $oriprice = str_replace("," , "" , $priceinput);
    return $oriprice;
}

function conNumToNull($number)
{
    if($number == 0.0000 || $number == ""){
        return "";
    }else{
        return valueFormat($number);
    }
}

function conNumToText($number)
{
    if($number == 0.0000 || $number == ""){
        return "None";
    }else{
        return valueFormat($number);
    }
}


function getLeadtime($startDatetime , $finishDatetime)
{
    if($startDatetime != "" && $finishDatetime != ""){
        $current_date_time_sec = strtotime($startDatetime); 
        $future_date_time_sec = strtotime($finishDatetime); 
        $difference = $future_date_time_sec - $current_date_time_sec; 
        $hours = ($difference / 3600); 
        $minutes = ($difference / 60 % 60); 
        $seconds = ($difference % 60); 
        $days = ($hours / 24); 
        // $hours = ($hours % 24); 
        // echo "The difference is <br/>"; 
        // if ($days < 0) { 
        //     echo ceil($days) . " days AND "; 
        // } else { 
        //     echo floor($days) . " days AND "; 
        // } 
        return sprintf("%02d", $hours) . ":" . sprintf("%02d", $minutes) . ":" . sprintf("%02d", $seconds); 
    }else{
        return "";
    }
    
}


function conFormcodeToFormNo($formcode)
{
    $sql = getcon()->db->query("SELECT wdf_formno FROM wdf_master WHERE wdf_formcode = '$formcode' ");
    if($sql->num_rows() < 1){
        return null;
    }else{
        return $sql->row()->wdf_formno;
    }
}

function conFormNoToFormCode($formno)
{
    $sql = getcon()->db->query("SELECT wdf_formcode FROM wdf_master WHERE wdf_formno = '$formno' ");
    if($sql->num_rows() < 1){
        return null;
    }else{
        return $sql->row()->wdf_formcode;
    }
}

function conColorTextStatus($status)
{
    $colortext = "";
    if(//Approve zone
        $status == "Open" ||
        $status == "Check budget already" ||
        $status == "Manager approved" ||
        $status == "Wait Executive Group 0 Approve" ||
        $status == "Wait Executive Group 1 Approve" ||
        $status == "Wait Executive Group 2 Approve" ||
        $status == "Wait Executive Group 3 Approve" ||
        $status == "Wait Executive Group 4 Approve" ||
        $status == "Executive Group 0 Approved" ||
        $status == "Executive Group 1 Approved" ||
        $status == "Executive Group 2 Approved" ||
        $status == "Executive Group 3 Approved" ||
        $status == "Executive Group 4 Approved" ||
        $status == "Executive Group 0 Approved (Clear Money)" ||
        $status == "Executive Group 1 Approved (Clear Money)" ||
        $status == "Executive Group 2 Approved (Clear Money)" ||
        $status == "Executive Group 3 Approved (Clear Money)" ||
        $status == "Executive Group 4 Approved (Clear Money)" ||
        $status == "AP passed inspection" ||
        $status == "AP passed inspection (Clear Money)" ||
        $status == "Account passed inspection" ||
        $status == "Wait user receive money" ||
        $status == "Finance passed inspection (Clear Money)"
    ){
        $colortext = 'style="color:#3399FF;"';
    }else if(//Not approve zone
        $status == "Executive Group 0 Not Approve" ||
        $status == "Executive Group 1 Not Approve" ||
        $status == "Executive Group 2 Not Approve" ||
        $status == "Executive Group 3 Not Approve" ||
        $status == "Executive Group 4 Not Approve" ||
        $status == "Manager not approve" ||
        $status == "AP not pass inspection" ||
        $status == "Account not pass inspection" ||
        $status == "Finance not pass inspection" ||
        $status == "Manager not approve (Clear Money)" ||
        $status == "Executive Group 0 Not Approve (Clear Money)" ||
        $status == "Executive Group 1 Not Approve (Clear Money)" ||
        $status == "Executive Group 2 Not Approve (Clear Money)" ||
        $status == "Executive Group 3 Not Approve (Clear Money)" ||
        $status == "Executive Group 4 Not Approve (Clear Money)" ||
        $status == "AP not pass inspection (Clear Money)" ||
        $status == "Account not pass inspection (Clear Money)" ||
        $status == "User cancel" ||
        $status == "Finance 2 not pass inspection (Clear Money)"
    ){
        $colortext = 'style="color:#CC0000;"';
    }else if(//Complete And Go to nextstep
        $status == "Edit" ||
        $status == "Complete & Wait User Clear Money"

    ){
        $colortext = 'style="color:#FF9900;"';
    }else if(//Complete
        $status == "Clear money complete" ||
        $status == "Complete"
    ){
        $colortext = 'style="color:#009900;"';
    }

    return $colortext;
}

function conStatusNumToText($st_autoid , $doctype)
{
    if($doctype != ""){
        $sql = gfn()->db->query("SELECT
        status_master.st_autoid,
        status_master.st_name
        FROM status_master WHERE st_autoid = '$st_autoid' AND st_$doctype = 'yes'
        ");

        if($sql->num_rows() != 0){
            return $sql->row()->st_name;
        }
    }
}


function conStatusTextToNum($statusName , $doctype)
{
    if($doctype != ""){
        $sql = gfn()->db->query("SELECT
        status_master.st_autoid,
        status_master.st_name
        FROM status_master WHERE st_name = '$statusName' AND st_$doctype = 'yes'
        ");

        if($sql->num_rows() != 0){
            return $sql->row()->st_autoid;
        }
    }
}


function conAreaidtoName($dataareaid)
{
    $fullname = "";
    if($dataareaid != ""){
        if($dataareaid == "sc"){
            $fullname ="Salee Colour Public Company Limited.";
        }else if($dataareaid == "pa"){
            $fullname ="Poly Meritasia Co.,Ltd.";
        }else if($dataareaid == "ca"){
            $fullname ="Composite Asia Co.,Ltd.";
        }else if($dataareaid == "st"){
            $fullname ="Subterra Co.,Ltd.";
        }else if($dataareaid == "tb"){
            $fullname ="The bubbles Co.,Ltd.";
        }
        return $fullname;
    }
}





?>