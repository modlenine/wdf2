<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแก้ไข ใบขอเบิกจ่ายเงินเดือน</title>
</head>
<body>

    <!-- add new detail modal -->
    <div class="modal fade bs-example-modal-lg" id="addnewdetaile-po-modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">

            <form id="frme_savenewdetailtoTbl_po" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <h4>เพิ่มรายการ</h4>
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                </div>

                <div class="modal-header">
                    
                    <div>
                        <button type="submit" class="btn btn-success" id="btne-savePoAddnewDetail" name="btne-savePoAddnewDetail"><i class="fi-save mr-2"></i>บันทึก</button>
                    </div>
                    <div>

                    </div>
                </div>

                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>รายการค่าใช้จ่าย</b></label>
                            <input type="text" name="poe-detaillist-addnew" id="poe-detaillist-addnew" class="form-control" required>
                            <div id="showe-po-accodelist"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for=""><b>Ac Code</b></label>
                            <input type="text" name="poe-accode-addnew" id="poe-accode-addnew" class="form-control" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for=""><b>รหัสฝ่าย</b></label>
                            <i class="fa fa-edit btneEditDept_po"></i>
                            <input type="text" name="poe-deptcode-addnew" id="poe-deptcode-addnew" class="form-control" value="<?=getUser()->DeptCode?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for=""><b>Ac Code (Name)</b></label>
                            <input type="text" name="poe-accodename-addnew" id="poe-accodename-addnew" class="form-control" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for=""><b>จำนวนเงิน (<span class="bgBath2">THB</span>)</b><span class="textRequest"> * </span></label>
                            <input type="text" name="poe-price-addnew" id="poe-price-addnew" class="form-control" required>
                            <div id="alert-poe-price-addnew"></div>
                        </div>

                        <input hidden type="text" name="poe-autoid-addnew" id="poe-autoid-addnew">
                    </div>
                </div>
            
            </div>
            </form>
        </div>
    </div>
    <!-- add new detail modal -->

    <div class="modal fade bs-example-modal-lg" id="showPoe-po-modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">

            <div class="modal-content">
                <div class="modal-header">
                    <h4>รายการ Po รอดำเนินการ</h4>
                    <div>
                        <button type="button" class="close closePolistEdit" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div id="show-poe-byVendor"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- add new detail modal -->



    <div class="main-container">
		<div class="pd-ltr-20">

			<div class="card-box pd-20 height-100-p mb-30">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h4>หน้าแก้ไขรายการ ใบขอเบิกจ่าย (PO)</h4>
                        <h6>PO</h6>
                    </div>
                </div>
                <hr class="poHr">
                
                <div class="card-box pd-20 height-100-p mb-30">
                <form id="frm_saveDataPoNew_edit" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>

                    <section id="add-po-sec1-edit">
                        <div class="row form-group" id="ip-po-sec1-edit">
                            <div class="col-md-12">
                                <label for=""><b>กรุณาเลือกบริษัท</b></label>
                                <div class="row">
                                    <div class="col-lg-12 form-inline">
                                        <div class="custom-control custom-radio mb-5 ml-3">
                                            <input type="radio" id="ipe-po-areaid-sc" name="ipe-po-areaid" value="sc" class="custom-control-input" required> 
                                            <label for="ipe-po-areaid-sc" class="custom-control-label">Salee Colour Public Company Limited.</label>
                                        </div> 
                                        <div class="custom-control custom-radio mb-5 ml-3">
                                            <input type="radio" id="ipe-po-areaid-pa" name="ipe-po-areaid" value="pa" class="custom-control-input" required> 
                                            <label for="ipe-po-areaid-pa" class="custom-control-label">Poly Meritasia Co.,Ltd.</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-5 ml-3">
                                            <input type="radio" id="ipe-po-areaid-ca" name="ipe-po-areaid" value="ca" class="custom-control-input" required> 
                                            <label for="ipe-po-areaid-ca"class="custom-control-label">Composite Asia Co.,Ltd.</label>
                                        </div> 
                                        <div class="custom-control custom-radio mb-5 ml-3">
                                            <input type="radio" id="ipe-po-areaid-st" name="ipe-po-areaid" value="st" class="custom-control-input" required> <label for="ipe-po-areaid-st" class="custom-control-label">Subterra Co.,Ltd.</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-5 ml-3">
                                            <input type="radio" id="ipe-po-areaid-tb" name="ipe-po-areaid" value="tb" class="custom-control-input" required> 
                                            <label for="ipe-po-areaid-tb"class="custom-control-label">The bubbles Co.,Ltd.</label>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group" id="ipe-po-sec2">
                            <div class="col-md-6 form-group">
                                <label for=""><b>กรุณาพิมพ์ข้อมูล Vendor ( ค้นหาโดย Taxid , TH , ชื่อบริษัท )</b></label>
                                <input type="text" name="ipe-po-chooseVendor" id="ipe-po-chooseVendor" class="form-control">
                                <div id="po-show-vendorList-edit" class="mt-3"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>Vendor ที่เลือก</b></label>
                                <input type="text" name="ipe-po-selectVendor" id="ipe-po-selectVendor" class="form-control" readonly>
                            </div>
                        </div>
                    </section>


                    <section id="add-poe-sec2">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for=""><b>หมายเหตุ</b></label>
                                <input type="text" name="ipe-po-memo" id="ipe-po-memo" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for=""><b>ชื่อผู้ร้องขอ</b></label>
                                <input type="text" name="ipe-po-username" id="ipe-po-username" class="form-control" value="<?=getUser()->Fname." ".getUser()->Lname?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for=""><b>รหัสพนักงาน</b></label>
                                <input type="text" name="ipe-po-ecode" id="ipe-po-ecode" class="form-control" value="<?=getUser()->ecode?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for=""><b>แผนก</b></label>
                                <input type="text" name="ipe-po-dept" id="ipe-po-dept" class="form-control" value="<?=getUser()->Dept?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for=""><b>วันที่ออกเอกสาร</b></label>
                                <input type="text" name="ipe-po-date" id="ipe-po-date" class="form-control" value="<?=date("d/m/Y H:i:s")?>" readonly>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for=""><b>ชื่อผู้รับเงิน</b></label>
                                <input type="text" name="ipe-po-userreceive" id="ipe-po-userreceive" class="form-control" value="<?=getUser()->Fname." ".getUser()->Lname?>">
                            </div>
                            <div class="col-md-8">
                                <label for=""><b>รายละเอียดผู้รับเงิน</b></label>
                                <input type="text" name="ipe-po-userreceiveDetail" id="ipe-po-userreceiveDetail" class="form-control">
                            </div>
                        </div>
                        <hr>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for=""><b>สกุลเงิน</b></label>
                                <select name="ipe-po-currency" id="ipe-po-currency" class="form-control"></select>
                            </div>
                            <div class="col-md-6">
                                <label for=""><b>เลขที่ PO</b></label>
                                <input type="text" name="ipe-po-ponumber" id="ipe-po-ponumber" class="form-control" required>
                            </div>
                        </div>

                        <div class="card card-box">
                            <div class="card-header">
                                รายการ
                            </div>
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                    <i class="fa fa-plus-circle poAddDetaile" data-toggle="tooltip" data-placement="left" title="" data-original-title="เลือกรายการเบิกตรงนี้"></i>
                                        <div id="" class="table-responsive">
                                            <table id="tbl_po_edit" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="advN-th1">ลำดับ</th>
                                                        <th class="advN-th2">รายการเบิก</th>
                                                        <th class="advN-th3">รหัสฝ่าย</th>
                                                        <th class="advN-th4">Account Code</th>
                                                        <th class="advN-th5">Account Code (Name)</th>
                                                        <th class="advN-th6">จำนวนเงิน</th>
                                                        <th class="advN-th7">#</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="showDataPolistAftersave_e"></tbody>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" name="ipe-podetail-priceNonVat" id="ipe-podetail-priceNonVat" class="form-control" placeholder="ยอดรวม" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bgBath" id="basic-addon1">บาท</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <select name="ipe-podetail-vat7" id="ipe-podetail-vat7" class="form-control">
                                            <option value="0">ไม่มี Vat</option>
                                            <option value="7">Vat 7%</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" name="ipe-podetail-vat7Price" id="ipe-podetail-vat7Price" class="form-control" placeholder="จำนวนเงิน Vat" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bgBath" id="basic-addon1">บาท</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <select name="ipe-podetail-vat3" id="ipe-podetail-vat3" class="form-control">
                                            <option value="0">ไม่มี หัก ณ ที่จ่าย</option>
                                            <option value="1">หัก ณ ที่จ่าย 1%</option>
                                            <option value="2">หัก ณ ที่จ่าย 2%</option>
                                            <option value="3">หัก ณ ที่จ่าย 3%</option>
                                            <option value="5">หัก ณ ที่จ่าย 5%</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" name="ipe-podetail-vat3Price" id="ipe-podetail-vat3Price" class="form-control" placeholder="จำนวนเงินหัก ณ ที่จ่าย" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bgBath" id="basic-addon1">บาท</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" name="ipe-podetail-priceTotal" id="ipe-podetail-priceTotal" class="form-control" placeholder="ยอดรวมสุทธิ" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bgBath" id="basic-addon1">บาท</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-lg-12 bottommargin">
                                        <label><b>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</b></label>
                                        <div id="po_showImage_e" class="row form-group"></div>
                                        <br>
                                        <input id="ipe-podetail-file" name="ipe-podetail-file[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*,.pdf" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <button type="submit" id="btn-savePoDatae" name="btn-savePoDatae" class="btn btn-warning" ><i class="dw dw-diskette1 mr-2"></i>บันทึกการแก้ไขข้อมูล</button>
                                    </div>
                                </div>

                                <!-- Check Zone -->
                                <input hidden type="text" name="edit_formcode_po" id="edit_formcode_po">
                            </div>
                        </div>
                    </section>

                </form>
                </div>
			</div>

		</div>

	</div>
</body>
</html>

<script>
    $(document).ready(function(){

        let po_addDetail_array = [];
        let formcode = "<?php echo $formcode?>";
        let formno = "<?php echo $formno?>";

        let vendorData = {
            'accountnum':'',
            'address':'',
            'bpc_whtid':'',
            'dataareaid':'',
            'dataareaid_long':'',
            'email':'',
            'name':'',
            'paymtermid':'',
            'phone':'',
            'slc_fname':'',
            'slc_lname':'',
            'street':'',
            'vendgroup':''
        };

        let poMainData = {
            'amount':0,
            'batchid':'',
            'bpc_documentdate':'',
            'bpc_purchasereqno':'',
            'dataareaid':'',
            'deliverydate':'',
            'invoiceaccount':'',
            'itemnames':'',
            'items':'',
            'purchaseorderid':'',
            'purchid':'',
            'purchorderdate':'',
            'purchorderdocnum':'',
            'purchunit':'',
            'qty':0,
            'salesorderbalance':0
        }

        po_getDataviewfull_edit();
        load_po_liste();



        // Get Old data
        function po_getDataviewfull_edit()
        {
            if(formcode != ""){
                axios.post(url+'main/po/po_getDataviewfull' , {
                    action:'po_getDataviewfull',
                    formcode:formcode,
                    formno:formno
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let currency = res.data.viewfulldata.wdf_currency;
                        getPoCurrencyFromDb_edit(currency);
                        // $('input:radio[name="ipe-adv-areaid"]').on('click' , function(e){
                        //     e.preventDefault();
                        // });

                        // $('#showFormno_adv').html(res.data.viewfulldata.wdf_formno);
                        // $('#btn-editadvance').attr('data_formcode' , formcode);
                        $('#edit_formcode_po').val(formcode);

                        if(res.data.viewfulldata.wdf_areaid == "sc"){
                            $('#ipe-po-areaid-sc').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "pa"){
                            $('#ipe-po-areaid-pa').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "ca"){
                            $('#ipe-po-areaid-ca').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "st"){
                            $('#ipe-po-areaid-st').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "tb"){
                            $('#ipe-po-areaid-tb').prop('checked' , true);
                        }

                        let condate = moment(res.data.viewfulldata.wdf_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ipe-po-memo').val(res.data.viewfulldata.wdf_memo);

                        $('#ipe-po-ponumber').val(res.data.viewfulldata.wdf_ponumber);

                        $('#ipe-po-selectVendor').val(res.data.viewfulldata.wdf_userreceived_detail);


                        $('#ipe-po-userreceive').val(res.data.viewfulldata.wdf_userreceive);
                        $('#ipe-po-userreceiveDetail').val(res.data.viewfulldata.wdf_userreceived_detail);
                        
                        let convat1ToInt = parseInt(res.data.viewfulldata.wdf_vat1);
                        $('#ipe-podetail-vat7 option[value="'+convat1ToInt+'"]').prop("selected" , true);

                        let convat2ToInt = parseInt(res.data.viewfulldata.wdf_vat2);
                        $('#ipe-podetail-vat3 option[value="'+convat2ToInt+'"]').prop("selected" , true);

                        // WDF Trans Detail
                        let wdf_trans = res.data.viewfulldata_trans;
                        // let wdf_trans_html = ``;
                        // let runningnumber = 1;



                        // $('#tbl_advance_edit').DataTable().destroy();
                        // $('#tbl_advance_edit').DataTable();
                        for(let i = 0; i < wdf_trans.length; i++){

                           let saveDataDetail = {
                            "detaillist":wdf_trans[i].tr_detailname,
                            "accode":wdf_trans[i].tr_detailaccode,
                            "accodename":wdf_trans[i].tr_detailaccodename,
                            "deptcode":wdf_trans[i].tr_deptcode,
                            "price":wdf_trans[i].tr_money,
                            "detailautoid":wdf_trans[i].tr_autoid
                            }

                            po_addDetail_array.push(saveDataDetail);
                            load_po_liste();
                        }

                        // Show Image View
                        let wdf_file = res.data.viewfulldata_image;
                        loadfile_edit_po(wdf_file);
                    }
                })
            }
        }


        function loadfile_edit_po(wdf_file)
        {
            let imageHtml = ``;
            let ext;
            for(let i = 0; i < wdf_file.length; i++){
                ext = wdf_file[i].fi_name.split('.').pop().toLowerCase();

                if(ext != "pdf"){
                    imageHtml +=`
                    <div class="col-md-4 col-lg-3 col-6 mt-2 divImage">
                        <a href="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" data-toggle="lightbox">
                            <img class="runImageView" src="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`">
                        </a>
                        <a href="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" data-toggle="lightbox"><b>`+wdf_file[i].fi_name+`</b></a>
                        <i class="fa fa-trash del-file-edit-po" aria-hidden="true" 
                            data_formcode="`+wdf_file[i].fi_formcode+`"
                            data_path="`+wdf_file[i].fi_path+`"
                            data_name="`+wdf_file[i].fi_name+`"
                        ></i>
                    </div>
                    `;
                }else{
                    imageHtml +=`
                    <div class="col-md-4 col-lg-3 col-6 mt-2 divImage">
                        <embed src="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" width="100%" frameborder="0" allowfullscreen>
                        <a href="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" target="_blank"><b>`+wdf_file[i].fi_name+`</b></a>
                        <i class="fa fa-trash del-file-edit-po" aria-hidden="true" 
                            data_formcode="`+wdf_file[i].fi_formcode+`"
                            data_path="`+wdf_file[i].fi_path+`"
                            data_name="`+wdf_file[i].fi_name+`"
                        ></i>
                    </div>
                    `;
                }

                
                console.log(ext);
            }
            $('#po_showImage_e').html(imageHtml);
        }


        function conpriceWithComma(inputid)
        {
            $(inputid).val(function(index , value){
                value = value.replace(/,/g, '');
                return numberWithCommas(value);
            });
        }



        function load_po_liste()
        {

            $('#tbl_po_edit').DataTable().destroy();
            $('#tbl_po_edit').DataTable();

            if(po_addDetail_array.length != 0){
                let tbl_detaillistAftersave = ``;
                let runningnumber = 1;
                let priceWithVat7 = 0;
                let vat7 = 0;
                let priceNoneVat = 0;
                
                
                vat7 = parseFloat($('#ipe-podetail-vat7').val());


                for(let i = 0; i < po_addDetail_array.length; i++){
                    tbl_detaillistAftersave += `
                    <tr>
                        <td>`+runningnumber+`</td>
                        <td>`+po_addDetail_array[i].detaillist+`<input hidden type="text" id="inpute-po-detaillist" name="inpute-po-detaillist[]" value="`+po_addDetail_array[i].detaillist+`"></td>
                        <td>`+po_addDetail_array[i].deptcode+`<input hidden type="text" id="inpute-po-deptcode" name="inpute-po-deptcode[]" value="`+po_addDetail_array[i].deptcode+`"></td>
                        <td>`+po_addDetail_array[i].accode+`<input hidden type="text" id="inpute-po-accode" name="inpute-po-accode[]" value="`+po_addDetail_array[i].accode+`"></td>
                        <td>`+po_addDetail_array[i].accodename+`<input hidden type="text" id="inpute-po-accodename" name="inpute-po-accodename[]" value="`+po_addDetail_array[i].accodename+`"></td>
                        <td>`+numberWithCommas(po_addDetail_array[i].price)+`<input hidden type="text" id="inpute-po-price" name="inpute-po-price[]" value="`+po_addDetail_array[i].price+`"></td>
                        <td>
                            <i class="fa fa-trash del-po-detailListe" aria-hidden="true"
                                data_detailIndex="`+i+`"
                            ></i>
                            <input hidden type="text" id="inpute-po-detailautoid" name="inpute-po-detailautoid[]" value="`+po_addDetail_array[i].detailautoid+`">
                            <input hidden type="text" id="inputse-itemid" name="inputse-itemid[]" value="`+po_addDetail_array[i].itemid+`">
                            <input hidden type="text" id="inputse-itemname" name="inputse-itemname[]" value="`+po_addDetail_array[i].itemname+`">
                            <input hidden type="text" id="inputse-itemgroup" name="inputse-itemgroup[]" value="`+po_addDetail_array[i].itemgroup+`">
                        </td>
                       
                    </tr>
                    `;
                    runningnumber++;
                    let conPrice = po_addDetail_array[i].price.split(",").join("");
                    priceNoneVat = priceNoneVat+parseFloat(conPrice);
                }

                $('#showDataPolistAftersave_e').html(tbl_detaillistAftersave);
                $('#ipe-podetail-priceNonVat').val(priceNoneVat.toFixed(2));
                $('#ipe-podetail-priceNonVat').val(function(index , value){
                    value = value.replace(/,/g, '');
                    return numberWithCommas(value);
                });


                checkVatInputAll_edit_po($('#ipe-podetail-vat3').val() , $('#ipe-podetail-vat7').val() , priceNoneVat);

                
            }else{
                $('#ipe-podetail-priceNonVat').val(0.00);
                $('#ipe-podetail-vat7Price').val(0.00);
                $('#ipe-podetail-vat3Price').val(0.00);
                $('#ipe-podetail-priceTotal').val(0.00);
            }

        }

        $(document).on('change' , '#ipe-podetail-vat7' , function(){
            let vat3 = $('#ipe-podetail-vat3').val();
            let vat7 = $('#ipe-podetail-vat7').val();
            let priceNoneVat = $('#ipe-podetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll_edit_po(vat3 , vat7 , priceNoneVat);
        });

        $(document).on('change' , '#ipe-podetail-vat3' , function(){
            let vat3 = $('#ipe-podetail-vat3').val();
            let vat7 = $('#ipe-podetail-vat7').val();
            let priceNoneVat = $('#ipe-podetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll_edit_po(vat3 , vat7 , priceNoneVat);
        });


        $(document).on('click' , '.poAddDetaile' , function(){
            $('#addnewdetaile-po-modal').modal('show');
            clearAddnewDetailModal_po();
        });

        $(document).on('click' , '.btneEditDept_po' , function(){
            $('#poe-deptcode-addnew').prop('readonly' , false);
        });

        function clearAddnewDetailModal_po()
        {
            $('#poe-deptcode-addnew').prop('readonly' , true);
            $('#poe-detaillist-addnew').val('');
            $('#poe-accode-addnew').val('');
            $('#poe-accodename-addnew').val('');
            $('#poe-price-addnew').val('');
            $('#frme_savenewdetailtoTbl_po').removeClass('was-validated');
        }

        $(document).on('keyup' , '#poe-detaillist-addnew' , function(){
            if($(this).val() != ""){
                getAcCodeListe_po($(this).val());
            }else{
                $('#showe-po-accodelist').html('');
            }
        });
        function getAcCodeListe_po(accodeInput)
        {
            if(accodeInput != ""){
                axios.post(url+'main/po/getAcCodeList' , {
                    action:"getAcCodeList",
                    accodeInput:accodeInput
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let accodelistData = res.data.result;
                        let outputHtml = `<ul class="list-group mt-2 selectAcCodeListeUl">`;
                                for(let i = 0; i < accodelistData.length; i++){
                                    outputHtml += `
                                    <li class="list-group-item list-group-item list-group-item-action selectAcCodeListeLi"
                                        data_detailwdf_name = "`+accodelistData[i].detailwdf_name+`"
                                        data_detailwdf_accodename = "`+accodelistData[i].detailwdf_accodename+`"
                                        data_detailwdf_accode = "`+accodelistData[i].detailwdf_accode+`"
                                        data_detailwdf_id = "`+accodelistData[i].detailwdf_id+`"
                                    >
                                        <span>`+accodelistData[i].detailwdf_name+` | `+accodelistData[i].detailwdf_accodename+` | `+accodelistData[i].detailwdf_accode+`</span>
                                    </li>
                                    `;
                                }
                                outputHtml += `</ul>`;
                                $('#showe-po-accodelist').html(outputHtml);
                    }
                });
            }
        }

        $(document).on('click' , '.selectAcCodeListeLi' , function(){
            const data_detailwdf_name = $(this).attr("data_detailwdf_name");
            const data_detailwdf_accodename = $(this).attr("data_detailwdf_accodename");
            const data_detailwdf_accode = $(this).attr("data_detailwdf_accode");
            const data_detailwdf_id = $(this).attr("data_detailwdf_id");

            $('#poe-detaillist-addnew').val(data_detailwdf_name);
            $('#poe-accode-addnew').val(data_detailwdf_accode);
            $('#poe-accodename-addnew').val(data_detailwdf_accodename);
            $('#poe-autoid-addnew').val(data_detailwdf_id);
            $('#showe-po-accodelist').html('');
        });


        $(document).on('keyup' , '#poe-price-addnew' , function(event){
            // skip for arrow keys 
            if (event.which >= 37 && event.which <= 40) 
                    return; 
                // format number 
                $(this).val(function (index, value) { 
                    // return value 
                    //     .replace(/\D/g, "") 
                    //     .replace(/\B(?=(\d{3})+(?!\d))/g, ",") 
                    //     ; 
                    value = value.replace(/,/g, '');
                    return numberWithCommas(value);
                });


            if(keynumberOnly($(this).val()) == false){
                let alert = `
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <strong>แจ้งเตือน !</strong> กรุณากรอกเฉพาะตัวลขเท่านั้น !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                `;
                $('#btne-savePoAddnewDetail').prop('disabled' , true);
                $('#alert-poe-price-addnew').html(alert);
            }else{
                $('#btne-savePoAddnewDetail').prop('disabled' , false);
                $('#alert-poe-price-addnew').html('');
            }

        });



        $('#frme_savenewdetailtoTbl_po').on('submit' , function(e){
            e.preventDefault();
            if($('#poe-detaillist-addnew').val() != "" && $('#poe-accode-addnew').val() != "" && $('#poe-accodename-addnew').val() != "" && $('#poe-deptcode-addnew').val() != "" && $('#poe-price-addnew').val() != ""){

                $('#btne-po-saveAdvAddnewDetail').prop('disabled' , true);
                saveDetailDataToArraye_po();
            }else{
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วยค่ะ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }
        });
        function saveDetailDataToArraye_po()
        {
            const detaillist = $('#poe-detaillist-addnew').val();
            const accode = $('#poe-accode-addnew').val();
            const accodename = $('#poe-accodename-addnew').val();
            const deptcode = $('#poe-deptcode-addnew').val();
            const price = $('#poe-price-addnew').val();
            const autoid = $('#poe-autoid-addnew').val();

            let saveDataDetail = {
                "detaillist":detaillist,
                "accode":accode,
                "accodename":accodename,
                "deptcode":deptcode,
                "price":price,
                "detailautoid":autoid
            }

            po_addDetail_array.push(saveDataDetail);
            console.log(po_addDetail_array);
            $('#btne-savePoAddnewDetail').prop('disabled' , false);
            $('#addnewdetaile-po-modal').modal('hide');
            load_po_liste();
        }

        $(document).on('click' , '.del-po-detailListe' , function(){
            swal({
                title: 'ท่านต้องการลบรายการนี้ ใช่หรือไม่',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText:'ยกเลิก'
            }).then((result)=> {
                if(result.value == true){
                    const data_detailIndex = $(this).attr("data_detailIndex");
                    po_addDetail_array.splice(data_detailIndex , 1);
                    load_po_liste();
                }
            });

        });

        $('#frm_saveDataPoNew_edit').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name="ipe-po-areaid"]').val() != "" && $('#ipe-podetail-priceTotal').val() != ""){
                saveDataPoNew_edit();
            }else{
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วยค่ะ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }
        });

        function saveDataPoNew_edit()
        {
            const form = $('#frm_saveDataPoNew_edit')[0];
            const data = new FormData(form);

            axios.post(url+'main/po/saveDataPoNew_edit' , data , {
                header:{
                    'Content-Type' : 'multipart/form-data'
                },
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
                    swal({
                        title: 'บันทึกข้อมูลเรียบร้อย',
                        type: 'success',
                        showConfirmButton: false,
                        timer:1000
                    }).then(function(){
                        location.href = url+'po.html';
                    });
                }
            });
        }


        $(document).on('click' , '.del-file-edit-po' , function(){
            swal({
                title: 'ท่านต้องการลบรายการนี้ ใช่หรือไม่',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText:'ยกเลิก'
            }).then((result)=> {
                if(result.value == true){
                    const data_formcode = $(this).attr('data_formcode');
                    const data_path = $(this).attr('data_path');
                    const data_name = $(this).attr('data_name');
                    delFile_edit_po(data_formcode , data_path , data_name);
                }
            });
        });
        function delFile_edit_po(data_formcode , data_path , data_name)
        {
            if(data_formcode != "" && data_path != "" && data_name != ""){
                axios.post(url+'main/po/delFile_edit_po',{
                    action:"delFile_edit_po",
                    data_formcode:data_formcode,
                    data_path:data_path,
                    data_name:data_name
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status =="Delete Data Success"){
                        let wdf_file = res.data.viewfulldata_image;
                        swal({
                            title: 'ลบรูปภาพที่ต้องการสำเร็จ',
                            type: 'success',
                            showConfirmButton: false,
                            timer:1000
                        }).then(function(){
                            loadfile_edit_po(wdf_file);
                        });
                    }
                });
            }
        }


        function getPoCurrencyFromDb_edit(currency)
        {
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
                    $('#ipe-po-currency').html(output);

                    $('#ipe-po-currency option[value="'+currency+'"]').prop("selected" , true);
                    if(currency !== "THB"){
                        $('#ipe-podetail-vat7').attr("style", "pointer-events: none;");
                        $('#ipe-podetail-vat3').attr("style", "pointer-events: none;");
                    }else{
                        $('#ipe-podetail-vat7').attr("style", "pointer-events: ;");
                        $('#ipe-podetail-vat3').attr("style", "pointer-events: ;");
                    }
                    if(currency !== ""){
                        $('.bgBath').text(currency);
                        $('.bgBath2').text(currency);
                    }

                    $(document).on('change' , '#ipe-po-currency' , function(){
                        if($(this).val() !== ""){
                            $('.bgBath').text($(this).val());
                            $('.bgBath2').text($(this).val());
                        }

                        $('#ipe-podetail-vat3').val("0");
                        $('#ipe-podetail-vat7').val("0")

                        let vat3 = $('#ipe-podetail-vat3').val();
                        let vat7 = $('#ipe-podetail-vat7').val();
                        let priceNoneVat = $('#ipe-podetail-priceNonVat').val().replace(/,/g, "");

                        if($(this).val() !== "THB"){
                            $('#ipe-podetail-vat7').attr("style", "pointer-events: none;");
                            $('#ipe-podetail-vat3').attr("style", "pointer-events: none;");
                            vat3 = 0;
                            vat7 = 0;
                        }else{
                            $('#ipe-podetail-vat7').attr("style", "pointer-events: ;");
                            $('#ipe-podetail-vat3').attr("style", "pointer-events: ;");
                        }

                        checkVatInputAll_edit_po(vat3 , vat7 , priceNoneVat);
                    });
                }
            });
        }


        //search vendor data
        $('input[name="ipe-po-areaid"]').on('change', function() {
            let selectedValue = $('input[name="ipe-po-areaid"]:checked').val();
            $('#ipe-po-selectVendor').val('');
            $('#ipe-po-chooseVendor').val('');
            $('#show-poe-byVendor').html('');
            $('#po-show-vendorList-edit').html('');
            $('#ipe-po-ponumber').val('');
            po_addDetail_array = [];
            if(selectedValue){
                $('#ipe-po-sec2').css("display" , "");
            }else{
                $('#ipe-po-sec2').css("display" , "none");
            }

            $('#add-poe-sec2').css('display' , 'none');
            load_po_liste();
        });


        $("#ipe-po-chooseVendor").keyup(function(){
            let vendDataSearch = $(this).val();
            let selectedValue = $('input[name="ipe-po-areaid"]:checked').val();

            if(selectedValue == "sc"){
                selectedValue = "sln";
            }else if(selectedValue == "pa"){
                selectedValue = "poly";
            }else if(selectedValue == "ca"){
                selectedValue = "ca";
            }else if(selectedValue == "st"){
                selectedValue = "st";
            }else if(selectedValue == "tb"){
                selectedValue = "tbb";
            }else{
                selectedValue = "";
            }

            if($(this).val() != ""){
                getVendinformation(vendDataSearch , selectedValue);
            }else{
                $('#po-show-vendorList-edit').html("");
            }
        });

        function getVendinformation(vendDataSearch , dataareaid)
        {
            const formdata = new FormData();
            formdata.append('vendDataSearch' , vendDataSearch);
            formdata.append('dataareaid' , dataareaid)

            axios.post(url+'main/po/getVendinformation' , formdata).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let vendorDataList = res.data.result;
                    let outputHtml = `<ul class="list-group mt-2 selectVendorListUlEdit">`;
                    for(let i = 0; i < vendorDataList.length; i++){
                        outputHtml += `
                        <li class="list-group-item list-group-item list-group-item-action selectVendorListLiEdit"
                            data_accountnum = "`+vendorDataList[i].accountnum+`"
                            data_address = "`+vendorDataList[i].address+`"
                            data_bpc_whtid = "`+vendorDataList[i].bpc_whtid+`"
                            data_dataareaid = "`+vendorDataList[i].dataareaid+`"
                            data_dataareaid_long = "`+vendorDataList[i].dataareaid_long+`"
                            data_email = "`+vendorDataList[i].email+`"
                            data_name = "`+vendorDataList[i].name+`"
                            data_paymtermid = "`+vendorDataList[i].paymtermid+`"
                            data_phone = "`+vendorDataList[i].phone+`"
                            data_slc_fname = "`+vendorDataList[i].slc_fname+`"
                            data_street = "`+vendorDataList[i].street+`"
                            data_vendgroup = "`+vendorDataList[i].vendgroup+`"
                        >
                            <span>`+vendorDataList[i].name+`</span><br>
                            <span><b>Tax ID.</b> `+vendorDataList[i].bpc_whtid+`</span><br>
                            <span><b>`+vendorDataList[i].accountnum+` ( `+vendorDataList[i].dataareaid_long+` )</b></span>
                        </li>
                        `;
                    }
                    outputHtml += `</ul>`;
                    $('#po-show-vendorList-edit').html(outputHtml);
                }
            });
        }

        $(document).on('click' , '.selectVendorListLiEdit' , function(){
            const data_bpc_whtid = $(this).attr('data_bpc_whtid');
            const data_accountnum = $(this).attr('data_accountnum');
            const data_dataareaid = $(this).attr('data_dataareaid');
            const name = $(this).attr('data_name');

                vendorData = {
                'accountnum':data_accountnum,
                'address':'',
                'bpc_whtid':data_bpc_whtid,
                'dataareaid':data_dataareaid,
                'dataareaid_long':'',
                'email':'',
                'name':name,
                'paymtermid':'',
                'phone':'',
                'slc_fname':'',
                'slc_lname':'',
                'street':'',
                'vendgroup':''
            };

            if(data_dataareaid === 'sln' || data_dataareaid === 'ca'){
                $('#showPoe-po-modal').modal('show');
                getPoByVendor(data_bpc_whtid , data_accountnum , data_dataareaid);
            }

            $('#ipe-po-selectVendor').val(name);
            $('#ipe-po-userreceiveDetail').val(vendorData.name);
            $('#add-poe-sec2').css('display' , '');
            $('#po-show-vendorList-edit').html('');

            console.log(vendorData);
        });

        async function getPoByVendor(data_bpc_whtid , data_accountnum , data_dataareaid)
        {
            const formdata = new FormData();
            formdata.append('data_bpc_whtid' , data_bpc_whtid);
            formdata.append('data_accountnum' , data_accountnum);
            formdata.append('data_dataareaid' , data_dataareaid);

            try {
                const res = await axios.post(url+'main/po/getPoByVendor' , formdata);
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let poDataList = res.data.result;
                    let outputHtml = `<ul class="list-group mt-2 poDataListUlEdit">`;
                    for(let i = 0; i < poDataList.length; i++){
                        outputHtml += `
                        <li class="list-group-item list-group-item list-group-item-action poDataListLiEdit"
                            data_purchid="`+poDataList[i].purchid+`"
                            data_dataareaid="`+poDataList[i].dataareaid+`"
                            data_amount="`+poDataList[i].ampunt+`"
                            data_batchid="`+poDataList[i].batchid+`"
                            data_bpc_documentdate="`+poDataList[i].bpc_documentdate+`"
                            data_bpc_purchasereqno="`+poDataList[i].bpc_purchasereqno+`"
                            data_deliverydate="`+poDataList[i].deliverydate+`"
                            data_invoiceaccount="`+poDataList[i].invoiceaccount+`"
                            data_itemnames="`+poDataList[i].itemnames+`"
                            data_items="`+poDataList[i].items+`"
                            data_purchaseorderid="`+poDataList[i].purchaseorderid+`"
                            data_purchorderdate="`+poDataList[i].purchorderdate+`"
                            data_purchorderdocnum="`+poDataList[i].purchorderdocnum+`"
                            data_purchunit="`+poDataList[i].purchunit+`"
                            data_qty="`+poDataList[i].qty+`"
                            data_salesorderbalance="`+poDataList[i].salesorderbalance+`"
                        >
                            <span><b>`+poDataList[i].purchid+`</b></span><br>
                            <span><b>เลขที่ PR : `+poDataList[i].bpc_purchasereqno+`</b></span><br>
                            <span><b>สินค้า : `+poDataList[i].items+`</b></span><br>
                            <span><b>Batch : `+poDataList[i].batchid+`</b></span>
                        </li>
                        `;
                    }
                    outputHtml += `</ul>`;
                    $('#show-poe-byVendor').html(outputHtml);
                }
            } catch (error) {
                console.error('Error:', error); // แสดงข้อผิดพลาดใน console
                throw error; // สามารถโยนข้อผิดพลาดกลับเพื่อให้ฟังก์ชันที่เรียกใช้รู้ว่ามีปัญหาเกิดขึ้น
            }

        }


        $(document).on('click' , '.closePolistEdit' , function(){
            $('#ipe-po-selectVendor').val('');
            $('#ipe-po-chooseVendor').val('');
            $('#show-poe-byVendor').html('');
            $('#po-show-vendorList-edit').html('');
        });
        

        $(document).on('click' , '.poDataListLiEdit' , function (){
            po_addDetail_array = [];
            const data_purchid = $(this).attr("data_purchid");
            const data_dataareaid = $(this).attr("data_dataareaid");
            const data_purchaseorderid = $(this).attr("data_purchaseorderid");

            const data_amount = $(this).attr("data_amount");
            const data_batchid = $(this).attr("data_batchid");
            const data_bpc_documentdate = $(this).attr("data_bpc_documentdate");
            const data_bpc_purchasereqno = $(this).attr("data_bpc_purchasereqno");

            poMainData = {
                'amount':0,
                'batchid':'',
                'bpc_documentdate':'',
                'bpc_purchasereqno':'',
                'dataareaid':data_dataareaid,
                'deliverydate':'',
                'invoiceaccount':'',
                'itemnames':'',
                'items':'',
                'purchaseorderid':data_purchaseorderid,
                'purchid':data_purchid,
                'purchorderdate':'',
                'purchorderdocnum':'',
                'purchunit':'',
                'qty':0,
                'salesorderbalance':0
            }

            $('#showPoe-po-modal').modal('hide');
            $('#add-poe-sec2').css('display' , '');
            $('#po-show-vendorList-edit').html('');

            $('#ipe-po-userreceiveDetail').val(vendorData.name);
            $('#ipe-po-ponumber').val(poMainData.purchid);

            getPoDetail(poMainData.dataareaid , poMainData.purchid , poMainData.purchaseorderid);
            console.log(po_addDetail_array);
        });

        async function getPoDetail(dataareaid , purchid , purchaseorderid)
        {
            if(dataareaid && purchid && purchaseorderid){
                const formdata = new FormData();
                formdata.append('dataareaid' , dataareaid);
                formdata.append('purchid' , purchid);
                formdata.append('purchaseorderid' , purchaseorderid);

                try {
                    const res = await axios.post(url+'main/po/getPoDetail' , formdata);
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let result = res.data.result;

                        for(let key in result){
                            let saveDataDetail = {
                                "detaillist":result[key].name,
                                "accode":result[key].ledgeraccountid,
                                "accodename":result[key].accountname,
                                "deptcode":$('#poe-deptcode-addnew').val(),
                                "price":result[key].lineamount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }),
                                "itemid":result[key].itemid,
                                "itemname":result[key].name,
                                "itemgroup":result[key].itemgroupid
                            }

                            po_addDetail_array.push(saveDataDetail);
                            saveDataDetail = [];
                        }

                        console.log(po_addDetail_array);
                        load_po_liste();
                    }
                }catch (error) {
                    console.error('Error:', error); // แสดงข้อผิดพลาดใน console
                    throw error; // สามารถโยนข้อผิดพลาดกลับเพื่อให้ฟังก์ชันที่เรียกใช้รู้ว่ามีปัญหาเกิดขึ้น
                }
            }
        }

    

    });
</script>