<?php

class Project {
  private $id;
  private $name;
  private $description;
  private $events = [];
  private $conn;

  function __construct($conn) {
    $this->id = -1;
    $this->name;
    $this->description;
    $this->events;
    $this->conn = $conn;
  }

  function getId() {
    return $this->id;
  }

  function getName() {
    return $this->name;
  }

  function getDescription() {
    return $this->description;
  }

  function getEvents() {
    return $this->events;
  }

  private function getConn() {
    return $this->conn;
  }

  function setEvents() {
    $id = $this->getId();
    $conn = $this->getConn();
    $sql = "SELECT * FROM events WHERE events.project_id='$id' ORDER BY events.id DESC";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0){
      $events = [];
      while($row = $result->fetch_assoc()) {
        $events[] = [
          'id' => $rows['id'],
          'description' => $rows['description']
        ]
      }
    }
    $this->events = $events;
  }

  function setId($id) {
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
    $this->id = $project_id;
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

  public function showEvents($id) {
    $this->setEvents();
    $events = $this->getEvents();

    foreach ($events as $event) {
      include (__DIR__ .'/templates/events_list_item.php');
    }
  }
}
