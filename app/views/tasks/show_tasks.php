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
                        <table class="table  table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>task_name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($tasks as $task) :?>
                                    <tr class="odd gradeX">
                                        

                                        <td>
                                            
                                         

<!--       <div class="pull-right">  <a href="<?= base_url('tasks/delete').DIRECTORY_SEPARATOR.$task->task_id ?>" class="btn "> <i class="fa fa-remove"></i></a>
                              
         <a href="<?= base_url('tasks/edit').DIRECTORY_SEPARATOR.$task->task_id ?>" class="btn"><i class="fa fa-edit"></i></a></div>-->
         
            <?= form_open('tasks/delete') ?>
                                            
          <div class="form-group pull-right">
            <input type="hidden" name="task_id" value="<?= $task->id ?>" />
            <button type="submit" name="submit"  class="btn btn-large btn-danger fa fa-remove"></button>
        </div>
          <?= form_close(); ?>
            <?= form_open('tasks/edit') ?>
          <div class="form-group pull-right">
            <input type="hidden" name="task_id" value="<?= $task->task_id ?>" />
            <button type="submit" name="submit"  class="btn btn-large btn-success fa fa-edit"></button>
        </div>
          <?= form_close(); ?>
                                            
          
          <h2>       <a href="<?= base_url('tasks/show') . DIRECTORY_SEPARATOR . $task->task_id ?>" target="_blank" ><?= $task->task_name ?></a></h2>
                                            <p><?= $task->list_name ?></p>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-<?= $task->progressbar > 50 ? 'success' : 'danger' ?>" role="progressbar" aria-valuenow="<?= $task->progressbar ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $task->progressbar ?>%;">
                                                    <?= $task->progressbar ?>%
                                                </div>
                                            </div>


                                        </td>
                                        <!--<td><?= $task->due_date ?></td>-->

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







