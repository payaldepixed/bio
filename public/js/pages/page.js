$( document ).ready(function() {
    fetchBlocks();
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

    function fetchBlocks()
    {
        $.ajax({
            url:'/admin/getblocks',
            method:'get',
            success:function(data)
            {
                $('#blocks').html(data);
            }
        });
        $.ajax({
            url:'/admin/previewblocks',
            method:'get',
            success:function(data)
            {
                $('#preview-blocks').html(data);
            }
        });
    }

    $(".addText,.addMedia,.addDivider,.addLink").on('click',function(e)
    {
        e.preventDefault();
        var formname = $(e.currentTarget).attr('data-id');
        submitBlock(formname);
    });

    function submitBlock(formname){
        var form = $('#'+formname);
        var url = form.attr('action');
        var contentType = false;
        if(formname == 'addText'){
            var data = form.serialize();
            var description = $('#summernote').summernote('code');
            data = data + "&description="+description;
            contentType = 'application/x-www-form-urlencoded';
        }else{
            var data = new FormData(form[0]);
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data: data,
            contentType: contentType,
            cache: false,
            processData:false,
            success: function()
            {
                $('.modal').modal('hide');
                fetchBlocks();
                $("input[name='id']").val('');
            }
        });
    }

    $(document).on("click", ".deleteBlock", function () {
        var id = $(this).data('id');
        $(".deleteBlockBtn").data('id',id);
    });

    $(document).on("click", ".deleteBlockBtn", function () {
        var id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '/admin/block/remove',
            data: {id:id},
            success: function()
            {
                fetchBlocks();
            }
        });
    });

    $(document).on("click", ".copyBlock", function () {
        var id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '/admin/block/copy',
            data: {id:id},
            success: function()
            {
                fetchBlocks();
            }
        });
    });

    $(document).on("click", ".card-view-layout", function () {
        var type = $(this).data('type');
        setClass(type);
        $('.card-view-layout').removeClass('selected');
        $(this).addClass('selected');
        $("#layout").val(type);
        $(".links_preview").hide();
        $("#layout_preview_"+type).show();
        if(type != 1){
            $("#file").show();
        }else{
            $("#file").hide();
        }
        if(type == 5){
            $("#grid").show();
        }else{
            $("#grid").hide();
        }
        if(type == 4 || type == 5 || type == 6){
            $("#labelDiv").show();
        }else{
            $("#labelDiv").hide();
        }
    });

    $("#link_title").change(function() {
        var type = $("#layout").val();
        $("#layout_title_"+type).html($("#link_title").val());
    });

    $("#link_description").change(function() {
        var type = $("#layout").val();
        $("#layout_desc_"+type).html($("#link_description").val());
    });

    $("#divider_title").change(function() {
        $("#divider_title1").text($(this).val());
        $("#divider_title2").text($(this).val());
    });

    $("#media_url").change(function() {
        $('#embed_preview_default').hide();
        $('#embed_preview').show();
        $('#iframeUrl').attr('src',$(this).val());
    });

    $('#summernote').on("summernote.change", function (e) {
        $("#text_preview").html($('#summernote').summernote('code'));
    });

    // $('#summernote').summernote({
    //     callbacks: {
    //       onKeyup: function() {
    //         setTimeout(function(){
    //             $("#text_preview").html($('#summernote').summernote('code'));
    //         },200);
    //       }
    //     }
    //   });

    $(document).on("click", ".editBlock", function () {
        var type = $(this).data('type');
        var id = $(this).data('id');
        $("input[name='id']").val(id);
        $('#edit_'+type).text('Edit '+type);
        var title,url,description,grid,label,animation,layout;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '/admin/getblock',
            data: {id:id},
            success: function(data)
            {
                title = data.title;
                url = data.url;
                description = data.description;
                grid = data.grid;
                label = data.label;
                layout = data.layout;
                animation = data.animation;
                $("#layout").val(layout);
                if(type == 'link'){
                    if(data.medias[0] != undefined){
                        $('#removeImg').attr('data-id',data.medias[0].id);
                        $('#fileAction').show();
                    }else{
                        $('#fileAction').hide();
                    }
                    $('.links_preview').hide();
                    $('#layout_preview_'+layout).show();
                    setClass(layout);
                    $('.card-view-layout').removeClass('selected');
                    $('.layout_'+layout).addClass('selected');
                    $('#link_url').val(url);
                    $('#link_title').val(title);
                    $('#link_description').val(description);
                    $('#grid_size').val(grid);
                    $('#label').val(label);
                    $('#animation').val(animation);
                    $("#layout_title_"+layout).html(title);
                    $("#layout_desc_"+layout).html(description);
                    if(layout != 1){
                        $("#file").show();
                    }else{
                        $("#file").hide();
                    }
                    if(layout == 5){
                        $("#grid").show();
                    }else{
                        $("#grid").hide();
                    }
                    if(layout == 4 || layout == 5 || layout == 6){
                        $("#labelDiv").show();
                    }else{
                        $("#labelDiv").hide();
                    }
                    $('#new_link').modal('show');
                }
                if(type == 'divider'){
                    $('#divider_title').val(title);
                    $('#new_divider').modal('show');
                }
                if(type == 'media'){
                    $('#media_url').val(url);
                    $('#embed_preview_default').hide();
                    $('#embed_preview').show();
                    $('#iframeUrl').attr('src',url);
                    $('#new_media').modal('show');
                }
                if(type == 'text'){
                    $("#summernote").summernote("code",description);
                    $('#new_text').modal('show');
                }
            }
        });

    });

    $(document).on("click", "#uploadFile", function () {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            var type = $("#layout").val();
            if(type == 2){$('#layout_img_2').attr('src', e.target.result);}
            if(type == 4){$('#layout_img_4').attr('src', e.target.result);}
            if(type == 5){$('#layout_img_5').attr('src', e.target.result);}
            if(type == 6){$('#layout_img_6').attr('src', e.target.result);}
            if(type == 3){$('#layout_img_3').css('background-image','url(' + e.target.result + ')');}
          }
          reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on("click", "#removeImg", function () {
        var id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '/admin/block/media/remove',
            data: {id:id},
            success: function(){}
        });
    });

    $(document).on("click", ".model-card", function () {
        $("input[name='id']").val('');
        $('#edit_text').text('New text');
        $('#edit_media').text('New media');
        $('#edit_link').text('New link');
        $('#edit_divider').text('New divider');
        $("#summernote").summernote("code",'');
        $("#text_preview").html('<h2>This is example text</h2>\
        <p>Start writing in the text box to add your own 🙌</p>');
        $('#addLink')[0].reset();
        $('#addDivider')[0].reset();
        $('#addMedia')[0].reset();
        $('#addText')[0].reset();
    });

    function setClass(type) {
        $("#linkPreview").removeClass("normal");
        $("#linkPreview").removeClass("thumbnail-basic");
        $("#linkPreview").removeClass("button-image-background");
        $("#linkPreview").removeClass("thumbnail-highlight");
        $("#linkPreview").removeClass("thumbnail-grid");
        $("#linkPreview").removeClass("thumbnail-carousel");
        if(type == 1){$("#linkPreview").addClass('normal');}
        if(type == 2){$("#linkPreview").addClass('thumbnail-basic');}
        if(type == 3){$("#linkPreview").addClass('button-image-background');}
        if(type == 4){$("#linkPreview").addClass('thumbnail-highlight');}
        if(type == 5){$("#linkPreview").addClass('thumbnail-grid');}
        if(type == 6){$("#linkPreview").addClass('thumbnail-carousel');}
    }

});
