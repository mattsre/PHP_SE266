<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Final Exam - Country Data</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <!-- Include DB connection, and DB functions -->
  <?php include '../utils/dbConnect.php'; ?>
  <?php include '../utils/countryFunctions.php'; ?>
  <!-- Get the top ten countries -->
  <?php $results = getTopTen(); ?>
  <!-- Include Header, Table, and Footer -->
  <?php include './components/header.php'; ?>
  <?php include './components/table.php'; ?>
  <?php include './components/footer.php'; ?>
</body>
</html>