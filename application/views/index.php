<?php error_reporting(0); ?>
<?php $this->load->view("_partials/head.php") ?>
<?php isset($sidebar) ? $this->load->view($sidebar) : '' ?>
<?php $this->load->view("_partials/top.php") ?>

<?php $this->load->view($subview) ?>

<?php $this->load->view("_partials/foot.php") ?>