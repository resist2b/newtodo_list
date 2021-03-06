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
                <!-- calculate the difference between $task->due_date And Current Data using TIMESTAMP? -->

                <?php
//                $due_date = $task->due_date;
//                $current_data = date("Y-m-d h:i:s");
//                $diff = (strtotime($due_date) - (strtotime($current_data)));
//                $years = floor($diff / (365 * 60 * 60 * 24));
//                $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
//                $days = floor($diff / 86400);
//                $hours = floor(($diff - ($days * 86400)) / 3600);
//                $minutes = floor(($diff - ($days * 86400) - ($hours * 3600)) / 60);
//                $seconds = floor(($diff - ($days * 86400) - ($hours * 3600) - ($minutes * 60)));
//                printf("%d years, %d months, %d days, %d hours, %d minutes, %d seconds\n", $years, $months, $days,$hours,$minutes,$seconds);


                $due_date = new DateTime($task->due_date);
                $current_data = new DateTime(date("Y-m-d h:i:s"));

                $diff = date_diff($current_data, $due_date);
                echo $diff->format("%R%a days");
                $days =  $diff->format("%R%a");
//                echo "<pre>";
//                var_dump(date_diff($due_date, $current_data)->h .'h');
//                echo "</pre>";

//                $interval = $due_date->diff($current_data);
////                echo "difference " . $interval->y . " years, " . $interval->m . " months, " . $interval->d . " days ";
//// shows the total amount of days (not divided into years, months and days like above)
////                echo "difference " . $interval->days . " days ";
//                $days = $interval->days;
                ?>
                <div class="panel panel-<?= ($days <= 2 ? 'danger' : 'default'); ?>    ">
                    <div class="panel-heading">
                        <div class="row">




                        <!--                            <div class="col-lg-10 col-xs-7"><h1><a title="Working on this feature" href="<?= base_url('tasks/show') . DIRECTORY_SEPARATOR . $task->task_id ?>" target="_blank" ><?= $task->task_name ?></a> </h1></div>-->
                            <div class="col-lg-10 col-xs-7"><h3><?= $task->task_name ?> </h3></div>

                            <div class="col-lg-2 col-xs-5">  
                                <div class="pull-right form_edit_del">
                                    <?= form_open('tasks/edit') ?>
                                    <input type="hidden" name="task_id" value="<?= $task->task_id ?>" />
                                    <button  title="edit task" type="submit" name="submit"  class=" btn btn-large btn-success fa fa-edit"></button>

                                    <?= form_close(); ?>
                                    <?= form_open('tasks/delete') ?>
                                    <input type="hidden" name="task_id" value="<?= $task->task_id ?>" />
                                    <button   title="delete task" style="margin-right: .25em"type="submit" name="submit"  class="btn btn-large btn-danger fa fa-remove"></button>
                                    <?= form_close(); ?>
                                </div>


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

                            <a href=" <?= base_url('tasks/show_list_tasks') . DIRECTORY_SEPARATOR . $task->list_id ?>"  ><span class="label label-default"><?= $task->list_name ?></span></a>


                            <?php if ($days < 0): ?>
                                <span class="label label-danger">OVERDUE</span>
                            <?php elseif ($days == 0) : ?>
                                <span class="label label-warning">Due Today</span>
                            <?php elseif ($days == 1) : ?>
                                <span class="label label-warning">Due Tomorrow</span>
                            <?php elseif ($days > 0) : ?>
                                <span title=" <?= 'working' ?>" class="label label-info">Due <?= $days ?> Days</span>


                            <?php endif; ?>
                        </div>


                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>







