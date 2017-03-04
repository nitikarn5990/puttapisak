<script type="text/javascript">

    function delete_leavetype(leaveType_ID)
    {
        var send = {"leaveType_ID": leaveType_ID}
        $.ajax
        ({
            url: "<?php echo base_url()?>admin/delete_leavetype",
            type: "POST",
            data: send,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.status == true) {
                    $("#alert_msg").modal("show");
                    $("#text_msg").text("ลบสำเร็จ.");
                    setTimeout(function () {
                        $("#alert_msg").modal("hide");
                        location.reload();
                    }, 2000);
                }
            }
        })
    }

    function edit_leaveday(leaveday_ID)
    {
        alert(555);
        var send = {"leaveday_ID": leaveday_ID};

        $.ajax
        ({
            url: "<?php echo base_url()?>admin/get_leaveday_byID",
            method: "POST",
            data: send,
            dataType: "json",
            success: function(data)
            {
                if(data)
                {
                    $("#modal-sizes-3").modal('show');
                    $.each(data, function(key, value)
                    {
                        $("#edit_leaveday_ID").val(leaveType_ID);
                        $("#edit_leaveday_Day").val(value.leaveday_Day);
                        $("#edit_leaveday_Point").val(value.leaveday_Point);
                        $("#edit_leaveday_Status").val(value.leaveday_Status);
                        $("#edit_leavetype_ID").val(value.leavetype_ID);
                        $("#edit_employeetype_ID").val(value.employeetype_ID);
                    });
                }
            }
        });
    }

</script>
<div class="x_panel">
    <div class="row x_title">
        <div class="col-md-6">
            <h3>จัดการข้อมูลประเภทการลา</h3>
        </div>
    </div>

    <div class="x_content">


        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">จัดการประเภทการลา</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">กำหนดสิทธิ์การลาของพนักงานแต่ละประเภท</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                    <div class="panel-body">
                        <!-- เพิ่มประเภทการลา -->
                        <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มประเภทการลา</button>
                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">เพิ่มข้อมูลประเภทการลา</h4>
                                    </div>
                                    <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="/admin/admin/insert_leavetype/" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <form class="form-horizontal form-label-left" novalidate>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">รหัสประเภทการลา <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="leaveType_Code" name="leaveType_Code" type="text">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทการลา <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="leaveType_Title" name="leaveType_Title" type="text">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                                </div>
                                            </form>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /เพิ่มประเภทการลา -->

                        <!-- แก้ไขประเภทการลา -->
                        <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">แก้ไขข้อมูลประเภทการลา</h4>
                                    </div>
                                    <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="/admin/admin/update_leavetype/" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <form class="form-horizontal form-label-left" novalidate>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">รหัสประเภทการลา <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <input type="hidden" id="edit_leavetype_ID" name="edit_leavetype_ID"/>
                                                        <input class="form-control col-md-7 col-xs-12 required" id="edit_leavetype_Code" name="edit_leavetype_Code" type="text">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทการลา <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="edit_leavetype_Title" name="edit_leavetype_Title" type="text">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                                </div>
                                            </form>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /แก้ไขประเภทการลา -->

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 50px;"><center>ลำดับ</center></th>
                                <th style="width: 100px;"><center>รหัสประเภทการลา</center></th>
                                <th style="width: 150px;"><center>ประเภทการลา</center></th>
                                <th style="width: 50px;"><center>Active</center></th>
                                <th style="width: 50px;"><center>แก้ไข</center></th>
                                <th style="width: 50px;"><center>ลบ</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $n = 0;
                            foreach( $leaveType_data as $db)
                            {
                                $n++;
                                ?>
                                <tr>
                                    <th scope="row"><center><?php echo $n; ?></center></th>
                                    <td><center><?php echo $db['leaveType_Code']?></center></td>
                                    <td><center><?php echo $db['leaveType_Title']?></center></td>
                                    <td><center><button class="btn btn-success btn-xs">Active</button></center></td>
                                    <td><center><a href="#" onclick="edit_leavetype('<?php echo $db['leaveType_ID'] ?>');"><i class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2"></i></a></center></td>
                                    <td><center><a href="#" onclick="delete_leavetype('<?php echo $db['leaveType_ID'] ?>');"><i class="fa fa-times"></i></a></center></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>




                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <div class="panel-body">
                        <!-- เพิ่มการกำหนดสิทธิ์ -->
                        <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm3">เพิ่มการกำหนดสิทธิ์การลาให้กับพนักงาน</button>
                        <div class="modal fade bs-example-modal-sm3" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">เพิ่มการกำหนดสิทธิ์การลาให้กับพนักงาน</h4>
                                    </div>
                                    <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="/admin/admin/insert_leaveday/" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <form class="form-horizontal form-label-left" novalidate>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทการลา <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <select class="form-control col-md-7 col-xs-12 required " id="leaveType_ID" name="leaveType_ID" >
                                                            <option value="">-- เลือกประเภทการลา --</option>
                                                            <?php
                                                            foreach($leaveType_data as $cd)
                                                            {
                                                                echo "<option value=\"" . $cd['leaveType_ID'] . "\">" .$cd['leaveType_Title'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทพนักงาน <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <select class="form-control col-md-7 col-xs-12 required " id="employeeType_ID" name="employeeType_ID" >
                                                            <option value="">-- เลือกประเภทพนักงาน --</option>
                                                            <?php
                                                            foreach($employeeType_data as $cd)
                                                            {
                                                                echo "<option value=\"" . $cd['employeeType_ID'] . "\">" .$cd['employeeType_Name'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">คะแนนที่หัก <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="leaveday_Point" name="leaveday_Point" type="text">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">จำนวนวันที่ลาได้สูงสุด<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="leaveday_Day" name="leaveday_Day" type="text">
                                                    </div>
                                                    <label class="control-label">วัน</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                                </div>
                                            </form>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /เพิ่มการกำหนดสิทธิ์ -->

                        <!-- แก้ไขการกำหนดสิทธิ์ -->
                        <div class="modal fade bs-example-modal-sm4" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">แก้ไขข้อมูลประเภทการลา</h4>
                                    </div>
                                    <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <form class="form-horizontal form-label-left" novalidate>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทการลา <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <select class="form-control col-md-7 col-xs-12 required " id="leavetype_ID" name="leavetype_ID" >
                                                            <option value="">-- เลือกประเภทการลา --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทพนักงาน <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <select class="form-control col-md-7 col-xs-12 required " id="leavetype_ID" name="leavetype_ID" >
                                                            <option value="">-- เลือกประเภทพนักงาน --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">คะแนนที่หัก <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="leaveday_Point" name="leaveday_Point" type="text">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">จำนวนวันที่ลาได้สูงสุด<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="leaveday_Day" name="leaveday_Day" type="text">
                                                    </div>
                                                    <label class="control-label">วัน</label>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /แก้ไขการกำหนดสิทธิ์ -->

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 50px;"><center>ลำดับ</center></th>
                                <th style="width: 100px;"><center>รหัสประเภทการลา</center></th>
                                <th style="width: 100px;"><center>ประเภทการลา</center></th>
                                <th style="width: 100px;"><center>ประเภทพนักงาน</center></th>
                                <th style="width: 80px;"><center>คะแนนที่หัก</center></th>
                                <th style="width: 100px;"><center>จำนวนวันลาสูงสุด</center></th>
                                <th style="width: 50px;"><center>Active</center></th>
                                <th style="width: 50px;"><center>แก้ไข</center></th>
                                <th style="width: 50px;"><center>ลบ</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $n = 0;
                            foreach($leaveday_data as $db)
                            {
                                $n++;
                                ?>
                                <tr>
                                    <th scope="row"><center><?php echo $n; ?></center></th>
                                    <td><center><?php echo $db['leaveType_Code']?></center></td>
                                    <td><center><?php echo $db['leaveType_Title']?></center></td>
                                    <td><center><?php echo $db['employeeType_Name']?></center></td>
                                    <td><center><?php echo $db['leaveday_Point']?></center></td>
                                    <td><center><?php echo $db['leaveday_Day']?></center></td>
                                    <td><center><button class="btn btn-success btn-xs">Active</button></center></td>
                                    <td><center><a href="#" onclick="edit_leavetype('<?php echo $db['leaveType_ID'] ?>');"><i class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2"></i></a></center></td>
                                    <!--                                    <td><center><a href="#" onclick="delete_leavetype('--><?php //echo $db['leaveType_ID'] ?>//');"><i class="fa fa-times"></i></a></center></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="alert_msg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ข้อความ</h4>
            </div>
            <div class="modal-body">
                <p id="text_msg"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->