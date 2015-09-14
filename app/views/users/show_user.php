<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $app_title ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            
            <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><?= $user->name ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">   <img class="img-circle" src="<?= $base_url?>assets/img/users/<?= $user->img ?>" width="110" height="110" alt=""></div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Job:</td>
                        <td><?= $user->job ?></td>
                      </tr>
                      <tr>
                        <td>governorate:</td>
                       <td><?= $user->governorate ?></td>
                      </tr>
                      <tr>
                        <td>phone</td>
                       <td><?= $user->phone ?></td>
                      </tr>
                      <tr>
                        <td>facebook</td>
                        <td><a href="<?= $user->facebook ?>" target="_blank" >facebook</a></td>
                      </tr>
                   
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
            
            
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- /.row -->
    <!-- /.row -->
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

