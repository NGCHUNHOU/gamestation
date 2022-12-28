<?php
// use classes\data\datacenter;
// use classes\db\db;
//     $db = new db(new datacenter);
//     $aboutContent = $db->query("SELECT * FROM `about`");
    // echo "<pre>".
    // print_r($aboutContent) .
    // "</pre>";
?>
<div style="position: relative">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 rem-pad">
                <picture class="land_pic" style="width: inherit;">
                    <source srcset="/view/assets/images/lightTower-600.jpg" media="(max-width: 550px)">
                    <img srcset="/view/assets/images/lightTower-1920.jpg" class="showcase_img wt-in" alt="main_showcase">
                </picture>
            </div>
        </div>
    </div>
    <!-- <div style="width: 100%; height: 50px; background: #173F5A; position: absolute; bottom: 0"></div> -->
    <svg style="position: absolute; bottom: -70px; transform: rotate(180deg)" width="100%" height="100" viewBox="0 0 600 280" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
        <g>
        <path id="animated-wave" d="m-2,-52.30547c213.92539,-164.88947 427.85073,164.88946 641.77607,0l0,296.80101c-145.92534,122.88948 -463.85068,-190.88945 -641.77607,0l0,-296.80101z" fill="#173F5A"/>
        </g>
    </svg>
</div>
<br>
<br>
<!-- <?php
    foreach ($aboutContent as $contentBlock) {
        echo "
              <h1 class='showcase_heading text-center pt-4'>$contentBlock[title]</h1>
<div class='container'>
    <div class='row' style='$contentBlock[divInversed]'>
        <div class='col-12 col-md-5 text-center'>
            <br>
            <picture class='' style='width: inherit;'>
               <source srcset='$contentBlock[imgPath]' media='(max-width: 550px)'>
               <img srcset='$contentBlock[imgPath]' width='$contentBlock[imgSize]' class='pic-newsPaper' alt='gameNews' data-direction='right'> 
            </picture> 
            <br>
            <br>
        </div>
        <div class='col-12 col-md-7 d-flex align-items-center'>
            <div class='card' data-direction='left'>
                <div class='card-main' style='display:flex; flex-direction: row-reverse;'>
                  <div class='card-body'>
                    <h2>$contentBlock[subtitle]</h2>
                    <p>$contentBlock[paragraph]</p>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
        ";
    }
?> -->
<script src="/view/assets/js/dist/bundle.js"></script>
<script>
makeWave(document.querySelector("path#animated-wave"));
(function checkViewport()
{
    let viewPort = window.matchMedia("(max-width: 700px)").matches ?
    makeFadedIn(document.querySelectorAll(".card"), document.querySelectorAll(".pic-newsPaper"), true) :
    makeFadedIn(document.querySelectorAll(".card"), document.querySelectorAll(".pic-newsPaper"), false)
})()
</script>