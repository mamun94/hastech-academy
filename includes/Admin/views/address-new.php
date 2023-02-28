<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('New Address', 'hastech-academy'); ?></h1>
    
    

    <form action="" method="post">
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="name"><?php _e('Name','hastech-academy') ?></label>
                </th>
                <td>
                    <input type="text" name="name" id="name" class="regular-text" value="">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="adsress"><?php _e('Address','hastech-academy') ?></label>
                </th>
                <td>
                    <textarea class="regular-text" name="address" id="" cols="10" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="phone"><?php _e('Phone','hastech-academy') ?></label>
                </th>
                <td>
                    <input type="text" name="phone" id="phone" class="regular-text" value="">
                </td>
            </tr>
        </table>
        <?php wp_nonce_field('new-address'); ?>
        <?php submit_button(__('Add Address','hastech-academy'), 'primary', 'submit_address'); ?>
    </form>


</div>