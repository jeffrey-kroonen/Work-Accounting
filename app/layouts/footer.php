<?php
    if (isset($pageconfigfooter["javascript"])) {
      foreach ($pageconfigfooter["javascript"] as $script) {
      ?>
  <script src="/app/assets/javascript/<?= $script; ?>.js"></script>
  <?php 
      }
    }
  ?>

  </body>

  </html>