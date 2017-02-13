<?php

class Project {
  private $id;
  private $name;
  private $description;
  private $conn;

  function __construct($conn) {
    $this->id = -1;
    $this->name;
    $this->description;
    $this->conn = $conn;
  }

  function getName() {
    return $this->name;
  }

  function getDescription() {
    return $this->description;
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

  public function addNewProject($name, $desc) {
    $this->setName($name);
    $this->setDescription($desc);
    $conn = $this->getConn();

    $sql = "INSERT INTO projects(name, description) VALUES ('$this->name', '$this->description')";
    $conn->query($sql);
  }

  public function getProjects($element) {
    $sql = "SELECT*FROM projects";
    $conn = $this->getConn();
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0 && $element==='list'){
      while($row = $result->fetch_assoc()) {
        include (__DIR__ .'/templates/projects_list_item.php');
      }
    } elseif($element==='panel') {
      $projects_names = [];
      while($row = $result->fetch_assoc()) {
        $projects_names[$row['id']] = $row['name'];
      }
      include (__DIR__ .'/templates/panel.php');
    }
  }
}
