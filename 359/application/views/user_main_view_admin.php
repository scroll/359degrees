<div class="row" style="margin-top: 45px;">  <!--HOME start -->
     <div class="col-md-10  col-md-offset-1" id="home">
        <ol class="breadcrumb">
          <li>HOME</li>
        </ol>
          <?php

          if ($home!='') {
                         foreach($home as $row) { ?>
                                             <form action="<?php echo URL.'index.php/main/savehome/'; ?>" method="post" role="form">
                                             <div class="form-group">
                                                      <textarea class="form-control" name="txt"><?php echo $row->txt;?></textarea>
                                             </div>
                                             <div class="input-group">
                                                      <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                                      <button type="submit" class="btn btn-default">SAVE</button>
                                             </div>
                                            </form>



          <?php } } ?>
     </div>

</div>    <!--HOME this end -->


<div class="row"> <!--WORK start -->
  <div class="col-md-10  col-md-offset-1" data-offset-top="585" style="margin-top: 10px;" id="work">
      <ol class="breadcrumb">
          <li>WORK</li>
       </ol>


          <?php

            if($imagesgalvideo!='') {
              foreach($imagesgalvideo as $row)
              { ?>


                              <div class="col-md-3" style="height: 270px;margin: 0px; padding: 0px;" id="imgid<?php  echo $row->id; ?>">
                                           <button type="button"  onclick="return confirmmsg(<?php echo $row->id; ?>,'video');" class="btn btn-default btn-xs pull-right" style="position: absolute;top:20px; right: 0px;"> <span class="glyphicon glyphicon-remove-circle"></span></button>
                                           <img src="<?php echo URL.'upload/img/'.$row->id.'.jpg'; ?>" alt="<?php echo URL.'upload/img/'.$row->id.'.gif'; ?>" class="img-thumbnail">
                                           <form class="form" role="form" action="<?php echo URL.'index.php/main/updateimgtxt/'; ?>"  method="post" enctype="multipart/form-data" >
                                                 <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                                 <textarea class="form-control" name="txt" ><?php echo $row->txt; ?></textarea>
                                                 <input class="form-control" type="submit" value="update">
                                           </form>
                              </div>


                    <?php
                } ?>

           <?php }  ?>

  </div>
</div>
<div class="row" >
      <div class="col-md-10  col-md-offset-1" style="margin-top: 10px;">
                         <form class="form" role="form" action="<?php echo URL.'index.php/main/upload/'; ?>"  method="post" enctype="multipart/form-data" >
                         <div class="form-group">
                               <input class="form-control" name="image" type="file">
                               <input class="input-group" type="hidden" name="cat" value="2">
                               <input type="hidden" name="type" value="video">
                         </div>
                          <div class="form-group">
                               <input class="form-control" type="text" name="txt" >
                          </div>
                               <button type="submit" value="upload"  class="btn btn-default">UPLOAD</button>
                         </form>
      </div>
      <div class="col-md-10  col-md-offset-1" style="margin-top: 10px;">
        <p class="text-muted">SHOW RESULT</p>  <span id="buttonvidsl" class="glyphicon glyphicon-chevron-down slidevid"></span>
      </div>
</div>
<div class="row" style="display: none;" id="videogalslide">
 <div class="col-md-12" style="background-color: black; padding: 0px;margin-top: 10px;">

          <?php
           if(isset($imagesgalvideo))
           { foreach($imagesgalvideo as $row) { ?>

                                             <img class="videothumb" data-toggle="modal" data-target="#videoModal" data-width="<?php echo $row->width; ?>"
                                              src="<?php echo URL."upload/img/".$row->id.".jpg"; ?>" data-video="<?php echo $row->txt; ?>"
                                              style="margin-left: -4px; ">


          <?php   } }   ?>


   </div>
 </div>
<!-- WORK END-->


<div class="row" id="whoweare">  <!--WHO ARE WE start -->
     <div class="col-md-10  col-md-offset-1" id="whoarewe" style="margin-top: 10px;">
        <ol class="breadcrumb">
          <li>WHO ARE WE</li>
        </ol>

          <?php

          if ($whoarewe!='') {
                         foreach($whoarewe as $row) { ?>

                                   <div class="col-md-12 backtransp" style="padding: 0px;">
                                              <!--IMAGES start-->
                                              <div class="col-md-12" style="height: 5px; background-color: #b3e5fc;; margin-bottom: 5px; margin-top: 5px;"></div>
                                               <h4>post ID<?php echo $row->id; ?></h4>
                                                   <div class="col-md-12" style="padding-bottom: 10px;" >
                                                     <?php

                                                       if($whoareweimg!='') {
                                                         foreach($whoareweimg as $rows)
                                                         {  if($row->id == $rows->postbind) {
                                                                      ?>


                                                                         <div class="col-md-3" style="height: 270px;margin: 0px; padding: 0px;" id="imgid<?php  echo $rows->id; ?>">
                                                                                      <button type="button"  onclick="return confirmmsg(<?php echo $rows->id; ?>,'imagespost');" class="btn btn-default btn-xs pull-right" style="top:0px; right: 0px;"> <span class="glyphicon glyphicon-remove-circle"></span></button>
                                                                                      <img src="<?php echo URL.'upload/img/'.$rows->id.'.jpg'; ?>" alt="<?php echo URL.'upload/img/'.$rows->id.'.gif'; ?>" class="img-thumbnail">
                                                                         </div>


                                                                  <?php
                                                                 }
                                                         } ?>

                                                      <?php }  ?>
                                                   </div>
                                             <!--IMAGES END-->
                                             <!--RICH EDIT START-->
                                              <div class="col-md-12">

                                                           <form class="form"  action="<?php echo URL.'index.php/main/savepost/'; ?>" method="post" role="form">

                                                                    <textarea id="<?php echo $row->id; ?>" class="work" name="txt"><?php echo $row->txt;  ?></textarea>
                                                                    <div class="col-md-6" style="margin-top:5px;">
                                                                                   <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                                                                   <button  type="submit" class="btn btn-default">SAVE</button>
                                                                    </div>
                                                           </form>
                                                           <form class="form"  action="<?php echo URL.'index.php/main/deletepost/'; ?>" method="post" role="form">
                                                            <div class="col-md-6" style="margin-top:5px;">
                                                                                   <button type="submit" onclick="return confirmdia();" class="btn btn-default pull-right">DELETE</button>
                                                                                   <input  type="hidden" name="id" value="<?php echo $row->id; ?>">
                                                             </div>
                                                          </form>
                                              </div>
                                             <!--RICH EDIT END-->
                                   </div>


          <?php } } ?>

     </div>

     <div class="col-md-10  col-md-offset-1">
         <div class="col-md-12" style="height: 5px; background-color: #b3e5fc;; margin-bottom: 5px; margin-top: 5px;"></div>
          <div class="col-md-12 backtransp" style="padding: 0px;">
               <h4>New post</h4>
               <form class="form-inline"  action="<?php echo URL.'index.php/main/savenewpost/'; ?>" method="post" role="form">
                        <textarea class="work" name="txt"></textarea>
                        <div class="col-md-12" style="margin-top:5px;">
                             <input type="hidden" name="cat" value="3">
                             <button  type="submit" class="btn btn-default">NEW</button>
                        </div>
              </form>
              <iframe id="form_target" name="form_target" style="display:none"></iframe>
              <form id="work_form" action="<?php echo URL.'index.php/main/upload/'; ?>" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
                   <input name="image" type="file" onchange="uploadform()">
                   <input type="hidden" name="cat" value="3">
                   <input type="hidden" name="type" value="ajax">
              </form>
          </div>
     </div>
</div>   <!--WHO ARE WE end -->





<div class="row" id="mcontact">  <!--Users start -->
     <div class="col-md-10  col-md-offset-1" id="whoarewe" style="margin-top: 10px;">
        <ol class="breadcrumb">
          <li>USERS</li>
        </ol>
        <div class="well">Use MD5 password</div>
        <?php echo $table; ?>
     </div>
</div>   <!--Users end -->