<style type="text/css">
  /* パネル用ヘッダーフォントサイズ */
  /* 第一階層 */
  .brv-ph1 {
    font-size: 18px;
    font-weight: bold;
    /* color: blue; */
  }

  /* 第二階層 */
  .brv-ph2 {
    font-size: 18px;
    font-weight: bold;
    /* color: red; */
  }

  /* *用 */
  .brv-r {
    font-size: 18px;
    color: #a94442;
    /*red;*/
    vertical-align: -20%;
  }

  /* テーブルヘッダ */
  .brv-th {
    font-size: 16px;
    /* color: blue; */
  }

  /* テーブル横幅 */
  /* .col-sm-3 {
    width: auto;
  } */

  .col-sm-1 {
    width: 13%;
  }

  .wid2 {
    width: 5%;
  }

  .col-sm-3 {
    width: 18%;
  }

  /* テーブルフォントカラー */
  .brv-td-red {
    color: red;
  }

  /*お知らせ*/
  .news_tex {
    border-bottom: 1px solid #333;
  }

  .news {
    list-style: none;
  }

  .info_1 a:after {
    content: "4";
    color: #fff;
    background: crimson;
    margin-right: 5px;
    margin-left: 5px;
    /* font-weight: 700; */
    line-height: 0.9;
    width: 20px;
    text-align: center;
    height: 20px;
    padding: 5px;
    border-radius: 50%;
    display: inline-block;
  }

  .news {
    list-style: none;
    padding: 5px;
  }

  .fa-plus:before {
    content: "\f067";
    /* text-align: left; */
    margin-right: 20px;
  }

  .container-fluid {
    padding-right: 0px;
    padding-left: 0px;
  }

  /*検索結果*/
  .col-lg-6 {
    margin-top: 20px;
  }

  .btn-primary a {
    color: #fff;
  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">ゲーム一覧</h1>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="brv-ph1">ゲーム検索</span>
    </div>
    <div class="panel-body">
      <?php echo form_open('', array('id' => 'form')); ?>
        <div class="row">
          <div class="col-sm-12">

            <div class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-1">タイプ</label>

                <div class="col-sm-1">
                  <?php echo form_dropdown('game_type_id', $game_type_list, $search_data['game_type_id'], array('class' => 'form-control')); ?>
                </div>
                <label class="control-label col-sm-1">カテゴリー</label>
                <div class="col-sm-2">
                  <?php echo form_dropdown('game_category_id', array(), null, array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-1">ゲーム名</label>
                <div class="col-sm-2">
                  <?php echo form_input('game_name', $search_data['game_name'], array('class' => 'form-control')); ?>
                </div>

              </div>

              <div class="form-group">
                <label class="control-label col-sm-1">ベット数</label>
                <div class="col-sm-1">
                  <?php echo form_dropdown('bet_count', $bet_count_list, $search_data['bet_count'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-1">合計金額</label>
                <div class="col-sm-2">
                  <?php echo form_dropdown('total_money', $total_money_list, $search_data['total_money'], array('class' => 'form-control')); ?>
                </div>

                <label class="control-label col-sm-1">ステータス</label>
                <div class="col-sm-1">
                  <?php echo form_dropdown('game_status', $game_status_list, $search_data['game_status'], array('class' => 'form-control')); ?>
                </div>
              </div>

            </div>

          </div>
        </div>

        <div class="col-sm-12 text-center">
          <button type="submit" class="btn btn-primary" id="entry" style="width: 150px;">検索</button>
        </div>

      <?php echo form_close(); ?>
    </div>

  </div>
  <!-- /.row (nested) -->
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <span class="brv-ph1">ゲーム一覧</span>
<?php if ($can_edit) : ?>
    <a href="<?= base_url('manage/game_regist') ?>"><button class="add_btn"><i class="fas fa-plus"></i>新規追加</button></a>
<?php endif; ?>
  </div>
  <table class="table table-bordered table-striped" style="margin-bottom: 0px;">
    <thead>
      <tr>
        <th class="col-sm-1 wid2"><span class="brv-th">列</span></th>
        <th class="col-sm-1"><span class="brv-th">タイプ</span></th>
        <th class="col-sm-1"><span class="brv-th">カテゴリー</span></th>
        <th class="col-sm-3"><span class="brv-th">ゲーム名</span></th>
        <th class="col-sm-1"><span class="brv-th">ベット人数</span></th>
        <th class="col-sm-1"><span class="brv-th">合計金額</span></th>
        <th class="col-sm-1"><span class="brv-th">ステータス</span></th>
        <th class="col-sm-1 wid2"><span class="brv-th">詳細</span></th>
      </tr>
    </thead>
    <tbody>
<?php for ($index = 0; $index < count($game_list); $index++): ?>
      <tr>
        <td><?= $index + 1 ?></td>
        <td><?= $game_list[$index]['game_type'] ?></td>
        <td><?= $game_list[$index]['game_category_name'] ?></td>
        <td><?= $game_list[$index]['game_title'] ?></td>
        <td><?= $game_list[$index]['bet_count'] ?> 人</td>
        <td><?= $game_list[$index]['total_money'] ?> 円</td>
        <td><?= $game_list[$index]['game_status'] ?></td>
        <td>
          <a href="<?= base_url('manage/game/') . '?id=' . $game_list[$index]['id'] ?>" class="btn btn-xs btn-primary">詳細</a>
        </td>
      </tr>
<?php endfor; ?>
    </tbody>
  </table>
</div>

<script>
  var category = [
    {'type_id': -1, 'category_id': -1, 'category_name': ''}
<?php foreach ($game_category_list as $game_category) : ?>,{'type_id': '<?= $game_category['game_type_id'] ?>', 'category_id': '<?= $game_category['id'] ?>', 'category_name': '<?= $game_category['game_category_name'] ?>'}<?php endforeach; ?>
  ];
</script>
<script>
  $(function() {

    $('select[name=game_type_id]').change(function() {
      var game_type_id = $(this).val();
      var $category_select = $('select[name=game_category_id]');
      $category_select.empty();
      $option = $('<option>');
      $option.val('');
      $option.text('選択');
      $category_select.append($option);

      $.each(category, function(index, value) {
        if (game_type_id == value['type_id']) {
          $option = $('<option>');
          $option.val(value['category_id']);
          $option.text(value['category_name']);
          $category_select.append($option);
        }
      });
    });

<?php if (!empty($search_data['game_category_id'])) : ?>
    $('select[name=game_type_id]').change();
    var selected_category = '<?= $search_data['game_category_id'] ?>';
    $('select[name=game_category_id]').val(selected_category);
<?php endif; ?>
  });
</script>
