<?php
use common\helpers\AddonHelper;
use common\helpers\AddonUrl;

$path = AddonHelper::getResourcesUrl();
$this->title = '我的博客';
?>

<div class="w_container">
    <div class="container">
        <div class="row w_main_row">
            <div class="col-lg-9 col-md-9 w_main_left">
                <!--滚动图开始-->
                <div class="panel panel-default">
                    <div id="w_carousel" class="carousel slide w_carousel" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#w_carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#w_carousel" data-slide-to="1"></li>
                            <li data-target="#w_carousel" data-slide-to="2"></li>
                            <li data-target="#w_carousel" data-slide-to="3"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="<?= $path ?>img/slider/slide1.jpg" alt="...">
                                <div class="carousel-caption">
                                    <h3>第一张幻灯片</h3>
                                    <p>RageFrame，一个基于Yii2高级框架的快速开发应用引擎</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="<?= $path ?>img/slider/slide2.jpg" alt="...">
                                <div class="carousel-caption">...</div>
                            </div>
                            <div class="item">
                                <img src="<?= $path ?>img/slider/slide3.jpg" alt="...">
                                <div class="carousel-caption">...</div>
                            </div>
                            <div class="item">
                                <img src="<?= $path ?>img/slider/slide4.jpg" alt="...">
                                <div class="carousel-caption">...</div>
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#w_carousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#w_carousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">推荐文章</h3>
                    </div>
                    <div class="panel-body">
                        <!--文章列表开始-->
                        <div class="contentList">
                            <?php foreach ($articles as $article){ ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="contentleft">
                                        <h4><a class="title" href="<?= AddonUrl::to(['details', 'id' => $article['id']])?>"><?= $article['title']; ?></a></h4>
                                        <p>
                                            <?php if(!empty($article['tags'])){ ?>
                                                <?php foreach ($article['tags'] as $tag){ ?>
                                                    <a class="label label-default"><?= $tag['title']?></a>
                                                <?php } ?>
                                            <?php } ?>
                                        </p>
                                        <p class="overView"><?= $article['description']; ?></p>
                                        <p>
                                            <span class="count"><i class="glyphicon glyphicon-user"></i><a href="#"><?= $article['author']; ?></a></span>
                                            <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:<?= $article['view']; ?></span>
                                            <span class="count"><i class="glyphicon glyphicon-time"></i><?= Yii::$app->formatter->asDate($article['created_at']); ?></span></p>
                                    </div>
                                    <div class="contentImage">
                                        <!--<img src="img/slider/abs_img_no.jpg"/>-->
                                        <div class="row">
                                            <a href="<?= AddonUrl::to(['details', 'id' => $article['id']])?>" class="thumbnail w_thumbnail">
                                                <img src="<?= $article['cover']; ?>" alt="...">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!--文章列表结束-->
                    </div>
                </div>
            </div>
            <!--获取左侧首页推荐-->
            <?= \common\helpers\AddonHook::to('RfArticle', ['position' => 1]); ?>
        </div>
    </div>
</div>