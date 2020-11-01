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
                                            <i class="fa fa-pencil-alt"></i>Student</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php URLROOT ?>/Students/editStudent"
                                              enctype="multipart/form-data" method="post" id="register-form">
                                            <input type="hidden" name="id" value="<?php echo $data['student']->id ?>">
                                            <input type="hidden" name="status"
                                                   value="<?php echo $data['student']->status ?>">
                                            <input type="hidden" name="assignment"
                                                   value="<?php echo $data['student']->assignment ?>">
                                            <input type="hidden" name="registration_no"
                                                   value="<?php echo $data['student']->registration_no ?>">
                                            <div class="form-group">
                                                <div class="input-group-addon2">Name</div>
                                                <div class="input-group">

                                                    <input type="text" id="username3" name="name" class="form-control"
                                                           required aria-required="true" aria-invalid="false"
                                                           value="<?php echo $data['student']->name ?>">
                                                </div>
                                            </div>

                                            <div class="form-group" name="guardian_id">
                                                <div class="input-group-addon2">Guardian</div>
                                                <div class="rs-select2--dark rs-select2--border col-lg-12">
                                                    <select name="guardian_id" class="js-select2">
                                                        <option value="<?php echo $data['student']->guardian_id ?>"
                                                                selected="selected">
                                                            <?php echo $data['guardian_name'] ?>
                                                        </option>
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
                                                    <input placeholder="Date of Birth" type="text" name="date_of_birth"
                                                           value="<?php echo $data['student']->date_of_birth ?>"
                                                           class="form-control datepicker"
                                                           style="width: 68%; height: 40px" readonly>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="input-group-addon2">Gender</div>
                                                <div class="rs-select2--dark rs-select2--border col-lg-12">
                                                    <select id="select" class="js-select2" name="gender">
                                                        <option value="<?php echo $data['student']->gender ?>"
                                                                selected="selected">
                                                            <?php echo $data['student']->gender ?>
                                                        </option>
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
                                                        <option value="<?php echo $data['student']->blood_group ?>"
                                                                selected="selected">
                                                            <?php echo $data['student']->blood_group ?>
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

                                                    <input type="text" name="religion" class="form-control" required
                                                           value="<?php echo $data['student']->religion ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group-addon2">Current Address</div>
                                                <div class="input-group">

                                                    <input type="text" id="username3" name="current_address"
                                                           class="form-control"
                                                           value="<?php echo $data['student']->current_address ?>">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="input-group-addon2">Permanent Address</div>
                                                <div class="input-group">

                                                    <input type="text" id="username3" name="permanent_address"
                                                           class="form-control" required
                                                           value="<?php echo $data['student']->permanent_address ?>">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="input-group-addon2">Photo</div>
                                                <div class="input-group">
                                                    <div class="col-md-2">
                                                        <img class="img-40"
                                                             src="<?php URLROOT; ?>/images/students/<?php echo $data['student']->photo ?> ?>"
                                                             alt="image">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="file" id="username3" name="photo" class="form-control rounded-pill custom-file-input">
                                                        <label class="custom-file-label rounded-pill" for="validatedCustomFile">Select
                                                            Photo</label>
                                                    </div>
                                                    <input type="hidden" id="oldPhoto" name="oldPhoto"
                                                           value="<?php echo $data['student']->photo ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group-addon2">Extra Curricular activities No</div>
                                                <div class="input-group">

                                                    <input type="text" id="username3" name="extra_curricular_activities"
                                                           class="form-control" required
                                                           value="<?php echo $data['student']->extra_curricular_activities ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group-addon2">Remarks</div>
                                                <div class="input-group">

                                                    <input type="text" name="remarks" class="form-control" required
                                                           value="<?php echo $data['student']->remarks ?>">
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-default rounded-pill ml-0 mt-4">Confirm</button>
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
                        } else {
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
                        old_photo: {
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


            $("#class").change(function () {
                var classes = $(this).val();
                $("#section").empty();
                $("#section").append('<option value="">----Select Section----</option>');
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
                            $("#section").empty();
                            $("#section").append('<option value="">No Sections</option>');
                        } else {
                            // $("#classes").empty();
                            //add_to_item_table(objects);
                            $.each(objects, function (key, value) {

                                $("#section").append('<option value=' + value.id + '>' + value.section_name + '</option>')
                            })

                        }
                    }
                })
            });
        });
    </script>

<?php require APPROOT . '/views/layouts/footer.php' ?>