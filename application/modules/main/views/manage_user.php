<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าบริหารจัดการ ผู้ใช้งานโปรแกรม (Beta)</title>

</head>


    <div class="modal fade bs-example-modal-lg" id="addNewUser_modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <form id="frm_saveUserpermission" autocomplete="off" class="needs-validation" novalidate style="width:100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">เพิ่มผู้ใช้งานโปรแกรม</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="modal-header">
                    
                    <div>
                        <button type="submit" class="btn btn-success" id="btn-saveMain">
                            <i class="fi-save mr-2"></i>บันทึก
                        </button>

                    </div>

                </div>

                <div class="modal-body">

                    <div class="row form-group">
                        <div class="col-md-12 form-group">
                            <label for=""><b>ค้นหาผู้ใช้งาน</b></label>
                            <input type="text" name="ip-searchuser-md" id="ip-searchuser-md" class="form-control">
                            <div id="showusermain_list"></div>
                        </div>
                    </div>
                    <hr class="advHr">

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <label for=""><b>รหัสพนักงาน</b></label>
                            <input type="text" name="ip-ecode-md" id="ip-ecode-md" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for=""><b>ชื่อผู้ใช้งาน</b></label>
                            <input type="text" name="ip-username-md" id="ip-username-md" class="form-control" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <label for=""><b>ชื่อ - สกุล</b></label>
                            <input type="text" name="ip-fullname-md" id="ip-fullname-md" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for=""><b>แผนก</b></label>
                            <input type="text" name="ip-dept-md" id="ip-dept-md" class="form-control" required>
                            <input hidden type="text" name="ip-deptcode-md" id="ip-deptcode-md" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <label for=""><b>อีเมล</b></label>
                            <input type="text" name="ip-email-md" id="ip-email-md" class="form-control" required>
                        </div>
                    </div>

                    <hr class="advHr">

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>Budget Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-budget-yes" name="ip-userper-budget" value="yes" class="custom-control-input" required> 
                                        <label for="ip-userper-budget-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-budget-no" name="ip-userper-budget" value="no" class="custom-control-input" required> <label for="ip-userper-budget-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>AP Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-ap-yes" name="ip-userper-ap" value="yes" class="custom-control-input" required> 
                                        <label for="ip-userper-ap-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-ap-no" name="ip-userper-ap" value="no" class="custom-control-input" required> <label for="ip-userper-ap-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>Account Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-ac-yes" name="ip-userper-ac" value="yes" class="custom-control-input" required> 
                                        <label for="ip-userper-ac-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-ac-no" name="ip-userper-ac" value="no" class="custom-control-input" required> <label for="ip-userper-ac-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>Finance Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-fn-yes" name="ip-userper-fn" value="yes" class="custom-control-input" required> 
                                        <label for="ip-userper-fn-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-fn-no" name="ip-userper-fn" value="no" class="custom-control-input" required> <label for="ip-userper-fn-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>User receive Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-ur-yes" name="ip-userper-ur" value="yes" class="custom-control-input" required> 
                                        <label for="ip-userper-ur-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-ur-no" name="ip-userper-ur" value="no" class="custom-control-input" required> <label for="ip-userper-ur-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>Finance clear money Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-fnc-yes" name="ip-userper-fnc" value="yes" class="custom-control-input" required> 
                                        <label for="ip-userper-fnc-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-fnc-no" name="ip-userper-fnc" value="no" class="custom-control-input" required> <label for="ip-userper-fnc-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>AP clear money Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-apc-yes" name="ip-userper-apc" value="yes" class="custom-control-input" required> 
                                        <label for="ip-userper-apc-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-apc-no" name="ip-userper-apc" value="no" class="custom-control-input" required> <label for="ip-userper-apc-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>Account clear money Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-acc-yes" name="ip-userper-acc" value="yes" class="custom-control-input" required> 
                                        <label for="ip-userper-acc-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-acc-no" name="ip-userper-acc" value="no" class="custom-control-input" required> <label for="ip-userper-acc-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>Finance 2 clear money Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-fn2-yes" name="ip-userper-fn2" value="yes" class="custom-control-input" required> 
                                        <label for="ip-userper-fn2-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-fn2-no" name="ip-userper-fn2" value="no" class="custom-control-input" required> <label for="ip-userper-fn2-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>User receive clear money Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-urc-yes" name="ip-userper-urc" value="yes" class="custom-control-input" required> 
                                        <label for="ip-userper-urc-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-userper-urc-no" name="ip-userper-urc" value="no" class="custom-control-input" required> <label for="ip-userper-urc-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
               
            </div>
        </form>
        </div>
    </div>


    <div class="modal fade bs-example-modal-lg" id="editUser_modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <form id="frm_saveEditUserpermission" autocomplete="off" class="needs-validation" novalidate style="width:100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">แก้ไขผู้ใช้งานโปรแกรม</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="modal-header">
                    
                    <div>
                        <button type="submit" class="btn btn-success" id="btn-saveEditMain">
                            <i class="fi-save mr-2"></i>บันทึกการแก้ไข
                        </button>

                    </div>

                </div>

                <div class="modal-body">

                    <input hidden type="text" name="ipe-autoid-check" id="ipe-autoid-check">

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <label for=""><b>รหัสพนักงาน</b></label>
                            <input type="text" name="ipe-ecode-md" id="ipe-ecode-md" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for=""><b>ชื่อผู้ใช้งาน</b></label>
                            <input type="text" name="ipe-username-md" id="ipe-username-md" class="form-control" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <label for=""><b>ชื่อ - สกุล</b></label>
                            <input type="text" name="ipe-fullname-md" id="ipe-fullname-md" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for=""><b>แผนก</b></label>
                            <input type="text" name="ipe-dept-md" id="ipe-dept-md" class="form-control" required>
                            <input hidden type="text" name="ipe-deptcode-md" id="ipe-deptcode-md" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <label for=""><b>อีเมล</b></label>
                            <input type="text" name="ipe-email-md" id="ipe-email-md" class="form-control" required>
                        </div>
                    </div>

                    <hr class="advHr">

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>Budget Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-budget-yes" name="ipe-userper-budget" value="yes" class="custom-control-input" required> 
                                        <label for="ipe-userper-budget-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-budget-no" name="ipe-userper-budget" value="no" class="custom-control-input" required> <label for="ipe-userper-budget-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>AP Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-ap-yes" name="ipe-userper-ap" value="yes" class="custom-control-input" required> 
                                        <label for="ipe-userper-ap-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-ap-no" name="ipe-userper-ap" value="no" class="custom-control-input" required> <label for="ipe-userper-ap-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>Account Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-ac-yes" name="ipe-userper-ac" value="yes" class="custom-control-input" required> 
                                        <label for="ipe-userper-ac-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-ac-no" name="ipe-userper-ac" value="no" class="custom-control-input" required> <label for="ipe-userper-ac-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>Finance Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-fn-yes" name="ipe-userper-fn" value="yes" class="custom-control-input" required> 
                                        <label for="ipe-userper-fn-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-fn-no" name="ipe-userper-fn" value="no" class="custom-control-input" required> <label for="ipe-userper-fn-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>User receive Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-ur-yes" name="ipe-userper-ur" value="yes" class="custom-control-input" required> 
                                        <label for="ipe-userper-ur-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-ur-no" name="ipe-userper-ur" value="no" class="custom-control-input" required> <label for="ipe-userper-ur-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>Finance clear money Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-fnc-yes" name="ipe-userper-fnc" value="yes" class="custom-control-input" required> 
                                        <label for="ipe-userper-fnc-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-fnc-no" name="ipe-userper-fnc" value="no" class="custom-control-input" required> <label for="ipe-userper-fnc-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>AP clear money Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-apc-yes" name="ipe-userper-apc" value="yes" class="custom-control-input" required> 
                                        <label for="ipe-userper-apc-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-apc-no" name="ipe-userper-apc" value="no" class="custom-control-input" required> <label for="ipe-userper-apc-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>Account clear money Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-acc-yes" name="ipe-userper-acc" value="yes" class="custom-control-input" required> 
                                        <label for="ipe-userper-acc-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-acc-no" name="ipe-userper-acc" value="no" class="custom-control-input" required> <label for="ipe-userper-acc-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>Finance 2 clear money Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-fn2-yes" name="ipe-userper-fn2" value="yes" class="custom-control-input" required> 
                                        <label for="ipe-userper-fn2-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-fn2-no" name="ipe-userper-fn2" value="no" class="custom-control-input" required> <label for="ipe-userper-fn2-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6 form-group">
                            <span><b>User receive clear money Section</b></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">

                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-urc-yes" name="ipe-userper-urc" value="yes" class="custom-control-input" required> 
                                        <label for="ipe-userper-urc-yes"class="custom-control-label">Yes</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-userper-urc-no" name="ipe-userper-urc" value="no" class="custom-control-input" required> <label for="ipe-userper-urc-no" class="custom-control-label">No</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
               
            </div>
        </form>
        </div>
    </div>



<body>
    <div class="main-container">
		<div class="pd-ltr-20">

            <div class="card-box pd-20 height-100-p mb-30">

                <div class="row align-items-center">
					<div class="col-md-12 text-center">
						<h4>หน้าบริหารจัดการ ผู้ใช้งานโปรแกรม (Beta)</h4>
					</div>
				</div>

                <hr class="advHr">

                <div class="row">
					<div class="col-md-12">
						<button type="button" id="btn-addnewuser_permission" name="btn-addnewuser_permission" class="btn btn-primary"><i class="dw dw-add-file1  mr-2"></i>เพิ่มผู้ใช้ใหม่</button>
					</div>
				</div>
				<hr>

                <div class="row">
					<div class="col-md-12 mt-2">
						<div id="" class="table-responsive">
							<table id="userpermission_list" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="">รหัสพนักงาน</th>
										<th class="">ชื่อผู้ใช้</th>
										<th class="">ชื่อเต็ม</th>
										<th class="">แผนก</th>
										<th class="">วันที่ร้องขอ</th>
										<th class="">สถานะ</th>
                                        <th class="">#</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>

            </div>

		</div>
	</div>
</body>
</html>



<script>
	$(document).ready(function(){
		$('#btn-addnewuser_permission').click(function(){
			$('#addNewUser_modal').modal('show');

            $('#ip-ecode-md').val('');
            $('#ip-username-md').val('');
            $('#ip-fullname-md').val('');
            $('#ip-dept-md').val('');
            $('#ip-deptcode-md').val('');
            $('#showusermain_list').html('');
            $('#ip-searchuser-md').val('');
		});

		load_userpermission_list();


		function load_userpermission_list()
		{
			let thid = 1;
			$('#userpermission_list thead th').each(function() {
				var title = $(this).text();
				$(this).html(title + ' <input type="text" id="userpermission_list'+thid+'" class="col-search-input" placeholder="Search ' + title + '" />');
				thid++;
			});
        	$('#userpermission_list').DataTable().destroy();
                var table = $('#userpermission_list').DataTable({
                            "scrollX": true,
                            "processing": true,
                            "serverSide": true,
                            "stateSave": true,
                            stateLoadParams: function(settings, data) {
                                for (i = 0; i < data.columns["length"]; i++) {
                                    let col_search_val = data.columns[i].search.search;
                                    if (col_search_val !== "") {
                                        $("input", $("#userpermission_list thead th")[i]).val(col_search_val);
                                    }
                                }
                            },
                            "ajax": {
                                "url":"<?php echo base_url('main/getlist_userpermission') ?>",
                            },
                            order: [
                                [0, 'desc']
                            ],
                            columnDefs: [{
                                    targets: "_all",
                                    orderable: false
                                },
                            ],
                    });

            table.columns().every(function() {
                var table = this;
                $('input', this.header()).on('keyup change', function() {
                    if (table.search() !== this.value) {
                        table.search(this.value).draw();
                    }
                });
            });

            // $('#advance_list6').prop('readonly' , true).css({
            //     'background-color':'#F5F5F5',
            //     'cursor':'no-drop'
            // });
		}

		$(document).on('click' , '.select_form' , function(){
			const data_formcode = $(this).attr('data_formcode');
			const data_formno = $(this).attr('data_formno');
			location.href = url+'advance_view.html/'+data_formcode+'/'+data_formno;
		});

        $(document).on('keyup' , '#ip-searchuser-md' , function(){
            if($(this).val() != ""){
                getuserInMemberTable($(this).val());
            }else{
                $('#showusermain_list').html('');
            }
        });
        
        function getuserInMemberTable(searchuser)
        {
            if(searchuser != ""){
                axios.post(url+'login/getuserInMemberTable',{
                    action:"getuserInMemberTable",
                    searchuser:searchuser
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let userData = res.data.resultUser;
                        let outputHtml = `<ul class="list-group mt-2 selectUserUl">`;
                        for(let i = 0; i < userData.length; i++){
                            outputHtml += `
                            <li class="list-group-item list-group-item list-group-item-action selectUserLi"
                                data_username="`+userData[i].username+`"
                                data_fullname="`+userData[i].Fname+' '+userData[i].Lname+`"
                                data_ecode="`+userData[i].ecode+`"
                                data_dept="`+userData[i].Dept+`"
                                data_deptcode="`+userData[i].Deptcode+`"
                                data_memberemail="`+userData[i].memberemail+`"
                            >
                                <span>`+userData[i].username+` | `+userData[i].ecode+` | `+userData[i].Dept+`</span>
                            </li>
                            `;
                        }
                        outputHtml += `</ul>`;
                        $('#showusermain_list').html(outputHtml);
                    }
                })
            }
        }


        $(document).on('click' , '.selectUserLi' , function(){
            const data_username = $(this).attr("data_username");
            const data_fullname = $(this).attr("data_fullname");
            const data_ecode = $(this).attr("data_ecode");
            const data_dept = $(this).attr("data_dept");
            const data_deptcode = $(this).attr("data_deptcode");
            const data_memberemail = $(this).attr("data_memberemail");


            $('#ip-ecode-md').val(data_ecode);
            $('#ip-username-md').val(data_username);
            $('#ip-fullname-md').val(data_fullname);
            $('#ip-dept-md').val(data_dept);
            $('#ip-deptcode-md').val(data_deptcode);
            $('#ip-email-md').val(data_memberemail);
            $('#ipe-autoid').val();
            $('#showusermain_list').html('');
        });

        $('#frm_saveUserpermission').on('submit' , function(e){
            e.preventDefault();

            if(
                $('input:radio[name=ip-userper-budget]:checked').length != 0 &&
                $('input:radio[name=ip-userper-ap]:checked').length != 0 &&
                $('input:radio[name=ip-userper-ac]:checked').length != 0 &&
                $('input:radio[name=ip-userper-fn]:checked').length != 0 &&
                $('input:radio[name=ip-userper-ur]:checked').length != 0 &&
                $('input:radio[name=ip-userper-fnc]:checked').length != 0 &&
                $('input:radio[name=ip-userper-apc]:checked').length != 0 &&
                $('input:radio[name=ip-userper-acc]:checked').length != 0 &&
                $('input:radio[name=ip-userper-fn2]:checked').length != 0 &&
                $('input:radio[name=ip-userper-urc]:checked').length != 0 &&
                $('#ip-ecode-md').val() != "" &&
                $('#ip-username-md').val() != "" &&
                $('#ip-fullname-md').val() != "" &&
                $('#ip-dept-md').val() != ""
            ){
                saveUserpermission();
            }else{
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }


        });

        function saveUserpermission()
        {
            const form = $('#frm_saveUserpermission')[0];
            const data = new FormData(form);

            axios.post(url+'main/saveUserpermission' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
                    swal({
                        title: 'บันทึกข้อมูลเสร็จเรียบร้อยแล้ว',
                        type: 'success',
                        showConfirmButton: false,
                        timer:1000
                    }).then(function(){
                        location.reload();
                    });
                }
            });
        }


        $(document).on('click' , '.editUser' , function(){
            const data_autoid = $(this).attr("data_autoid");
            $('#editUser_modal').modal('show');
            getDataUserPermission(data_autoid);
        });

        function getDataUserPermission(u_autoid)
        {
            if(u_autoid != ""){
                axios.post(url+'main/getDataUserPermission' , {
                    action:"getDataUserPermission",
                    u_autoid:u_autoid
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let userPermissionData = res.data.userPermissionData;
                        $('#ipe-ecode-md').val(userPermissionData.u_ecode).prop('readonly' , true);
                        $('#ipe-username-md').val(userPermissionData.u_username).prop('readonly' , true);
                        $('#ipe-fullname-md').val(userPermissionData.u_fullname).prop('readonly' , true);
                        $('#ipe-dept-md').val(userPermissionData.u_dept).prop('readonly' , true);
                        $('#ipe-email-md').val(userPermissionData.u_email).prop('readonly' , true);

                        if(userPermissionData.u_budget_section == "yes"){
                            $('#ipe-userper-budget-yes').prop("checked" , true);
                        }else{
                            $('#ipe-userper-budget-no').prop("checked" , true);
                        }

                        if(userPermissionData.u_ap_section == "yes"){
                            $('#ipe-userper-ap-yes').prop("checked" , true);
                        }else{
                            $('#ipe-userper-ap-no').prop("checked" , true);
                        }

                        if(userPermissionData.u_acc_section == "yes"){
                            $('#ipe-userper-ac-yes').prop("checked" , true);
                        }else{
                            $('#ipe-userper-ac-no').prop("checked" , true);
                        }

                        if(userPermissionData.u_finance_section == "yes"){
                            $('#ipe-userper-fn-yes').prop("checked" , true);
                        }else{
                            $('#ipe-userper-fn-no').prop("checked" , true);
                        }

                        if(userPermissionData.u_userreceive_section == "yes"){
                            $('#ipe-userper-ur-yes').prop("checked" , true);
                        }else{
                            $('#ipe-userper-ur-no').prop("checked" , true);
                        }

                        if(userPermissionData.u_finance_clear_section == "yes"){
                            $('#ipe-userper-fnc-yes').prop("checked" , true);
                        }else{
                            $('#ipe-userper-fnc-no').prop("checked" , true);
                        }

                        if(userPermissionData.u_ap_clear_section == "yes"){
                            $('#ipe-userper-apc-yes').prop("checked" , true);
                        }else{
                            $('#ipe-userper-apc-no').prop("checked" , true);
                        }

                        if(userPermissionData.u_acc_clear_section == "yes"){
                            $('#ipe-userper-acc-yes').prop("checked" , true);
                        }else{
                            $('#ipe-userper-acc-no').prop("checked" , true);
                        }

                        if(userPermissionData.u_finance2_clear_section == "yes"){
                            $('#ipe-userper-fn2-yes').prop("checked" , true);
                        }else{
                            $('#ipe-userper-fn2-no').prop("checked" , true);
                        }

                        if(userPermissionData.u_userreceive_clear_section == "yes"){
                            $('#ipe-userper-urc-yes').prop("checked" , true);
                        }else{
                            $('#ipe-userper-urc-no').prop("checked" , true);
                        }

                        $('#ipe-autoid-check').val(u_autoid);


                    }
                });
            }
        }

        $('#frm_saveEditUserpermission').on('submit' , function(e){
            e.preventDefault();
            if(
                $('input:radio[name=ipe-userper-budget]:checked').length != 0 &&
                $('input:radio[name=ipe-userper-ap]:checked').length != 0 &&
                $('input:radio[name=ipe-userper-ac]:checked').length != 0 &&
                $('input:radio[name=ipe-userper-fn]:checked').length != 0 &&
                $('input:radio[name=ipe-userper-ur]:checked').length != 0 &&
                $('input:radio[name=ipe-userper-fnc]:checked').length != 0 &&
                $('input:radio[name=ipe-userper-apc]:checked').length != 0 &&
                $('input:radio[name=ipe-userper-acc]:checked').length != 0 &&
                $('input:radio[name=ipe-userper-fn2]:checked').length != 0 &&
                $('input:radio[name=ipe-userper-urc]:checked').length != 0
            ){
                $('#btn-saveEditMain').prop('disabled' , true);
                saveEditUserPermission();
            }else{
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
                $('#btn-saveEditMain').prop('disabled' , false);
            }
        });

        function saveEditUserPermission()
        {
            if($('#ipe-autoid-check').val() != ""){
                const form = $('#frm_saveEditUserpermission')[0];
                const data = new FormData(form);

                axios.post(url+'main/saveEditUserPermission', data , {

                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Update Data Success"){
                        location.reload();
                    }
                });
            }
        }



	});
</script>