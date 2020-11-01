<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Nav bar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with nav bar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktop header with nav bar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<style>
    .dropdown-menu {
        margin: -31px -106px 0;
    }
</style>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="au-card-title" style="background-image:url('<?php echo htmlspecialchars(URLROOT) ?>/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3><i class="zmdi zmdi-edit"></i>Student</h3>
                                </div>
                                <div class="filters">
                                    <a class="btn btn-primary" href="<?php echo htmlspecialchars(URLROOT) ; ?>/smses/addTemplate" style="float: right; margin-bottom: 5px;"><i class="fa fa-plus" style="padding-right: 7px;"></i>Add Template</a>

                                </div>

                                <div class="x_content">
                                    <div class="table-responsive">

                                        <table id="example" class="table table-striped jambo_table bulk_action">
                                            <thead>
                                                <tr class="headings">
                                                    <th class="column-title">#</th>
                                                    <th class="column-title">Title</th>
                                                    <th class="column-title">Message Body</th>
                                                    <th class="column-title">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data_table_body">
                                                <?php $i = 0;
											foreach ( $data['templates'] as $template ): ?>

                                                <tr class="even pointer">
                                                    <input type="hidden" name="id">
                                                    <td>
                                                        <?php echo $i += 1 ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $template->title ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $template->body ?>
                                                    </td>
                                                    <td>

                                                        <div class="btn-group">
                                                            <button style="padding-top: 2px;padding-bottom: 2px;" type="button" class="btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                                            <ul class="dropdown-menu pull-right" role="menu" style="box-shadow: rgb(136, 136, 136) 0px 0px 5px 1px;">
                                                                <li><a href="<?php echo URLROOT ?>/Smses/showTemplate/<?php echo $template->id; ?>"><i class="fa fa-edit fa-lg"></i> Edit</a>
                                                                </li>
                                                            </ul>
                                                        </div>
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
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/layouts/footer.php' ?>