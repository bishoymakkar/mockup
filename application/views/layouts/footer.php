        <footer class="navbar navbar-light d-flex justify-content-between mt-auto">
            <div class="copyright"><?php echo isset($copyright) ? $copyright : '&copy; MockUp Studio UG' ?></div>
            <div class="impressum"><?php echo isset($impressum) ? $impressum : 'Impressum' ?></div>
        </footer>
        <script>
        	var base_url = "<?php echo base_url() ?>";
        </script>
        <script src="<?php echo site_url('assets/node_modules/jquery/dist/jquery.min.js') ?>"></script>
        <script src="<?php echo site_url('assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?php echo site_url('assets/node_modules/owl.carousel/dist/owl.carousel.min.js') ?>"></script>
        <?php if (isset($script)): ?>
        <script src="<?php echo site_url($script) ?>"></script>
        <?php endif ?>
        <script src="<?php echo site_url('assets/js/main.js') ?>"></script>
    </body>
</html>
