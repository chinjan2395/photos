<?php

?>


<div class="jumbotron">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <?php foreach ($model as $test) { ?>
                <div class="col-md-12 col-lg-12 post_block">

                    <div class="col-md-4 col-lg-4" style="padding-left: 0;">
                        <img src="http://photos.com/images/no_image.jpg" style="width: 300px; height: 300px">
                    </div>
                    <div class="col-md-8 col-lg-8 detail_block">

                        <div class="col-md-8 col-lg-8" ><h2><?php echo $test->title?></h2></div>
                        <div class="col-md-3 col-lg-3 date"><a><?php echo $test->date?></a></div>
                        <div class="col-md-12 col-lg-12"><p><?php echo $test->text?></p></div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


