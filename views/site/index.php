<?php

/* @var $this yii\web\View */

use kartik\sidenav\SideNav;
use yii\helpers\Url;

$this->title = 'SIMS';
?>
<div class="site-index">

    <div class="jumbotron">

        <p class="lead">Welcome to School Information Management System.</p>

        <!--<p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
    </div>

    <div class="body-content">

        <div class="row">
        <div class="col-lg-4">
        <?php
        echo SideNav::widget([
    'type' => $type,
    'encodeLabels' => false,
    'heading' => $heading,
    'items' => [
        // Important: you need to specify url as 'controller/action',
        // not just as 'controller' even if default action is used.
        ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/site/home', 'type'=>$type]), 'active' => ($item == 'home')],
        ['label' => 'Books', 'icon' => 'book', 'items' => [
            ['label' => '<span class="pull-right badge">10</span> New Arrivals', 'url' => Url::to(['/site/new-arrivals', 'type'=>$type]), 'active' => ($item == 'new-arrivals')],
            ['label' => '<span class="pull-right badge">5</span> Most Popular', 'url' => Url::to(['/site/most-popular', 'type'=>$type]), 'active' => ($item == 'most-popular')],
            ['label' => 'Read Online', 'icon' => 'cloud', 'items' => [
                ['label' => 'Online 1', 'url' => Url::to(['/site/online-1', 'type'=>$type]), 'active' => ($item == 'online-1')],
                ['label' => 'Online 2', 'url' => Url::to(['/site/online-2', 'type'=>$type]), 'active' => ($item == 'online-2')]
            ]],
        ]],
        ['label' => '<span class="pull-right badge">3</span> Categories', 'icon' => 'tags', 'items' => [
            ['label' => 'Fiction', 'url' => Url::to(['/site/fiction', 'type'=>$type]), 'active' => ($item == 'fiction')],
            ['label' => 'Historical', 'url' => Url::to(['/site/historical', 'type'=>$type]), 'active' => ($item == 'historical')],
            ['label' => '<span class="pull-right badge">2</span> Announcements', 'icon' => 'bullhorn', 'items' => [
                ['label' => 'Event 1', 'url' => Url::to(['/site/event-1', 'type'=>$type]), 'active' => ($item == 'event-1')],
                ['label' => 'Event 2', 'url' => Url::to(['/site/event-2', 'type'=>$type]), 'active' => ($item == 'event-2')]
            ]],
        ]],
        ['label' => 'Profile', 'icon' => 'user', 'url' => Url::to(['/site/profile', 'type'=>$type]), 'active' => ($item == 'profile')],
    ],
]);        
        ?>
    </div>
            <div class="col-lg-4">
                <!--<h2>Heading</h2>-->

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <!--<p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>-->
            </div>
            <div class="col-lg-4">
                <!--<h2>Heading</h2>-->

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>-->
            </div>
            <div class="col-lg-4">
                <!--<h2>Heading</h2>-->

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <!--<p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
            </div>
        </div>

    </div>
</div>
