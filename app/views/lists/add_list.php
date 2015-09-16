<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $page_title ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-5">
        <?= form_open('lists/validation_list'); ?>
        <div class="form-group">
            <label for="list_name"> list_name</label>
            <input class="form-control" type="text" name="list_name" value="" id="task_name" placeholder="Enter list_name" />
        </div>

        <div class="form-group">
            <label for="list_body"> list_body</label>
            <textarea class="form-control" id="list_body" name="list_body" placeholder="Enter list_body" ></textarea>
        </div>

            
        <div class="form-group">
            <button type="submit" name="submit"  class="btn btn-large btn-success">Add List</button>
        </div>
        <?= form_close(); ?>
    </div>
    </div>
    <!-- /.row -->
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
