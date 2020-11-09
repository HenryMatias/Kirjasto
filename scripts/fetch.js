//Ajax call for the books
jQuery(document).ready(function( $ ) {
	
    $(document).ready(function() {
        $(document).on('submit', '[data-js-form=filter]', function(e){
            e.preventDefault();

            var data = $(this).serialize();
            //console.log(data);
           
            $.ajax({
                url: '../../../../wp-admin/admin-ajax.php',
                data: data,
                type: 'post',
                success: function(result) {
                    $('[data-js-filter=target]').html(result);
                },
                error: function() {
                    console.warn('Oho');
                },
            });

        });
    });
    
});

