<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Todo Blog</title>
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/font-awesome.min.css" rel="stylesheet">
    <link href="/public/css/main.css" rel="stylesheet">
</head>
<style>
    textarea{outline: none; border:none; resize: none; height: 100%; width: 100%; min-height: 150px}
</style>
<body>
  <header id="header">  

        <!-- topicon -->    
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> 
                </div>
             </div>
        </div>
        
        <!-- navigation -->
        <div class="container">
            <div class="row">
                <div class="pull-left">
                    <a class="navbar-brand" href="/">
                      <h1><img src="/public/images/logo.png" alt="logo"></h1>
                    </a>
                </div>
                <div class="pull-right">
                    <ul class="navi">
                      <?php if(!ss()) :?>
                        <li>
                            <a href="/user/login" title="로그인">
                                로그인
                            </a>
                        </li>
                        <li>
                            <a href="/user/join" title="회원가입">
                                회원가입
                            </a>
                        </li>
                        <?php else : ?>
                        <li>
                            <a href="/user/logout">
                                로그아웃
                            </a>
                        </li>
                        <li>
                            <a href="/blog/myblog" title="내 블로그" target="_blank">
                                내 블로그
                            </a>
                        </li>
                        <li>
                            <a href="/blog/pre" title="블로그관리">
                                블로그관리
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
           </div> 
        </div>
      
    </header>
    
    <!-- visual -->
    <?php if(empty($h)): ?>
    <section id="home-slider">
        <div class="container">
            <div class="row">
                <div class="main-slider">
                    <div class="slide-text">
                        <h1>We Are Creative <br>Web Programers.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
                        <a href="#" class="btn btn-common">SIGN UP</a>
                    </div>
                    <img src="/public/images/home/slider/hill.png" class="slider-hill" alt="slider image">
                    <img src="/public/images/home/slider/house.png" class="slider-house" alt="slider image">
                    <img src="/public/images/home/slider/sun.png" class="slider-sun" alt="slider image">
                    <img src="/public/images/home/slider/birds1.png" class="slider-birds1" alt="slider image">
                    <img src="/public/images/home/slider/birds2.png" class="slider-birds2" alt="slider image">
                </div>
            </div>
        </div>
    </section>
    <?php else : ?>
       <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">
                                <a href="/"><?= $users->nickname ?>의 블로그</a>
                            </h1>
                            <p>
                                <small>Todo Blog of <?= $users->id ?> </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!-- visual -->

    <!-- contents -->
    <section id="contents">
        <div class="container">
            <div class="row">
                <div class="main-content">

                    <!-- content inner -->
                    <section id="projects">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <div class="sidebar portfolio-sidebar">
                                        <div class="sidebar-item categories">
                                            <h3>블로그 메뉴</h3>
                                            <ul class="nav navbar-stacked">
                                                <?php foreach($menus as $key => $v){ ?>
                                                    <li <?= isset($midx)&&$v->idx==$midx? 'class="active"': ""?>><a href="/<?= $id ?>/board/<?= $v->idx ?>/<?=1 ?>"><?=$v->name?><span class="pull-right">(<?= $v->cnt ?>)</span></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
   <?php endif; ?>