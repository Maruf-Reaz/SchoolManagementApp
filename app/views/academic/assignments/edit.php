<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/17/2018
 * Time: 11:38 AM
 */
?>
<!--Page header and All CSS Files-->
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<style>
    .col-lg-6 {
        margin: auto;
    }
</style>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="au-card au-card au-card--no-pad m-b-40">
                        <div class="au-card-title">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                                <i class="zmdi zmdi-edit"></i>Edit Assignment</h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php echo URLROOT; ?>/academic/assignments/update" method="post"
                                  enctype="multipart/form-data"
                                  class="form-horizontal">
                                <input type="hidden" value="<?php echo $data['assignment']->id; ?>" name="id">
                                <!--Title-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Title</div>
                                        <input type="text" id="title" name="title" required
                                               value="<?php echo $data['assignment']->title; ?>" class="form-control">
                                               <div class="input-group-addon">
                                            <i class="fa fa-font"></i>
                                        </div>
                                    </div>
                                </div>
                                <!--Description-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Description</div>
                                        <input type="text" id="description" name="description" required
                                               value="<?php echo $data['assignment']->description; ?>"
                                               class="form-control">
                                               <div class="input-group-addon">
                                            <i class="fa fa-font"></i>
                                        </div>
                                    </div>
                                </div>
                                <!--Deadline-->
                                <div class="form-group">
                                   <div class="input-group">
                                        <div class="input-group-addon">Deadline</div>
                                        <input type="text" id="deadline" name="deadline" required autocomplete="off"
                                               value="<?php echo $data['assignment']->deadline; ?>"
                                               class="form-control">
                                               <div class="input-group-addon">
                                            <i class="fa fa-clock "></i>
                                        </div>
                                    </div>
                                </div>
                                <!--Class-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Class</div>
                                        <select name="class_id" id="class" required
                                                class="form-control">
                                            <option value="">Please select</option>
											<?php foreach ( $data['classes'] as $class ): ?>
												<?php if ( $class->id == $data['assignment']->class_id ): ?>
                                                    <option selected
                                                            value="<?php echo $class->id ?>"><?php echo $class->name; ?></option>
												<?php else: ?>
                                                    <option value="<?php echo $class->id ?>"><?php echo $class->name; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
                                        </select>
                                        <div class="input-group-addon">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <!--Section-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Section</div>
                                        <select class="select2-dropdown form-control" name="sections[]"
                                                multiple="multiple" id="section_id"
                                                required>
											<?php foreach ( $data['sections'] as $key => $section ): ?>
												<?php if ( $data['assignmentSections'][ $key ]->section_id == $section->id ): ?>
                                                    <option selected
                                                            value="<?php echo $section->id; ?>"><?php echo $section->section_name; ?></option>
												<?php else: ?>
                                                    <option value="<?php echo $section->id; ?>"><?php echo $section->section_name; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
                                        </select>
                                        <div class="input-group-addon">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <!--Subject-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Subject</div>
                                        <select name="subject_id" id="subject_id" required
                                                class="form-control">
                                            <option value="">Please select</option>
											<?php foreach ( $data['subjects'] as $subject ): ?>
												<?php if ( $subject->id == $data['assignment']->subject_id ): ?>
                                                    <option selected
                                                            value="<?php echo $subject->id ?>"><?php echo $subject->subject_name; ?></option>
												<?php else: ?>
                                                    <option value="<?php echo $subject->id ?>"><?php echo $subject->subject_name; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
                                        </select>
                                        <div class="input-group-addon">
                                            <i class="fa fa-book "></i>
                                        </div>
                                    </div>
                                </div>
                                <!--File-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">File</div>
                                        <input type="file" id="file" name="file"
                                               class="form-control">
                                               <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <span class="help-block"><?php echo $data['assignment']->file_name ?></span>
                                        
                                    </div>
                                </div>
                                <input type="hidden" name="old_file_name"
                                       value="<?php echo $data['assignment']->file_name ?>">
                                <!--Submit Button-->
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Add
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
        $('.select2-dropdown').select2();
        $('#deadline').datepicker({
            dateFormat: 'yy-mm-dd',
            placement: 'top',
            align: 'left',
            autoclose: true
        });

        $("#class").change(function () {
            var class_id = $(this).val();
            $("#section_id").empty();
            $("#subject_id").empty();
            var dataString = 'class_id=' + class_id;
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "/academic/assignments/getSectionAndSubjectByClass",
                data: dataString,
                cache: false,
                success: function (objects) {
                    console.log(objects);
                    if (objects.length === 0) {
                        $("#section_id").empty();
                        $("#subject_id").empty();
                    } else {
                        $.each(objects.sections, function (key, value) {
                            $("#section_id").append('<option value=' + value.id + '>' + value.section_name + '</option>');
                        });
                        $.each(objects.subjects, function (key, value) {
                            $("#subject_id").append('<option value=' + value.id + '>' + value.subject_name + '</option>');
                        });

                    }
                }
            })
        });
    });
</script>

<!--Footer file -->
<?php require APPROOT . '/views/layouts/footer.php' ?>


