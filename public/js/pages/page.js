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

        $(".sociallinks").on('change',function(e)
        {
            var type = $(this).val();
            if($(this).is(':checked')){
                $("#social_"+type).show();
            }else{
                $("#social_"+type).hide();
                $("#social_link_"+type).hide();
                e.preventDefault();
                submitSocial();
            }
            $("#"+type).val('');
        });

        $(".removeSocial").on('click',function(e)
        {
            var type = $(this).data('type');
            $("#social_"+type).hide();
            $("#"+type).val('');
            $("input[id='type_"+type+"']:checkbox").prop('checked',false);
            $("#social_link_"+type).hide();
            e.preventDefault();
            submitSocial();
        });

        $(".types").keyup(function() {
            var type = $(this)[0].id;
            var url = $(this).val();
            if(url){
                $("#social_link_"+type).show();
            }else{
                $("#social_link_"+type).hide();
            }
            $("#social_error_"+type).text(type == 'email' ? validateEmail(url) : validateUrl(url));
        });

        $(".types").focusout(function(e) {
            e.preventDefault();
            submitSocial();
            var type = $(this)[0].id;
            var url = $(this).val();
            $("#social_link_"+type).show();
            $("#social_link_"+type).attr("href",url);
            $("#social_error_"+type).text(type == 'email' ? validateEmail(url) : validateUrl(url));
        });

        function validateEmail(url){
            if(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i.test(url)){
                return '';
            } else {
                return 'Please enter a valid Email Address';
            }
        }

        function validateUrl(url){
            if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(url)){
                return '';
            } else {
                return 'Please enter a valid URL';
            }
        }

        function submitSocial(){
            var form = $('#socialForm');
            var url = form.attr('action');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function()
                {
                    //$('#socialData').html(data);
                }
            });
        }

    }

});
