<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/3/2018
 * Time: 1:49 PM
 */ ?>
<!--Page header and All CSS Files-->
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>
<div class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-lg-6">
                <div class="au-card x_panel">
                    <div class="au-card-title">
                        <div class="bg-overlay bg-overlay--blue"></div>
                        <h3>
                            <i class="zmdi zmdi-edit"></i>Add Subject</h3>
                    </div>
                    <div class="card-body card-block">
                        <form id="register_form" action="<?php echo URLROOT; ?>/academic/subjects/add" method="post"
                              class="form-horizontal">
                            <!--Class Name-->
                            <div class="form-group">
                                <div class="input-group-addon2">Class Name</div>
                                <div class="rs-select2--dark rs-select2--border col-lg-12">
                                    <select name="class_id" id="class_id"
                                            class="js-select2">
                                        <option value="">Please select</option>
                                        <?php foreach ($data['classes'] as $class): ?>
                                            <option value="<?php echo $class->id ?>">
                                                <?php echo $class->name; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>

                            <!--Type-->
                            <div class="form-group">
                                <div class="input-group-addon2">Type</div>
                                <div class="rs-select2--dark rs-select2--border col-lg-12">
                                    <select name="type" id="type"
                                            class="js-select2">
                                        <option value="">Please Select</option>
                                        <option value="1">General</option>
                                        <option value="2">Mandatory</option>
                                        <option value="3">Optional</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>

                            <!--Pass Mark-->
                            <div class="form-group">
                                <div class="input-group-addon2">Pass Mark</div>
                                <div class="input-group">
                                    <input type="text" id="pass_mark" name="pass_mark" placeholder="40"
                                           class="form-control">
                                </div>
                            </div>

                            <!--Final Mark-->
                            <div class="form-group">
                                <div class="input-group-addon2">Final Mark</div>
                                <div class="input-group">
                                    <input type="text" id="final_mark" name="final_mark" placeholder="100"
                                           class="form-control">
                                </div>
                            </div>

                            <!--Subject Name-->
                            <div class="form-group">
                                <div class="input-group-addon2">Subject Name</div>
                                <div class="input-group">
                                    <input type="text" id="subject_name" name="subject_name"
                                           placeholder="ex: Bangla" class="form-control">
                                </div>
                            </div>

                            <!--Subject Code-->
                            <div class="form-group">
                                <div class="input-group-addon2">Subject Code</div>
                                <div class="input-group">
                                    <input type="text" id="subject_code" name="subject_code" placeholder="ex: 101"
                                           class="form-control">
                                </div>
                            </div>

                            <!--Submit Button-->
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary btn-sm btn-rounded">Add Subject</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        //Validation Code Starts.....
        $(document).ajaxStart(function () {
            $("#loading").show();
        }).ajaxStop(function () {
            $("#loading").hide();
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
            $("#register_form").validate({
                rules: {
                    class_id: {
                        //Need Remote Validation
                        required: true,
                    },
                    type: {
                        required: true
                    },
                    pass_mark: {
                        required: true
                    },
                    final_mark: {
                        required: true
                    },
                    subject_name: {
                        required: true
                    },
                    subject_author: {
                        required: true
                    },
                    subject_code: {
                        required: true
                    }
                },
                messages: {
                    class_id: {
                        //Need Remote Validation
                        required: 'Please select a class',
                    },
                    type: {
                        required: 'Please select a type'
                    },
                    pass_mark: {
                        required: 'Please enter pass mark'
                    },
                    final_mark: {
                        required: 'Please enter final mark'
                    },
                    subject_name: {
                        required: 'Please enter subject name'
                    },
                    subject_author: {
                        required: 'Please enter subject author'
                    },
                    subject_code: {
                        required: 'Please enter a subject code'
                    }

                }
            });

        });

        // Validation Code Ends Here....

    });

</script>

<!--Footer file -->
<?php require APPROOT . '/views/layouts/footer.php' ?>
