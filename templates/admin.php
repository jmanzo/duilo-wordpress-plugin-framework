<h1>Duilo Netsuite Integration</h1>

<?php settings_errors() ?>

<form action="options.php" method="post">
    <?php
        settings_fields( 'duilo_netsuite_options_group' );
        do_settings_sections( 'duilo_netsuite_plugin' );
        submit_button();
    ?>
</form>