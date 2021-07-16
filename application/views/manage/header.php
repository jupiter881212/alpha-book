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

  <title><?= $page_title ?></title>
</head>

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
            <i class="fa fa-user fa-fw"></i><?= $user_name ?><b class="caret"></b>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fas fa-sign-out-alt"></i>変更</a></li>
            <li><a href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt"></i>ログアウト</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.navbar-top-links -->

      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
<?php foreach($menu as $item): ?>
<?php   if(array_key_exists('items', $item)): ?>
            <ul class="dropdown">
              <li class=""><?= $item['name'] ?><i id="arrow" class="fas fa-caret-right"></i>
                <ul class="submenu">
<?php     foreach($item['items'] as $subitem): ?>
                  <li><a href="<?= base_url($subitem['menu_id']) ?>"><?= $subitem['name'] ?></a></li>
<?php     endforeach; ?>
                </ul>
              </li>
            </ul>
<?php   else: ?>
            <li class="collapsed" aria-expanded="false">
              <a href="<?= base_url($item['menu_id']) ?>"><?= $item['name'] ?></a>
            </li>
<?php   endif; ?>
<?php endforeach; ?>
          </ul>
        </div>
      </div>
    </nav>
    <div id="page-wrapper" style="min-height: 830px;">
