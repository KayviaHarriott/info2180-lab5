<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<?php
$a = $_REQUEST["a"];

$search = "";

if ($a !== "") {
    $a = strtolower($a);
    $len=strlen($a);
    foreach($results as $row) {
        
        if (stristr($a, substr($row['name'], 0, $len))) {
            if ($search === "") {
                $search =  "<p>" . $row['name'] . ' is ruled by ' . $row['head_of_state'];
            }
        }
    }
}

if ($a == "" || $a == " " || $a == null){    
    $search = "<ul>";
    foreach($results as $row) {
                $search .= "<li>" . $row['name'] . ' is ruled by ' . $row['head_of_state'] . "</li>";
        }
    $search .= "</ul>";
    }


echo $search === "" ? "Country not found" : $search;
?>

<?php
