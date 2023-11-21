<?php
header("Access-Control-Allow-Origin: *");

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->query("SELECT * FROM countries");

//$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD']=== "GET") {
  if(isset($_GET["country"]) and isset($_GET["cities"])){
    $country = $_GET["country"];
    $cities = true;
    $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities
    JOIN countries ON cities.country_code = countries.code
    WHERE countries.name LIKE '%$country%';");
  }
  else if(isset($_GET["country"])){
    $country = $_GET["country"];
    $cities = false;
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  }
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
<table>
  <?php if($cities === true):?>
    <tr>
    <th>Name</th>
    <th>District</th>
    <th>Population</th>
    </tr>
  <?php foreach ($results as $row):?>
    <tr>
      <td><?= $row["name"]; ?></td>
      <td><?= $row["district"]; ?></td>
      <td><?= $row["population"]; ?></td>
    </tr>
  <?php endforeach?>
  <?php endif?>
  <?php if($cities === false):?>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
  </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row["name"]; ?></td>
      <td><?= $row["continent"]; ?></td>
      <td><?= $row["independence_year"]; ?></td>
      <td><?= $row["head_of_state"]; ?></td>
    </tr>
  <?php endforeach; ?>
  <?php endif?>
</table>
