(function ($, Drupal, drupalSettings) {

    /* jQuery ready function execution */
    jQuery(document).ready(function () {


        console.log(location.pathname);
        console.log($('.menu-custom-wrapper a[href="'+location.pathname+'"]'));


        function setmenu() {
            var l_split = location.pathname.split("/");
            var parent_path = '/'+l_split[1]+'/'+l_split[2]+'/'+l_split[3]+'/'+l_split[4];

            $('.menu-what-we-do-wrapper a[href="' + parent_path + '"]').addClass('active');
            $('.menu-what-we-do-wrapper option[data-url="' + parent_path + '"]').attr('selected', true);
            var selected = $('.menu-what-we-do-dropdown option:selected');
            selected.addClass('parent-selected');
            var selected_id = selected.attr('id');
            var ulid = '#sub-' + selected_id;
            $(ulid).addClass('menu-active');
        }
		
		setmenu();
	

        $(".menu-custom-dropdown").change(function () {
             var selected_option = $('.menu-custom-dropdown option:selected');
             var url = selected_option.data('url');
            location.href = url;
            //
            // $('.parent-selected').removeClass('parent-selected');
            // $('.menu-active').removeClass('menu-active');
            //
            // selected_option.addClass('parent-selected');
            // var selected_option_id = selected_option.attr('id');
            //
            // console.log(selected_option_id);
            //
            // var ulid = '#sub-' + selected_option_id;
            //
            // console.log(ulid);
            //
            //
            // $(ulid).addClass('menu-active');
            //

        });
    });

})(jQuery, Drupal, drupalSettings);
