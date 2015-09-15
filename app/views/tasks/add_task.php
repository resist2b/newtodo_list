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
        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Task">Add List</button>
                    <!-- Modal -->
                    <div class="modal fade" id="Task" tabindex="-1" role="dialog" aria-labelledby="TaskLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="TaskLabel">Add Task</h4>
                                </div>
                                <div class="modal-body">
                                     <?= form_open('lists/save_list'); ?>
                                                <label for="list_name"> list_name</label>
                                                <input class="form-control" type="text" name="list_name" value="" id="task_name" placeholder="Enter list_name">
                                           

                                            <div class="form-group">
                                                <label for="list_body"> list_body</label>
                                                <textarea class="form-control" id="list_body" name="list_body" placeholder="Enter list_body"></textarea>
                                            </div>


                                            <div class="form-group">
                                                <input  type="hidden" name="send_from"  value="tasks/add_new_task">
                                                <button type="submit" name="submit" class="btn btn-large btn-success">Add List</button>
                                            </div>
                                            <?= form_close() ?>
                                </div>

                           

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <!-- .panel-body -->
            </div>

        </div>
    </div>
    <!-- /.row -->
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
