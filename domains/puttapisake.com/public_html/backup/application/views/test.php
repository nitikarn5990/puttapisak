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
                    $("#text_msg").text("ź�����.");
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
            <h3>�Ѵ��â����Ż����������</h3>
        </div>
    </div>

    <div class="x_content">


        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">�Ѵ��û����������</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">��˹��Է������Ңͧ��ѡ�ҹ���л�����</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                    <div class="panel-body">
                        <!-- ��������������� -->
                        <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">���������������</button>
                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">���������Ż����������</h4>
                                    </div>
                                    <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="/admin/admin/insert_leavetype/" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <form class="form-horizontal form-label-left" novalidate>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">���ʻ���������� <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="leaveType_Code" name="leaveType_Code" type="text">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">����������� <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="leaveType_Title" name="leaveType_Title" type="text">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">�ѹ�֡������</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">�Դ</button>
                                                </div>
                                            </form>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /��������������� -->

                        <!-- ��䢻���������� -->
                        <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">��䢢����Ż����������</h4>
                                    </div>
                                    <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="/admin/admin/update_leavetype/" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <form class="form-horizontal form-label-left" novalidate>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">���ʻ���������� <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <input type="hidden" id="edit_leavetype_ID" name="edit_leavetype_ID"/>
                                                        <input class="form-control col-md-7 col-xs-12 required" id="edit_leavetype_Code" name="edit_leavetype_Code" type="text">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">����������� <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="edit_leavetype_Title" name="edit_leavetype_Title" type="text">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">��䢢�����</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">�Դ</button>
                                                </div>
                                            </form>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /��䢻���������� -->

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 50px;"><center>�ӴѺ</center></th>
                                <th style="width: 100px;"><center>���ʻ����������</center></th>
                                <th style="width: 150px;"><center>�����������</center></th>
                                <th style="width: 50px;"><center>Active</center></th>
                                <th style="width: 50px;"><center>���</center></th>
                                <th style="width: 50px;"><center>ź</center></th>
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
                        <!-- ������á�˹��Է��� -->
                        <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm3">������á�˹��Է����������Ѻ��ѡ�ҹ</button>
                        <div class="modal fade bs-example-modal-sm3" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">������á�˹��Է����������Ѻ��ѡ�ҹ</h4>
                                    </div>
                                    <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="/admin/admin/insert_leaveday/" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <form class="form-horizontal form-label-left" novalidate>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">����������� <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <select class="form-control col-md-7 col-xs-12 required " id="leaveType_ID" name="leaveType_ID" >
                                                            <option value="">-- ���͡����������� --</option>
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
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">��������ѡ�ҹ <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <select class="form-control col-md-7 col-xs-12 required " id="employeeType_ID" name="employeeType_ID" >
                                                            <option value="">-- ���͡��������ѡ�ҹ --</option>
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
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">��ṹ����ѡ <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="leaveday_Point" name="leaveday_Point" type="text">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">�ӹǹ�ѹ��������٧�ش<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="leaveday_Day" name="leaveday_Day" type="text">
                                                    </div>
                                                    <label class="control-label">�ѹ</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">�ѹ�֡������</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">�Դ</button>
                                                </div>
                                            </form>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /������á�˹��Է��� -->

                        <!-- ��䢡�á�˹��Է��� -->
                        <div class="modal fade bs-example-modal-sm4" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">��䢢����Ż����������</h4>
                                    </div>
                                    <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <form class="form-horizontal form-label-left" novalidate>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">����������� <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <select class="form-control col-md-7 col-xs-12 required " id="leavetype_ID" name="leavetype_ID" >
                                                            <option value="">-- ���͡����������� --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">��������ѡ�ҹ <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <select class="form-control col-md-7 col-xs-12 required " id="leavetype_ID" name="leavetype_ID" >
                                                            <option value="">-- ���͡��������ѡ�ҹ --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">��ṹ����ѡ <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="leaveday_Point" name="leaveday_Point" type="text">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">�ӹǹ�ѹ��������٧�ش<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <input class="form-control col-md-7 col-xs-12 required" id="leaveday_Day" name="leaveday_Day" type="text">
                                                    </div>
                                                    <label class="control-label">�ѹ</label>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">�ѹ�֡������</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">�Դ</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /��䢡�á�˹��Է��� -->

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 50px;"><center>�ӴѺ</center></th>
                                <th style="width: 100px;"><center>���ʻ����������</center></th>
                                <th style="width: 100px;"><center>�����������</center></th>
                                <th style="width: 100px;"><center>��������ѡ�ҹ</center></th>
                                <th style="width: 80px;"><center>��ṹ����ѡ</center></th>
                                <th style="width: 100px;"><center>�ӹǹ�ѹ���٧�ش</center></th>
                                <th style="width: 50px;"><center>Active</center></th>
                                <th style="width: 50px;"><center>���</center></th>
                                <th style="width: 50px;"><center>ź</center></th>
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
                <h4 class="modal-title">��ͤ���</h4>
            </div>
            <div class="modal-body">
                <p id="text_msg"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">�Դ</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->