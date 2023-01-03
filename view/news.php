<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mainHeading"> 
            <h3>Latest News</h3>
        </div>
        <div class="col-12">
            <?php
            function getArticlePathByNewsTitle($newsTitle) {
                return "newsArticle/".str_replace(' ', '-', $newsTitle);
            }
            for ($i = 0; $i < count($pageData); $i++) {
                echo
                    "<div class='card'>
                <div class='card-main' style='display:flex; flex-direction: row-reverse;'>
                        <a class='card-link' href=".getArticlePathByNewsTitle($pageData[$i]['news_title'])."></a> 
                    <div class='img-wrapper' style='padding: 1.25rem'>
                        <img src=".$pageData[$i]['imgNews_thumbnail']. " rel='preload' style='max-width:200px; min-height: 130px;' alt='image loading'>
                    </div>
                    <div class='card-body'>
                        <p class='mb-2'>Article <span style='font-size: small;'>[".$pageData[$i]['createdDate']."]</span></p>
                        <h5 class='card-title'>".$pageData[$i]['news_title']."</h5>
                        <p class='card-text'>".$pageData[$i]['description']."</p>
                    </div>
                </div>
                </div>";
            } ?>

        </div>
    </div>
</div>