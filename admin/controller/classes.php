<?php

switch ($action) {
    case 'show_classes_form':
        include('./view/class_list.php');
        break;
    case 'delete_class':
        delete_class($class_id_to_delete);
        break;
}
