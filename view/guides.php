<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container">
        <div class="row">
            <div class="guide_heading col-12">
            <br><br>
                <h1 class="text-center"><?=$dc->guidepage[0]?></h1>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12" style="display:flex; justify-content: left; flex-wrap: wrap;">
            <?php

                                        use classes\guidecardframe;

for($i=0;$i<count($dc->guideCardTitle);$i++)
            {
                echo "<div class='card guide-card' style='margin: 10px; padding: 10px;'> <div class='img-guide' > <img src='".$dc->guideImage[$i]."' style='max-width:300px; min-height: 130px;' alt='' srcset=''> </div> <br> <h2><a style='text-decoration: none; color: #fff; max-width: 300px; display: inline-block; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;' href='/guides/".$this->rewriteNewsTitleUrl($dc->guideCardTitle[$i])."'>".$dc->guideCardTitle[$i]."</a></h1> </div>"; 
            }
            ?>
            </div>
        </div>
    </div>
</body>
</html>