<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $page_title ?>
            
            </h1>
            
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-5">
            <?= form_open('todos/save_todo') ?>
            <div class="form-group">
                <label for="todo_name"> todo_name</label>
                <input class="form-control" type="text" name="todo_name" value="" id="todo_name" placeholder="Enter todo_name" />
            </div>

            <div class="form-group">
                <label for="todo_body"> todo_body</label>
                <textarea class="form-control" id="todo_body" name="todo_body" placeholder="Enter todo_body" ></textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id">
                    <!--loop-->
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category->id ?>"> <?= $category->category_name ?></option>

                    <?php endforeach; ?>
                    <!--end loop-->
                </select>
            </div>

            <div class="form-group">
                <label for="datetimepicker1">Due Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input name="due_date" type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
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
                    Add Category
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Task">Add Category</button>
                    <!-- Modal -->
                    <div class="modal fade" id="Task" tabindex="-1" role="dialog" aria-labelledby="TaskLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="TaskLabel">Add Task</h4>
                                </div>
                                <div class="modal-body">
                                     <?= form_open('categories/save_category'); ?>
                                                <label for="category_name"> category_name</label>
                                                <input class="form-control" type="text" name="category_name" value="" id="todo_name" placeholder="Enter category_name">
                                           

                                            <div class="form-group">
                                                <label for="category_body"> category_body</label>
                                                <textarea class="form-control" id="category_body" name="category_body" placeholder="Enter category_body"></textarea>
                                            </div>


                                            <div class="form-group">
                                                <input  type="hidden" name="send_from"  value="todos/add_new_todo">
                                                <button type="submit" name="submit" class="btn btn-large btn-success">Add Category</button>
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
