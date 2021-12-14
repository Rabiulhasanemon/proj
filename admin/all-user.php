<?php
  require_once('functions/function.php');
  needLogged();
  if($_SESSION['role']==1 || $_SESSION['role']==2){
  get_header();
  get_sidebar();
?>
    <div class="col-md-12 main_content">
        <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> All User Information</h4>
                  </div>
                  <div class="col-md-4 text-right">
                      <a class="btn btn-sm btn-dark card_top_btn" href="add-user.php"><i class="fa fa-th"></i> Add User</a>
                  </div>
                  <div class="col-md-4 text-right">
                      <?php if($_SESSION['role']==1){ ?>
                      <a class="btn btn-sm btn-dark card_top_btn" href="add-user.php"><i class="fa fa-th"></i> Add User</a>
                      <?php } ?>
                  </div>
                  <div class="clearfix"></div>
              </div>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <form class="form-inline" method="get" action="search-user.php">
                    <div class="form-group mx-sm-3 mb-2">
                      <input type="text" class="form-control" id="" name="search" placeholder="search here">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">SEARCH</button>
                  </form>
                </div>
              </div>
              <table class="table table-bordered table-striped table-hover custom_table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $i=1;
                    $sel="SELECT * FROM user_cr NATURAL JOIN role ORDER BY id DESC";
                    $Q=mysqli_query($con,$sel);
                    while($data=mysqli_fetch_assoc($Q)){
                  ?>
                  <tr>
                    <td>
                      <?php
                        $check=$i++;
                        if($check<10){
                          echo "0".$check;
                        }else{
                          echo $check;
                        }
                      ?>
                    </td>
                    <td><?php echo $data['user_name']; ?></td>
                    <td><?= $data['user_phone']; ?></td>
                    <td><?= $data['user_email']; ?></td>
                    <td><?= $data['user_username']; ?></td>
                    <td><?= $data['role_name']; ?></td>
                    <td>
                      <?php if($data['user_pic']!=''){?>
                        <img style="height:50px; max-width:80px" class="img-thumbnail" src="uploads/<?= $data['user_pic']; ?>" alt=""/>
                      <?php }else{ ?>
                        <img style="height:50px; max-width:80px" class="img-thumbnail" src="images/avatar.jpg" alt=""/>
                      <?php } ?>
                    </td>
                    <td>
                        <a href="view-user.php?v=<?= $data['id'] ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                        <a href="edit-user.php?e=<?= $data['id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                        <?php if($_SESSION['role']==1){ ?>
                        <a href="delete-user.php?d=<?= $data['id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
                        <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
          </div>
          <div class="card-footer text-center">
              .
          </div>
        </div>
    </div>
<?php
  get_footer();
}else{
  header('Location:index.php');
}
?>
