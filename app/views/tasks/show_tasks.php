<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $page_title ?><a  class="btn btn-primary pull-right" href="<?= base_url('tasks/add_new_task') ?>" >New Task</a></h1>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <?php foreach ($tasks as $task) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">

<!--                            <div class="col-lg-10 col-xs-7"><h1><a title="Working on this feature" href="<?= base_url('tasks/show') . DIRECTORY_SEPARATOR . $task->task_id ?>" target="_blank" ><?= $task->task_name ?></a> </h1></div>-->
                            <div class="col-lg-10 col-xs-7"><h1><?= $task->task_name ?> </h1></div>

                            <div class="col-lg-2 col-xs-5">  
                                <div class="pull-right">
                                    <?= form_open('tasks/edit') ?>
                                    <input type="hidden" name="task_id" value="<?= $task->task_id ?>" />
                                    <button  title="edit task" type="submit" name="submit"  class="btn btn-large btn-success fa fa-edit"></button>
                                    <?= form_close(); ?>
                                </div>
                                <div class=""><?= form_open('tasks/delete') ?>
                                    <input type="hidden" name="task_id" value="<?= $task->task_id ?>" />
                                    <button   title="delete task" style="margin-right: .25em"type="submit" name="submit"  class="btn btn-large btn-danger fa fa-remove"></button>
                                    <?= form_close(); ?></div>


                            </div>

                        </div>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <p><?= $task->task_body ?></p>
                        <div class="pull-right ">
                            <?php if ($task->progressbar == 0): ?>
                            <div class="progress progress-striped"><div class="progress-bar active progress-bar-danger" role="progressbar" aria-valuenow="<?= $task->progressbar ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $task->progressbar ?>%;"><?= $task->progressbar ?>%</div></div>
                        <?php elseif ($task->progressbar >= 80): ?>
                            <div class="progress progress-striped"><div class="progress-bar active progress-bar-success" role="progressbar" aria-valuenow="<?= $task->progressbar ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $task->progressbar ?>%;"><?= $task->progressbar ?>%</div></div>
                        <?php elseif ($task->progressbar >= 50): ?>
                            <div class="progress progress-striped"><div class="progress-bar active  progress-bar-warning" role="progressbar" aria-valuenow="<?= $task->progressbar ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $task->progressbar ?>%;"><?= $task->progressbar ?>%</div></div>
                        <?php elseif ($task->progressbar >= 10): ?>
                            <div class="progress progress-striped"><div class="progress-bar active progress-bar-info " role="progressbar" aria-valuenow="<?= $task->progressbar ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $task->progressbar ?>%;"><?= $task->progressbar ?>%</div></div>
                        <?php endif; ?>
 <span class="label label-default"><?= $task->list_name ?></span>
                            <?php
                            $seconds = strtotime($task->due_date) - strtotime(date('m/d/Y'));
                            $days = floor($seconds / 86400);
                            $hours = floor(($seconds - ($days * 86400)) / 3600);
                            $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600)) / 60);
                            $seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes * 60)));
                            ?>

                            <?php if ($days < 0): ?>
                                <span class="label label-danger">OVERDUE</span>
                            <?php elseif ($days == 0) : ?>
                                <span class="label label-warning">Due Today</span>
                            <?php elseif ($days == 1) : ?>
                                <span class="label label-warning">Due Tomorrow</span>
                            <?php elseif ($days > 0) : ?>
                                <span class="label label-info">Due <?= $days ?> Days</span>


                            <?php endif; ?>
                        </div>
                        

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>







