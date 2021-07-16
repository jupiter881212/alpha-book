<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">アカウント詳細</h1>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading" style="display: flex;">
      <span class="brv-ph2">残高</span>
      <span class="brv-ph2" style="margin-left:30px;color:red;"><?= $display_data['balance'] ?>円</span>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph2">アカウント情報</span>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-3 text-right"><label>アカウントID</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['account_id'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>名前</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['name'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>メールアドレス</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['mail_address'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>本人確認</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['approved_flag'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 text-right"><label>ステータス</label></div>
        <div class="col-sm-9">
          <p><?= $display_data['delete_flg'] ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12 text-center">
<?php if ($can_edit) : ?>
      <a href="<?= base_url('manage/user_regist') . '?id=' . $display_data['id'] ?>" class="btn btn-primary btn-lg"
          style="width: 150px;margin-bottom:30px;">編集</a>
<?php endif; ?>
    </div>
  </div>

</div>

<div class="container-fluid">
  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph1">取引履歴検索</span>
    </div>
    <div class="panel-body">
      <?php echo form_open(base_url('manage/user') . '?id=' . $display_data['id'], array('id' => 'form')); ?>
        <div class="form-horizontal">
          <div class="row">
            <div class="col-sm-12">

              <div class="form-group">
                <label class="control-label col-sm-1">カテゴリー</label>
                <div class="col-sm-2">
                  <?php echo form_dropdown('game_category_id', $game_category_list, $search_data['game_category_id'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-1">日付</label>
                <div class="col-sm-2">
                  <input type="date" name="target_date" class="form-control" value="<?= $search_data['target_date'] ?>">
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-sm-12 text-center">
          <button type="submit" class="btn btn-primary btn-lg" style="width: 150px;">検索</button>
        </div>

      </form>
    </div>

  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph1">取引一覧</span>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <table class="table table-bordered table-striped" style="margin-bottom: 0px;">
          <thead>
            <tr class="row">
              <th class="col-sm-1"><span class="brv-th">取引日時</span></th>
              <th class="col-sm-2"><span class="brv-th">カテゴリー</span></th>
              <th class="col-sm-4"><span class="brv-th">ゲーム名</span></th>
              <th class="col-sm-2"><span class="brv-th">取引金額</span></th>
              <th class="col-sm-1"><span class="brv-th">取引結果</span></th>
              <th class="col-sm-2"><span class="brv-th">払戻金額</span></th>
            </tr>
          </thead>
          <tbody>
<?php foreach ($display_data['bet_history_list'] as $bet_history) : ?>
            <tr class="row">
              <td class="wid2"><?= $bet_history['history_date'] ?></td>
              <td><?= $bet_history['game_category_name'] ?></td>
              <td><?= $bet_history['game_title'] ?></td>
              <td><?= $bet_history['bet_money'] ?> 円</td>
              <td><?= $bet_history['game_result'] ?></td>
              <td><?= $bet_history['back_money'] ?> 円</td>
            </tr>
<?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
