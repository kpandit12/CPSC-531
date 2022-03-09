<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Front Page</title>

    <style>
      html, body {
      min-height: 100%;
      background-image:url(https://media.istockphoto.com/vectors/chemical-plant-or-refinery-processing-of-natural-resources-vector-id516812699?k=6&m=516812699&s=612x612&w=0&h=DAcpjBfnXuQMtmXQmjHlmJ9Ys9eydnyR3BsG9MWZEUM=);
      background-repeat: no-repeat;  
      background-attachment: fixed;
      background-position: center;
    background-color: #F1F2EA;
      
    }
      body, div, form, input, select, textarea, label, p { 
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: black;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      font-size: 40px;
      color:#25702B;
      z-index: 2;
      line-height: 83px;
      margin-bottom: 100px;
      border-width: 2px;
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
      background:#efa292;
      box-shadow: 0 0 8px  #db573c; 
      }
      .banner {
      position: relative;
      height: 100px;
      background-color: transparent;  
      background-size: cover;
      display: flex;
      /* justify-content: center; */
      align-items: center;
      /* text-align: center; */
      margin-left: 25px;
      margin-top: 30px;

      }
      
     
      .btn-block {
      margin-top: 10px;
      /* text-align: center; */
      margin-left: 25px;
      }
      button {
      width: 150px;
      align-self: center;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background:  #25702b;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background:  #a3c2c2;
      }
      .btn-block a{
        display: block;
      margin-bottom: 78px;
      }

      #names{
        position: absolute;
    right: 25px;
      bottom: 25px;
      color: #a39f9f;
      }

    </style>
  </head>
  <body>
      
        <div class="banner">
          <h1>BIG CHEMICALS INC.</h1>
        </div>
        
        <div class="btn-block">
          <a href="<?php echo SITE_URL; ?>employee/list.php">
            <button type="AddEmp">Employee</button>
          </a>
          <a href="<?php echo SITE_URL; ?>sensor/list.php">
            <button type="AddEmp">Sensor</button>
          </a>
          <a href="<?php echo SITE_URL; ?>sensor_repair_log/list.php">
            <button type="AddEmp">Repair Log</button>
          </a>
          <a href="<?php echo SITE_URL; ?>tracking_log/list.php">
            <button type="AddEmp">Tracking Log</button>
          </a>          
        </div>

        <div id="names">
          By Ketaki Pandit, Vishvesh Dumbre
        </div>
    </body>
</html>

