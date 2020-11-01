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
                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Members</h2>
                        <div class="table-responsive table--no-card m-b-40">
                            <div class="rs-select2--dark rs-select2--md--light m-r-10 rs-select2--border">
                                <select class="form-control" id="class_numeric_value" name="class_numeric_value">
                                    <option value="0" selected="selected">----Select Class----</option>
									<?php foreach ( $data['classes'] as $class ): ?>
                                        <option value="<?php echo $class->numeric_value; ?>"> <?php echo $class->name; ?></option>
									<?php endforeach; ?>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roll</th>
                                    <th>Status</th>
                                    <th>Photo</th>
                                    <th>Section</th>
                                    <th>Class</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="data_table_body">
								<?php foreach ( $data['members'] as $key => $member ): ?>
                                    <tr>
                                        <td><?php echo $key += 1 ?></td>
                                        <td><?php echo $member->name ?></td>
                                        <td><?php echo $member->email ?></td>
                                        <td><?php echo $member->roll ?></td>
                                        <td><?php if ( $member->status == 1 ) {
												echo "active";
											} else {
												echo "inactive";
											}
											?>
                                        </td>
                                        <td><?php echo $member->photo ?></td>
                                        <td><?php echo $member->section_name ?></td>
                                        <td><?php echo $member->class_numeric_value ?></td>
                                        <td>
											<?php if ( empty( $member->library_id ) ): ?>
                                                <a href="<?php URLROOT; ?>/libraries/members/add-member/<?php echo $member->student_id ?>"
                                                   class="btn btn-primary"><i class="zmdi zmdi-account-add"></i>
                                                    add</a>
											<?php else: ?>
                                                <a href="<?php URLROOT ?>/libraries/members/show-member/<?php echo $member->student_id ?>"
                                                   class="btn btn-warning"><i class="zmdi zmdi-view-agenda"></i>
                                                    view</a>&nbsp;
                                                <a href="<?php URLROOT ?>/libraries/members/edit-member/<?php echo $member->student_id ?>"
                                                   class="btn btn-primary"><i class="zmdi zmdi-edit"></i> edit</a>
                                                <a onclick="alert('Are you sure ? This can not be undone')"
                                                   href="<?php URLROOT; ?>/libraries/members/delete-member/<?php echo $member->id ?>"
                                                   class="btn btn-danger"><i class="zmdi zmdi-delete"></i> delete</a>
											<?php endif; ?>
                                        </td>
                                    </tr>
								<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#class_numeric_value").change(function () {
                var class_numeric_value = $(this).val();
                var dataString = 'class_numeric_value=' + class_numeric_value;
                $.ajax
                ({
                    type: "POST",
                    dataType: 'json',
                    url: "http://localhost/libraries/issuebooks/showMembersByClass",
                    data: dataString,
                    cache: false,
                    success: function (objects) {
                        console.log(objects)
                        if (objects.length === 0) {
                            $("#data_table_body").empty();
                            $("#data_table_body").append('<tr><td colspan="9" class="text-center"> No data found..Please select a class</td></tr>')
                        } else {
                            $("#data_table_body").empty();
                            //add_to_item_table(objects);
                            $.each(objects, function (key, value) {
                                var view = '';
                                var edit = '';
                                var del = '';
                                var add = "";
                                if (value.library_id == null) {
                                    add = "<a href= 'http://localhost/libraries/members/add-member/" + value.student_id + "' class='btn btn-primary'><i class='zmdi zmdi-account-add'></i> add</a>";
                                } else {
                                    view = "<a href= 'http://localhost/libraries/members/show-Member/" + value.student_id + "' class='btn btn-warning'><i class='zmdi zmdi-view-agenda'></i> view</a>";
                                    edit = "<a href= 'http://localhost/libraries/members/edit-Member/" + value.student_id + "' class='btn btn-primary'><i class='zmdi zmdi-edit'></i> edit</a>";
                                    del = "<a href= 'http://localhost/libraries/members/delete-Member/" + value.id + "' class='btn btn-danger'><i class='zmdi zmdi-delete'></i> delete</a>";
                                }
                                var status = value.status == 0 ? 'inactive' : 'active';
                                $("#data_table_body").append('<tr>' +
                                    '<td>' + eval(key + 1) + '</td>' +
                                    '<td>' + value.name + '</td>' +
                                    '<td>' + value.email + '</td>' +
                                    '<td>' + value.roll + '</td>' +
                                    '<td>' + status + '</td>' +
                                    '<td>' + value.photo + '</td>' +
                                    '<td>' + value.section_name + '</td>' +
                                    '<td>' + value.class_numeric_value + '</td>' +
                                    "<td>" +
                                    add + ' ' +
                                    view + ' ' +
                                    edit + ' ' +
                                    del + ' ' +
                                    "</td>" +
                                    '</tr>'
                                )
                            })
                        }
                    }
                })
            });
        });
    </script>

<?php require APPROOT . '/views/layouts/footer.php' ?>