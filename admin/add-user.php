<?php
echo rand(10000,10000000);
  require_once('functions/function.php');
if($_SESSION['role']==4||$_SESSION['role']==2||$_SESSION['role']==3||$_SESSION['role']==1){


needLogged();

get_header();
get_sidebar();
if(!empty($_POST)){
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $role=$_POST['role'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=md5($_POST['pas']);
  $repassword=md5($_POST['rpw']);
  $image=$_FILES['pic'];
  $imageName='';
  if($image['name']!=''){
  $imageName='user_'.time().'_'.rand(10000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
}

  if(!empty($name)){
    if(!empty($phone)){
      if(!empty($email)){
        if(!empty($username)){
    if(!empty($password)){

            if($password===$repassword){
$insert="INSERT INTO user_cr(user_name,user_phone,user_email,user_username,user_password,role_id,user_pic)
  VALUES('$name','$phone','$email','$username','$password','$role','$imageName')";
  if(mysqli_query($con,$insert)){
    move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
    echo "succesfully registration";

  }else {
    echo "Registration failed";
  }
}else{
    echo " not match";
}}else
{
    echo "Please Enter Your Password";
}
}
else{
        echo "Please Enter Your Username";

}}else {
  echo "Please Enter Your Email";
}}
else
{
    echo "Please Enter Your Number";
}
}
  else
    echo "Pleasr enter your Name";

}


 ?>
            <div class="row">
                        <div class="col-md-12 main_content">
                            <form method="post" action="" enctype="multipart/form-data">
                              <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8">
                                              <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Form Design</h4>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <a class="btn btn-sm btn-dark card_top_btn" href="all-user.php"><i class="fa fa-th"></i> all user</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                     <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Name:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="name">
                                        </div>
                                      </div>

                                      <div class="form-group row custom_form_group">
                                         <label class="col-sm-3 col-form-label">phone:</label>
                                         <div class="col-sm-7">
                                           <input type="text" class="form-control" id="" name="phone">
                                         </div>
                                       </div>


                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Email:</label>
                                        <div class="col-sm-7">
                                          <input type="email" class="form-control" id="" name="email">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                         <label class="col-sm-3 col-form-label">Username:</label>
                                         <div class="col-sm-7">
                                           <input type="text" class="form-control" id="" name="username">
                                         </div>
                                       </div>
                                       <div class="form-group row custom_form_group">
                                          <label class="col-sm-3 col-form-label">password:</label>
                                          <div class="col-sm-7">
                                            <input type="text" class="form-control" id="" name="pas">
                                          </div>
                                        </div>
                                        <div class="form-group row custom_form_group">
                                           <label class="col-sm-3 col-form-label">confirm Password:</label>
                                           <div class="col-sm-7">
                                             <input type="text" class="form-control" id="" name="rpw">
                                           </div>
                                         </div>
                                         <div class="form-group row custom_form_group">
                                            <label class="col-sm-3 col-form-label">User Role</label>
                                            <div class="col-sm-7">

                                              <select class="form-control"  name="role">
                                                <option value="">select role</option>
                                                <?php

                                                  $selr="SELECT * FROM role ORDER BY role_id DESC";
                                                  $Qr=mysqli_query($con,$selr);
                                                  while ($urole=mysqli_fetch_assoc($Qr)) {
                                                    // code...
                                                    ?>
                                                    <option value="<?=$urole['role_id'];?>"><?=$urole['role_name'];?></option>
                                                <?php  } ?>



                                            </div>
                                          </div>
                                         <div class="form-group row custom_form_group">
                                            <label class="col-sm-3 col-form-label">File:</label>
                                            <div class="col-sm-7">
                                              <input type="file" class="" id="" name="pic">
                                            </div>
                                          </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-dark submit_btn">REGISTRATION</button>
                                </div>
                              </div>
                          </form>
                        </div>
                    </div>
<?php
get_footer();
}
else {
  header('Location:access.php');
}
 ?>
