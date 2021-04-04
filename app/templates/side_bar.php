<div data-stat="off" class="wrapper bg-white shadow p-0">
    <!-- Sidebar -->
    <nav class="w-100" id="sidebar">
        <ul class="list-unstyled components p-0">
            <?php
                if(isset($favs)) {
                    foreach($favs as $fav) {
                        ?>
                            <li class="shadow p-2 w-100">
                                <a href="<?=$fav->fav_link;?>"><?=$fav->fav_title;?></a>
                            </li>
                        <?php
                    }
                }
            ?>
        </ul>
    </nav>

</div>