<?php
if (empty($_SESSION['logged'])) {
    ?>
    <script type="text/javascript">window.location.href = "<?php echo BASE_URL; ?>login";</script>
    <?php
    exit;
}
?>
<div class="container">
    <div class="container">
        <h4>SISTEMA CONTÁBIL - HERMES</h4>
        <img src="<?php echo BASE_URL; ?>assets/images/logo-123Milhas.png" id="centro" />
    </div>
</div>