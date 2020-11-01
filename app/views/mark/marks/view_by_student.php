<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>
<?php $exid = 0 ?>


<form action="<?php URLROOT ?>/mark/Marks/viewResultByStudent/<?php echo $data['student_id'] ?>" method="post">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <?php $exam = $data['exam']; ?>
                    <div class="col-sm-6" style="margin: auto">
                        <div class="au-card au-card au-card--no-pad m-b-40" style="box-shadow: 0px 0px 3px 0px #888888;">

                            <div class="au-card-title" style="padding: 20px; background-image:url('http://localhost/images/bg-title-01.jpg');">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3><i class="zmdi zmdi-edit"></i>
                                    Show Exam
                                </h3>
                            </div>
                            <center>
                                <div style="margin-left: 10px; margin-top: 11px; margin-bottom: 11px;" class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                    <select class="form-control" name="exam_id" tabindex="-1" aria-hidden="true">
                                        <option value="<?php echo $exam->id ?>" selected="selected">
                                            <?php echo $exam->name ?>
                                        </option>
                                        <?php foreach ( $data['exams'] as $exam ): ?>
                                        <option value="<?php echo $exam->id; ?>">
                                            <?php echo $exam->name; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </center>
                            <center>
                                <button style="margin-bottom:20px" type="submit" class="btn btn-primary">Show Result</button>
                            </center>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="au-card-title" style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <center>
                                                        <h3 style="color: #fff">
                                                            <?php echo $data['exam']->name; ?>
                                                        </h3>
                                                    </center>
                                                </div>
                                                <?php foreach ( $data['marks'] as $mark ): ?>
                                                <div class="col-sm-8 header-title-with-anchor">
                                                    <center>
                                                        <h3 style="color: #fff; font-weight: 400;text-align: left">
                                                            Student :
                                                            <?php echo $mark->student_name ?>

                                                            <a href="<?php URLROOT ?>/mark/Marks/viewByClass?class_id= <?php echo $mark->class_id ?>                                                         &exam_id=<?php echo  $mark->exam_id ; ?> ">
                                                                Class :
                                                                <?php echo $mark->class_name ?>
                                                            </a>
                                                            Section :
                                                            <?php echo $mark->section_name ?>
                                                        </h3>
                                                    </center>
                                                </div>
                                                <?php break;
	                                            endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <table class="table table-striped jambo_table bulk_action">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" class="column-title" style="vertical-align: middle; border-right-width: 2px;border-right-style: solid;">
                                                            Subjects
                                                        </th>
                                                        <th class="column-title" style="border-right-width: 2px;border-right-style: solid;">
                                                            Mark
                                                        </th>
                                                        <th class="column-title" data-title="Highest Mark" style="border-right-width: 2px;border-right-style: solid;">
                                                            Highest Mark
                                                        </th>
                                                        <th class="column-title" data-title="Grade" style="border-right-width: 2px;border-right-style: solid;">
                                                            Grade
                                                        </th>
                                                        <th class="column-title" data-title="Point">Point
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ( $data['marks'] == null ): ?>
                                                    <?php foreach ( $data['subjects'] as $subject ): ?>
                                                    <tr>
                                                        <td class="text-black" data-title="Subject">
                                                            <strong>

                                                                <a href="<?php URLROOT ?>/mark/Marks/viewBySubject?student_id= <?php echo $data['student_id'] ?>
                                                            &subject_id=<?php echo $subject->id ?>&exam_id=<?php echo $data['exam']->id; ?> ">

                                                                    <?php echo $subject->subject_name; ?>
                                                                </a>
                                                            </strong>
                                                        </td>
                                                        <td class="text-black" data-title="Mark">
                                                            N/A
                                                        </td>
                                                        <td class="text-black" data-title="Highest Mark">
                                                            N/A
                                                        </td>
                                                        <td class="text-black" data-title="Grade">
                                                            N/A
                                                        </td>
                                                        <td class="text-black" data-title="Point">
                                                            N/A
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    <?php else: ?>
                                                    <?php foreach ( $data['subjects'] as $subject ): ?>
                                                    <tr>
                                                        <td class="text-black" data-title="Subject">
                                                            <strong>

                                                                <a href="<?php URLROOT ?>/mark/Marks/viewBySubject?student_id= <?php echo $data['student_id'] ?>
                                                            &subject_id=<?php echo $subject->id ?>&exam_id=<?php echo $data['exam']->id; ?> ">

                                                                    <?php echo $subject->subject_name; ?>
                                                                </a>
                                                            </strong>
                                                        </td>
                                                        <?php
														$i   = 0;
														$len = count( $data['marks'] ); ?>
                                                        <?php foreach ( $data['marks'] as $mark ): ?>
                                                        <?php if ( $subject->id == $mark->subject_id ): ?>

                                                        <td class="text-black" data-title="Mark">
                                                            <a href="<?php URLROOT ?>/mark/Marks/viewStudentResultBySubject?student_id= <?php echo $data['student_id'] ?>
                                                            &subject_id=<?php echo $mark->subject_id ?>&exam_id=<?php echo $mark->exam_id; ?> ">
                                                                <?php echo $mark->total_mark; ?>
                                                            </a>

                                                        </td>
                                                        <td class="text-black" data-title="Highest Mark">
                                                            <?php echo $mark->total_highest_mark; ?>
                                                        </td>


                                                        <td class="text-black" data-title="Grade">
                                                            <?php echo $mark->grade_name; ?>
                                                        </td>
                                                        <td class="text-black" data-title="Point">
                                                            <?php echo sprintf('%0.2f', $mark->grade_point);
                                                             ?>
                                                        </td>
                                                    </tr>
                                                    <?php break; ?>
                                                    <?php else: ?>

                                                    <?php if ( $i == $len - 1 ): ?>
                                                    <td class="text-black" data-title="Mark">
                                                        N/A
                                                    </td>
                                                    <td class="text-black" data-title="Highest Mark">
                                                        N/A
                                                    </td>
                                                    <td class="text-black" data-title="Grade">
                                                        N/A
                                                    </td>
                                                    <td class="text-black" data-title="Point">
                                                        N/A
                                                    </td>
                                                    </tr>
                                                    <?php endif; ?>
                                                    <?php $i ++; ?>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php require APPROOT . '/views/layouts/footer.php' ?>