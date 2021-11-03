<?php

use classes\Sess;

include __DIR__ . '\\chanks\\header.php'; ?>
<?php

$extrasensory = Sess::getSession('extrasensory');
$numbers = Sess::getSession('numbers');
?>
<div>
  <?php foreach ($extrasensory as $value) : ?>
    <li>
      <p>
        <?php echo $value['name'] . ': ' . end($value['guesses']) ?>
      </p>
    </li>
  <?php endforeach ?>
  </ul>
</div>

<div>
  <div><?php echo $_SESSION['error']; ?></div>
  <?php unset($_SESSION['error']); ?>
  <form action="/" method="POST"><input type="text" name="answer">
    <input type="submit" value="отправить">
  </form>
</div>

<?php include __DIR__ . '\\chanks\\footer.php'; ?>
