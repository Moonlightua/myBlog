<?php


namespace app\core\form;


class PaginationForm
{

    public function __construct($page, $totalPages)
    {
        echo '
            <div class="pagination">
            <div class="pag-items">
                <div class="pag-item">
                    <div class="';
        echo ($page == 1) ? "pag-first disable" : "pag-first active";


        echo '">
                   <a href="?page=1">First</a>
                    </div>
                </div>
                
                <div class="pag-item">
                    <div class="';

        echo ($page <= 1) ? "pag-prev disable" : "pag-prev active";

        echo'">
                  <a href="';

        echo ($page <= 1) ? "#" : "?page=".($page - 1);

        echo'">Prev</a>
                    </div>
                </div>
                
                <div class="pag-item">
                    <div class="pag-pages">
                    ';

        for ($i = 1; $i <= $totalPages; $i++){
            if ($i == $page) {
                echo "<div class='pag-item active'><a href='?page=$i'>".$i."</a></div>";
            } else {
                echo "<div class='pag-item off'><a href='?page=$i'>".$i."</a></div>";
            }

        }
        echo'
                    </div>
                </div>
                
                <div class="pag-item">
                    <div class="';

        echo ($page >= $totalPages) ? "pag-next disable" : "pag-next active";

        echo'">
                  <a href="';

        echo ($page >= $totalPages) ? "#" : "?page=".($page + 1);

        echo'">Next</a>
                    </div>
                </div>
                
                <div class="pag-item">
                <div class="';

        echo ($page == $totalPages)? "pag-first disable" : "pag-first active";

        echo '">
                   <a href="?page=';

        echo $totalPages;

        echo'">Last</a>
                </div>
                </div>
                </div>
            </div>';

    }

}