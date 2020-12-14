<!-- <div class="container-fluid">
    <div class="row position-absolute wt-in">
        <div class="col-sm-12 rem-pad wt-in">
            <img class="ht wt-in" src="./view/assets/images/display-wide.png" alt="main_showcase">
        </div>
    </div>

    <div class="row">
            <div class="empty">
                
            </div>
    </div>

    <div class="row">
            <div class="btn-style col-md-5 d-flex">
                <div class="showcase_content text-center">
                <button class="btn btn-news">More news</button>
                </div>
            </div>
    </div>
</div> -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 rem-pad">
            <!-- <img srcset="/gamestation/view/assets/images/display-wide-550w.jpg 550w,
                         /gamestation/view/assets/images/display-wide-1920w.png 1920w"
                 sizes="(max-width: 550px) 550px, 
                        (max-width: 768px) 768px" 
                 src="/gamestation/view/assets/images/display-wide-550w.jpg"
                         class="showcase_img wt-in" alt="main_showcase"> -->
            <picture class="land_pic" style="width: inherit;">
               <source srcset="/gamestation/view/assets/images/display-700.png" media="(max-width: 550px)">
               <img srcset="/gamestation/view/assets/images/display-wide-1920w.png" class="showcase_img wt-in" alt="main_showcase"> 
            </picture> 
        </div>
    </div>

    <div class="row">
        <div class="btn-showcase-mt-neg position-absolute col-12 col-sm-5 col-md-5 col-lg-5 d-flex mt-neg-110">
            <div class="showcase_content text-center">
            <button class="btn btn-news btn-lg btn-home mainNews_btn"><a style="color: #212529; text-decoration: none;" href="/gamestation/news">More news</a></button>
            </div>
        </div>
    </div>
</div>


  <div class="container">
      <div class="row">
          <div class="col-12 col-sm-12 col-md-7 col-lg-8">
              <h1 class="showcase_heading text-center pt-4">Featured News</h1>
              <div id="carousel-news" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-news" data-slide-to="0" class="active circle-dot"></li>
                        <li data-target="#carousel-news" data-slide-to="1" class="circle-dot"></li>
                        <li data-target="#carousel-news" data-slide-to="2" class="circle-dot"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <picture>
                                <source srcset="./view/assets/images/carousel/brown_land-800.png" media="(max-width: 550px)">
                                <img rel="preload" style="width: 100%; max-height: 300px;" src="./view/assets/images/carousel/brown_land-1500.png" alt="triangle">
                                <div class="carousel-caption"><h3>Brown Land</h3></div>        
                            </picture>
                        </div>
                        <div class="carousel-item">
                            <picture>
                                <source srcset="./view/assets/images/carousel/red_land-800.png" media="(max-width: 550px)">
                                <img rel="preload" style="width: 100%; max-height: 300px;" src="./view/assets/images/carousel/red_land-1500.png" alt="Red Land">
                                <div class="carousel-caption"><h3>Red Land</h3></div>
                            </picture>
                        </div>
                        <div class="carousel-item">
                            <picture>
                                <source srcset="./view/assets/images/carousel/light_blue_land-800.png" media="(max-width: 550px)">
                                <img rel="preload" style="width: 100%; max-height: 300px;" src="./view/assets/images/carousel/light_blue_land-1500.png" alt="lightblue Land">
                                <div class="carousel-caption"><h3>lightblue Land</h3></div>
                            </picture>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-news" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-news" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
              </div>
          </div>
          <!-- <div class="col-1 col-md-1 col-lg-1"></div> -->
          <div class="col-12 col-sm-12 col-md-5 col-lg-4">
              <h2 style="margin-bottom: 1rem;" class="text-center pt-4">Update Table</h2>
              <div class="updateList text-center">
              <table class="table table-striped table-dark">
                    <thead class="table-mainHeader">
                        <tr>
                        <th colspan="7" scope="col">Weekly update</th>
                        </tr>
                    </thead>
                    <thead class="table-header">
                        <tr>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'monday')" scope="col">Mon</th>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'tuesday')" scope="col">Tue</th>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'wednesday')" scope="col">Wed</th>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'thursday')" scope="col">Thu</th>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'friday')" scope="col">Fri</th>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'saturday')" scope="col">Sat</th>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'sunday')" scope="col">Sun</th>
                        </tr>
                    </thead>
                    <tbody class="table-body newsContainer">
                        <?php 
                            $limited_mondayList = array_slice($this->monday_list, 0, 5);
                            for ($i = 0; $i < count($limited_mondayList); $i++)
                            {
                                echo "<tr> 
                                    <td colspan='7'>".$this->monday_list[$i]['news_title']."</td>                         
                                </tr>";
                            }
                        ?>
                        <!-- <tr>
                        <td colspan="7">Mark</td>
                        </tr>
                        <tr>
                        <td colspan="7">Mark</td>
                        </tr>
                        <tr>
                        <td colspan="7">Mark</td>
                        </tr>
                        <tr>
                        <td colspan="7">Mark</td>
                        </tr>
                        <tr>
                        <td colspan="7">Mark</td>
                        </tr>
                        <tr>
                        <td colspan="7">Mark</td>
                        </tr>
                        <tr>
                        <td colspan="7">Mark</td>
                        </tr> -->
                    </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
