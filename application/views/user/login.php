<!DOCTYPE html>
<html lang="ja">
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="telephone=no" name="format-detection" />
  <title>
    ログインページ
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
    <?php include('./header.php'); ?>
    </div>
    <?php include('./sp_nav.php'); ?>
    <div class="flex_container">
    <?php include('./sidebar.php'); ?>
<div class="Sign-dialog log">
  <div class="login-box">
    <h1 data-gtm-vis-recent-on-screen-9678464_101="329" data-gtm-vis-first-on-screen-9678464_101="330" data-gtm-vis-total-visible-time-9678464_101="100" data-gtm-vis-has-fired-9678464_101="1">
      ログイン
    </h1>
    <form class="new_user" id="login" action="login.html" accept-charset="UTF-8" method="post">
      <input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="YPoDsiTWaPwKyPgSRmry2s/ElkuTslxxpw2+shR5F1O/m6qrS0Q6WVDT8vvj8UWAN0pRU2l/r1voskowQ6LSyg==">
      <div class="email-wrap">
        <input placeholder="メールアドレスを入力" type="text" value="" name="user[email]" id="user_email">
      </div>
      <div class="password-wrap u-mt_15">
        <input placeholder="パスワードを入力" type="password" name="user[password]" id="user_password">
      </div>
      <div class="wrap_lg">
      <div class="login-checkbox-wrap">
        <input id="login-checkbox" class="u-valign_m u-mr_10" type="checkbox" value="true" checked="checked" name="user[remember_me]"><label class="u-valign_m" for="login-checkbox">
          ログイン情報を保存する
        </label>
      </div>
      <div class="login-button-wrap">
        <button type="submit">
          ログイン
        </button>
      </div>
    </div>
    </form>
    
  </div>
</div>
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