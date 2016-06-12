<!DOCTYPE html>
<!--This website is made just for fun :p
Fabricated by: Ahmad Ali Abdilah
For Anusha, HAPPY BIRTHDAY!!
Hope you like this small piece of work :D :D
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE= edge">
    <meta name="viewport" content="width-device-width, initial-scale-1"><link href="<?php echo $theme_path;?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $theme_path;?>/css/style.css" rel="stylesheet">
    <link href="css/sequence-theme.card-flip.css">
    <title>Happy Birthday <?php echo $config->birthday_name?></title>
  </head>
  <body id="main">
    <div class="row" id="holder">
      <div class="col-sm-4" id="pics1"><?php $result=getSelectedPictures(1,2); $count=0; while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){$count++?>
        <div class="pic_container col-sm-3"><img src="<?=$row['link']?>" class="img-responsive">
          <div class="pic_shade"></div>
        </div><?php }?>
      </div>
      <div class="col-sm-4" id="wishes">
        <div id="sequence"><a class="seq-next-button seq-next" type="button" aria-label="Next">
<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="16.1 -0.7 60 60" enable-background="new 16.1 -0.7 60 60" role="img" aria-labelledby="title-down-arrow"><title id="title-down-arrow">Down/Next Arrow</title><path d="M46.407 1.399l27.435 27.435-28.213 28.213-27.435-27.435z"/><path fill="#fff" d="M46.1 59.3l-30-30 30-30 30 30-30 30zm-22.9-30l22.9 22.9 22.9-22.9-22.9-22.9-22.9 22.9zM39.278 23.872l11.031 11.031-4.172 4.172-11.031-11.031zM57.172 28.079l-11.031 11.031-4.172-4.172 11.031-11.031z"/></svg>
</a>
          <ul class="seq-canvas"><?php $result=getWishes(); while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){?>
            <li>
              <div class="wish_container">
                <div class="featured_pic"><img src="<?php if ($row['embed']!='') echo 'wishes/embed/'.$row['embed']; else echo 'src/no-image-found.jpg';?>" class="featured_pic"></div>
                <div class="profile_and_wish text-center">
                  <div class="profile_pic_container"><img src="<?php if ($row['author_pic']!='') echo 'wishes/profile/'.$row['author_pic'];else echo 'src/no-image-found.jpg'?>" class="img-circle profile_pic"></div>
                  <h4 class="name_dtl"><strong><?php echo $row['author']?></strong></h4>
                  <p class="wish_dtl"><?php echo $row['wish']?></p>
                </div>
              </div>
            </li><?php }?>
          </ul>
        </div>
      </div>
      <div class="col-sm-4" id="pics2"><?php $result=getSelectedPictures(1,2); $count=0; while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){$count++?>
        <div class="pic_container col-sm-3"><img src="<?=$row['link']?>" class="img-responsive">
          <div class="pic_shade"></div>
        </div><?php }?>
      </div>
    </div>
    <div class="text-center" id="gateway">
      <div style="margin-top:150px"><span id="sentence"></span></div>
    </div><script src="<?php echo $theme_path;?>/js/jquery-2.2.0.min.js"></script>
<script src="<?php echo $theme_path;?>/js/bootstrap.min.js"></script>
    <script src="js/typed.js"></script><script src="<?php echo $theme_path;?>/js/main.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/hammer.min.js"></script>
    <script src="js/sequence.min.js"></script>
    <script src="js/sequence-theme.card-flip.js"></script>
  </body>
</html>