<?php

switch ($action) {
    case 'show_classes_form':
        include('./view/class_list.php');
        break;
    case 'add_class':
        add_class($new_class);
        header('Location: .?action=show_classes_form');
        break;
    case 'delete_class':
        delete_class($class_id_to_delete);
        header('Location: .?action=show_classes_form');
        break;
}
