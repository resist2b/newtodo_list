<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $page_title ?></h1>
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
                                <?php foreach ($tasks as $task) : ?>
                                    <tr class="odd gradeX">

                                        <td>
                                            <?= form_open('tasks/delete') ?>
                                            <div class="form-group pull-right">
                                                <input type="hidden" name="task_id" value="<?= $task->task_id ?>" />
                                                <button type="submit" name="submit"  class="btn btn-large btn-danger fa fa-remove"></button>
                                            </div>
                                            <?= form_close(); ?>
                                            <?= form_open('tasks/edit') ?>
                                            <div class="form-group pull-right">
                                                <input type="hidden" name="task_id" value="<?= $task->task_id ?>" />
                                                <button type="submit" name="submit"  class="btn btn-large btn-success fa fa-edit"></button>
                                            </div>
                                            <?= form_close(); ?>

                                            <h3><a title="Working on this feature" href="<?= base_url('tasks/show') . DIRECTORY_SEPARATOR . $task->task_id ?>" target="_blank" ><?= $task->task_name ?></a></h3>
                                            <p><?= $task->list_name ?> Task</p>
                                               
                                            <span class="pull-left" style="width: 40em">
                                                
                                                 <?php if ($task->progressbar == 0): ?>
<div>Just <b>Work</b> and assign <b>completion percentage</b></div>
 <?php elseif ($task->progressbar >=80): ?>
   <div class="progress progress-striped"><div class="progress-bar active progress-bar-success" role="progressbar" aria-valuenow="<?= $task->progressbar ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $task->progressbar ?>%;"><?= $task->progressbar ?>%</div></div>
 <?php elseif ($task->progressbar >=50): ?>
   <div class="progress progress-striped"><div class="progress-bar active  progress-bar-warning" role="progressbar" aria-valuenow="<?= $task->progressbar ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $task->progressbar ?>%;"><?= $task->progressbar ?>%</div></div>
 <?php elseif ($task->progressbar >=10): ?>
   <div class="progress progress-striped"><div class="progress-bar active progress-bar-info " role="progressbar" aria-valuenow="<?= $task->progressbar ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $task->progressbar ?>%;"><?= $task->progressbar ?>%</div></div>
<?php endif; ?>
                                            </span>
                                            <div class="pull-right "> <span class="text-muted">Due on:<?php  echo substr($task->due_date, 0,10);   ?></span> <span title="Working on this feature"class="badge ">
<?php 
       
        $due_date = new DateTime('now');

        try {
            $since_start = $due_date->diff(new DateTime($task->due_date));
        } catch (Exception $exc) {
            echo 'un-known';
        }



        if ($since_start->days == 0 && $since_start->h == 0 && $since_start->i == 0) {
    echo '<span class="text-danger">Voided task</span>';
}
elseif ($since_start->days < 1 && $since_start->h == 0) {
    echo ' '.$since_start->i.' minutes';
}
elseif ($since_start->days < 1 && $since_start->h > 0) {
    echo ' '.$since_start->h.' hours and '.$since_start->i.' minutes';
}
elseif ($since_start->days == 1) {
    echo ' Tomorrow';
}
//elseif ($since_start->days > 1 ) {
//    echo 'Due '.$since_start->h.' and '.$since_start->i;
//}
 elseif ($since_start->days > 1) {
    echo ' '.$since_start->days.' Days, '.$since_start->h.' Hours';
}
 else {
    echo ' '.$since_start->days.' Day';
}
//        echo $since_start->d . ' days<br>';
//        echo $since_start->h . ' hours<br>';
//        echo $since_start->i . ' minutes<br>';
//        echo $since_start->s . ' seconds<br>';
?>
                                                            
                                                        </span></a></span></div>
                                                   
                                            


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







