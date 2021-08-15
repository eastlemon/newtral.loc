$(document).ready(function(){
	
	if ($('.imageSlider').length)
	{
		//	Slider play by click
		var imageSlider_currentImageSliderPosition = 0;
		var imageSlider_clickAnimateStarted = false;
		var imageSlider_clickDelayed = false;
		var imageSlider_autoPlay = false;
		
		$('.imageSlider-navigation-item').click(function(){
			if ($(this).hasClass('imageSlider-navigation-item_active'))
				return;
			if (imageSlider_clickAnimateStarted)
			{
				imageSlider_clickDelayed = $('.imageSlider-navigation-item').index($(this));
				return;
			}
				
			if (typeof(imageSlider_autoPlay) != 'undefined' && imageSlider_autoPlay) clearInterval(imageSlider_autoPlay);
			
			imageSlider_clickAnimateStarted = true;
			
			$('.imageSlider-navigation-item').removeClass('imageSlider-navigation-item_active');
			$(this).addClass('imageSlider-navigation-item_active');
			
			var imageSlider_newImageSliderPosition = $('.imageSlider-navigation-item').index($(this));
			
			if (imageSlider_newImageSliderPosition > imageSlider_currentImageSliderPosition)
			{
				$('.imageSlider-content-item').eq(imageSlider_newImageSliderPosition).addClass('imageSlider-content-item_prepare');
				$('.imageSlider-content-item').eq(imageSlider_currentImageSliderPosition).animate({'marginLeft': '-100%'}, 600, function() {
					$('.imageSlider-content-item').eq(imageSlider_currentImageSliderPosition).removeClass('imageSlider-content-item_active');
					$('.imageSlider-content-item').eq(imageSlider_currentImageSliderPosition).css({'marginLeft': 0});
					$('.imageSlider-content-item').eq(imageSlider_newImageSliderPosition).addClass('imageSlider-content-item_active').removeClass('imageSlider-content-item_prepare');
					
					imageSlider_currentImageSliderPosition = imageSlider_newImageSliderPosition;
					imageSlider_clickAnimateStarted = false;
					
					if (imageSlider_clickDelayed !== false)
					{
						$('.imageSlider-navigation-item').eq(imageSlider_clickDelayed).triggerHandler('click');
						imageSlider_clickDelayed = false;
					} else {				
						imageSlider_autoPlayStart();
					}			
				});
			} else {
				$('.imageSlider-content-item').eq(imageSlider_newImageSliderPosition).addClass('imageSlider-content-item_prepare').css({'marginLeft': '-100%'});
				$('.imageSlider-content-item').eq(imageSlider_newImageSliderPosition).animate({'marginLeft': 0}, 600, function(){
					$('.imageSlider-content-item').eq(imageSlider_currentImageSliderPosition).removeClass('imageSlider-content-item_active');				
					$('.imageSlider-content-item').eq(imageSlider_newImageSliderPosition).addClass('imageSlider-content-item_active').removeClass('imageSlider-content-item_prepare');
					
					imageSlider_currentImageSliderPosition = imageSlider_newImageSliderPosition;
					imageSlider_clickAnimateStarted = false;	
					
					if (imageSlider_clickDelayed !== false)
					{
						$('.imageSlider-navigation-item').eq(imageSlider_clickDelayed).triggerHandler('click');
						imageSlider_clickDelayed = false;
					} else {				
						imageSlider_autoPlayStart();
					}		
				});
			}
		});
		
		//	Autoplay
		function imageSlider_autoPlayStart()
		{
			imageSlider_autoPlay = setInterval(function(){
				if (imageSlider_clickAnimateStarted)
					return;
						
				imageSlider_clickAnimateStarted = true;
				
				imageSlider_newImageSliderPosition = imageSlider_currentImageSliderPosition + 1;
				
				if (imageSlider_newImageSliderPosition == $('.imageSlider-content-item').length)
					imageSlider_newImageSliderPosition = 0;
				
				$('.imageSlider-navigation-item').removeClass('imageSlider-navigation-item_active');
				$('.imageSlider-navigation-item').eq(imageSlider_newImageSliderPosition).addClass('imageSlider-navigation-item_active');
				
				if (imageSlider_newImageSliderPosition) {
					$('.imageSlider-content-item').eq(imageSlider_newImageSliderPosition).addClass('imageSlider-content-item_prepare');
					$('.imageSlider-content-item').eq(imageSlider_currentImageSliderPosition).animate({'marginLeft': '-100%'}, 600, function(){
						$('.imageSlider-content-item').eq(imageSlider_currentImageSliderPosition).removeClass('imageSlider-content-item_active');
						$('.imageSlider-content-item').eq(imageSlider_currentImageSliderPosition).css({'marginLeft': 0});
						$('.imageSlider-content-item').eq(imageSlider_newImageSliderPosition).addClass('imageSlider-content-item_active').removeClass('imageSlider-content-item_prepare');
						
						imageSlider_currentImageSliderPosition = imageSlider_newImageSliderPosition;
						imageSlider_clickAnimateStarted = false;
						
						if (imageSlider_clickDelayed !== false)
						{
							$('.imageSlider-navigation-item').eq(imageSlider_clickDelayed).triggerHandler('click');
							imageSlider_clickDelayed = false;
						}	
					});
				} else {
					var imageSlider_temporaryItem = $('.imageSlider-content-item').eq(imageSlider_newImageSliderPosition).clone();
					imageSlider_temporaryItem.appendTo($('.imageSlider-content'));
					imageSlider_temporaryItem.addClass('imageSlider-content-item_prepare');
					$('.imageSlider-content-item').eq(imageSlider_currentImageSliderPosition).animate({'marginLeft': '-100%'}, 600, function(){
						$('.imageSlider-content-item').eq(imageSlider_currentImageSliderPosition).removeClass('imageSlider-content-item_active');
						$('.imageSlider-content-item').eq(imageSlider_currentImageSliderPosition).css({'marginLeft': 0});
						imageSlider_temporaryItem.remove();
						$('.imageSlider-content-item').eq(imageSlider_newImageSliderPosition).addClass('imageSlider-content-item_active').removeClass('imageSlider-content-item_prepare');
						
						imageSlider_currentImageSliderPosition = imageSlider_newImageSliderPosition;
						imageSlider_clickAnimateStarted = false;
						
						if (imageSlider_clickDelayed !== false)
						{
							$('.imageSlider-navigation-item').eq(imageSlider_clickDelayed).triggerHandler('click');
							imageSlider_clickDelayed = false;
						}			
					});
				}
			}, 3000);
		}
		
		imageSlider_autoPlayStart();
	}
	
	//	/semitrailer-model/<id:.+> page
	
	if ($('.suspensionType').length) {	
		
        $('.suspensionType-content select').change(function(){
			var filter = $('.suspensionResults').data('suspension-results');
						
			var type_id = $(this).find('option:selected').val();
			            
			$('.suspensionManufacturer-content select option').each(function(){
				var manufacturer_id = $(this).val();
										
				if ($.inArray(manufacturer_id.toString(), Object.keys(filter[type_id])) !== -1)
				{
					$(this).prop('hidden', false).removeClass('hidden');
				} else {
					$(this).prop('hidden', true).addClass('hidden');
				}
			});
			
			if ($('.suspensionManufacturer-content select option:selected').hasClass('hidden'))
			{
				$('.suspensionManufacturer-content select option:selected').removeClass('selected');
				$('.suspensionManufacturer-content select option').not('.hidden').eq(0).prop('selected', true);
			}

			$('.suspensionManufacturer-content select').triggerHandler('change'); 
		});

		$('.suspensionType-content select').triggerHandler('change');
		
		$('.suspensionManufacturer-content select').change(function(e, params){
			var filter = $('.suspensionResults').data('suspension-results');		
			var type_id = $('.suspensionType-content select').find('option:selected').val();
			var manufacturer_id = $(this).find('option:selected').val();
			
			$('.suspensionResultsImages-data').each(function (){
				var semitrailer_id = $(this).data('semitrailer-id');
				if ($.inArray(semitrailer_id, filter[type_id][manufacturer_id]) !== -1) {
					$(this).removeClass('suspensionResultsImages-data_hidden');
				} else {
					$(this).addClass('suspensionResultsImages-data_hidden');
				}
			});
			
			$('.suspensionResults-content-item').each(function(){
				var semitrailer_id = $(this).data('semitrailer-id');
							
				if ($.inArray(semitrailer_id, filter[type_id][manufacturer_id]) !== -1)
				{
					$(this).removeClass('suspensionResults-content-item_hidden');
				} else {
					$(this).addClass('suspensionResults-content-item_hidden');
				}
			});
		});
	}
	
	//	/semitrailer-node/<id:.+> left menu

	$('.leftMenu-content-item-content-body-cell-additionalInfo span').mouseenter(function(){
		$(this).parent().addClass('leftMenu-content-item-content-body-cell-additionalInfo_open');
	}).mouseleave(function(){
		$(this).parent().removeClass('leftMenu-content-item-content-body-cell-additionalInfo_open');
	});
	
	$('.leftPanelImages-gallery-item').click(function(){
	
		if ($(this).hasClass('leftPanelImages-gallery-item_active'))
			return;
		
		$('.leftPanelImages-gallery-item_active').removeClass('leftPanelImages-gallery-item_active');
		
		$(this).addClass('leftPanelImages-gallery-item_active');
		
		$('.leftPanelImages-main img').attr('src', $(this).data('image'));
	});
	
	//	Preload
	if ($('.leftPanelImages-gallery-item').length)
		$('.leftPanelImages-gallery-item').each(function(){
	 		$('<img/>')[0].src = $(this).data('image');
	    });
    
    //	Points    
	$(window).resize(function(){   
		if ($('.partImage').length)
		{
			var scheme_image = $('.partImage-image').find('img');
			
			$("<img/>")
			.attr("src", scheme_image.attr("src"))
			.on('load', function() {				   
				var image_real_width = $('.partImage').data('width');
				var image_real_height = $('.partImage').data('height');
				
				var image_resized_width = scheme_image.width();
				var image_resized_height = scheme_image.height();
				
				$('.partImage-points-point').each(function(){                
					var current_point_coords_x = parseInt($(this).data('x'), 10) * (image_resized_width / image_real_width);
					var current_point_coords_y = parseInt($(this).data('y'), 10) * (image_resized_height / image_real_height); 
					
					$(this).css({left: current_point_coords_x, top: current_point_coords_y});                   
				});
				
				$('.partImage-points_hidden').removeClass('partImage-points_hidden');
			});
		}
	});
    
	$(window).triggerHandler('resize');
	
	if ($('.partImage').length && $('.leftMenu-content-item').length)
	{
		$('.partImage-points-point span').mouseenter(function(){		
			$('.partImage-points-point[data-id="' + $(this).parent().data('id') + '"]').addClass('partImage-points-point_hover');
			$('.leftMenu-content-item[data-id="' + $(this).parent().data('id') + '"]').addClass('leftMenu-content-item_hover');
		}).mouseleave(function(){
			$('.partImage-points-point[data-id="' + $(this).parent().data('id') + '"]').removeClass('partImage-points-point_hover');
			$('.leftMenu-content-item[data-id="' + $(this).parent().data('id') + '"]').removeClass('leftMenu-content-item_hover');
		}).click(function(){
			if ($(this).parent().hasClass('partImage-points-point_selected'))
			{
				$('.leftMenu-content-item').removeClass('leftMenu-content-item_open');
				$('.partImage-points-point').removeClass('partImage-points-point_selected');
			} else {			
				$('.leftMenu-content-item').removeClass('leftMenu-content-item_open');
				$('.leftMenu-content-item[data-id="' + $(this).parent().data('id') + '"]').addClass('leftMenu-content-item_open');
				$('.partImage-points-point').removeClass('partImage-points-point_selected');
				$('.partImage-points-point[data-id="' + $(this).parent().data('id') + '"]').addClass('partImage-points-point_selected');   
                
                if ($(window).width() >= 500)
                {
                    var currentItem = $('.leftMenu-content-item[data-id="' + $(this).parent().data('id') + '"]').eq(0);
                    
                    if (
    					(currentItem.offset().top + currentItem.height() - $(window).height() > $(window).scrollTop()) ||
    					(currentItem.offset().top < $(window).scrollTop())
    				)
    				{		  
    					if (currentItem.offset().top < $(window).scrollTop()) {
    						$('html, body').scrollTop(currentItem.offset().top - 10);
    					} else if ($('.partImage').offset().top + $('.partImage').height() + $(window).height() > currentItem.offset().top)
    					{
    						$('html, body').scrollTop(currentItem.offset().top + currentItem.height() + 10 - $(window).height());
    					} else {
    			   			$('html, body').scrollTop(currentItem.offset().top - parseInt($(window).height() / 6));
    			   		}
    			   	}
                } else {
                    var currentItem = $('.leftMenu-content-item[data-id="' + $(this).parent().data('id') + '"]').eq(1);
                    
                    $('html, body').scrollTop(currentItem.offset().top - ($(window).height() / 2));
                }
                        
				
		   	}
		});
	}
	
	if ($('.leftMenu-content-item').length)
	{
		$('.leftMenu-content-item-name').mouseenter(function(){
			if ($('.partImage').length)
				$('.partImage-points-point[data-id="' + $(this).parent().data('id') + '"]').addClass('partImage-points-point_hover');
			
			$('.leftMenu-content-item[data-id="' + $(this).parent().data('id') + '"]').addClass('leftMenu-content-item_hover');
		}).mouseleave(function(){
			if ($('.partImage').length)
				$('.partImage-points-point[data-id="' + $(this).parent().data('id') + '"]').removeClass('partImage-points-point_hover');
			
			$('.leftMenu-content-item[data-id="' + $(this).parent().data('id') + '"]').removeClass('leftMenu-content-item_hover');
		}).click(function(){	
			if ($(this).parent().hasClass('leftMenu-content-item_open'))
			{
				if ($('.partImage').length)
					$('.partImage-points-point').removeClass('partImage-points-point_selected');
				
				$('.leftMenu-content-item').removeClass('leftMenu-content-item_open');				
			} else {			
				if ($('.partImage').length)
				{
					$('.partImage-points-point').removeClass('partImage-points-point_selected');
					$('.partImage-points-point[data-id="' + $(this).parent().data('id') + '"]').addClass('partImage-points-point_selected');
				}
				
				$('.leftMenu-content-item').removeClass('leftMenu-content-item_open');
				$('.leftMenu-content-item[data-id="' + $(this).parent().data('id') + '"]').addClass('leftMenu-content-item_open');
			}
		});
	}
	
	$('body').on('click', '.searchParts-table-body-row-cell-photo, .partsBlock-table-body-row-cell-photo, .semitrailersBlock-table-body-row-cell-photo', function(e){
	    e.preventDefault();
        e.stopPropagation();
           
		$.fancybox.open({
			src: $(this).data('image'),
			protect: true
		});
		
	});
    
    $('body').on('click', '.partsBlock-table-body-row-cell-note', function(e){
	    e.preventDefault();
        e.stopPropagation();
        
        $.fancybox.open($.parseJSON($(this).data('note')));
	});

	$('.partData-image a').click(function(e){
		e.preventDefault();

		$.fancybox.open({
			src  : $(this).attr('href'),
			protect: true
		});
	});

	//	Authorization
	var authorizationAnimationStarted = false;

	$('.header').on('click', '.header-user-authorization-login-button', function(){	
		if (authorizationAnimationStarted)
			return;
		
		authorizationAnimationStarted = true;
        
        $('.header-mainMenu-content').fadeOut(50, function(){
            $('.header-mainMenu').removeClass('header-mainMenu_open');
        });

		if ($('.authorizationPopup_authorization').hasClass('authorizationPopup_open'))
		{
			$('.authorizationPopup_authorization').fadeOut(300, function(){
				$('.authorizationPopup_authorization').removeClass('authorizationPopup_open');
				authorizationAnimationStarted = false;	
			});
		} else {
			$('.authorizationPopup_authorization').fadeIn(300, function(){
				$('.authorizationPopup_authorization').addClass('authorizationPopup_open');
				authorizationAnimationStarted = false;	
			});
		}
		
	});

	var authorizationInProcess = false;

	$('.authorization').not('.authorizationPopup_registration').find('form').submit(function(e){
		e.preventDefault();

		var authorizationPopup = $(this).parents('.authorization').hasClass('authorizationPopup_authorization');

		if (authorizationInProcess)
			return;
		
		authorizationInProcess = true;		

		var form = $(this);

		form.parent().addClass('authorization_inProcess');

		var data = form.find('[name="email"],[name="password"]').serializeArray();

		$.ajax({
			url: '/authorization',
			type: 'post',
			dataType: 'json',
			data: data,
			success: function(data){
				if (
                    window.location.pathname.indexOf("/price") === 0 ||
                    window.location.pathname.indexOf("/search") === 0 ||
                    window.location.pathname.indexOf("/cart") === 0 ||
					window.location.pathname.indexOf("/private-office") === 0 ||
					window.location.pathname.indexOf("/admin") === 0
                )
				{
					document.location.href = document.location.href;
				} else {
					$('.authorization-content-field').removeClass('authorization-content-field_error');
					$('.header-user-authorization').replaceWith(data.authorizationBlock);
					$('.header-user-cart').replaceWith(data.cartBlock);
					$('.change-branch').val(data.user_branch);

					if (authorizationPopup)
					{
						$('.authorizationPopup_authorization').fadeOut(300, function(){
							$('.authorizationPopup_authorization').removeClass('authorizationPopup_open');
							authorizationInProcess = false;
							form.parent().removeClass('authorization_inProcess');
						});
					} else {
						authorizationInProcess = false;
						form.parent().removeClass('authorization_inProcess');
						document.location.href = document.location.href;
					}
				}
			},
			error: function(data, textStatus, error)
			{
				if (data.status == 400)
				{
					$('.authorization-content-field').removeClass('authorization-content-field_error');

					var data = data.responseJSON;

					$.each(data.error_fields, function(field, text){
						
						form.find('[name="' + field + '"]').parents('.authorization-content-field').addClass('authorization-content-field_error');

					});
				}
				authorizationInProcess = false;
				form.parent().removeClass('authorization_inProcess');
			}
		});
	});

	//	Registration
	var registrationAnimationStarted = false;

	$('.header').on('click', '.header-user-authorization-registation-button, .authorization-content-fieldsWarning-registration', function() {
		if (registrationAnimationStarted) return;
		
		registrationAnimationStarted = true;
        
        $('.header-mainMenu-content').fadeOut(50, function(){
            $('.header-mainMenu').removeClass('header-mainMenu_open');
        });

		$('.authorizationPopup_authorization').fadeOut(50, function(){
			$('.authorizationPopup_authorization').removeClass('authorizationPopup_open');
			authorizationAnimationStarted = false;	
		});

		if ($('.authorizationPopup_registration').hasClass('authorizationPopup_open')) {
			$('.authorizationPopup_registration').fadeOut(300, function() {
				$('.authorizationPopup_registration').removeClass('authorizationPopup_open');
				registrationAnimationStarted = false;	
			});
		} else {
			$('.authorizationPopup_registration').fadeIn(300, function() {
				$('.authorizationPopup_registration').addClass('authorizationPopup_open');
				registrationAnimationStarted = false;	
			});
		}
	});

	$('.authorizationPopup-close').click(function(){
		if (registrationAnimationStarted)
			return;
			
		registrationAnimationStarted = true;
		
		$('.authorizationPopup_registration, .authorizationPopup_authorization').fadeOut(300, function(){
			$('.authorizationPopup').removeClass('authorizationPopup_open');
			registrationAnimationStarted = false;	
		});
	});

	$('.authorization-content-field-input-passwordSwitcher').click(function(){
		if ($(this).hasClass('authorization-content-field-input-passwordSwitcher_open'))
		{
			$(this).removeClass('authorization-content-field-input-passwordSwitcher_open');
			$(this).parents('.authorization-content-field-input_password').find('input').prop('type', 'password');
		} else {
			$(this).addClass('authorization-content-field-input-passwordSwitcher_open');
			$(this).parents('.authorization-content-field-input_password').find('input').prop('type', 'text');
		}
	});

	var registrationInProcess = false;

	$('.authorizationPopup_registration form').submit(function(e){
		e.preventDefault();

		if (registrationInProcess)
			return;
		
		registrationInProcess = true;

		var form = $(this);
		var data = form.find('[name="name"],[name="phone_number"],[name="email"],[name="password"],[name="city_id"]').serializeArray();

		form.parent().addClass('authorization_inProcess');

		$.ajax({
			url: '/registration',
			type: 'post',
			dataType: 'json',
			data: data,
			success: function(data){
				/*
				$('.authorization-content-field').removeClass('authorization-content-field_error');
				$('.header-user-authorization').replaceWith(data.authorizationBlock);
				$('.authorizationPopup_registration').fadeOut(300, function(){
					$('.authorizationPopup_registration').removeClass('authorizationPopup_open');
					registrationInProcess = false;
				});
				*/

				document.location.href = '/registration-done';
			},
			error: function(data, textStatus, error)
			{
				if (data.status == 400)
				{
					$('.authorization-content-field').removeClass('authorization-content-field_error');

					var data = data.responseJSON;

					$.each(data.error_fields, function(field, text){
						
						form.find('[name="' + field + '"]').parents('.authorization-content-field').addClass('authorization-content-field_error');

					});
				}
				registrationInProcess = false;
				form.parent().removeClass('authorization_inProcess');
			}
		});
	});

	var logoutInProcess = false;
	
	$('.header, .leftMenu').on('click', '.header-user-authorization-logout-button, .leftMenu-content-item_logout a', function(){
		if (logoutInProcess)
			return;
		
		logoutInProcess = true;

		$.ajax({
			url: '/logout',
			type: 'post',
			dataType: 'json',
			success: function(data){
				if (
					window.location.pathname.indexOf("/price") === 0 ||
                    window.location.pathname.indexOf("/search") === 0 ||
                    window.location.pathname.indexOf("/cart") === 0 ||
					window.location.pathname.indexOf("/private-office") === 0 ||
					window.location.pathname.indexOf("/admin") === 0 ||
					window.location.pathname.indexOf("/semitrailer") === 0
				)
				{
					document.location.href = document.location.href;
				} else {		
					$('.header-user-authorization').replaceWith(data.authorizationBlock);
					$('.header-user-cart').replaceWith(data.cartBlock);
					$('.change-branch').val(data.default_branch);
					logoutInProcess = false;
				}
			}
		});
	});

	if ($('.searchResults').length)
	{
		//	Add to cart
		var addToCartInProcess = false;

		$('body').on('click', '.searchResults .partsBlock-table-body-row-cell-cart', function(){
			if (addToCartInProcess)
				return;

			var currentButton = $(this);
			currentButton.addClass('partsBlock-table-body-row-cell-cart_done');

			addToCartInProcess = true;

			var count = parseInt($(this).parents('.partsBlock-table-body-row').find('.partsBlock-table-body-row-cell-count input').val(), 10);
			var part_id = $(this).data('part-id');
			var store_id = $(this).data('store-id');
			var part_data_from_store_id = $(this).data('part-data-from-store-id');
			var delivery = $(this).data('delivery');
			
			var order_id = $(this).data('order-id');
			
			if (typeof(order_id) != 'undefined' && order_id)
			{
				$.ajax({
					url: '/admin/add-to-order',
					type: 'post',
					data: {part_id: part_id, store_id: store_id, order_id: order_id, part_data_from_store_id: part_data_from_store_id, count: count, delivery: delivery},
					dataType: 'json',
					success: function(data){    
						setTimeout(function(){
							currentButton.removeClass('partsBlock-table-body-row-cell-cart_done');
							addToCartInProcess = false;
						}, 500);
					},
					error: function(){
						setTimeout(function(){
							currentButton.removeClass('partsBlock-table-body-row-cell-cart_done');
							addToCartInProcess = false;
						}, 500);
					}
				});
			} else {
				$.ajax({
					url: '/add-to-cart',
					type: 'post',
					data: {part_id: part_id, store_id: store_id, part_data_from_store_id: part_data_from_store_id, count: count, delivery: delivery},
					dataType: 'json',
					success: function(data){		
						$('.header-user-cart').replaceWith(data.cartBlock);

						setTimeout(function(){
							currentButton.removeClass('partsBlock-table-body-row-cell-cart_done');
							addToCartInProcess = false;
						}, 500);
					},
					error: function(){
						addToCartInProcess = false;
					}
				});
			}
		});

		$('body').on('focus', '.searchResults .partsBlock-table-body-row-cell-count input', function(){

			$(this).parent().addClass('partsBlock-table-body-row-cell-count_focus');

		}).on('blur', '.searchResults .partsBlock-table-body-row-cell-count input', function(){

			$(this).parent().removeClass('partsBlock-table-body-row-cell-count_focus');

		})

		$('body').on('mouseenter', '.searchResults .partsBlock-table-body-row-cell-count', function(){

			$(this).addClass('partsBlock-table-body-row-cell-count_hover');

		}).on('mouseleave', '.searchResults .partsBlock-table-body-row-cell-count', function(){

			$(this).removeClass('partsBlock-table-body-row-cell-count_hover');

		});

		var saveCountDelay = false;
		
		$('body').on('click', '.searchResults .partsBlock-table-body-row-cell-count-minus', function(){
			if (saveCountDelay)
				clearTimeout(saveCountDelay);

			var currentValue = parseInt($(this).parents('.partsBlock-table-body-row-cell-count').find('input').val(), 10);

			currentValue -= 1;

			if (currentValue < 1)
				currentValue = 1;

			$(this).parents('.partsBlock-table-body-row-cell-count').find('input').val(currentValue);

			$(this).parents('.partsBlock-table-body-row').addClass('_notUpdate');
		});

		$('body').on('click', '.searchResults .partsBlock-table-body-row-cell-count-plus', function(){
			if (saveCountDelay)
				clearTimeout(saveCountDelay);

			var currentValue = parseInt($(this).parents('.partsBlock-table-body-row-cell-count').find('input').val(), 10);

			var maxValue = parseInt($(this).parents('.partsBlock-table-body-row-cell-count').find('input').data('max'), 10);

			if (currentValue != maxValue)
				currentValue += 1;

			$(this).parents('.partsBlock-table-body-row-cell-count').find('input').val(currentValue);

			$(this).parents('.partsBlock-table-body-row').addClass('_notUpdate');
		});

		$('body').on('change', '.searchResults .partsBlock-table-body-row-cell-count input', function(){
			if (saveCountDelay)
				clearTimeout(saveCountDelay);

			var maxValue = parseInt($(this).data('max'), 10);
			var currentValue = parseInt($(this).val(), 10);

			if (currentValue < 1 || isNaN(currentValue))
				currentValue = 1;

			if (currentValue > maxValue)
				currentValue = maxValue;

			$(this).val(currentValue);

			$(this).parents('.partsBlock-table-body-row').addClass('_notUpdate');
		});
	}

	if ($('.partsBlock').not('.partsBlock_inAdminPanel').length)
	{
		//	Remove from cart
		var removeFromCartInProcess = false;

		$('body').on('click', '.partsBlock_cart .partsBlock-table-body-row-cell-delete', function(){
			if (removeFromCartInProcess)
				return;

			var row = $(this).parents('.partsBlock-table-body-row');

			removeFromCartInProcess = true;

			var id = $(this).data('id');

			$.ajax({
				url: '/remove-from-cart',
				type: 'post',
				data: {id : id},
				dataType: 'json',
				success: function(data){					
					row.remove();

					if (!$('.partsBlock_cart .partsBlock-table-body-row').not('.partsBlock-table-body-row_total').length)
					{
						$('.cart').replaceWith('<div class="text">Ваша корзина пуста</div>');
					} else {
						var number = 1;
						$('.partsBlock_cart .partsBlock-table-body-row').not('.partsBlock-table-body-row_total').each(function(){
							$(this).find('.partsBlock-table-body-row-cell').eq(0).text(number);
							number++;
						});
					}

					$('.partsBlock_cart .partsBlock-table-body .partsBlock-table-body-row_total .partsBlock-table-body-row-cell_total').html(data.cartData.total_text);
					$('.header-user-cart').replaceWith(data.cartBlock);

					removeFromCartInProcess = false;
				}
			});
		});

		var updateCount = function(){
			var counts = [];

			$('.partsBlock-table-body-row').not('.partsBlock-table-body-row_total').each(function(){

				var item = $(this).find('.partsBlock-table-body-row-cell-count').find('input');

				var currentValue = parseInt(item.val());
				var currentId = item.data('id');

				counts.push({
					id: currentId,
					value: currentValue
				});

			});
			
			$.ajax({
				url: '/update-cart',
				type: 'post',
				data: {counts: counts},
				dataType: 'json',
				success: function(data){
					$('.header-user-cart').replaceWith(data.cartBlock);

                    var error_found = false;

					$.each(data.cartData.data, function(index, row){
						$('.partsBlock_cart .partsBlock-table-body .partsBlock-table-body-row[data-id="' + row.id + '"] .partsBlock-table-body-row-cell_total').html(row.total_text);
                        
                        var errors = '';
                        
                        $.each(row.errors, function(errors_index, errors_row){
                            
                            if (errors)
                                errors += '<br />';
                            
                            errors += errors_row;
                        });
                        
                        $('.partsBlock_cart .partsBlock-table-body .partsBlock-table-body-row[data-id="' + row.id + '"] .partsBlock-table-body-row-cell-error-text').html(errors);
                        
                        if (errors)
                        {
                            $('.partsBlock_cart .partsBlock-table-body .partsBlock-table-body-row[data-id="' + row.id + '"]').addClass('partsBlock-table-body-row_error');
                            $('.partsBlock_cart .partsBlock-table-body .partsBlock-table-body-row[data-id="' + row.id + '"] .partsBlock-table-body-row-cell-error').removeClass('partsBlock-table-body-row-cell-error_hidden');
                            
                            error_found = true;
                        } else {
                            $('.partsBlock_cart .partsBlock-table-body .partsBlock-table-body-row[data-id="' + row.id + '"]').removeClass('partsBlock-table-body-row_error');
                            $('.partsBlock_cart .partsBlock-table-body .partsBlock-table-body-row[data-id="' + row.id + '"] .partsBlock-table-body-row-cell-error').addClass('partsBlock-table-body-row-cell-error_hidden');
                        }
					});

					$('.partsBlock_cart .partsBlock-table-body .partsBlock-table-body-row_total .partsBlock-table-body-row-cell_total').html(data.cartData.total_text);
                    
                    if (error_found)
                    {
                        $('.cart').addClass('cart_disabled');
                    } else {
                        $('.cart').removeClass('cart_disabled');
                    }
					
				}
			});
		}

		var saveCountDelay = false;
		
		$('body').on('click', '.partsBlock_cart .partsBlock-table-body-row-cell-count-minus', function(){
			if (saveCountDelay)
				clearTimeout(saveCountDelay);

			var currentValue = parseInt($(this).parents('.partsBlock-table-body-row-cell-count').find('input').val(), 10);

			currentValue -= 1;

			if (currentValue < 1)
				currentValue = 1;

			$(this).parents('.partsBlock-table-body-row-cell-count').find('input').val(currentValue);

			saveCountDelay = setTimeout(updateCount, 500);
		});

		$('body').on('click', '.partsBlock_cart .partsBlock-table-body-row-cell-count-plus', function(){
			if (saveCountDelay)
				clearTimeout(saveCountDelay);

			var currentValue = parseInt($(this).parents('.partsBlock-table-body-row-cell-count').find('input').val(), 10);

			currentValue += 1;

			$(this).parents('.partsBlock-table-body-row-cell-count').find('input').val(currentValue);

			saveCountDelay = setTimeout(updateCount, 500);
		});

		$('body').on('change', '.partsBlock_cart .partsBlock-table-body-row-cell-count input', function(){
			if (saveCountDelay)
				clearTimeout(saveCountDelay);

			var currentValue = parseInt($(this).val(), 10);

			if (currentValue < 1 || isNaN(currentValue))
				currentValue = 1;

			$(this).val(currentValue);

			saveCountDelay = setTimeout(updateCount, 500);
		});
        
        if ($('.cart .users').length)
        {
            $('.cart .users .users-table-body-row-cell a').click(function(){
                                
                $(this).parents('.users-table-body').find('.users-table-body-row_selected').removeClass('users-table-body-row_selected');               
                $(this).parents('.users-table-body-row').addClass('users-table-body-row_selected');
                var user_data = $(this).parents('.users-table-body-row').data('user-data');
                
                let cart = $(this).parents('.cart');
                                
                cart.find('[name="user_id"]').val(user_data.id);                
                cart.find('input[name="delivery_id"][value="' + user_data.delivery_id + '"]').parents('.radioBlock-item-input').triggerHandler('click');                
                cart.find('[name="city"]').val(user_data.city);
                cart.find('[name="street"]').val(user_data.street);
                cart.find('[name="home"]').val(user_data.home);
                cart.find('[name="apartment"]').val(user_data.apartment);                
                cart.find('input[name="user_type_id"][value="' + user_data.user_type_id + '"]').parents('.radioBlock-item-input').triggerHandler('click');                
                cart.find('[name="name"]').val(user_data.name);
                cart.find('[name="email"]').val(user_data.email);
                cart.find('[name="phone"]').val(user_data.phone_number);                
                cart.find('input[name="payment_type_id"][value="' + user_data.payment_type_id + '"]').parents('.radioBlock-item-input').triggerHandler('click');                                
                cart.find('[name="requisites"]').val(user_data.requisites);                
            });
        }
        
        if ($('.cart .users-search').length)
        {
            $('.cart .users-search .users-search-input').keyup(function(){
                
                let current_value = $(this).val();
                let cart = $(this).parents('.cart');
                
                cart.find('.users-table-body-row').addClass('users-table-body-row_hidden');
                
                cart.find('.users-table-body-row').each(function(){
                   
                    if (
                        $(this).find('.users-table-body-row-cell').eq(0).text().toLowerCase().indexOf(current_value) != -1 ||
                        $(this).find('.users-table-body-row-cell').eq(1).text().toLowerCase().indexOf(current_value) != -1 ||
                        $(this).find('.users-table-body-row-cell').eq(2).text().toLowerCase().indexOf(current_value) != -1 ||
                        $(this).find('.users-table-body-row-cell').eq(3).text().toLowerCase().indexOf(current_value) != -1
                    ) {
                        $(this).removeClass('users-table-body-row_hidden');
                    }
                    
                });
            });
        }
	}
    
    if ($('.partsBlock.partsBlock_inAdminPanel').length)
	{
		//	Remove from cart
		var removeOrderPartInProcess = false;

		$('.partsBlock.partsBlock_inAdminPanel').on('click', '.partsBlock-table-body-row-cell-delete', function(){
			if (removeOrderPartInProcess)
				return;

			var row = $(this).parents('.partsBlock-table-body-row');

			removeOrderPartInProcess = true;

            var order_id = row.parents('.partsBlock').data('id');
			var id = row.data('id');

			$.ajax({
				url: '/admin/remove-from-order',
				type: 'post',
				data: {
				    order_id: order_id,
				    id: id
                },
				dataType: 'json',
				success: function(data){
					var number = 1;
					row.parents('.partsBlock').find('.partsBlock_cart .partsBlock-table-body-row').not('.partsBlock-table-body-row_total').each(function(){
						$(this).find('.partsBlock-table-body-row-cell').eq(0).text(number);
						number++;
					});

					row.parents('.partsBlock').find('.partsBlock-table-body-row_total .partsBlock-table-body-row-cell_total').html(data.data.total + '&nbsp;руб.');
                    				
					row.remove();

					removeOrderPartInProcess = false;
                }
			});
		});
        
		var updateCount = function(current_element){
			var counts = [];
                        
			current_element.parents('.partsBlock').find('.partsBlock-table-body-row').not('.partsBlock-table-body-row_total').each(function(){
				var item = $(this).find('.partsBlock-table-body-row-cell-count').find('input');

				var currentValue = parseInt(item.val());
				var currentId = item.parents('.partsBlock-table-body-row').data('id');
                
				counts.push({
					id: currentId,
					value: currentValue
				});
			});
                
            var order_id = current_element.parents('.partsBlock').data('id');
			
			$.ajax({
				url: '/admin/update-order',
				type: 'post',
				data: {
				    order_id: order_id,
				    counts: counts
                },
				dataType: 'json',
				success: function(data){                         
                    $.each(data.data.order_content, function(index, data){
                        current_element.parents('.partsBlock').find('.partsBlock-table-body-row[data-id="' + data.id + '"] .partsBlock-table-body-row-cell_total').html(data.total + '&nbsp;руб.');
                    });
                    
                    current_element.parents('.partsBlock').find('.partsBlock-table-body-row_total .partsBlock-table-body-row-cell_total').html(data.data.total + '&nbsp;руб.');
				}
			});
		}

		var saveCountDelay = false;

		$('.partsBlock.partsBlock_inAdminPanel').on('click', '.partsBlock-table-body-row-cell-count-minus', function(){
			if (saveCountDelay)
				clearTimeout(saveCountDelay);

			var currentValue = parseInt($(this).parents('.partsBlock-table-body-row-cell-count').find('input').val(), 10);

			currentValue -= 1;

			if (currentValue == 0)
				currentValue = 1;

			$(this).parents('.partsBlock-table-body-row-cell-count').find('input').val(currentValue);

			saveCountDelay = setTimeout(updateCount($(this)), 500);
		});

		$('.partsBlock.partsBlock_inAdminPanel').on('click', '.partsBlock-table-body-row-cell-count-plus', function(){
			if (saveCountDelay)
				clearTimeout(saveCountDelay);

			var currentValue = parseInt($(this).parents('.partsBlock-table-body-row-cell-count').find('input').val(), 10);

			currentValue += 1;

			$(this).parents('.partsBlock-table-body-row-cell-count').find('input').val(currentValue);

			saveCountDelay = setTimeout(updateCount($(this)), 500);
		});

		$('.partsBlock.partsBlock_inAdminPanel').on('change', '.partsBlock-table-body-row-cell-count input', function(){
			if (saveCountDelay)
				clearTimeout(saveCountDelay);

			var currentValue = parseInt($(this).val(), 10);

			if (currentValue == 0 || isNaN(currentValue))
				currentValue = 1;

			$(this).val(currentValue);

			saveCountDelay = setTimeout(updateCount($(this)), 500);
		});
	}
    
	if ($('.radioBlock').length)
	{
		$('.radioBlock-item-input,.radioBlock-item-label').click(function(){
			if ($(this).parent().find('.radioBlock-item-input').hasClass('radioBlock-item-input_checked'))
				return;
                            
			$(this).parents('.radioBlock').find('.radioBlock-item-input_checked').find('input').prop('checked', false);
			$(this).parents('.radioBlock').find('.radioBlock-item-input_checked').removeClass('radioBlock-item-input_checked');

			$(this).parent().find('input').prop('checked', true);
            $(this).parent().find('input').triggerHandler('change');
			$(this).parent().find('.radioBlock-item-input').addClass('radioBlock-item-input_checked');

			if ($(this).parents('.cartBlock').hasClass('cartBlock_payment'))
			{
				if ($(this).parent().find('input').val() == 2)
				{
					$(this).parents('.cartBlock').addClass('cartBlock_requisites');
					$('.paymentRequisites').removeClass('paymentRequisites_hidden');
				} else {
					$(this).parents('.cartBlock').removeClass('cartBlock_requisites');
					$('.paymentRequisites').addClass('paymentRequisites_hidden');
				}
			}

			if ($(this).parents('.cartBlock').hasClass('cartBlock_delivery'))
			{
				if ($(this).parent().find('input').val() == 2)
				{
					$(this).parents('.cartBlock').find('.cartBlock-content-userInfo').removeClass('cartBlock-content-userInfo_hidden');
				} else {
					$(this).parents('.cartBlock').find('.cartBlock-content-userInfo').addClass('cartBlock-content-userInfo_hidden');
				}
			}

			if ($(this).parents('.userInformation').hasClass('userInformation_payment'))
			{
				if ($(this).parent().find('input').val() == 2)
				{
					$(this).parents('.userInformation').addClass('userInformation_requisites');
					$('.paymentRequisites').removeClass('paymentRequisites_hidden');
				} else {
					$(this).parents('.userInformation').removeClass('userInformation_requisites');
					$('.paymentRequisites').addClass('paymentRequisites_hidden');
				}
			}

			if ($(this).parents('.userInformation').hasClass('userInformation_delivery'))
			{
				if ($(this).parent().find('input').val() == 2)
				{
					$(this).parents('.userInformation').find('.userInformation-content-userInfo').removeClass('userInformation-content-userInfo_hidden');
				} else {
					$(this).parents('.userInformation').find('.userInformation-content-userInfo').addClass('userInformation-content-userInfo_hidden');
				}
			}
		});
	}

	if ($('.selectBlock').length)
	{
		$('.selectBlock-current').click(function(){
			if ($(this).parents('.selectBlock').hasClass('selectBlock_open'))
			{
				$(this).parents('.selectBlock').removeClass('selectBlock_open');
			} else {
				$(this).parents('.selectBlock').addClass('selectBlock_open');
			}
		});

		$('.selectBlock-list-item').click(function(){
			var selectedHtml = $(this).html();

			$(this).parents('.selectBlock').find('.selectBlock-current').html(selectedHtml);
			$(this).parents('.selectBlock').removeClass('selectBlock_open');

			$(this).parents('.selectBlock').find('.selectBlock-list-item_hidden').removeClass('selectBlock-list-item_hidden');
			$(this).addClass('selectBlock-list-item_hidden');

			$(this).parents('.selectBlock').find('input').val($(this).data('value'));
		});
	}

	if ($('.cart').length)
	{
		var cartSubmitInProcess = false;

		$('.cart').submit(function(e){
			e.preventDefault();

			if (cartSubmitInProcess)
				return;

			cartSubmitInProcess = true;

			var form = $(this);

			form.addClass('cart_inProcess');

			var data = form.serializeArray();

			$.ajax({
				url: '/add-order',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){					
					$('.cart').replaceWith('<div class="text">Заказ отправлен. Наш менеджер свяжется с вами в ближайшее время.</div>');
					$('.header-user-cart').replaceWith(data.cartBlock);

					cartSubmitInProcess = false;
					form.removeClass('cart_inProcess');
				},
				error: function(data, textStatus, error)
				{
					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

						});
					}
					cartSubmitInProcess = false;
					form.removeClass('cart_inProcess');
				}
			});
		});
	}

	if ($('.mapsSelector').length)
	{
		$('.mapsSelector-item').click(function(){

			if ($(this).hasClass('mapsSelector-item_selected'))
				return;

			$('.mapsSelector-item_selected').removeClass('mapsSelector-item_selected');
			$(this).addClass('mapsSelector-item_selected');

			var index = $('.mapsSelector-item').index($(this));

			$('.mapsContainer-map_selected').removeClass('mapsContainer-map_selected');

			$('.mapsContainer-map').eq(index).addClass('mapsContainer-map_selected');

		});
	}
	
	if ($('.feedback').length)
	{
		var feedbackInProcess = false;

		$('.feedback form').submit(function(e){
			e.preventDefault();

			var currentBlock = $(this);

			if (feedbackInProcess)
				return;

			feedbackInProcess = true;

			var form = $(this);

			form.parent().addClass('feedback_inProcess');
			
            url = '/feedback';
            
            if ($(this).parents('.feedback').hasClass('feedback_semitrailerRequest'))
            {
                url = '/user/send-semitrailer-request';
            }
            
			$.ajax({
				url: url,
				type: 'post',
				data: new FormData(form[0]),
                contentType: false,
                processData: false,
				dataType: 'json',
				success: function(data){	
					form.find('.error').removeClass('error');				
					currentBlock.find('.feedback-contacts-field input,.feedback-message-field textarea').val('');
					currentBlock.addClass('feedback_sended');
					setTimeout(function(){
						currentBlock.removeClass('feedback_sended');
						feedbackInProcess = false;
					}, 2000);
                    
                    form.parent().removeClass('feedback_inProcess');
				},
				error: function(data, textStatus, error)
				{
					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

						});
					}
					feedbackInProcess = false;
					form.parent().removeClass('feedback_inProcess');
				}
			});
		});
	}

	if ($('.restorePassword').length)
	{
		var restorePasswordInProcess = false;

		$('.restorePassword form').submit(function(e){
			e.preventDefault();

			if (restorePasswordInProcess)
				return;

			restorePasswordInProcess = true;

			var form = $(this);

			form.parent().addClass('restorePassword_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/send-restore-password-mail',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.replaceWith('<div class="text">На ваш эл. адрес отправлена ссылка для восстановления пароля</div>');
				},
				error: function(data, textStatus, error)
				{
					form.find('.restorePassword-field-error').addClass('restorePassword-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.restorePassword-field').find('.restorePassword-field-error').removeClass('restorePassword-field-error_hidden');

						});
					}
					restorePasswordInProcess = false;
					form.parent().removeClass('restorePassword_inProcess');
				}
			});
		});
	}

	if ($('.setNewPassword').length)
	{
		var setNewPasswordInProcess = false;

		$('.setNewPassword form').submit(function(e){
			e.preventDefault();

			if (setNewPasswordInProcess)
				return;

			setNewPasswordInProcess = true;

			var form = $(this);

			form.parent().addClass('setNewPassword_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/save-new-password',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					$('.authorization-content-field').removeClass('authorization-content-field_error');
					$('.header-user-authorization').replaceWith(data.authorizationBlock);
					$('.header-user-cart').replaceWith(data.cartBlock);
					form.replaceWith('<div class="text">Новый пароль установлен</div>');
				},
				error: function(data, textStatus, error)
				{
					form.find('.setNewPassword-field-error').addClass('setNewPassword-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.setNewPassword-field').find('.setNewPassword-field-error').removeClass('setNewPassword-field-error_hidden');

						});
					}
					setNewPasswordInProcess = false;
					form.parent().removeClass('setNewPassword_inProcess');
				}
			});
		});
	}

	if ($('.partsBlock-showMore').length)
	{
		$('.partsBlock-showMore').click(function(){
			var currentButton = $(this);

			var currentPage = currentButton.data('page');			
			var onPage = currentButton.data('on-page');

			if (typeof(currentPage) == 'undefined')
				currentPage = 0;

			if (typeof(onPage) == 'undefined')
				onPage = currentButton.data('per-page');
						
			$.ajax({
				type: 'get',
				data: {
					noTemplate: true,
					page: (currentPage + 1)
				},
				success: function(data){
					onPage += currentButton.data('per-page');

					currentButton.parents('.partsBlock').find('.partsBlock-table-body').append(data);
					currentButton.data('page', currentPage + 1);
					currentButton.data('on-page', onPage);	

					if (onPage >= currentButton.data('total'))
						currentButton.remove();				
				},
				error: function(data, textStatus, error){
					
				}
			});
		});
	}
    
    if (window.location.pathname.indexOf("/search") === 0)
    {
		var searchId = $('.searchResults').data('search-id');
		var bawmSearchId = $('.searchResults').data('bawm-search-id');
		var forumSearchId = $('.searchResults').data('forum-search-id');
		var omegaSearchId = $('.searchResults').data('omega-search-id');
		var tehintkomSearchId = $('.searchResults').data('tehintkom-search-id');
		var koronaSearchId = $('.searchResults').data('korona-search-id');
		var kontinentSearchId = $('.searchResults').data('kontinent-search-id');
		var armtekSearchId = $('.searchResults').data('armtek-search-id');

        function updateSearchResults(searchId, bawmSearchId, forumSearchId, omegaSearchId, tehintkomSearchId, koronaSearchId, kontinentSearchId, armtekSearchId)
        {
            $.ajax({
    			type: 'get',
    			data: {
    				update: true,
					searchId: searchId,
					bawmSearchId: bawmSearchId,
                    forumSearchId: forumSearchId,
					omegaSearchId: omegaSearchId,
					tehintkomSearchId: tehintkomSearchId,
					koronaSearchId: koronaSearchId,
					kontinentSearchId: kontinentSearchId,
					armtekSearchId: armtekSearchId,
				},
    			success: function(data){
					var search_status = $(data).filter('.searchResults').data('search-status');
					var bawm_search_status = $(data).filter('.searchResults').data('bawm-search-status');
					var forum_search_status = $(data).filter('.searchResults').data('forum-search-status');
					var omega_search_status = $(data).filter('.searchResults').data('omega-search-status');
					var tehintkom_search_status = $(data).filter('.searchResults').data('tehintkom-search-status');
					var korona_search_status = $(data).filter('.searchResults').data('korona-search-status');
					var kontinent_search_status = $(data).filter('.searchResults').data('kontinent-search-status');
					var armtek_search_status = $(data).filter('.searchResults').data('armtek-search-status');

                    if (search_status != 'done'
						|| bawm_search_status != 'done'
						|| forum_search_status != 'done'
						|| omega_search_status != 'done'
						|| tehintkom_search_status != 'done'
						|| korona_search_status != 'done'
						|| kontinent_search_status != 'done'
						|| armtek_search_status != 'done'
					)
                    {
                        setTimeout(function(){
                            updateSearchResults(searchId, bawmSearchId, forumSearchId, omegaSearchId, tehintkomSearchId, koronaSearchId, kontinentSearchId, armtekSearchId);
                        }, 3000);
                    }
                    
					$('.searchResults').data('search-status', search_status);
					
					var searchResults = $(data).filter('.searchResults');

					$('.searchResults').find('._notUpdate').each(function(){
						var id = $(this).data('id');

						searchResults.find('.partsBlock-table-body-row[data-id="' + id + '"]').replaceWith($(this));
					});

                    $('.searchResults').replaceWith(searchResults);
    			},
    			error: function(data, textStatus, error){
    				
    			}
    		});
        }
		
		if ($('.searchResults').data('search-status') != 'done'
			|| $('.searchResults').data('bawm-search-status') != 'done'
			|| $('.searchResults').data('forum-search-status') != 'done'
			|| $('.searchResults').data('omega-search-status') != 'done'
			|| $('.searchResults').data('tehintkom-search-status') != 'done'
			|| $('.searchResults').data('korona-search-status') != 'done'
			|| $('.searchResults').data('kontinent-search-status') != 'done'
			|| $('.searchResults').data('armtek-search-status') != 'done'
		)
        	updateSearchResults(searchId, bawmSearchId, forumSearchId, omegaSearchId, tehintkomSearchId, koronaSearchId, kontinentSearchId, armtekSearchId);
    	
    	$('body').on('click', '.searchParts-showMore', function(){
           
    		var currentButton = $(this);
    
    		var currentPage = currentButton.data('page');			
    		var onPage = currentButton.data('on-page');
    
    		if (typeof(currentPage) == 'undefined')
    			currentPage = 0;
    
    		if (typeof(onPage) == 'undefined')
    			onPage = currentButton.data('per-page');
    					
    		$.ajax({
    			type: 'get',
    			data: {
    				noTemplate: true,
    				page: (currentPage + 1),
                    update: true,
                    searchId: searchId
    			},
    			success: function(data){
    				onPage += currentButton.data('per-page');
    
    				currentButton.parents('.searchParts').find('.searchParts-table-body').append(data);
    				currentButton.data('page', currentPage + 1);
    				currentButton.data('on-page', onPage);	
    
    				if (onPage >= currentButton.data('total'))
    					currentButton.remove();				
    			},
    			error: function(data, textStatus, error){
    				
    			}
    		});
    	});
	}

	if ($('.j-updateUserData').length)
	{
		var updateUserDataInProcess = false;

		$('.j-updateUserData').submit(function(e){
			e.preventDefault();

			if (updateUserDataInProcess)
				return;

			updateUserDataInProcess = true;

			var form = $(this);

			form.find('.submit').addClass('submit_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/user/update-user',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.find('.submit').addClass('submit_done');

					setTimeout(function(){
						form.find('.submit').removeClass('submit_done');
						updateUserDataInProcess = false;
						form.find('.submit').removeClass('submit_inProcess');
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.userInformation-field-error').addClass('userInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.userInformation-field').find('.userInformation-field-error').removeClass('userInformation-field-error_hidden');

						});
					}
					updateUserDataInProcess = false;
					form.find('.submit').removeClass('submit_inProcess');
				}
			});
		});
	}

	if ($('.j-changePassword').length)
	{
		var changePasswordInProcess = false;

		$('.j-changePassword form').submit(function(e){
			e.preventDefault();

			if (changePasswordInProcess)
				return;

			changePasswordInProcess = true;

			var form = $(this);

			form.parent().addClass('userInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/user/update-user',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.parent().addClass('userInformation_done');

					setTimeout(function(){
						form.parent().removeClass('userInformation_done');
						changePasswordInProcess = false;
						form.parent().removeClass('userInformation_inProcess');
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.userInformation-field-error').addClass('userInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.userInformation-field').find('.userInformation-field-error').removeClass('userInformation-field-error_hidden');

						});
					}
					changePasswordInProcess = false;
					form.parent().removeClass('userInformation_inProcess');
				}
			});
		});
	}

	if ($('.orders-table-body-row').length)
	{
		$('.orders-table-body-row').mouseenter(function(){
			$(this).addClass('orders-table-body-row_hover');
		}).mouseleave(function(){
			$(this).removeClass('orders-table-body-row_hover');
		});
	}

	if ($('.users-table-body-row').length)
	{
		$('.users-table-body-row').mouseenter(function(){
			$(this).addClass('users-table-body-row_hover');
		}).mouseleave(function(){
			$(this).removeClass('users-table-body-row_hover');
		});
	}

	if ($('.searchParts-table-body-row').length)
	{
		$('body').on('mouseenter', '.searchParts-table-body-row', function(){
			$(this).addClass('searchParts-table-body-row_hover');
		}).on('mouseleave', '.searchParts-table-body-row', function(){
			$(this).removeClass('searchParts-table-body-row_hover');
		});
	}

	if ($('.j-updateUserDataByAdmin').length)
	{
		var updateUserDataByAdminInProcess = false;

		$('.j-updateUserDataByAdmin').submit(function(e){
			e.preventDefault();

			if (updateUserDataByAdminInProcess)
				return;

			updateUserDataByAdminInProcess = true;

			var form = $(this);

			form.find('.userInformation').addClass('userInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/update-user',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.parent().addClass('userInformation_done');

					setTimeout(function(){
						form.parent().removeClass('userInformation_done');						
						updateUserDataByAdminInProcess = false;
						form.find('.userInformation').removeClass('userInformation_inProcess');
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.userInformation-field-error').addClass('userInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.userInformation-field').find('.userInformation-field-error').removeClass('userInformation-field-error_hidden');

						});
					}
					updateUserDataByAdminInProcess = false;
					form.find('.userInformation').removeClass('userInformation_inProcess');
				}
			});
		});
        
        $('.j-updateUserDataByAdmin .userInformation-field_userType input[name="role"]').change(function(){
            
            if ($(this).val() == 'user')
            {
                $(this).parents('.j-updateUserDataByAdmin').find('.userInformation-field_salesManagers').removeClass('userInformation-field_hidden');
            } else {
                $(this).parents('.j-updateUserDataByAdmin').find('.userInformation-field_salesManagers').addClass('userInformation-field_hidden');
            }
            
        });
	}

	if ($('.j-deleteSemitrailerFromUser').length)
	{
		var deleteSemitrailerFromUserInProcess = false;

		$('body').on('click', '.j-deleteSemitrailerFromUser', function(){
			var current_row = $(this).parents('.semitrailersBlock-table-body-row');
			var semitrailer_id = $(this).data('id');

			if (deleteSemitrailerFromUserInProcess)
				return;

				deleteSemitrailerFromUserInProcess = true;

			$.ajax({
				url: '/user/delete-semitrailer',
				type: 'post',
				data: {
					semitrailer_id: semitrailer_id
				},
				dataType: 'json',
				success: function(data){					
					current_row.remove();
					
					deleteSemitrailerFromUserInProcess = false;
				},
				error: function(data, textStatus, error)
				{					
					deleteSemitrailerFromUserInProcess = false;
				}
			});
		});
	}

	if ($('.j-addPartsByGroupsSubdivision').length || $('.j-editPartsByGroupsSubdivision').length)
	{
		var addPartsByGroupsSubdivisionInProcess = false;

		$('body').on('submit', '.j-addPartsByGroupsSubdivision form', function(e){
			e.preventDefault();

			if (addPartsByGroupsSubdivisionInProcess)
				return;

				addPartsByGroupsSubdivisionInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/parts-by-groups/add-subdivision-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.parent().removeClass('unitInformation_error');
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					setTimeout(function(){
						form.parent().removeClass('j-addPartsByGroupsSubdivision').addClass('j-editPartsByGroupsSubdivision');
						$('<input type="hidden" name="PartsByGroupsSubdivision[id]" value="' + data.data.id + '" />').appendTo(form);
						form.find('.unitInformation-submit-result').text('Данные обновлены');

						form.parent().removeClass('unitInformation_done');						
						addPartsByGroupsSubdivisionInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.parent().addClass('unitInformation_error');
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					addPartsByGroupsSubdivisionInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});

		var editPartsByGroupsSubdivisionInProcess = false;

		$('body').on('submit', '.j-editPartsByGroupsSubdivision form', function(e){
			e.preventDefault();

			if (editPartsByGroupsSubdivisionInProcess)
				return;

				editPartsByGroupsSubdivisionInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/parts-by-groups/edit-subdivision-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.parent().removeClass('unitInformation_error');
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					setTimeout(function(){
						form.parent().removeClass('unitInformation_done');						
						editPartsByGroupsSubdivisionInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.parent().addClass('unitInformation_error');
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					editPartsByGroupsSubdivisionInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});
	}

	if ($('.j-addPartsByGroupsArticle').length || $('.j-editPartsByGroupsArticle').length)
	{
		var addPartsByGroupsArticleInProcess = false;

		$('body').on('submit', '.j-addPartsByGroupsArticle form', function(e){
			e.preventDefault();

			if (addPartsByGroupsArticleInProcess)
				return;

				addPartsByGroupsArticleInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');
			
			$.ajax({
				url: '/admin/parts-by-groups/add-article-process',
				type: 'post',
				data: new FormData(form[0]),
				contentType: false,
                processData: false,
				dataType: 'json',
				success: function(data){
					form.parent().removeClass('unitInformation_error');
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					setTimeout(function(){
						form.parent().removeClass('j-addPartsByGroupsArticle').addClass('j-editPartsByGroupsArticle');
						
						if (data.data.photo)
						{
							form.find('.unitInformation-field-information_image img').attr('src', data.data.photo);
							form.find('.unitInformation-field-information_image').removeClass('hidden');
						} else {
							form.find('.unitInformation-field-information_image').addClass('hidden');
						}

						$('<input type="hidden" name="PartsByGroupsArticle[id]" value="' + data.data.id + '" />').appendTo(form);
						form.find('.unitInformation-submit-result').text('Данные обновлены');

						form.parent().removeClass('unitInformation_done');						
						addPartsByGroupsArticleInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.parent().addClass('unitInformation_error');
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					addPartsByGroupsArticleInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});

		var editPartsByGroupsArticleInProcess = false;

		$('body').on('submit', '.j-editPartsByGroupsArticle form', function(e){
			e.preventDefault();

			if (editPartsByGroupsArticleInProcess)
				return;

				editPartsByGroupsArticleInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');
			
			$.ajax({
				url: '/admin/parts-by-groups/edit-article-process',
				type: 'post',
				data: new FormData(form[0]),
				contentType: false,
                processData: false,
				dataType: 'json',
				success: function(data){
					form.parent().removeClass('unitInformation_error');
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					if (data.data.photo)
					{
						form.find('.unitInformation-field-information_image img').attr('src', data.data.photo);
						form.find('.unitInformation-field-information_image').removeClass('hidden');
					} else {
						form.find('.unitInformation-field-information_image').addClass('hidden');
					}

					setTimeout(function(){
						form.parent().removeClass('unitInformation_done');						
						editPartsByGroupsArticleInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.parent().addClass('unitInformation_error');
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					editPartsByGroupsArticleInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});
	}

	if ($('.j-addSemitrailerRequestToAdmin').length)
	{
		$('.j-addSemitrailerRequestToAdmin').click(function(){
			$(this).parent().next().filter('.semitrailersBlock').removeClass('semitrailersBlock_hidden');
			$(this).remove();
		});

		var addSemitrailerRequestFromUserInProcess = false;

		$('body').on('click', '.j-addSemitrailerRequestFromUser', function(){
			var current_button = $(this);
			var semitrailer_id = $(this).data('id');

			if (addSemitrailerRequestFromUserInProcess)
				return;

				addSemitrailerRequestFromUserInProcess = true;

			$.ajax({
				url: '/user/add-semitrailer',
				type: 'post',
				data: {
					semitrailer_id: semitrailer_id
				},
				dataType: 'json',
				success: function(data){					
					current_button.replaceWith('Запрос отправлен');
					
					addSemitrailerRequestFromUserInProcess = false;
				},
				error: function(data, textStatus, error)
				{					
					addSemitrailerRequestFromUserInProcess = false;
				}
			});
		});
	}
    
    if ($('.j-addSemitrailerRequestToAdminForm').length)
    {
        $('.j-addSemitrailerRequestToAdminForm').click(function(){
			$(this).parent().next().filter('.feedback').removeClass('feedback_hidden');
		});
    }

	if ($('.j-showSemitrailersListByAdmin').length)
	{
		$('.j-showSemitrailersListByAdmin').click(function(){
			$(this).parent().next().filter('.semitrailersBlock').removeClass('semitrailersBlock_hidden');
			$(this).remove();
		});
	}

	if ($('.j-addSemitrailerByAdmin').length)
	{
		var addSemitrailerByAdminInProcess = false;

		$('body').on('click', '.j-addSemitrailerByAdmin', function(){
			var current_button = $(this);
			var semitrailer_id = $(this).data('id');
			var user_id = $(this).data('user-id');

			if (addSemitrailerByAdminInProcess)
				return;

				addSemitrailerByAdminInProcess = true;

			$.ajax({
				url: '/admin/add-semitrailer',
				type: 'post',
				data: {
					semitrailer_id: semitrailer_id,
					user_id: user_id
				},
				dataType: 'json',
				success: function(data){					
					current_button.replaceWith('Добавлен');
					
					addSemitrailerByAdminInProcess = false;
				},
				error: function(data, textStatus, error)
				{					
					addSemitrailerByAdminInProcess = false;
				}
			});
		});
	}

	if ($('.j-deleteSemitrailerByAdmin').length)
	{
		var deleteSemitrailerByAdminInProcess = false;

		$('body').on('click', '.j-deleteSemitrailerByAdmin', function(){
			var current_button = $(this);
			var semitrailer_id = $(this).data('id');
			var user_id = $(this).data('user-id');

			if (deleteSemitrailerByAdminInProcess)
				return;

			deleteSemitrailerByAdminInProcess = true;

			$.ajax({
				url: '/admin/delete-semitrailer',
				type: 'post',
				data: {
					semitrailer_id: semitrailer_id,
					user_id: user_id
				},
				dataType: 'json',
				success: function(data){					
					current_button.replaceWith('Отвязан');
					
					deleteSemitrailerByAdminInProcess = false;
				},
				error: function(data, textStatus, error)
				{					
					deleteSemitrailerByAdminInProcess = false;
				}
			});
		});
	}

	if ($('.statusesList').length)
	{
		var changeStatusInProcess = false;

		$('.statusesList-item').click(function(){

			if ($(this).hasClass('statusesList-item_active'))			
				return;

			if (changeStatusInProcess)
				return;

			var currentBlock = $(this).parents('.statusesList');
			var currentStatus = $(this);
			var order_id = currentBlock.data('order-id');
			var status_id = currentStatus.data('id');

			changeStatusInProcess = true;
            
            let url = '/user/change-order-status';
            
            if ($(this).parents('.statusesList').hasClass('statusesList_adminPanel'))
            {
                url = '/admin/change-order-status';
            }

			$.ajax({
				url: url,
				type: 'post',
				data: {
					order_id: order_id,
					status_id: status_id
				},
				dataType: 'json',
				success: function(data){					
					currentBlock.find('.statusesList-item_active').removeClass('statusesList-item_active');
					currentStatus.addClass('statusesList-item_active');

					changeStatusInProcess = false;
				},
				error: function(data, textStatus, error)
				{					
					changeStatusInProcess = false;
				}
			});

		});
	}
    
    if ($('.j-updateOrderData').length)
    {
        var updateOrderDataInProcess = false;

		$('.j-updateOrderData form').submit(function(e){
            e.preventDefault();

			if (updateOrderDataInProcess)
				return;

			var block = $(this).parents('.j-updateOrderData');            
            var data = $(this).serialize();
            
			updateOrderDataInProcess = true;
            block.addClass('userInformation_inProcess');

			$.ajax({
				url: '/admin/change-order-data',
				type: 'post',
				data: data,
				dataType: 'json',
				success: function(data){					
					block.removeClass('userInformation_inProcess');

					updateOrderDataInProcess = false;
				},
				error: function(data, textStatus, error)
				{					
					updateOrderDataInProcess = false;
				}
			});
		});
    }

	if ($('.j-savepartsManufacturersOnMainPage').length)
	{
		var savepartsManufacturersOnMainPageInProcess = false;

		$('.j-savepartsManufacturersOnMainPage form').submit(function(e){
			e.preventDefault();

			if (savepartsManufacturersOnMainPageInProcess)
				return;

			savepartsManufacturersOnMainPageInProcess = true;

			var form = $(this);

			form.parent().addClass('partsManufacturersOnMainPage_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/save-parts-manufacturers-on-main-page',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.parent().addClass('partsManufacturersOnMainPage_done');

					setTimeout(function(){
						form.parent().removeClass('partsManufacturersOnMainPage_done');						
						savepartsManufacturersOnMainPageInProcess = false;
						form.parent().removeClass('partsManufacturersOnMainPage_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.partsManufacturersOnMainPage-field-error').addClass('partsManufacturersOnMainPage-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.partsManufacturersOnMainPage-field').find('.partsManufacturersOnMainPage-field-error').removeClass('partsManufacturersOnMainPage-field-error_hidden');

						});
					}
					savepartsManufacturersOnMainPageInProcess = false;
					form.parent().removeClass('partsManufacturersOnMainPage_inProcess')
				}
			});
		});
	}

	if ($('.tabsBlock').length)
	{
		$('.tabsBlock-tabs-tab').click(function(){

			if ($(this).hasClass('tabsBlock-tabs-tab_active'))
				return;

			var index = $('.tabsBlock-tabs-tab').index($(this));

			$('.tabsBlock-tabs-tab_active').removeClass('tabsBlock-tabs-tab_active');

			$(this).addClass('tabsBlock-tabs-tab_active');

			$('.tabsBlock-tabsContents-tabContent_active').removeClass('tabsBlock-tabsContents-tabContent_active');
			$('.tabsBlock-tabsContents-tabContent').eq(index).addClass('tabsBlock-tabsContents-tabContent_active');
		});
	}

	if ($('.j-addStore').length || $('.j-editStore').length)
	{
		var addStoreInProcess = false;

		$('body').on('submit', '.j-addStore form', function(e){
			e.preventDefault();

			if (addStoreInProcess)
				return;

				addStoreInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/stores/add-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					$('#branch-list-edit').removeClass('hidden');
					$('#branch-list-add').removeClass('hidden');
					$('#add-branch-to-store').attr('href', data.data.addbranchurl);

					setTimeout(function(){
						form.parent().removeClass('j-addStore').addClass('j-editStore');
						$('<input type="hidden" name="id" value="' + data.data.id + '" />').appendTo(form);
						form.find('.unitInformation-submit-result').text('Данные обновлены');

						form.parent().removeClass('unitInformation_done');						
						addStoreInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					addStoreInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});

		var editStoreInProcess = false;

		$('body').on('submit', '.j-editStore form', function(e){
			e.preventDefault();

			if (editStoreInProcess)
				return;

				editStoreInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/stores/edit-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					if (data.data.have_available_branches) {
						$('#branch-list-add').removeClass('hidden');
					} else {
						$('#branch-list-add').addClass('hidden');
					}

					setTimeout(function(){
						form.parent().removeClass('unitInformation_done');						
						editStoreInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					editStoreInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});
	}

	if ($('.j-qwepSettings').length)
	{
		var updateQwepSettingsInProcess = false;

		$('body').on('submit', '.j-qwepSettings form', function(e){
			e.preventDefault();

			if (updateQwepSettingsInProcess)
				return;

			updateQwepSettingsInProcess = true;
		
			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/qwep-settings/update-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.parent().removeClass('unitInformation_error');
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					setTimeout(function(){
						form.parent().removeClass('unitInformation_done');						
						updateQwepSettingsInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.parent().addClass('unitInformation_error');
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					updateQwepSettingsInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});
	}

	if ($('.j-updateQwepToken').length)
	{
		var updateQwepTokenProcess = false;

		$('body').on('click', '.j-updateQwepToken input', function(e){
			e.preventDefault();

			if (updateQwepTokenProcess)
				return;

				updateQwepTokenProcess = true;

			var input = $(this);
			var buttonHolder = input.parent();

			buttonHolder.addClass('button_inProcess');
					
			$.ajax({
				url: '/admin/qwep-settings/update-token-process',
				type: 'post',
				dataType: 'json',
				success: function(data){
					buttonHolder.removeClass('button_error');
					buttonHolder.addClass('button_done');

					input.val(data.token);

					setTimeout(function(){
						buttonHolder.removeClass('button_done');						
						updateQwepTokenProcess = false;
						buttonHolder.removeClass('button_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					buttonHolder.addClass('button_error');

					updateQwepTokenProcess = false;
					buttonHolder.removeClass('button_inProcess')
				}
			});
		});
	}
    
    if ($('.j-addQwepStore').length || $('.j-editQwepStore').length)
	{
		var addQwepStoreInProcess = false;

		$('body').on('submit', '.j-addQwepStore form', function(e){
			e.preventDefault();

			if (addQwepStoreInProcess)
				return;

				addQwepStoreInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/qwep-stores/add-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.parent().removeClass('unitInformation_error');
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					$('#branch-list-edit').removeClass('hidden');
					$('#branch-list-add').removeClass('hidden');
					$('#add-branch-to-store').attr('href', data.data.addbranchurl);

					setTimeout(function(){
						form.parent().removeClass('j-addQwepStore').addClass('j-editQwepStore');
						$('<input type="hidden" name="id" value="' + data.data.id + '" />').appendTo(form);
						form.find('.unitInformation-submit-result').text('Данные обновлены');

						form.parent().removeClass('unitInformation_done');						
						addQwepStoreInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.parent().addClass('unitInformation_error');
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					addQwepStoreInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});

		var editQwepStoreInProcess = false;

		$('body').on('submit', '.j-editQwepStore form', function(e){
			e.preventDefault();

			if (editQwepStoreInProcess)
				return;

				editQwepStoreInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/qwep-stores/edit-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.parent().removeClass('unitInformation_error');
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					if (data.data.have_available_branches) {
						$('#branch-list-add').removeClass('hidden');
					} else {
						$('#branch-list-add').addClass('hidden');
					}

					setTimeout(function(){
						form.parent().removeClass('unitInformation_done');						
						editQwepStoreInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.parent().addClass('unitInformation_error');
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					editQwepStoreInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});
	}

	if ($('.j-settings').length)
	{
		var updateSettingsInProcess = false;

		$('body').on('submit', '.j-settings form', function(e){
			e.preventDefault();

			if (updateSettingsInProcess)
				return;

				updateSettingsInProcess = true;
		
			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/settings/update-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.parent().removeClass('unitInformation_error');
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					setTimeout(function(){
						form.parent().removeClass('unitInformation_done');						
						updateSettingsInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.parent().addClass('unitInformation_error');
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					updateSettingsInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});
	}

	if ($('.j-addPriceSource').length || $('.j-editPriceSource').length)
	{
		var addPriceSourceInProcess = false;

		$('body').on('submit', '.j-addPriceSource form', function(e){
			e.preventDefault();

			if (addPriceSourceInProcess)
				return;

				addPriceSourceInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/prices-sources/add-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					setTimeout(function(){
						form.parent().removeClass('j-addPriceSource').addClass('j-editPriceSource');
						$('<input type="hidden" name="id" value="' + data.data.id + '" />').appendTo(form);
						form.find('.unitInformation-submit-result').text('Данные обновлены');

						form.parent().removeClass('unitInformation_done');						
						addPriceSourceInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					addPriceSourceInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});

		var editPriceSourceInProcess = false;

		$('body').on('submit', '.j-editPriceSource form', function(e){
			e.preventDefault();

			if (editPriceSourceInProcess)
				return;

				editPriceSourceInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/prices-sources/edit-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					setTimeout(function(){
						form.parent().removeClass('unitInformation_done');						
						editPriceSourceInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					editPriceSourceInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});
	}
    
    if ($('.header-mainMenu-icon').length)
    {
        var headerMainMenuAnimationStarted = false;
        
        $('.header-mainMenu-icon').click(function(){
            
            if (headerMainMenuAnimationStarted)
			return;
    		
    		headerMainMenuAnimationStarted = true;
            
            $('.authorizationPopup_authorization').fadeOut(50, function(){
    			$('.authorizationPopup_authorization').removeClass('authorizationPopup_open');
    			authorizationAnimationStarted = false;	
    		});
            
            $('.authorizationPopup_registration').fadeOut(50, function(){
    			$('.authorizationPopup_registration').removeClass('authorizationPopup_open');
    			registrationAnimationStarted = false;	
    		});
            
            var parent = $(this).parent();
            
            if (parent.hasClass('header-mainMenu_open'))
            {
                parent.find('.header-mainMenu-content').fadeOut(300, function(){
                    parent.removeClass('header-mainMenu_open');
                    headerMainMenuAnimationStarted = false;
                });
            } else {
                parent.find('.header-mainMenu-content').fadeIn(300, function(){
                    parent.addClass('header-mainMenu_open');
                    headerMainMenuAnimationStarted = false;
                });                
            }
        });
        
        $('.header-mainMenu-content-item span').click(function(){
            if ($(this).parent().hasClass('header-mainMenu-content-item_open'))
            {
                $(this).parent().removeClass('header-mainMenu-content-item_open');
            } else {
                $(this).parent().addClass('header-mainMenu-content-item_open');
            }
        });
    }
    
  // if ($('.header-user-authorization-privateOffice-button.visible_750px-menu').length) {
  //   var headerMainMenuAnimationStarted = false;

    $(document).on('click', '.header-user-authorization-privateOffice-button.visible_750px-menu', function () {

      // if (headerMainMenuAnimationStarted)
      //   return;

      // headerMainMenuAnimationStarted = true;

      $('.authorizationPopup_authorization').fadeOut(50, function () {
        $('.authorizationPopup_authorization').removeClass('authorizationPopup_open');
        // authorizationAnimationStarted = false;
      });

      $('.authorizationPopup_registration').fadeOut(50, function () {
        $('.authorizationPopup_registration').removeClass('authorizationPopup_open');
        // registrationAnimationStarted = false;
      });


      var parent = $(this).parent();

      if (parent.hasClass('header-mainMenu_open')) {
        parent.find('.header-mainMenu-content').fadeOut(300, function () {
          parent.removeClass('header-mainMenu_open');
          // headerMainMenuAnimationStarted = false;
        });
      } else {
        parent.find('.header-mainMenu-content').fadeIn(300, function () {
          parent.addClass('header-mainMenu_open');
          // headerMainMenuAnimationStarted = false;
        });
      }
    });


    $('.header-mainMenu-content-item a').click(function () {
      if ($(this).parent().hasClass('header-mainMenu-content-item_open')) {
        $(this).parent().removeClass('header-mainMenu-content-item_open');
      } else {
        $(this).parent().addClass('header-mainMenu-content-item_open');
      }
    });
  // }
  
    if ($('.j-addNewsItem').length || $('.j-editNewsItem').length)
	{
		var addNewsItemInProcess = false;

		$('body').on('submit', '.j-addNewsItem form', function(e){
			e.preventDefault();

			if (addNewsItemInProcess)
				return;

				addNewsItemInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/news/add-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					setTimeout(function(){
						form.parent().removeClass('j-addNewsItem').addClass('j-editNewsItem');
						$('<input type="hidden" name="News[id]" value="' + data.data.id + '" />').appendTo(form);
						form.find('.unitInformation-submit-result').text('Данные обновлены');

						form.parent().removeClass('unitInformation_done');						
						addNewsItemInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="News[' + field + ']"]').addClass('error');

							form.find('[name="News[' + field + ']"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					addNewsItemInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});

		var editNewsItemInProcess = false;
        
		$('body').on('submit', '.j-editNewsItem form', function(e){
		            
			e.preventDefault();

			if (editNewsItemInProcess)
				return;

				editNewsItemInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/news/edit-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					setTimeout(function(){
						form.parent().removeClass('unitInformation_done');						
						editNewsItemInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="News[' + field + ']"]').addClass('error');

							form.find('[name="News[' + field + ']"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					editNewsItemInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});
	}
    
    if ($('.j-semitrailersBlock-search').length)
    {
        $('.j-semitrailersBlock-search input').keyup(function(){
           
            var current_value = $(this).val().trim().toLowerCase();
            
            $(this).parents('.semitrailersBlock').find('.semitrailersBlock-table-body-row').addClass('semitrailersBlock-table-body-row_hidden');
            
            if (current_value)
            {            
                $(this).parents('.semitrailersBlock').find('.semitrailersBlock-table-body-row').addClass('semitrailersBlock-table-body-row_hidden');
                
                $(this).parents('.semitrailersBlock').find('.semitrailersBlock-table-body-row').each(function(){
                    
                    if (
                        $(this).find('.semitrailersBlock-table-body-row-cell').eq(1).text().toLowerCase().indexOf(current_value) != -1 ||
                        $(this).find('.semitrailersBlock-table-body-row-cell').eq(2).text().toLowerCase().indexOf(current_value) != -1 ||
                        $(this).find('.semitrailersBlock-table-body-row-cell').eq(3).text().toLowerCase().indexOf(current_value) != -1 ||
                        $(this).find('.semitrailersBlock-table-body-row-cell').eq(4).text().toLowerCase().indexOf(current_value) != -1
                    ) {
                        $(this).removeClass('semitrailersBlock-table-body-row_hidden');
                    }
                
                });
            }
            
            if ($(this).parents('.semitrailersBlock').find('.semitrailersBlock-table-body-row').not('.semitrailersBlock-table-body-row_hidden').length)
            {
                $(this).parents('.semitrailersBlock').find('.semitrailersBlock-table').removeClass('semitrailersBlock-table_hidden');
            } else {
                $(this).parents('.semitrailersBlock').find('.semitrailersBlock-table').addClass('semitrailersBlock-table_hidden');
            }
            
        });
    }
        
    if ($('.j-displayUsersToMerge').length)
    {
        $('.j-displayUsersToMerge span').click(function(){
           
           $(this).parents('.j-displayUsersToMerge').next('.j-usersToMergeList').removeClass('users_hidden');
           
           $(this).parents('.j-displayUsersToMerge').remove();
            
        });
        
        var mergeUsersInProcess = false;
        
        $('.j-usersToMergeList .users-table-body-row-cell > a').click(function(){
            
            if (mergeUsersInProcess)
            return;
            
            mergeUsersInProcess = true;
            
            var currentBlock = $(this).parents('.j-usersToMergeList');
            var currentRow = $(this).parents('.users-table-body-row');
            
            if (confirm('Это действие удалит выбранного пользователя. Продолжить?'))
            {
                var recipient_user_id = currentBlock.data('user-id');
                var donor_user_id = currentRow.data('user-id');
                
                $.ajax({
    				url: '/admin/merge-users',
    				type: 'post',
    				data: {
    				    recipient_user_id: recipient_user_id,
    				    donor_user_id: donor_user_id
                    },
    				success: function(data){					
    					mergeUsersInProcess = false;
                        
                        //  Active                        
                        $('.j-updateUserDataByAdmin .j-active').data('value', data.donor_user_data.active);
                        $('.j-updateUserDataByAdmin .j-active').removeClass('userInformation-replacement_hidden');
                        $('.j-updateUserDataByAdmin .j-active .userInformation-replacement-value').text(data.donor_user_data.active ? 'Включен' : 'Выключен');
                        
                        $('.j-updateUserDataByAdmin .j-active .userInformation-replacement-value').unbind('click');
                        $('.j-updateUserDataByAdmin .j-active .userInformation-replacement-value').click(function(){
                            $('.j-updateUserDataByAdmin [name="active"]').prop('checked', $(this).parents('.j-active').data('value'));
                        });
                        
                        //  Delivery
                        $('.j-updateUserDataByAdmin .j-delivery').data('value', data.donor_user_data.delivery_id);
                        $('.j-updateUserDataByAdmin .j-delivery').removeClass('userInformation-content-replacement_hidden');
                        $('.j-updateUserDataByAdmin .j-delivery .userInformation-content-replacement-value').text(data.donor_user_data.delivery_name);
                        
                        $('.j-updateUserDataByAdmin .j-delivery .userInformation-content-replacement-value').unbind('click');
                        $('.j-updateUserDataByAdmin .j-delivery .userInformation-content-replacement-value').click(function(){
                            $('.j-updateUserDataByAdmin [name="delivery_id"][value="' + $(this).parents('.j-delivery').data('value') + '"]').parents('.radioBlock-item-input').triggerHandler('click');
                        });
                        
                        //  Address
                        var address = [];
                        
                        if (data.donor_user_data.city)
                            address.push('Город: ' + data.donor_user_data.city);
                            
                        if (data.donor_user_data.street)
                            address.push((address.length ? 'улица' : 'Улица') + ': ' + data.donor_user_data.street);
                        
                        if (data.donor_user_data.home)
                            address.push((address.length ? 'дом' : 'Дом') + ': ' + data.donor_user_data.home);
                        
                        if (data.donor_user_data.apartment)
                            address.push((address.length ? 'квартира' : 'Квартира') + ': ' + data.donor_user_data.apartment);
                        
                        $('.j-updateUserDataByAdmin .j-address .userInformation-content-userInfo-replacement-value').text(address.join(', '));           
                        
                        $('.j-updateUserDataByAdmin .j-address .userInformation-content-userInfo-replacement-value').unbind('click');
                        
                        if (address.length)
                        {
                            $('.j-updateUserDataByAdmin .j-address').data('city', data.donor_user_data.city);
                            $('.j-updateUserDataByAdmin .j-address').data('street', data.donor_user_data.street);
                            $('.j-updateUserDataByAdmin .j-address').data('home', data.donor_user_data.home);
                            $('.j-updateUserDataByAdmin .j-address').data('apartment', data.donor_user_data.apartment);
                            $('.j-updateUserDataByAdmin .j-address').removeClass('userInformation-content-userInfo-replacement_hidden');
                            
                            $('.j-updateUserDataByAdmin .j-address .userInformation-content-userInfo-replacement-value').click(function(){
                                $('.j-updateUserDataByAdmin [name="city"]').val($(this).parents('.j-address').data('city'));
                                $('.j-updateUserDataByAdmin [name="street"]').val($(this).parents('.j-address').data('street'));
                                $('.j-updateUserDataByAdmin [name="home"]').val($(this).parents('.j-address').data('home'));
                                $('.j-updateUserDataByAdmin [name="apartment"]').val($(this).parents('.j-address').data('apartment'));
                            });
                        }
                                                
                        //  User type
                        $('.j-updateUserDataByAdmin .j-userType').data('value', data.donor_user_data.user_type_id);
                        $('.j-updateUserDataByAdmin .j-userType').removeClass('userInformation-replacement_hidden');
                        $('.j-updateUserDataByAdmin .j-userType .userInformation-replacement-value').text(data.donor_user_data.user_type_name);
                        
                        $('.j-updateUserDataByAdmin .j-userType .userInformation-replacement-value').unbind('click');
                        $('.j-updateUserDataByAdmin .j-userType .userInformation-replacement-value').click(function(){
                            $('.j-updateUserDataByAdmin [name="user_type_id"][value="' + $(this).parents('.j-userType').data('value') + '"]').parents('.radioBlock-item-input').triggerHandler('click');
                        });
                        
                        //  1c id
                        $('.j-updateUserDataByAdmin .j-1cId .userInformation-replacement-value').unbind('click');
                        
                        if (data.donor_user_data['1c_id'])
                        {
                            $('.j-updateUserDataByAdmin .j-1cId').data('value', data.donor_user_data['1c_id']);
                            $('.j-updateUserDataByAdmin .j-1cId').removeClass('userInformation-replacement_hidden');
                            $('.j-updateUserDataByAdmin .j-1cId .userInformation-replacement-value').text(data.donor_user_data['1c_id']);
                            $('.j-updateUserDataByAdmin .j-1cId .userInformation-replacement-value').click(function(){
                                $('.j-updateUserDataByAdmin [name="1c_id"]').val($(this).parents('.j-1cId').data('value'));    
                            });
                        }
                        
                        //  1c price category
                        $('.j-updateUserDataByAdmin .j-1cPriceCategory .userInformation-replacement-value').unbind('click');
                        
                        if (data.donor_user_data['1c_price_category'])
                        {
                            $('.j-updateUserDataByAdmin .j-1cPriceCategory').data('value', data.donor_user_data['1c_price_category']);
                            $('.j-updateUserDataByAdmin .j-1cPriceCategory').removeClass('userInformation-replacement_hidden');
                            $('.j-updateUserDataByAdmin .j-1cPriceCategory .userInformation-replacement-value').text(data.donor_user_data['1c_price_category']);
                            
                            $('.j-updateUserDataByAdmin .j-1cPriceCategory .userInformation-replacement-value').click(function(){
                                $('.j-updateUserDataByAdmin [name="1c_price_category"]').val($(this).parents('.j-1cPriceCategory').data('value'));    
                            });
                        }
                        
                        //  name
                        $('.j-updateUserDataByAdmin .j-name .userInformation-replacement-value').unbind('click');
                        
                        if (data.donor_user_data['name'])
                        {
                            $('.j-updateUserDataByAdmin .j-name').data('value', data.donor_user_data['name']);
                            $('.j-updateUserDataByAdmin .j-name').removeClass('userInformation-replacement_hidden');
                            $('.j-updateUserDataByAdmin .j-name .userInformation-replacement-value').text(data.donor_user_data['name']);
                            
                            $('.j-updateUserDataByAdmin .j-name .userInformation-replacement-value').click(function(){
                                $('.j-updateUserDataByAdmin [name="name"]').val($(this).parents('.j-name').data('value'));    
                            });
                        }
                        
                        //  phone number
                        $('.j-updateUserDataByAdmin .j-phoneNumber .userInformation-replacement-value').unbind('click');
                        
                        if (data.donor_user_data['phone_number'])
                        {
                            $('.j-updateUserDataByAdmin .j-phoneNumber').data('value', data.donor_user_data['phone_number']);
                            $('.j-updateUserDataByAdmin .j-phoneNumber').removeClass('userInformation-replacement_hidden');
                            $('.j-updateUserDataByAdmin .j-phoneNumber .userInformation-replacement-value').text(data.donor_user_data['phone_number']);                            
                            $('.j-updateUserDataByAdmin .j-phoneNumber .userInformation-replacement-value').click(function(){
                                $('.j-updateUserDataByAdmin [name="phone_number"]').val($(this).parents('.j-phoneNumber').data('value'));    
                            });
                        }
                        
                        //  email
                        $('.j-updateUserDataByAdmin .j-email .userInformation-replacement-value').unbind('click');
                        
                        if (data.donor_user_data['email'])
                        {
                            $('.j-updateUserDataByAdmin .j-email').data('value', data.donor_user_data['email']);
                            $('.j-updateUserDataByAdmin .j-email').removeClass('userInformation-replacement_hidden');
                            $('.j-updateUserDataByAdmin .j-email .userInformation-replacement-value').text(data.donor_user_data['email']);
                            
                            $('.j-updateUserDataByAdmin .j-email .userInformation-replacement-value').click(function(){
                                $('.j-updateUserDataByAdmin [name="email"]').val($(this).parents('.j-email').data('value'));    
                            });
                        }
                        
                        //  Payment type
                        $('.j-updateUserDataByAdmin .j-paymentType').data('value', data.donor_user_data.payment_type_id);
                        $('.j-updateUserDataByAdmin .j-paymentType').removeClass('userInformation-replacement_hidden');
                        $('.j-updateUserDataByAdmin .j-paymentType .userInformation-replacement-value').text(data.donor_user_data.payment_type_name);
                        
                        $('.j-updateUserDataByAdmin .j-paymentType .userInformation-replacement-value').unbind('click');
                        $('.j-updateUserDataByAdmin .j-paymentType .userInformation-replacement-value').click(function(){
                            $('.j-updateUserDataByAdmin [name="payment_type_id"][value="' + $(this).parents('.j-paymentType').data('value') + '"]').parents('.radioBlock-item-input').triggerHandler('click');
                        });
                        
                        //  Payment requisites
                        $('.j-updateUserDataByAdmin .j-paymentRequisites').data('value', data.donor_user_data.requisites);
                        $('.j-updateUserDataByAdmin .j-paymentRequisites').removeClass('paymentRequisites-replacement_hidden');
                        $('.j-updateUserDataByAdmin .j-paymentRequisites .paymentRequisites-replacement-value').html(data.donor_user_data.requisites.replace(/\n/g, "<br />"));
                        
                        $('.j-updateUserDataByAdmin .j-paymentRequisites .paymentRequisites-replacement-value').unbind('click');
                        $('.j-updateUserDataByAdmin .j-paymentRequisites .paymentRequisites-replacement-value').click(function(){
                             $('.j-updateUserDataByAdmin [name="requisites"]').val($(this).parents('.j-paymentRequisites').data('value'));
                        });
                        
                        //  Role
                        $('.j-updateUserDataByAdmin .j-role').data('value', data.donor_user_data['role']);
                        $('.j-updateUserDataByAdmin .j-role').removeClass('userInformation-replacement_hidden');
                        $('.j-updateUserDataByAdmin .j-role .userInformation-replacement-value').text(data.donor_user_data['role_name']);
                        
                        $('.j-updateUserDataByAdmin .j-role .userInformation-replacement-value').unbind('click');
                        $('.j-updateUserDataByAdmin .j-role .userInformation-replacement-value').click(function(){
                            $('.j-updateUserDataByAdmin [name="role"][value="' + $(this).parents('.j-role').data('value') + '"]').parents('.radioBlock-item-input').triggerHandler('click');
                        });
                        
                        //  Sales manager    
                        $('.j-updateUserDataByAdmin .j-salesManager .userInformation-replacement-value').unbind('click');
                                            
                        if (data.donor_user_data['sales_manager_id'])
                        {
                            $('.j-updateUserDataByAdmin .j-salesManager').data('value', data.donor_user_data['sales_manager_id']);
                            $('.j-updateUserDataByAdmin .j-salesManager').removeClass('userInformation-replacement_hidden');
                            $('.j-updateUserDataByAdmin .j-salesManager .userInformation-replacement-value').text(data.donor_user_data['sales_manager_name']);
                            $('.j-updateUserDataByAdmin .j-salesManager .userInformation-replacement-value').click(function(){
                                 $('.j-updateUserDataByAdmin [name="sales_manager_id"][value="' + $(this).parents('.j-salesManager').data('value') + '"]').parents('.radioBlock-item-input').triggerHandler('click');
                            });
                        }
                                                
                        currentRow.remove();
                    },
        			error: function(data, textStatus, error)
        			{
        				mergeUsersInProcess = false;
        			}
    			});
            } else {
                mergeUsersInProcess = false;
            }
            
        });
    }
    
    var setActiveOrderInProcess = false;
    
    $('.j-setActiveOrder').click(function(){
                
        if (setActiveOrderInProcess)
            return;
        
        setActiveOrderInProcess = true;
        
        var button = $(this);
        var order_id = $(this).data('id');
        
        button.addClass('submit_inProcess');
        
        $.ajax({
			url: '/admin/set-active-order',
			type: 'post',
			data: {
			    order_id: order_id
            },
			success: function(data){					
				setActiveOrderInProcess = false;
                button.removeClass('submit_inProcess');
            },
            error: function(){
                setActiveOrderInProcess = false;
                button.removeClass('submit_inProcess');
            }
        });
        
	});
	
	$('body').on('click', '.j-searchPartsShowMore, .j-searchPartsHideMore', function(){

		var element = $(this).parents('.partsBlock-table-body-row');

		console.log(element);

		if (element.hasClass('partsBlock-table-body-row_open'))		
		{
			element.removeClass('partsBlock-table-body-row_open');

			while (true)
			{
				element = element.prev();

				if (!element.prev().hasClass('partsBlock-table-body-row_main'))
				{
					if(element.hasClass('visible_1000px')) {
						element.addClass('hidden');
					} else {
						element.addClass('partsBlock-table-body-row_hidden');
					}
				} else {
					break;
				}
			}
		} else {
			element.addClass('partsBlock-table-body-row_open');

			while (true)
			{
				element = element.prev();

				if (!element.hasClass('partsBlock-table-body-row_main'))
				{
					if(element.hasClass('visible_1000px')) {
						element.removeClass('hidden');
					} else {
						element.removeClass('partsBlock-table-body-row_hidden');
					}
				} else {
					break;
				}
			}
		}
	});

	if ($('.j-addCity').length || $('.j-editCity').length)
	{
		var addCityInProcess = false;

		$('body').on('submit', '.j-addCity form', function(e){
			e.preventDefault();

			if (addCityInProcess)
				return;

				addCityInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/cities/add-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					setTimeout(function(){
						form.parent().removeClass('j-addCity').addClass('j-editCity');
						$('<input type="hidden" name="id" value="' + data.data.id + '" />').appendTo(form);
						form.find('.unitInformation-submit-result').text('Данные обновлены');

						form.parent().removeClass('unitInformation_done');						
						addCityInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					addCityInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});

		var editCityInProcess = false;

		$('body').on('submit', '.j-editCity form', function(e){
			e.preventDefault();

			if (editCityInProcess)
				return;

				editCityInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/cities/edit-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					setTimeout(function(){
						form.parent().removeClass('unitInformation_done');						
						editCityInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					editCityInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});
	}

	if ($('.j-addBranch').length || $('.j-editBranch').length)
	{
		var addBranchInProcess = false;

		$('body').on('submit', '.j-addBranch form', function(e){
			e.preventDefault();

			if (addBranchInProcess)
				return;

				addBranchInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/branches/add-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					setTimeout(function(){
						form.parent().removeClass('j-addBranch').addClass('j-editBranch');
						$('<input type="hidden" name="id" value="' + data.data.id + '" />').appendTo(form);
						form.find('.unitInformation-submit-result').text('Данные обновлены');

						form.parent().removeClass('unitInformation_done');						
						addBranchInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					addBranchInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});

		var addBranchInProcess = false;

		$('body').on('submit', '.j-editBranch form', function(e){
			e.preventDefault();

			if (addBranchInProcess)
				return;

			addBranchInProcess = true;

			var form = $(this);

			form.parent().addClass('unitInformation_inProcess');

			var data = form.serializeArray();
			
			$.ajax({
				url: '/admin/branches/edit-process',
				type: 'post',
				data,
				dataType: 'json',
				success: function(data){
					form.find('.error').removeClass('error');
					form.parent().addClass('unitInformation_done');

					setTimeout(function(){
						form.parent().removeClass('unitInformation_done');
						addBranchInProcess = false;
						form.parent().removeClass('unitInformation_inProcess')
					}, 2000);
				},
				error: function(data, textStatus, error)
				{
					form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

					if (data.status == 400)
					{
						form.find('.error').removeClass('error');
						
						var data = data.responseJSON;

						$.each(data.error_fields, function(field, text){
							
							form.find('[name="' + field + '"]').addClass('error');

							form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

						});
					}
					addBranchInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}
			});
		});



	}


	var editInProcess = false;

	$('.j-addBranchStore form').on('submit', function(e){
		e.preventDefault();

		if (editInProcess)
			return;

		editInProcess = true;

		var form = $(this);

		form.parent().addClass('unitInformation_inProcess');

		var data = form.serializeArray();

		$.ajax({
			url: '/admin/stores/add-branch-process',
			type: 'post',
			data,
			dataType: 'json',
			success: function(response){
				$('.notify-message').addClass('hidden');
				if (response['redirect']) {
					window.location.href = response['redirect'];
				}

				form.find('.error').removeClass('error');
				form.parent().addClass('unitInformation_done');
				setTimeout(function(){
					if (response.status === 'successful') {
						$('.notify-message-success').removeClass('hidden');
						var branch = data.find(value => value.name === 'branch_id');
						if (branch) {
							$('select[name=branch_id]').find('option[value='+branch.value+']').remove();
						}
					} else if (response.status === 'error') {
						$('.notify-message-error').removeClass('hidden');
					}
					form.parent().removeClass('unitInformation_done');
					editInProcess = false;
					form.parent().removeClass('unitInformation_inProcess')
				}, 1000);
			},
			error: function(data, textStatus, error)
			{
				form.find('.unitInformation-field-error').addClass('unitInformation-field-error_hidden');

				if (data.status == 400)
				{
					form.find('.error').removeClass('error');

					var data = data.responseJSON;

					$.each(data.error_fields, function(field, text){

						form.find('[name="' + field + '"]').addClass('error');

						form.find('[name="' + field + '"]').parents('.unitInformation-field').find('.unitInformation-field-error').removeClass('unitInformation-field-error_hidden');

					});
				}
				editInProcess = false;
				form.parent().removeClass('unitInformation_inProcess')
			}
		});
		return false;
	});


	$('#branch-store-params .deleteButton').on('click', function () {
		$(this).parent().find('.branch-settings-delete').prop('checked', true);
		$(this).parent().parent().hide();
		return false;
	});

	$('a.callback').click(function(e) {
		e.preventDefault();
		$.fancybox.open('<form method="POST" action="/"><br /><input type="text" name="name" placeholder="Ваше имя" class="search-input" /><br /><br /><input type="text" name="phone" placeholder="Номер телефона" class="search-input" /><br /><br /><div align="center"><span class="button without-shadow"><input type="submit" value="Заказать звонок" /></span><br /><p style="padding-top:10px; font-size:8pt; color:#ccc;">Отправляя запрос, вы даете согласие<br />на <a href="/privacy-policy">обработку персональных данных</a> и принимаете условия<br /><a href="/terms-of-use">пользовательского соглашения</a></p></div></form>');
	});
	
	/*--------------------*/
	var __coll = document.getElementsByClassName("our-samples-collapsible");
	var __i;
	for (__i = 0; __i < __coll.length; __i++) {
		__coll[__i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.display === "block") {
				content.style.display = "none";
			} else {
				content.style.display = "block";
			}
		});
	}
});
