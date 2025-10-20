$(document).ready(function(){


    $('#task-form').on('submit', function(e){
        e.preventDefault();
        
        $.ajax({
            type        : 'POST',
            url         : 'ajax.php',
            data        : $(this).serialize(),
            beforeSend  : function(){},
            success     : function( result ){
                console.log( result );
                Swal.fire({
                    title: result.message,
                    icon: "success",
                });
            },
            error       : function( jqXHR ){
                const result = jqXHR.responseJSON;

                Swal.fire({
                    icon: "error",
                    title: "خطا در ثبت",
                    text: result.message,

                  });

            },
            complete    : function(){},
        });

    });

});