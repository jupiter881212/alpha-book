<style type="text/css">
  /* パネル用ヘッダーフォントサイズ */
  /* 第一階層 */
  .brv-ph1 {
    font-size: 18px;
    font-weight: bold;
    /* color: blue; */
  }

  /* 第二階層 */
  .brv-ph2 {
    font-size: 18px;
    font-weight: bold;
    /* color: red; */
  }

  /* *用 */
  .brv-r {
    font-size: 18px;
    color: #a94442;
    /*red;*/
    vertical-align: -20%;
  }

  /* テーブルヘッダ */
  .brv-th {
    font-size: 16px;
    /* color: blue; */
  }

  .wid2 {
    width: 5%;
  }

  /* テーブルフォントカラー */
  .brv-td-red {
    color: red;
  }

  /*お知らせ*/
  .news_tex {
    border-bottom: 1px solid #333;
  }

  .news {
    list-style: none;
  }

  .info_1 a:after {
    content: "4";
    color: #fff;
    background: crimson;
    margin-right: 5px;
    margin-left: 5px;
    /* font-weight: 700; */
    line-height: 0.9;
    width: 20px;
    text-align: center;
    height: 20px;
    padding: 5px;
    border-radius: 50%;
    display: inline-block;
  }

  .news {
    list-style: none;
    padding: 5px;
  }

  .fa-plus:before {
    content: "\f067";
    /* text-align: left; */
    margin-right: 20px;
  }

  .container-fluid {
    padding-right: 0px;
    padding-left: 0px;
  }

  /*検索結果*/
  .col-lg-6 {
    margin-top: 20px;
  }

  .btn-primary a {
    color: #fff;
  }

  .full {
    width: 90%;
  }

  .full2 {
    width: 80%;
  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">アカウント登録確認</h1>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph2">アカウント登録確認</span>
    </div>
    <div class="panel-body">
      <div class="row">
        <label class="col-sm-3 text-right">アカウントID</label>
        <div class="col-sm-9">
          <p><?= $display_data['account_id'] ?></p>
        </div>
      </div>
      <div class="row">
        <label class="col-sm-3 text-right">名前</label>
        <div class="col-sm-9">
          <p><?= $display_data['name'] ?></p>
        </div>
      </div>
      <div class="row">
        <label class="col-sm-3 text-right">メールアドレス</label>
        <div class="col-sm-9">
          <p><?= $display_data['mail_address'] ?></p>
        </div>
      </div>
      <div class="row">
        <label class="col-sm-3 text-right">本人確認</label>
        <div class="col-sm-9">
          <p><?= $display_data['approved_flag'] ?></p>
        </div>
      </div>
      <div class="row">
        <label class="col-sm-3 text-right">ステータス</label>
        <div class="col-sm-9">
          <p><?= $display_data['delete_flg'] ?></p>
        </div>
      </div>

    </div>

  </div>

  <div class="row">
    <div class="col-sm-12 text-center">
      <button type="button" id="btn-regist" class="btn btn-primary btn-lg" style="width: 150px;">登録</button>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 text-center" style="margin-top:20px;">
      <button type="button" id="btn-cancel" class="btn btn-primary btn-lg" style="width: 150px;">キャンセル</button>
    </div>
  </div>

</div>

<?php echo form_open_multipart('manage/user_complate', array('class' => 'form-horizontal', 'id' => 'form')); ?>
<?php   foreach ($input_data as $field_name => $input_item) : ?>
<?php     if (is_array($input_item)) : ?>
<?php       for ($index = 0; $index < count($input_item); $index++) : ?>
<?php         echo form_hidden($field_name . ($index + 1), $input_item[$index]); ?>
<?php       endfor; ?>
<?php     else : ?>
<?php       echo form_hidden($field_name, $input_item); ?>
<?php     endif; ?>
<?php   endforeach; ?>
<?php echo form_close(); ?>


<script type="text/javascript">
$(function() {
  $('#btn-regist').on('click', function() {
    var $form = $('#form');
    $form.append('<input type="hidden" name="mode" value="1">');
    $form.submit();
  });
  $('#btn-cancel').on('click', function() {
    history.back();
  });
});
</script>
