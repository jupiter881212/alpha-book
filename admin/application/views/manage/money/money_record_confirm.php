<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">入出金記録確認</h1>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph2">入出金記録確認</span>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-3 text-right"><label>入出金</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['money_action'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>アカウントID</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['account_id'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>ゲームID</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['game_id'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>名前</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['user_name'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>金額</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['money'] ?> 円</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>日付</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['action_date'] ?></p>
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

<?php echo form_open_multipart('manage/money_record_complate', array('class' => 'form-horizontal', 'id' => 'form')); ?>
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
