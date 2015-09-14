<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $app_title ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>email</th>
                                    <th>username</th>
                                    <th>reg_date</th>
                                    <th>Admin/User</th>
                                    <th>last Login</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <!--loop-->
                                    <tr class="odd gradeX">
                                        <td><?= $user->first_name.' '.$user->last_name ?></td>
                                        <td><?= $user->email ?></td>
                                        <td><?= $user->username ?></td>
                                        <td><?= $user->reg_date ?></td>
                                        <td><span class="badge"><?= ($user->is_admin == 1 ? 'Admin' : 'User'); ?></span></td>
                                        <td>date</td>

                                    </tr>
                                <?php endforeach; ?>
                                <!--end loop-->
                            </tbody>
                        </table>

                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->







