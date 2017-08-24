</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/init.js"></script>

<?php if($contents=='liste_region') { ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/crud_region.js"></script>
<?php } ?>
<?php if($contents=='liste_district') { ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/crud_district.js"></script>
<?php } ?>
<?php if($contents=='liste_commune') { ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/crud_commune.js"></script>
<?php } ?>
<?php if($contents=='liste_fokontany') { ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/crud_fokontany.js"></script>
<?php } ?>

</body>
</html>