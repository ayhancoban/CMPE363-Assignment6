<!DOCTYPE html>
<html>
<body>

<?php
// PHP Data Objects(PDO) Code:
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:ayhancoban-cmpe363-sv1.database.windows.net,1433; Database = sql1", "ayhancoban", "Ayhan_5462821121");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "ayhancoban", "pwd" => "Ayhan_5462821121", "Database" => "sql1", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:ayhancoban-cmpe363-sv1.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Group Members:
echo "AYHAN ÇOBAN        112200041"
echo "GÜLCE GÜLMEZ       117200050"
echo "ZEYNEP BEGÜM DOST  118200051"

// SQL Query:
$tsql= "SELECT TOP 20 pc.Name as CategoryName, p.name as ProductName
         FROM [SalesLT].[ProductCategory] pc
         JOIN [SalesLT].[Product] p
         ON pc.productcategoryid = p.productcategoryid";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Reading data from table" . PHP_EOL);
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['CategoryName'] . " " . $row['ProductName'] . PHP_EOL);
    }
    sqlsrv_free_stmt($getResults);
?>

</body>
</html> 
