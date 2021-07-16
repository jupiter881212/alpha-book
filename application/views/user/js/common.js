$(document).on('click', function(e) {
	// ２．クリックされた場所の判定
	if(!$(e.target).closest('.css-1ulhrc8').length && !$(e.target).closest('.css-9ncwx').length){
		$('.css-1ulhrc8').fadeOut();
	}else if($(e.target).closest('.css-9ncwx').length){
		// ３．ポップアップの表示状態の判定
		if($('.css-1ulhrc8').is(':hidden')){
			$('.css-1ulhrc8').fadeIn();
		}else{
			$('.css-1ulhrc8').fadeOut();
		}
	}
});
$(document).on('click', function(e) {
	// ２．クリックされた場所の判定
	if(!$(e.target).closest('.menusl').length && !$(e.target).closest('.menu').length){
		$('.menusl').fadeOut();
	}else if($(e.target).closest('.menu').length){
		// ３．ポップアップの表示状態の判定
		if($('.menusl').is(':hidden')){
			$('.menusl').fadeIn();
		}else{
			$('.menusl').fadeOut();
		}
	}
});
$(document).on('click', function(e) {
	// ２．クリックされた場所の判定
	if(!$(e.target).closest('.menusl2').length && !$(e.target).closest('.menu2').length){
		$('.menusl2').fadeOut();
	}else if($(e.target).closest('.menu2').length){
		// ３．ポップアップの表示状態の判定
		if($('.menusl2').is(':hidden')){
			$('.menusl2').fadeIn();
		}else{
			$('.menusl2').fadeOut();
		}
	}
});
$(document).on('click', function(e) {
	// ２．クリックされた場所の判定
	if(!$(e.target).closest('.menusl3').length && !$(e.target).closest('.menu3').length){
		$('.menusl3').fadeOut();
	}else if($(e.target).closest('.menu3').length){
		// ３．ポップアップの表示状態の判定
		if($('.menusl3').is(':hidden')){
			$('.menusl3').fadeIn();
		}else{
			$('.menusl3').fadeOut();
		}
	}
});
$(document).on('click', function(e) {
	// ２．クリックされた場所の判定
	if(!$(e.target).closest('.menusl4').length && !$(e.target).closest('.menu4').length){
		$('.menusl4').fadeOut();
	}else if($(e.target).closest('.menu4').length){
		// ３．ポップアップの表示状態の判定
		if($('.menusl4').is(':hidden')){
			$('.menusl4').fadeIn();
		}else{
			$('.menusl4').fadeOut();
		}
	}
});
$(document).on('click', function(e) {
	// ２．クリックされた場所の判定
	if(!$(e.target).closest('.menusl5').length && !$(e.target).closest('.menu5').length){
		$('.menusl5').fadeOut();
	}else if($(e.target).closest('.menu5').length){
		// ３．ポップアップの表示状態の判定
		if($('.menusl5').is(':hidden')){
			$('.menusl5').fadeIn();
		}else{
			$('.menusl5').fadeOut();
		}
	}
});
$(document).on('click', function(e) {
	// ２．クリックされた場所の判定
	if(!$(e.target).closest('.menusl6').length && !$(e.target).closest('.menu6').length){
		$('.menusl6').fadeOut();
	}else if($(e.target).closest('.menu6').length){
		// ３．ポップアップの表示状態の判定
		if($('.menusl6').is(':hidden')){
			$('.menusl6').fadeIn();
		}else{
			$('.menusl6').fadeOut();
		}
	}
});
jQuery(function(){
    var jSelect = jQuery(".menusl");
    var jParent = jSelect.parent();
    jQuery("body").append(jSelect);
    jSelect.position({
      my: "left top", at: "left top", of: jParent, offset: "-20 -10"
    });
});
jQuery(function(){
    var jSelect = jQuery(".menusl2");
    var jParent = jSelect.parent();
    jQuery("body").append(jSelect);
    jSelect.position({
      my: "left top", at: "left top", of: jParent, offset: "-20 -10"
    });
});
jQuery(function(){
    var jSelect = jQuery(".menusl3");
    var jParent = jSelect.parent();
    jQuery("body").append(jSelect);
    jSelect.position({
      my: "left top", at: "left top", of: jParent, offset: "-20 -10"
    });
});
jQuery(function(){
    var jSelect = jQuery(".menusl4");
    var jParent = jSelect.parent();
    jQuery("body").append(jSelect);
    jSelect.position({
      my: "left top", at: "left top", of: jParent, offset: "-20 -10"
    });
});
jQuery(function(){
    var jSelect = jQuery(".menusl5");
    var jParent = jSelect.parent();
    jQuery("body").append(jSelect);
    jSelect.position({
      my: "left top", at: "left top", of: jParent, offset: "-20 -10"
    });
});
jQuery(function(){
    var jSelect = jQuery(".menusl6");
    var jParent = jSelect.parent();
    jQuery("body").append(jSelect);
    jSelect.position({
      my: "left top", at: "left top", of: jParent, offset: "-20 -10"
    });
});
jQuery(function ($) {
  $('.js-accordion-title').on('click', function () {
    /*クリックでコンテンツを開閉*/
    $(this).next().slideToggle(200);
    /*矢印の向きを変更*/
    $(this).toggleClass('open', 200);
  });
  
});
$(function () {
	$('.button').prevAll().hide();
	$('.button').click(function () {
			if ($(this).prevAll().is(':hidden')) {
					$(this).prevAll().slideDown();
					$(this).text('閉じる').addClass('close');
			} else {
					$(this).prevAll().slideUp();
					$(this).text('もっと見る').removeClass('close');
			}
	});
});