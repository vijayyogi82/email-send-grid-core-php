<!-- form-area-start -->
<div class="estimate-frm">
    <form id="queryform" class="form-container" name="homeform" method="post" action="sendgrid.php" autocomplete="on">
        <div class="pt-25 pb-25">
            <h3 class="white-color">Get a free quote</h3>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 box_width1">
                        <input type="text" name="mov_form" class="form-control" placeholder="Moving From*" maxlength="50" required>
                    </div>
                    <div class="col-lg-6 col-md-6 box_width1">
                        <input type="text" name="mov_to" class="form-control" placeholder="Moving To*" maxlength="50" required>
                    </div>
                    <div class="col-lg-6 col-md-6 box_width1">
                        <input type="text" name="name" class="form-control" placeholder="Name*" maxlength="50" required>
                    </div>
                    <div class="col-lg-6 col-md-6 box_width1">
                        <input type="text" name="phone_num" class="form-control" placeholder="Phone Number*" maxlength="50" required>
                    </div>
                    <div class="col-lg-12 col-sm-12 box_width2">
                        <input type="email" name="email_id" class="form-control" placeholder="Email Id*" maxlength="50" required>
                    </div>

                    <input type="hidden" name="token_generate" id="token_generate">
                    <!-- <div class="g-recaptcha cl-xl-2 col-lg-6 col-sm-12" data-sitekey="6LfavPwkAAAAALOZTiHMmd2AIdYmItuRFmjaaTr7"></div>-->
                    
                    <div class="col-lg-12 col-sm-12 mt-10">
                        <input type="submit" value="GET ESTIMATE" name="submit" id="query_btn" class="form-control btn">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- form-area-end -->

