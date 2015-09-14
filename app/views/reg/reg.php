            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">Registration Form</h2>
                            <p style="margin: 9px 0 10px;">Fill out the form to register </p>
                        </div>
                        <div class="panel-body">
                            <?php
                            $attributes = array('id' => 'login_form');
                             echo validation_errors('<p class="alert alert-danger ">');
                            echo form_open('users/chech_reg', $attributes);
                            ?>
                            <fieldset>   
                                
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input class="form-control" placeholder="First Name" id="first_name" name="first_name" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input class="form-control" placeholder="Last Name" id="last_name"  name="last_name" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" placeholder="Email" id="email" name="email" type="email" value="">
                                </div>
                                <div class="form-group">
                                    <label for="username">User Name</label>
                                    <input class="form-control" placeholder="User Name" id="username" name="username" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input class="form-control" placeholder="Confirm Password" id="confirm_password" name="confirm_password" type="password" value="">
                                </div>
                                <input class="form-control btn btn-success" name="register" type="submit" value="Register">
                            </fieldset>
                            <?= form_close(); ?>
                            <br>
                            <!--<a href="user/reg" class="btn btn-primary" target="_blank" >Register</a>-->
                        </div>
                    </div>
                </div>
            </div>
        