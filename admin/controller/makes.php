<?php

switch ($action) {
    case 'show_makes_form':
        include('./view/make_list.php');
        break;
    case 'add_make':
        add_make($new_make);
        header('Location: .?action=show_makes_form');
        break;
    case 'delete_make':
        delete_make($make_id_to_delete);
        header('Location: .?action=show_makes_form');
        break;
}
