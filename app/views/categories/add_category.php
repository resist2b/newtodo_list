<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $page_title ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
        <?= form_open('categories/validation_category'); ?>
        <div class="form-group">
            <label for="category_name"> category_name</label>
            <input class="form-control" type="text" name="category_name" value="" id="task_name" placeholder="Enter category_name" />
        </div>

        <div class="form-group">
            <label for="category_body"> category_body</label>
            <textarea class="form-control" id="category_body" name="category_body" placeholder="Enter category_body" ></textarea>
        </div>

            
        <div class="form-group">
            <button type="submit" name="submit"  class="btn btn-large btn-success">Add List</button>
        </div>
        <?= form_close(); ?>
    
            <?php echo validation_errors('<p class="alert alert-danger">'); ?>
        </div>
    </div>
       
</div>
