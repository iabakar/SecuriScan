<?php

// Get the search term from the form submission
// $searchTerm = $_GET['search'];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "networkwatcher";

$conn = new mysqli($servername, $username, $password, $dbname);

//to do 
// Build the SELECT query with placeholders for the search term


$sql = "select h.id, h.ip, h.hostname, h.os, h.first_seen, h.last_seen ,p.id, p.ports, p.ip from hosts h join port p on h.ip = p.ip ORDER BY h.last_seen DESC
LIMIT 8";
$stmt = $conn->prepare($sql);

// Bind the search term to the placeholders and execute the query
$stmt->execute();

// Get the results and display them in a table
$result = $stmt->get_result();

if ($result->num_rows > 0) {
?>



<div style="    margin-right: 330px;
margin-left: 30px; ">





    <table >
        <caption>Device Data</caption>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">IP</th>
                <th scope="col">Hostname</th>
                <th scope="col">Ports</th>
                <th scope="col"> View</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <!-- // <th scope="row">Salina Brown</th>  -->
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['ip'] ?></td>

                    <td><?php echo $row['hostname'] ?></td>
                    <td>
                        <?php
                        $obj = json_decode($row["ports"]);


                        if (isset($obj->tcp)) {
                            // Loop through the "tcp" property
                            foreach ($obj->tcp as $port => $data) {
                                // Display the port number if it exists
                                echo "$port,";
                            }
                        } else {
                            // Display "none" if no port numbers exist
                            echo "none\n";
                        }


                        // 
                        ?>
                    </td>

                    <td><a href="/networkscan/viewports.php?id=<?php echo $row['id'] ?>" class="button-7" role="button">view more</a>
                    </td>



                </tr>
                <tr>

                <?php


            }


                ?>



        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Data is updated every 15 minutes.</td>
            </tr>
        </tfoot>
    </table>

<?php

} else {
    echo "No results found.";
}

// Close the database connection
$stmt->close();
$conn->close();

?>
