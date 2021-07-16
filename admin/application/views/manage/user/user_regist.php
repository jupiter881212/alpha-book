<div class="container-fluid">
  <?php echo form_open('', array('id' => 'form')); ?>
    <?php echo form_hidden('id', $input_data['id']); ?>
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">アカウント追加</h1>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <span class="brv-ph1">アカウント情報入力</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">

            <div class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-2">アカウントID</label>
                <div class="col-sm-1">
                  <?php echo form_input('account_id', $input_data['account_id'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-1">名前</label>
                <div class="col-sm-2">
                  <?php echo form_input('name', $input_data['name'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-1">メールアドレス</label>
                <div class="col-sm-2">
                  <?php echo form_input('mail_address', $input_data['mail_address'], array('class' => 'form-control')); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">本人確認</label>
                <div class="col-sm-1">
                  <?php echo form_dropdown('approved_flag', $approved_flag_list, $input_data['approved_flag'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-1">残高</label>
                <div class="col-sm-1">
                  <?php echo form_input('balance', $input_data['balance'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-2">ステータス</label>
                <div class="col-sm-1">
                  <?php echo form_dropdown('delete_flg', $delete_flag_list, $input_data['delete_flg'], array('class' => 'form-control')); ?>
                </div>
              </div>

            </div>
        </div>

        <?php echo validation_errors(); ?>
        <div class="row">
          <div class="col-sm-12 text-center">
<?php if ($can_edit) : ?>
            <button type="submit" class="btn btn-primary btn-lg" style="width: 150px;">確認</button>
<?php endif; ?>
          </div>
        </div>

      </div>

    </div>
    <!-- /.row (nested) -->
  </div>

  <?php echo form_close(); ?>
</div>
