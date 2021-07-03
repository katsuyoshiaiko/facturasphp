<form>
    <?php
    foreach (categories_list() as $key => $value) {

        echo ' <div class="checkbox">
                <label>
                    <input type="checkbox"> ' . $value['category'] . '
                </label>
            </div>';
    }
    ?>   

    <button type="submit" class="btn btn-default">Submit</button>
</form>