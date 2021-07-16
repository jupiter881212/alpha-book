<style>
    .col-sm-5 {
    width: auto;
}
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?= $page_caption ?>履歴</h1>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph1"><?= $page_caption ?>履歴検索</span>
    </div>
    <div class="panel-body">
      <?php echo form_open('', array('id' => 'form')); ?>
        <div class="row">
          <div class="col-sm-12">

            <div class="form-horizontal">
<?php if ($money_action == '1') : ?>
              <div class="form-group">
                <label class="control-label col-sm-2">タイプ</label>
                <div class="col-sm-1">
                  <?php echo form_dropdown('game_type_id', $game_type_list, $search_data['game_type_id'], array('class' => 'form-control')); ?>
                </div>
              </div>
<?php endif; ?>
              <div class="form-group">
                <label class="control-label col-sm-2">アカウントID</label>
                <div class="col-sm-2">
                  <?php echo form_input('account_id', $search_data['account_id'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-1">名前</label>
                <div class="col-sm-2">
                  <?php echo form_input('user_name', $search_data['user_name'], array('class' => 'form-control')); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">ゲームID</label>
                <div class="col-sm-2">
                  <?php echo form_input('game_id', $search_data['game_id'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-1">金額</label>
                <div class="col-sm-2">
                  <?php echo form_input('money', $search_data['money'], array('class' => 'form-control')); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">日付</label>
                <div class="col-sm-2">
                  <input type="date" name="action_date" class="form-control" value="<?= $search_data['action_date'] ?>" />
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary btn-lg" style="width: 150px;">検索</button>
          </div>
        </div>

      </form>
    </div>

  </div>
  <!-- /.row (nested) -->

  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph1"><?= $page_caption ?>履歴一覧</span>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <table class="table table-bordered table-striped" style="margin-bottom: 0px;">
          <thead>
            <tr>
              <th class="col-sm-1"><span class="brv-th">列</span></th>
              <th class="col-sm-2"><span class="brv-th">アカウントID</span></th>
              <th class="col-sm-1"><span class="brv-th">ゲームID</span></th>
              <th class="col-sm-5"><span class="brv-th">氏名</span></th>
              <th class="col-sm-2"><span class="brv-th">金額</span></th>
              <th class="col-sm-2"><span class="brv-th">日付</span></th>
            </tr>
          </thead>
          <tbody>
<?php for ($index = 0; $index < count($money_list); $index++): ?>
            <tr>
              <td><?= ($index + 1) ?></td>
              <td><?= $money_list[$index]['account_id'] ?></td>
              <td><?= $money_list[$index]['game_id'] ?></td>
              <td><?= $money_list[$index]['user_name'] ?></td>
              <td><?= $money_list[$index]['money'] ?> 円</td>
              <td><?= $money_list[$index]['action_date'] ?></td>
            </tr>
<?php endfor; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- /.panel-body -->
</div>
