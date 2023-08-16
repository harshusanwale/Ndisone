<?php

include "header.php";

?>

<style>

body{background-color:#e8ecf0}

.ind2-home{float:left;width:100%;/*background:url(images/ex2.jpg) no-repeat;*/position:relative;padding:80px 0 0;background-size:100%;background-position:0 50px; background-color: #FFF; /*margin-top: 77px;*/}

/*.ind2-home:before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #000000b0;
    background: -webkit-linear-gradient(to right,#2f80eddb,#27f19dd9);
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
}*/
.ban-search ul li input[type="submit"]:hover {
    background: #61ab26;
}

.news-top-menu{position:absolute;top:22px;left:0;right:0;z-index:10;background:#616161}

.news-hban-box .im img{height:400px}

.news-menu ul li a{color:#fff;font-size:12px;font-weight:500;border-bottom:2px solid #616161}

.news-menu ul li a.act{border-bottom:2px solid #2d344d;background:#434859}

.news-menu ul li a:hover{border-bottom:2px solid #323232;background:#575757}

    .land-pack-grid, .land-pack-grid-img img, .land-pack-grid-text{border-radius: 15px;}

.hom-top{transition:all .5s ease;background:#FFF;    padding-bottom: 2px;}

/* .hom-head{background:#f4f4f4 url(images/bgIcons.png) repeat!important} */

.top-ser,.ban-ql, .mob-app{display:none}

.dmact .top-ser{display:block}

.caro-home{margin-top:90px;float:left;width:100%}

.carousel-item:before{background:none}

.hom-head{padding:140px 0 70px;margin-bottom:0}

.ban-search{background:none;padding:0;border-radius:50px; border-top-left-radius: 0;
    border-bottom-left-radius: 0px;   padding-bottom: 90px;}

.ban-search ul li.sr-cit{display:block;width:25%}

.ban-search ul li.sr-sea{width:54%;margin:0 1%}

.ban-search ul li.sr-btn{width:19%}

.ban-search ul li input{border-radius:5px}

.ban-search ul li input[type="submit"]{padding:5px;border-radius:5px; border-top-left-radius: 0;
    border-bottom-left-radius: 0px;background:#45bd14}

.hom-head:before{background:#ffffff14}

.hom-head:after{display:none}

.ban-tit h1{font-weight:500;color:#000;text-shadow:none}

.ban-tit h1 b{padding-bottom:15px;color:#79057b;text-shadow:none}

.h2-ban-ql ul li div{border:1px solid #d9d9da;background:#fff}

.h2-ban-ql ul li div h5{font-weight:500;color:#383942}

.h2-ban-ql ul li div h5 span{font-weight:700}

.home-tit h2{font-weight:400;}

.home-tit h2 span{font-weight:700}

.h2-ban-ql ul li div:hover{background:#d3f0fb;box-shadow:0 14px 22px -13px #0b1017ba}

.land-pack-grid-text{position:relative;-webkit-transition:all .5s ease;-moz-transition:all .5s ease;-o-transition:all .5s ease;transition:all .5s ease;position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%;z-index:2;background:linear-gradient(to top,#000000c7,#00000008)}

.land-pack-grid-text h4{padding:15px;font-size:16px;font-weight:400;text-align:center;bottom:0;position:absolute;width:100%;text-align:center;color:#fff}

.land-pack-grid-text h4 .dir-ho-cat{color:#f6f7f9;font-size:11px;position:relative;width:100%;display:inline-block}

.land-pack-grid-img{background:#333}

.home-tit{padding-top:60px}

    .news-hom-ban-sli{margin-bottom: 30px;}

.pri {padding: 75px 0 60px 0;background: #e8ecf0;}

.hom2-hom-ban{float:left;width:46%;background-size:cover;margin:0 2%;background:#e6f6fb;padding:30px 100px 30px 30px;border-radius:5px;position:relative;}

.hom2-hom-ban:hover a{background:#d6c607}

.hom2-hom-ban h2{font-weight:600;font-size:25px;padding-bottom:5px}

.hom2-hom-ban p{font-size:14px}

.hom2-hom-ban a{background:#21d78d;color:#fff;padding:10px 20px;border-radius:5px;display:inline-block;cursor:pointer;font-size:13px;font-weight:400}

.hom2-hom-ban p,.hom2-hom-ban h2,.hom2-hom-ban a{position:relative;color:#fff}

.hom2-hom-ban:before{content:'';position:absolute;width:100%;height:100%;left:0;top:0;right:0;bottom:0;z-index:0;opacity:.8;background:#24C6DC;border-radius:5px}

.hom2-hom-ban1:before{background-image:linear-gradient(140deg,#0c7ada 0%,#0761af 50%,#0f243e94 75%)}

.hom2-hom-ban2:before{background-image:linear-gradient(140deg,#768404 0%,#768404 50%,#0f243e94 75%)}

.hom2-hom-ban1{background-image:url(images/home2-hand.jpg)}

.hom2-hom-ban2{background-image:url(images/home2-work.jpg)}

.hom2-hom-ban-main{float:left;width:100%;padding-bottom:70px}

.hom2-cus-sli{float:left;width:100%}

.hom2-cus-sli ul li{float:left;width:25%;padding:12px 20px}

.testmo{width:100%;background:#fff;box-shadow:0 1px 7px -3px #161d2926;border-radius:5px;padding:30px;position:relative}

.testmo img{width:64px;height:64px;border-radius:50px;object-fit:cover;margin:-80px 0 0}

.testmo h4{font-size:14px;font-weight:600;margin-bottom:2px;font-family:'Poppins',sans-serif}

.testmo span{font-size:11px;font-weight:400;color:#727688}

.testmo span a{font-weight:500;color:#4caf50;display:block;font-size:12px}

.testmo p{color:#727688;font-size:12px;line-height:20px;margin:0;font-weight:400;height:58px;overflow:hidden;border-top:1px solid #f1eeee;padding-top:15px;margin-top:15px}

.testmo p:before{content:'format_quote';font-size:21px;margin:-25px 0 0;background:#fff}

.hom2-cus{background:#e8ecf0;padding-bottom:70px}

.testmo .rat{padding:2px 2px 2px 10px;display:inline-block;position:absolute;right:30px;top:52px}

.testmo .rat i{color:#FF9800;font-size:17px;width:12px}

.hom2-cus-sli ul{position:relative;overflow:hidden;padding:20px 20px 0}

.slick-arrow{width:50px;height:50px;border-radius:50px;background:#fff;border:1px solid #ededed;color:#ffffff03;position:absolute;z-index:9;top:38%}

.slick-arrow:before{content:'chevron_left';font-size:27px;top:4px;left:9px}

.slick-prev{left:14px}

.slick-next{right:14px}

.slick-next:before{content:'chevron_right';font-size:27px}

.hom4-prop-box{padding:0;background:#fff;box-shadow:0 1px 14px -4px #161d2926;border:1px solid #efefef}

.hom4-prop-box img{width:100%;border-radius:2px;margin:0;height:120px}

.hom4-prop-box div{padding:25px}

.hom4-prop-box .rat{position:relative;top:initial;right:initial;padding:2px 2px 2px 0;display:block;margin:0;height:17px;left:-2px}

.hom4-fea{padding-bottom:40px}

.hom4-fea .hom2-cus-sli ul li{padding:12px 20px}

.hom4-fea .home-tit{margin-bottom: 0px;padding-top: 70px;}

@media screen and (max-width:992px) {

.hom2-hom-ban{width:100%;margin:20px 0}

}

@media screen and (max-width:767px) {

.ban-tit h1 b{font-size:32px;line-height:38px}

    .ind2-home{padding-top: 120px;}

    .ban-search ul li{width:100% !important;margin:0 0 10px 0 !important;}

    .ban-tit{padding-bottom: 30px;}

}

@media screen and (max-width:550px) {

.hom-head .ban-search ul li{width:100%;margin:0 0 15px}

}

</style>


<style type="text/css">



ul{
    list-style:none;
    margin: 0;
    padding: 0;
}
a, a:hover, a.active, a:active, a:visited, a:focus{
    color:#fefefe;
    text-decoration:none;
}
.content{
    margin: 50px 100px 0px 100px;
}

.exo-menu{
    width: 100%;
    float: left;
    list-style: none;
    position:relative;
    background: #FFF;
}
.menu h4 {
    color: #202020;
    }
/*.dmact h4{
color: #FFF;
}
.dmact .bl li a{
color: #FFF !important;
}*/
.menu {
  margin-top: 20px;
    }
    .hom-nav .bl {
    padding-top: 20px;
}
.top-ser {

    padding: 15px 0px 0px 40px;
}
.dmact .menu:after {
    color: #202020;
    right: -16px;
    top: 9px;
    width: 10px;
    height: 10px;
    filter: invert(1);
}
    .menu:after {
    color: #202020;
    right: -16px;
    top: 9px;
    width: 10px;
    height: 10px;
    filter: inherit;
}
.hom-top {
    transition: all 0.5s ease;
    padding: 4px 1px 11px 1px !important;
    border-bottom: 1px solid #e9e9e9;
    }
.exo-menu > li {    display: inline-block;float:left;margin-right: 1px;}
.exo-menu > li > a{
    color: #000;
    text-decoration: none;
    text-transform: capitalize;
   /* border-right: 1px #365670 dotted;*/
    -webkit-transition: color 0.2s linear, background 0.2s linear;
    -moz-transition: color 0.2s linear, background 0.2s linear;
    -o-transition: color 0.2s linear, background 0.2s linear;
    transition: color 0.2s linear, background 0.2s linear;
}
.exo-menu > li > a.active,
.exo-menu > li > a:hover,
li.drop-down ul > li > a:hover{
    background:#79057b;
    color:#fff;
}

.menu{
    display: none;
}
.exo-menu i {
  float: left;
  font-size: 18px;
  margin-right: 6px;
  line-height: 20px !important;
}
li.drop-down,
.flyout-right,
.flyout-left{position:relative;}
li.drop-down:before {
  /*content: "\f103";*/
  color: #fff;
  font-family: FontAwesome;
  font-style: normal;
  display: inline;
  position: absolute;
  right: 6px;
  top: 20px;
  font-size: 14px;
}
li.drop-down>ul{
    left: 0px;
    min-width: 230px;

}
.drop-down-ul{display:none;}
.flyout-right>ul,
.flyout-left>ul{
  top: 0;
  min-width: 230px;
  display: none;
  border-left: 1px dotted #91439f;
  }

li.drop-down>ul>li>a,
.flyout-right ul>li>a ,
.flyout-left ul>li>a {
    color: #fff;
    display: block;
    font-size: 14px;
    padding: 10px 11px;
    text-decoration: none;
      background-color: #79057b;
    border-bottom: 1px dotted #7d397e;
    -webkit-transition: color 0.2s linear, background 0.2s linear;
    -moz-transition: color 0.2s linear, background 0.2s linear;
    -o-transition: color 0.2s linear, background 0.2s linear;
    transition: color 0.2s linear, background 0.2s linear;
}
.flyout-right ul>li>a ,
.flyout-left ul>li>a {
    border-bottom: 1px dotted #7d397e;
}


/*Flyout Mega*/
.flyout-mega-wrap {
    top: 0;
    right: 0;
    left: 100%;
    width: 100%;
    display:none;
    height: 100%;
    padding: 15px;
    min-width: 742px;

}
h4.row.mega-title {
  color:#eee;
  margin-top: 0px;
  font-size: 14px;
  padding-left: 15px;
  padding-bottom: 13px;
  text-transform: uppercase;
  border-bottom: 1px solid #ccc;
 }
.flyout-mega ul > li > a {
  font-size: 90%;
  line-height: 25px;
  color: #fff;
  font-family: inherit;
}
.flyout-mega ul > li > a:hover,
.flyout-mega ul > li > a:active,
.flyout-mega ul > li > a:focus{
  text-decoration: none;
  background-color: transparent !important;
  color: #ccc !important
}
/*mega menu*/

.hom-nav .bl li:last-child a {
    color: #fff;
    border-radius: 5px;
    margin-left: 10px;
    padding: 5px 15px;
    background: #45bd14;
    border: 1px solid #45bd14;
}

.hom-nav .bl li:last-child a:hover {
   background: #266e07;
    border: 1px solid #469f20;
}

.mega-menu {
  left: 0;
  right: 0;
  padding: 15px;
  display:none;
  padding-top: 0;
  min-height: 100%;

}
h4.row.mega-title {
  color: #eee;
  margin-top: 0px;
  font-size: 14px;
  padding-left: 15px;
  padding-bottom: 13px;
  text-transform: uppercase;
  border-bottom: 1px solid #547787;
  padding-top: 15px;
  background-color: #365670
  }
 .mega-menu ul li a {
  line-height: 25px;
  font-size: 90%;
  display: block;
}
ul.stander li a {
    padding: 3px 0px;
}

ul.description li {
    padding-bottom: 12px;
    line-height: 8px;
}

ul.description li span {
    color: #ccc;
    font-size: 85%;
}
a.view-more{
  border-radius: 1px;
  margin-top:15px;
  background-color: #009FE1;
  padding: 2px 10px !important;
  line-height: 21px !important;
  display: inline-block !important;
}
a.view-more:hover{
    color:#fff;
    background:#0DADEF;
}
ul.icon-des li a i {
    color: #fff;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    text-align: center;
    background-color: #009FE1;
    line-height: 35px !important;
}

ul.icon-des li {
    width: 100%;
    display: table;
    margin-bottom: 11px;
}
/*Blog DropDown*/
.Blog{
    left:0;
    display:none;
    color:#fefefe;
    padding-top:15px;
    background:#547787;
    padding-bottom:15px;
}
.Blog .blog-title{
    color:#fff;
    font-size:15px;
    text-transform:uppercase;

}
.Blog .blog-des{
    color:#ccc;
    font-size:90%;
    margin-top:15px;
}
.Blog a.view-more{
    margin-top:0px;
}
/*Images*/
.Images{
    left:0;
   width:100%;
     display:none;
    color:#fefefe;
    padding-top:15px;
    background:#547787;
    padding-bottom:15px;
}
.Images h4 {
  font-size: 15px;
  margin-top: 0px;
  text-transform: uppercase;
}
/*common*/
.flyout-right ul>li>a ,
.flyout-left ul>li>a,
.flyout-mega-wrap,
.mega-menu{
    background-color: #79057b;
}

/*hover*/
.Blog:hover,
.Images:hover,
.mega-menu:hover,
.drop-down-ul:hover,
li.flyout-left>ul:hover,
li.flyout-right>ul:hover,
.flyout-mega-wrap:hover,
li.flyout-left a:hover +ul,
li.flyout-right a:hover +ul,
.blog-drop-down >a:hover+.Blog,
li.drop-down>a:hover +.drop-down-ul,
.images-drop-down>a:hover +.Images,
.mega-drop-down a:hover+.mega-menu,
li.flyout-mega>a:hover +.flyout-mega-wrap{
    display:block;
}
/*responsive*/
 @media (min-width:767px){

.exo-menu > li > a {
    display: block;
    padding: 9px 10px;
    font-size: 15px;
    font-weight: 500;
  /*  color: #FFF !important;*/
}

.mega-menu, .flyout-mega-wrap, .Images, .Blog,.flyout-right>ul,
.flyout-left>ul, li.drop-down>ul{
        position:absolute;
}
 .flyout-right>ul{
    left: 100%;
    }
    .flyout-left>ul{
    right: 100%;
}
 }

@media (max-width:767px){

    .exo-menu {
        min-height: 58px;
        background-color: #8559a5;
        width: 100%;
    }

    .exo-menu > li > a{
        width:100% ;
        display:none ;

    }
    .exo-menu > li{
        width:100%;
    }
    .display.exo-menu > li > a{
      display:block ;
        padding: 20px 22px;
    }

.mega-menu, .Images, .Blog,.flyout-right>ul,
.flyout-left>ul, li.drop-down>ul{
        position:relative;
}

}
a.toggle-menu{
    position: absolute;
    right: 0px;
    padding: 20px;
    font-size: 27px;
    background-color: #ccc;
    color: #23364B;
    top: 0px;
}
.bg-color{
    background: #000000 !important;

}

.hom-nav .bl li a {
    color: #000;

    }

.home-tit p{
    display: none;
}

@media only screen and (min-width: 768px) and (max-width: 3500px) {
.navbar-toggler.mob-le{
    display: none;
}
}
.ban-short-links ul li div h4 {
    color: #000;
    }
  @media only screen and (min-width: 320px) and (max-width: 767px) {
.ban-tit h1 b span i{
bottom: -21px;
}
.hom-nav {
    width: 100%;
    float: left;
    padding: 1px 36px 1px 1px !important;
}
.ban-short-links ul li div h4 {
    color: #000;
    }
.ban-search.ban-sear-all li.sr-cate select {
    border-radius: 10px 10px 10px 10px;
}
.ban-search.ban-sear-all li.sr-cit select {
    border-radius: 10px 10px 10px 10px;
}
.mainmenu .collapse ul ul, .mainmenu .collapse ul ul.dropdown-menu {
    background: #79057b;
    width: 100%;
}
.navbar-toggler.mob-le{
    display: block;
    top: 6px;
}
.menu-area{
    box-shadow: none;
    padding: 0px;
}

.right-megan{
    justify-content: right !important;
}
a.toggle-menu {
    position: absolute;
    right: 15px;
    padding: 2px 10px;
    font-size: 21px;
    background-color: #ccc;
    color: #23364B;
    top: 12px;
}
.d-fles-bar ul li img {
    width: 13px !important;
    float: right;
}

li.drop-down>ul>li>a, .flyout-right ul>li>a, .flyout-left ul>li>a {
    color: #fff;
    display: block;
    font-size: 14px;
    padding: 11px 28px !important;
    }

.mobile-view{
    margin: inherit !important;
}
.content{
  margin: inherit !important;
}
.d-fles-bar{
    display: inherit !important;
    justify-content: right !important;
}
.hom-top {
    display: block  !important;
    background: #FFF !important;
    padding: 0px 7px  !important;
    height: 70px  !important;
}
ul.sda-space li a {
    padding-left: 42px !important;
}

.display.exo-menu > li > a {
    display: block;
    padding: 11px 22px;
    color: #FFF;
}
}

 /*@media only screen and (min-width: 769px) and (max-width: 3000px) {
.mobile-menu{
    display: none;
}
 }


 @media only screen and (min-width: 320px) and (max-width: 768px) {

.menu-custm{
display: none !important;
}

}*/

 @media only screen and (min-width: 768px) and (max-width: 3500px) {
a.toggle-menu{
display: none;
}

}




.mobile-view{
    margin:11px 3px 8px 4px;
}
.d-fles-bar {
    display: flex;
    margin: auto;
     justify-content: center;
    position: fixed;
    width: 100%;
    background: #FFF;
    padding-left: 14px;
 background: #FFF;
 box-shadow: 5px 2px 11px #e7e7e7ba;
}

.d-fles-bar ul li img{
    width: 6px;
}

/***********mobile menu css*************/

.mobile-menu a {
    color: #000;
    font-size: 18px;
}

.mobile-menu .card{
border: 1px solid #FFF;
}

</style>


<!-- START -->


<section class="news-top-menu bg-color">

   <!--  <div class="container">

        <div class="row">

            <div class="news-menu">

                <ul>

                    <li><a href="index" class="act">Home</a></li>

                    <li><a href="all-category">All Services</a></li>

                    <li><a href="service-experts">Service Expert</a></li>

                    <li><a href="jobs">Jobs</a></li>

                    <li><a href="news">News</a></li>

                    <li><a href="all-products">Products</a></li>

                    <li><a href="events">Events</a></li>

                    <li><a href="coupons">Coupons</a></li>

                    <li><a href="blog-posts">Blogs</a></li>

                    <li><a href="community">Community</a></li>

                </ul>

            </div>

        </div>

    </div>
 -->

<div id="menu_area" class="menu-area">
      <button class="navbar-toggler mob-le" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <img src="images/icon/menua.png" width="20">
                </button>
            <nav class="navbar navbar-light navbar-expand-lg mainmenu">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="active"><a href="#">Home </a></li>


                           <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Participants</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="#">Post your Service Request !</a></li>
                            </ul>
                        </li>

                            <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Service Providers</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="#">NDIS Registered Providers</a></li>
                            <li><a href="#">Unregistered Providers</a></li>

                            </ul>
                        </li>



                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accessible Housing</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="#">Accessible Rental Property</a></li>
                             <li class="dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SDA</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="#">Improved Liveability</a></li>
                                <li><a href="#">Fully Accessible</a></li>
                                <li><a href="#">Robust</a></li>
                                 <li><a href="#">High Physical Support</a></li>

                                </ul>
                            </li>
                            <li><a href="#">MTA</a></li>
                            <li><a href="#">STA/Respite</a></li>
                            <li><a href="#">Accessible Holiday Destination</a></li>
                            <li><a href="#">NDIS Property for Sale</a></li>
                            <li><a href="#">Home Modification</a></li>


                            </ul>
                        </li>



                           <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Find Supports</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="#">Support Workers</a></li>
                            <li><a href="#">Support Coordinators</a></li>
                            <li><a href="#">Plan Managers</a></li>
                            <li><a href="#">Psycho- Social Recovery Coach</a></li>
                            <li><a href="#">Advocacy and Support Orgnisation</a></li>
                           </ul>
                        </li>

                              <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Job</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="#">Job Vacancy</a></li>
                            <li><a href="#">Looking for Work !</a></li>
                           </ul>
                        </li>
                              <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Market Place</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Consumable for Sale</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="#">Art/Crafts products for sale</a></li>
                                <li><a href="#">Clothing</a></li>
                                </ul>
                            </li>

                              <li><a href="#">Modified Vehicle for Sale</a></li>
                           </ul>
                        </li>


                      <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">NDIS Service Experts</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="#">NDIS Consultants</a></li>
                            <li><a href="#">NDIS Digital Marketing</a></li>
                            <li><a href="#">NDIS Certification Bodies / Auditors</a></li>
                            <li><a href="#">NDIS Education and Training</a></li>
                            <li><a href="#">NDIS Lawyers</a></li>
                            <li><a href="#">NDIS Business Accountants</a></li>
                           </ul>
                        </li>

                    <li class=""><a href="#">Events </a></li>
                       <li class=""><a href="#">Blogs </a></li>
                          <li class=""><a href="#">News </a></li>



                    </ul>
                </div>
            </nav>
        </div>




<!-- <div class="menu-custm right-megan d-fles-bar">
     <div class="content mobile-view" >

        <ul class="exo-menu">
            <li><a class="active" href="#">Home</a></li>



            <li class="drop-down exo-menu-bar collapsed" data-toggle="collapse" href="#collapseOne"><a href="#">Participants <img src="https://ndisone.com.au/development/images/downchave.png" width="10"></a>
                 <ul class="drop-down-ul animated fadeIn collapse" id="collapseOne" data-parent="#accordion">

                 <li><a href="#">Post your Service Request !</a></li>

                </ul>

            </li>

               <li class="drop-down"><a href="#">Service Providers <img src="https://ndisone.com.au/development/images/downchave.png" width="10"></a>
                 <ul class="drop-down-ul animated fadeIn">
                <li class="flyout-right"><a href="#">NDIS Registered Providers</a>
                </li>
                 <li><a href="#">Unregistered Provider</a></li>

                </ul>


            </li>




                <li class="drop-down"><a href="#"> Accessible Housing <img src="https://ndisone.com.au/development/images/downchave.png" width="10"></a>

                <ul class="drop-down-ul animated fadeIn">
                       <li><a href="#">Accessible Rental Property</a></li>
                <li class="flyout-right"><a href="#">SDA <i style="float: right;"> <img src="https://ndisone.com.au/development/images/right-cav.png" width="6"> </i></a>
                    <ul class="animated fadeIn sda-space">
                        <li><a href="#">Improved Liveability </a></li>
                        <li><a href="#">Fully Accessible</a></li>
                        <li><a href="#">Robust</a></li>
                        <li><a href="#">High Physical Support</a></li>
                    </ul>
                </li>
                <li><a href="#">MTA</a></li>
                 <li><a href="#">STA/Respite</a></li>
                  <li><a href="#">Accessible Holiday Destination</a></li>
                   <li><a href="#">NDIS Property for Sale</a></li>
                   <li><a href="#">Home Modification</a></li>


                </ul>


            </li>

               <li class="drop-down"><a href="#">Find Supports <img src="https://ndisone.com.au/development/images/downchave.png" width="10"></a>
                <ul class="drop-down-ul animated fadeIn">
                <li class="flyout-right"><a href="#">Support Workers</a>
                </li>
                <li><a href="#">Support Coordinators</a></li>
                 <li><a href="#">Plan Managers</a></li>
                  <li><a href="#">Psycho- Social Recovery Coach</a></li>
                  <li><a href="#">Advocacy and Support Orgnisation</a></li>


                </ul>


            </li>

              <li class="drop-down"><a href="#">Job <img src="https://ndisone.com.au/development/images/downchave.png" width="10"></a>
                 <ul class="drop-down-ul animated fadeIn">
                <li class="flyout-right"><a href="#">Job Vacancy</a>
                </li>
                 <li><a href="#">Looking for Work !</a></li>


                </ul>

            </li>



    <li class="drop-down"><a href="#"> Market Place <img src="https://ndisone.com.au/development/images/downchave.png" width="10"></a>
                 <ul class="drop-down-ul animated fadeIn">

                <li class="flyout-right"><a href="#">Consumables for Sale <i style="float: right;"> <img src="https://ndisone.com.au/development/images/right-cav.png" width="6"> </i></a>
                    <ul class="animated fadeIn sda-space">
                        <li><a href="#">Art/Crafts products for sale</a></li>
                        <li><a href="#">Clothing</a></li>

                    </ul>
                </li>
                <li><a href="#">Modified Vehicle for Sale</a></li>




                </ul>
               </li>





               <li class="drop-down"><a href="#">NDIS Service Experts <img src="https://ndisone.com.au/development/images/downchave.png" width="10"></a>

                <ul class="drop-down-ul animated fadeIn">
                       <li><a href="#">NDIS Consultants</a></li>
                <li class="flyout-right"><a href="#">NDIS Certification Bodies / Auditors</a>
                       <li><a href="#">NDIS Education and Training</a></li>
                        <li><a href="#">NDIS Lawyers</a></li>
                        <li><a href="#">NDIS Business Accountants</a></li>


                </li>


                </ul>

            </li>



               <li><a href="#"> Events</a></li>
                <li><a href="#"> Blogs</a></li>
                 <li><a href="#"> News</a></li>


                <a href="#" class="toggle-menu visible-xs-block">|||</a>

    </ul>


     </div>

</div>
 -->




<!--
<div class="mobile-menu-bar">


  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    <img src="images/icon/menua.png" width="30">
  </a>


<div class="collapse" id="collapseExample">
  <div class="card card-body">
   <div class="mobile-menu">

<div id="accordion">

 <div class="card">
    <div class="card-header" id="heading-3f">
      <h5  class="collapsed" role="button" data-toggle="collapse" href="#collapse-3f" aria-expanded="false" aria-controls="collapse-3f">
        <a href="#">
          Home
        </a>
      </h5>
    </div>

  </div>

<div class="card">
    <div class="card-header" id="heading-3">
      <h5  class="collapsed" role="button" data-toggle="collapse" href="#collapse-3a" aria-expanded="false" aria-controls="collapse-3a">
        <a href="#">
         Participants
        </a>
      </h5>
    </div>
    <div id="collapse-3a" class="collapse" data-parent="#accordion" aria-labelledby="heading-3a">
      <div class="card-body">
      Post your Service Request !
      </div>
    </div>
  </div>



    <div class="card">
    <div class="card-header" id="heading-3e">
      <h5  class="collapsed" role="button" data-toggle="collapse" href="#collapse-3e" aria-expanded="false" aria-controls="collapse-3e">
        <a href="#">
         Service Providers
        </a>
      </h5>
    </div>
    <div id="collapse-3e" class="collapse" data-parent="#accordion" aria-labelledby="heading-3e">
      <div class="card-body">
        <h5>
        <a href="#">
        NDIS Registered Providers
        </a></h5>
     <h5>
        <a href="#">
         Unregistered Providers
        </a></h5>
          </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="heading-1">
      <h5 class="mb-0">
        <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
        Accessible Housing
        </a>
      </h5>
    </div>
    <div id="collapse-1" class="collapse" data-parent="#accordion" aria-labelledby="heading-1">
      <div class="card-body">

        <div id="accordion-1">
          <div class="card">
    <div class="card-header" id="heading-1-1">
              <h5 class="mb-0">
                <a c href="#">
                   Accessible Rental Property
                </a>
              </h5>
            </div>


            <div class="card-header" id="heading-1-1">
              <h5 class="mb-0">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1">
                    SDA
                </a>
              </h5>
            </div>
            <div id="collapse-1-1" class="collapse" data-parent="#accordion-1" aria-labelledby="heading-1-1">
              <div class="card-body">

                  <div id="accordion-1-1">
                    <div class="card">
                      <div class="card-header" id="heading-1-1-1">
                         <h5 class="mb-0">
                          <a class="" href="#">
                         Improved Liveability
                          </a>
                        </h5>

                      </div>

                    </div>
                    <div class="card">
                      <div class="card-header" id="heading-1-1-2">
                        <h5 class="mb-0">
                          <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1-2" aria-expanded="false" aria-controls="collapse-1-1-2">
                         Fully Accessible
                          </a>
                        </h5>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="heading-1-1-3">
                        <h5 class="mb-0">
                          <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1-3" aria-expanded="false" aria-controls="collapse-1-1-3">
                           Robust
                          </a>
                        </h5>
                      </div>

                    </div>
                     <div class="card">
                      <div class="card-header" id="heading-1-1-3">
                        <h5 class="mb-0">
                          <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1-3" aria-expanded="false" aria-controls="collapse-1-1-3">
                       High Physical Support
                          </a>
                        </h5>
                      </div>

                    </div>
                  </div>

              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading-1-2">
              <h5 class="mb-0">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                 MTA
                </a>
              </h5>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="heading-1-2">
              <h5 class="mb-0">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
               STA/Respite
                </a>
              </h5>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="heading-1-2">
              <h5 class="mb-0">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                Accessible Holiday Destination
                </a>
              </h5>
            </div>
          </div>
              <div class="card">
            <div class="card-header" id="heading-1-2">
              <h5 class="mb-0">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                NDIS Property for Sale
                </a>
              </h5>
            </div>
          </div>
              <div class="card">
            <div class="card-header" id="heading-1-2">
              <h5 class="mb-0">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
               Home Modification
                </a>
              </h5>
            </div>
          </div>



        </div>

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="heading-2">
      <h5 class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
        <a >
         Find Supports
        </a>
      </h5>
    </div>
    <div id="collapse-2" class="collapse" data-parent="#accordion" aria-labelledby="heading-2">
      <div class="card-body">
        Text 2
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="heading-3">
      <h5  class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
        <a href="#">
          Item 3
        </a>
      </h5>
    </div>
    <div id="collapse-3" class="collapse" data-parent="#accordion" aria-labelledby="heading-3">
      <div class="card-body">
        Text 3
      </div>
    </div>
  </div>



   <div class="card">
    <div class="card-header" id="heading-3b">
      <h5  class="collapsed" role="button" data-toggle="collapse" href="#collapse-3b" aria-expanded="false" aria-controls="collapse-3b">
        <a href="#">
          Item 3
        </a>
      </h5>
    </div>
    <div id="collapse-3b" class="collapse" data-parent="#accordion" aria-labelledby="heading-3">
      <div class="card-body">
        Text 3sdsadsad
      </div>
    </div>
  </div>
   <div class="card">
    <div class="card-header" id="heading-3c">
      <h5  class="collapsed" role="button" data-toggle="collapse" href="#collapse-3c" aria-expanded="false" aria-controls="collapse-3c">
        <a href="#">
          Item 3
        </a>
      </h5>
    </div>
    <div id="collapse-3c" class="collapse" data-parent="#accordion" aria-labelledby="heading-3c">
      <div class="card-body">
        Text 3sdasdasdsadad
      </div>
    </div>
  </div>
   <div class="card">
    <div class="card-header" id="heading-3d">
      <h5  class="collapsed" role="button" data-toggle="collapse" href="#collapse-3d" aria-expanded="false" aria-controls="collapse-3d">
        <a href="#">
          Item 3bbbbbbbbb
        </a>
      </h5>
    </div>
    <div id="collapse-3d" class="collapse" data-parent="#accordion" aria-labelledby="heading-3d">
      <div class="card-body">
        Text 3
      </div>
    </div>
  </div>


</div>
</div>
</div>
  </div>
</div>
 -->



</section>

<!--END-->



<!-- START -->

<section>

    <div>

        <div class="container">

            <div class="row">

                <!--<div class="home-tit">

                    <h2><span>Top Services</span> Cras nulla nulla, pulvinar sit amet nunc at, lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla.</h2>

                </div>-->

                <div class="home-tit">

                    <h2><span><?php echo $BIZBOOK['HOM-POP-TIT']; ?></span> <?php echo $BIZBOOK['HOM-POP-TIT1']; ?></h2>

                    <p><?php echo $BIZBOOK['HOM-POP-SUB-TIT']; ?></p>

                </div>

                <div class="land-pack">

                    <ul>

                        <?php

                        foreach (getAllCategories() as $category_sql_row) {

                            ?>

                            <li>

                                <div class="land-pack-grid">

                                    <div class="land-pack-grid-img">

                                        <img src="images/services/<?php echo $category_sql_row['category_image']; ?>" alt="" loading="lazy">

                                    </div>

                                    <div class="land-pack-grid-text">

                                        <h4><?php echo $category_sql_row['category_name']; ?>

                                            <span class="dir-ho-cat">Listings <?php echo AddingZero_BeforeNumber(getCountCategoryListing($category_sql_row['category_id'])); ?></span>

                                        </h4>

                                    </div>

                                    <a href="all-listing?category=<?php echo preg_replace('/\s+/', '-', strtolower($category_sql_row['category_name'])); ?>"

                                           class="land-pack-grid-btn">View all listings</a>

                                </div>

                            </li>

                            <?php

                        }

                        ?>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- END -->



<!-- START -->

<section>

    <div class="str hom2-cus hom4-fea">

        <div class="container">

            <div class="row">

                <div class="home-tit">

                    <h2><span><?php echo $BIZBOOK['HOM-BEST-TIT']; ?></span> <?php echo $BIZBOOK['HOM-BEST-TIT1']; ?>

                    </h2>

                    <p><?php echo $BIZBOOK['HOM-BEST-SUB-TIT']; ?></p>

                </div>



                <div class="hom2-cus-sli">

                        <ul class="multiple-items1">

                            <?php

                            $pop_bus = 1;

                            foreach (getAllFeaturedListing() as $row) {



                                $listing_id = $row['listing_id'];



                                $listing_sql_row = getIdListing($listing_id);

                                $featured_category_id = $listing_sql_row['category_id'];



                                $popular_business_category_sql_row = getCategory($featured_category_id);



                                // List Rating. for Rating of Star

                                foreach (getListingReview($listing_id) as $star_rating_row) {

                                    if ($star_rating_row["rate_cnt"] > 0) {

                                        $star_rate_times = $star_rating_row["rate_cnt"];

                                        $star_sum_rates = $star_rating_row["total_rate"];

                                        $star_rate_one = $star_sum_rates / $star_rate_times;

                                        //$star_rate_one = (($Star_rate_value)/5)*100;

                                        $star_rate_two = number_format($star_rate_one, 1);

                                        $star_rate = $star_rate_two;



                                    } else {

                                        $rate_times = 0;

                                        $rate_value = 0;

                                        $star_rate = 0;

                                    }

                                }



                                ?>

                                <li>

                                    <div class="testmo hom4-prop-box">

                                        <img

                                            src="<?php if ($listing_sql_row['profile_image'] != NULL || !empty($listing_sql_row['profile_image'])) {

                                                echo "images/listings/" . $listing_sql_row['profile_image'];

                                            } else {

                                                echo "images/listings/hot4.jpg";

                                            } ?>" alt="" loading="lazy">

                                        <div>

                                            <h4>

                                                <a href="<?php echo $LISTING_URL . urlModifier($listing_sql_row['listing_slug']); ?>"><?php echo $listing_sql_row['listing_name']; ?></a>

                                            </h4>

                                            <?php if ($star_rate != 0) { ?>

                                                <label class="rat">

                                                    <?php

                                                    for ($i = 1; $i <= ceil($star_rate_two); $i++) {

                                                        ?>

                                                        <i class="material-icons">star</i>

                                                        <?php

                                                    }

                                                    $bal_star_rate = abs(ceil($star_rate_two) - 5);



                                                    for ($i = 1; $i <= $bal_star_rate; $i++) {

                                                        ?>

                                                        <i class="material-icons">star_border</i>

                                                        <?php

                                                    }

                                                    ?>

                                                </label>

                                            <?php } ?>

                                            <span><a

                                                    href="#"><?php echo $popular_business_category_sql_row['category_name']; ?></a></span>

                                        </div>

                                        <a href="<?php echo $LISTING_URL . urlModifier($listing_sql_row['listing_slug']); ?>"

                                           class="fclick"></a>

                                    </div>

                                </li>

                                <?php

                                $pop_bus++;

                            }

                            ?>

                        </ul>

                    </div>



            </div>

        </div>

    </div>

</section>

<!-- END -->



<!--PRICING DETAILS-->

<section class="<?php if ($footer_row['admin_language'] == 2) {

    echo "lg-arb";

} ?> pri">

    <div class="container">

        <div class="row">

            <div class="tit">

                <h2>

                    <span><?php echo $BIZBOOK['CHOOSE_YOUR_PLAN']; ?></span></h2>

            </div>

            <div>

                <ul>

                    <?php

                    $si = 1;

                    foreach (getAllPlanType() as $plan_type_row) {

                        ?>

                        <li>

                            <div class="pri-box">

                                <div class="c2">

                                    <h4><?php echo $plan_type_row['plan_type_name']; ?> plan</h4>



                                    <?php if ($plan_type_row['plan_type_id'] == 1) { ?>

                                        <p><?php echo $BIZBOOK['PRICING_GETTING_STARTED']; ?></p>

                                    <?php } elseif ($plan_type_row['plan_type_id'] == 2) { ?>

                                        <p><?php echo $BIZBOOK['PRICING_PERFECT_SMALL_TEAMS']; ?></p>

                                    <?php } elseif ($plan_type_row['plan_type_id'] == 3) { ?>

                                        <p><?php echo $BIZBOOK['PRICING_BEST_VALUE_LARGE']; ?></p>

                                    <?php } else { ?>

                                        <p><?php echo $BIZBOOK['PRICING_MADE_ENTERPRISES']; ?></p>

                                        <?php

                                    } ?>



                                </div>

                                <div class="c3">

                                    <h2><span></span><?php if ($plan_type_row['plan_type_price'] == 0) {

                                            echo "FREE";

                                        } else {

                                            echo $footer_row['currency_symbol'] . '' . $plan_type_row['plan_type_price'];

                                        } ?></h2>

                                    <?php if ($plan_type_row['plan_type_id'] == 1) { ?>

                                        <p><?php echo $BIZBOOK['PRICING_SINGLE_USER']; ?></p>

                                    <?php } elseif ($plan_type_row['plan_type_id'] == 2) { ?>

                                        <p><?php echo $BIZBOOK['PRICING_STARTUP_BUSINESS']; ?></p>

                                    <?php } elseif ($plan_type_row['plan_type_id'] == 3) { ?>

                                        <p><?php echo $BIZBOOK['PRICING_MEDIUM_BUSINESS']; ?></p>

                                    <?php } else { ?>

                                        <p><?php echo $BIZBOOK['PRICING_MADE_ENTERPRISES']; ?></p>

                                        <?php

                                    } ?>



                                </div>

                                <div class="c5">

                                    <a href="<?php

                                    if (isset($_SESSION['user_id'])) {

                                        echo "db-plan-change";

                                    } else {

                                        echo "login";

                                    } ?>" class="cta1"><?php echo $BIZBOOK['PRICING_GET_START']; ?></a>

                                    <a href="pricing-details" class="cta2"  target="_blank">Know more</a>

                                </div>

                            </div>

                        </li>

                        <?php

                        $si++;

                    }

                    ?>

                </ul>

            </div>

        </div>

    </div>

</section>

<!--END PRICING DETAILS-->



<!-- START -->

<section class="news-hom-ban-sli">

      <div class="home-tit">

          <h2><span><?php echo $BIZBOOK['HOM-EVE-TIT']; ?></span> <?php echo $BIZBOOK['HOM-EVE-TIT1']; ?></h2>

        <p><?php echo $BIZBOOK['HOM-EVE-SUB-TIT']; ?></p>

      </div>



    <div class="news-hom-ban-sli-inn">

        <ul class="multiple-items2">

            <li>

                <div class="news-hban-box">

                    <div class="im">

                        <img src="images/events/11503pexels-photo-2608517.jpeg" alt="" loading="lazy">

                    </div>

                    <div class="txt">

                        <span class="news-cate">Feb 12</span>

                        <h2>Tima is an American news magazine and news</h2>

                        <span class="news-date">Posted on: 12 June 2022</span>

                    </div>

                    <a href="#" class="fclick"></a>

                </div>

            </li>

            <li>

                <div class="news-hban-box">

                    <div class="im">

                        <img src="images/events/8248pexels-photo-170811.jpeg" alt="" loading="lazy">

                    </div>

                    <div class="txt">

                        <span class="news-cate">Feb 12</span>

                        <h2>Tima is an American news magazine and news</h2>

                        <span class="news-date">Posted on: 12 June 2022</span>

                    </div>

                    <a href="#" class="fclick"></a>

                </div>

            </li>

            <li>

                <div class="news-hban-box">

                    <div class="im">

                        <img src="images/events/4321pexels-helena-lopes-697244.jpg" alt="" loading="lazy">

                    </div>

                    <div class="txt">

                        <span class="news-cate">Feb 12</span>

                        <h2>Tima is an American news magazine and news</h2>

                        <span class="news-date">Posted on: 12 June 2022</span>

                    </div>

                    <a href="#" class="fclick"></a>

                </div>

            </li>

            <li>

                <div class="news-hban-box">

                    <div class="im">

                        <img src="images/events/20523pexels-evg-culture-1126993.jpg" alt="" loading="lazy">

                    </div>

                    <div class="txt">

                        <span class="news-cate">Feb 12</span>

                        <h2>Tima is an American news magazine and news</h2>

                        <span class="news-date">Posted on: 12 June 2022</span>

                    </div>

                    <a href="#" class="fclick"></a>

                </div>

            </li>

            <li>

                <div class="news-hban-box">

                    <div class="im">

                        <img src="images/events/19158pexels-punlob-564107.jpg" alt="" loading="lazy">

                    </div>

                    <div class="txt">

                        <span class="news-cate">Feb 12</span>

                        <h2>Tima is an American news magazine and news</h2>

                        <span class="news-date">Posted on: 12 June 2022</span>

                    </div>

                    <a href="#" class="fclick"></a>

                </div>

            </li>

            <li>

                <div class="news-hban-box">

                    <div class="im">

                        <img src="images/events/10084pexels-photo-414807.jpeg" alt="" loading="lazy">

                    </div>

                    <div class="txt">

                        <span class="news-cate">Feb 12</span>

                        <h2>Tima is an American news magazine and news</h2>

                        <span class="news-date">Posted on: 12 June 2022</span>

                    </div>

                    <a href="#" class="fclick"></a>

                </div>

            </li>

        </ul>

    </div>

</section>

<!--END-->



<!-- START -->

<section>

    <div class="str hom2-cus">

        <div class="container">

            <div class="row">

                <div class="home-tit">

                    <h2><span>Our user reviews</span></h2>

                    <p><?php echo $BIZBOOK['HOM3-OW-TIT-SUB']; ?></p>

                </div>



                <div class="hom2-cus-sli">

                    <ul class="multiple-items">

                        <li>

                            <div class="testmo">

                                <img src="images/user/33654pexels-photo-91227.jpeg" alt="" loading="lazy">

                                <h4>Claude D Dial</h4>

                                <span>Written a review to <a href="listing/gill-automobiles-and-services">Gill Automobiles and Services</a></span>

                                <label class="rat">

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star_border</i>

                                    <i class="material-icons">star_border</i>

                                </label>

                                <p>Update your business details including services, about, contact details payment options and more.</p>

                            </div>

                        </li>

                        <li>

                            <div class="testmo">

                                <img src="images/user/33654pexels-photo-91227.jpeg" alt="" loading="lazy">

                                <h4>Claude D Dial</h4>

                                <span>Written a review to <a href="listing/gill-automobiles-and-services">Gill Automobiles and Services</a></span>

                                <label class="rat">

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star_border</i>

                                    <i class="material-icons">star_border</i>

                                </label>

                                <p>Update your business details including services, about, contact details payment options and more.</p>

                            </div>

                        </li>

                        <li>

                            <div class="testmo">

                                <img src="images/user/33654pexels-photo-91227.jpeg" alt="" loading="lazy">

                                <h4>Claude D Dial</h4>

                                <span>Written a review to <a href="listing/gill-automobiles-and-services">Gill Automobiles and Services</a></span>

                                <label class="rat">

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star_border</i>

                                    <i class="material-icons">star_border</i>

                                </label>

                                <p>Update your business details including services, about, contact details payment options and more.</p>

                            </div>

                        </li>

                        <li>

                            <div class="testmo">

                                <img src="images/user/33654pexels-photo-91227.jpeg" alt="" loading="lazy">

                                <h4>Claude D Dial</h4>

                                <span>Written a review to <a href="listing/gill-automobiles-and-services">Gill Automobiles and Services</a></span>

                                <label class="rat">

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star_border</i>

                                    <i class="material-icons">star_border</i>

                                </label>

                                <p>Update your business details including services, about, contact details payment options and more.</p>

                            </div>

                        </li>

                        <li>

                            <div class="testmo">

                                <img src="images/user/33654pexels-photo-91227.jpeg" alt="" loading="lazy">

                                <h4>Claude D Dial</h4>

                                <span>Written a review to <a href="listing/gill-automobiles-and-services">Gill Automobiles and Services</a></span>

                                <label class="rat">

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star_border</i>

                                    <i class="material-icons">star_border</i>

                                </label>

                                <p>Update your business details including services, about, contact details payment options and more.</p>

                            </div>

                        </li>

                        <li>

                            <div class="testmo">

                                <img src="images/user/33654pexels-photo-91227.jpeg" alt="" loading="lazy">

                                <h4>Claude D Dial</h4>

                                <span>Written a review to <a href="listing/gill-automobiles-and-services">Gill Automobiles and Services</a></span>

                                <label class="rat">

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star_border</i>

                                    <i class="material-icons">star_border</i>

                                </label>

                                <p>Update your business details including services, about, contact details payment options and more.</p>

                            </div>

                        </li>

                        <li>

                            <div class="testmo">

                                <img src="images/user/33654pexels-photo-91227.jpeg" alt="" loading="lazy">

                                <h4>Claude D Dial</h4>

                                <span>Written a review to <a href="listing/gill-automobiles-and-services">Gill Automobiles and Services</a></span>

                                <label class="rat">

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star</i>

                                    <i class="material-icons">star_border</i>

                                    <i class="material-icons">star_border</i>

                                </label>

                                <p>Update your business details including services, about, contact details payment options and more.</p>

                            </div>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- END -->




<!-- START -->

<section>

    <div class="str count">

        <div class="container">

            <div class="row">



                <div class="how-wrks">

                    <div class="home-tit">

                        <h2><span><?php echo $BIZBOOK['HOM-HOW-TIT']; ?></span></h2>

                        <p><?php echo $BIZBOOK['HOM-HOW-SUB-TIT']; ?></p>

                    </div>

                    <div class="how-wrks-inn">

                        <ul>

                            <li>

                                <div>

                                    <span>1</span>

                                    <img src="images/icon/how1.png" alt="" loading="lazy">

                                    <h4><?php echo $BIZBOOK['HOM-HOW-P-TIT-1']; ?></h4>

                                    <p><?php echo $BIZBOOK['HOM-HOW-P-SUB-1']; ?></p>

                                </div>

                            </li>

                            <li>

                                <div>

                                    <span>2</span>

                                    <img src="images/icon/how2.png" alt="" loading="lazy">

                                    <h4><?php echo $BIZBOOK['HOM-HOW-P-TIT-2']; ?></h4>

                                    <p><?php echo $BIZBOOK['HOM-HOW-P-SUB-2']; ?></p>

                                </div>

                            </li>

                            <li>

                                <div>

                                    <span>3</span>

                                    <img src="images/icon/how3.png" alt="" loading="lazy">

                                    <h4><?php echo $BIZBOOK['HOM-HOW-P-TIT-3']; ?></h4>

                                    <p><?php echo $BIZBOOK['HOM-HOW-P-SUB-3']; ?></p>

                                </div>

                            </li>

                            <li>

                                <div>

                                    <span>4</span>

                                    <img src="images/icon/how4.png" alt="" loading="lazy">

                                    <h4><?php echo $BIZBOOK['HOM-HOW-P-TIT-4']; ?></h4>

                                    <p><?php echo $BIZBOOK['HOM-HOW-P-SUB-4']; ?></p>

                                </div>

                            </li>

                        </ul>

                    </div>

                </div>







                <div class="mob-app">

                    <div class="lhs">

                        <img src="images/mobile.png" alt="" loading="lazy">

                    </div>

                    <div class="rhs">

                        <h2><?php echo $BIZBOOK['HOM-APP-TIT']; ?><span><?php echo $BIZBOOK['HOM-APP-TIT-SUB']; ?></span></h2>

                        <ul>

                            <li><?php echo $BIZBOOK['HOM-APP-PO-1']; ?></li>

                            <li><?php echo $BIZBOOK['HOM-APP-PO-2']; ?></li>

                            <li><?php echo $BIZBOOK['HOM-APP-PO-3']; ?></li>

                            <li><?php echo $BIZBOOK['HOM-APP-PO-4']; ?></li>

                        </ul>

                        <span><?php echo $BIZBOOK['HOM-APP-SEND']; ?></span>

                        <form>

                            <ul>

                                <li>

                                    <input type="email" placeholder="Enter email id" required></li>

                                <li>

                                    <input type="submit" value="Get App Link"></li>

                            </ul>

                        </form>

                        <a href="#"><img src="images/android.png" alt="" loading="lazy"> </a>

                        <a href="#"><img src="images/apple.png" alt="" loading="lazy"> </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- END -->





<!-- START -->

<section>

    <div class="hom-ads">

        <div class="container">

            <div class="row">

                <div class="filt-com lhs-ads">

                    <div class="ads-box">

                        <?php

                        $ad_position_id = 1;   //Ad position on home page bottom

                        $get_ad_row = getAds($ad_position_id);

                        $ad_enquiry_photo = $get_ad_row['ad_enquiry_photo'];

                        ?>

                        <a href="<?php echo stripslashes($get_ad_row['ad_link']); ?>">

                            <span>Ad</span>



                            <img src="images/ads/<?php if ($ad_enquiry_photo != NULL || !empty($ad_enquiry_photo)) {

                                echo $ad_enquiry_photo;

                            } else {

                                echo "ads2.jpg";

                            } ?>" alt="" loading="lazy">

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- END -->



<!-- START -->

<div class="ani-quo">

    <div class="ani-q1">

        <h4><?php echo $BIZBOOK['HOM-WHAT-LOOK-TIT']; ?></h4>

        <p><?php echo $BIZBOOK['HOM-WHAT-LOOK-SUB']; ?></p>

        <span><?php echo $BIZBOOK['HOM-WHAT-LOOK-CTA']; ?></span>

    </div>

    <div class="ani-q2">

        <img src="images/quote.png" alt="" loading="lazy">

    </div>

</div>

<!-- END -->



<?php

include "footer.php";

?>



<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="js/jquery.min.js"></script>

<script src="js/popper.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/jquery-ui.js"></script>

<script src="js/select-opt.js"></script>

<script src="js/custom.js"></script>

<script src="js/jquery.validate.min.js"></script>

<script src="js/custom_validation.js"></script>

<script src="js/slick.js"></script>


<script type="text/javascript">

    (function($){
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
      }
      var $subMenu = $(this).next(".dropdown-menu");
      $subMenu.toggleClass('show');

      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass("show");
      });

      return false;
    });
})(jQuery)

</script>


<script type="text/javascript">

$(function () {
 $('.toggle-menu').click(function(){
    $('.exo-menu').toggleClass('display');

 });




});
</script>



<script>

    $(window).scroll(function () {

        var scroll = $(window).scrollTop();

        if (scroll >= 250) {

            $(".hom-top").addClass("dmact");

        }

        else {

            $(".hom-top").removeClass("dmact");

        }

    });

$('.multiple-items, .multiple-items1').slick({

  infinite: true,

  slidesToShow: 4,

  slidesToScroll: 1,

    autoplay: true,

  autoplaySpeed: 3000,

    responsive: [{

        breakpoint: 992,

        settings: {

          slidesToShow: 1,

          slidesToScroll: 1,

          centerMode: false,

        }

      }]



});



$('.multiple-items2').slick({

  infinite: true,

  slidesToShow: 5,

  slidesToScroll: 1,

    autoplay: true,

  autoplaySpeed: 3000,

    responsive: [{

        breakpoint: 992,

        settings: {

          slidesToShow: 1,

          slidesToScroll: 1,

          centerMode: false,

        }

      }]



});

</script>

</body>



</html>