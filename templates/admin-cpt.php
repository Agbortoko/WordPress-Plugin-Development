<div class="wrap">


    <h1>This is the CPT Settings</h1>
    
    <?php settings_errors(); ?>
    
    <form method="post" action="options.php">
            
            <?php
                settings_fields( 'petizan_cpt_settings' );
                do_settings_sections( 'petizan_cpt' );
                submit_button();
            ?>
    
    </form>




</div>


