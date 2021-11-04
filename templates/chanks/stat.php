<?php

use classes\Sess;

$extrasensory = Sess::getSession('extrasensory');

$numbers = Sess::getSession('numbers');
?>

<div class="row pt-5 mb-3">
  <div class="col">
    <div class="bg-secondary text-white text-center p-2">Загаданные числа</div>
    <div class="p-3 border">
      <?php foreach ($numbers as $value) : ?>
        <?php echo $value . ' ' ?>
      <?php endforeach ?>
    </div>
  </div>
</div>

<?php foreach ($extrasensory as $value) : ?>
  <div class="row mb-3">
    <div class="col">
      <div class="bg-secondary text-white text-center p-2">
        <?php echo $value['name'] ?>
      </div>
      <div class="p-2 border">
        <p>
          <span class="font-weight-bold">История догадок:</span>

          <?php foreach ($value['guesses'] as $val) : ?>
            <?php echo $val . ' ' ?>
          <?php endforeach ?>

        </p>
        <p><span class="font-weight-bold">Достоверность:</span>
          <span class="badge badge-secondary badge-pill">
            <?php echo $value['result'] ?>
          </span>
        </p>
      </div>
    </div>
  </div>
<?php endforeach ?>