<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</head>
<!-- As a heading -->
<nav class="navbar navbar-light primary text-white">
  <div class="container-fluid">
    <span class="navbar-brand mb-0">Opportunity</span>
  <h1 class="col-md-8">PhPMyAdmin SQL Books Database</h1>
  </div>
</nav>
<body>
  <table class='table table-hover'>
    <thead class='bg-primary'>
      <tr>
        <?php
include "./includes/db.php";

// Get the Data from The PhPmyadmin database getter (SELECT Statement)

$sqlStatement = $dbConnection->query("SELECT * FROM `books`");
$columnCount = $sqlStatement->columnCount();

for ($c = 0; $c < $columnCount; $c++) {
 $columnMeta = $sqlStatement->getColumnMeta($c); //output be an array with meta data

 //from the input of the metadata column we can get the 'name'. with the value above i can sort the header
 $columnName = $columnMeta ['name'];
 echo"<th class='bg-primary'>$columnName</th>";
}

        ?>
</tr>
</thead>

    <br>
    
    <?php
   
  while ($row = $sqlStatement->fetch(\PDO::FETCH_ASSOC)) {
    // Do something ...
    
        echo "<tr>";
    // Search through the ArrayObject link:https://www.php.net/manual/en/pdostatement.getcolumnmeta.php
        foreach ($row as $columnName => $value) {
          if ($columnName === 'title'){
            $id = $row ['id'];
            echo "<td><a href='editbook.php?id=$id'>$value</a></td>";
          }
         else {   
        echo "<td>$value</td>";
        }
      }
    
        echo "</tr>";
    
    }
    
     
    ?>    
   
    </tbody>
    </table>
</body>
</html>