<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $app_title ?></h1>
            
               
        </div>
    </div>
   
    <?php if (isset($users)): ?>
    

        <?= form_open('users/updateUser') ?>
        <?php foreach ($users as $user) : ?>

            <div class="row">
                <div class="form-group">
                    <label for="first_name"> first_name</label>
                    <input class="form-control" type="text" name="first_name" value="<?= $user->first_name ?>" id="first_name" placeholder="Enter first_name" />
                </div>
                <div class="form-group">
                    <label for="last_name"> last_name</label>
                    <input class="form-control" type="text" name="last_name" value="<?= $user->last_name ?>" id="last_name" placeholder="Enter last_name" />
                </div>
                <div class="form-group">
                    <label for="email"> email</label>
                    <input class="form-control" type="email" name="email" value="<?= $user->email ?>" id="email" placeholder="Enter email" />
                </div>
                <div class="form-group">
                    <label for="username">username</label>
                    <input class="form-control" type="tex" name="username" value="<?= $user->username ?>" id="username" placeholder="Enter username" />
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input class="form-control" type="password" name="password" value="" id="password" placeholder="Enter password" />
                </div>
                
                 <div class="form-group">
                <label for="confirm_password">confirm_password</label>
                <input class="form-control" type="password" name="confirm_password" value="" id="confirm_password" placeholder="Enter password" />
            </div>


                <div class="form-group">
                    <button type="submit" name="submit"  class="btn btn-large btn-success">Update</button>
                </div>
                     <?php echo validation_errors('<p class="alert alert-danger ">')?>
            </div>
        <?= form_close(); ?>
        <?php endforeach; ?>
    
    
    <?php else: ?>
     <?= form_open('users/saveUser') ?>

    
        <div class="row">
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
                <label for="confirm_password">confirm_password</label>
                <input class="form-control" type="password" name="confirm_password" value="" id="confirm_password" placeholder="Enter password" />
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
        </div>
        <?= form_close(); ?>
    <?php endif; ?>


</div>

