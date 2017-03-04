<script>
    $(document).ready(function () {
        $('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    var asInitVals = new Array();
    $(document).ready(function () {
        var oTable = $('#product').dataTable({
            "oLanguage": {
                "sSearch": "Search all columns:"
            },
            "aoColumnDefs": [
                {
                    'bSortable': false,
                    'aTargets': [0]
                } //disables sorting for column one
            ],
            'iDisplayLength': 12,
            "sPaginationType": "full_numbers",
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?php echo base_url('assets2/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
            }
        });
        $("tfoot input").keyup(function () {
            /* Filter on the column based on the index of this element's parent <th> */
            oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
        });
        $("tfoot input").each(function (i) {
            asInitVals[i] = this.value;
        });
        $("tfoot input").focus(function () {
            if (this.className == "search_init") {
                this.className = "";
                this.value = "";
            }
        });
        $("tfoot input").blur(function (i) {
            if (this.value == "") {
                this.className = "search_init";
                this.value = asInitVals[$("tfoot input").index(this)];
            }
        });
    });
</script>
<div class="x_title">
    <h2>จัดการหน่วยวัด</h2>
</div>
<div class="x_content">
    <!-- เพิ่มหน่วยวัด -->
    <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มหน่วยวัด</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">เพิ่มหน่วยวัด</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ชื่อหน่วยวัด<span class="required">*</span>
                                </label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="" name="" type="text">
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
    <!-- /เพิ่มหน่วยวัด -->

    <!-- แก้ไขหน่วยวัด -->
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขหน่วยวัด</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ชื่อหน่วยวัด<span class="required">*</span>
                                </label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="" name="" type="text">
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
    <!-- /แก้ไขหน่วยวัด -->
    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="product" class="table table-striped responsive-utilities jambo_table dataTable" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 102px;"><center>ลำดับ</center></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="50" style="width: 102px;"><center>ชื่อหน่วยวัด</center></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 239px;"><center>สถาณะหน่วยวัด</center></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 239px;"><center>แก้ไขหน่วยวัด</center></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 239px;"><center>ลบหน่วยวัด</center></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <tr class="pointer odd">
                <td class=" "><center>1</center></td>
                <td class=" " colspan="50"><center>ชื่อหน่วยวัด</center></td>
                <td class=" "><center><button class="btn btn-success btn-xs">Active</button></center></td>>
                <!--                    <td><center><a href="#" onclick="edit_leavetype('--><?php //echo $db['leaveType_ID'] ?>//');"><i class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2"></i></a></center></td>
                <!--                    <td><center><a href="#" onclick="delete_leavetype('--><?php //echo $db['leaveType_ID'] ?>////');"><i class="fa fa-times"></i></a></center></td>
            </tr>
            </tbody>

        </table>
    </div>
</div>