<div class="wrap">
    <h1>Zarządzanie edycjami pielgrzymki</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Rok</th>
                <th>Edycja</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
        <?php
            global $wpdb;
            $table_name = $wpdb->prefix."tb_pr_pilgrimages";
            $pilgrimages = $wpdb->get_results("SELECT * FROM $table_name ORDER BY year DESC");
            foreach($pilgrimages as $pilgrimage)
            {
                echo '<tr>';
                echo '<td>';
                echo $pilgrimage->year;
                echo '</td>';
                echo '<td>';
                echo $pilgrimage->edition;
                echo '</td>';
                echo '<td>';
                echo '<button class="btn btn-primary pilgrimage-activation" data-pilgrimage="'.$pilgrimage->id.'">';
                echo 'Aktywuj zapisy';
                echo '</button>';
                echo '</td>';
                echo '</tr>';
            }
        ?>
        </tbody>
    </table>
</div>