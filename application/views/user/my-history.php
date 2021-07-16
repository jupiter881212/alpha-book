<!DOCTYPE html>
<html lang="ja">
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="telephone=no" name="format-detection" />
  <title>
  ベット履歴
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

        <p style="padding-bottom: 0.5em; border-bottom-color: rgb(172, 152, 122); border-bottom-width: 0.3em; border-bottom-style: solid;"><span style="font-family:Trebuchet MS,Helvetica,sans-serif;"><span style="font-size:24px;"><strong>ベット履歴</strong></span><br>
        <span style="font-size:14px;">&nbsp;History</span></span></p>
        <br>
        <main id="main">
        <section class="history">
          <form action="/bet/history/incomplete" id="UserBetIncompleteForm" method="post" accept-charset="utf-8" class="ng-pristine ng-valid">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>
              <div class="history_main cf">
                <h2>確定済み</h2>
                  <div class="form_block">カテゴリ<br>
                    <select name="data[UserBet][category]" class="history_select mobile_100" id="UserBetCategory">
                      <option value="">全て</option>
                      <option value="">サッカー</option>
                      <option value="">野球</option>
                      <option value="">バスケ</option>
                      <option value="">テニス</option>
                      <option value="">RIZIN</option>
                    </select>
                    <span class="transaction_pulldown icon-ficon_down"></span>
                  </div>
                  <div class="form_block">期間<br>
                    <input type="date" name="" value="" id="" class="date mobile" placeholder="">
                    <div class="wave">→</div>
                    <input type="date" name="" value="" id="" class="date mobile" placeholder="">
                  </div>
                  <div class="form_block">表示<br>
                    <select name="data[UserBet][pageRawSize]" class="history_select" id="UserBetPageRawSize">
                      <option value="10" selected="selected">10</option>
                      <option value="20">20</option>
                      <option value="30">30</option>
                    </select>
                    <span class="transaction_pulldown icon-ficon_down"></span>
                  </div>
                  <div class="form_block his">
                    <input type="button" value="表示" onclick="" class="submit">
                  </div>
                </div>
                <div class="data">
                  <table>
                    <tr>
                      <th>取引日時</th>
                      <th>カテゴリ</th>
                      <th>ベット金額</th>
                      <th>取引結果</th>
                    </tr>
                    <tr>
                      <td>2021/03/12</td>
                      <td>RIZIN26</td>
                      <td>1,000円</td>
                      <td class="plus">+500円</td>
                    </tr>
                    <tr>
                      <td>2021/03/12</td>
                      <td>RIZIN26</td>
                      <td>1,000円</td>
                      <td class="plus">+500円</td>
                    </tr>
                    <tr>
                      <td>2021/03/12</td>
                      <td>サッカー</td>
                      <td>1,000円</td>
                      <td class="mainasu">-500円</td>
                    </tr>
                    <tr>
                      <td>2021/03/11</td>
                      <td>野球</td>
                      <td>1,000円</td>
                      <td class="plus">+500円</td>
                    </tr>
                    <tr>
                      <td>2021/03/11</td>
                      <td>バスケ</td>
                      <td>1,000円</td>
                      <td class="plus">+500円</td>
                    </tr>
                    <tr>
                      <td>2021/03/10</td>
                      <td>テニス</td>
                      <td>1,000円</td>
                      <td class="mainasu">-500円</td>
                    </tr>
                    <tr>
                      <td>2021/03/10</td>
                      <td>野球</td>
                      <td>1,000円</td>
                      <td class="plus">+500円</td>
                    </tr>
                    <tr>
                      <td>2021/03/09</td>
                      <td>サッカー</td>
                      <td>1,000円</td>
                      <td class="plus">+500円</td>
                    </tr>
                    <tr>
                      <td>2021/03/09</td>
                      <td>サッカー</td>
                      <td>1,000円</td>
                      <td class="mainasu">-500円</td>
                    </tr>
                    <tr>
                      <td>2021/03/08</td>
                      <td>野球</td>
                      <td>1,000円</td>
                      <td class="mainasu">-500円</td>
                    </tr>
                  </table>
                </div>
                <a href="http://okoge.kill.jp/book/my-page.php" class="css-11g9kr1 gogo top_ma_a">
                <span tabindex="0" class="css-dg7ou2 koko">
                  <span color="#fff" class="css-1mm8i4f">
                    マイページへ
                  </span>
                  <span color="#fff" class="css-1babh3k">
                    マイページへ
                  </span>
                </span>
              </a>
          </form>
        </section>
        </main>
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
  <script>
    $(document).on('click', function(e) {
	// ２．クリックされた場所の判定
	if(!$(e.target).closest('.data').length && !$(e.target).closest('.his').length){
		$('.data').fadeOut();
	}else if($(e.target).closest('.his').length){
		// ３．ポップアップの表示状態の判定
		if($('.data').is(':hidden')){
			$('.data').fadeIn();
		}else{
			$('.data').fadeOut();
		}
	}
});
  </script>
  <style>
    .data{
      display:none;
    }
    table td{
  text-align: center;
  border-left: 1px solid #a8b7c5;
  border-bottom: 1px solid #a8b7c5;
  border-top:none;
  box-shadow: 0px -3px 5px 1px #eee inset;
  width: auto;
  padding: 10px 0;
}
table td:last-child{
  border-right: 1px solid #a8b7c5;
}
  </style>
</body>
</html>