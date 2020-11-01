<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 10/5/2018
 * Time: 11:25 AM
 */

?>

<?php require APPROOT . '/views/layouts/header.php' ?>
    <!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
    <!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
    <!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

    <form action="<?php echo URLROOT; ?>/attendance/student-attendances/daily" method="post">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <!--<div class="col-md-12">-->
                        <!-- DATA TABLE -->
                        <!--new attendance announcement-->

                        <!--new attendance announcement ENDS-->

                        <!--New Data table-->
                        <div class="col-lg-12">
                            <div class="au-card au-card au-card--no-pad m-b-40">


                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="au-card-title"
                                             style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                            <div class="bg-overlay bg-overlay--blue"></div>
                                            <h3 id="attendance_header"><i class="zmdi zmdi-edit"></i>Attendance</h3>
                                        </div>
                                        <div class="filters">
                                            <!--Classes-->
                                            <div style="width: 180px;" class="rs-select2--dark rs-select2--md rs-select2--border">
                                                <select class="form-control js-select2" name="class_id" id="class" required>
                                                    <option>Class</option>
													<?php foreach ( $data['classes'] as $class ): ?>
                                                        <option value="<?php echo $class->id; ?>">
															<?php echo $class->name; ?>
                                                        </option>
													<?php endforeach; ?>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <!--Classes Ends-->

                                            <!--Section-->
                                            <div style="width: 180px;"
                                                 class="rs-select2--dark rs-select2--sm rs-select2--border"
                                                 style="width: 180px">
                                                <select class="form-control js-select2" name="section_id" id="section" required>
                                                    <option value="0" selected="selected">Section</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <!--Section Ends-->

                                            <!--Date-->
                                            <input style="width: 110px" id="date" name="date"
                                                   class="au-input docs-date datepicker" type="text" placeholder="Date"
                                                   autocomplete="off">
                                            <!--Date Ends-->

                                            <!--Manage Attendance Button-->
                                            <input type="button" class="btn btn-primary" id="manage_attendance"
                                                   type="button" value="Manage">
                                            <!--Manage Attendance Button ENds-->

                                            <!--Mark all present-->
                                            <input id="mark_all_present" type="button" class="btn btn-primary" value="Mark All Present">
                                            <!--Mark all present ENDS-->

                                            <!--Mark ALl absent-->
                                            <input id="mark_all_absent" type="button" class="btn btn-primary" value="Mark All Absent">
                                            <!--Mark ALl absent Ends-->

                                            <a data-toggle="tooltip" title="PDF" class="fa fa-file-pdf" href="#"
                                               style="float: right;padding-top:6px;font-size: 27px "></a>
                                            <a data-toggle="tooltip" onClick="window.print()" title="Print"
                                               class="fa fa-print" href="#"
                                               style="float: right;padding-top:6px;padding-right: 15px;font-size: 27px "></a>

                                        </div>
                                        <div class="x_content">
                                            <div class="table-responsive">
                                                <table class="table table-striped jambo_table bulk_action">
                                                    <thead>
                                                    <tr class="headings">
                                                        <th class="column-title">S/N</th>
                                                        <th class="column-title">Name</th>
                                                        <th class="column-title">Roll</th>
                                                        <th class="column-title">Satus</th>
                                                        <th class="column-title">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="data_table_body">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="update_all_button_div" style="margin: auto"
                                         class="form-actions form-group">
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

            $("#class").change(function () {
                var class_id = $(this).val();
                // $("#data_table_body").empty();
                var dataString = 'class_id=' + class_id;

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/academic/sections/getSectionsByClass",
                    data: dataString,
                    cache: false,
                    success: function (objects) {
                        //console.log(objects)
                        if (objects.length === 0) {
                            $("#section").empty();
                            $("#section").append('<option  class="text-center">No sections found</option>');
                        } else {
                            $("#section").empty();
                            $("#section").append('<option value="" class="text-center">Section</option>');
                            //add_to_item_table(objects);
                            $.each(objects, function (key, value) {
                                $("#section").append('<option value="' + value.id + '" class="text-center">' + value.section_name + '</option>')
                            })

                        }
                    }
                })
            });
            //var value = 2;

            $("#manage_attendance").click(function () {

                var class_id = $('#class').val();
                var class_name = $('#class  :selected').text();
                // $("#data_table_body").empty();
                var section_id = $('#section').val();
                var section_name = $('#section :selected').text();
                var date = $('.datepicker').val();

                $("#attendance_header").empty();
                var header = "Attendance of Class: " + class_name + " | Section: " + section_name + " | Date: " + date;
                $("#attendance_header").text(header);

                if (class_id == 0 || section_id == 0 || date == "") {
                    alert('please select a class and a section')
                } else {
                    $('#anouncement_div').empty();
                    /*$('#anouncement_div').append(
						'<div  class="card border border-secondary">\n' +
						'<div class="card-header text-center">\n' +
						'<strong class="card-title">Taking Attendance</strong>\n' +
						'</div>\n' +
						'<div class="card-text text-center">\n' +
						'<p>Class: ' + class_name + '</p>\n' +
						'</div>\n' +
						'<div class="card-text text-center">\n' +
						'<p>section: ' + section_name + '</p>\n' +
						'</div>\n' +
						'<div class="card-text text-center">\n' +
						'<p>Date: ' + date + '</p>\n' +
						'</div>' +
						'</div>' +
						'<div class="row align-content-md-center">' +
						'<input id="mark_all_present" class="btn btn-primary" type="button" value="Mark all Present">' +
						'<input id="mark_all_absent" class="btn btn-dark" type="button" value="Mark All Absent">' +
						'</div>'
					)*/
                    $('#anouncement_div').append(
                        '<div class="au-card au-card au-card--no-pad m-b-40">' +
                        '<div class="au-card-title" style="background-image:url("http://localhost//images/bg-title-01.jpg");">' +
                        '<div class="bg-overlay bg-overlay--blue"></div>' +
                        '<h3>' +
                        '<i class="zmdi zmdi-edit"></i>Info</h3>' +
                        '</div>' +
                        '<div class="card-body card-block">' +
                        '<table class="table table-striped jambo_table bulk_action">' +
                        '<tr>' +
                        '<td class="text-black">Class</td>' +
                        '<td class="text-black">' + class_name + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td class = "text-black"> Section </td>' +
                        '<td class= "text-black"> ' + section_name + ' </td>' +
                        '</tr>' +
                        '<tr >' +
                        '<td class= "text-black"> Date </td>' +
                        '<td class = "text-black"> ' + date + '</td>' +
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
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "/attendance/student-attendances/getStudentByClassAndSection",
                        data: {
                            class_id: class_id,
                            section_id: section_id,
                            datetime: date
                        },
                        cache: false,
                        success: function (objects) {
                            console.log(objects)
                            if (objects.length === 0) {
                                $("#data_table_body").empty();
                                $("#data_table_body").append('<tr><td colspan="4" class="text-center"> No data found..Please select another class or section</td></tr>')
                            } else {
                                $("#data_table_body").empty();
                                $("#update_all_button_div").empty();
                                $.each(objects, function (key, value) {
                                    var attendance_id = "";
                                    var status = "0";
                                    if (value.att_id != null) {
                                        attendance_id = value.att_id
                                    }
                                    if (value.status != "0") {
                                        status = value.status
                                    }
                                    $("#data_table_body").append('<tr>' +
                                        '<td>' + eval(key + 1) +
                                        '</td><input type="hidden" class="attendance_id" name="attendance_id[]" value="' + attendance_id + '"></td>' +
                                        '<td>' + value.student_name + '<input type="hidden" class="student_id" name="student_id[]" value="' + value.id + '"></td>' +
                                        '<td>' + value.roll_no + '</td>' +
                                        "<td>" +
                                        '<label class="radiobutton">' + 'Undefined' +
                                        '<input class="status" type="radio" checked="checked" name="status[' + key + ']" value="2">' +
                                        '<span class="radiocheckmark"></span>' +
                                        '</label>' +
                                        '<label class="radiobutton">' + 'Present' +
                                        '<input type="radio" name="status[' + key + ']" value="1">' +
                                        '<span class="radiocheckmark"></span>' +
                                        '</label>' +
                                        '<label class="radiobutton">' + 'Absent' +
                                        '<input type="radio" name="status[' + key + ']" value="0">' +
                                        '<span class="radiocheckmark"></span>' +
                                        '</label>' +
                                        "</td>" +
                                        "<td>" + '<input type="button" name="save_button[]" class="btn btn-primary btn-sm save_btn" value="Save">' +
                                        "</td>" +
                                        '</tr>'
                                    )
                                    //Pre selecting if already updated
                                    $('input[name="status[' + key + ']"][value="' + status + '"]').prop('checked', true);
                                })
                                $('.save_btn').click(function () {
                                    var student_id = $(this).closest("tr").find(".student_id").val();
                                    var attendance_id = $(this).closest("tr").find(".attendance_id").val();
                                    var status = $(this).closest("tr").find("input[type='radio']:checked").val();
                                    var date = $('.datepicker').val();
                                    var btn =$(this);
                                    $.ajax({
                                        type: "POST",
                                        dataType: 'json',
                                        url: "/attendance/student-attendances/daily-single",
                                        data: {
                                            student_id: student_id,
                                            attendance_id: attendance_id,
                                            status: status,
                                            datetime: date
                                        },
                                        cache: false,
                                        success: function (objects) {
                                            if (objects == true) {
                                                btn.val('Saved');
                                            } else {
                                                alert('false');
                                            }
                                        }
                                    })

                                });
                                $("#update_all_button_div").append(
                                    '<input style="margin-bottom: 10px; margin-top: 10px;" class="btn btn-primary" type="submit" value="Update all">'
                                )
                            }
                        }
                    })
                }
            });
        });
    </script>
<?php require APPROOT . '/views/layouts/footer.php' ?>