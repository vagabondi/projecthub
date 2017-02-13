<?php

class Project {
  private $id;
  private $name;
  private $description;
  private $date;
  private $project;
  private $assets = [];
  private $conn;

  function __construct($conn) {
    $this->id = -1;
    $this->name;
    $this->description;
    $this->date;
    $this->project;
    $this->conn = $conn;
  }

  function getName() {
    return $this->name;
  }

  function getDescription() {
    return $this->description;
  }

  function getDate() {
    return $this->date;
  }

  function getProject() {
    return $this->project;
  }

  function getAssets() {
    return $this->assets;
  }

  private function getConn() {
    return $this->conn;
  }

  function setName($text) {
    $conn = $this->getConn();
    if(strlen($text) === 0) {
      return false;
    }
    $this->name = $conn->escape_string($text);
  }

  function setDescription($text) {
    $conn = $this->getConn();
    if(strlen($text) === 0) {
      return false;
    }
    $this->description = $conn->escape_string($text);

  }

  function setDate($text) {
    $conn = $this->getConn();
    if(strlen($text) === 0) {
      return false;
    }
    $this->name = $conn->escape_string($text);
  }

  function setProject($project_id) {
    $conn = $this->getConn();
    $sql = "SELECT id FROM projects";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0){
      $projects = [];
      while($row = $result->fetch_assoc()) {
        $projects[] = $row['id'];
      }
    }
    if(!in_array($project_id, $projects)) {
      return false;
    }
    $this->project = $project_id;
  }

  public function addNewEvent($name, $desc, $project_id) {
    $this->setName($name);
    $this->setDescription($desc);
    $this->setProject($project_id);
    $conn = $this->getConn();

    $sql = "INSERT INTO events(name, description, project_id) VALUES ('$this->name', '$this->description', $this->project_id)";
    $conn->query($sql);
  }

}
