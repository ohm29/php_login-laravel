<?php 
session_start();
        if(isset($_POST['Username'])){
				//connection
                  include("connection.php");
				//รับค่า user & password
                  $Username = $_POST['Username'];
                  $Password = $_POST['Password'];
				//query 
                  $sql="SELECT * FROM admin Where 	user='".$Username."' and password='".$Password."' ";

                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["UserID"] = $row["id_user"];
                      

                    
                        Header("Location: admin_page.php");

                      }

                      

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
                    Header("Location: form.php"); //user & password incorrect back to login again
                  }

      


  
?>