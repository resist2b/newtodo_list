<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $app_title ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <?= form_open('users/save_new_user') ?>
        <div class="form-group">
            <label for="first_name"> first_name</label>
            <input class="form-control" type="text" name="first_name" value="" id="first_name" placeholder="Enter first_name" />
        </div>
        <div class="form-group">
            <label for="last_name"> last_name</label>
            <input class="form-control" type="text" name="last_name" value="" id="last_name" placeholder="Enter last_name" />
        </div>
        <div class="form-group">
            <label for="email"> email</label>
            <input class="form-control" type="email" name="email" value="" id="email" placeholder="Enter email" />
        </div>
        <div class="form-group">
            <label for="username">username</label>
            <input class="form-control" type="tex" name="username" value="" id="username" placeholder="Enter username" />
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input class="form-control" type="password" name="password" value="" id="password" placeholder="Enter password" />
        </div>

        <div class="form-group">
            <label for="is_admin">is_admin</label>
            <select class="form-control" name="is_admin">
                <option value="1">Admin</option>
                <option value="0">User</option>
            </select>
        </div>


        <div class="form-group">
            <button type="submit" name="submit"  class="btn btn-large btn-success">Add Task</button>
        </div>
        <?= form_close(); ?>
    </div>
    <!-- /.row -->
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
