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
      <h1 class="page-header">ゲーム詳細</h1>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph2">ゲーム詳細</span>
    </div>
    <div class="panel-body">
      <div class="row">
        <label class="col-sm-2 text-right">タイプ</label>
        <div class="col-sm-9">
          <p><?= $display_data['game_type_name'] ?></p>
        </div>
      </div>
      <div class="row">
        <label class="col-sm-2 text-right">カテゴリー</label>
        <div class="col-sm-9">
          <p><?= $display_data['game_category_name'] ?></p>
        </div>
      </div>

<?php if ($input_data['game_type_id'] == '1') : ?>
      <div class="row">
        <label class="col-sm-2 text-right">場所</label>
        <div class="col-sm-9">
          <p><?= $display_data['game_home_team'] ?></p>
        </div>
      </div>
      <div class="row">
        <label class="col-sm-2 text-right">対戦</label>
        <div class="col-sm-9">
          <p><?= $display_data['game_team1'] ?>VS<?= $display_data['game_team2'] ?></p>
        </div>
      </div>
<?php elseif ($input_data['game_type_id'] == '2') : ?>
      <div class="row">
        <label class="col-sm-2 text-right">出場番号</label>
        <div class="col-sm-10">
          <div class="row">
  <?php for ($index = 1; $index <= $display_data['race_count']; $index++) : ?>
            <div class="col-sm-3"><?= $display_data['race' . $index] ?>番</div>
  <?php endfor; ?>
          </div>
        </div>
      </div>
<?php elseif ($input_data['game_type_id'] == '3') : ?>
      <div class="row">
        <label class="col-sm-2"></label>
        <div class="col-sm-10">
          <div class="row">
  <?php for ($index = 1; $index <= $display_data['stochastic_count']; $index++) : ?>
            <div class="col-sm-4"><?= $display_data['stochastic' . $index] ?></div>
  <?php endfor; ?>
          </div>
        </div>
      </div>
<?php elseif ($input_data['game_type_id'] == '4') : ?>
      <div class="row">
        <label class="col-sm-2 text-right">対象日</label>
        <div class="col-sm-9">
          <p><?= $display_data['game_target_date'] ?></p>
        </div>
      </div>
<?php endif; ?>
      <div class="row">
        <label class="col-sm-2 text-right">アイキャッチ画像</label>
        <div class="col-sm-9">
          <p><img src="<?= $display_data['game_image_url'] ?>" style="width:150px;height:auto;object-fit:cover;"></p>
        </div>
      </div>
      <div class="row">
        <label class="col-sm-2 text-right">タイトル</label>
        <div class="col-sm-9">
          <p><?= $display_data['game_title'] ?></p>
        </div>
      </div>
      <div class="row">
        <label class="col-sm-2 text-right">サブタイトル</label>
        <div class="col-sm-9">
          <p><?= $display_data['game_caption_h2'] ?></p>
        </div>
      </div>
<?php for ($index = 1; $index <= $display_data['game_detail_count']; $index++) : ?>
      <div class="row">
        <label class="col-sm-2 text-right">ゲーム詳細<?= $index ?></label>
        <div class="col-sm-9">
          <p><?= $display_data['game_detail' . $index] ?></p>
        </div>
      </div>
      <div class="row">
        <label class="col-sm-2 text-right">挿入画像</label>
        <div class="col-sm-9">
          <p><img src="<?= $display_data['game_image' . $index] ?>" style="width:150px;height:auto;object-fit:cover;"></p>
        </div>
      </div>
<?php endfor; ?>
      <div class="row">
        <label class="col-sm-2 text-right">ゲーム開始日</label>
        <div class="col-sm-9">
          <p><?= $display_data['start_date'] ?></p>
        </div>
      </div>
      <div class="row">
        <label class="col-sm-2 text-right">ゲーム終了日</label>
        <div class="col-sm-9">
          <p><?= $display_data['end_date'] ?></p>
        </div>
      </div>
      <div class="row">
        <label class="col-sm-2 text-right">結果発表日</label>
        <div class="col-sm-9">
          <p><?= $display_data['game_result_date'] ?></p>
        </div>
      </div>
<?php if (!$is_new) : ?>
      <div class="row">
        <label class="col-sm-2 text-right">結果</label>
        <div class="col-sm-9">
          <p><?= $display_data['game_result'] ?></p>
        </div>
      </div>
<?php endif; ?>
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

<?php echo form_open_multipart('manage/game_complate', array('class' => 'form-horizontal', 'id' => 'form')); ?>
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