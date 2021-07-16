<!DOCTYPE html>
<html lang="ja">
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="telephone=no" name="format-detection" />
  <title>
    My page
</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/sub.css">
<script src="js/common.js"></script>
</head>
<body>
<div class="Site-container">
  <div id="CommonHeaderWithTabViewWrapper-react-component-39e3827b-cad6-48ba-b9c8-e96b2f9a86ea">
    <div class="css-t0dnos">
      <?php include('./header.php'); ?>
        </div>
      </div>
      
<div id="fb-root"></div>
<?php include('./sp_nav.php'); ?>
<div class="flex_container">
<?php include('./sidebar.php'); ?>
<article class="Page-body" id="contents">
<div id="ProjectPageTemplate-react-component-110f67ab-40a8-48da-b80e-7a528102ca6e">
  <div class="undefined projectAbout css-16e25on">
    
<div class="description Project-main css-uinco">
  <div class="about-this-project css-1u90wth">
    <section class="Project-outline css-1wdiqs4">
      
      <div class="css-m6hssr">

        <p style="padding-bottom: 0.5em; border-bottom-color: rgb(172, 152, 122); border-bottom-width: 0.3em; border-bottom-style: solid;"><span style="font-family:Trebuchet MS,Helvetica,sans-serif;"><span style="font-size:24px;"><strong>マイページ</strong></span><br>
        <span style="font-size:14px;">&nbsp;My page</span></span></p>
        <br>
        <section class="mypage">
          <div class="mypage_data">
            <p class="name">山田　太郎 さん</p>
            <p>アカウントID：abc00001<span>残高 20000円</span></p>
          </div>
          <div class="mypage_info">
            <ul>
              <li><a href="my-info.php">登録情報確認</a></li>
              <li><a href="my-money.php">入出金依頼</a></li>
              <li><a href="my-money_history.php">入出金履歴</a></li>
              <li><a href="my-bet.php">取引一覧</a></li>
              <li><a href="Change_Password.php">パスワード変更</a></li>
              <li><a href="membership.php">退会手続き</a></li>
            </ul>
          </div>

        </section>
      </div>
<div>

<p>&nbsp;</p>

</div>

</section>               
</div>

</div>
</div>   
</article>
</div>
<div id="ShortProposalButton-react-component-4b554eac-ef0e-4fbe-8380-04a364ae451f">
  
</div>
<div id="CommonFooter-react-component-516f851f-97ba-42d2-bb3f-80bca0525fcf">
  <?php include('./footer.php'); ?>
    </div> 
<!--footer Area-->    
    <div class="overlay"></div>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
 
<script type="text/javascript">
 $('.autoplay').slick({
  slidesToShow: 1,
  slidesToScroll:1,
  autoplay: true,
  autoplaySpeed: 3000,
// 画像下のドット（ページ送り）を表示
  dots:true,
  arrows:true,
});
  </script>
  <style>
    .slick-prev{
    left: 15px;
    z-index: 1;
    }
    .slick-next{
    right: 15px;
    z-index: 1;
    }
    @media screen and (min-width:1160px){
      .slick-prev{
    left: 35px;
    z-index: 1;
    }
    .slick-next{
    right: 35px;
    z-index: 1;
    }
    }
    .css-16e25on {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    background-color: #fff;
    position: relative;
    max-width: 1184px;
    margin-top: 0px;
}
  </style>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.0.0/velocity.min.js"></script>
  <script type="text/javascript">
  (function($) {
      $(function () {
          $('.sub-menu > a').on('click', function (e) {
              e.preventDefault();
              var $subNav = $(this).next('.sub-menu-nav');
              if ($subNav.css("display") === "none") {
                  $(this).addClass('is-active');
                  $subNav.velocity('slideDown', {duration: 400});
              } else {
                  $(this).removeClass('is-active');
                  $subNav.velocity('slideUp', {duration: 400});
              }
          });
      });
  })(jQuery);
  </script>
</body>
</html>