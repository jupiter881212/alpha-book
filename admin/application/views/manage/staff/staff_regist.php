<div class="container-fluid">
  <?php echo form_open('', array('id' => 'form')); ?>
    <?php echo form_hidden('id', $input_data['id']); ?>
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">スタッフ追加</h1>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <span class="brv-ph1">スタッフ情報入力</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">

            <div class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-2">スタッフ名</label>
                <div class="col-sm-2">
                  <?php echo form_input('name', $input_data['name'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-2">パスワード</label>
                <div class="col-sm-2">
                  <?php echo form_password('password', $input_data['password'], array('class' => 'form-control')); ?>
                </div>

              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">権限</label>
                <div class="col-sm-1">
                  <?php echo form_dropdown('role_type', $role_type_list, $input_data['role_type'], array('class' => 'form-control')); ?>
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

  <?php echo form_close(); ?>
</div>
