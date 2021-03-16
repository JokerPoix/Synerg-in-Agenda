<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?? 'Mon agenda';?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="../../css/style.css" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar navbar-dark bg-primary mb-3">
        <h1 href="index.php" class="text-white" >Agenda Synerg-in</h1>
        <div><?=require 'src/Meteo/Meteo.php';?></div>
    </nav>
