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
        <?= form_open('todos/updata') ?>

        <div class="form-group">
            <label for="todo_name">todo_name</label>
            <input class="form-control" type="text" name="todo_name" value="<?= $todo->todo_name ?>" id="todo_name" placeholder="Enter todo_name" />
        </div>



        <div class="form-group">
            <label for="todo_body"> todo_body</label>
            <textarea class="form-control" id="todo_body" name="todo_body" placeholder="Enter todo_body" ><?= $todo->todo_body ?></textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id">
                <!--loop-->
                <?php foreach ($categories as $category) : ?>
                
                    <option<?= ($todo->category_id == $category->id ? ' selected="selected"' : FALSE); ?>  value="<?= $category->id ?>"> <?= $category->category_name ?></option>

                <?php endforeach; ?>
                <!--end loop-->
            </select>
        </div>

<!--        <div class="form-group">
            <label for="due_date">due_date</label>
            <div class="input-group date">
                <input  class="form-control datepicker" value="<?= $todo->due_date ?>" name="due_date" type="text" >
                <div class="input-group-addon"><span class="glyphicon glyphicon-th" aria-hidden="true"></span></div>
            </div>
        </div>-->
        
        
         <div class="form-group">
                <label for="datetimepicker1">Due Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input value="<?= $todo->due_date ?>"  name="due_date" type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

        <div class="form-group">


            <input type="hidden" name="todo_id" value="<?= $todo->todo_id ?>" />
            <button type="submit" name="submit"  class="btn btn-large btn-success">Edit Task</button>
        </div>
        <?= form_close(); ?>
    </div>
    <!-- /.row -->
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
