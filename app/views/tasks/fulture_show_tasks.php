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
                            <p data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit" aria-describedby="tooltip273293"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p>
                            <p data-placement="top" data-toggle="tooltip" title="" data-original-title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p>


                            <!--                            <div class="col-lg-2 col-xs-5">  
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
                            
                            
                                                        </div>-->

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
                                <span class="label label-danger">OVERDUE</span> <i class="fa fa-frown-o text-danger"></i>
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




<!-- edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
            </div>
            <div class="modal-body">
                
        <?= form_open('tasks/updata') ?>

        <div class="form-group">
            <label for="task_name">task_name</label>
            <input class="form-control" type="text" name="task_name" value="<?= $task->task_name ?>" id="task_name" placeholder="Enter task_name" />
        </div>



        <div class="form-group">
            <label for="task_body"> task_body</label>
            <textarea class="form-control" id="task_body" name="task_body" placeholder="Enter task_body" ><?= $task->task_body ?></textarea>
        </div>

        <div class="form-group">
            <label for="list_id">List</label>
            <select class="form-control" name="list_id">
                <!--loop-->
                <?php foreach ($lists as $list) : ?>
                    <option<?= ($task->list_id == $list->id ? ' selected="selected"' : FALSE); ?>  value="<?= $list->id ?>"> <?= $list->list_name ?></option>

                <?php endforeach; ?>
                <!--end loop-->
            </select>
        </div>
        <div class="form-group">
            <label for="list_id">progress</label>
            <select class="form-control" name="progressbar">
                <!--loop-->


                <!--progressbar-->
                <option  <?=  ($task->progressbar == $task->progressbar ? 'selected="selected"' : FALSE); ?> value="<?= $task->progressbar ?>"><?= $task->progressbar?>%</option>
                
                <option value="<?= $task->progressbar ?>" >------------------</option>
                <option value="0">0%</option>
                <option value="10">10%</option>
                <option value="200">20%</option>
                <option value="30">30%</option>
                <option value="40">40%</option>
                <option value="50">50%</option>
                <option value="60">60%</option>
                <option value="70">70%</option>
                <option value="80">80%</option>
                <option value="90">90%</option>
                <option value="100">100%</option>

                <!--end loop-->
            </select>
        </div>

        <div class="form-group">
            <label for="due_date">due_date</label>
            <div class="input-group date">
                <input  class="form-control datepicker" value="<?= $task->due_date ?>" name="due_date" type="text" >
                <div class="input-group-addon"><span class="glyphicon glyphicon-th" aria-hidden="true"></span></div>
            </div>
        </div>

        <div class="form-group">


            <input type="hidden" name="task_id" value="<?= $task->task_id ?>" />
            <button type="submit" name="submit"  class="btn btn-large btn-success">Edit Task</button>
        </div>
        <?= form_close(); ?>
                
                
            </div>   </div>   </div>   </div>


<!-- delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>

