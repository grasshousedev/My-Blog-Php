<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
      <?php for($i = 0; $i < $total_pages; $i++):?>
    <li class="page-item"><a class="page-link" href="<?php
        if(str_contains($_SERVER['REQUEST_URI'], 'category') || str_contains($_SERVER['REQUEST_URI'], 'search')) {
            echo explode('&', $_SERVER['REQUEST_URI'])[0] . '&page=' . $i+1;
        } else {
            echo '?page=' . $i+1;
        }
        ?>"><?=$i+1 ?></a></li>
      <?php endfor;?>
  </ul>
</nav>