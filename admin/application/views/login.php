<!DOCTYPE html>
<html lang="ja">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/css/all.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/css/custom.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/css/metisMenu.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/css/startmin.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="format-detection" content="telephone=no">

  <title>Alpha Book 管理システム</title>

</head>
<style>
  .login {
    position: relative;
    margin: 30px auto;
    padding: 20px 20px 20px;
    width: 310px;
    background: white;
    border-radius: 3px;
    -webkit-box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);
  }

  .login:before {
    content: '';
    position: absolute;
    top: -8px;
    right: -8px;
    bottom: -8px;
    left: -8px;
    z-index: -1;
    background: rgba(0, 0, 0, 0.08);
    border-radius: 4px;
  }

  .login h1 {
    margin: -20px -20px 21px;
    line-height: 40px;
    font-size: 15px;
    font-weight: bold;
    color: #555;
    text-align: center;
    text-shadow: 0 1px white;
    background: #f3f3f3;
    border-bottom: 1px solid #cfcfcf;
    border-radius: 3px 3px 0 0;
    background-image: -webkit-linear-gradient(top, whiteffd, #eef2f5);
    background-image: -moz-linear-gradient(top, whiteffd, #eef2f5);
    background-image: -o-linear-gradient(top, whiteffd, #eef2f5);
    background-image: linear-gradient(to bottom, whiteffd, #eef2f5);
    -webkit-box-shadow: 0 1px whitesmoke;
    box-shadow: 0 1px whitesmoke;
  }

  .login p {
    margin: 20px 0 0;
  }

  .login p:first-child {
    margin-top: 0;
  }

  .login input[type=text],
  .login input[type=password] {
    width: 278px;
  }

  .login p.remember_me {
    float: left;
    line-height: 31px;
  }

  .login p.remember_me label {
    font-size: 12px;
    color: #777;
    cursor: pointer;
  }

  .login p.remember_me input {
    position: relative;
    bottom: 1px;
    margin-right: 4px;
    vertical-align: middle;
  }

  .login p.submit {
    text-align: right;
  }

  .login-help {
    margin: 20px 0;
    font-size: 11px;
    color: white;
    text-align: center;
    text-shadow: 0 1px #2a85a1;
  }

  .login-help a {
    color: #cce7fa;
    text-decoration: none;
  }

  .login-help a:hover {
    text-decoration: underline;
  }

  :-moz-placeholder {
    color: #c9c9c9 !important;
    font-size: 13px;
  }

  ::-webkit-input-placeholder {
    color: #ccc;
    font-size: 13px;
  }

  input {
    font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;
    font-size: 14px;
  }

  input[type=text],
  input[type=password] {
    margin: 5px;
    padding: 0 10px;
    width: 200px;
    height: 34px;
    color: #404040;
    background: white;
    border: 1px solid;
    border-color: #c4c4c4 #d1d1d1 #d4d4d4;
    border-radius: 2px;
    outline: 5px solid #eff4f7;
    -moz-outline-radius: 3px;
    -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
    margin-left: -5px;
  }

  input[type=text]:focus,
  input[type=password]:focus {
    border-color: #7dc9e2;
    outline-color: #dceefc;
    outline-offset: 0;
  }

  input[type=submit] {
    padding: 0 18px;
    height: 29px;
    font-size: 12px;
    font-weight: bold;
    color: #527881;
    text-shadow: 0 1px #e3f1f1;
    background: #cde5ef;
    border: 1px solid;
    border-color: #b4ccce #b3c0c8 #9eb9c2;
    border-radius: 16px;
    outline: 0;
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    background-image: -webkit-linear-gradient(top, #edf5f8, #cde5ef);
    background-image: -moz-linear-gradient(top, #edf5f8, #cde5ef);
    background-image: -o-linear-gradient(top, #edf5f8, #cde5ef);
    background-image: linear-gradient(to bottom, #edf5f8, #cde5ef);
    -webkit-box-shadow: inset 0 1px white, 0 1px 2px rgba(0, 0, 0, 0.15);
    box-shadow: inset 0 1px white, 0 1px 2px rgba(0, 0, 0, 0.15);
  }

  input[type=submit]:active {
    background: #cde5ef;
    border-color: #9eb9c2 #b3c0c8 #b4ccce;
    -webkit-box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
  }

  .lt-ie9 input[type=text],
  .lt-ie9 input[type=password] {
    line-height: 34px;
  }

  body {
    background-color: #333;
  }

  #wrapper {
    width: 100%;
    background-color: #333;
    margin-top: 20%;
  }
</style>

<body>

  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Alpha Book</a>
      </div>

      <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>ログイン<b class="caret"></b>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fas fa-sign-out-alt"></i>変更</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i>ログアウト</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.navbar-top-links -->
    </nav>
    <div class="login">
      <h1>Alpha Book</h1>
      <?php echo form_open('login'); ?>
<?php if (isset($error_message)) : ?>
        <div><?php echo $error_message; ?></div>
<?php endif; ?>
        <?php echo validation_errors(); ?>
        <p><?php echo form_input('user_id', $input_data['user_id'], array('placeholder' => 'ログインID')); ?></p>
        <p><?php echo form_password('password', '', array('placeholder' => 'パスワード')); ?></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me" value="1" <?php echo ($input_data['remember_me'] == '1') ? 'checked' : ''; ?>>
            パスワードを保存する
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="ログイン"></p>
      <?php echo form_close(); ?>
    </div>

    <div class="login-help">
      <p>パスワードをお忘れですか？<a href="#">パスワードをお忘れの方はこちら</a></p>
    </div>

  </div>
  <!-- /#page-wrapper -->

  <script>
  </script>
</body>

</html>