<style>
    .col-sm-6 {
    width: 100%;
}
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">スタッフ情報</h1>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph1">スタッフ検索</span>
    </div>
    <div class="panel-body">
      <?php echo form_open('', array('id' => 'form')); ?>
        <div class="row">
          <div class="col-sm-12">

            <div class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-2">スタッフ名</label>
                <div class="col-sm-2">
                  <?php echo form_input('name', $search_data['name'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-1">権限</label>
                <div class="col-sm-1">
                  <?php echo form_dropdown('role_type', $role_type_list, $search_data['role_type'], array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary btn-lg" style="width: 150px;">検索</button>
          </div>

        </div>

      <?php echo form_close(); ?>
    </div>
    <!-- /.row (nested) -->
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph1">スタッフ一覧</span>
<?php if ($can_edit) : ?>
      <a href="<?= base_url('manage/staff_regist') ?>" class="btn add_btn"><i class="fas fa-plus"></i>新規追加</a>
<?php endif; ?>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <table class="table table-bordered table-striped" style="margin-bottom: 0px;">
          <thead>
            <tr>
              <th class="col-sm-1"><span class="brv-th">列</span></th>
              <th class="col-sm-3"><span class="brv-th">スタッフ名</span></th>
              <th class="col-sm-1"><span class="brv-th">権限</span></th>
              <th class="col-sm-1"><span class="brv-th">詳細</span></th>
            </tr>
          </thead>
          <tbody>
<?php for ($index = 0; $index < count($staff_list); $index++) :?>
            <tr>
              <td><?= ($index + 1) ?></td>
              <td><?= $staff_list[$index]['name'] ?></td>
              <td><?= $staff_list[$index]['role_type'] ?></td>
              <td><a
                href="<?= base_url('manage/staff') . '?id=' . $staff_list[$index]['id'] ?>" class="btn btn-xs btn-primary">詳細</a></td>
            </tr>
<?php endfor; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
