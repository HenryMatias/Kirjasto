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


// Form input fields
document.addEventListener("input", inputsActive => {
    document.getElementById("user").addEventListener("input", userInput => {
        const USER = document.getElementById("user").value;
        const LABEL = document.getElementById("userlabel");
        const LOGO = document.getElementById("userlogo");
        USER.length > 6 ? LABEL.classList.add("active") : LABEL.classList.remove("active");
        USER.length > 6 ? LOGO.classList.add("red") : LOGO.classList.remove("red");
    });
    document.getElementById("email").addEventListener("input", emailInput => {
        const EMAIL = document.getElementById("email").value;
        const LABEL = document.getElementById("emaillabel");
        const LOGO = document.getElementById("emaillogo");
        EMAIL.length > 6 ? LABEL.classList.add("active") : LABEL.classList.remove("active");
        EMAIL.length > 6 ? LOGO.classList.add("red") : LOGO.classList.remove("red");
    });
    document.addEventListener("input", buttonActive => {
        const el = document.getElementById("cta");
        const input1 = document.getElementById("email").value;
        const input2 = document.getElementById("user").value;
        input1.length > 6 && input2.length > 6 ? el.classList.add("buttonactive") : el.classList.remove("buttonactive");
    })
})