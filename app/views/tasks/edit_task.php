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
                <option value="20">20%</option>
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

<!--        <div class="form-group">
            <label for="due_date">due_date</label>
            <div class="input-group date">
                <input  class="form-control datepicker" value="<?= $task->due_date ?>" name="due_date" type="text" >
                <div class="input-group-addon"><span class="glyphicon glyphicon-th" aria-hidden="true"></span></div>
            </div>
        </div>-->
        
        
         <div class="form-group">
                <label for="datetimepicker1">Due Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input value="<?= $task->due_date ?>"  name="due_date" type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

        <div class="form-group">


            <input type="hidden" name="task_id" value="<?= $task->task_id ?>" />
            <button type="submit" name="submit"  class="btn btn-large btn-success">Edit Task</button>
        </div>
        <?= form_close(); ?>
    </div>
    <!-- /.row -->
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
