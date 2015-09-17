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
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>List Name</th>
                                    <th>Due Today</th>
                                    <th>Actions</th>
                           
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lists as $list) : ?>
                                    <!--loop-->
                                    <tr class="odd gradeX">
                                        <td><h3><?= $list->list_name ?> <a target="_blank" href=" <?= base_url('tasks/show_list_tasks').DIRECTORY_SEPARATOR.$list->id ?>"><span class="badge">
                                                    <?php
                                                    $query = $this->db->get_where('tasks', array(
                                                        'list_id' => $list->list_id,
                                                        'user_id' => $this->session->userdata('id'),
                                                    ));
                                                    echo ($query->num_rows() > 0 ? $query->num_rows() : 'No tasks');
                                                    ?>
                                                </span></a> </h3> 
                                            <p><?= $list->list_body ?></p>
                                        </td>
                                        <td>
                                            <ul>
                                                    <li><a href="#" target="_blank" >Due Today Task 1</a></li>
                                                    <li><a href="#" target="_blank" >Due this week Task </a></li>

                                                </ul>

                                            
                                        </td>
                                        <td>
                                            <a title="show pop up confirmation msg"href="<?= base_url('lists/delete') . DIRECTORY_SEPARATOR . $list->id ?>" class="btn "> <i class="fa fa-remove"></i></a>

                                            <a href="<?= base_url('lists/edit') . '/' . $list->list_id ?>" class="btn"><i class="fa fa-edit"></i></a>
                                        </td>

                                <?php endforeach; ?>
                                <!--end loop-->
                            </tbody>
                        </table>

                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->







