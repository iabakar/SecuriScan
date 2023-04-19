<!DOCTYPE html>
<html>

<head>
  <title>Search </title>


  <style>
    @import "compass/css3";

    *,
    *:before,
    *:after {
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }

    body {
      font-family: 'Nunito', sans-serif;
      color: #384047;
    }

    table {
      max-width: 960px;
      margin: 10px auto;
    }

    caption {
      font-size: 1.6em;
      font-weight: 400;
      padding: 10px 0;
    }

    thead th {
      font-weight: 400;
      background: #8a97a0;
      color: #FFF;
    }

    tr {
      background: #f4f7f8;
      border-bottom: 1px solid #FFF;
      margin-bottom: 5px;
    }

    tr:nth-child(even) {
      background: #e8eeef;
    }

    th,
    td {
      text-align: left;
      padding: 20px;
      font-weight: 300;
    }

    tfoot tr {
      background: none;
    }

    tfoot td {
      padding: 10px 2px;
      font-size: 0.8em;
      font-style: italic;
      color: #8a97a0;
    }
    /* CSS */
    .button-7 {
      background-color: #0095ff;
      border: 1px solid transparent;
      border-radius: 3px;
      box-shadow: rgba(255, 255, 255, .4) 0 1px 0 0 inset;
      box-sizing: border-box;
      color: #fff;
      cursor: pointer;
      display: inline-block;
      font-family: -apple-system, system-ui, "Segoe UI", "Liberation Sans", sans-serif;
      font-size: 13px;
      font-weight: 400;
      line-height: 1.15385;
      margin: 0;
      outline: none;
      padding: 8px .8em;
      position: relative;
      text-align: center;
      text-decoration: none;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      vertical-align: baseline;
      white-space: nowrap;
    }

    .button-7:hover,
    .button-7:focus {
      background-color: #07c;
    }

    .button-7:focus {
      box-shadow: 0 0 0 4px rgba(0, 149, 255, .15);
    }

    .button-7:active {
      background-color: #0064bd;
      box-shadow: none;
    }
  </style>



  <?php

  // Get the search term from the form submission
  $searchTerm = $_GET['search'];

  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "networkwatcher";

  $conn = new mysqli($servername, $username, $password, $dbname);

  //to do 
  // Build the SELECT query with placeholders for the search term
  $sql = "select h.id, h.ip, h.hostname, h.os, h.first_seen, h.last_seen ,p.id, p.ports, p.ip from hosts h join port p on h.ip = p.ip WHERE os LIKE ? OR hostname LIKE ? OR p.ip LIKE ?";
  $stmt = $conn->prepare($sql);

  // Bind the search term to the placeholders and execute the query
  $searchTerm = "%" . $searchTerm . "%";
  $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
  $stmt->execute();

  // Get the results and display them in a table
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {

  ?>

    <table>
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