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
            <div class="row justify-content-lg-center">
                <div class="col-lg-6">
                    <div class="au-card x_panel">
                        <div class="au-card-title">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                                <i class="zmdi zmdi-edit"></i>Edit Subject</h3>
                        </div>
                        <div class="card-body card-block">
                            <form id="register_form" action="<?php echo URLROOT; ?>/academic/subjects/edit"
                                  method="post"
                                  class="form-horizontal">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                                <!--Class Name-->
                                <div class="form-group">
                                    <div class="input-group-addon2">Class Name</div>
                                    <div class="rs-select2--dark rs-select2--border col-lg-12">
                                        <select name="class_id" id="class_id" required
                                                class="js-select2">
                                            <option value="">Please select</option>
                                            <?php foreach ($data['classes'] as $class): ?>
                                                <?php if (!empty($data['class_id'])): ?>
                                                    <?php if ($data['class_id'] == $class->id): ?>
                                                        <option value="<?php echo $class->id ?>"
                                                                selected="selected">
                                                            <?php echo $class->name; ?>
                                                        </option>
                                                    <?php else: ?>
                                                        <option value="<?php echo $class->id ?>">
                                                            <?php echo $class->name; ?>
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-addon2">Type</div>
                                    <div class="rs-select2--dark rs-select2--border col-lg-12">
                                        <select name="type" id="type" required class="js-select2">
                                            <option value="">Please select</option>
                                            <option value="general" <?php echo $data['type'] == 'general' ? 'selected' : ''; ?> >
                                                General
                                            </option>
                                            <option value="mandatory" <?php echo $data['type'] == 'mandatory' ? 'selected' : ''; ?>>
                                                Mandatory
                                            </option>
                                            <option value="optional" <?php echo $data['type'] == 'optional' ? 'selected' : ''; ?>>
                                                Optional
                                            </option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <!--Pass Mark-->
                                <div class="form-group">
                                    <div class="input-group-addon2">Pass Mark</div>
                                    <div class="input-group">
                                        <input type="text" id="pass_mark" name="pass_mark" required
                                               value="<?php echo $data['pass_mark']; ?>"
                                               class="form-control">
                                    </div>
                                </div>
                                <!--Final Mark-->
                                <div class="form-group">
                                    <div class="input-group-addon2">Final Mark</div>
                                    <div class="input-group">
                                        <input type="text" id="final_mark" name="final_mark" required
                                               value="<?php echo $data['final_mark']; ?>"
                                               class="form-control">
                                    </div>
                                </div>
                                <!--Subject Name-->
                                <div class="form-group">
                                    <div class="input-group-addon2">Subject Name</div>
                                    <div class="input-group">
                                        <input type="text" id="subject_name" name="subject_name" required
                                               value="<?php echo $data['subject_name']; ?>"
                                               class="form-control">
                                    </div>
                                </div>
                                <!--Subject Code-->
                                <div class="form-group">
                                    <div class="input-group-addon2">Subject Code</div>
                                    <div class="input-group">

                                        <input type="text" id="subject_code" name="subject_code" required
                                               value="<?php echo $data['subject_code']; ?>"
                                               class="form-control">
                                    </div>
                                </div>
                                <!--Submit Button-->
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary btn-sm btn-rounded">
                                        Update Subject
                                    </button>
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
                        id: {
                            required: true,
                        }, class_id: {
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