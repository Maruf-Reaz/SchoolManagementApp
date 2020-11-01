<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/20/2018
 * Time: 4:34 PM
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
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add Routines</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php echo URLROOT; ?>/academic/routines/store" method="post"
                                  enctype="multipart/form-data"
                                  class="form-horizontal">
								<?php if ( ! isset( $data['routine'] ) ) {
									$data['routine'] = new \App\Models\Academic\Routine();
								} ?>
                                <!--School Year-->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="school_year" class=" form-control-label">School Year:
                                            <sup>*</sup></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="school_year" id="school_year" required
                                                class="form-control">
                                            <option value="">Please select</option>
											<?php foreach ( $data['academic_years'] as $year ): ?>
												<?php if ( $year->id == $data['routine']->school_year ): ?>
                                                    <option selected
                                                            value="<?php echo $year->id ?>"><?php echo $year->year; ?></option>
												<?php else: ?>
                                                    <option value="<?php echo $year->id ?>"><?php echo $year->year; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Class-->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Class
                                            <sup>*</sup>: </label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="class_id" id="class" required
                                                class="form-control">
                                            <option value="">Please select</option>
											<?php foreach ( $data['classes'] as $class ): ?>
												<?php if ( $class->id == $data['routine']->class_id ): ?>
                                                    <option selected
                                                            value="<?php echo $class->id ?>"><?php echo $class->name; ?></option>
												<?php else: ?>
                                                    <option value="<?php echo $class->id ?>"><?php echo $class->name; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Section-->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Section
                                            <sup>*</sup>: </label>
                                    </div>
                                    <div class="col-12 col-md-9 select2-container">
                                        <select class="select2-dropdown form-control" name="sections[]"
                                                multiple="multiple" id="section_id"
                                                required
                                        >
											<?php foreach ( $data['sections'] as $key => $section ): ?>
												<?php /*if ( $data['routineSections'][ $key ]->section_id == $section->id ): */ ?><!--
                                                    <option selected
                                                            value="<?php /*echo $section->id; */ ?>"><?php /*echo $section->section_name; */ ?></option>
												<?php /*else: */ ?>
												--><?php /*endif; */ ?>
                                                <option value="<?php echo $section->id; ?>"><?php echo $section->section_name; ?></option>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Subject-->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Subject
                                            <sup>*</sup>: </label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="subject_id" id="subject_id" required
                                                class="form-control">
                                            <option value="">Please select</option>
											<?php foreach ( $data['subjects'] as $subject ): ?>
												<?php if ( $subject->id == $data['routine']->subject_id ): ?>
                                                    <option selected
                                                            value="<?php echo $subject->id ?>"><?php echo $subject->subject_name; ?></option>
												<?php else: ?>
                                                    <option value="<?php echo $subject->id ?>"><?php echo $subject->subject_name; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Days-->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="day_id" class=" form-control-label">Days:
                                            <sup>*</sup> </label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="day_id" id="day_id" required
                                                class="form-control">
                                            <option value="">Please select</option>
											<?php foreach ( $data['days'] as $day ): ?>
												<?php if ( $day->id == $data['routine']->day_id ): ?>
                                                    <option selected
                                                            value="<?php echo $day->id ?>"><?php echo $day->name; ?></option>
												<?php else: ?>
                                                    <option value="<?php echo $day->id ?>"><?php echo $day->name; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Teacher Name-->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="teacher_id" class=" form-control-label">Teacher Name:
                                            <sup>*</sup> </label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="teacher_id" id="teacher_id" required
                                                class="form-control">
                                            <option value="">Please select</option>
											<?php foreach ( $data['teachers'] as $teacher ): ?>
												<?php if ( $teacher->id == $data['routine']->teacher_id ): ?>
                                                    <option selected
                                                            value="<?php echo $teacher->id ?>"><?php echo $teacher->name; ?></option>
												<?php else: ?>
                                                    <option value="<?php echo $teacher->id ?>"><?php echo $teacher->name; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Starting Time-->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="starting_time" class=" form-control-label">Starting Time:
                                            <sup>*</sup></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div id="FromTime" data-placement="left" data-align="bottom"
                                             data-autoclose="true">
                                            <input type="text" id="starting_time" name="starting_time" required
                                                   class="form-control" placeholder="Selected time" autocomplete="off"
                                                   value="<?php echo $data['routine']->starting_time; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--Ending Time-->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="ending_time" class=" form-control-label">Ending Time:
                                            <sup>*</sup></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div id="ending_time" data-placement="left" data-align="bottom"
                                             data-autoclose="true">
                                            <input type="text" id="ending_time" name="ending_time" required
                                                   class="form-control" placeholder="Selected time" autocomplete="off"
                                                   value="<?php echo $data['routine']->ending_time; ?>">
                                        </div>
                                    </div>
                                </div>

                                <!--Allocation Error-->
								<?php if ( isset( $data['routine']->conflicted_routine_id ) ): ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="ending_time" class="form-control-label invalid">Error:</label>
                                        </div>
                                        <div class="col-12 col-md-8 alert alert-danger" role="alert">
                                            This room is already alloted for another schedule at this time..The routine
                                            --<br>

                                            <a href="<?php echo URLROOT; ?>/academic/routines/edit/<?php echo $data['routine']->conflicted_routine_id; ?>"
                                               class="alert-link">click here</a> to edit the conflicted routine
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="ending_time" class="form-control-label invalid">&nbsp;</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card border border-danger">
                                                <div class="card-header">
                                                    <strong class="card-title">Conflicted Routine</strong>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table">
                                                        <tr>
                                                            <td>Time:</td>
                                                            <td><?php echo $data['conflicted_routine']->starting_time; ?>
                                                                - <?php echo $data['conflicted_routine']->ending_time; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Subject:</td>
															<?php foreach ( $data['subjects'] as $subject ): ?>
																<?php if ( $subject->id == $data['conflicted_routine']->subject_id ): ?>
                                                                    <td><?php echo $subject->subject_name; ?></td>
																<?php endif; ?>
															<?php endforeach; ?>
                                                        </tr>
                                                        <tr>
                                                            <td>Class:</td>
															<?php foreach ( $data['classes'] as $class ): ?>
																<?php if ( $class->id == $data['conflicted_routine']->subject_id ): ?>
                                                                    <td><?php echo $class->name; ?></td>
																<?php endif; ?>
															<?php endforeach; ?>
                                                        </tr>
                                                        <tr>
                                                            <td>Room:</td>
															<?php foreach ( $data['rooms'] as $rooms ): ?>
																<?php if ( $rooms->id == $data['conflicted_routine']->room_id ): ?>
                                                                    <td><?php echo $rooms->name; ?></td>
																<?php endif; ?>
															<?php endforeach; ?>
                                                        </tr>
                                                        <tr>
                                                            <td>Day:</td>
															<?php foreach ( $data['days'] as $days ): ?>
																<?php if ( $days->id == $data['conflicted_routine']->day_id ): ?>
                                                                    <td><?php echo $days->name; ?></td>
																<?php endif; ?>
															<?php endforeach; ?>
                                                        </tr>
                                                        <tr>
                                                            <td>Teacher:</td>
															<?php foreach ( $data['teachers'] as $teachers ): ?>
																<?php if ( $teachers->id == $data['conflicted_routine']->teacher_id ): ?>
                                                                    <td><?php echo $teachers->name; ?></td>
																<?php endif; ?>
															<?php endforeach; ?>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								<?php endif; ?>
                                <!--Room-->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Room:
                                            <sup>*</sup> </label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="room_id" id="room_id" required
                                                class="form-control">
                                            <option value="">Please select</option>
											<?php foreach ( $data['rooms'] as $rooms ): ?>
												<?php if ( $rooms->id == $data['routine']->room_id ): ?>
                                                    <option selected
                                                            value="<?php echo $rooms->id ?>"><?php echo $rooms->name; ?></option>
												<?php else: ?>
                                                    <option value="<?php echo $rooms->id ?>"><?php echo $rooms->name; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Submit Button-->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Update
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


</div>

</div>
<script>
    $(document).ready(function () {
        $('.select2-dropdown').select2();
        $('#starting_time').clockpicker({
            use24hours: true,
            placement: 'top',
            align: 'left',
            autoclose: true
        });
        $('#ending_time').clockpicker({
            use24hours: true,
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

    function isSloteAvailable() {
        var day_id = $("#day_id").val();
        var room_id = $("#room_id").val();


    }
</script>
<!--Footer file -->
<?php require APPROOT . '/views/layouts/footer.php' ?>


