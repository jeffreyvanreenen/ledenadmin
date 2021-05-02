<?php
  $news = file_get_contents('https://www.reddingsbrigade-hellevoetsluis.nl/wp-feed.php');

  echo $news;
  ?>
