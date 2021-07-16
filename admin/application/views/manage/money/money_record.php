<div class="container-fluid">
  <?php echo form_open('', array('id' => 'form')); ?>
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">入出金記録</h1>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <span class="brv-ph1">記録</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">

            <!-- 取込対象 -->
            <div class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-2">入出金</label>
                <div class="col-sm-1">
                  <?php echo form_dropdown('money_action', $money_action_list, $input_data['money_action'], array('class' => 'form-control')); ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2">アカウントID</label>
                <div class="col-sm-2">
                  <?php echo form_input('account_id', $input_data['account_id'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-1">名前</label>
                <div class="col-sm-2">
                  <?php echo form_input('user_name', $input_data['user_name'], array('class' => 'form-control')); ?>
                </div>
              </div>

              <div class="form-group">
              <label class="control-label col-sm-2">ゲームID</label>
                <div class="col-sm-1">
                  <?php echo form_input('game_id', $input_data['game_id'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-2">ゲーム名</label>
                <div class="col-sm-2">
                  <?php echo form_input('game_name', $input_data['game_name'], array('class' => 'form-control')); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">金額</label>
                <div class="col-sm-1">
                  <?php echo form_input('money', $input_data['money'], array('class' => 'form-control')); ?>
                </div>
                <span class="control-label pull-left">円</span>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">日付</label>
                <div class="col-sm-2">
                  <input type="date" name="action_date" class="form-control" value="<?= $input_data['action_date'] ?>" />
                </div>
              </div>

            </div>
        </div>

        <div class="error">
<?php echo validation_errors(); ?>
        </div>
        <div class="row">
          <div class="col-sm-12 text-center">
<?php if ($can_edit) : ?>
            <button type="submit" class="btn btn-primary btn-lg" style="width: 150px;">確認</button>
<?php endif; ?>
          </div>
        </div>

      </div>

    </div>
  <?php echo form_close(); ?>
</div>

<script type="text/javascript">
$(function() {

  $('input[name=account_id]').on('change', function() {
    $('div.error').text('');
    $('input[name=user_name]').val('');
  }).on('blur', function() {
    var account_id = $(this).val();
    if (account_id == '') {
      return;
    }
    var param = {
      'account_id': account_id
    };
    $.post("<?= base_url('manage/user_account') ?>", param, null, "json")
    .done(function(res, sts, xhr) {
      if (res.result == '0') {
        $('input[name=user_name]').val(res.user_info['name']);
      } else {
        $('div.error').text(res.error_message);
      }
    })
    .fail(function(xhr, sts, error) {
      $('div.error').text('エラーが発生しました。');
    });
  });

  $('input[name=game_id]').on('change', function() {
    $('div.error').text('');
    $('input[name=game_name]').val('');
  }).on('blur', function() {
    var game_id = $(this).val();
    if (game_id == '') {
      return;
    }
    var param = {
      'game_id': game_id
    };
    $.post("<?= base_url('manage/game_name') ?>", param, null, "json")
    .done(function(res, sts, xhr) {
      if (res.result == '0') {
        $('input[name=game_name]').val(res.game_info['game_title']);
      } else {
        $('div.error').text(res.error_message);
      }
    })
    .fail(function(xhr, sts, error) {
      $('div.error').text('エラーが発生しました。');
    });
  });

});
</script>
