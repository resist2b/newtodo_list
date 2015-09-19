<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class = "panel-body">
                <?php
                $attributes = array('id' => 'login_form');

                echo form_open('users/login', $attributes);
                ?>

                <?php echo validation_errors('<p class="alert alert-danger ">') ?>
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" value="<?php
                        if ($this->session->flashdata('username')): echo $this->session->flashdata('username');
                        endif;
                        ?>" placeholder="User Name" name="username" type="text" autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="<?= $this->session->flashdata('username') ? 'The password you entered' : 'password' ?>" name="password" type="password" value="">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                        </label>
                    </div>
                    <input class="form-control btn btn-success" name="login" type="submit" value="login">
                </fieldset>
                <?= form_close(); ?>
                <br>
                <?php if ($this->session->flashdata('save')): echo $this->session->flashdata('save'); ?>
                <?php else : ?>
                    <a href="users/reg_form" class="btn btn-primary" >Create account</a>
<?php endif; ?>

            </div>
        </div>
    </div>
</div>
