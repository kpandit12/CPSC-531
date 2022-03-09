<?php 
	include '../config.php'; 
	$sql = "SELECT * FROM department;";
	$result = $conn->query($sql);
	
	$empid = $_GET['eid'];
	
	$msg = "";
	if(isset($empid) && !empty($empid)){
		$ename = "";
		$dept_id = "";
		$supervisor = "";
		$addressid = "";
		$phone = "";
		
		$emp_sql = "SELECT * FROM employee where empid = ".$empid.";";
		$emp_result = $conn->query($emp_sql);
		if ($emp_result->num_rows > 0) {
			while($emp_row = $emp_result->fetch_assoc()) {
				$ename = $emp_row['ename'];
				$dept_id = $emp_row['dept_id'];
				$supervisor = $emp_row['supervisor'];
				$addressid = $emp_row['addressid'];
				$phone = $emp_row['phone'];
			}
		}
		
	}
	
	if(isset($_POST) && !empty($_POST)){
		$uempid = $_POST['empid'];
		$ename = $_POST['ename'];
		$dept_id = $_POST['dept_id'];
		$supervisor = $_POST['supervisor'];
		$addressid = $_POST['addressid'];
		$phone = $_POST['phone'];
		
		$emp_update_sql = "UPDATE employee SET `ename` = '".$ename."', `phone` = '".$phone."', `addressid` = '".$addressid."', `supervisor` = '".$supervisor."', `dept_id` = ".$dept_id." WHERE `empid` = ".$uempid;
		
		if ($conn->query($emp_update_sql) === TRUE) {
		  $msg = "Employee record updated successfully";
		} else {
		  $msg = "Error: " . $emp_update_sql . "<br>" . $conn->error;
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Employee Registration</title>
    <script type="text/javascript">
      function showMessage() {
          alert("Sensor added");
      }
    </script>
    <style>
      html, body {
      min-height: 100%;
      background-color: #c4c4c40f;
      }
      .addNew{
        padding-left: 24%;
        padding-right: 24%;
        text-align: right;
      }
      body, div, form, input, select, textarea, label, p { 
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: black;
      line-height: 22px;
      /* background-color: #c4f2bf; */
      }
      h1 {
      position: absolute;
      font-size: 40px;
      color:#126f08;
      z-index: 2;
      line-height: 83px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 10px;
      border-radius: 1px;
      background:white;
      box-shadow: 0 0 8px  #669999; 
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
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color:  #669999;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 3px 0  #669999;
      color: #669999;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item span {
      color: red;
      }
      .week {
      display:flex;
      justfiy-content:space-between;
      }
      .colums {
      display:flex;
      justify-content:space-between;
      flex-direction:row;
      flex-wrap:wrap;
      }
      .colums div {
      width:48%;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      right: 0;
      color:  #c4f2bf;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
     
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background:  #669999;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background:  #a3c2c2;
      }
	  .addnewright{
		  display: inline-block;
		  float: right;
	  }
	  .addnew{display:inline-block;}
	  select{width:100%;padding:5px;}
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .name-item div {
      width: calc(50% - 20px);
      }
      .name-item div input {
      width:97%;}
      .name-item div label {
      display:block;
      padding-bottom:5px;
      }
      }
    </style>
  </head>
  <body>
    <div class="testbox" id="app">
    	
      <form action="" method="post">
        <div class="banner">
          <h1>Update Employee Details</h1>
        </div>
        	
        <div class="main-subtitle">	
         <div class="addnew">
         	<a href="<?php echo SITE_URL; ?>">Home</a>
            
          </div>
          <div class="addnewright">
            <a href="<?php echo SITE_URL; ?>employee/list.php" >Employee Details</a>
          </div>
        </div>
        <div class="colums">
        
          <input type="hidden" name="empid" value="<?php echo $empid; ?>" />    
          <div class="item">
            <label for="ename">Employee name<span>*</span></label>
            <input id="ename" type="text" name="ename" plceholder="Employee name" value="<?php echo $ename; ?>" required/>
          </div>
         
          <div class="item">
            <label for="department">Department Name<span>*</span></label>
            <select name="dept_id">
              <option value=''>Select Department</option>
              <?php 
              if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$selected = "";
					if($row['dept_id'] == $dept_id){
						$selected = "selected";
					}
			  ?>
              <option value='<?php echo $row['dept_id']; ?>' <?php echo $selected; ?>><?php echo $row['dept_name']; ?></option>
              <?php } } ?>
            </select>
          </div>
          <div class="item">
            <label for="supervisor">Supervisor<span>*</span></label>
            <input id="supervisor" type="text" name="supervisor" plceholder="Supervisor" value="<?php echo $supervisor; ?>" required/>
          </div>
          <div class="item">
            <label for="addressid">Address<span>*</span></label>
            <input id="addressid" type="text" name="addressid" plceholder="Address" value="<?php echo $addressid; ?>" required/>
          </div>
          <div class="item">
            <label for="phone">Phone<span>*</span></label>
            <input id="phone" type="tel" name="phone" plceholder="Phone Number" value="<?php echo $phone; ?>" required/>
          </div>
          
        </div>
        <div class="btn-block">
          <button type="submit" name="submit">Submit</button>
        </div>
        <div class="btn-block">
        	<?php echo $msg; ?>
        </div>
      </form>
    </div>
  </body>
</html>