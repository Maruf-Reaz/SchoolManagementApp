
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="zmdi zmdi-edit"></i>Exam Schedule</h3>
                                </div>
                                <div class="filters">
                                    <div class="rs-select2--dark rs-select2--md rs-select2--border">
                                        <select class="form-control" name="class" id="class">
                                            <option selected="selected">Class</option>
			                                <?php foreach ( $data['classes'] as $class ): ?>
                                                <option value="<?php echo $class->id; ?>"> <?php echo $class->name; ?></option>
			                                <?php endforeach; ?>                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <a data-toggle="tooltip" title="Add Exam Schedule" class="fa fa-plus"
                                       href="<?php echo URLROOT; ?>/exam/ExamSchedules/addExamSchedule"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>

                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">

                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-titlet">#</th>
                                                <th class="column-titlet">Exam Name</th>
                                                <th class="column-titlet">Class</th>
                                                <th class="column-titlet">Section</th>
                                                <th class="column-titlet">Subject</th>
                                                <th class="column-titlet">Date</th>
                                                <th class="column-titlet">Time</th>
                                                <th class="column-titlet">Room</th>
                                                <th class="column-titlet">Options</th>
                                            </tr>
                                            </thead>
                                            <tbody id="data_table_body">
											<?php $i = 0;
											foreach ( $data['exam_schedule'] as $exam_schedule ): ?>

                                                <tr>
                                                    <input type="hidden" name="id" value="<?php echo  $exam_schedule->id?>">
                                                    <td><?php echo $i += 1 ?></td>
                                                    <td><?php echo $exam_schedule->exam_name ?></td>
                                                    <td><?php echo $exam_schedule->class_name ?></td>
                                                    <td><?php echo $exam_schedule->section_name ?></td>
                                                    <td><?php echo $exam_schedule->subject_name ?></td>
                                                    <td><?php echo $exam_schedule->exam_date ?></td>
                                                    <td><?php echo $exam_schedule->from_time ?>
                                                        - <?php echo $exam_schedule->to_time ?>
                                                    </td>
                                                    <td><?php echo $exam_schedule->room_name ?></td>


                                                    <td>

                                                        <div
                                                                class="btn-group">
                                                            <button style="padding-top: 2px;padding-bottom: 2px;"
                                                                    type="button" class="btn btn-default"
                                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                                        class="fa fa-ellipsis-v"></i></button>
                                                            <ul class="dropdown-menu pull-right" role="menu"
                                                                style="box-shadow: 0px 0px 20px 5px #888888;">
                                                                <li><a
                                                                            href="<?php echo URLROOT ?>/exam/ExamSchedules/showExamSchedule/<?php echo $exam_schedule->id; ?>"><i
                                                                                class="fa fa-edit fa-lg"></i> Edit</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
											<?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $("#class").change(function () {
            var class_id = $(this).val();

            //$("#data_table_body").empty();
            var dataString = 'class_id=' + class_id;
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "/exam/examschedules/getExamSchedulesByClass",
                data: dataString,
                cache: false,
                success: function (objects) {
                    console.log(objects)
                    if (objects.length === 0) {
                        $("#data_table_body").empty();
                        $("#data_table_body").append('<tr><td colspan="9" class="text-center"> No data found..Please select another class</td></tr>')
                    } else {
                        $("#data_table_body").empty();
                        //add_to_item_table(objects);
                        $.each(objects, function (key, value) {

                            $("#data_table_body").append('<tr>' +
                                '<td>' + eval(key + 1) + '</td>' +
                                '<td>' + value.exam_name + '</td>' +
                                '<td>' + value.class_name + '</td>' +
                                '<td>' + value.section_name + '</td>' +
                                '<td>' + value.subject_name + '</td>' +
                                '<td>' + value.exam_date + '</td>' +
                                '<td>' + value.from_time + '-' + value.to_time + '</td>' +
                                '<td>' + value.room_name + '</td>' +
                                "<td>" +
                                '<div data-toggle="tooltip" title="View Options" class="btn-group"> <button style="padding-top: 2px;padding-bottom: 2px;"' +
                                ' type="button" class="btn btn-default" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i>' +
                                '</button>  <ul class="dropdown-menu pull-right" role="menu" style="box-shadow: 0px 0px 5px 1px #888888;"> '
                                + ' <li><a data-toggle="tooltip" title="Edit"' +
                                ' href="/exam/ExamSchedules/showExamSchedule/' + value.id + '"><i class="fa fa-edit fa-lg"></i> Edit</a> ' +
                                ' </ul> </div> '+
                                "</td>" +
                                '</tr>'
                            )
                        })

                    }
                }
            })
        });
    });
</script>

<?php require APPROOT . '/views/layouts/footer.php' ?>