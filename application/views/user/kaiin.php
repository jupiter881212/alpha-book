<!DOCTYPE html>
<html lang="ja">
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="telephone=no" name="format-detection" />
  <title>
    会員登録
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
    <div class="Sign-dialog">
    <div class="signup-box">
      <div class="signup-box-content">
        <h1 data-gtm-vis-first-on-screen-9678464_101="260" data-gtm-vis-recent-on-screen-9678464_101="9088" data-gtm-vis-total-visible-time-9678464_101="100" data-gtm-vis-has-fired-9678464_101="1">
          新規登録
        </h1>
        <form class="signup-box-form" id="new_user" action="https://alpha-book.asia/user/account/register" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓">
          <input type="hidden" name="authenticity_token" value="3OKge2qTmdZXprTeMc9iJz2iobp4cFEC7o37h2SlPHsDgwliBQHLcw29vjeUVNV9xSxmooK9oiihMg8FM3754g==">
          <div class="name-wrap u-mt_15">
            <label for="user_name">
              ユーザー名
            </label>
            <input placeholder="ユーザー名" type="text" value="" name="user[name]" id="user_name">
            <span class="example"></span>
          </div>
        <div class="email-wrap">
          <label for="user_email">
            メールアドレス
          </label>
          <input placeholder="メールアドレスを入力" type="text" value="" name="user[email]" id="user_email">      
          <span class="example"></span>
        </div>
      <div class="password-wrap u-mt_15">
        <label for="user_password">
          パスワード
        </label>
        <input placeholder="パスワードを入力" type="password" name="user[password]" id="user_password">      
        <span class="example"></span>
      </div>
    <div class="password-confirm-wrap u-mt_15">
      <label for="user_password_confirmation">
        パスワードの確認
      </label>
      <input placeholder="パスワードの確認" type="password" name="user[password_confirmation]" id="user_password_confirmation">      <span class="example"></span>
    </div>
    <div class="password-annotation">
      ※パスワードは半角英数字・記号、8文字以上でご記入下さい
    </div>
    <!-- <div class="email-magazine-wrap u-mt_15">
      <p>メール通知設定</p>
      <span aria-hidden="true">
        <input value="0" type="hidden" name="user[receive_news]" id="user_receive_news">
      </span>
      <label>
        <input name="user[subscribe_email_magazine]" type="hidden" value="0"><input type="checkbox" value="1" checked="checked" name="user[subscribe_email_magazine]" id="user_subscribe_email_magazine">
        メールマガジンを受け取る
      </label>
      <p class="magazine-annotation">
        ※受け取りを希望されない場合はチェックを外してください
      </p>
    </div> -->
    <div class="signup-button-wrap">
      <button type="submit">
        新規登録
      </button>
    </div>
  </form>
</div>
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
  <style>
    .Sign-dialog .login-box .login-button-wrap, .Sign-dialog .login-box .signup-button-wrap, .Sign-dialog .signup-box-form .login-button-wrap, .Sign-dialog .signup-box-form .signup-button-wrap {
    margin-top: 19px;
    margin-left: 10px;
    display: block;
    vertical-align: top;
}
.Sign-dialog .login-box .login-button-wrap, .Sign-dialog .login-box .signup-button-wrap, .Sign-dialog .signup-box-form .login-button-wrap, .Sign-dialog .signup-box-form .signup-button-wrap {
    margin-top: 20px;
    margin-left: 0px;
    display: block;
    vertical-align: top;
    /* margin: 0 auto; */
    text-align: center;
}
  </style>
</body>
</html>