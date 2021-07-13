$( document ).ready(function() {

    //form page
    if($('#generalForm').length){

        $('#profile_picture').on('change', function() {
            if(this.files && this.files[0]) {
            var reader = new FileReader();
            $('#img').show();
            reader.onload = function(e) {
            $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        });

    }

    if($('#socialForm').length){

        $(".links").on('change',function()
        {
            var name = $(this).val();
            if($(this).is(':checked')){
                $("#social_"+name).show();
            }else{
                $("#social_"+name).hide();
            }
            $("#"+name).val('');
        });

        $(".removeSocial").on('click',function()
        {
            var type = $(this).data('type');
            $("#social_"+type).hide();
            $("#"+type).val('');
            $("input[id='type_"+type+"']:checkbox").prop('checked',false);
        });

    }

});
