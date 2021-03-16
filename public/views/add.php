<?php
require '../bootstrap.php';
render('header',['title' => 'Ajouter un évènement']);
?>
<div class="container">
    <h1>Ajouter un évènement</h1>
    <form action="" method="post">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-controll">
                    <label for="name">Titre</label>
                    <input id="name "type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input id="date "type="date" class="form-control" name="date">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="start">Démarrage</label>
                    <input id="start "type="time" class="form-control" name="start" placeholder="HH:MM" value="19:00">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="end">Fin</label>
                    <input id="end "type="time" class="form-control" name="end" placeholder="HH:MM" value="20:00">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" type="time" class="form-control" name="description" placeholder="HH:MM"></textarea>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Ajouter l'évènement</button>
        </div>
    </form>
</div>