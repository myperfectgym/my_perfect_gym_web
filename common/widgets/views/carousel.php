<!-- START carousel-->
<div id="carousel-example-captions" data-ride="carousel" class="carousel slide">
    <ol class="carousel-indicators">
        <? foreach($photos as $key => $image): ?>
            <li data-target="#carousel-example-captions" data-slide-to="<?= $key?>"
            <? $key == 0 ?  $class = "class='active'" :  $class = "" ?> <?= $class?> ></li>
        <? endforeach ?>
    </ol>
    <div role="listbox" class="carousel-inner">
        <? foreach($photos as $key => $image): ?>
            <? $key == 0 ?  $class = "active" :  $class = "" ?>
            <div class="item <?= $class?>">
                <img src="<?= $image->path?>">
                <div class="carousel-caption">
<!--                    <h3 class="text-white font-600">First slide label</h3>-->
<!--                    <p>-->
<!--                        Nulla vitae elit libero, a pharetra augue mollis interdum.-->
<!--                    </p>-->
                </div>
            </div>
        <? endforeach ?>
    </div>
    <a href="#carousel-example-captions" role="button" data-slide="prev" class="left carousel-control"> <span aria-hidden="true" class="fa fa-angle-left"></span> <span class="sr-only">Previous</span> </a>
    <a href="#carousel-example-captions" role="button" data-slide="next" class="right carousel-control"> <span aria-hidden="true" class="fa fa-angle-right"></span> <span class="sr-only">Next</span> </a>
</div>
<!-- END carousel-->