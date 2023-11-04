<?php require "main.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Todo List</title>
  <link rel="stylesheet" href="style.css" />
  <script defer src="js/all.min.js"></script>
</head>

<body>

  <h1>Todo List</h1>
  <form method="post" class="wrapper">
    <input type="text" placeholder="Enter task" name="task"><button class="btn btn-add" name="add">Add</button>
  </form>
  <p class="error-msg"><?= $error ?></p>
  <p class="success-msg"><?= $success_msg ?></p>
  <div class="incompelete">
    <?php if ($tasks) : ?>
      <?php foreach ($tasks as $task) : ?>
        <div class="list-item">
          <?= $task['task'] ?>
          <form action="" method="post">
            <button class="btn btn-check" name="check" value="<?= $task['id'] ?>"><i class="fa-regular fa-square"></i></button>
            <button class="btn btn-trash" name="delete" value="<?= $task['id'] ?>"><i class="fa fa-trash"></i></button>
          </form>
        </div>
      <?php endforeach ?>
    <?php endif ?>
  </div>

  <h3>Compeleted</h3>
  <div class="compeleted">
  <?php if ($compelete_tasks) : ?>
      <?php foreach ($compelete_tasks as $compelete_task) : ?>
        <div class="list-item compelete">
          <?= $compelete_task['task'] ?>
          <form action="" method="post">
            <button class="btn btn-uncheck" name="uncheck" value="<?= $compelete_task['id'] ?>"><i class="fa-regular fa-check-square"></i></button>
            <button class="btn btn-trash" name="delete" value="<?= $compelete_task['id'] ?>"><i class="fa fa-trash"></i></button>
          </form>
        </div>
      <?php endforeach ?>
  <?php endif  ?>
  </div>


</body>

</html>