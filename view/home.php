<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 rem-pad">
            <picture class="land_pic" style="width: inherit;">
               <source srcset="/view/assets/images/display-700.png" media="(max-width: 550px)">
               <img srcset="/view/assets/images/display-wide-1920w.png" class="showcase_img wt-in" alt="main_showcase"> 
            </picture> 
        </div>
    </div>

    <div class="row">
        <div class="btn-showcase-mt-neg position-absolute col-12 col-sm-5 col-md-5 col-lg-5 d-flex mt-neg-110">
            <div class="showcase_content text-center">
            <button class="btn btn-news btn-lg btn-home mainNews_btn"><a style="color: #c9d1d9; text-decoration: none; font-size: 1rem;" href="/news">More news</a></button>
            </div>
        </div>
    </div>
</div>


  <div class="container">
      <div class="row">
          <div class="col-12 col-sm-12 col-md-7 col-lg-8">
              <h4 style="font-weight:600;" class="showcase_heading mt-4">Featured News</h1>
              <div id="carousel-news" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-news" data-slide-to="0" class="active circle-dot"></li>
                        <li data-target="#carousel-news" data-slide-to="1" class="circle-dot"></li>
                        <li data-target="#carousel-news" data-slide-to="2" class="circle-dot"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <picture>
                                <source srcset="/view/assets/images/carousel/brown_land-800.png">
                                <img rel="preload" style="width: 100%; max-height: 300px;" src="/view/assets/images/carousel/brown_land-1500.png" alt="triangle">
                                <div class="carousel-caption"><h3>Brown Land</h3></div>        
                            </picture>
                        </div>
                        <div class="carousel-item">
                            <picture>
                                <source srcset="/view/assets/images/carousel/red_land-800.png">
                                <img rel="preload" style="width: 100%; max-height: 300px;" src="/view/assets/images/carousel/red_land-1500.png" alt="Red Land">
                                <div class="carousel-caption"><h3>Red Land</h3></div>
                            </picture>
                        </div>
                        <div class="carousel-item">
                            <picture>
                                <source srcset="/view/assets/images/carousel/light_blue_land-800.png">
                                <img rel="preload" style="width: 100%; max-height: 300px;" src="/view/assets/images/carousel/light_blue_land-1500.png" alt="lightblue Land">
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
              <h4 style="font-weight:600;" class="mt-4">Update Table</h2>
              <div class="updateList text-center">
              <table class="table table-striped table-dark">
                    <thead class="table-mainHeader">
                        <tr>
                        <th colspan="7" scope="col">Weekly update</th>
                        </tr>
                    </thead>
                    <thead class="table-header">
                        <!-- <tr>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'monday')" scope="col">Mon</th>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'tuesday')" scope="col">Tue</th>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'wednesday')" scope="col">Wed</th>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'thursday')" scope="col">Thu</th>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'friday')" scope="col">Fri</th>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'saturday')" scope="col">Sat</th>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'sunday')" scope="col">Sun</th>
                        </tr> -->
                        <tr>
                        <th id="mon" onclick="toggleDayForUpdateTable('mon')" scope="col">Mon</th>
                        <th id="tue" onclick="toggleDayForUpdateTable('tues')" scope="col">Tue</th>
                        <th id="wed" onclick="toggleDayForUpdateTable('wednes')" scope="col">Wed</th>
                        <th id="thu" onclick="toggleDayForUpdateTable('thurs')" scope="col">Thu</th>
                        <th id="fri" onclick="toggleDayForUpdateTable('fri')" scope="col">Fri</th>
                        <th id="sat" onclick="toggleDayForUpdateTable('satur')" scope="col">Sat</th>
                        <th id="sun" onclick="toggleDayForUpdateTable('sun')" scope="col">Sun</th>
                        </tr>
                    </thead>
                    <tbody class="table-body newsContainer">
                        <?php 
                            for ($i = 0; $i < count($pageData[0]); $i++)
                            {
                                echo "<tr class='monday-item' style='display:table-row;'><td colspan='7'>".$pageData[0][$i]['news_title']."</td></tr>";
                            }
                            for ($i = 0; $i < count($pageData[1]); $i++)
                            {
                                echo "<tr class='tuesday-item' style='display:none;'><td colspan='7'>".$pageData[1][$i]['news_title']."</td></tr>";
                            }
                            for ($i = 0; $i < count($pageData[2]); $i++)
                            {
                                echo "<tr class='wednesday-item' style='display:none;'><td colspan='7'>".$pageData[2][$i]['news_title']."</td></tr>";
                            }
                            for ($i = 0; $i < count($pageData[3]); $i++)
                            {
                                echo "<tr class='thursday-item' style='display:none;'><td colspan='7'>".$pageData[3][$i]['news_title']."</td></tr>";
                            }
                            for ($i = 0; $i < count($pageData[4]); $i++)
                            {
                                echo "<tr class='friday-item' style='display:none;'><td colspan='7'>".$pageData[4][$i]['news_title']."</td></tr>";
                            }
                            for ($i = 0; $i < count($pageData[5]); $i++)
                            {
                                echo "<tr class='saturday-item' style='display:none;'><td colspan='7'>".$pageData[5][$i]['news_title']."</td></tr>";
                            }
                            for ($i = 0; $i < count($pageData[6]); $i++)
                            {
                                echo "<tr class='sunday-item' style='display:none;'><td colspan='7'>".$pageData[6][$i]['news_title']."</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>

  <script>
    function toggleDayForUpdateTable(day) {
        document.querySelectorAll(".monday-item").forEach((item) => {
            item.style.display = "none"
        })
        document.querySelectorAll(".tuesday-item").forEach((item) => {
            item.style.display = "none"
        })
        document.querySelectorAll(".wednesday-item").forEach((item) => {
            item.style.display = "none"
        })
        document.querySelectorAll(".thursday-item").forEach((item) => {
            item.style.display = "none"
        })
        document.querySelectorAll(".friday-item").forEach((item) => {
            item.style.display = "none"
        })
        document.querySelectorAll(".saturday-item").forEach((item) => {
            item.style.display = "none"
        })
        document.querySelectorAll(".sunday-item").forEach((item) => {
            item.style.display = "none"
        })
        document.querySelectorAll("."+day+"day-item").forEach((item) => {
            item.style.display = "table-row"
        })
    }
  </script>