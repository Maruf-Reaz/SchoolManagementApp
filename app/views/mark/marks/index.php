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
                                    <h3><i class="zmdi zmdi-edit"></i>Mark</h3>
                                </div>
                                <div class="filters">

                                    <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border" id="class_id">
                                        <select class="form-control" name="class" id="class">
                                            <option selected="selected">Class</option>
			                                <?php foreach ( $data['classes'] as $class ): ?>
                                                <option value="<?php echo htmlspecialchars($class->id) ; ?>"> <?php echo htmlspecialchars($class->name) ; ?></option>
			                                <?php endforeach; ?> </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border" >
                                        <select class="form-control" name="section_id" id="section">
                                            <option selected="selected">Section</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                
                                    <a data-toggle="tooltip" title="Add Mark" class="fa fa-plus"
                                       href="<?php URLROOT ?>/mark/Marks/add"
                                       style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>

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
                                                <th class="column-titlet">Option</th>
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
            $("#data_table_body").empty();
            $("#table_head_id").hide();
            $("#data_table_body").hide();
            $("#section").empty();
            $("#section").append('<option value="">Section</option>');
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

                        $("#data_table_body").empty();
                        $("#data_table_body").append('<tr><td colspan="7" class="text-center"> No data found...</td></tr>')
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
            var section_id = $("#section").val();
            $("#table_head_id").show();
            $("#data_table_body").show();
            $("#data_table_body").empty();
            // $("#data_table_body").empty();
            var dataString = 'class_id=' + class_id+'&section_id=' + section_id;
            $.ajax
            ({
                type: "GET",
                dataType: 'json',
                url: "/mark/marks/getAllMarks",
                data: dataString,
                cache: false,
                success: function (objects) {
                    console.log(objects)
                    if (objects.length === 0) {
                        $("#data_table_body").empty();
                        $("#data_table_body").append('<tr><td colspan="7" class="text-center"> No data found..Please select a class</td></tr>')
                    } else {
                        $("#data_table_body").empty();

                        //add_to_item_table(objects);
                        $.each(objects, function (key, value) {
                            $("#data_table_body").append('<tr>' +
                                '<td>' + eval(key + 1) + '</td>' +
                                '<td><img class="img-40" src="/images/students/' + value.photo + '"</td>' +
                                '<td>' + value.student_name + '</td>' +
                                '<td>' + value.registration_no + '</td>' +
                                "<td>" +
                                "<a href= '/mark/marks/viewResultByStudent/" + value.id+"' class='btn btn-primary'><i class='fa fa-edit'></i> View</a>" +

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