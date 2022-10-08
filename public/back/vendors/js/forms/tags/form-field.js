(function(window, document, $) {
    'use strict';
    

    $(window).on('load',function(){
        $('.form-group-style .form-control').focus(function() {
            $(this).parent(".form-group-style").addClass('focus');
            console.log($(this).val());
            if($(this).val() !== ""){
                 $(this).parent(".form-group-style").children("label").addClass("filled");
            }
            else{
                 $(this).parent(".form-group-style").children("label").removeClass("filled");
            }
        });
        $('.form-group-style .form-control').focusout(function() {
            if($(this).parent(".form-group-style").hasClass('focus')){
                $(this).parent(".form-group-style").removeClass('focus');
            }
            if($(this).val() !== ""){
                $(this).parent(".form-group-style").children("label").addClass("filled");
            }
            else{
                $(this).parent(".form-group-style").children("label").removeClass("filled");
            }
        });

        $('.custom-file-input').on('change', function() {
            let imgName = this.files[0].name;
            let [file] = this.files;
            $(this).parents('.custom-file').find('label').text(imgName)
            $(this).parents('fieldset').find('img').attr('src', URL.createObjectURL(file));
            $(this).parents('fieldset').find('.preview_img').show();
            $(this).parents('fieldset').find('small').hide();
        })

        $('input, textarea').on('keyup', function() {
            $(this).parents('fieldset').find('small').hide();
        })

    });
})(window, document, jQuery);