
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->


        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                 Fast Links
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Task">
                        Add Task
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="Task" tabindex="-1" role="dialog" aria-labelledby="TaskLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="TaskLabel">Add Task</h4>
                                </div>
                                <div class="modal-body">
                                    <!-- /.col-lg-12 -->
                                    <!-- /.row -->
                                    <?= form_open('tasks/save_task') ?>
                                    <div class="form-group">
                                        <label for="task_name"> task_name</label>
                                        <input class="form-control" type="text" name="task_name" value="" id="task_name" placeholder="Enter task_name" />
                                    </div>

                                    <div class="form-group">
                                        <label for="task_body"> task_body</label>
                                        <textarea class="form-control" id="task_body" name="task_body" placeholder="Enter task_body" ></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="list_id">List</label>
                                        <select class="form-control" name="list_id">
                                            <!--loop-->
                                            <?php
                                            $this->db->select('*');
                                            $this->db->from('lists');
                                            $this->db->where('list_user_id', $this->session->userdata('id'));
                                            $lists = $this->db->get()->result();

                                            foreach ($lists as $list) :
                                                ?>
                                                <option value="<?= $list->id ?>"> <?= $list->list_name ?></option>

                                            <?php endforeach; ?>
                                            <!--end loop-->
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="due_date">due_date</label>
                                        <div class="input-group date">
                                            <input  class="form-control datepicker" name="due_date" type="text" >
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-th" aria-hidden="true"></span></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" name="submit"  class="btn btn-large btn-success">Add Task</button>
                                    </div>
                                    <?= form_close(); ?>
                                    <!-- /.row -->
                                    <!-- /.row -->
                                    <!-- /#page-wrapper -->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>

        
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="text-muted fa fa-dashboard fa-fw"></i>Pending TODOs
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="alert alert-success">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                    </div>
                    <div class="alert alert-info">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                    </div>
                    <div class="alert alert-warning">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                    </div>
                    <div class="alert alert-danger">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                    </div>
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
           
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="text-success fa fa-trophy fa-fw"></i>Done TODOs
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                    </div>
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                    </div>
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                    </div>
                </div>
                <!-- .panel-body -->
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <i class="text-danger fa fa-trophy fa-fw"></i>Voided TODOs
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                    </div>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                    </div>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                    </div>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                    </div>
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Modals
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Task">
                        Launch Demo Modal
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="Task" tabindex="-1" role="dialog" aria-labelledby="TaskLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="TaskLabel">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tooltips and Popovers
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <h4>Tooltip Demo</h4>
                    <div class="tooltip-demo">
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Tooltip on left">Tooltip on left</button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Tooltip on top</button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Tooltip on bottom</button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Tooltip on right">Tooltip on right</button>
                    </div>
                    <br>
                    <h4>Clickable Popover Demo</h4>
                    <div class="tooltip-demo">
                        <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Popover on left
                        </button>
                        <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Popover on top
                        </button>
                        <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Popover on bottom
                        </button>
                        <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Popover on right
                        </button>
                    </div>
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
