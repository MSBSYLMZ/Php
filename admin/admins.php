<?php
require_once "header.php";
require_once "sidebar.php";
require_once 'netting/class-crud.php';
$db=new crud();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->   



  <section class="content">

    <?php 
    if (isset($_GET['adminsInsert'])) {?>
     <div class="box box-primary">

      <div class="content-header with-border">
        <h1 >Add Admin</h1>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <?php if (isset($_POST['admin_insert'])) {
          $sonuc=$db->adminInsert($_POST['admins_namesurname'],$_POST['admins_username'],$_POST['admins_pass'],$_POST['admins_status']);
          if ($sonuc['status']) {?>
            <div class="alert alert-success">Registiration Complated</div>
          <?php } else {?>
            <div class="alert alert-error">Error</div>
          <?php }
          } ?>


          <form method="POST">
            <div class="form-group">
              <label>Name Surname</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="admins_namesurname" required="" class="form-control">
                </div>

              </div>
            </div>
            <div class="form-group">
              <label>Admin Username</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="admins_username" required="" class="form-control">
                </div>

              </div>
            </div>
            <div class="form-group">
              <label>Admin Password</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="Password" name="admins_pass" required="" class="form-control">
                </div>

              </div>
            </div>
            <div class="form-group">
              <label>Admin Status</label>
              <div class="row">
                <div class="col-xs-12">
                  <select class="form-control" name="admins_status">
                    <option value="1">Active</option>
                    <option value="0">Passive</option>
                  </select>
                </div>
              </div>
            </div>

            <div align="right" class="box-footer">
              <button type="submit" class="btn btn-success" name="admin_insert">Add
              </button>
            </div>
          </form>
        </div>
        <!-- /.box-body -->

        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
    <?php } ?>


    <!-- Default box -->
    <div class="box box-primary">
      <div class="content-header with-border">
        <h1 class="box-title">Admins</h1>
        <div align="right">
          <a href="?adminsInsert=true"><button class="btn btn-success">New Admin</button></a>
        </div>
      </div>


      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="15">#</th>
              <th>User Name</th>
              <th>Name Surname</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $sql=$db->read("admins");
            $say=0;
            while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { $say++;
              ?>
              <tr>
                <td><?php echo $say ?></td>
                <td><?php echo $row['admins_username']; ?></td>
                <td><?php echo $row['admins_namesurname']; ?></td>
                <td><?php if ($row['admins_status']==0) {
                  echo "Passive";
                }else{
                  echo "Active";
                }
                ?></td>
                <td align="center" width="10"><a href=""><i class="fa fa-edit fa-2x"></i></a></td>
                <td align="center" width="10"><a href=""><i class="fa fa-trash fa-2x"></i></a></td>
              </tr>
            <?php } ?>  
          </table>
        </div>
        <!-- /.box-body -->

        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php require_once "footer.php" ?>