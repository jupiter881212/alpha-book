<style>
    .col-sm-1 {
    width: auto;
    font-size: 12px;
}
.col-sm-4 {
    width: 100%;
}
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">取り分一覧</h1>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph1">取り分一覧</span>
<?php if ($can_edit) : ?>
      <!--<a href="<?= base_url('manage/portion_regist') ?>" class="btn add_btn"><i class="fas fa-plus"></i>新規追加</a>-->
<?php endif; ?>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <table class="table table-bordered table-striped" style="margin-bottom: 0px;">
          <thead>
            <tr>
              <th class="col-sm-1"><span class="brv-th">列</span></th>
              <th class="col-sm-1"><span class="brv-th">パーセンテージ</span></th>
              <th class="col-sm-1"><span class="brv-th">更新日</span></th>
            </tr>
          </thead>
          <tbody>
<?php for ($index = 0; $index < count($portion_list); $index++) : ?>
            <tr>
              <td><?= ($index + 1) ?></td>
              <td><?= $portion_list[$index]['game_back_percentage'] ?> %</td>
              <td><?= $portion_list[$index]['modified'] ?></td>
            </tr>
<?php endfor; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
