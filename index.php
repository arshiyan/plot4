
<!DOCTYPE html>

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<body>

<h1> Plot Four Game</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
    <h2>Set the board dimensions (Rows x Columns)</h2>
    Rows: <input type="text" name="rows"><br>
    Columns: <input type="text" name="columns"><br>
    <input type="submit">
</form>
</body>

</html>


<?php

$rows = $_REQUEST['rows'];
$columns = $_REQUEST['columns'];

$rows = (!isset($rows) || empty($rows)) ? 6 : $rows;
$columns = (!isset($columns) || empty($columns)) ? 7 : $columns;

echo "Row : $rows". "<br>";
echo "Columns : $columns". "<br>";
