<?php include '../config.php'; ?>
<html>
    <head>
    <title> Employee </title>
   
    <style>
      body, div, form, input, select, textarea, label, p { 
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: black;
      line-height: 22px;
      background-color: #c4f2bf;
      }
      h1 {
      position: absolute;
      align-self: center;
      font-size: 40px;
      color:#126f08;
      z-index: 2;
      line-height: 83px;
      }
      .banner {
      position: relative;
      height: 100px;
      background-color: #5dcc61 ;  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.2); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      table {
    background-color:#80ee83;
    position: relative;
    align-items: center;

      }
      .addNew{
        padding-right: 24%;
        text-align: right;
      }
	  .addnewright{
		  display: inline-block;
		  float: right;
	  }
	  .addnew{display:inline-block;}
	  .msg{text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:16px;}
    </style>
    
    </head>
    
    
    <body>
    <div id="app">
      <div class="banner">
        <h1>Employee Details</h1>
      </div>
      <div class="main-subtitle">	
          <div class="addnew">
          	<a href="<?php echo SITE_URL; ?>">Home</a>
          </div>
          <div class="addnewright">
            <a href="<?php echo SITE_URL; ?>employee/add.php">Add New Employee</a>
          </div>
      </div>
      
	  <?php echo (isset($_GET) && !empty($_GET))?"<div class='msg'>".$_GET['msg']."</div>":""; ?>	
      <table name="Employee" border="2" cellspacing="7" cellpadding="7" align="center" style="margin-top: 8;">
            <tr>
                <th><font face="Arial, Helvetica, sans-serif">Employee ID</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Employee Name</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Address</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Phone</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Supervisor</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Department Name</font></th>
                <th>Action</th>
            </tr>
          	<?php $sql = "SELECT employee.*, department.dept_name as dept_name FROM employee INNER JOIN department ON employee.dept_id = department.dept_id ORDER BY employee.empid DESC;";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
			?>	
            <tr>
              <td><font face="Arial, Helvetica, sans-serif"><?php echo $row['empid']; ?></font></td>
              <td><font face="Arial, Helvetica, sans-serif"><?php echo $row['ename']; ?></font></td>
              <td><font face="Arial, Helvetica, sans-serif"><?php echo $row['addressid']; ?></font></td>
              <td><font face="Arial, Helvetica, sans-serif"><?php echo $row['phone']; ?></font></td>
              <td><font face="Arial, Helvetica, sans-serif"><?php echo $row['supervisor']; ?></font></td>
              <td><font face="Arial, Helvetica, sans-serif"><?php echo $row['dept_name']; ?></font></td>
          	<td><a href="<?php echo 'update.php?eid='.$row['empid']; ?>">Update</a> | <a href="<?php echo 'delete.php?eid='.$row['empid']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a></td>
            </tr>
            <?php } }else{ ?>
            <tr>
				<td colspan="6">No record found</td>
            </tr>    
			<?php }?>
        </table>
      </div>
    </body>
</html>