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

  .wid2 {
    width: 5%;
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

  .full {
    width: 90%;
  }

  .full2 {
    width: 80%;
  }
</style>

<div class="container-fluid">
  <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'form')); ?>
    <?php echo form_hidden('id', $input_data['id']); ?>
    <?php echo form_hidden('game_status', $input_data['game_status']); ?>
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><?= $page_caption ?></h1>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <span class="brv-ph1">ゲーム情報入力</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">

            <div class="form-group">
              <label class="control-label col-sm-1">タイプ</label>
              <div class="col-sm-2">
                <?php echo form_dropdown('game_type_id', $game_type_list, $input_data['game_type_id'], array('class' => 'form-control')); ?>
              </div>
              <label class="control-label col-sm-1">カテゴリー</label>
              <div class="col-sm-2">
                <?php echo form_dropdown('game_category_id', array(), null, array('class' => 'form-control')); ?>
              </div>
            </div>

            <div class="form-group game_type_fields game_type1">
              <label class="control-label col-sm-1">場所</label>
              <div class="col-sm-2">
                <select class="form-control" name="game_home_team">
                  <option value="1">ホーム</option>
                  <option value="2">アウェイ</option>
                </select>
              </div>
            </div>

            <div class="game_type_fields game_type1">
              <div class="form-group">
                <label class="control-label col-sm-1">対戦</label>
                <div class="col-sm-2">
                  <?php echo form_input('game_team1', $input_data['game_team1'], array('class' => 'form-control')); ?>
                </div>
                <label class="control-label pull-left text-center">VS</label>
                <div class="col-sm-2">
                  <?php echo form_input('game_team2', $input_data['game_team2'], array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>

            <div class="game_type_fields game_type2">
              <div class="row">
                <label class="control-label col-sm-1">出場番号</label>
                <?php echo form_hidden('race_count', $input_data['race_count']); ?>
                <div class="col-sm-10">
                  <div class="control_box row">
                    <div class="col-sm-2 race_item race_template">
                      <div class="form-group">
                        <div class="col-sm-7 pr-0">
                          <input type="text" class="form-control">
                        </div>
                        <span class="col-sm-1 control-label px-0">番</span>
                        <div class="col-sm-3">
                          <button type="button" class="btn btn-danger btn-race-remove">削除</button>
                        </div>
                      </div>
                    </div>

<?php for ($index = 1; $index <= $input_data['race_count']; $index++) : ?>
                    <div class="col-sm-2 race_item">
                      <div class="form-group">
                        <div class="col-sm-7 pr-0">
                          <input type="text" class="form-control" name="race[]" value="<?= $input_data['race' . $index] ?>">
                        </div>
                        <span class="col-sm-1 control-label px-0">番</span>
                        <div class="col-sm-3">
                          <button type="button" class="btn btn-danger btn-race-remove">削除</button>
                        </div>
                      </div>
                    </div>
<?php endfor; ?>

                  </div>
                </div>
                <div class="col-sm-1">

                  <button type="button" class="btn add_Btn2 btn-race-add"><i class="fas fa-plus"></i>追加</button>
                </div>
              </div>
            </div>

            <div class="game_type_fields game_type3">
              <div class="row">
                <div class="col-sm-1"></div>
                <?php echo form_hidden('stochastic_count', $input_data['stochastic_count']); ?>
                <div class="col-sm-10">
                  <div class="control_box row">
                    <div class="col-sm-3 stochastic_item stochastic_template">
                      <div class="form-group">
                        <label class="control-label col-sm-3 stochastic_label">対象1</label>
                        <div class="col-sm-7">
                          <input class="form-control">
                        </div>
                        <div class="col-sm-2">
                          <button type="button" class="btn btn-danger btn-stochastic-remove">削除</button>
                        </div>
                      </div>
                    </div>

<?php for ($index = 1; $index <= $input_data['stochastic_count']; $index++) : ?>
                    <div class="col-sm-3 stochastic_item">
                      <div class="form-group">
                        <label class="control-label col-sm-3 stochastic_label">対象<?= $index ?></label>
                        <div class="col-sm-7">
                          <input class="form-control" name="stochastic[]" value="<?= $input_data['stochastic'. $index] ?>">
                        </div>
                        <div class="col-sm-2">
                          <button type="button" class="btn btn-danger btn-stochastic-remove">削除</button>
                        </div>
                      </div>
                    </div>
<?php endfor; ?>

                  </div>
                </div>
                <div class="col-sm-1">
                  <button type="button" class="btn add_Btn2 btn-stochastic-add"><i class="fas fa-plus"></i>追加</button>
                </div>
              </div>
            </div>

            <div class="game_type_fields game_type4">
              <div class="form_box">
                <div class="form-group form-inline">
                  <label class="control-label col-sm-1">対象日選択</label>
                  <div class="col-sm-8 form_wid">
                    <input type="date"><input type="time">
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-1">アイキャッチ</label>
<?php if (is_empty_string($input_data['game_image_url'])) : ?>
              <div class="col-sm-3">
                <?php echo form_upload('game_image_url', null, array('accept' => '.png, .jpg, .jpeg', 'class' => 'form-control-sm')); ?>
              </div>
<?php endif; ?>
              <div class="col-sm-8 image_preview">
<?php if (!is_empty_string($input_data['game_image_url'])) : ?>
                <?php echo form_hidden('game_image_url_org', $input_data['game_image_url_org']); ?>
                <img src="<?= $input_data['game_image_url_src'] ?>">
<?php endif; ?>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-1">タイトル</label>
              <div class="col-sm-3">
                <?php echo form_input('game_title', $input_data['game_title'], array('class' => 'form-control')); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-1">サブタイトル</label>
              <div class="col-sm-3">
                <?php echo form_input('game_caption_h2', $input_data['game_caption_h2'], array('class' => 'form-control')); ?>
              </div>
            </div>

            <?php echo form_hidden('game_detail_count', $input_data['game_detail_count']); ?>
            <div class="game_details">

              <div class="row game_detail_item game_detail_template">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label class="control-label col-sm-1 game_detail_label">ゲーム詳細1</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control">
                    </div>
                    <div class="col-sm-3">
                      <button type="button" class="btn btn-danger btn-detail-remove">この詳細を削除</button>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-1">挿入画像</label>
                    <div class="col-sm-2">
                      <input type="file" class="form-control-sm" accept=".png, .jpg, .jpeg">
                    </div>
                    <div class="col-sm-2">
                      <button type="button" class="btn btn-danger btn-sm btn-detail-image-remove">画像削除</button>
                    </div>
                    <div class="col-sm-7 image_preview">

                    </div>
                  </div>
                </div>
              </div>

<?php for ($index = 0; $index < $input_data['game_detail_count']; $index++) : ?>
              <div class="row game_detail_item">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label class="control-label col-sm-1 game_detail_label">ゲーム詳細<?= ($index + 1) ?></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="game_detail[]" value="<?= $input_data['game_detail'][$index] ?>">
                    </div>
                    <div class="col-sm-3">
                      <button type="button" class="btn btn-danger btn-detail-remove">この詳細を削除</button>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-1">挿入画像</label>
                    <?php echo form_hidden('game_image_org[]', $input_data['game_image_org'][$index]); ?>
                    <div class="col-sm-2">
<?php   if (empty($input_data['game_image'][$index])) : ?>
                      <input type="file" class="form-control-sm" name="game_image[]" accept=".png, .jpg, .jpeg">
<?php   else : ?>
                      <button type="button" class="btn btn-danger btn-sm btn-detail-image-remove">画像削除</button>
<?php   endif; ?>
                    </div>
                    <div class="col-sm-7 image_preview">
<?php   if (!empty($input_data['game_image'][$index])) : ?>
                      <img src="<?= $input_data['game_image_src'][$index] ?>">
<?php   endif; ?>
                    </div>
                  </div>
                </div>
              </div>
<?php endfor; ?>

            </div>
            <div class="form-group">
              <div class="col-sm-12 text-right">
                <button type="button" class="btn add_Btn2 btn-detail-add"><i class="fas fa-plus"></i>詳細を追加</button>
              </div>
            </div>

            <div class="form-group" style="margin-top: 50px;">
              <label class="control-label col-sm-1">ゲーム開始日</label>
              <div class="col-sm-8">
                <input type="date" name="start_date_day" value="<?= $input_data['start_date_day'] ?>">
                <input type="time" name="start_date_time" value="<?= $input_data['start_date_time'] ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-1">ゲーム終了日</label>
              <div class="col-sm-8">
                <input type="date" name="end_date_day" value="<?= $input_data['end_date_day'] ?>">
                <input type="time" name="end_date_time" value="<?= $input_data['end_date_time'] ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-1">結果発表日</label>
              <div class="col-sm-8">
                <input type="date" name="game_result_date_day" value="<?= $input_data['game_result_date_day'] ?>">
                <input type="time" name="game_result_date_time" value="<?= $input_data['game_result_date_time'] ?>">
              </div>
            </div>

<?php if (!$is_new) : ?>
            <div class="form-group">
              <label class="control-label col-sm-1">結果</label>
              <div class="col-sm-2">
                <?php echo form_input('game_result', $input_data['game_result'], array('class' => 'form-control')); ?>
              </div>
            </div>
<?php endif; ?>
          </div>




        </div>
      </div>
    </div>


    <!-- 出力ボタン -->
    <?php echo validation_errors(); ?>
    <div class="row">
      <div class="col-sm-12 text-center" style="margin-top:40px;">
<?php if ($can_edit) : ?>
        <button type="submit" class="btn btn-primary btn-lg" style="width: 150px;">確認</button>
<?php endif; ?>
      </div>
    </div>

  <?php echo form_close(); ?>
  
</div>

<style>
  .game_type_fields {
    /* position: absolute; */
    display: none;
  }

  .race_template,
  .stochastic_template,
  .game_detail_template {
    display: none;
  }

  .add_Btn2 {
    background-color: #FF4633;
    color: #fff;
    border-radius: 4px;
  }

  .btn.focus,
  .btn:focus,
  .btn:hover {
    color: #fff;
    text-decoration: none;
  }

  .btn-danger {
    color: #fff;
    background-color: #828282;
    border-color: #828282;
    font-size: 10px;
    margin-top: 4px;
    padding: 5px;
  }
</style>

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
      $('.game_type_fields:visible').hide();
      $('.game_type' + game_type_id).fadeIn();

      var $category_select = $('select[name=game_category_id]');
      $category_select.empty();
      $.each(category, function(index, value) {
        if (game_type_id == value['type_id']) {
          $option = $('<option>');
          $option.val(value['category_id']);
          $option.text(value['category_name']);
          $category_select.append($option);
        }
      });
    });

    var $game_home_team_select = $('select[name=game_home_team]');
    var selected_home_team = '';
<?php if (!empty($input_data['game_home_team']) && $input_data['game_home_team'] == 1) : ?>
    selected_home_team = '1';
<?php elseif (!empty($input_data['game_away_team']) && $input_data['game_away_team'] == 1) : ?>
    selected_home_team = '2';
<?php endif; ?>
    if (selected_home_team != '') {
      $game_home_team_select.val(selected_home_team);
    }
  
<?php if (!empty($input_data['game_category_id'])) : ?>
    $('select[name=game_type_id]').change();
    var selected_category = '<?= $input_data['game_category_id'] ?>';
    $('select[name=game_category_id]').val(selected_category);
<?php endif; ?>
  });
</script>

<script type="text/javascript">
  var minCountRace = 0;
  var maxCountRace = 10;

  $(function() {
    $('.btn-race-add').on('click', function () {
      var inputCount = $('input[name=race_count]').val();
      if (!inputCount) {
        inputCount = 0;
      }
      if (inputCount < maxCountRace) {
        var $controlBox = $('.game_type2 .control_box');
        var $template = $('.race_template').clone(true);
        $template.removeClass('race_template');
        inputCount++;
        $template.find('input[type=text]').prop('name', 'race[]');
        $('input[name=race_count]').val(inputCount);

        $controlBox.append($template);
      }
    });
    $('.btn-race-remove').on('click', function () {
      var $item = $(this).closest('.race_item');
      $item.remove();
      var inputCount = $('input[name=race_count]').val();
      if (inputCount > minCountRace) {
        $('input[name=race_count]').val(inputCount-1);
      }
    });
  });
</script>
<script type="text/javascript">
  var minCountStochastic = 0;
  var maxCountStochastic = 10;

  $(function () {
    $('.btn-stochastic-add').on('click', function () {
      var inputCount = $('input[name=stochastic_count]').val();
      if (!inputCount) {
        inputCount = 0;
      }
      if (inputCount < maxCountStochastic) {
        var $controlBox = $('.game_type3 .control_box');
        var $template = $('.stochastic_template').clone(true);
        $template.removeClass('stochastic_template');
        inputCount++;
        $template.find('.stochastic_label').text('対象' + inputCount);
        $template.find('input[type=text]').prop('name', 'stochastic[]');
        $('input[name=stochastic_count]').val(inputCount);

        $controlBox.append($template);
      }
    });
    $('.btn-stochastic-remove').on('click', function () {
      var $item = $(this).closest('.stochastic_item');
      $item.remove();
      var inputCount = $('input[name=stochastic_count]').val();
      if (inputCount > minCountStochastic) {
        $('input[name=stochastic_count]').val(inputCount-1);
      }
      $('.game_type3 .control_box .stochastic_item:visible').each(function(index, element) {
        $(element).find('.stochastic_label').text('対象' + (index + 1));
      });
    });
  });
</script>
<script type="text/javascript">
  var minCountDetail = 0;
  var maxCountDetail = 10;

  $(function () {
    $('.btn-detail-add').on('click', function () {
      var inputCount = $('input[name=game_detail_count]').val();
      if (!inputCount) {
        inputCount = 0;
      }
      if (inputCount < maxCountDetail) {
        var $controlBox = $('.game_details');
        var $template = $('.game_detail_template').clone(true);
        $template.removeClass('game_detail_template');
        inputCount++;
        $template.find('.game_detail_label').text('ゲーム詳細' + inputCount);
        $template.find('input[type=text]').prop('name', 'game_detail[]');
        $template.find('input[type=file]').prop('name', 'game_image[]');
        $template.find('input[type=file]').on('change', function() {
          changeImage(this, $template.find('.image_preview'));
        });
        $('input[name=game_detail_count]').val(inputCount);

        $controlBox.append($template);
      }
    });
    $('.btn-detail-remove').on('click', function () {
      var $item = $(this).closest('.game_detail_item');
      $item.remove();
      var inputCount = $('input[name=game_detail_count]').val();
      if (inputCount > minCountDetail) {
        $('input[name=game_detail_count]').val(inputCount-1);
      }
      $('.game_details .game_detail_item:visible').each(function(index, $element) {
        $(element).find('.game_detail_label').text('ゲーム詳細' + (index + 1));
      });
    });
  });
</script>
<script type="text/javascript">
  function changeImage(element, $preview) {
    var reader = new FileReader();
    reader.onload = function (e) {
      var $img = $('<img>');
      $img.attr('src', e.target.result);
      $preview.empty();
      $preview.append($img);
    }
    reader.readAsDataURL(element.target.files[0]);
  }
</script>
