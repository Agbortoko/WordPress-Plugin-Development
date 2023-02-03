<div class="wrap">

    <h1 class="main-heading">CPT Mananger</h1>

    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">

        <li class="active">
            <a href="#tab-1">Your Custom Post Types</a>
        </li>

        <li>
            <a href="#tab-2">Add Custom Post Types</a>
        </li>

        <li>
            <a href="#tab-3">Export</a>
        </li>

    </ul>

    <div class="tab-content">

        <div id="tab-1" class="tab-pane active">

            <h3>Manage Your Custom Post Types</h3>

            <?php

            $options = get_option('petizan_cpt');

            ?>

            <table class="table fixed striped table-view-list">

                <thead>
                    <tr>
                        <th id="title">Singular Name</th>
                        <th id="title">Plural Name</th>
                        <th id="title">Public</th>
                        <th id="title">Has Archive</th>
                        <th id="title">Actions</th>
                    </tr>
                </thead>

                <?php if (!empty($options) && isset($options)) : ?>

                    <?php foreach ($options as $option) : ?>


                        <tr>
                            <td><?= $option['singular_name'] ?></td>

                            <td><?= $option['plural_name'] ?></td>

                            <!-- Public -->
                            <?php if (isset($option['public']) && $option['public'] == 1) :  ?>
                                <td><?= 'Yes' ?> </td>

                            <?php else : ?>

                                <td><?= 'No' ?> </td>

                            <?php endif ?>

                            <!-- Has Archive -->
                            <?php if (isset($option['has_archive']) && $option['has_archive'] == 1) :  ?>
                                <td><?= 'Yes' ?> </td>

                            <?php else : ?>

                                <td><?= 'No' ?> </td>

                            <?php endif ?>

                             <td>
                                <a class="btn btn-edit" href="#"><span class="dashicons dashicons-edit"></span> EDIT</a> -
                                <a class="btn btn-delete" href="#"><span class="dashicons dashicons-trash"></span> DELETE</a>
                            </td>

                        </tr>


                    <?php endforeach ?>


                <?php endif ?>

            </table>




        </div>

        <div id="tab-2" class="tab-pane">




            <form method="post" action="options.php">

                <?php
                settings_fields('petizan_cpt_settings');
                do_settings_sections('petizan_cpt');
                submit_button();
                ?>

            </form>




        </div>


        <div id="tab-3" class="tab-pane">

            <h3>Export</h3>

        </div>


    </div>


</div>