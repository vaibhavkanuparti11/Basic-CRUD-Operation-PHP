<?php
  // Create connection
  $conn = new mysqli("localhost", "root", "","crud");
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = $conn->query("CREATE DATABASE IF NOT EXISTS crud");
  if ($sql !== TRUE || $sql != TRUE) {    
    echo "Error creating database: " . $conn->error;
  }
  // Category table//
  $category="CREATE TABLE IF NOT EXISTS category (
              id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(30) NOT NULL,
              slug VARCHAR(30) NOT NULL,
              timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
  if ($conn->query($category) === TRUE) {
    // $sql = $conn->query("INSERT INTO category(name, slug) VALUES ('Headlines','headlines')");   
    // if ($sql !== TRUE || $sql != TRUE) {    
    //   echo "Error inserting data: " . $conn->error;
    // }
  }else{
    echo "Error creating table: " . $conn->error;
  }

  // tags table//
  $tags="CREATE TABLE IF NOT EXISTS tags (
          id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(30) NOT NULL,
          slug VARCHAR(30) NOT NULL,
          timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
  if ($conn->query($tags) === TRUE) {
    // $sql = $conn->query("INSERT INTO tags(name, slug) VALUES ('Politics','politics')");   
    // if ($sql !== TRUE || $sql != TRUE) {    
    //   echo "Error inserting data: " . $conn->error;
    // }
  }else{
    echo "Error creating table: " . $conn->error;
  }

  $user=$conn->query("CREATE TABLE IF NOT EXISTS user (
          id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          title VARCHAR(30) NOT NULL,
          descp VARCHAR(30) NOT NULL,
          category VARCHAR(30) NOT NULL,
          tags VARCHAR(30) NOT NULL,
          publish VARCHAR(30) NOT NULL,
          date VARCHAR(30) NOT NULL,
          image VARCHAR(30) NOT NULL,
          timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )");
  if ($user !== TRUE || $user != TRUE) {
    echo "Error creating table: " . $conn->error;
  }
?>
