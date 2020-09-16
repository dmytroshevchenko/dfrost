

$('.ajax_load_more').on('click', function (e) {
	e.preventDefault();
	ajax_load_items( $(this) );
});

$('.ajax_load_cat').on('click', function (e) {
	e.preventDefault();
	if( $(this).hasClass('load_all') ){
		$('.selected_title_cats').html('').hide();
    	$('.ajax_load_cat' ).removeClass('selected');
    	$(this).addClass('selected');
		ajax_load_items( $(this) );
		return;
	} else{
		$('.load_all').removeClass('selected');
	}
	if( $(this).hasClass('selected') && !$(this).hasClass('load_all') ){
		$(this).removeClass('selected');
	} else{
		$('.one_cat.selected').removeClass('selected');
		$(this).addClass('selected');
	}
    $(this).parents('.cats_list').slideUp();
    $(this).parents('.clients_list').slideUp();

    $('.title_cats .one_title_cat.' + $(this).data('taxonomy') + '_button' ).addClass('selected');

	$('.selected_title_cats').show().find('[data-taxonomy=' + $(this).data('taxonomy') + ']').remove();

	if( $(this).hasClass('selected') && !$(this).hasClass('load_all') ){
		$('.selected_title_cats').append('<div class="one_selected_cat" data-taxonomy="' + $(this).data('taxonomy') + '" data-term_id="' + $(this).data('term_id') + '">' + $(this).text() + '<div class="close_button"><span class="icon-times"></span></div></div>');
	}
	ajax_load_items( $(this) );
});

$(document).on("click", ".one_selected_cat .close_button", function(e){
	var taxonomy = $(this).parents('.one_selected_cat').data('taxonomy');
	var term_id = $(this).parents('.one_selected_cat').data('term_id');

	var button = $('.ajax_load_cat[data-taxonomy="' + taxonomy + '"][data-term_id="' + term_id + '"]');
	if( button.hasClass('selected') ){
		button.trigger('click');
	}

	$(this).parents('.one_selected_cat').remove();
    $('.title_cats .one_title_cat.' + taxonomy + '_button' ).removeClass('selected');

	if( $('.selected_title_cats').find('.one_selected_cat').length ){
		var selected_cat = $('.selected_title_cats').find('.one_selected_cat').eq(0);
		ajax_load_items( selected_cat );
	} else{
		$('.selected_title_cats').hide();
		$('.load_all').addClass('selected');
	}
});



function ajax_load_items( button ){

	var selected_cat = $('.one_selected_cat').eq(0);
	if( button.hasClass('ajax_load_more') ){
		var post_type = button.data('post_type');
		var load = 'more';
		var taxonomy = [ selected_cat.data('taxonomy') ];
		var term_id = [ selected_cat.data('term_id') ];
		var loaded_number = $('.masonry_grid').find('.grid-item').length;
	} else if( button.hasClass('ajax_load_cat') ) {
		var post_type = button.parents('.container').find('.ajax_load_more').data('post_type');
		var taxonomy = []
		var term_id = []
		$('.one_selected_cat').each(function(){
			taxonomy.push( $(this).data('taxonomy') );
			term_id.push( $(this).data('term_id') );
		});
		var load = 'term';
		var loaded_number = $('.masonry_grid').find('.grid-item').length;
	} else{
		var post_type = false;
	}
	if( !selected_cat.length ){
		term_id = 0;
	}

	if (post_type){
		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			type: 'POST',
			data: {
				action: 'ajax_load_items',
				post_type: post_type,
				taxonomy: taxonomy,
				term_id: term_id,
				load: load,
				loaded_number: loaded_number
			},
			beforeSend: function(){

			},
			success: function(data) {
				if( load == 'term' ){
					$('.masonry_grid').html(data.data.html);
				} else if( load == 'more' ){
					$('.masonry_grid').append(data.data.html);
				}

				$(window).trigger('resize');
				$('.masonry_grid').masonry( 'reloadItems' );
				$('.masonry_grid').masonry( 'layout' );

				if( data.data.hide_button ){
					$('.btn-outline-dark.ajax_load_more').hide();
				} else{
					$('.btn-outline-dark.ajax_load_more').show();
				}

			}
		});
	}

}