<style>
    .col-sm-4 {
    width: auto;
}
</style>
<div class="container-fluid">
  <?php echo form_open('', array('id' => 'form')); ?>
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">受付中ゲーム一覧</h1>
      </div>
    </div>
    <!-- /.row (nested) -->

    <div class="panel panel-default">
      <div class="panel-heading">
        <span class="brv-ph1">受付中ゲーム一覧</span>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-bordered table-striped" style="margin-bottom: 0px;">
            <thead>
              <tr>
                <th class="col-sm-1"><span class="brv-th">列</span></th>
                <th class="col-sm-4"><span class="brv-th">カテゴリー</span></th>
                <th class="col-sm-5"><span class="brv-th">ゲーム名</span></th>
                <th class="col-sm-1"><span class="brv-th">ステータス</span></th>
                <th class="col-sm-1"><span class="brv-th">停止ボタン</span></th>
              </tr>
            </thead>
            <tbody>
<?php for ($index = 0; $index < count($game_list); $index++) : ?>
              <tr>
                <td><?= ($index + 1) ?></td>
                <td><?= $game_list[$index]['game_category_name'] ?></td>
                <td><?= $game_list[$index]['game_title'] ?></td>
                <td><?= $game_list[$index]['attendance_flag'] ?></td>
                <td>
<?php   if ($can_edit) : ?>
                  <button type="button" data-game_id="<?= $game_list[$index]['id'] ?>" class="btn btn-xs btn-primary btn-game-stop">受付停止する</button>
<?php   endif; ?>
                </td>
              </tr>
<?php endfor; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php echo form_hidden('game_id'); ?>
  <?php echo form_close(); ?>

</div>

<script type="text/javascript">
$(function() {

<?php if ($can_edit) : ?>
  $('.btn-game-stop').on('click', function() {
    var game_id = $(this).data('game_id');
    $('input[name=game_id]').val(game_id);
    $('#form').submit();
  });
<?php endif; ?>

});
</script>