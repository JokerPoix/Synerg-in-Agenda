<?php require 'views/header.php'?>
    
        
        <?php
            require 'bootstrap.php';
            require 'src/Date/Week.php';
            require 'src/Date/Events.php';
            

            setlocale(LC_TIME, 'fr_FR.utf8','fra');
            try {
                $week = new Date\Week($_GET['year'] ?? null, $_GET['week'] ?? null);
            } catch (\Exception $e){
                $week =new Date\Week();
            }
            $days= $week->getDays();
            
            $start = $days[0]['iso'];
            $end = $days[6]['iso'];
            $pdo = get_pdo();
            $events = new Date\Events($pdo);
            $events = $events->getEventsByDay($start , $end, $_GET['userId']);
        ?>

    
    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
            <h1><?="{$days[0]['formatedDate']} {$week->year} - {$days[6]['formatedDate']} {$_GET['year']}"?></h1>
            <div>
                <a href="/index.php?year=<?=$week->previousWeek()->year;?>&week=<?=$week->previousWeek()->week;?>" class="btn btn-primary">&lt;</a>
                <a href="/index.php?year=<?=$week->nextWeek()->year;?>&week=<?=$week->nextWeek()->week;?>" class="btn btn-primary">&gt;</a>
            </div>
    </div>
    
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <?php
                foreach($days as $day){
                    echo '<th scope="col">'.$day['formatedDate'].'</th>';   
                }?>
            </tr>
        </thead> 
        <tbody>
            <tr>
                <?php foreach($days as $day):?> 
                    <td>    
                        <ul class="list-group">
                        <?php
                            if(isset($events[$day["date"]])) 
                                foreach($events[$day["date"]] as $event) :?>
                                    <li class="list-group-item list-group-item-secondary"><?=explode(' ', $event["start"])[1];?>  <?=$event["name"]?></li>
                                <?php endforeach?>
                        </ul>
                    </td>
                <?php endforeach?>


            </tr>  
        </tbody>
    </table>
    <!--<a href="/add.php" class="calendar__button">+</a> -->
    </body>
</html>