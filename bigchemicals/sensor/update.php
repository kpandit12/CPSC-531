<?php 
	include '../config.php'; 
	$sql = "SELECT * FROM department;";
	$result = $conn->query($sql);
	
	$sid = $_GET['sid'];
	$msg = "";
	
	if(isset($sid) && !empty($sid)){
		$sname = "";
		$sintallationdate = "";
		$dept_id = "";
		
		$sl_sql = "SELECT * FROM sensorslist where sid = ".$sid.";";
		$sl_result = $conn->query($sl_sql);
		if ($sl_result->num_rows > 0) {
			while($sl_row = $sl_result->fetch_assoc()) {
				$sname = $sl_row['sname'];
				$sintallationdate = $sl_row['sintallationdate'];
				$dept_id = $sl_row['dept_id'];
			}
		}
	}
	
	if(isset($_POST) && !empty($_POST)){
		$usid = $_POST['sid'];
		$sname = $_POST['sname'];
		$sintallationdate = $_POST['sintallationdate'];
		$dept_id = $_POST['dept_id'];
		
		$sl_update_sql = "UPDATE sensorslist SET `sname` = '".$sname."', `sintallationdate` = '".$sintallationdate."', `dept_id` = ".$dept_id." WHERE `sid` = ".$usid;
		
		if ($conn->query($sl_update_sql) === TRUE) {
		  $msg = "Sensor record updated successfully";
		} else {
		  $msg = "Error: " . $emp_update_sql . "<br>" . $conn->error;
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sensor addition</title>
    <script type="text/javascript">
      function showMessage() {
          alert("Sensor added.");
      }
    </script>
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, label, p { 
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: black;
      line-height: 22px;
      background-color: #c4f2bf;
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
      background:#c4f2bf;
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
          <h1>Update Sensor Details</h1>
        </div>
        
		<div class="main-subtitle">	
         <div class="addnew">
         	<a href="<?php echo SITE_URL; ?>">Home</a>
            
          </div>
          <div class="addnewright">
            <a href="<?php echo SITE_URL; ?>sensor/list.php" >Sensor Details</a>
          </div>
        </div>
        
        <div class="colums">
          <input type="hidden" name="sid" value="<?php echo $sid; ?>" />
          <div class="item">
            <label for="dept_id">Department ID<span>*</span></label>
            <select id="dept_id" type="text" name="dept_id">
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
            <label for="sintallationdate">Date Installed<span>*</span></label>
            <input id="sintallationdate" type="date" name="sintallationdate" value="<?php echo $sintallationdate; ?>" required/>
          </div>
          <div class="item">
            <label for="sname">Sensor name<span>*</span></label>
            <input id="sname" type="text" name="sname" value="<?php echo $sname; ?>" required/>
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