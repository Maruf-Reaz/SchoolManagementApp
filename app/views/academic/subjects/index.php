<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/3/2018
 * Time: 1:44 PM
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
        .filters {
            background: transparent;
        }

        .filters .btn-primary {
            margin-bottom: 6px;
        }
    </style>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="x_panel au-card">
                        <div class="col-md-12 col-sm-12 col-xs-12 p-0">
                            <div class="au-card-title">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3><i class="zmdi zmdi-edit"></i>Subject</h3>
                            </div>

                            <div class="filters">
                                <a class="btn btn-primary btn-sm btn-rounded" href="<?php echo URLROOT; ?>/academic/subjects/add"><i
                                            class="fa fa-plus"></i>Add
                                    Subject</a>
                            </div>
                            <div class="x_content">
                                <div class="table-responsive-sm table-responsive-md">
                                    <table id="example2" class="table table-striped">
                                        <thead>
                                        <tr class="headings">
                                            <th class="column-title">S/N</th>
                                            <th class="column-title">Subject Name</th>
                                            <th class="column-title">Subject Code</th>
                                            <!--<th class="column-title">Teacher</th>-->
                                            <th class="column-title">Pass Mark</th>
                                            <th class="column-title">Finak Mark</th>
                                            <th class="column-title">Type</th>
                                            <th class="column-title">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($data['subjects'] as $subject): ?>
                                            <tr>
                                                <td>#</td>
                                                <td>
                                                    <?php echo $subject->subject_name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $subject->subject_code; ?>
                                                </td>
                                                <td>
                                                    <?php echo $subject->pass_mark; ?>
                                                </td>
                                                <td>
                                                    <?php echo $subject->final_mark; ?>
                                                </td>
                                                <td>
                                                    <?php echo $subject->type; ?>
                                                </td>

                                                <td>
                                                    <div
                                                            class="btn-group">
                                                        <button type="button"
                                                                data-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></button>
                                                        <ul class="dropdown-menu pull-right" role="menu">

                                                            <li>
                                                                <a href="<?php echo URLROOT ?>/academic/subjects/edit/<?php echo $subject->id; ?>"><i
                                                                            class="fa fa-edit fa-lg"></i>
                                                                    Edit</a></li>
                                                        </ul>
                                                    </div>
                                                </td>


                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr class="footer-datatable">
                                            <th class="column-title">S/N</th>
                                            <th class="column-title">Subject Name</th>
                                            <th class="column-title">Subject Code</th>
                                            <th class="column-title">Pass Mark</th>
                                            <th class="column-title">Finak Mark</th>
                                            <th class="column-title">Type</th>
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