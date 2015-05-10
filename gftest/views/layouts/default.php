<?php include_once 'parts/header.php'; ?>
<?php foreach ($this->errors as $msg) : ?>
      <div class="alert alert-danger" role="alert"><?= $msg ?></div>
  <?php endforeach; ?>
      <?php foreach ($this->success as $msg) : ?>
      <div class="alert alert-success" role="alert"><?= $msg ?></div>
  <?php endforeach; ?>
<?= $this->getLayoutData('content'); ?> 

<?= include_once 'parts/footer.php'; ?>
