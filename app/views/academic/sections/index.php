<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/5/2018
 * Time: 11:52 AM
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="x_panel au-card">
                        <div class="col-md-12 col-sm-12 col-xs-12 p-0">
                            <div class="au-card-title">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3><i class="zmdi zmdi-edit"></i>Section</h3>
                            </div>

                            <div class="filters">
                                <div class="rs-select2--dark rs-select2 m-r-10 rs-select2--border col-lg-2 col-xs-12">
                                    <select class="form-control js-select2"
                                            name="class" id="class">
                                        <option value="0" selected="selected">Select Class</option>
                                        <?php foreach ($data['classes'] as $class): ?>
                                            <option value="<?php echo $class->id; ?>">
                                                <?php echo $class->name; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <a class="btn btn-primary btn-sm btn-rounded" href="<?php echo URLROOT; ?>/academic/sections/add"></i>
                                    Add Section</a>

                            </div>
                            <div class="x_content">
                                <div class="table-responsive-sm table-responsive-md">
                                    <table class="table table-striped" id="example2">
                                        <thead>
                                        <tr class="headings">
                                            <th class="column-title">S/N</th>
                                            <th class="column-title">Section</th>
                                            <th class="column-title">Catagory</th>
                                            <th class="column-title">Capacity</th>
                                            <th class="column-title">Teacher Name</th>
                                            <!--<th class="column-title">Note</th>-->
                                            <th class="column-title">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody id="data_table_body">
                                        <?php foreach ($data['sections'] as $key => $section): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $key + 1; ?>
                                                </td>
                                                <td>
                                                    <?php echo $section->section_name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $section->catagory; ?>
                                                </td>
                                                <td>
                                                    <?php echo $section->capacity; ?>
                                                </td>
                                                <td>
                                                    <?php echo $section->teacher_name; ?>
                                                </td>

                                                <td>
                                                    <a href="<?php echo URLROOT ?>/academic/sections/edit/<?php echo $section->id; ?>"
                                                       class="btn btn-primary btn-sm border-0">Edit</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr class="footer-datatable">
                                            <th class="column-title">S/N</th>
                                            <th class="column-title">Section</th>
                                            <th class="column-title">Catagory</th>
                                            <th class="column-title">Capacity</th>
                                            <th class="column-title">Teacher Name</th>
                                            <!--<th class="column-title">Note</th>-->
                                            <th class="column-title">Action</th>

                                        </tr>
                                        </tfoot>
                                    </table>
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
            $("#class").change(function () {
                var class_id = $(this).val();
                // $("#data_table_body").empty();
                var dataString = 'class_id=' + class_id;
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/academic/sections/getSectionsByClass",
                    data: dataString,
                    cache: false,
                    success: function (objects) {
                        if (objects.length === 0) {
                            $("#data_table_body").empty();
                            $("#data_table_body").append('<tr><td colspan="7" class="text-center"> No data found..Please select a class</td></tr>')
                        } else {
                            $("#data_table_body").empty();
                            //add_to_item_table(objects);
                            $.each(objects, function (key, value) {

                                $("#data_table_body").append('<tr>' +
                                    '<td>' + eval(key + 1) + '</td>' +
                                    '<td>' + value.section_name + '</td>' +
                                    '<td>' + value.catagory + '</td>' +
                                    '<td>' + value.capacity + '</td>' +
                                    '<td>' + value.teacher_name + '</td>' +
                                    "<td>" +
                                    "<a href= 'http://localhost/academic/sections/edit/" + value.id + "' class='btn btn-primary'><i class='zmdi zmdi-edit'></i>Edit</a>" + ' ' +
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
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function () {

            $('#example2').DataTable({
                "pagingType": "full_numbers",
                "dom": 'tB<"right"rpl>',
                "columnDefs": [{
                    "searchable": true,
                }],

                buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                ]
            });
            $('#example2 tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search" class="form-control bottom-search"/>');
            });
            // DataTable
            var table = $('#example2').DataTable();
            // Apply the search
            table.columns().every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>