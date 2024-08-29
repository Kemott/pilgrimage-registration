<div class="wrap">
    <h1>Opcje rejestracji na pielgrzymki</h1>
    <form method="POST" action="options.php">
        <?php 
            settings_fields('tb-pr'); 
            do_settings_sections('tb-pr');
        ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Zgoda rodziców na uczestnictwo w pielgrzymce</th>
                <td>
                    <input type="text" id="consent" class="upload-input" name="tb-pr-consent-under-age" value="<?php echo esc_attr(get_option('tb-pr-consent-under-age')) ?>" />
                    <button class="upload-button" type="button">Wybierz plik zgody</button>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Strona z regulaminem pielgrzymki</th>
                <td>
                    <select id="regulations" name="tb-pr-regulations">
                        <?php
                            $pages = get_pages();
                            foreach($pages as $page)
                            {
                                $option = '<option value="' . $page->ID . '"';
                                if($page->ID == esc_attr(get_option('tb-pr-regulations')))
                                {
                                    $option .= ' selected="selected"';
                                }
                                $option .= '>';
                                $option .= $page->post_title;
                                $option .= '</option>';
                                echo $option;
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr valign="top">
                <th cope="row">Koszt dnia marszu</th>
                <td>
                    <input type="text" name="tb-pr-cost-per-day" value="<?php echo get_option('tb-pr-cost-per-day', 0); ?>"> zł
                </td>
            </tr>
            <tr valign="top">
                <th cope="row">Koszt pakietu</th>
                <td>
                    <input type="text" name="tb-pr-package-cost" value="<?php echo get_option('tb-pr-package-cost', 0); ?>"> zł
                </td>
            </tr>
            <tr valign="top">
                <th cope="row">Koszt koszulki</th>
                <td>
                    <input type="text" name="tb-pr-t-shirt-cost" value="<?php echo get_option('tb-pr-t-shirt-cost', 0); ?>"> zł
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>