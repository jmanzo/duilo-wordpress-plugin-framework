<h1>Duilo Framework</h1>

<?php settings_errors() ?>

<ul class="nav nav-tabs">
    <li class="tab active">
        <a href="#tab-1">General</a>
    </li>

    <li class="tab">
        <a href="#tab-2">Settings</a>
    </li>

    <li class="tab">
        <a href="#tab-3">About</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="tab-1">
        <form action="options.php" method="post">
            <?php
                settings_fields( 'duilo_netsuite_options_group' );
                do_settings_sections( 'duilo_netsuite_plugin' );
                submit_button();
            ?>
        </form>
    </div>

    <div class="tab-pane" id="tab-2">
        <h3>Settings</h3>
    </div>

    <div class="tab-pane" id="tab-3">
        <h3>About</h3>
    </div>
</div>