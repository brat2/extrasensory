<?php

use classes\Sess;

include __DIR__ . '\\chanks\\header.php'; ?>
<?php

$extrasensory = Sess::getSession('extrasensory');
$numbers = Sess::getSession('numbers');
?>
<div>
  <h4 class="text-center">Догадки экстрасенсов</h4>
  <ul class="list-group">
    <?php foreach ($extrasensory as $value) : ?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <?php echo $value['name'] ?>
        <span class="badge badge-primary badge-pill">
          <?php echo end($value['guesses']) ?>
        </span>
      </li>
    <?php endforeach ?>
  </ul>
</div>

<div class="text-center pt-5">
  <?php if ($_SESSION['error']) : ?>
    <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
  <?php endif ?>
  <h4>Введите загаданное число</h4>
  <form action="/" method="POST"><input type="text" name="answer">
    <input type="submit" value="отправить">
  </form>
</div>

<?php include __DIR__ . '\\chanks\\footer.php'; ?>