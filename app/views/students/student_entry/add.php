<?php require APPROOT . '/views/layouts/header.php' ?>
    <!--Mobile header with Nav bar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
    <!--Menu Sidebar with nav bar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
    <!--Desktop header with nav bar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6" style="margin:auto ">
                        <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="au-card-title">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="fa fa-pencil-alt"></i>Student</h3>
                                    </div>

                                    <div class="card-body">
                                        <form action="<?php URLROOT ?>/Students/add" enctype="multipart/form-data"
                                              method="post" id="register-form">
                                            <div class="form-group">
                                                <div class="input-group-addon2">Name</div>
                                                <div class="input-group">
                                                    <input type="text" name="name" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group-addon2">Guardian</div>
                                                <div class="rs-select2--dark rs-select2--border col-lg-12">
                                                    <select name="guardian_id" class="js-select2">
                                                        <option value="" selected="selected">Select</option>
                                                        <?php foreach ($data['guardians'] as $guardian): ?>
                                                            <option value="<?php echo $guardian->id; ?>">
                                                                <?php echo $guardian->guardian_name; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group-addon2">Date of Birth</div>
                                                <div class="input-group">
                                                    <input type="text" name="date_of_birth"
                                                           class="form-control datepicker" required readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group-addon2">Gender</div>
                                                <div class="rs-select2--dark rs-select2--border col-lg-12">
                                                    <select name="gender" class="js-select2">
                                                        <option value="" selected="selected">Select</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group-addon2">Blood Group</div>
                                                <div class="rs-select2--dark rs-select2--border col-lg-12">
                                                    <select class="js-select2" name="blood_group">
                                                        <option value="" selected="selected">Select</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group-addon2">Religion</div>
                                                <div class="input-group">
                                                    <input type="text" name="religion" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group-addon2">Current Address</div>
                                                <div class="input-group">
                                                    <input type="text" name="current_address" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group-addon2">Permanent Address</div>
                                                <div class="input-group">
                                                    <input type="text" name="permanent_address"
                                                           class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group-addon2">Photo</div>
                                                <div class="input-group">
                                                    <input type="file" name="photo" class="custom-file-input">
                                                    <label class="custom-file-label rounded-pill" for="validatedCustomFile">Select
                                                        Photo</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group-addon2">Extra Curricular Activities</div>
                                                <div class="input-group">
                                                    <input type="text" name="extra_curricular_activities"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group-addon2">Remarks</div>
                                                <div class="input-group">
                                                    <input type="text" name="remarks" class="form-control" required
                                                           aria-required="true" aria-invalid="false">
                                                </div>
                                            </div>

                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-default rounded-pill ml-0 mt-4">Add Student</button>
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
    </div>
    <script>
        $(document).ready(function () {
            /*date picker code*/
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
            /*date picker code ends*/

            //Validation Code Starts.....
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
                        }
                        else if (element.className = 'js-select2') {
                            error.insertAfter(element.parent());
                        }
                        else {
                            error.insertAfter(element);
                        }
                    }
                });
                $("#register-form").validate({
                    rules: {
                        name: {
                            required: true,
                            rangelength: [6, 24]
                        },
                        guardian_id: {
                            required: true
                        },
                        date_of_birth: {
                            required: true
                        },
                        gender: {
                            required: true
                        },
                        blood_group: {
                            required: true
                        },
                        religion: {
                            required: true
                        },
                        current_address: {
                            required: true
                        },
                        permanent_address: {
                            required: true
                        },
                        photo: {
                            required: true
                        },
                        extra_curricular_activities: {
                            required: true
                        },
                        remarks: {
                            required: true
                        }


                    },
                    messages: {
                        name: {
                            required: 'Please enter name',
                            rangelength: 'Name must have 6-30 characters',
                        },
                        guardian_id: {
                            required: 'Please Select a Guardian',

                        },
                        date_of_birth: {
                            required: 'Please Select a Date',

                        },
                        gender: {
                            required: 'Please Select a Gender',

                        },
                        blood_group: {
                            required: 'Please Select Blood Group',

                        },
                        religion: {
                            required: 'Please Enter Religion',

                        },
                        current_address: {
                            required: 'Please Enter Current Address',

                        },
                        permanent_address: {
                            required: 'Please Enter Permanent Address',

                        },
                        photo: {
                            required: 'Please Select a Photo',

                        },
                        extra_curricular_activities: {
                            required: 'Please Enter Extra Curricular Activity',

                        },
                        remarks: {
                            required: 'Please Enter Remarks',

                        },

                    }
                });

            });

            // Validation Code Ends Here....


            $("#class_id").change(function () {
                var classes = $(this).val();
                $("#section_id").empty();
                $("#section_id").append('<option value="">----Section----</option>');
                // $("#data_table_body").empty();
                var dataString = 'class_id=' + classes;
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/students/getSectionsByClass",
                    data: dataString,
                    cache: false,
                    success: function (objects) {
                        console.log(objects)
                        if (objects.length === 0) {
                            $("#section_id").empty();
                            $("#section_id").append('<option value="">----Section----</option>');
                        } else {
                            // $("#classes").empty();
                            //add_to_item_table(objects);
                            $.each(objects, function (key, value) {

                                $("#section_id").append('<option value=' + value.id + '>' + value.section_name + '</option>')
                            })

                        }
                    }

                });

            });

        });
    </script>


<?php require APPROOT . '/views/layouts/footer.php' ?>