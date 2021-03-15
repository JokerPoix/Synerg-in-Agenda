<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="../css/style.css">
    </head>
    <body>
        <?php 
            require '../src/Date/Week.php';
            setlocale(LC_TIME, 'fr_FR.utf8','fra');
            try {
                $week = new App\Date\Week($_GET['year'] ?? null, $_GET['week'] ?? null);
            } catch (\Exception $e){
                $week =new App\Date\Week();
            }
    ?>

    <nav class="navbar navbar-dark bg-primary mb-3">
        <a href="index.php" class="navbar-brand">Agenda Synerg-in</a>
    </nav>

    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
            <h1>salutations</h1>
            <div>
                <a href="/index.php?year=<?=$week->previousWeek()->year;?>&week=<?=$week->previousWeek()->week;?>" class="btn btn-primary">&lt;</a>
                <a href="/index.php?year=<?=$week->nextWeek()->year;?>&week=<?=$week->nextWeek()->week;?>" class="btn btn-primary">&gt;</a>
            </div>
    </div>
    
    <table class="table table-bordered">
        <thead class="thead-dark">
            <?php
            $days= $week->getDays();
            foreach($days as $day){
                echo '<th scope="col">'.$day.' </th>';
            }?>
        </thead> 
    </table>
    </body>
</html>