<?php
include('dashboard/function.php');
include("header.php");
?>

<section class="banner">
  <div class="swiper mySwiper1">
    <div class="swiper-wrapper">
      <div class="swiper-slide ">
        <img src="images/top-slider.jpg" alt="">
        <div class="carsouldetail">
          <p>better education for A better</p>
          <h3>World</h3>
          <button>Learn More</button>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="mainBox ">

                <i class="fa-solid fa-star"></i>
                <div>
                  <p>BEST INDUSTRY LEADERS</p>
                  <a href="#">Learn More</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="mainBox">
                <i class="fa-solid fa-book"></i>
                <div>
                  <p>LEARN COURSES ONLINE</p>
                  <a href="#">Learn More</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="mainBox">
                <i class="fa-solid fa-book-open-reader"></i>
                <div>
                  <p>BOOK LIBRARY & STORE</p>
                  <a href="#">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide ">
        <img src="images/slide_5.jpg" alt="">
        <div class="carsouldetail">
          <p>better education for A better</p>
          <h3>World</h3>
          <button>Learn More</button>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="mainBox ">

                <i class="fa-solid fa-star"></i>
                <div>
                  <p>BEST INDUSTRY LEADERS</p>
                  <a href="#">Learn More</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="mainBox">
                <i class="fa-solid fa-book"></i>
                <div>
                  <p>LEARN COURSES ONLINE</p>
                  <a href="#">Learn More</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="mainBox">
                <i class="fa-solid fa-book-open-reader"></i>
                <div>
                  <p>BOOK LIBRARY & STORE</p>
                  <a href="#">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>


</section>
<section class="coursesSec">
  <div class="container">
    <h3>Recent Courses</h3>
    <div class="row">

      <?php
      foreach ($course->getLimitedData() as $coursee) :
      ?>
        <div class="col-md-3 col-sm-12">
          <div class="divCourse">
            <a href="courseSubDetail.php?id=<?php echo $coursee['id'] ?>">
              <img src="uploads/courses/<?php echo $coursee['img'] ?>" alt="" />
              <div class="detailCourse">
                <p><?php echo $coursee['author'] ?></p>
                <h3><?php echo $coursee['name'] ?></h3>
              </div>
            </a>
            <div class="courseprice">
              <?php
              if ($coursee['price'] == 0) {
                ?>
                <p><del><small><?php echo $coursee['original_price'] ?> EGP</small></del></p>
                <h4>free</h4>
                <?php
              } else {
              ?>
                <p><del><small><?php echo $coursee['original_price'] ?> EGP</small></del></p>
                <h4 class="priceee"> <?php echo $coursee['price'] ?> EGP</h4>
              <?php
              }
              ?>
            </div>
            <a href="courseSubDetail.php?id=<?php echo $coursee['id'] ?>"><button class="linkdetail">Read More</button> </a>
          </div>
        </div>
      <?php
      endforeach;
      ?>
    </div>
  </div>
</section>
<section class="contactSec">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-sm-12 contactdetail">
          <p>Welcome to our Website</p>
          <h3>CONTACT US</h3>
          <div>
            <ul>
              <li><a href="tel:+(00) 123 456 789"><i class="fa-solid fa-phone"></i> (00) 123 456 789</a></li>
              <li><a href="mailto:hello@eduma.com"><i class="fa-solid fa-envelope"></i> hello@eduma.com</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-5 col-sm-12">

          <?php
          include("mail/mail.php");
          ?>
        </div>
      </div>
    </div>

  </div>
</section>
<section class="articleSec">

  <div class="container">
    <h2>Articles</h2>
    <div class="row">
      <?php
      foreach ($articles->getLimitedData() as $articlee) :
      ?>
        <div class="col-md-3 col-sm-12">
          <img src="uploads/articles/<?php echo $articlee['image'] ?>" alt="">
        </div>
        <div class="col-md-9 col-sm-12">
          <h3><?php echo $articlee['title_en'] ?></h3>
          <p><?php echo $articlee['description_en'] ?></p>
        </div>
      <?php
      endforeach;
      ?>
    </div>
  </div>
</section>
<section class="lastSec">
  <div class="container">
    <h2>What People Say</h2>
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div>
            <img src="images/team-3-100x100.jpg" alt="">
            <h3>Peter Packer</h3>
            <h5>FRONT-END DEVELOPER</h5>
          </div>
          <p>“ LearnPress is a WordPress complete solution for creating a Learning Management System (LMS). It can help me to create courses, lessons and quizzes and manage them as easy as I want. I’ve learned a lot, and I highly recommend it. Thank you. ”</p>
        </div>
        <div class="swiper-slide">
          <div>
            <img src="images/team-5-100x100.jpg" alt="">
            <h3>Manuel</h3>
            <h5>DESIGNER</h5>
          </div>
          <p>“ LearnPress is a WordPress complete solution for creating a Learning Management System (LMS). It can help me to create courses, lessons and quizzes and manage them as easy as I want. I’ve learned a lot, and I highly recommend it. Thank you. ”</p>
        </div>
        <div class="swiper-slide">
          <div>
            <img src="images/team-1-100x100.jpg" alt="">
            <h3>John Doe</h3>
            <h5>ART DIRECTOR</h5>
          </div>
          <p>“ LearnPress is a WordPress complete solution for creating a Learning Management System (LMS). It can help me to create courses, lessons and quizzes and manage them as easy as I want. I’ve learned a lot, and I highly recommend it. Thank you. ”</p>
        </div>
        <div class="swiper-slide">
          <div>
            <img src="images/team-8-100x100.jpg" alt="">
            <h3>Elsie</h3>
            <h5>COPYRIGHTER</h5>
          </div>
          <p>“ You don’t need a whole ecommerce system to sell your online courses. Paypal, Stripe payment methods integration can help you sell your courses out of the box. In the case you wanna use WooCommerce, this awesome WordPress LMS Plugin will serve you well too. ”</p>
        </div>
        <div class="swiper-slide">
          <div>
            <img src="images/team-2-100x100.jpg" alt="">
            <h3>Anthony</h3>
            <h5>CEO AT THIMPRESS</h5>
          </div>
          <p>“ LearnPress is a WordPress complete solution for creating a Learning Management System (LMS). It can help me to create courses, lessons and quizzes and manage them as easy as I want. I’ve learned a lot, and I highly recommend it. Thank you. ”</p>
        </div>
        <div class="swiper-slide">
          <div>
            <img src="images/team-3-100x100.jpg" alt="">
            <h3>Peter Packer</h3>
            <h5>FRONT-END DEVELOPER</h5>
          </div>
          <p>“ LearnPress is a WordPress complete solution for creating a Learning Management System (LMS). It can help me to create courses, lessons and quizzes and manage them as easy as I want. I’ve learned a lot, and I highly recommend it. Thank you. ”</p>
        </div>
        <div class="swiper-slide">
          <div>
            <img src="images/team-5-100x100.jpg" alt="">
            <h3>Manuel</h3>
            <h5>DESIGNER</h5>
          </div>
          <p>“ LearnPress is a WordPress complete solution for creating a Learning Management System (LMS). It can help me to create courses, lessons and quizzes and manage them as easy as I want. I’ve learned a lot, and I highly recommend it. Thank you. ”</p>
        </div>


      </div>
    </div>
  </div>
</section>

<?php
include("footer.php");
?>