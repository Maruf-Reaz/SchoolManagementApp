<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktop header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-xs-12">
                    <div class="au-card au-card au-card--no-pad m-b-40">
                        <div class="au-card-title" style="padding: 20px;">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                                <i class="fa fa-pencil-alt"></i>Profile</h3>
                        </div>
                        <img style="width: 100px; margin-left: 123px; margin-top: 25px;"
                             class="profile-user-img img-responsive img-circle"
                             src="<?php echo URLROOT ?>/images/students/<?php echo $data['student']->photo ?>">
                        <div style="text-align: center;">
                            <h3 style="color: #666;"> <?php echo $data['student']->name ?></h3>
                            <h6 style="color: #666;"><?php echo $data['student']->registration_no ?></h6>
                        </div>
                        <div class="table-responsive table-style1">
                            <table class="table">
                                <tbody style="text-align:left;margin-left: 20px ">
                                <tr>
                                    <td><strong style="margin-left: 15px;">Date of birth :</strong></td>
                                    <td><?php echo $data['student']->date_of_birth ?></td>
                                </tr>
                                <tr>
                                    <td><strong style="margin-left: 15px;">Blood Group :</strong></td>
                                    <td><?php echo $data['student']->blood_group ?></td>
                                </tr>
                                <tr>
                                    <td><strong style="margin-left: 15px;">Address :</strong></td>
                                    <td><?php echo $data['student']->current_address ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" style="margin:auto ">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title"
                                     style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="fa fa-pencil-alt"></i>Assign Student</h3>
                                </div>
                                <div class="card-body">
                                    <form id="register-form" action="<?php URLROOT ?>/Students/assignStudent/<?php echo $data['student']->id ?>"
                                          method="post">
                                        <div class="form-group">
                                            <div class="input-group-addon2">Class</div>
                                            <div class="input-group">
                                                <select name="class_id" id="class_id" class="form-control">
                                                    <option value="" selected="selected">Class</option>
													<?php foreach ( $data['classes'] as $class ): ?>
                                                        <option value="<?php echo $class->id; ?>"> <?php echo $class->name; ?></option>
													<?php endforeach; ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Section</div>
                                            <div class="input-group">
                                                <select name="section_id" id="section_id" class="form-control">
                                                    <option value="" selected="selected">Section</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Roll No</div>
                                            <div class="input-group">
                                                <input type="text" placeholder="Roll No" name="roll_no"
                                                       id="roll_no" class="form-control">

                                            </div>
                                        </div>

                                        <div class="form-actions form-group">
                                            <button id="submit_button" type="submit" class="btn btn-primary rounded-pill ml-0 mt-4">Assign</button>
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

        $('#register-form').submit(function(e) {
            e.preventDefault();
            if ($("#register-form").valid())
            {

                var class_id = $("#class_id").val();
                var section_id = $("#section_id").val();
                var roll_no = $("#roll_no").val();
                var dataString = {class_id: class_id, section_id: section_id, roll_no: roll_no};
                $.ajax
                ({
                    type: "POST",
                    dataType: 'json',
                    url: "/students/checkRollNo",
                    data: dataString,
                    cache: false,
                    success: function (object) {
                        if (object===1){
                            $.notify({
                                title: '<strong>Warning!</strong>',
                                icon: 'fas fa-user-graduate ',
                                url: '',
                                target: '_blank',
                                message: "This roll number for this class and section already exists!"
                            }, {
                                type: 'danger',
                                animate: {
                                    enter: 'animated lightSpeedIn',
                                    exit: 'animated lightSpeedOut'
                                },
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                offset: {
                                    x: 50,
                                    y: 100
                                },
                                spacing: 10,
                                z_index: 1031,
                                delay: 7000,
                            });
                            $("#roll_no").val("");
                        }
                        else {
                            $("#register-form").unbind().submit();
                        }
                    }
                })

            }



        });


        //Validation Code Starts.....
        $(function() {

            $.validator.setDefaults({
                errorClass: 'help-block',
                highlight: function(element) {
                    $(element)
                        .closest('.form-group')
                        .addClass('has-error');
                },
                unhighlight: function(element) {
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
                    class_id: {
                        required: true,
                    },
                    section_id: {
                        required: true
                    },
                    roll_no: {
                        required: true
                    }

                },
                messages: {
                    class_id: {
                        required: 'Please select a class',
                    },
                    section_id: {
                        required: 'Please Select a section',

                    },
                    roll_no: {
                        required: 'Please enter a roll no',
                    },
                }
            });

        });
        // Validation Code Ends Here....

        $("#class_id").change(function () {
            var classes = $(this).val();
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
                        $("#section_id").empty();
                        $("#section_id").append('<option value="">Section</option>');
                    } else {
                        $("#section_id").empty();
                        $("#section_id").append('<option value="">Section</option>');
                        $.each(objects, function (key, value) {

                            $("#section_id").append('<option value=' + value.id + '>' + value.section_name + '</option>'
                            )
                        })

                    }
                }
            })
        });
    });
</script>

<?php require APPROOT . '/views/layouts/footer.php' ?>
