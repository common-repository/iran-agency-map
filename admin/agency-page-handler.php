<?php
/**
    * List page handler
    *
    * This function renders our custom table
    * Notice how we display message about successfull deletion
    * Actualy this is very easy, and you can add as many features
    * as you want.
    *
    * Look into /wp-admin/includes/class-wp-*-list-table.php for examples
    */
    function iran_agency_map_agencies_page_handler()
    {
        global $wpdb;
    
        $table = new iran_agency_map_List_Table();
        $table->prepare_items();
    
        $message = '';
        if ('delete' === $table->current_action()) {
            $count_id = intval(count($_REQUEST['id']));
            $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items deleted: %d', 'iran-agency-map' ), $count_id) . '</p></div>';
        }
        ?>
    <div class="wrap">
    
        <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
        <h2><?php _e('agencies', 'iran-agency-map' )?> <a class="add-new-h2"
                                        href="<?php echo esc_url(get_admin_url(get_current_blog_id(), 'admin.php?page=agencies_form'));?>"><?php _e('Add new', 'iran-agency-map' )?></a>
        </h2>
        <?php echo $message; ?>
    
        <form id="agencies-table" method="GET">
            <input type="hidden" name="page" value="<?php echo esc_html($_REQUEST['page']); ?>"/>
            <?php $table->display(); ?>
        </form>
    
    </div>
    <?php
}