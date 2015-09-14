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
                                    <th>task_name</th>
                                    <th>task_body</th>
                                    <th>list</th>
                                    <th>create_date</th>
                                    <th>due_date</th>
                                    <th>is_complete</th>
                                    <th>progressbar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($tasks as $task) :
                                    ?>
                                    <!--loop-->
                                    <tr class="odd gradeX">
                                        <td><?= $task->task_name ?></td>
                                        <td><?= $task->task_body ?></td>
                                        <td><?= $task->list_name ?></td>
                                        <td><?= $task->create_date ?></td>
                                        <td><?= $task->due_date ?></td>
                                        <td><?= $task->is_complete ?></td>
                                        <td><div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $task->progressbar ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $task->progressbar ?>%;">
                                                    <?= $task->progressbar ?>%
                                                </div>
                                            </div></td>
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







