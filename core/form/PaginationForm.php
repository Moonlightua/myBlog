<?php


namespace app\core\form;


class PaginationForm
{

    public function __construct($page, $totalPages)
    {
        echo '
            <div class="pagination">
                <div>
                   <a href="?page=1">First</a>
                </div>
                <div class="';

                echo ($page <= 1) ? "disable" : "active";

        echo'">
                  <a href="';

                echo ($page <= 1) ? "#" : "?page=".($page - 1);

        echo'">Prev</a>
                </div>
                
                <div class="';

        echo ($page >= $totalPages) ? "disable" : "active";

        echo'">
                  <a href="';

        echo ($page >= $totalPages) ? "#" : "?page=".($page + 1);

        echo'">Next</a>
                </div>
                <div>
                   <a href="?page=';

        echo $totalPages;

        echo'">Last</a>
                </div>
                
            </div>';

    }

}