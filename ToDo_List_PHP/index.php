<?php

include_once 'function.php';

?>


<!doctype html>
<html lang="fr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style_ToDoList/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    <title>To Do List</title>
  </head>
  <body>
    <div class="container">
        <div class="row mt-3">
            <div class="col offset-2">
                <h1>Mes tâches</h1>
            </div>
        </div>

        <form class="row mt-3" id="formAddTask">
            <input type="hidden" name="action" value="add_task">

            <div class="col-6 offset-2">
                <label for="inputTaskName" class="visually-hidden">Tâche</label>
                <input type="text" class="form-control" name="taskName" id="inputTaskName" placeholder="Tâche" required>
            </div>

            <div class="col-4">
                <button type="submit" class="btn btn-outline-light mb-3">Ajouter</button>
            </div>
        </form>

        <div class="row">
            <div class="col-7 offset-2">
                <table class="table table-bordered table-dark table-striped table-hover">
                    <thead>
                        <th>Fait</th>
                        <th>Nom</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                        
                        <?php
                        foreach($tasks as $task)
                        {
                            ?>
                            <tr>
                                <td style="width: 10%;" class="text-center">
                                    <input type="checkbox" class="form-check-input" data-id="<?= $task['id'] ?>" <?= $task['checked'] ?>>
                                </td>
                                <td style="width: 70%;">
                                    <?= $task['name'] ?>
                                </td>
                                <td style="width: 20%;">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-danger" data-id="<?= $task['id'] ?>">X</button>
                                    </div>
                                </td>
                            </tr>
                            <?php

                        }
                        ?>
                        
                    </tbody>
                </table>
                <div class="text-center">
                    <button class="btn btn-warning" id="all_empty">Vider la liste</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>