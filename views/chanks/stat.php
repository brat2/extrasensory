<?php
$extrasensory = Sess::getSession('extrasensory');

$numbers = Sess::getSession('numbers');
?>

<h2>История загаданных чисел:
  <?php foreach ($numbers as $value) : ?>
    <?php echo $value . ' ' ?>
  <?php endforeach ?>
</h2>
<ul>

  <?php foreach ($extrasensory as $value) : ?>

    <li>
      <p><b>
          <?php echo $value['name'] ?>
        </b></p>
      <p>история догадок:
        <?php foreach ($value['guesses'] as $val) : ?>
          <?php echo $val . ' ' ?>
        <?php endforeach ?>

      </p>
      <p>достоверность:
        <?php echo $value['result'] ?>
      </p>
    </li>
  <?php endforeach ?>
</ul>
