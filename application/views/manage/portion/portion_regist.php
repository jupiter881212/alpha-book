<div class="container-fluid">
  <?php echo form_open('', array('id' => 'form')); ?>
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">取り分設定</h1>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <span class="brv-ph1">全体の取り分</span>
      </div>
      <div class="panel-body">
        <?php echo form_hidden('back_flag', '1'); ?>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-horizontal">

              <div class="form-group">
                <label class="control-label col-sm-2">パーセンテージ：</label>
                <div class="col-sm-1">
                  <?php echo form_input('game_back_percentage', $input_data['game_back_percentage'], array('class' => 'form-control')); ?>
                </div>
                <span class="control-label pull-left">%</span>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">更新日：</label>
                <div class="col-sm-2">
                  <input type="date" name="modified" class="form-control" value="<?= $input_data['modified'] ?>">
                </div>
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
      <!-- /.panel-body -->
    </div>
  <?php echo form_close(); ?>
</div>
