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
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="au-card au-card au-card--no-pad m-b-40">
                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding-left-right">
                                <div class="au-card-title">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="fa fa-pencil-alt"></i>Fees</h3>
                                </div>
                                <div class="filters">
                                    <a class="btn btn-primary" href="<?php URLROOT; ?>/accounts/fees/add">
                                        <i class="fa fa-plus">
                                        </i>Add Class Wise Fee</a>
                                </div>
                                <div class="x_content">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action" id="example2">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">S/N</th>
                                                <th class="column-title">Class</th>
                                                <th class="column-title">Fee type</th>
                                                <th class="column-title">Fee</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php if ( $data['fees'] != null ): ?>
												<?php foreach ( $data['fees'] as $key => $fee ): ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $key += 1; ?></td>
                                                        <td><?php echo $fee->class_name ?></td>
                                                        <td><?php echo $fee->fee_type_name ?></td>
                                                        <td><?php echo $fee->fee_amount ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-default"
                                                                        data-toggle="dropdown" aria-expanded="false"><i
                                                                            class="fa fa-ellipsis-v"></i></button>
                                                                <ul class="dropdown-menu pull-right" role="menu">
                                                                    <li>
                                                                        <a href="<?php URLROOT; ?>/accounts/fees/edit/<?php echo $fee->id ?>">
                                                                            <i class="fa fa-edit fa-lg"></i>
                                                                            Edit</a>
                                                                    </li>
                                                                    <li><a class="delete-confirm"
                                                                           data-title="Delete Confirmation!"
                                                                           href="<?php URLROOT; ?>/accounts/fees/delete/<?php echo $fee->id ?>">
                                                                            <i class="fa fa-trash fa-lg"></i>
                                                                            Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
												<?php endforeach; ?>
											<?php endif; ?>
                                            </tbody>
                                            <tfoot>
                                            <tr class="headings">
                                                <th class="column-title">S/N</th>
                                                <th class="column-title">Class</th>
                                                <th class="column-title">Fee type</th>
                                                <th class="column-title">Fee</th>
                                                <th class="text-center">Action</th>
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