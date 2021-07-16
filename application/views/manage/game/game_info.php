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
        <div class="col-sm-3 text-right"><label>ステータス</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['game_status_name'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>タイプ</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['game_type_name'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>カテゴリー</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['game_category_name'] ?></p>
        </div>
      </div>

<?php if ($display_data['game_type_id'] == '1') : ?>
      <div class="row">
        <div class="col-sm-3 text-right"><label>場所</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['game_home_team'] ?></p>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-3 text-right"><label>対戦</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['game_team1'] ?>VS<?= $display_data['game_team2'] ?></p>
        </div>
      </div>
<?php elseif ($display_data['game_type_id'] == '2') : ?>
      <div class="row">
        <label class="col-sm-3 text-right">出場番号</label>
        <div class="col-sm-9">
          <div class="row">
  <?php for ($index = 1; $index <= $display_data['race_count']; $index++) : ?>
            <div class="col-sm-3"><?= $display_data['race' . $index] ?>番</div>
  <?php endfor; ?>
          </div>
        </div>
      </div>
<?php elseif ($display_data['game_type_id'] == '3') : ?>
      <div class="row">
        <label class="col-sm-3"></label>
        <div class="col-sm-9">
          <div class="row">
  <?php for ($index = 1; $index <= $display_data['stochastic_count']; $index++) : ?>
            <div class="col-sm-4"><?= $display_data['stochastic' . $index] ?></div>
  <?php endfor; ?>
          </div>
        </div>
      </div>
<?php elseif ($display_data['game_type_id'] == '4') : ?>
      <div class="row">
        <label class="col-sm-3 text-right">対象日</label>
        <div class="col-sm-9">
          <p><?= $display_data['game_target_date'] ?></p>
        </div>
      </div>
<?php endif; ?>
      <div class="row">
        <div class="col-sm-3 text-right"><label>アイキャッチ画像</label></div>
        <div class="col-sm-9 image_preview">
          <p><img src="<?= $display_data['game_image_url'] ?>"></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>タイトル</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['game_title'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>サブタイトル</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['game_caption_h2'] ?></p>
        </div>
      </div>
<?php for ($index = 1; $index <= $display_data['game_detail_count']; $index++) : ?>
      <div class="row">
        <div class="col-sm-3 text-right"><label>ゲーム詳細<?= $index ?></label></div>
        <div class="col-sm-9">
          <p><?= $display_data['game_detail' . $index] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>挿入画像</label></div>
        <div class="col-sm-9 image_preview">
          <p><img src="<?= $display_data['game_image' . $index] ?>"></p>
        </div>
      </div>
<?php endfor; ?>
      <div class="row">
        <div class="col-sm-3 text-right"><label>ゲーム開始日</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['start_date'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>ゲーム終了日</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['end_date'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>結果発表日</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['game_result_date'] ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6 text-right">
<?php if ($can_edit) : ?>
      <a href="<?= base_url('manage/game_regist') . '?id=' . $game_id ?>" class="btn btn-primary btn-lg"
          style="width: 150px;margin-bottom:30px;">編集</a>
<?php endif; ?>
    </div>
    <div class="col-sm-6 text-right">
<?php if ($can_edit && $display_data['game_status'] >= 0) : ?>
      <?php echo form_open('manage/game_close', array('id' => 'form-game-close')); ?>
      <?php echo form_hidden('id', $display_data['id']); ?>
      <button type="button" id="btn-game-close" class="btn btn-warning btn-lg"
          style="width: 150px;margin-bottom:30px;">非公開</a>
      <?php echo form_close(); ?>
<?php endif; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 text-right">
      <a href="<?= base_url('manage/game_list') ?>" class="btn btn-primary btn-lg"
          style="width: 150px;">戻る</a>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function() {
  $('#btn-game-close').on('click', function() {
    if(confirm('非公開にしてもよろしいですか？')) {
      $('#form-game-close').submit();
    }
  });

});
</script>