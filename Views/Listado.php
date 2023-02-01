<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado viviendas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #FCD8D4;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;

        }


        .pagination a {
            text-decoration: none;
            color: black;
            padding: 8px 16px;
            border: 1px solid #ddd;
        }

        .pagination a.active {
            background-color: #B97A95;
            color: white;
        }
    </style>

</head>

<body>

</body>

</html>

<?php

// include_once '../Controllers/Controllers.php';

include '../Models/Pagination.php';


  $pagination = new Pagination('viviendas');
  $registro = $pagination->getData($_GET['page'] ?? 1);
  printPagination($pagination, $registro);
  