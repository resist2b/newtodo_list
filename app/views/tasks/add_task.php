<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $app_title ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-5">
        <?= form_open('tasks/save_task') ?>
        <div class="form-group">
            <label for="task_name"> task_name</label>
            <input class="form-control" type="text" name="task_name" value="" id="task_name" placeholder="Enter task_name" />
        </div>

        <div class="form-group">
            <label for="task_body"> task_body</label>
            <textarea class="form-control" id="task_body" name="task_body" placeholder="Enter task_body" ></textarea>
        </div>

        <div class="form-group">
            <label for="list_id">List</label>
            <select class="form-control" name="list_id">
                <!--loop-->
                <?php foreach ($lists as $list) : ?>
                    <option value="<?= $list->id ?>"> <?= $list->list_name ?></option>

                <?php endforeach; ?>
                <!--end loop-->
            </select>
        </div>

        <div class="form-group">
            <label for="due_date">due_date</label>
            <div class="input-group date">
                <input  class="form-control datepicker" name="due_date" type="text" >
                <div class="input-group-addon"><span class="glyphicon glyphicon-th" aria-hidden="true"></span></div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" name="submit"  class="btn btn-large btn-success">Add Task</button>
        </div>
        <?= form_close(); ?>
</div>
</div>
<!-- /.row -->
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
