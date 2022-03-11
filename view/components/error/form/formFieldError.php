<?php

$field = $field ?? 'default';
echo $field;



if(isset($errors[$field])) {
    ?>
    <div class="alert alert-danger" role="alert">
        <?php
        foreach ($errors[$field] as $error) {
            echo $error . '<br>';
        }
        ?>
    </div>

    <?php
}
unset($field);
?>