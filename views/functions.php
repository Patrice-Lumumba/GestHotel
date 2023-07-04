<?php

function generate_block($input_label) {
    ?>
    <div class="form-floating mb-3">
        <?=$input_label?>
    </div>
    <?php
}
function generate_input($label,$name, $type, $class, $placeholder) {
    generate_block('<label>'.$label.'</label> <input type="'.$type.'" name="'.$name.'" placeholder="'.$placeholder.'" class="'.$class.'"');


}