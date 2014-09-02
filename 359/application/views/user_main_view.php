<?php
if(isset($error)){
      echo "<div class='alert alert-danger' onclick='closethis(this);' role='alert'><strong>".$error."</strong></div>";
}
?>
<div class="row" style="" >   <!--HOME this start -->
          <div class="col-md-12" style="padding: 0px;background-color: black; margin-top:  0px;" id="home">
           <?php  if (isset($home)) {
                              foreach($home as $row) {
                                                       echo $row->txt;
                                                     }
                              } ?>
          </div>
</div>  <!--HOME end -->

      <!--WORK START -->

<div class="row" id="work"   >
 <div class="col-md-12" style="background-color: black; padding-left: 4px;margin-top: 0px;">

          <?php
           if(isset($imagesgalvideo))
           { foreach($imagesgalvideo as $row) { ?>

                                             <img class="videothumb" data-toggle="modal" data-target="#videoModal" data-width="<?php echo $row->width; ?>"
                                              src="<?php echo URL."upload/img/".$row->id.".jpg"; ?>" data-video="<?php echo $row->txt; ?>"
                                              style="margin-left: -4px; ">


          <?php   } }   ?>


   </div>
 </div>

     <!--WORK END -->


<div class="row" id="whoweare" >  <!--WHO ARE WE start -->
          <div class="col-md-12 transp" id="myabout" style="">
                <?php

                    if ($whoarewe!='') {
                                   foreach($whoarewe as $row) { ?>

                                        <div class="col-md-10  col-md-offset-1">
                                                           <textarea class="work" name="txt"><?php echo $row->txt;  ?></textarea>
                                        </div>


               <?php } } ?>
          </div>
</div> <!--WHO ARE WE END -->


<div class="row"> <!--CONTACT start -->
     <div class="col-md-12 transp" id="mcontact">
               <div class="col-md-8  col-md-offset-2" id="contact">
                    <div class="col-md-12 ">
                               <div class="col-md-10  col-md-offset-2 footertxt">
                               SEND US MESSAGE
                               </div>

                    </div>
                    <div class="col-md-12" id="validatemsg" onclick="closethis(this);" style="display: none;"></div>
                    <div class="col-md-6">
                                        <div class="col-md-6 footerpn">
                                         ++359.898.806.242
                                         </div>
                                        <form method="post" action="" class="form-horizontal" role="form">
                                        <div class="form-group">

                                          <div class="col-sm-12">
                                            <input type="email" name="email" class="form-control" id="inputemail" placeholder="Email">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                         <div class="col-sm-12">
                                            <input type="text"  name="name" class="form-control" id="inputname" placeholder="Name">
                                          </div>
                                        </div>
                                        <div class="form-group">

                                          <div class="col-sm-12">

                                    <a href="#contact" onclick="document.getElementById('captcha').src='<?php echo LIB; ?>captcha.php?'+Math.random();" >
                                    <img src="<?php echo LIB; ?>captcha.php" id="captcha" />
                                    </a>

                                             <input type="text" name="captcha" id="captcha-form" autocomplete="off" class="form-control"  placeholder="Capcha">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                         <div class="col-sm-12">
                                            <input type="button" onclick="submitmsg();" value="SEND" class="btn btn-default form-control footerbtn" >
                                          </div>
                                        </div>
                     </div>
                      <div class="col-md-6">
                                <div class="col-md-6 footerpn">
                                       info@359degrees.pro
                                </div>
                                <div class="form-group">
                                               <div class="col-sm-12" style="padding: 0px;">
                                                 <textarea name="msg" class="form-control" placeholder="Your message"></textarea>
                                               </div>
                                </div>

                      </div>


                       </form>

              </div>   <!--CONTACT end -->
     </div>
</div>