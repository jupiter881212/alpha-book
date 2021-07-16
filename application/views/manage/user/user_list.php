asdasd
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">アカウント情報</h1>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph1">アカウント検索</span>
    </div>
    <div class="panel-body">
      <?php echo form_open('', array('id' => 'form')); ?>
        <div class="row">
          <div class="col-sm-12">

            <div class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-2">アカウントID</label>
                <div class="col-sm-1">
                  <?php echo form_input('account_id', $search_data['account_id'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-1">名前</label>
                <div class="col-sm-2">
                  <?php echo form_input('user_name', $search_data['user_name'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-1">メールアドレス</label>
                <div class="col-sm-2">
                  <?php echo form_input('mail_address', $search_data['mail_address'], array('class' => 'form-control')); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">本人確認</label>
                <div class="col-sm-1">
                  <?php echo form_dropdown('approved_flag', $approved_flag_list, $search_data['approved_flag'], array('class' => 'form-control')); ?>
                </div>
                <label class="control-label col-sm-1">ステータス</label>
                <div class="col-sm-1">
                  <?php echo form_dropdown('delete_flag', $delete_flag_list, $search_data['delete_flag'], array('class' => 'form-control')); ?>
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
      <span class="brv-ph1">登録者一覧</span>
<?php if ($can_edit) : ?>
      <a href="<?= base_url('manage/user_regist') ?>" class="btn add_btn"><i class="fas fa-plus"></i>新規追加</a>
<?php endif; ?>
    </div>
    <table class="table table-bordered table-striped" style="margin-bottom: 0px;">
      <thead>
        <tr class="row">
          <th class="col-sm-1"><span class="brv-th">列</span></th>
          <th class="col-sm-1"><span class="brv-th">アカウントID</span></th>
          <th class="col-sm-3"><span class="brv-th">氏名</span></th>
          <th class="col-sm-3"><span class="brv-th">メールアドレス</span></th>
          <th class="col-sm-1"><span class="brv-th">本人確認</span></th>
          <th class="col-sm-1"><span class="brv-th">ステータス</span></th>
          <th class="col-sm-3"><span class="brv-th">残高</span></th>
          <th class="col-sm-1" style="min-width: 53px;"><span class="brv-th">詳細</span></th>
        </tr>
      </thead>
      <tbody>
<?php for ($index = 0; $index < count($user_list); $index++) :?>
        <tr class="row">
          <td><?= ($index + 1) ?></td>
          <td><?= $user_list[$index]['account_id'] ?></td>
          <td><?= $user_list[$index]['name'] ?></td>
          <td><?= $user_list[$index]['mail_address'] ?></td>
          <td><?= $user_list[$index]['approved_flag'] ?></td>
          <td><?= $user_list[$index]['delete_flg'] ?></td>
          <td><?= $user_list[$index]['balance'] ?>円</td>
          <td><a
            href="<?= base_url('manage/user') . '?id=' . $user_list[$index]['id'] ?>" class="btn btn-xs btn-primary">詳細</a></td>
        </tr>
<?php endfor; ?>
      </tbody>
    </table>
  </div>
</div>
