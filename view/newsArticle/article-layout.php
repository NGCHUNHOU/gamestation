<div class='container'>
  <div class='row'>
    <div class='col-md-12 mainHeading'>
      <h3><?php echo $pageData["news_title"] ?></h3>
    </div>
  </div>
  <div class='row'>
    <div class='col-12 mt-4 mb-4'>
      <img srcset="<?php echo $pageData["imgNews_content"] ?>" class='article-img' alt='article image'>

    </div>
  </div>
  <div class='row'>
    <div class='col-10 col-md-10 col-lg-8 card' style='padding: 15px; margin: 15px;'>
      <p><?php echo $pageData["description"] ?></p>
    </div>
  </div>
</div>