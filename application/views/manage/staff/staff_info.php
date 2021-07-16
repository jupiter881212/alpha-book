<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">スタッフ詳細</h1>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph2">スタッフ情報</span>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-3 text-right"><label>スタッフ名</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['name'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>権限</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['role_type'] ?></p>
        </div>
      </div>

	</div>
  </div>

  <div class="row">
    <div class="col-sm-12 text-center">
<?php if ($can_edit) : ?>
      <a href="<?= base_url('manage/staff_regist') . '?id=' . $staff_id ?>" class="btn btn-primary btn-lg"
		  style="width: 150px;margin-bottom:30px;">編集</a>
<?php endif; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 text-center">
      <a href="<?= base_url('manage/staff_list') ?>" class="btn btn-primary btn-lg"
          style="width: 150px;">戻る</a>
    </div>
  </div>
  <!-- /.row (nested) -->
</div>
