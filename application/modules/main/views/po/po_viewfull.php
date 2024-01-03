<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแสดงข้อมูลฉบับเต็ม ใบขอเบิกจ่าย (PO)</title>


</head>
<body>
    <div class="main-container">
        <div class="pd-ltr-20">

            <div id="btnControlBar_po" class="card-box pd-20 height-100-p mb-30" style="display:none;">
                <button type="button" id="btn-editpo" name="btn-editpo" class="btn btn-warning"><i class="dw dw-edit-file mr-2"></i>แก้ไข</button>
                <button type="button" id="btn-cancelpo" name="btn-cancelpo" class="btn btn-danger"><i class="dw dw-file-21 mr-2"></i>ยกเลิกเอกสาร</button>
            </div>

            <div class="card-box pd-20 height-100-p mb-30">

                <div id="exportform-section-po" class="mb-2" style="display:none;">
                    <a href="<?=base_url('main/po/po_printform/').$formcode."/".$formno?>" target="_blank"><button type="button" id="printForm-po" name="printForm-po" class="btn btn-secondary">ปริ้นฟอร์ม</button></a>
                </div>

                <div class="row align-items-center">
					<div class="col-md-12 text-center">
						<h4>ใบขอเบิกจ่าย ( PO )</h4>
                        <h6 class="mt-2">เอกสารเลขที่ <span id="showFormno_po"></span></h6>
                        <h6 class="mt-2">สถานะ <span id="showFormStatus_po"></span></h6>
					</div>
				</div>
				<hr class="poHr">

                <div id="process_step_section_po">
                    <?=$this->load->view("po/po_process_step")?>
                </div>

                <hr class="poHr">

                <div class="card-box pd-20 height-100-p mb-30">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>บริษัท</b></label>
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-po-areaid-sc" name="ipv-po-areaid" value="sc" class="custom-control-input"> 
                                        <label for="ipv-po-areaid-sc" class="custom-control-label">Salee Colour Public Company Limited.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-po-areaid-pa" name="ipv-po-areaid" value="pa" class="custom-control-input"> 
                                        <label for="ipv-po-areaid-pa" class="custom-control-label">Poly Meritasia Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-po-areaid-ca" name="ipv-po-areaid" value="ca" class="custom-control-input"> 
                                        <label for="ipv-po-areaid-ca"class="custom-control-label">Composite Asia Co.,Ltd.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-po-areaid-st" name="ipv-po-areaid" value="st" class="custom-control-input"> <label for="ipv-po-areaid-st" class="custom-control-label">Subterra Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipv-po-areaid-tb" name="ipv-po-areaid" value="tb" class="custom-control-input"> 
                                        <label for="ipv-po-areaid-tb"class="custom-control-label">The bubbles Co.,Ltd.</label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>หมายเหตุ</b></label>
                            <input type="text" name="ipv-po-memo" id="ipv-po-memo" class="form-control" readonly>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for=""><b>ชื่อผู้ร้องขอ</b></label>
                            <input type="text" name="ipv-po-username" id="ipv-po-username" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>รหัสพนักงาน</b></label>
                            <input type="text" name="ipv-po-ecode" id="ipv-po-ecode" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>แผนก</b></label>
                            <input type="text" name="ipv-po-dept" id="ipv-po-dept" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>วันที่ออกเอกสาร</b></label>
                            <input type="text" name="ipv-po-date" id="ipv-po-date" class="form-control" readonly>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for=""><b>ชื่อผู้รับเงิน</b></label>
                            <input type="text" name="ipv-po-userreceive" id="ipv-po-userreceive" class="form-control" readonly>
                        </div>
                        <div class="col-md-8">
                            <label for=""><b>รายละเอียดผู้รับเงิน</b></label>
                            <input type="text" name="ipv-po-userreceiveDetail" id="ipv-po-userreceiveDetail" class="form-control" readonly>
                        </div>
                    </div>
                    <hr>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for=""><b>สกุลเงิน</b></label>
                            <select name="ipv-po-currency" id="ipv-po-currency" class="form-control" readonly></select>
                        </div>
                        <div class="col-md-6">
                            <label for=""><b>เลขที่ PO</b></label>
                            <input type="text" name="ipv-po-ponumber" id="ipv-po-ponumber" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="card card-box">
                        <div class="card-header">
                            รายการ
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-12">
                                <!-- <i class="fa fa-plus-circle advAddDetail" data-toggle="tooltip" data-placement="left" title="" data-original-title="เลือกรายการเบิกตรงนี้"></i> -->
                                    <div id="" class="table-responsive">
                                        <table id="tbl_po_new_view" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="advN-th1">ลำดับ</th>
                                                    <th class="advN-th2">รายการเบิก</th>
                                                    <th class="advN-th3">รหัสฝ่าย</th>
                                                    <th class="advN-th4">Account Code</th>
                                                    <th class="advN-th5">Account Code (Name)</th>
                                                    <th class="advN-th6">จำนวนเงิน</th>
                                                </tr>
                                            </thead>
                                            <tbody id="showDataPolistAftersave_view"></tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-podetail-priceNonVat" id="ipv-podetail-priceNonVat" class="form-control" placeholder="ยอดรวม" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">บาท</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ipv-podetail-vat7" id="ipv-podetail-vat7" class="form-control" readonly>
                                        <option value="0">ไม่มี Vat</option>
                                        <option value="7">Vat 7%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-podetail-vat7Price" id="ipv-podetail-vat7Price" class="form-control" placeholder="จำนวนเงิน Vat" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">บาท</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ipv-podetail-vat3" id="ipv-podetail-vat3" class="form-control" readonly>
                                        <option value="0">ไม่มี หัก ณ ที่จ่าย</option>
                                        <option value="1">หัก ณ ที่จ่าย 1%</option>
                                        <option value="2">หัก ณ ที่จ่าย 2%</option>
                                        <option value="3">หัก ณ ที่จ่าย 3%</option>
                                        <option value="5">หัก ณ ที่จ่าย 5%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-podetail-vat3Price" id="ipv-podetail-vat3Price" class="form-control" placeholder="จำนวนเงินหัก ณ ที่จ่าย" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">บาท</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipv-podetail-priceTotal" id="ipv-podetail-priceTotal" class="form-control" placeholder="ยอดรวมสุทธิ" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">บาท</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12 bottommargin">
                                    <label><b>รูปภาพ , เอกสารที่เกี่ยวข้อง</b></label><br>
                                    <div id="po_showImage_view" class="row form-group"></div>
                                </div>
                            </div>

                            <!-- <div class="row form-group">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit" id="btn-saveAdvanceData" name="btn-saveAdvanceData" class="btn btn-success" >บันทึกข้อมูล</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                

                <div id="payGroup_section_po" style="display:none;"></div>

                <div id="ap_section_po" style="display:none;">
                    <?=$this->load->view("po/po_ap")?>
                </div>

                <div id="account_section_po" style="display:none;">
                    <?=$this->load->view("po/po_account")?>
                </div>

                <div id="finance_section_po" style="display:none;">
                    <?=$this->load->view("po/po_finance")?>
                </div>

    

            </div>
        </div>
    </div>
    
</body>
</html>


<script>
    $(document).ready(function(){
        let formcode = "<?php echo $formcode?>";
        let formno = "<?php echo $formno?>";
        let userecode = "<?php echo getUser()->ecode; ?>";
        let userdeptcode = "<?php echo getUser()->DeptCode; ?>";
        let userposi = "<?php echo getUser()->posi; ?>";

        let userpermission = [];
        getUserPermission_po(userecode);


        // Control print button
        if(userdeptcode == 1003 || userecode == "M1809"){
            $('#exportform-section-po').css('display' , '');
        }else{
            $('#exportform-section-po').css('display' , 'none');
        }


        function getUserPermission_po(ecode)
        {
            if(ecode != ""){
                axios.post(url+'main/po/getUserPermission_po' , {
                    action:"getUserPermission_po",
                    ecode:ecode
                }).then(res=>{
                    // console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        if(res.data.result != null){
                            userpermission = res.data.result;
                            console.log(userpermission);
                        }
                        po_getDataviewfull();
                    }
                });
            }
        }

        function po_getDataviewfull()
        {
            if(formcode != ""){
                axios.post(url+'main/po/po_getDataviewfull' , {
                    action:'po_getDataviewfull',
                    formcode:formcode,
                    formno:formno
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){

                        if(res.data.viewfulldata.wdf_status == "Open" || res.data.viewfulldata.wdf_status == "Edit"){
                            if(res.data.viewfulldata.wdf_ecode == userecode){
                                $('#btnControlBar_po').css('display' , '');
                            }
                            
                        }else if(res.data.viewfulldata.wdf_status == "User cancel"){
                            $('#btnControlBar_po').css('display' , 'none');
                        }else{
                            $('#btnControlBar_po').css('display' , 'none');
                        }

                        $('input:radio[name="ipv-po-areaid"]').on('click' , function(e){
                            e.preventDefault();
                        });

                        // get status to text
                        let resultTextColor = checkStatus_text(res.data.viewfulldata.wdf_status);
                        let status = `<span `+resultTextColor+`>`+res.data.viewfulldata.wdf_status+`</span>`;
                        $('#showFormStatus_po').html(status);

                        $('#showFormno_po').html(res.data.viewfulldata.wdf_formno);
                        $('#btn-editpo').attr({
                            'data_formcode':formcode,
                            'data_formno':formno,
                        });
                        $('#btn-cancelpo').attr('data_formcode' , formcode);

                        if(res.data.viewfulldata.wdf_areaid == "sc"){
                            $('#ipv-po-areaid-sc').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "pa"){
                            $('#ipv-po-areaid-pa').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "ca"){
                            $('#ipv-po-areaid-ca').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "st"){
                            $('#ipv-po-areaid-st').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "tb"){
                            $('#ipv-po-areaid-tb').prop('checked' , true);
                        }

                        let condate = moment(res.data.viewfulldata.wdf_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ipv-po-memo').val(res.data.viewfulldata.wdf_memo);
                        $('#ipv-po-username').val(res.data.viewfulldata.wdf_user);
                        $('#ipv-po-ecode').val(res.data.viewfulldata.wdf_ecode);
                        $('#ipv-po-dept').val(res.data.viewfulldata.wdf_dept);
                        $('#ipv-po-date').val(condate);
                        $('#ipv-po-userreceive').val(res.data.viewfulldata.wdf_userreceive);
                        $('#ipv-po-userreceiveDetail').val(res.data.viewfulldata.wdf_userreceived_detail);

                        $('#ipv-po-ponumber').val(res.data.viewfulldata.wdf_ponumber);

                        // if(res.data.viewfulldata.wdf_vat1 == 7){
                        //     $('#ipv-advdetail-vat7 option[value="7"]').prop("selected" , true);
                        // }else{
                        //     $('#ipv-advdetail-vat7 option[value="0"]').prop("selected" , true);
                        // }
                        
                        let convat1ToInt = parseInt(res.data.viewfulldata.wdf_vat1);
                        $('#ipv-podetail-vat7 option[value="'+convat1ToInt+'"]').prop("selected" , true);

                        let convat2ToInt = parseInt(res.data.viewfulldata.wdf_vat2);
                        $('#ipv-podetail-vat3 option[value="'+convat2ToInt+'"]').prop("selected" , true);

                        $('#ipv-podetail-priceNonVat').val(res.data.viewfulldata.wdf_pricenonevat);
                        $('#ipv-podetail-vat7Price').val(res.data.viewfulldata.wdf_pricevat1);
                        $('#ipv-podetail-vat3Price').val(res.data.viewfulldata.wdf_pricevat2);
                        $('#ipv-podetail-priceTotal').val(res.data.viewfulldata.wdf_pricewithvat);

                        conpriceWithComma('#ipv-podetail-priceNonVat');
                        conpriceWithComma('#ipv-podetail-vat7Price');
                        conpriceWithComma('#ipv-podetail-vat3Price');
                        conpriceWithComma('#ipv-podetail-priceTotal');

                        $('#ipv-podetail-vat7').attr("style", "pointer-events: none;");
                        $('#ipv-podetail-vat3').attr("style", "pointer-events: none;");

                        let currency = res.data.viewfulldata.wdf_currency;
                        getPoCurrencyFromDb(currency);

                        // WDF Trans Detail
                        let wdf_trans = res.data.viewfulldata_trans;
                        let wdf_trans_html = ``;
                        let runningnumber = 1;
                        $('#tbl_po_new_view').DataTable().destroy();
                        $('#tbl_po_new_view').DataTable();
                        
                        for(let i = 0; i < wdf_trans.length; i++){

                            let conPrice = wdf_trans[i].tr_money.split(",").join("");
                            

                            wdf_trans_html += `
                            <tr>
                                <td>`+runningnumber+`</td>
                                <td>`+wdf_trans[i].tr_detailname+`</td>
                                <td>`+wdf_trans[i].tr_detaildeptcode+`</td>
                                <td>`+wdf_trans[i].tr_detailaccode+`</td>
                                <td>`+wdf_trans[i].tr_detailaccodename+`</td>
                                <td>`+numberWithCommas(conPrice)+`</td>
                            </tr>
                            `;
                            runningnumber++;
                        }
                        $('#showDataPolistAftersave_view').html(wdf_trans_html);

                        // Show Image View
                        let wdf_file = res.data.viewfulldata_image;
                        let imageHtml = ``;
                        let ext;
                        for(let i = 0; i < wdf_file.length; i++){
                            ext = wdf_file[i].fi_name.split('.').pop().toLowerCase();

                            if(ext != "pdf"){
                                imageHtml +=`
                                <div class="col-md-4 col-lg-3 col-6 mt-2">
                                    <a href="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" target="_blank">
                                        <img class="runImageView" src="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`">
                                    </a>
                                    <a href="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" target="_blank"><b>`+wdf_file[i].fi_name+`</b></a>
                                </div>
                                `;
                            }else{
                                imageHtml +=`
                                <div class="col-md-4 col-lg-3 col-6 mt-2">
                                    <embed src="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" width="100%" frameborder="0" allowfullscreen>
                                    <a href="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" target="_blank"><b>`+wdf_file[i].fi_name+`</b></a>
                                </div>
                                `;
                            }

                            
                            console.log(ext);
                        }
                        $('#po_showImage_view').html(imageHtml);

                        checkstatus_controlsection_po(res.data.viewfulldata.wdf_status , formcode , res.data.viewfulldata.wdf_areaid ,res.data.viewfulldata.wdf_pricewithvat , res.data.viewfulldata.wdf_appgroup , res.data.viewfulldata.wdf_fnc_method , res.data.viewfulldata.wdf_fnc_money , res.data.viewfulldata.wdf_deptcode , res.data.viewfulldata.wdf_ecode);
                         
                    }
                })
            }
        }

        function conpriceWithComma(inputid)
        {
            $(inputid).val(function(index , value){
                value = value.replace(/,/g, '');
                return numberWithCommas(value);
            });
        }

        $(document).on('click' , '#btn-editpo' , function(){
            const data_formcode = $(this).attr("data_formcode");
            const data_formno = $(this).attr("data_formno");
            location.href = url+'main/po/po_edit_page/'+data_formcode+'/'+data_formno;
        });

        $(document).on('click' , '#btn-cancelpo' , function(){
            const data_formcode = $(this).attr("data_formcode");
            if(data_formcode != ""){
                swal({
                    title: 'ท่านต้องการยกเลิกรายการนี้ ใช่หรือไม่',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText:'ยกเลิก'
                }).then((result)=> {
                    if(result.value == true){
                        cancel_po(data_formcode);
                    }
                });
            }
        });

        function cancel_po(data_formcode)
        {
            if(data_formcode != ""){
                axios.post(url+'main/po/cancel_po' , {
                    action:'cancel_po',
                    data_formcode:data_formcode
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Update Data Success"){
                        location.href = url+'po.html';
                    }
                });
            }
        }

        function checkstatus_controlsection_po(status , formcode , areaid , pricewithVat , appgroup , fnc_method , fnc_money , doc_deptcode , doc_ecode)
        {
            switch(status){
                case "Open":


                    $('#ap_section_po').css('display' , '');
                    // control input

                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove_po(formcode , areaid);
                    }else{
                        $('#ip-po-apsec-user , #ip-po-apsec-dept , #ip-po-apsec-date , #ip-po-apsec-memo').prop('readonly' , true);
                        $('#btn-po-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-po-apsec-money-1"]').prop('checked' , false);
                    }

                    // Section check budget

                    break;
                case "Edit":


                    $('#ap_section_po').css('display' , '');
                    // control input

                    if(userpermission.u_ap_section == "yes"){
                        getdata_apApprove_po(formcode , areaid);
                    }else{
                        $('#ip-po-apsec-user , #ip-po-apsec-dept , #ip-po-apsec-date , #ip-po-apsec-memo').prop('readonly' , true);
                        $('#btn-po-saveAP').css('display' , 'none');
                        $('input:radio[id="ip-po-apsec-money-1"]').prop('checked' , false);
                    }

                    // Section check budget

                    break;
                case "AP passed inspection":

                    // Section Ap inspection
                    $('#ap_section_po').css('display' , '');
                    getdata_apApprove_po(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_po').css('display' , '');
                    
                    if(userpermission.u_acc_section == "yes"){
                        getdata_accApprove_po(formcode , areaid);
                    }else{
                        $('#ip-po-accSec-user , #ip-po-accSec-dept , #ip-po-accSec-date , #ip-po-accSec-memo').prop('readonly' , true);
                        $('#btn-po-saveAcc').css('display' , 'none');
                    }
                    
                    break;
                case "AP not pass inspection":

                    // Section Ap inspection
                    $('#ap_section_po').css('display' , '');
                    getdata_apApprove_po(formcode , areaid);
                    
                    break;
                case "Account passed inspection":

                    // Section Ap inspection
                    $('#ap_section_po').css('display' , '');
                    getdata_apApprove_po(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_po').css('display' , '');
                    getdata_accApprove_po(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section_po').css('display' , '');

                    if(userpermission.u_finance_section == "yes"){
                        getdata_financeApprove_po(formcode , areaid);
                    }else{
                        $('#ip-po-fnSec-user , #ip-po-fnSec-dept , #ip-po-fnSec-date , #ip-po-fnSec-memo').prop('readonly' , true);
                        $('#btn-po-saveFn').css('display' , 'none');
                    }

                    break;
                case "Account not pass inspection":

                    // Section check budget
                    $('#checkbudget_section_po').css('display' , '');
                    getdata_checkbudget_po(formcode , areaid);
                    // Section check budget

                    // Section manager approve
                    $('#manager_section_po').css('display' , '');
                    // checkpaygroup(pricewithVat , 'adv' , areaid , formcode);
                    getData_ManagerApproved_po(formcode , areaid);
                    // Section manager approve

                    // Section Ap inspection
                    $('#ap_section_po').css('display' , '');
                    getdata_apApprove_po(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_po').css('display' , '');
                    getdata_accApprove_po(formcode , areaid);

                    break;
                case "Complete":

                    // Section Ap inspection
                    $('#ap_section_po').css('display' , '');
                    getdata_apApprove_po(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_po').css('display' , '');
                    getdata_accApprove_po(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section_po').css('display' , '');
                    getdata_financeApprove_po(formcode , areaid);

                    if(userpermission.u_finance_section == "yes"){
                        $('.uploadFileFnSec').css('display' , '');
                    }else{
                        $('.uploadFileFnSec').css('display' , 'none');
                    }

                    break;
                case "Finance not pass inspection":
                    // Section Ap inspection
                    $('#ap_section_po').css('display' , '');
                    getdata_apApprove_po(formcode , areaid);

                    // Section Account Inspection
                    $('#account_section_po').css('display' , '');
                    getdata_accApprove_po(formcode , areaid);

                    // Section Finance Inspection
                    $('#finance_section_po').css('display' , '');
                    getdata_financeApprove_po(formcode , areaid);
                    break;
                


    
            }

            process_step_po(status , appgroup);
        }





        function getdata_apApprove_po(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/po/getdata_apApprove_po' , {
                    action:"getdata_apApprove_po",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let apData = res.data.apData;

                        if(apData.wdf_ap_appr != null){
                            let condateAp = moment(apData.wdf_ap_datetime).format('DD/MM/Y HH:mm:ss');

                            if(apData.wdf_ap_appr == "ผ่าน"){
                                $('#ip-po-apsec-appro-yes').prop('checked' , true);
                            }else if(apData.wdf_ap_appr == "ไม่ผ่าน"){
                                $('#ip-po-apsec-appro-no').prop('checked' , true);
                            }

                            if(apData.wdf_ap_moneymethod == "เงินสด/โอน"){
                                $('#ip-po-apsec-money-1').prop('checked' , true);
                            }else if(apData.wdf_ap_moneymethod == "เช็ค"){
                                $('#ip-po-apsec-money-2').prop('checked' , true);
                            }

                            $('input:radio[name=ip-po-apsec-money]').on('click' , function(e){e.preventDefault();
                            });

                            $('input:radio[name="ip-po-apsec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-po-apsec-user').val(apData.wdf_ap_user).prop('readonly' , true);
                            $('#ip-po-apsec-dept').val(apData.wdf_ap_dept).prop('readonly' , true);
                            $('#ip-po-apsec-date').val(condateAp).prop('readonly' , true);
                            $('#ip-po-apsec-memo').val(apData.wdf_ap_memo).prop('readonly' , true);
                            $('#btn-po-saveap-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-po-apsec-user').val(user).prop('readonly' , true);
                            $('#ip-po-apsec-dept').val(dept).prop('readonly' , true);
                            $('#ip-po-apsec-date').val(datetime).prop('readonly' , true);

                            $('#check-apsec-formcode-po').val(formcode);
                            $('#check-apsec-areaid-po').val(areaid);
                        }

                    }
                });
            }
        }


        function getdata_accApprove_po(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/po/getdata_accApprove_po' , {
                    action:"getdata_accApprove_po",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let accData = res.data.accData;

                        if(accData.wdf_acc_appr != null){
                            let condateAcc = moment(accData.wdf_acc_datetime).format('DD/MM/Y HH:mm:ss');

                            if(accData.wdf_acc_appr == "ผ่าน"){
                                $('#ip-po-accSec-appro-yes').prop('checked' , true);
                            }else if(accData.wdf_acc_appr == "ไม่ผ่าน"){
                                $('#ip-po-accSec-appro-no').prop('checked' , true);
                            }

                            $('input:radio[name="ip-po-accSec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-po-accSec-user').val(accData.wdf_acc_user).prop('readonly' , true);
                            $('#ip-po-accSec-dept').val(accData.wdf_acc_dept).prop('readonly' , true);
                            $('#ip-po-accSec-date').val(condateAcc).prop('readonly' , true);
                            $('#ip-po-accSec-memo').val(accData.wdf_acc_memo).prop('readonly' , true);
                            $('#btn-po-saveacc-section').css('display' , 'none');

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-po-accSec-user').val(user).prop('readonly' , true);
                            $('#ip-po-accSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-po-accSec-date').val(datetime).prop('readonly' , true);

                            $('#check-accsec-formcode-po').val(formcode);
                            $('#check-accsec-areaid-po').val(areaid);
                        }

                    }
                });
            }
        }


        function getdata_financeApprove_po(formcode , areaid)
        {
            if(formcode != "" && areaid != ""){
                axios.post(url+'main/po/getdata_financeApprove_po' , {
                    action:"getdata_financeApprove_po",
                    formcode:formcode,
                    areaid:areaid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let financeData = res.data.financeData;
                        let financeFile = res.data.financeFile;

                        if(financeData.wdf_fn_appr != null){
                            let condateAcc = moment(financeData.wdf_fn_datetime).format('DD/MM/Y HH:mm:ss');

                            if(financeData.wdf_fn_appr == "ผ่าน"){
                                $('#ip-po-fnSec-appro-yes').prop('checked' , true);
                            }else if(financeData.wdf_fn_appr == "ไม่ผ่าน"){
                                $('#ip-po-fnSec-appro-no').prop('checked' , true);
                            }

                            $('input:radio[name="ip-po-fnSec-appro"]').on('click' , function(e){e.preventDefault();
                            });

                            $('#ip-po-fnSec-user').val(financeData.wdf_fn_user).prop('readonly' , true);
                            $('#ip-po-fnSec-dept').val(financeData.wdf_fn_dept).prop('readonly' , true);
                            $('#ip-po-fnSec-date').val(condateAcc).prop('readonly' , true);
                            $('#ip-po-fnSec-memo').val(financeData.wdf_fn_memo).prop('readonly' , true);
                            $('#btn-po-savefn-section').css('display' , 'none');
                            // $('#ip-po-fnSec-file').css('display' , 'none');
                            $('#ip-po-fnSecshowfile').css('display' , '');

                            $('.btn-po-fnSec-file').attr({
                                'formcode':formcode,
                                'areaid':areaid
                            });
                            console.log();


                            if(financeFile !== null){
                                let imageHtml = '';
                                for(let i = 0; i < financeFile.length; i++){
                                    ext = financeFile[i].fi_name.split('.').pop().toLowerCase();

                                    if(ext != "pdf"){
                                        imageHtml +=`
                                        <div class="col-md-4 col-lg-3 col-6 mt-2">
                                            <a href="`+url+financeFile[i].fi_path+financeFile[i].fi_name+`" target="_blank">
                                                <img class="runImageView" src="`+url+financeFile[i].fi_path+financeFile[i].fi_name+`">
                                            </a>
                                            <a href="`+url+financeFile[i].fi_path+financeFile[i].fi_name+`" target="_blank"><b>`+financeFile[i].fi_name+`</b></a>
                                            <i class="fa fa-trash del-file-fn-po" aria-hidden="true"
                                                data_fiautoid="`+financeFile[i].fi_autoid+`"
                                                data_fipath="`+financeFile[i].fi_path+`"
                                                data_finame="`+financeFile[i].fi_name+`"
                                            ></i>
                                        </div>
                                        `;
                                    }else{
                                        imageHtml +=`
                                        <div class="col-md-4 col-lg-3 col-6 mt-2">
                                            <embed src="`+url+financeFile[i].fi_path+financeFile[i].fi_name+`" width="100%" frameborder="0" allowfullscreen>
                                            <a href="`+url+financeFile[i].fi_path+financeFile[i].fi_name+`" target="_blank"><b>`+financeFile[i].fi_name+`</b></a>
                                            <i class="fa fa-trash del-file-fn-po" aria-hidden="true"
                                                data_fiautoid="`+financeFile[i].fi_autoid+`"
                                                data_fipath="`+financeFile[i].fi_path+`"
                                                data_finame="`+financeFile[i].fi_name+`"
                                            ></i>
                                        </div>
                                        `;
                                    }

                                    
                                    console.log(ext);
                                }
                                $('#ip_showImageFn').html(imageHtml);

                                if(userpermission.u_finance_section == "yes"){
                                    $('.del-file-fn-po').css('display' , '');
                                }else{
                                    $('.del-file-fn-po').css('display' , 'none');
                                }

                                $(document).on('click' , '.del-file-fn-po' , function(){

                                    swal({
                                        title: 'ท่านต้องการลบรูปนี้ ใช่หรือไม่',
                                        type: 'warning',
                                        showCancelButton: true,
                                        confirmButtonClass: 'btn btn-success',
                                        cancelButtonClass: 'btn btn-danger',
                                        confirmButtonText: 'ยืนยัน',
                                        cancelButtonText:'ยกเลิก'
                                    }).then((result)=> {
                                        if(result.value == true){
                                            const data_fiautoid = $(this).attr('data_fiautoid');
                                            const data_fipath = $(this).attr('data_fipath');
                                            const data_finame = $(this).attr('data_finame');

                                            //function Delete File Fn Section
                                            del_file_fnSec(data_fiautoid , data_fipath , data_finame , formcode , areaid);
                                        }
                                    });

                                });

                            }

                        }else{
                            let user = "<?php echo getUser()->Fname." ".getUser()->Lname; ?>";
                            let dept = "<?php echo getUser()->Dept; ?>";
                            let datetime = "<?php echo date("d/m/Y H:i:s"); ?>";

                            $('#ip-po-fnSec-user').val(user).prop('readonly' , true);
                            $('#ip-po-fnSec-dept').val(dept).prop('readonly' , true);
                            $('#ip-po-fnSec-date').val(datetime).prop('readonly' , true);

                            $('#check-fnsec-formcode-po').val(formcode);
                            $('#check-fnsec-areaid-po').val(areaid);
                        }
                        

                    }
                });
            }
        }

        function del_file_fnSec(data_fiautoid , data_fipath , data_finame , formcode , areaid)
        {
            if(data_fiautoid != "" && data_fipath != "" && data_finame != ""){
                axios.post(url+'main/po/del_file_fnSec' , {
                    action:"del_file_fnSec",
                    data_fiautoid:data_fiautoid,
                    data_fipath:data_fipath,
                    data_finame:data_finame
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Delete Data Success"){
                        getdata_financeApprove_po(formcode , areaid);
                    }
                });
            }
        }



        function process_step_po(status , appgroup)
        {
            if(status != "" || status != null){
                if(status == "Open" || status == "Edit"){
                    $('.po-proc-open').addClass('active');

                }else if(status == "User cancel"){
                    $('.po-proc-open').addClass('notactive');

                }else if(status == "AP passed inspection"){
                    $('.po-proc-open').addClass('active');
                    $('.po-proc-ap').addClass('active');
                }else if(status == "AP not pass inspection"){
                    $('.po-proc-open').addClass('active');
                    $('.po-proc-ap').addClass('notactive');

                }else if(status == "Account passed inspection"){
                    $('.po-proc-open').addClass('active');
                    $('.po-proc-ap').addClass('active');
                    $('.po-proc-acc').addClass('active');

                }else if(status == "Account not pass inspection"){
                    $('.po-proc-open').addClass('active');
                    $('.po-proc-ap').addClass('active');
                    $('.po-proc-acc').addClass('notactive');

                }else if(status == "Complete"){
                    $('.po-proc-open').addClass('active');
                    $('.po-proc-ap').addClass('active');
                    $('.po-proc-acc').addClass('active');
                    $('.po-proc-finance').addClass('active');

                }else if(status == "Finance not pass inspection"){
                    $('.po-proc-open').addClass('active');
                    $('.po-proc-ap').addClass('active');
                    $('.po-proc-acc').addClass('active');
                    $('.po-proc-finance').addClass('notactive');
                }
            }
        }



        function getPoCurrencyFromDb(currency)
        {
            if(currency === null){
                currency = "THB";
            }
            axios.get(url+'main/po/getPoCurrencyFromDb').then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let result = res.data.result;
                    let output = ``;
                    for(let i = 0; i < result.length ; i++){
                        output +=`
                        <option value="`+result[i].cu_name+`">`+result[i].cu_name+`</option>
                        `;
                    }
                    $('#ipv-po-currency').html(output);
                    $('#ipv-po-currency').attr("style", "pointer-events: none;");
                    $('#ipv-po-currency option[value="'+currency+'"]').prop("selected" , true);

                    if(currency !== ""){
                        $('.bgBath').text(currency);
                        $('.bgBath2').text(currency);
                    }

                  
                }
            });
        }
        





        



        



    });
</script>