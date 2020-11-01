<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/15/2018
 * Time: 1:07 PM
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

    .select2-search__field {
        flex: 1 1 auto;
        border-radius: 50px;
        width: 100%;
    }
    .select2-selection--multiple {
        border: none!important;
    }
    .select2-search--inline {
        display: none!important;
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
                                <i class="zmdi zmdi-edit"></i>Add Assignment</h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php echo URLROOT; ?>/academic/assignments/add" method="post"
                                  enctype="multipart/form-data"
                                  class="form-horizontal">
                                <!--Title-->
                                <div class="form-group">
                                   <div class="input-group-addon2">Title</div>
                                    <div class="input-group">
                                        
                                        <input type="text" id="title" name="title" required
                                               class="form-control">
                                               
                                    </div>
                                </div>
                                <!--Description-->
                                <div class="form-group">
                                   <div class="input-group-addon2">Description</div>
                                    <div class="input-group">
                                        
                                        <input type="text" id="description" name="description" required
                                               class="form-control">
                                               
                                    </div>
                                </div>
                                <!--Deadline-->
                                <div class="form-group">
                                   <div class="input-group-addon2">Deadline</div>
                                    <div class="input-group">
                                        
                                        <input type="date" id="deadline" name="deadline" required
                                               class="form-control">
                                               
                                    </div>
                                </div>
                                <!--Class-->
                                <div class="form-group">
                                   <div class="input-group-addon2">Class</div>
                                    <div class="rs-select2--dark rs-select2--border col-lg-12">
                                        <select name="class_id" id="class" required
                                                class="js-select2">
                                            <option value="">Please select</option>
                                            <?php foreach ($data['classes'] as $class): ?>
                                                <option value="<?php echo $class->id ?>"><?php echo $class->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <!--Section-->
                                
                                
                                <div class="form-group">
                                   <div class="input-group-addon2 ">Section</div>
                                    <div class="rs-select2--dark rs-select2--border col-lg-12">
                                        <select class="js-select2" name="sections[]"
                                                multiple="multiple" id="section_id" required>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <!--Subject-->
                                <div class="form-group">
                                   <div class="input-group-addon2">Subject</div>
                                    <div class="rs-select2--dark rs-select2--border col-lg-12">
                                        <select name="subject_id" id="subject_id" required
                                                class="js-select2">
                                            <option value="">Please select</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <!--File-->
                                <div class="form-group">
                                   <div class="input-group-addon2">File</div>
                                    <div class="input-group">
                                        <input type="file" id="file" name="file" required class="custom-file-input">
                                        <label class="custom-file-label">Select Photo</label>
                                    </div>
                                </div>
                                
                                <!--Submit Button-->
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Add Assignment
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

