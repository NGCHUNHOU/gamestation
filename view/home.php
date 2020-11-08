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
            <img preload rel="preload" class="showcase_img wt-in" src="./view/assets/images/display-wide-1920w.png" alt="main_showcase">
        </div>
    </div>

    <div class="row">
        <div class="btn-showcase-mt-neg position-absolute col-5 col-sm-5 col-md-5 col-lg-5 d-flex mt-neg-110">
            <div class="showcase_content text-center">
            <button class="btn btn-news btn-responsive-padding mainNews_btn">More news</button>
            </div>
        </div>
    </div>
</div>


  <div class="container">
      <div class="row">
          <div class="col-12 col-sm-12 col-md-8 col-lg-8">
              <h1 class="showcase_heading text-center pt-4">Featured News</h1>
              <div id="carousel-news" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-news" data-slide-to="0" class="active circle-dot"></li>
                        <li data-target="#carousel-news" data-slide-to="1" class="circle-dot"></li>
                        <li data-target="#carousel-news" data-slide-to="2" class="circle-dot"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img rel="preload" width="100%" src="./view/assets/images/purple_triangle.svg" alt="triangle">
                            <div class="carousel-caption"><h3 style="font-size: 2.5vw;">vector triangle</h3></div>        
                        </div>
                        <div class="carousel-item">
                            <img rel="preload" width="100%" src="./view/assets/images/red_land.png" alt="Red Land">
                            <div class="carousel-caption"><h3 style="font-size: 2.5vw;">Red Land</h3></div>
                        </div>
                        <div class="carousel-item">
                            <img rel="preload" width="100%" src="./view/assets/images/light_blue_land.jpg" alt="lightblue Land">
                            <div class="carousel-caption"><h3 style="font-size: 2.5vw;">lightblue Land</h3></div>
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
          <div class="col-12 col-sm-12 col-md-3 col-lg-3">
              <!-- <h3 style="font-size: 2vw;" class="text-center pt-4">updated list</h3> -->
              <div class="updateList text-center mt-5">
              <table class="table table-striped table-dark">
                    <thead class="table-mainHeader" style="background: #E0A800; color: #000000;">
                        <tr>
                        <th colspan="7" scope="col">Weekly update</th>
                        </tr>
                    </thead>
                    <thead class="table-header">
                        <tr>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'monday')" scope="col">Mon</th>
                        <th onclick="setDailyNews(document.querySelector('.newsContainer'), 'tuesday')" scope="col">Tue</th>
                        <th onclick="" scope="col">Wed</th>
                        <th onclick="" scope="col">Thu</th>
                        <th onclick="" scope="col">Fri</th>
                        <th onclick="" scope="col">Sat</th>
                        <th onclick="" scope="col">Sun</th>
                        </tr>
                    </thead>
                    <tbody class="table-body newsContainer">
                        <?php for($i = 0; $i < count($this->monday_list); $i++)
                            echo "<tr> 
                                <td colspan='7'>".$this->monday_list[$i]['news_title']."</td>                         
                            </tr>";
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
