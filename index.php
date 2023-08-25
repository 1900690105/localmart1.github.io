<html>
<?php include 'header2.php'; ?>
<div id="main-content">
  <body>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <h2>Search for Student Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
            <label>Prn</label>
            <input type="text" name="sid" placeholder="Enter Prn number" required/>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="spass" placeholder="Enter Password" required/>
          </div>
        <input class="submit" type="submit" name="showbtn" value="My record" /><br><br>
        <a href="student/register.php"><input class="submit" type="" value="register here" /></a><br><br>
        <a href="adminpanel/hoddata.php"><input class="submit" type="" value="Hod login" /></a>
       
        </form>

    <?php
      if(isset($_POST['showbtn'])){
        include 'config.php';
        $stu_id = $_POST['sid'];
        $stu_pass = $_POST['spass'];
        $sql = "SELECT * FROM student WHERE sid= $stu_id";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
      if(mysqli_num_rows($result) > 0)  {
    ?>
    <table cellpadding="10px">
        <thead>
        <th>prn</th>
        <th>Name</th>
        <th>Father</th>
        <th>Surname</th>
        <th>Mother</th>
        <th>dob</th>
        <th>Gender</th>
        <th>cetegory</th>
        <th>class</th>
        <th>Branch</th>
        <th>Phone</th>
        <th>Email</th>
        <th>CGP</th>
        <th>Address</th>
        <th>Image</th>
        <th>Action</th>
        
        </thead>
        <tbody>
          <?php
            while($row = mysqli_fetch_assoc($result)){
              $a=$row['sid'];
              $b=$row['spass'];
              if($stu_id==$a && $stu_pass==$b){
                switch($row['sbranch']){
                  case 1:
                      $a="CSE(COMPUTER SCIENCE & ENGG)";
                  break;
                  case 2:
                      $a="CE(CIVIL ENGG)";
                  break;
                  case 3:
                      $a="ME(MECHANICAL ENGG)";
                  break;
                  case 4:
                      $a="EE(ELECTRICAL ENGG)";
                  break;
                  case 5:
                      $a="EXTC ENGG";
                  break;
                  default:
                   echo " ";
              }
          ?>
            <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['sname']; ?></td>
                <td><?php echo $row['sfname']; ?></td>
                <td><?php echo $row['ssname']; ?></td>
                <td><?php echo $row['smname']; ?></td>
                <td><?php echo $row['sdob']; ?></td>
                <td><?php echo $row['sgender']; ?></td>
                <td><?php echo $row['scetegory']; ?></td>
                <td><?php echo $row['sclass']." year"; ?></td>
                <td><?php echo $a; ?></td>
                <td><?php echo $row['sphone']; ?></td>
                <td><?php echo $row['semail']; ?></td>
                <td><?php echo $row['scgp']."%"; ?></td>
                <td><?php echo $row['saddress']; ?></td>
                <td><img src="<?php echo $row['image']; ?>" height="65px" width="65px"></td>
                 <td>
                    <a href='edit.php?id=<?php echo $row['sid']; ?>'>Edit</a>
                    <a href='think.php?id=<?php echo $row['sid']; ?>'>ID</a>
                  </td></tr>
                <?php }else{
    echo "<center><h2>Invalid prn or Password</h2></center>";
  }?>
        </tbody>
    </table>
  <?php
  
}}else{
    echo "<h2>No Record Found</h2>";
  }
  mysqli_close($conn);
}?>
</div>
</div>
</body>
<?php 
include 'fqa.html';
include 'footer.html'; ?>
</html>
