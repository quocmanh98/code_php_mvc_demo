<style>
    a.actives{
        color:white !important;
        background-color: black !important;
    }
</style>
<?php
function get_pagging($num_page, $page, $base_url = '')
{
    global $num_page, $page;
?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            if ($page > 1) {
            ?>
                <li class="page-item"><a class="page-link" href="<?= $base_url ?>&page=<?= $page - 1 ?>">Trước</a></li>
            <?php
            }
            for ($i = 1; $i <= $num_page; $i++) {
                $actives = "";
                if($i == $page) $actives = "actives"
            ?>
                <li class="page-item " >
                    <a class="page-link <?= $actives ?>" href="<?= $base_url ?>&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php
            }
            if ($page < $num_page) {
            ?>
                <li class="page-item"><a class="page-link" href="<?= $base_url ?>&page=<?= $page + 1 ?>">Sau</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
<?php
}
?>