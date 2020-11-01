<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/6/2018
 * Time: 3:55 PM
 */

?>
<?php require APPROOT . '/views/layouts/header.php' ?>
    <!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
    <!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
    <!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="au-card x_panel">
                        <div class="au-card-title">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                                <i class="zmdi zmdi-edit"></i>Edit Section</h3>
                        </div>
                        <div class="card-body card-block">
                            <form id="register_form" action="<?php echo URLROOT; ?>/academic/sections/edit"
                                  method="post"
                                  class="form-horizontal">
                                <!--Section Id-->
                                <input type="hidden" name="id" value="<?php echo $data['section']->id; ?>">
                                <!--Section Name-->
                                <div class="form-group">
                                    <div class="input-group-addon2">Section</div>
                                    <div class="input-group">
                                        <input type="text" id="name" name="name" required
                                               value="<?php echo $data['section']->name; ?>" class="form-control">
                                    </div>
                                </div>
                                <!--Catagory-->
                                <div class="form-group">
                                    <div class="input-group-addon2">Category</div>
                                    <div class="input-group">
                                        <input type="text" id="catagory" name="catagory" required
                                               value="<?php echo $data['section']->catagory; ?>"
                                               class="form-control">
                                    </div>
                                </div>
                                <!--Capacity-->
                                <div class="form-group">
                                    <div class="input-group-addon2">Capacity</div>
                                    <div class="input-group">
                                        <input type="text" id="capacity" name="capacity" required
                                               value="<?php echo $data['section']->capacity; ?>"
                                               class="form-control">
                                    </div>
                                </div>
                                <!--Class Name-->
                                <div class="form-group">
                                    <div class="input-group-addon2">Class</div>
                                    <div class="rs-select2--dark rs-select2--border col-lg-12">
                                        <select name="class_id" id="class_id" required class="js-select2">
                                            <option value="">Please select</option>
                                            <?php foreach ($data['classes'] as $class): ?>
                                                <?php if (!empty($data['section']->class_id)): ?>
                                                    <?php if ($data['section']->class_id == $class->id): ?>
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
                                <!--Teacher Name-->
                                <div class="form-group">
                                    <div class="input-group-addon2">Teacher</div>
                                    <div class="rs-select2--dark rs-select2--border col-lg-12">
                                        <select name="teacher_id" id="teacher_id" required class="js-select2">
                                            <option value="">Please select</option>
                                            <?php foreach ($data['teachers'] as $teacher): ?>
                                                <?php if (!empty($data['section']->teacher_id)): ?>
                                                    <?php if ($data['section']->teacher_id == $teacher->id): ?>
                                                        <option value="<?php echo $teacher->id ?>"
                                                                selected="selected">
                                                            <?php echo $teacher->name; ?>
                                                        </option>
                                                    <?php else: ?>
                                                        <option value="<?php echo $teacher->id ?>">
                                                            <?php echo $teacher->name; ?>
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <!--Note-->
                                <!--<div class="form-group">
                                        <div class="input-group-addon2">Note</div>
                                        <div class="input-group">

                                            <input type="text" id="note" name="note"
                                                   value="<?php /*echo isset( $data['section']->note ) ? $data['section']->note : ''; */ ?>"
                                                   class="form-control">
                                        </div>
                                    </div>-->
                                <!--Submit Button-->
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary btn-rounded btn-sm">
                                        Update Section
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
                            //Need Remote Validation
                            required: true,
                        },
                        name: {
                            //Need Remote Validation
                            required: true,
                        },
                        catagory: {
                            required: true
                        },
                        capacity: {
                            required: true
                        },
                        class_id: {
                            required: true
                        },
                        teacher_id: {
                            required: true
                        },
                    },
                    messages: {
                        name: {
                            required: 'Please enter a name',
                        },
                        catagory: {
                            required: 'Please enter a catagory',
                        },
                        capacity: {
                            required: 'Please enter Capacity',
                        },
                        class_id: {
                            required: 'Please select a Class',
                        },
                        teacher_id: {
                            rrequired: 'Please select a Class Teacher',
                        }

                    }
                });

            });

            // Validation Code Ends Here....

        });

    </script>
    <!--Footer file -->
<?php require APPROOT . '/views/layouts/footer.php' ?>