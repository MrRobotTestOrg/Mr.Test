<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dick Crud Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the CRUD interface.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    // Create form
    'add'                 => 'Adicionar',
    'back_to_all'         => 'Voltar tudo ',
    'cancel'              => 'Cancelar',
    'add_a_new'           => 'Adicionar um novo ',

        // Create form - advanced options
        'after_saving'            => 'Após salvar',
        'go_to_the_table_view'    => 'me leve a visualização dos dados',
        'let_me_add_another_item' => 'me leve a criar outro item',
        'edit_the_new_item'       => 'me leve a editar o item',

    // Edit form
    'edit'                 => 'Editar',
    'save'                 => 'Salvar',

    // Revisions
    'revisions'            => 'Revisions',
    'no_revisions'         => 'No revisions found',
    'created_this'          => 'created this',
    'changed_the'          => 'changed the',
    'restore_this_value'   => 'Restore this value',
    'from'                 => 'from',
    'to'                   => 'to',
    'undo'                 => 'Undo',
    'revision_restored'    => 'Revision successfully restored',

    // CRUD table view
    'all'                       => 'Tudo ',
    'in_the_database'           => 'no banco de dados',
    'list'                      => 'Listar',
    'actions'                   => 'Ações',
    'preview'                   => 'Previsão',
    'delete'                    => 'Deletar',
    'admin'                     => 'Admin',
    'details_row'               => 'This is the details row. Modify as you please.',
    'details_row_loading_error' => 'There was an error loading the details. Please retry.',

        // Confirmation messages and bubbles
        'delete_confirm'                              => 'Are you sure you want to delete this item?',
        'delete_confirmation_title'                   => 'Item Deleted',
        'delete_confirmation_message'                 => 'The item has been deleted successfully.',
        'delete_confirmation_not_title'               => 'NOT deleted',
        'delete_confirmation_not_message'             => "There's been an error. Your item might not have been deleted.",
        'delete_confirmation_not_deleted_title'       => 'Not deleted',
        'delete_confirmation_not_deleted_message'     => 'Nothing happened. Your item is safe.',

        // DataTables translation
        'emptyTable'     => 'Sem dados cadastrados',
        'info'           => 'Exibindo _START_ até _END_ de _TOTAL_ entradas',
        'infoEmpty'      => 'Exibindo 0 até 0 de 0 entradas',
        'infoFiltered'   => '(filtered from _MAX_ total entries)',
        'infoPostFix'    => '',
        'thousands'      => ',',
        'lengthMenu'     => '_MENU_ records per page',
        'loadingRecords' => 'Loading...',
        'processing'     => 'Processing...',
        'search'         => 'Producar: ',
        'zeroRecords'    => 'No matching records found',
        'paginate'       => [
            'first'    => 'Primeiro',
            'last'     => 'Último',
            'next'     => 'Próximo',
            'previous' => 'Anterior',
        ],
        'aria' => [
            'sortAscending'  => ': activate to sort column ascending',
            'sortDescending' => ': activate to sort column descending',
        ],

    // global crud - errors
    'unauthorized_access' => 'Unauthorized access - you do not have the necessary permissions to see this page.',
    'please_fix' => 'Please fix the following errors:',

    // global crud - success / error notification bubbles
    'insert_success' => 'The item has been added successfully.',
    'update_success' => 'The item has been modified successfully.',

    // CRUD reorder view
    'reorder'                      => 'Reorder',
    'reorder_text'                 => 'Use drag&drop to reorder.',
    'reorder_success_title'        => 'Done',
    'reorder_success_message'      => 'Your order has been saved.',
    'reorder_error_title'          => 'Error',
    'reorder_error_message'        => 'Your order has not been saved.',

    // Fields
    'browse_uploads' => 'Browse uploads',
    'clear' => 'Clear',
    'page_link' => 'Page link',
    'page_link_placeholder' => 'http://example.com/your-desired-page',
    'internal_link' => 'Internal link',
    'internal_link_placeholder' => 'Internal slug. Ex: \'admin/page\' (no quotes) for \':url\'',
    'external_link' => 'External link',
    'choose_file' => 'Choose file',

    //Table field
    'table_cant_add' => 'Cannot add new :entity',
    'table_max_reached' => 'Maximum number of :max reached',

];
