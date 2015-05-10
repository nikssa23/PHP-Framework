<?php include_once 'parts/header.php'; ?>

<!-- Main component for a primary marketing message or call to action -->
<div class="row">
    <?= $this->getLayoutData('helpText'); ?> 
</div>

<div class="row">
    <div class="col-lg-6">
	<?= $this->getLayoutData('answeredWuestions'); ?> 
    </div>
    <div class="col-lg-6">
	<?= $this->getLayoutData('newQuestions'); ?> 
    </div>
</div>

<?php include_once 'parts/footer.php'; ?>
