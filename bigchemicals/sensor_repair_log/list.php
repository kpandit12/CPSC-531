<?php include '../config.php'; ?>
<html>
    <head>
    <title> Sensor Repair Log </title>
    <style>
      body, div, form{ 
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: black;
      line-height: 22px;
      background-color: #e2e2e2;
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
        	<h1>Sensor Repair Log</h1>
      	</div>
      
        <div class="main-subtitle">	
            <div class="addnew">
                <a href="<?php echo SITE_URL; ?>">Home</a>
            </div>
            <div class="addnewright">
                <a href="<?php echo SITE_URL; ?>sensor_repair_log/add.php">Add New Sensor Repair Log</a>
            </div>
        </div>
      	
        <?php echo (isset($_GET) && !empty($_GET))?"<div class='msg'>".$_GET['msg']."</div>":""; ?>
        
    	<table name="Sensor Details" border="2" cellspacing="7" cellpadding="7" align="center" style="margin-top: 8;">
            <tr>
                <th><font face="Arial, Helvetica, sans-serif">Sensor ID</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Repair ID</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Technician Name</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Date Down</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Restored Date</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Cause</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Repair Done</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Actions</font></th>
            </tr>
    	
        <?php $sql = "SELECT sensor_repair_log.*, sensorslist.sname as sname FROM sensor_repair_log INNER JOIN sensorslist ON sensor_repair_log.sid = sensorslist.sid ORDER BY sensor_repair_log.uid DESC;";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
		?>
            <tr>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $row['sname']; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $row['uid']; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $row['technician']; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo (!empty($row['downDate']))?date('m/d/Y',strtotime($row['downDate'])):""; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo date('m/d/Y',strtotime($row['repairDate'])); ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $row['cause']; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $row['repair']; ?></font></td>
                <td><a href="<?php echo 'update.php?uid='.$row['uid']; ?>">Update</a> | <a href="<?php echo 'delete.php?uid='.$row['uid']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a></td>
            </tr>
    	<?php } }else{ ?>
            <tr>
                <td colspan="8">No record found</td>
            </tr>    
        <?php }?>
    </table>
    </div>
    </body>
</html>