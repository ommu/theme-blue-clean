/*
(function($) {
	var map;
	var haightAshbury = new google.maps.LatLng(-7.778435, 110.366586);
    var mapOptions = {
      zoom: 13,
      center: haightAshbury,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    setTimeout(function() {
        map = new google.maps.Map(document.getElementById('mapView'), mapOptions);

        //addMarkers(props, map);
    }, 300);

})(jQuery);
*/

/*custom.js
Adding custom javascript or jquery function
* Copyright (c) 2014, Ommu Platform. All rights reserved.
* version: 0.0.1
*/

//Global Variable
var o = $.parseJSON(globals);
var baseUrl = o.baseUrl;
var lastTitle = o.lastTitle;
var lastDescription = o.lastDescription;
var lastKeywords = o.lastKeywords;
var lastUrl = o.lastUrl;
var contentOther = o.contentOther;

var windowHeight = $(window).height();

//check whether submit button save is click, prevent double post save
var isEnableSave = 0;

//button save click
function setEnableSave() {
	isEnableSave = 1;
}

/**
 * form function
 */
//count total json (obj)
function countProperties(obj) {
	var prop;
	var propCount = 0;

	for (prop in obj) {
		propCount++;
	}
	return propCount;
}

//find existed string
function strpos (haystack, needle) {
	var i = (haystack+'').indexOf(needle, 0);
	return i === -1 ? false : i;
}

//clear input
function clearInput(form) {
	$(form).find(':input').each(function() {
		switch(this.type) {
			case 'password':
			case 'select-multiple':
			case 'select-one':
			case 'text':
			case 'textarea':
				$(this).val('');
				break;
			case 'checkbox':
			case 'radio':
				this.checked = false;
		}
	});
}

/**
 * dialog function
 */
//show loading
function loadingShow() {
	if($('div[name="dialog-wrapper"]').html() == '' && $('div[name="notifier-wrapper"]').html() == '') {
		$('div.loading').addClass('load').fadeIn();
	} else {
		$('div.loading').fadeIn();
	}
}

//hide loading
function loadingHidden() {
	$('div.loading').hide().removeClass('load');
}

//show dialog
function dialogShow(content, dialog, width) {
	loadingHidden();
	$('div#ajax-message').html('');
	if(dialog == 1) {
		$('div.dialog').show().attr('name', width);
		$('div.dialog div.content').attr('id', width);
		$('div.dialog div.content').html(content);
	} else {
		$('div.notifier').show().attr('name', width);
		$('div.notifier div.content').attr('id', width);
		$('div.notifier div.content').html(content);
	}
	
	dialogActionClosed();
}

//pushState function
function pushStateBar(title, description, keywords, url) {
	var stateObj = {foo: "bar"};
	history.pushState(stateObj, title, url);
	$('title').html(title);
	$('meta[name="description"]').attr('content', description);
	$('meta[name="keywords"]').attr('content', keywords);
}

//hide dialog
function dialogClosed() {
	$('body').attr('style', '');
	$('div.dialog').fadeOut().attr('id','').attr('name','');
	$('div.dialog .dialog-box .content').html('').attr('id', '');
}
//hide notifier
function notifierClosed() {
	if($('div[name="dialog-wrapper"]').html() == '') {
		$('body').attr('style', '');
	}
	$('div.notifier').fadeOut().attr('name','');
	$('div.notifier .dialog-box .content').html('').attr('id', '');
}
function dialogClosedPush() {
	pushStateBar(lastTitle, lastDescription, lastKeywords, lastUrl);
}

//dialog close action
function dialogActionClosed() {
	$('.dialog .dialog-box a.closed, .dialog .dialog-box input#closed').click(function(){
		dialogClosed();
		dialogClosedPush();
	});
	$('.notifier .dialog-box input#closed').click(function(){
		notifierClosed();
		if($('div[name="dialog-wrapper"]').html() == '') {
			dialogClosedPush();
		}
	});
	/* $("div.dialog .dialog-box .content").mouseup(function() {
		return false
	});
	//clode dialog
	$(document).mouseup(function(e) {
		if($(e.target).parent("div.dialog .dialog-box .content").length==0) {
			dialogClosed();
			dialogClosedPush();
		}
	}); */
}

/**
 * Ajax global function
 ** dialogAjax
 ** ajaxFunction
 */
function dialogAjax(url, type) {
	//url = link ajax
	//loadingShow();
	$.ajax({
		type: 'get',
		url: url,
		dataType: 'json',
		success: function(response) {
			//loadingHidden();
			$('*[href="'+url+'"]').removeClass('loader');
			replaceContent(response, type, url);
		},
        error: function(jqXHR, textStatus, error) {
			location.href = url;
        }
	});	
}
function ajaxFunction() {
	$(window).on("popstate", function(e) {
		if (e.originalEvent.state !== null) {
			dialogAjax(location.href, 0);
		}
	});

	// Default url push
	$(document).on('click', 'a:not("[off_address]")', function() {
		var url = $(this).attr('href');
		if (typeof(url) != 'undefined') {
			if(url != '#') {
				if(url != 'javascript:void(0);') {
					$(this).addClass('loader');
					dialogAjax(url, 1);				
				} else {
					return false;
				}
			} else {
				return false;
			}
			return false;
		}
		return false;
	});
	
	// Custom show dialog
	$(document).on('click', 'a.link-dialog', function() {
		var id = $(this).attr('id');
		var width = $(this).attr('rel');
		var url = $(this).attr('href');
		if (typeof(url) != 'undefined') {
			if(url != 'javascript:void(0);') {
				dialogAjax(url, 1);
			} else {
				var content = $('.open-dialog-'+id).html();
				dialogShow(content, 2, width+'px');
			}
			return false;
		}
		return false;
	});	
}
//ajaxFunction();

$(document).ready(function() {

	if(o.dialogConstruction == 0) {
		dialogActionClosed();
	}
	
	if (typeof(contentOther) != 'undefined') {
		$.each(contentOther, function(key, val) {
			if(val.type == 1) {
				$.ajax({
					type: 'get',
					url: val.url,
					dataType: 'json',
					success: function(response) {
						formRenderResult(response, val.url);
						//$(val.id).html(response);
					}
				});
			} else {
				$(val.id).html(val.data);
			}
		});
	}

	/**
	 * For general ajax submit
	 * redirect
	 *
	 * type
	 *	0 [show message]
	 *	1 [update grid-view]
	 *	2 [replace spesific and galery upload]
	 *	5 [replace content or show dialog]
	 *	
	 *	msg [0,1,5] => message 
	 *	id [1,2,5] => attribute id (html)
	 *	get [2,5] => url	 
	 *	value [0] => 0,1
	 *	notifier [2] => off
	 *	dialog [2] => off
	 *	parent [2] => on
	 *	element [2] => [element html or attribute]
	 *	data [2] => [html sintag]
	 *	clear [5] => off
	 *
	 *	//3 [hide media-render]
	 *	4 [hide parent div]
	 *	//6 [replace header]
	 *	7 [spesific replace]
	 *
	 */ 

	// Dialog and General Function Form
	$('div[name="post-on"] form, .dialog form:not("[on_post]"), .notifier form:not("[on_post]"), form[keyup]').submit(function(event) {
		$(this).find('input[type="submit"]').addClass('active');
		var attrSave = '?&enablesave=' + isEnableSave;
		//var attrSave = '/enablesave/' + isEnableSave;
		var method  = $(this).attr('method');
		var link = $(this).attr('action');
		if(method == 'post')
			var url = $(this).attr('action') + attrSave;
		else
			var url = link;

		//Show Loading
		if(method == 'post')
			loadingShow();

		//if(method != 'get') {
			var options = {
				type: method,
				dataType: 'json',
				data:$(this).serialize(),
				success: function(response) {
					//Hide Loading
					if(method == 'post')
						loadingHidden();

					var hasError = 0;
					if(countProperties(response) > 0) {
						for(i in response) {
							if(strpos(i,'_'))
								hasError = 1;
						}
						if(hasError == 1) {
							$('form[action="'+link+'"]').find('input[type="submit"]').removeClass('active');

							$('form[action="'+link+'"]').find('div.errorMessage').hide().html('');
							$('form[action="'+link+'"]').find('textarea').removeClass('error');
							$('form[action="'+link+'"]').find('input').removeClass('error');
							for(i in response) {
								$('form[action="'+link+'"]').find('div#ajax-message').html(response.msg);
								$('form[action="'+link+'"] #' + i ).addClass('error');					
								$('form[action="'+link+'"] #' + i + '_em_').show().html(response[i][0]);
							}

						} else {
							$('form[action="'+link+'"]').find('input[type="submit"]').removeClass('active');

							$('form[action="'+link+'"]').find('div.errorMessage').hide().html('');
							$('form[action="'+link+'"]').find('textarea').removeClass('error');
							$('form[action="'+link+'"]').find('input').removeClass('error');

							if(response.type == 1) {
								dialogClosedPush();
							}
							if(response.redirect != null) {
								dialogClosed();
								notifierClosed();
								location.href = response.redirect;
							} else {
								formRenderResult(response, link);
							}
							//$.scrollTo("body", {duration: 800, axis:"y"});
						}
					}
				}
			}
			
			//if(method == 'post') {
				//options.data = $(this).serialize();
				//options.type = 'POST';
			//}
			$.ajax(url, options);
			event.preventDefault();
		//}
	});

	// Administrator Upload Photo
	var uploadphoto = $('a#uplaod-image').attr('href');
	if (typeof(uploadphoto) != 'undefined') {
		new AjaxUpload($('a#uplaod-image'), {
			// Arquivo que fará o upload
			action: uploadphoto,
			//Nome da caixa de entrada do arquivo
			name: 'namaFile',
			responseType: 'json',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
					// verificar a extensão de arquivo válido
					alert('Hanya file JPG, PNG or GIF yang dibolehkan.');
					return false;
				}
			},
			onComplete: function(file, response){
				$(response.id).attr('src', response.image);
			}
		});
	}
});

function replaceSpecificContent(data, link) {		
	if (typeof(data.notifier) == 'undefined')
		notifierClosed();
		
	if (typeof(data.dialog) == 'undefined')
		dialogClosed();
		
	if (typeof(data.get) != 'undefined') {
		$.ajax({
			type: 'get',
			url: data.get,
			dataType: 'json',
			//data: { id: '$id' },
			success: function(render) {
				$(data.id).html(render.data);
				//$('#'+data.id).html(render.data);
				mediaRenderFunction();
			}
		});
	
	} else {
		if (typeof(data.id) != 'undefined') {
			$(data.id).html(data.data);
			//$('#'+data.id).html(render.data);
			
		} else {
			if (typeof(data.parent) != 'undefined') {
				if (typeof(data.replaceHtml) != 'undefined') {
					if (typeof(data.replaceData) != 'undefined') {
						if (typeof(data.element) != 'undefined') {
							$('*[href="'+ link +'"]').parents(data.element).html(data.replaceData);
						} else {
							$('*[href="'+ link +'"]').parent().html(data.replaceData);
						}
					}
					if (typeof(data.replaceClass) != 'undefined') {
						if (typeof(data.element) != 'undefined') {
							$('*[href="'+ link +'"]').parents(data.element).attr('class', data.replaceClass);
						} else {
							$('*[href="'+ link +'"]').parent().attr('class', data.replaceClass);
						}
					}
					if (typeof(data.replaceUrl) != 'undefined') {
						$('*[href="'+ link +'"]').attr('href', data.replaceUrl);
					}
				} else {
					if (typeof(data.element) != 'undefined') {
						$('*[href="'+ link +'"]').parents(data.element).hide();
					} else {
						$('*[href="'+ link +'"]').parent().hide();
					}
				}
			} else {
				$(data.element).html(data.data);
			}																	
		}
		
		if (typeof(data.summaryPagerSelector) != 'undefined' && typeof(data.summaryPager) != 'undefined') {
			$(data.summaryPagerSelector).text(data.summaryPager);
		}
	}
}

function formRenderResult(response, link) {
	if(response.type == 0) {
		if(response.value == 1) {
			//js condition
		}
		$('div.form form div#ajax-message').html('');
		$('form[action="'+link+'"] div#ajax-message').html(response.msg);
		//$.scrollTo("div.body", {duration: 800, axis:"y"});

	} else if(response.type == 1) {
		var grid = $('#'+response.id).find('.grid-view').attr('id');
		$.fn.yiiGridView.update(grid);
		$('#'+response.id+' div#ajax-message').html(response.msg);
		clearInput('form[action="'+link+'"]');

	} else if(response.type == 2) {
		replaceSpecificContent(response, link);

	} else if(response.type == 3) {
		//js condition

	} else if(response.type == 4) {
		notifierClosed();
		dialogClosedPush();
		$('*[href="'+ link +'"]').parent('div').hide();

	} else if(response.type == 5) {
		$.ajax({
			type: 'get',
			url: response.get,
			dataType: 'json',
			success: function(render) {
				replaceContent(render, 1, link);
				if (typeof(response.id) != 'undefined') {
					$('#'+response.id+' div#ajax-message').html(response.msg);
				}
				if (typeof(response.clear) == 'undefined') {
					clearInput('form[action="'+link+'"]');
				}
			}
		});

	} else if(response.type == 6) {
		//js condition

	} else if(response.type == 7) {
		$.ajax({
			type: 'get',
			url: response.get,
			success: function(data) {
				$('#'+response.id).html(data);
				$('#'+response.id).find('div#ajax-message').html(response.msg);
			}
		});
	}
}

/**
 * jquery address function
 */
//show dialog
function replaceContent(data, type, link) {
	if(data.redirect != null) {
		location.href = data.redirect;
		
	} else {
		if (typeof(data.partial) != 'undefined') {
			if(type == 1)
				pushStateBar(data.title, data.description, data.keywords, data.address);
			
			if(data.page == 1)
				var content = data.render.content;
			else 
				var content = data.render;
			
			if(data.dialog == 0) {
				lastTitle = data.title;
				lastDescription = data.description;
				lastKeywords = data.keywords;
				lastUrl = data.address;
				dialogClosed();
				notifierClosed();
				
				$('div.body #content h1').html(data.titledoc);
				$('div.body #sidebar').html(data.header);
				$('div.body div.wrapper').html(content);

			} else {
				$('body').attr('style', 'overflow-y: hidden');
				if(data.dialog == 1) {
					$('div.dialog').attr('id', data.apps);
					notifierClosed();
				}
				dialogShow(content, data.dialog, data.dialogWidth);
			}
			mediaRenderFunction();

			if(data.page == 1) {
				$.each(data.render.other, function(key, val) {
					if(val.type == 1) {
						$.ajax({
							type: 'get',
							url: val.url,
							dataType: 'json',
							success: function(response) {
								formRenderResult(response, val.url);
								//$(val.id).html(response);
							}
						});
					} else {
						$(val.id).html(val.data);
					}
				});
			}

			if(data.script.cssFiles != '' || data.script.scriptFiles != '') {
				$('style[type="text/css"]').html('');
				$('style[type="text/css"]').html(data.script.cssFiles);
				$.when(
					$.each(data.script.scriptFiles, function(key, val) {
						$.getScript(val);
					})
				).then(function() {
				});
			}

			if(data.dialog != 0) {
				//$.scrollTo("body div.dialog, body div.notifier", {duration: 800, axis:"y"});		
			}	
			
		} else {
			/** 
			 * Other Load Page
			 *
			 * type
			 * 1 [pager load]
			 *
			 * attr
			 * renderType [1] =>
			 * renderSelector [1] =>
			 * nextPage [1] =>
			 * nextPageSelector [1] =>
			 * nextPageParent [1] =>
			 * summaryPager [1] =>
			 * summaryPagerSelector [1] =>
			 * 
			 **/
			if(data.type == 1) {
				$(data.renderSelector+' div.empty').hide();
				if(data.renderType == 1)
					$(data.renderSelector).append(data.data);
				else if(data.renderType == 2)
					$(data.renderSelector).prepend(data.data);
				else if(data.renderType == 3)
					$(data.renderSelector).after(data.data);
				else if(data.renderType == 4)
					$(data.renderSelector).before(data.data);
				
				if(data.nextPage != 0) {
					$(data.nextPageSelector).attr('href', data.nextPage);
				} else {
					if (typeof(data.nextPageParent) != 'undefined')
						$(data.nextPageSelector).parent('div').hide();
					else
						$(data.nextPageSelector).hide();
				}
				
				replaceSpecificContent(data, link);
				
			} else if(data.type == 2) {
				replaceSpecificContent(data, link);
			}
		}
	}
}

/**
 * Global Utility Function
 */
function mediaRenderFunction() {	
	var linkupload = $('a#upload-gallery').attr('href');
	if (typeof(linkupload) != 'undefined') {
		new AjaxUpload($('li#upload'), {
			// Arquivo que fará o upload
			action: linkupload,
			//Nome da caixa de entrada do arquivo
			name: 'namaFile',
			responseType: 'json',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
					// verificar a extensão de arquivo válido
					alert('Hanya file JPG, PNG or GIF yang dibolehkan.');
					return false;
				}
			},
			onComplete: function(file, response) {
				$.ajax({
					type: 'get',
					url: response.get,
					dataType: 'json',
					success: function(render) {
						$('#'+response.id).html(render.data);
						mediaRenderFunction();
					}
				});
			}
		});
	}
}
mediaRenderFunction();

/**
 * load content ground
 */
if(o.dialogGroundUrl != '') {
	$.ajax({
		type: 'get',
		url: o.dialogGroundUrl,
		dataType: 'json',
		success: function(data) {
			if(data.redirect != null) {
				location.href = data.redirect;
				
			} else {
				//render condition
				if(data.page == 1)
					var content = data.render.content;
				else 
					var content = data.render;

				if(data.dialog == 0) {
					lastTitle = data.title;
					lastDescription = data.description;
					lastKeywords = data.keywords;
					lastUrl = data.address;
					
					$('div.body #content h1').html(data.titledoc);
					$('div.body #sidebar').html(data.header);
					$('div.body div.wrapper').html(content);
				} else {
					$('body').attr('style', 'overflow-y: hidden');
					if(data.dialog == 1) {
						$('div.dialog').attr('id', data.apps);
					}
					dialogShow(content, data.dialog, data.dialogWidth);
				}

				if(data.page == 1) {
					$.each(data.render.other, function(key, val) {
						if(val.type == 1) {
							$.ajax({
								type: 'get',
								url: val.url,
								dataType: 'json',
								success: function(response) {
									formRenderResult(response, val.url);
									/*
									if(typeof(response.type) == 'undefined') {
										$(response.id).html(response.data);
									}
									$(val.id).html(response);
									*/
								}
							});
						} else {
							$(val.id).html(val.data);
						}
					});
				}

				if(data.script.cssFiles != '' || data.script.scriptFiles != '') {
					$('style[type="text/css"]').html('');
					$('style[type="text/css"]').html(data.script.cssFiles);
					$.when(
						$.each(data.script.scriptFiles, function(key, val) {
							$.getScript(val);
						})
					).then(function() {
					});
				}
			}
		},
        complete: function(xhr,status) {
        }
	});
}

/**
 * ScrollTo Function
 */
function scrollDefaultFunction() {
	/* Default ScrollTo */
	$('a').click(function(){
		var scroll = $(this).attr('name');
		//alert(scroll);
		if (typeof(scroll) != 'undefined') {
			if(scroll != null) {
				//$.scrollTo('#'+scroll, {duration: 800, axis:"y"});
				return false;
			}
		}
	});
}
scrollDefaultFunction();

/**
 * Global Utility Function
 */
function utilityFunction() {
	// Slider Function
	if (o.slide != 0) {
		if(o.slide == 1) {
			mainSlideFixed();
		}
		//mainSlider();
	}
	
	// Error Dialog Fixed Formulir Type
	$('.dialog#module form.form div.errorMessage').hover(function(){
		var text = $(this).text();
		$(this).attr('title', text);
	});
	
	//images ratio
	processImages();
	
	/* Sidebar Menu */
	$(document).on('click', '#sidebar .account-menu a.menu-groups', function() {
		$(this).parent('li').toggleClass('active');
		return false;
	});
	
	/* Search Button */
	$(document).on('click', 'header .mainmenu .menu .search', function() {
		$(this).toggleClass('active');
		$(this).parents('.mainmenu').find('#search').slideToggle();
		return false;
	});
}
utilityFunction();

/**
 * Slide Function
 *
 */
// Slide Fixed Height
function mainSlideFixed() {
	var slider = $("div#slider");
	slider.css('height', windowHeight+'px');
}

// Slider Function
function mainSlider() {
	$('#slider').append('<div id="supersized-loader"></div><ul id="supersized"></ul>');	
	var m = o.slideData;
	var u = m.slider;
	
	$.supersized({				
		// Functionality
		slideshow			: parseInt(u.slideshow),
		autoplay			: parseInt(u.autoplay),
		start_slide			: parseInt(u.start_slide),
		stop_loop			: parseInt(u.stop_loop),
		random				: parseInt(u.random),
		slide_interval		: parseInt(u.slide_interval),
		transition			: parseInt(u.transition),
		transition_speed	: parseInt(u.transition_speed),
		new_window			: parseInt(u.new_window),
		pause_hover			: parseInt(u.pause_hover),
		keyboard_nav		: parseInt(u.keyboard_nav),
		performance			: parseInt(u.performance),
		image_protect		: parseInt(u.image_protect),
		// Size & Position
		min_width			: parseInt(u.min_width),
		min_height			: parseInt(u.min_height),
		vertical_center		: parseInt(u.vertical_center),
		horizontal_center	: parseInt(u.horizontal_center),
		fit_always			: parseInt(u.fit_always),
		fit_portrait		: parseInt(u.fit_portrait),
		fit_landscape		: parseInt(u.fit_landscape),
		// Components
		slide_links				: u.slide_links,
		thumb_links				: parseInt(u.thumb_links),
		thumbnail_navigation	: parseInt(u.thumbnail_navigation),
		// Theme Options			   
		progress_bar			: parseInt(u.progress_bar),
		slides					: m.data
	});
}

/**
 * Query the device pixel ratio.
 * Process all document images
 **/
function getDevicePixelRatio() {
	if(window.devicePixelRatio === undefined)
		return 1;								// No pixel ratio available. Assume 1:1.
	return window.devicePixelRatio;
}

function processImages() {
	if(getDevicePixelRatio() > 1) {
		var images = $('img');
		
		// Scale each image's width to 50%. Height will follow.
		for(var i = 0; i < images.length; i++) {
			images.eq(i).width(images.eq(i).width() / 2);
		}
	}

}