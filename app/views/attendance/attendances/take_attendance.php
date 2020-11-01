<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/14/2018
 * Time: 3:07 PM
 */
?>

<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>
<form action="<?php echo URLROOT; ?>/attendance/attendances/take-attendance"
      method="post">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <!--<div class="col-md-12">-->
                    <!-- DATA TABLE -->
                    <!--new attendance announcement-->
                    <div id="anouncement_div" class="col-lg-6" style="margin: auto">

                    </div>
                    <!--new attendance announcement ENDS-->

                    <!--New Data table-->
                    <div class="col-lg-12">
                        <div class="au-card au-card au-card--no-pad m-b-40">


                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="au-card-title"
                                         style="background-image:url('<?php echo URLROOT; ?>
                                                 /images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3><i class="zmdi zmdi-edit"></i>Attendance</h3>
                                    </div>
                                    <div class="filters">
                                        <!--Designations-->
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="form-control" name="role_id" id="role_id"
                                                    required>
                                                <option value="0">Role</option>
												<?php foreach ( $data['roles'] as $role ): ?>
                                                    <option value="<?php echo $role->id; ?>"> <?php echo $role->name; ?></option>
												<?php endforeach; ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <!--Designations Ends-->

                                        <!--Date-->
                                        <input style="width: 110px" id="date" name="datetime"
                                               class="au-input docs-date datepicker"
                                               type="text"
                                               placeholder="Date" autocomplete="off">
                                        <!--Date Ends-->

                                        <!--Manage Attendance Button-->
                                        <input type="button" class="btn btn-primary" id="manage_attendance"
                                               type="button" value="Manage">
                                        <!--Manage Attendance Button ENds-->

                                        <!--Mark all present-->
                                        <input data-toggle="tooltip" id="mark_all_present" title="Mark all present"
                                               type="button"
                                               class="btn btn-primary" value="Mark All Present">
                                        <!--Mark all present ENDS-->

                                        <!--Mark ALl absent-->
                                        <input data-toggle="tooltip" id="mark_all_absent"
                                               title="Mark all absent" type="button"
                                               class="btn btn-primary" value="Mark All Absent">
                                        <!--Mark ALl absent Ends-->

                                        <input style="width: 100px" class="au-input" type="text"
                                               placeholder="Search">


                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="form-control" name="time">
                                                <option selected="selected">Filter</option>
                                                <option value="1">Attendend</option>
                                                <option value="2">Absent</option>
                                                <option value="3">Undefined</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>

                                        <a data-toggle="tooltip" title="Excel" class="fa fa-file-excel"
                                           href="#"
                                           style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                        <a data-toggle="tooltip" title="PDF" class="fa fa-file-pdf" href="#"
                                           style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                        <a data-toggle="tooltip" onClick="window.print()" title="Print"
                                           class="fa fa-print" href="#"
                                           style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>

                                    </div>
                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <table class="table table-striped jambo_table bulk_action">
                                                <thead>
                                                <tr class="headings">
                                                    <th class="column-title">S/N</th>
                                                    <th class="column-title">Name</th>
                                                    <th class="column-title">Satus</th>
                                                    <th class="column-title">Note</th>
                                                </tr>
                                                </thead>
                                                <tbody id="data_table_body">
                                                <tr></tr>
                                                <tr></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="update_all_button_div" style="margin: auto" class="form-actions form-group">
                                </div>

                            </div>

                        </div>
                    </div>
                    <!--New Data table Ends-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        $('.datepicker').datepicker('setDate', new Date());
        //var value = 2;
        $("#manage_attendance").click(function () {

            var role_id = $('#role_id').val();
            var role_name = $('#role_id  :selected').text();

            var datetime = $('.datepicker').val();

            if (role_id == 0 || date == "") {
                alert('Please select a date and a role')
            } else {
                $('#anouncement_div').empty();

                $('#anouncement_div').append(
                    '<div class="au-card au-card au-card--no-pad m-b-40">' +
                    '<div class="au-card-title">' +
                    '<div class="bg-overlay bg-overlay--blue"></div>' +
                    '<h3>' +
                    '<i class="zmdi zmdi-edit"></i>Taking Attendance</h3>' +
                    '</div>' +
                    '<div class="card-body card-block">' +
                    '<table class="table table-striped jambo_table bulk_action">' +
                    '<tr>' +
                    '<td class = "text-black"> Role </td>' +
                    '<td class= "text-black"> ' + role_name + ' </td>' +
                    '</tr>' +
                    '<tr >' +
                    '<td class= "text-black"> Date </td>' +
                    '<td class = "text-black"> ' + datetime + '</td>' +
                    '</tr>' +
                    '</table>' +
                    '</div>' +
                    '</div>'
                )
                $("#mark_all_present").click(function () {
                    $(":radio[value=1]").prop('checked', true);
                })
                $("#mark_all_absent").click(function () {
                    $(":radio[value=0]").prop('checked', true);
                })
                $.ajax
                ({
                    type: "POST",
                    dataType: 'json',
                    url: "/attendance/attendances/getAllEmployee",
                    data: {role_id: role_id, datetime: datetime},
                    cache: false,
                    success: function (objects) {
                        console.log(objects);
                        if (objects.length === 0) {
                            $("#data_table_body").empty();
                            $("#data_table_body").append('<tr><td colspan="4" class="text-center"> No data found..Please select another class or section</td></tr>')
                        } else {
                            $("#data_table_body").empty();
                            $("#update_all_button_div").empty();

                            $.each(objects, function (key, value) {
                                var attendance_id = "";
                                var status = "0";
                                var note = "";
                                var designation_id = "";
                                if (value.att_id != null) {
                                    attendance_id = value.att_id
                                }
                                if (value.att_status != "0") {
                                    status = value.att_status
                                }
                                if (value.designation_id != "0") {
                                    designation_id = value.id
                                }
                                if (value.note != null) {
                                    note = value.note
                                }
                                $("#data_table_body").append('<tr>' +
                                    '<td>' + eval(key + 1) + '</td><input type="hidden" name="attendance_id[]" value="' + attendance_id + '"></td>' +
                                    '<td>' + value.name + '<input type="hidden" name="designation_id[]" value="' + designation_id + '"></td>' +
                                    "<td>" +
                                    '<input class="" type="radio" checked name="status[' + key + ']" value="2">' + 'Undefined  ' +
                                    '<input class="" type="radio" name="status[' + key + ']" value="1">' + 'Present  ' +
                                    '<input class="" type="radio" name="status[' + key + ']" value="0">' + 'Absent  ' +
                                    //'<input type="radio" name="status' + key + 1 + '" value="Absent">' + 'Absent  ' +
                                    "</td>" +
                                    "<td>" + '<input class="form-control" type="text" name="note[]" value="' + note + '">' +
                                    "</td>" +
                                    '</tr>'
                                )
                                //Pre selecting if already updated
                                $('input[name="status[' + key + ']"][value="' + status + '"]').prop('checked', true);
                            })
                            $("#update_all_button_div").append(
                                '<input style="margin-bottom: 20px;" class="btn btn-primary" type="submit" value="Update all">'
                            )
                        }
                    }
                })
            }
        });
    });
</script>
<?php require APPROOT . '/views/layouts/footer.php' ?>

