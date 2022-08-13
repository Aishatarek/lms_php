<?php
ob_start();
include("dashboard/function.php");
include("./header.php");
?>
<section class="pageBanner">
    <h3>Contact Us</h3>
</section>
<section class="thecontactpage">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12 contactDetailll">
                <h2>CONTACT INFO</h2>
                <p>Welcome to our Website. We are glad to have you around.</p>
                <div>
                    <div class="d-flex my-5">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-phone"></i>
                            <div>
                                <h3>Phone</h3>
                                <p>+7 (800) 123 45 69</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-envelope"></i>
                            <div>
                                <h3>Gmail</h3>
                                <p>hello@eduma.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-location-dot"></i>
                        <div>
                            <h3>Address</h3>
                            <p>PO Box 97845 Baker st. 567, Los Angeles, California, US.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 mailformContact">
                <?php
                include("mail/mail.php");
                ?>
            </div>
        </div>
    </div>

</section>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55251.37709964616!2d31.223444832512136!3d30.05948381032293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2sCairo%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1647657122545!5m2!1sen!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
<?php
include("./footer.php");

?>