<?php require APPROOT . '/views/layouts/header.php' ?>
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
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
                                    <h3><i class="zmdi zmdi-edit"></i>Mark</h3>
                                </div>
                                <div class="filters">
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--border"
                                         style="width: 180px">
                                        <select class="form-control" name="exam_id" id="exams">
                                            <option selected="selected">Exam</option>
											<?php foreach ( $data['exams'] as $exam ): ?>
                                                <option value="<?php echo $exam->id; ?>"> <?php echo $exam->name; ?></option>
											<?php endforeach; ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--border"
                                         style="width: 180px">
                                        <select class="form-control" name="class_id" id="class">
                                            <option selected="selected">Class</option>
											<?php foreach ( $data['classes'] as $class ): ?>
                                                <option value="<?php echo $class->id; ?>"> <?php echo $class->name; ?></option>
											<?php endforeach; ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--border"
                                         style="width: 180px">
                                        <select class="form-control" name="section_id" id="section">
                                            <option selected="selected">Section</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--border"
                                         style="width: 180px">
                                        <select class="form-control" name="subject_id" id="subject">
                                            <option selected="selected">Subject</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--border"
                                         style="width: 180px">
                                        <select class="form-control" name="mark_distribution" id="mark_distribution">
                                            <option selected="selected">Mark Distribution</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">

                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead id="table_head_id">
                                            <tr class="headings">
                                                <th class="column-titlet">#</th>
                                                <th class="column-titlet">Photo</th>
                                                <th class="column-titlet">Name</th>
                                                <th class="column-titlet">Registration NO</th>
                                                <th class="column-titlet"><label id ="mark_type"></label></th>

                                            </tr>
                                            </thead>
                                            <tbody id="data_table_body">

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

    $("#table_head_id").hide();
    $("#data_table_body").hide();
    $(document).ready(function () {
        $("#class").change(function () {
            var classes = $(this).val();
            $("#section").empty();
            $("#subject").empty();
            $("#table_head_id").hide();
            $("#data_table_body").empty();
            $("#section").append('<option value="">Section</option>');
            $("#subject").append('<option value="">Subject</option>');
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
                        $("#section").append('<option value="">Section</option>');
                        $("#subject").empty();
                        $("#subject").append('<option value="">Subject</option>');
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


        $("#section").change(function () {
            var class_id = $("#class").val();
            $("#subject").empty();
            $("#table_head_id").hide();
            $("#data_table_body").empty();
            $("#subject").append('<option value="">Subject</option>');
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
                        $("#subject").append('<option value="">Subject</option>');
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
        $("#subject").change(function () {
            var class_id = $("#class").val();
            $("#mark_distribution").empty();
            $("#table_head_id").hide();
            $("#data_table_body").empty();
            $("#mark_distribution").append('<option value="">Mark Distribution</option>');
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
                        $("#data_table_body").empty();
                        $("#mark_distribution").empty();
                        $("#mark_distribution").append('<option value="">Mark Distribution</option>');
                    } else {
                        // $("#classes").empty();
                        //add_to_item_table(objects);
                        $.each(objects, function (key, value) {
                            $("#data_table_body").empty();
                            $("#mark_distribution").append('<option value=' + value.id + '>' + value.type + '</option>'
                            )
                        })
                    }
                }
            })
        });
    });


    $(document).ready(function () {
        $("#mark_distribution").change(function () {
            var exam_id = $("#exams").val();
            var class_id = $("#class").val();
            var section_id = $("#section").val();
            var subject_id = $("#subject").val();
            var mark_distribution = $(this).val();
            $("#table_head_id").show();
            $("#data_table_body").show();
            var dataString = 'class_id=' + class_id + '&exam_id=' + exam_id + '&subject_id=' + subject_id + '&section_id=' + section_id + '&mark_distribution=' + mark_distribution;
            $.ajax
            ({
                type: "GET",
                dataType: 'json',
                url: "/mark/marks/getMarks",
                data: dataString,
                cache: false,
                success: function (objects) {
                    console.log(objects)
                    if (objects.length === 0) {

                        $("#data_table_body").empty();
                        $("#data_table_body").append('<tr><td colspan="7" class="text-center"> No data found...</td></tr>')
                    } else {
                        $("#data_table_body").empty();
                        //add_to_item_table(objects);
                        $.each(objects, function (key, value) {
                            document.getElementById('mark_type').innerHTML = ""+value.mark_type+"("+value.mark_value+")";
                            var attendance_id = value.attendance_id;
                            var student_id = value.student_id;
                            $("#data_table_body").append('<tr>' +
                                '<td>' + eval(key + 1) + '</td>' +
                                '<td><img class="img-40" src="http://localhost/images/students/' + value.student_photo + '"</td>' +
                                '<td >' + value.student_name + '</td>' +
                                '<td>' + value.registration_no + '</td>' +
                                '<td style="width: 120px"> <input id="' + value.attendance_id + '" type="text" size="1px" class="btn btn-outline-info btn-sm form-control" value="' + value.gained_mark + '" onchange="updateMark(' + attendance_id + ',' + student_id + ',this.id )" /> </td> ' +
                                '</tr>'
                            )
                        })
                    }
                }
            })
        });
    });

    function updateMark(attendance_id,student_id, mark_type) {
        var exam_id = $("#exams").val();
        var gained_mark = $("#" + mark_type).val();
        var class_id = $("#class").val();
        var section_id = $("#section").val();
        var subject_id = $("#subject").val();
        var mark_distribution = $("#mark_distribution").val();
        var dataString = 'mark_type=' + mark_type + '&gained_mark=' + gained_mark + '&attendance_id=' + attendance_id
            + '&class_id=' + class_id + '&exam_id=' + exam_id + '&subject_id=' + subject_id + '&section_id=' + section_id
            + '&mark_distribution=' + mark_distribution + '&student_id=' + student_id;
        $.ajax
        ({
            type: "GET",
            dataType: 'json',
            url: "/mark/marks/updateMarks",
            data: dataString,
            cache: false,
        })
    }


</script>

<?php require APPROOT . '/views/layouts/footer.php' ?>


