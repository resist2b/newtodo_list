<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $app_title ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php foreach ($users as $user) : ?>
             <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">

<div class="col-lg-10 col-xs-7"><h3><?= $user->first_name.' '.$user->last_name ?></h3></div>

<div class="col-lg-2 col-xs-5">  
<div class="TODO_action_area pull-right">
 <form action="http://localhost/newtodo/todos/action" method="post" accept-charset="utf-8"><div style="display:none">
    <input type="hidden" name="csrf_test_name" value="3d42d42433b62103c70684e1431cdb68">
 </div>                    <input type="hidden" name="todo_id" value="73">
  <button title="Edit it" type="submit" name="action" value="edit" class=" btn btn-large btn-primary fa fa-edit"></button>
            
  
                                        
                                            </form>
                                        </div>


                                    </div>
                               
                            </div>

                        </div>
                        <div class="panel-body">
                            <p><?= $user->email ?></p>
                            <p><?= $user->username ?></p>
                            <p><?= $user->reg_date ?></p>
                            <span class="badge"><?= ($user->is_admin == 1 ? 'Admin' : 'User'); ?></span>
                        </div>
                    </div>
             <?php endforeach; ?>
            
        </div>
    </div>
</div>







