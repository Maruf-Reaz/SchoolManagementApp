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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>
                                <a class="au-btn au-btn-icon au-btn--green au-btn--small"
                                   href="<?php URLROOT; ?>/libraries/issuebooks/addIssue">
                                    <i class="zmdi zmdi-plus"></i>Issue a Book</a>
                            </strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php URLROOT; ?>/libraries/issuebooks/index" method="get"
                                  class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-12">
                                        <div class="input-group">
                                            <label class="control-label m-b-10">
                                                <strong>Library ID*</strong>
                                            </label>
                                            <input type="text" id="library_id" name="library_id"
                                                   placeholder="Enter Library ID " class="col-lg-3">
                                            <div class="input-group-btn">
                                                <button type="submit" id="searchButton"
                                                        class="btn btn-primary btn-sm"> Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
							<?php if ( ! empty( $data ) ): ?>
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Book</th>
                                        <th>Serial Number</th>
                                        <th>Issue Date</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="data_table_body">
									<?php if ( ( $data['books_and_members'] ) == null ): ?>
                                        <tr>
                                            <td colspan="6" class="text-danger">
                                                Invalid Library ID !! OR No data found for this Library ID !!
                                            </td>
                                        </tr>
									<?php else: ?>
										<?php foreach ( $data['books_and_members'] as $key => $book_and_member ): ?>
                                            <tr>
                                                <td><?php echo $key += 1 ?></td>
                                                <td><?php echo $book_and_member->book_name ?></td>
                                                <td><?php echo $book_and_member->serial_number ?></td>
                                                <td><?php echo $book_and_member->issue_date ?></td>
                                                <td><?php echo $book_and_member->status ?></td>
                                                <td class="text-lg-center">
                                                    <a href="<?php URLROOT; ?>/libraries/issuebooks/show-full-member-info/<?php echo $book_and_member->library_id ?>?book_id=<?php echo $book_and_member->book_id ?>"
                                                       class="btn btn-warning"><i class="zmdi zmdi-view-agenda"></i>view</a>&nbsp;
                                                    <a href="<?php URLROOT; ?>/libraries/issuebooks/edit-issue/<?php echo $book_and_member->library_id ?>?book_id=<?php echo $book_and_member->book_id ?>"
                                                       class="btn btn-primary"><i class="zmdi zmdi-edit"></i> edit</a>
                                                    <a onclick="alert('Are you sure ? This can not be undone!')"
                                                       href="<?php URLROOT; ?>/libraries/issuebooks/delete-issue/<?php echo $book_and_member->id ?>?book_id=<?php echo $book_and_member->book_id ?>"
                                                       class="btn btn-danger"><i class="zmdi zmdi-balance"></i>
                                                        return</a>
                                                    <a href="#"
                                                       class="btn btn-danger">
                                                        <i class="zmdi zmdi-satellite"></i>
                                                        add fine</a>
                                                </td>
                                            </tr>
										<?php endforeach; ?>
									<?php endif; ?>
                                    </tbody>
                                </table>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Footer ,Load every JS libarary-->
<?php require APPROOT . '/views/layouts/footer.php' ?>