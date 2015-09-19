<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><span class="label label-default"><?= $categoriesNumRows ?></span> <?= $page_title ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php foreach ($categories as $category) : ?>


                <?php
                /* get $todos_num_rows */
                $this->db->select('*');
                $this->db->from('todos');
                $this->db->where('category_id', $category->id);
                $this->db->where('user_id', $this->session->userdata('id'));
                $todos_num_rows = $this->db->get()->num_rows();
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">

                            <div class="col-lg-10 col-xs-7"><h4><?= $category->category_name ?></h4></div>

                            <div class="col-lg-2 col-xs-5">  
                                <div class="TODO_action_area pull-right">
    <?= form_open('categories/edit_category') ?>

                                    <button title="Edit" type="submit" name="action" value="edit" class=" btn btn-large btn-primary fa fa-edit"></button>
                                    <input  type="hidden" name="category_id" value="<?= $category->id ?>" />
                                    <?= form_close(); ?>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="panel-body">
                        <p><?= $category->category_body ?></p>
                        <a href="<?= base_url('todos/show_category_todos') . DIRECTORY_SEPARATOR . $category->id ?>" ><span class="badge"> <?= $todos_num_rows ?> TODO</span></a>
                    </div>
                </div>
<?php endforeach; ?>

        </div>
    </div>
</div>







