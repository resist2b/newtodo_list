

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            
            <h3 class="page-header">
                <span class="label label-default"><?= $todos_num_rows ?></span>
<?= $page_title ?> 
                <a  class="btn btn-primary pull-right" href="<?= base_url('todos/add_new_todo') ?>" >New TODO</a>
            </h3>
                

        </div>
    </div>
    <div class="row">


        <!-- check if $todos empty  -->
        <?php if (!$todos): ?>
            <div class="col-lg-6 right">
                <p>No <?= $page_title ?> to show</p>
            </div>
        <?php else : ?>

            <div class="col-lg-6 left">


                <!-- calculate the difference between $todo->due_date And Current Data using TIMESTAMP? -->
                <?php foreach ($todos as $todo) : ?>
                    <?php
                    $due_date = new DateTime($todo->due_date);
                    $current_data = new DateTime(date("Y-m-d H:i:s"));
                    $diff = date_diff($current_data, $due_date);
                    $days = $diff->format("%R%d");
                    $hours = $diff->format("%R%H");
                    $minutes = $diff->format("%R%i");
                    $seconds = $diff->format("%R%s");

//                echo $diff->format("%Y years, %m months, %d days,  %H hours, %i minutes, %s seconds") . "\n";
                    ?>

                    <div class="panel <?= ($todo->is_complete ? 'panel-success' : 'panel-danger'); ?>    ">
                        <div class="panel-heading">
                            <div class="row">

                                <div class="col-lg-10 col-xs-7"><h4><?= $todo->todo_name ?> </h4></div>

                                <div class="col-lg-2 col-xs-5">  
                                    <div class="TODO_action_area pull-right">
                                        <?= form_open('todos/action') ?>
                    <input type="hidden" name="todo_id" value="<?= $todo->todo_id ?>" />
<button  title="Edit it" type="submit" name="action" value="edit" class=" btn btn-large btn-primary fa fa-edit"></button>
                                                <?php if (!$todo->is_complete && !$todo->is_voided) :?>
                                        <button   title="Make it Done" type="submit" name="action"  value="done" class="btn btn-large btn-success fa fa-star"></button>
                                        <button   title="Void it" type="submit" name="action"   value="void" class="btn btn-large btn-danger fa fa-remove"></button>
                                                
                                     <?php elseif ($todo->is_voided && !$todo->is_complete) :?>
                                        <button  title="un void it" type="submit" name="action" value="un_void" class=" btn btn-large btn-success fa fa-edit"></button>
                                        
                                     <?php elseif ($todo->is_complete && !$todo->is_voided) :?>
                                        <button  title="Make it un done" type="submit" name="action" value="un_done" class=" btn btn-large btn-danger fa fa-edit"></button>
                                            <?php endif; ?>
                                        <?= form_close(); ?>

                                    </div>


                                </div>

                            </div>

                        </div>
                        <div class="panel-body">

                            <p><?= $todo->todo_body ?></p>

                                <a href=" <?= base_url('todos/show_category_todos') . DIRECTORY_SEPARATOR . $todo->category_id ?>"  ><span class="label label-default"><?= $todo->category_name ?></span></a>
                                <div class="pull-right">

                                
                                <!-- OVERDUE days -->
                                <?php if ($days < 0 && $hours <= 0 && $minutes <= 0): ?>
                                    <span class="label label-danger">OVERDUE <?= $days ?> days/<span>

                                    <!-- OVERDUE hours -->
                                <?php elseif ($days == 0 && $hours < 0 && $minutes <= 0): ?>
                                    <span class="label label-danger">OVERDUE <?= $hours ?>hours</span>

                                    <!-- OVERDUE minutes -->
                                <?php elseif ($days == 0 && $hours == 0 && $minutes <= 0): ?>
                                    <span class="label label-danger">OVERDUE<?= $minutes ?> minutes</span>


                                    <!-- Due $days -->
                                <?php elseif ($days > 0 && $hours >= 0 && $minutes >= 0) : ?>
                                    <span class="label label-success">Due <?= $days ?> $days</span>
                                    <!-- Due $hours -->
                                <?php elseif ($days == 0 && $hours > 0) : ?>
                                    <span class="label label-success">Due <?= $hours ?> hours <?= $minutes ?> minutes </span>

                                    <!--Due minutes--> 
                                <?php elseif ($days == 0 && $hours == 0 && $minutes > 0) : ?>
                                    <span class="label label-success">Due <?= $minutes ?> minutes</span>



                                <?php endif; ?>
                            </div>


                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="col-lg-6 right">


        </div>

    </div>
</div>







