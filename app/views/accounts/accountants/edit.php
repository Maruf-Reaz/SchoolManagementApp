<!--Page header and All CSS Files-->
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
                <div class="col-lg-6" style="margin: auto">
                    <div class="au-card au-card au-card--no-pad m-b-40">
                        <div class="au-card-title"
                             style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                                <i class="fa fa-pencil-alt"></i>Edit Accountant</h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php URLROOT; ?>/accounts/accountants/edit" enctype="multipart/form-data"
                                  method="post"
                                  class="form-horizontal" id="register-form">
                                <div class="form-group">
                                    <div class="input-group-addon2">Name</div>
                                    <div class="input-group">
                                        <input type="hidden" id="id" name="id"
                                               value="<?php echo $data['accountant']->id; ?>">
                                        <input type="text" id="accountant_name" name="accountant_name"
                                               placeholder="Edit Name..."
                                               class="form-control" required
                                               value="<?php echo $data['accountant']->accountant_name; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Photo</div>
                                    <div class="input-group">
                                        <img class="img-40"
                                             src="<?php URLROOT; ?>/images/accountants/<?php echo $data['accountant']->photo ?>"
                                             alt="image">
                                        <input type="hidden" id="oldPhoto" name="oldPhoto"
                                               value="<?php echo $data['accountant']->photo ?>">
                                        <input id="photo" name="photo" class="form-control" type="file">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">NID Or Passport Number</div>
                                    <div class="input-group">
                                        <input type="text" id="nid_number" name="nid_number"
                                               placeholder="Edit NID Or Passport Number..."
                                               class="form-control" required
                                               value="<?php echo $data['accountant']->nid_number; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Contact Number</div>
                                    <div class="input-group">
                                        <input type="text" id="contact_number" name="contact_number"
                                               placeholder="Edit Contact Number..." class="form-control" required
                                               value="<?php echo $data['accountant']->contact_number; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Email</div>
                                    <div class="input-group">
                                        <input type="email" id="email" name="email" placeholder="Edit Email..."
                                               class="form-control" required
                                               value="<?php echo $data['accountant']->email; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Educational Qualification</div>
                                    <div class="input-group">
                                        <input type="text" id="educational_qualification"
                                               name="educational_qualification"
                                               placeholder="Edit Educational Qualification..."
                                               class="form-control" required
                                               value="<?php echo $data['accountant']->educational_qualification; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Gender</div>
                                    <div class="input-group">
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="Male" <?php echo trim( $data['accountant']->gender ) == 'Male' ? 'selected' : '' ?>>
                                                Male
                                            </option>
                                            <option value="Female" <?php echo trim( $data['accountant']->gender ) == 'Female' ? 'selected' : '' ?>>
                                                Female
                                            </option>
                                            <option value="Other" <?php echo trim( $data['accountant']->gender ) == 'Other' ? 'selected' : '' ?>>
                                                Other
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Blood Group</div>
                                    <div class="input-group">
                                        <select class="form-control" id="blood_group" name="blood_group">
                                            <option value="N/A" <?php echo trim( $data['accountant']->blood_group ) == 'N/A' ? 'selected' : '' ?>>
                                                N/A
                                            </option>
                                            <option value="A+" <?php echo trim( $data['accountant']->blood_group ) == 'A+' ? 'selected' : '' ?>>
                                                A+
                                            </option>
                                            <option value="A-" <?php echo trim( $data['accountant']->blood_group ) == 'A-' ? 'selected' : '' ?>>
                                                A-
                                            </option>
                                            <option value="O+" <?php echo trim( $data['accountant']->blood_group ) == 'O+' ? 'selected' : '' ?>>
                                                O+
                                            </option>
                                            <option value="O-" <?php echo trim( $data['accountant']->blood_group ) == 'O-' ? 'selected' : '' ?>>
                                                O-
                                            </option>
                                            <option value="B+" <?php echo trim( $data['accountant']->blood_group ) == 'B+' ? 'selected' : '' ?>>
                                                B+
                                            </option>
                                            <option value="B-" <?php echo trim( $data['accountant']->blood_group ) == 'B-' ? 'selected' : '' ?>>
                                                B-
                                            </option>
                                            <option value="AB+" <?php echo trim( $data['accountant']->blood_group ) == 'AB+' ? 'selected' : '' ?>>
                                                AB+
                                            </option>
                                            <option value="AB-" <?php echo trim( $data['accountant']->blood_group ) == 'AB-' ? 'selected' : '' ?>>
                                                AB-
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Present Address</div>
                                    <div class="input-group">
                                        <input type="text" id="present_address" name="present_address"
                                               placeholder="Edit Present Address..."
                                               class="form-control" required
                                               value="<?php echo $data['accountant']->present_address; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Permanent Address</div>
                                    <div class="input-group">
                                        <input type="text" id="permanent_address" name="permanent_address"
                                               placeholder="Edit Permanent Address..."
                                               class="form-control" required
                                               value="<?php echo $data['accountant']->permanent_address; ?>">
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
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
                    accountant_name: {
                        required: true,
                        rangelength: [3, 30]
                    },
                    photo: {
                        remote: 'http://localhost/accounts/accountants/doesPhotoExist'
                    },
                    nid_number: {
                        required: true,
                        minlength: 8,
                        remote: {
                            url: 'http://localhost/accounts/accountants/doesNidNumberExistEdit',
                            data: {
                                'id': $('#id').val(),
                                'nid_number': $('#nid_number').innerHTML
                            }
                        }
                    },
                    contact_number: {
                        required: true,
                        minlength: 11,
                        pattern: /(^(\+8801|8801|01|008801))[1-9]{1}(\d){8}$/,
                        remote: {
                            url: 'http://localhost/accounts/accountants/doesContactNumberExistEdit',
                            data: {
                                'id': $('#id').val(),
                                'contact_number': $('#contact_number').innerHTML
                            }
                        }
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: 'http://localhost/accounts/accountants/doesEmailExistEdit',
                            data: {
                                'id': $('#id').val(),
                                'email': $('#email').innerHTML
                            }
                        }
                    },
                    educational_qualification: {
                        required: true
                    },
                    present_address: {
                        required: true
                    },
                    permanent_address: {
                        required: true
                    }
                },
                messages: {
                    accountant_name: {
                        required: 'Please enter name',
                        rangelength: 'Name must have 3-30 characters'
                    },
                    photo: {
                        required: 'Please insert a photo'
                    },
                    nid_number: {
                        required: 'Please enter NID number',
                        minlength: 'NID Or Passport number must have minimum 8 characters'
                    },
                    contact_number: {
                        required: 'Please enter Contact Number',
                        pattern: 'Please enter a valid phone number',
                        minlength: 'Contact number must have minimum 11 characters'
                    },
                    email: {
                        required: 'Please enter an email',
                        email: 'Please enter a valid email'
                    },
                    educational_qualification: {
                        required: 'Please enter educational qualification'
                    },
                    present_address: {
                        required: 'Please enter present address'
                    },
                    permanent_address: {
                        required: 'Please enter permanent address'
                    }
                }
            });
        });
        // Validation Code Ends Here....
    });

</script>

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>