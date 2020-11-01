<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/8/2018
 * Time: 3:57 PM
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
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-6">
                        <div class="au-card au-card au-card--no-pad m-b-40">
                            <div class="au-card-title">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3>
                                    <i class="zmdi zmdi-edit"></i>Add Syllabus</h3>
                            </div>
                            <div class="card-body card-block">
                                <form id="register_form" action="<?php echo URLROOT; ?>/academic/syllabuses/add"
                                      method="post"
                                      enctype="multipart/form-data" class="form-horizontal">
                                    <!--Title-->
                                    <div class="form-group">
                                        <div class="input-group-addon2">Title</div>
                                        <div class="input-group">
                                            <input type="text" id="title" placeholder="ex: Bangla 1st" name="title"
                                                   required
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <!--Description-->
                                    <div class="form-group">
                                        <div class="input-group-addon2">Description</div>
                                        <div class="input-group">
                                            <input type="text" id="description"
                                                   placeholder="ex: Bangla 1st midterm syllabus"
                                                   name="description" required
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <!--Class-->
                                    <div class="form-group">
                                        <div class="input-group-addon2">Class</div>
                                        <div class="rs-select2--dark rs-select2--border col-lg-12">
                                            <select name="class_id" id="class_id" required class="js-select2">
                                                <option value="">Please select</option>
												<?php foreach ( $data['classes'] as $class ): ?>
                                                    <option value="<?php echo $class->id ?>">
														<?php echo $class->name; ?>
                                                    </option>
												<?php endforeach; ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <!--File-->
                                    <div class="form-group">
                                        <div class="input-group-addon2">File</div>
                                        <div class="input-group">
                                            
                                            <input type="file" id="file" name="file" class="custom-file-input">
                                                <label class="custom-file-label" for="validatedCustomFile">Select File</label>
                                        </div>
                                    </div>
                                    <!--Submit Button-->
                                    <div class="form-actions form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Add Syllabus
                                        </button>
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
                        title: {
                            //Need Remote Validation
                            required: true,
                        },
                        description: {
                            required: true
                        },
                        class_id: {
                            required: true
                        },
                        file: {
                            required: true
                        }
                    },
                    messages: {
                        title: {
                            required: 'Please enter a title',
                        },
                        description: {
                            required: 'Please enter a description',
                        },
                        class_id: {
                            required: 'Please select a class',
                        },
                        file: {
                            required: 'Please upload a file',
                        }
                    }
                });

            });

            // Validation Code Ends Here....

        });

    </script>

    <!--Footer file -->
<?php require APPROOT . '/views/layouts/footer.php' ?>