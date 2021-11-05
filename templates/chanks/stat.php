<div class="row pt-5 mb-3">
  <div class="col">
    <div class="bg-secondary text-white text-center p-2">Загаданные числа</div>
    <div class="p-3 border">
      <?php foreach ($numberList as $number) : ?>
        <?php echo $number . ' ' ?>
      <?php endforeach ?>
    </div>
  </div>
</div>

<?php foreach ($extrasensList as $extrasens) : ?>
  <div class="row mb-3">
    <div class="col">
      <div class="bg-secondary text-white text-center p-2">
        <?php echo $extrasens->getName() ?>
      </div>
      <div class="p-2 border">
        <p>
          <span class="font-weight-bold">История догадок:</span>

          <?php foreach ($extrasens->getGuessList() as $guess) : ?>
            <?php echo $guess . ' ' ?>
          <?php endforeach ?>

        </p>
        <p><span class="font-weight-bold">Достоверность:</span>
          <span class="badge badge-secondary badge-pill">
            <?php echo $extrasens->getResult() ?>
          </span>
        </p>
      </div>
    </div>
  </div>
<?php endforeach ?>