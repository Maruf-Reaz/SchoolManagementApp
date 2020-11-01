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
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title" style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="fa fa-pencil-alt"></i>Teacher</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?php URLROOT ?>/Teachers/add" method="post" enctype="multipart/form-data" id="register-form">
                                        <div class="form-group">
                                            <div class="input-group-addon2">Name</div>
                                            <div class="input-group">
                                                <input type="text" id="username3" name="name" class="form-control" required aria-required="true" aria-invalid="false">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Designation</div>
                                            <div class="input-group">
                                                <input type="text" name="designation_id" class="form-control" required aria-required="true" aria-invalid="false">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">National Id / Passport No</div>
                                            <div class="input-group">
                                                <input type="text" name="national_id" class="form-control" required aria-required="true" aria-invalid="false">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Educational Qualification</div>
                                            <div class="input-group">
                                                <input type="text" name="educational_qualification" class="form-control" required aria-required="true" aria-invalid="false">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Speciality</div>
                                            <div class="input-group">
                                                <input type="text" name="speciality" class="form-control" required aria-required="true" aria-invalid="false">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Date of Birth</div>
                                            <div class="input-group">
                                                <input type="text" name="date_of_birth" class="form-control datepicker" required readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Gender</div>
                                            <div class="rs-select2--dark rs-select2--border col-lg-12">
                                                <select id="select" class="js-select2" name="gender">
                                                    <option value="" selected="selected">Gender</option>
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
                                                    <option value="" selected="selected">Blood Group</option>
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
                                                <input type="text" name="religion" class="form-control" required aria-required="true" aria-invalid="false">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Email Address</div>
                                            <div class="input-group">

                                                <input type="text" name="email" class="form-control" required aria-required="true" aria-invalid="false">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Phone no</div>
                                            <div class="input-group">

                                                <input type="text" name="phone" class="form-control" required aria-required="true" aria-invalid="false">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Current Address</div>
                                            <div class="input-group">

                                                <input type="text" name="current_address" class="form-control" required aria-required="true" aria-invalid="false">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Permanent Address</div>
                                            <div class="input-group">

                                                <input type="text" name="permanent_address" class="form-control" required aria-required="true" aria-invalid="false">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group-addon2">Joining Date</div>
                                            <div class="input-group">

                                                <input type="text" name="joining_date" class="form-control datepicker" required readonly>

                                                <!--<input  type="text" name="joining_date"
													   class=" datepicker" readonly>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Photo</div>
                                            <div class="input-group">
                                                <input type="file" class="custom-file-input" name="photo" required aria-required="true" aria-invalid="false">
                                                <label class="custom-file-label rounded-pill" for="validatedCustomFile">Select Photo</label>
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-default rounded-pill ml-0 mt-4">Add Teacher</button>
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
    $(document).ready(function() {
        /*date picker code*/
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        /*date picker code ends*/

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
                errorPlacement: function(error, element) {
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
                    designation_id: {
                        required: true
                    },
                    national_id: {
                        required: true
                    },
                    educational_qualification: {
                        required: true
                    },
                    speciality: {
                        required: true
                    },
                    religion: {
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
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        minlength: 11,
                        maxlength: 11,
                        digits: true
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
                    joining_date: {
                        required: true
                    }

                },
                messages: {
                    name: {
                        required: 'Please enter name',
                        rangelength: 'Name must have 6-30 characters',
                    },
                    designation_id: {
                        required: 'Please Select a Designation',

                    },
                    national_id: {
                        required: 'Please enter a NID no',
                        rangelength: 'NID must have 13 or 16 characters',

                    },
                    date_of_birth: {
                        required: 'Please Select a Date',

                    },
                    gender: {
                        required: 'Please Select a Gender',

                    },
                    educational_qualification: {
                        required: 'Please Enter Educational Qualification',

                    },
                    speciality: {
                        required: 'Please Enter teacher\'s speciality',

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
                    email: {
                        required: 'Please enter a email',
                        email: 'Please enter a valid email'

                    },
                    phone: {
                        required: 'Please Enter a phone no',
                        minlength: 'Phone number must have 11 digits',
                        maxlength: 'Phone number must have 11 digits',
                        digits: 'Phone number only contain digits',
                    },

                }
            });

        });
    });
</script>

<?php require APPROOT . '/views/layouts/footer.php' ?>