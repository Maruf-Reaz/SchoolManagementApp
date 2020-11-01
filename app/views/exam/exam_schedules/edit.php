<!--//written by
//Maruf
//5-9-2018
-->
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
                <div class="col-lg-6" style="margin:auto ">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="fa fa-pencil-alt"></i>Exam Schedule</h3>
                                </div>
                                <div class="card-body">
                                    <form id="register-form" action="<?php URLROOT ?>/exam/ExamSchedules/editExamSchedule" method="post">

                                        <input name="id" type="hidden" value="<?php echo $data['exam_schedule']->id; ?>">
                                        <div class="form-group">
                                            <div class="input-group-addon2">Exam</div>
                                            <div class="input-group">
                                                <input type="hidden"  name="exam_id" value="<?php echo $data['exam']->id; ?>">
                                                <input type="text" name="exam_name"
                                                       value="<?php echo $data['exam']->name; ?>" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Class</div>
                                            <select name="class_id" id="class" class="form-control">
                                                <option value="<?php echo $data['exam_schedule']->class_id ?>"
                                                        selected="selected"><?php echo $data['exam_schedule']->class_name ?></option>
												<?php foreach ( $data['classes'] as $class ): ?>
                                                    <option value="<?php echo $class->id; ?>"> <?php echo $class->name; ?></option>
												<?php endforeach; ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Section</div>
                                            <select name="section_id" id="section" class="form-control">
                                                <option value="<?php echo $data['exam_schedule']->section_id ?>"><?php echo $data['exam_schedule']->section_name ?></option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Subject</div>
                                            <select name="subject_id" id="subject" class="form-control">
                                                <option value="<?php echo $data['exam_schedule']->subject_id ?>"><?php echo $data['exam_schedule']->subject_name ?></option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Mark Distribution</div>
                                            <select name="mark_distribution_id" id="mark_distribution_id"
                                                    class="form-control">
                                                <option value="<?php echo $data['exam_schedule']->mark_distribution_id ?>"><?php echo $data['exam_schedule']->mark_distribution_type ?></option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Date</div>
                                            <div class="input-group">
                                                <input type="text" name="date"
                                                       class="form-control datepicker"
                                                       value="<?php echo $data['exam_schedule']->exam_date?>" required
                                                       readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">From Time</div>
                                            <div data-placement="left" data-align="bottom"
                                                 data-autoclose="true">
                                                <input type="text" id="from_time" name="from_time" required
                                                       class="form-control" placeholder="Selected time"
                                                       autocomplete="off" readonly
                                                       value="<?php echo $data['exam_schedule']->from_time ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">To Time</div>
                                            <div data-placement="left" data-align="bottom"
                                                 data-autoclose="true">
                                                <input type="text" id="to_time" name="to_time" required
                                                       class="form-control" placeholder="Selected time"
                                                       autocomplete="off" readonly
                                                       value="<?php echo $data['exam_schedule']->to_time ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Room</div>
                                            <select name="room_id" id="room_id" class="form-control">
                                                <option value="<?php echo $data['exam_schedule']->room_id ?>"><?php echo $data['exam_schedule']->room_name ?></option>
												<?php foreach ( $data['rooms'] as $room ): ?>
                                                    <option value="<?php echo $room->id; ?>"> <?php echo $room->name; ?></option>
												<?php endforeach; ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                        </div>
                                </div>
                                </form>
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
        /*date picker code*/
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        /*date picker code ends*/
        $('#from_time').clockpicker({
            use24hours: true,
            placement: 'top',
            align: 'left',
            autoclose: true
        });
        $('#to_time').clockpicker({
            use24hours: true,
            placement: 'top',
            align: 'left',
            autoclose: true
        });


    });
    $(function () {

        $.validator.setDefaults({
            errorClass: 'help-block',
            highlight: function (element) {
                $(element)
                    .closest('.form-group')
                    .addClass('has-error');
            },
            unhighlight: function (element) {
                $(element)
                    .closest('.form-group')
                    .removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                if (element.prop('type') === 'checkbox') {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });
        $("#register-form").validate({
            rules: {
                exam_id: {
                    required: true,
                },
                class_id: {
                    required: true
                },
                section_id: {
                    required: true
                },
                subject_id : {
                    required: true
                },
                mark_distribution_id : {
                    required: true
                },
                date : {
                    required: true
                },
                from_time : {
                    required: true
                },
                to_time : {
                    required: true
                },
                room_id : {
                    required: true
                },



            },
            messages: {
                exam_id: {
                    required: 'Please Select a exam',
                },
                class_id: {
                    required: 'Please Select a class',

                },
                section_id: {
                    required: 'Please Select a Section',

                },
                mark_distribution_id: {
                    required: 'Please select a Mark Distribution',

                },
                subject_id: {
                    required: 'Please select a Subject',

                },
                date: {
                    required: 'Please select a Date',

                },
                from_time: {
                    required: 'Please select a Time',

                },
                to_time: {
                    required: 'Please select a Time',

                },
                room_id: {
                    required: 'Please select a Room',

                },

            }
        });

    });



    $(document).ready(function () {
        $("#class").change(function () {
            var classes = $(this).val();
            $("#section").empty();
            $("#section").append('<option value="">Select</option>');
            // $("#data_table_body").empty();
            var dataString = 'class_id=' + classes;
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "/students/getSectionsByClass",
                data: dataString,
                cache: false,
                success: function (objects) {
                    console.log(objects)
                    if (objects.length === 0) {
                        $("#section").empty();
                        $("#section").append('<option value="">Select</option>');
                    } else {
                        // $("#classes").empty();
                        //add_to_item_table(objects);
                        $.each(objects, function (key, value) {

                            $("#section").append('<option value=' + value.id + '>' + value.section_name + '</option>'
                            )
                        })

                    }
                }
            })
        });
    });


    $(document).ready(function () {
        $("#class").change(function () {
            var class_id = $(this).val();
            $("#subject").empty();
            $("#subject").append('<option value="">Select</option>');
            // $("#data_table_body").empty();
            var dataString = 'class_id=' + class_id;
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "/exam/examschedules/getSubjectsByClass",
                data: dataString,
                cache: false,
                success: function (objects) {
                    console.log(objects)
                    if (objects.length === 0) {
                        $("#subject").empty();
                        $("#subject").append('<option value="">Select</option>');
                    } else {
                        // $("#classes").empty();
                        //add_to_item_table(objects);
                        $.each(objects, function (key, value) {

                            $("#subject").append('<option value=' + value.id + '>' + value.subject_name + '</option>'
                            )
                        })

                    }
                }
            })
        });
    });

    $(document).ready(function () {
        $("#class").change(function () {
            var class_id = $(this).val();
            $("#mark_distribution_id").empty();
            $("#mark_distribution_id").append('<option value="">Select</option>');
            // $("#data_table_body").empty();
            var dataString = 'class_id=' + class_id;
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "/exam/examschedules/getMarkDistributionsByClass",
                data: dataString,
                cache: false,
                success: function (objects) {
                    console.log(objects)
                    if (objects.length === 0) {
                        $("#mark_distribution_id").empty();
                        $("#mark_distribution_id").append('<option value="">Select</option>');
                    } else {
                        $("#mark_distribution_id").empty();
                        $("#mark_distribution_id").append('<option value="">Select</option>');
                        $.each(objects, function (key, value) {
                            $("#mark_distribution_id").append('<option value=' + value.id + '>' + value.type + '</option>'
                            )
                        })

                    }
                }
            })
        });
    });

</script>

<?php require APPROOT . '/views/layouts/footer.php' ?>
