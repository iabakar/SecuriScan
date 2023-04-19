<?php
// Get the search term from the URL parameter
$searchTerm = $_GET['id'];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "networkwatcher";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Build the SELECT query with a placeholder for the search term
$sql = "SELECT * FROM port WHERE id = ?";
$stmt = $conn->prepare($sql);

// Bind the search term to the placeholder and execute the query
$stmt->bind_param("s", $searchTerm);
$stmt->execute();


// Get the query results and display them in a table format
$result = $stmt->get_result();

$host = 'unknown';
$type = 'unknown';
$ip = 'unknown';
$state = 'unknown';
$reason = 'unknown';

$os = 'unknown';
$accuracy = 'unknown';


  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {


      $data = json_decode($row["ports"],true);

      if (!empty($data['hostnames'][0]['name'])) {
        $host = $data['hostnames'][0]['name'];
    }
    
    if (!empty($data['hostnames'][0]['type'])) {
        $type = $data['hostnames'][0]['type'];
    }
    
    if (!empty($data['addresses']['ipv4'])) {
        $ip = $data['addresses']['ipv4'];
    }
    
    if (!empty($data['status']['state'])) {
        $state = $data['status']['state'];
    }
    
    if (!empty($data['status']['reason'])) {
        $reason = $data['status']['reason'];
    }

        
    if (!empty($data['osmatch'][0]['name'])) {
      $os = $data['osmatch'][0]['name'];
    }
    
    if (!empty($data['osmatch'][0]['accuracy'])) {
      $accuracy = $data['osmatch'][0]['accuracy'].'%';
    }
    




?>
    <div class="data-row">
    <span class="label">Hostnames:</span>
    <span class="value"><?php echo $host ?>
    
    
    
    <!-- , Type: -->
    <?php //echo $type; ?>
  
  
  </span>
  </div>
  <div class="data-row">
    <span class="label">IP address:</span>
    <span class="value"><?php echo $ip; ?></span>
  </div>
  <div class="data-row">
    <span class="label">Status:</span>
    <span class="value"><?php echo $state ?> <br>           Reason: <?php echo $reason ?></span>
  </div>


  <div class="data-row">
    <span class="label">OS name:</span>
    <span class="value"><?php echo $os ?> <br>           Accuracy: <?php echo $accuracy ?></span>
  </div>


  <br>
  <div class="data-row">
  <span class="label"><b> Open ports:<br></b></span> 
    <?php
print('<br>');
foreach ($data['tcp'] as $port => $data) {

  $state = $data['state'];
  $reason = $data['reason'];
  $name = $data['name'];
  $product = $data['product'];
  // $version = $data['version'];
  // $extrainfo = $data['extrainfo'];
  // $conf = $data['conf'];
  // $cpe = $data['cpe'];
  
  print('<span class="label">port: '.$port.'</span>'); 
  print('  <ul class="value">');
  print('<li> State: '.$state.'</li>'); 
  print('<li> Reason: '.$reason.'</li>'); 
  print('<li> Name: '.$name.'</li>'); 
  // print('<li> Product: '.$product.'</li>'); 
  // print('<li> Version: '.$version.'</li>'); 
  // print('<li> Extrainfo: '.$extrainfo.'</li>'); 
  // print('<li> Conf: '.$conf.'</li>'); 
  // print('<li> CPE: '.$cpe.'</li>');
  print("</ul>"); 
}
    ?>
<br>
</div>

  <?php
  }
  }
  ?>




