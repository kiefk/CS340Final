<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['q'];

include("config.php");
include("connect.php");
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
die('Could not connect: ' . mysql_error());
}

mysqli_select_db($conn,DB_NAME);
$sql="SELECT * FROM Recipe WHERE RecipeName = '".$q."'";
$result = mysqli_query($conn,$sql);
if (!$result) {
  die("Query to show fields from recipe failed");
}

while($row = mysqli_fetch_array($result)) {

    echo "<h1>" . $row['RecipeName'] . "</h1>";
    echo "<h3>Posted By " . $row['Username'] . "</h3>";
    echo "<h3>At " . $row['TimeStamp'] . "</h3>";
    echo "<h3>Rating: " . $row['Ratings'] . "</h3><br>";
    echo "<img src= " .$row['Picture'] . " alt=\"".$row['Picture'] ."\">";
    echo "<h3>" . $row['Instructions'] . "</h3>";

}
echo "</table>";
mysqli_close($conn);
?>
</body>
</html>
