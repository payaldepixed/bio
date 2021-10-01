
$( document ).ready(function() {

    //listing page
    if($('#ThemeTableList').length){
        //console.log('listing');
        let searchParams = new URLSearchParams(window.location.search)
        var page = 1;
        var search = '';
        var sort_by = '';
        var sort_type = '';
        var filter = '';
        if(searchParams.has('page')){
            page = searchParams.get('page');
        }
        if(searchParams.has('filter')){
            filter = searchParams.get('filter');
        }
        if(searchParams.has('search')){
            search = searchParams.get('search');
        }
        if(searchParams.has('sort_by')){
            sort_by = searchParams.get('sort_by');
        }
        if(searchParams.has('sort_type')){
            sort_type = searchParams.get('sort_type');
        }
        fetchData(page,filter,search,sort_by,sort_type);
        $(document).on('click', '.pagination a', function(e){
            e.preventDefault();
            page = $(this).attr('href').split('page=')[1];
            fetchData(page,filter,search,sort_by,sort_type);
        });
        $(document).on('click', '#filter', function(){
            filter = $(this).val();
            fetchData(1,filter,search,sort_by,sort_type);
        });
        $(document).on('click', '#search', function(){
            search = $('#searchTxt').val();
            search = search.replace(/ /g, "%20");
            fetchData(1,filter,search,sort_by,sort_type);
        });
        $(document).on('click', '.sorting', function(){
            var column_name = $(this).data('column_name');
            var order_type = $(this).data('sorting_type');
            var reverse_order = '';
            if(order_type == 'asc')
            {
                $(this).data('sorting_type', 'desc');
                reverse_order = 'desc';
            }
            if(order_type == 'desc')
            {
                $(this).data('sorting_type', 'asc');
                reverse_order = 'asc';
            }
            fetchData(page,filter,search,column_name,reverse_order);
        });
        function fetchData(page,filter,search,sort_by,sort_type)
        {
            var url = "theme/getdata?page="+page;
            if(filter){
                url = url+"&filter="+filter;
            }
            if(search){
                url = url+"&search="+search;
            }
            if(search){
                url = url+"&search="+search;
            }
            if(sort_by){
                url = url+"&sort_by="+sort_by;
            }
            if(sort_type){
                url = url+"&sort_type="+sort_type;
            }
            $.ajax({
                url:url,
                success:function(data)
                {
                    $('#themes').html(data);
                    if(filter){
                        window.history.replaceState(null, null, "?page="+page+"&filter="+filter);
                    }else if(search){
                        window.history.replaceState(null, null, "?page="+page+"&filter="+filter+"&search="+search);
                    }else if(sort_type && sort_by){
                        window.history.replaceState(null, null, "?page="+page+"&filter="+filter+"&search="+search+"&sort_by="+sort_by+"&sort_type="+sort_type);
                    }else{
                        window.history.replaceState(null, null, "?page="+page);
                    }
                }
            });
        }
    }

    $(document).on("click", ".deleteModal", function () {
        var url = $(this).data('url');
        $(".deleteUrl").attr('href',url);
    });

    if($('#id').val()){
        setDesign();
    }

    function setDesign() {

        var color = $("input[name='primary_text_color']").val();
        $(".preview-all, .powered-by, .link-text").css("color", color);
        $(".preview-all .selected-social-icon .selected-icon path").css(
            "fill",
            color
        );
        $(".link-img path, .share_vcard_icons svg").css("stroke", color);

        var type = $("input[name='primary_background_type']").val();
        type = type ? type : 'color';
        $("#selectColor .select-color.selected").removeClass("selected");
        $('.custom-'+type).addClass("selected");

        if(type == 'preset'){
            var background = $("#primary_background_preset").val();
            $("#preview_size .card-layout").css("background-image", background);
        }
        if(type == 'gradient'){
            var background = $("#settings_background_type_gradient_color_one").val();
            var background2 = $("input[name='secondary_background']").val();
            $("#preview_size .card-layout").css(
                "background-image",
                "linear-gradient(135deg, " +
                    background +
                    " 10%, " +
                    background2 +
                    " 100%)"
            );
        }
        if(type == 'color'){
            var background = $("#settings_background_type_color").val();
            $("#preview_size .card-layout").css("background-image", "");
            $("#preview_size .card-layout").css("background-color", background);
        }
        if(type == 'image'){
            var imgurl = $("#imgurl").val();
            $("#background_type_image_preview").attr("src", imgurl);
            $("#preview_size .card-layout").css(
                "background-image",
                "url(" + imgurl + ")"
            );
            $("#preview_size .card-layout").css("background-color", "");
            $("#preview_size .card-layout").css("background-repeat", "no-repeat");
            $("#preview_size .card-layout").css("background-size", "cover");
            $("#preview_size .card-layout").css(
                "background-position",
                "center center"
            );
            $("#preview_size .card-layout").css("min-height", "100%");
        }
        if(type == 'video'){
            var videourl = $("#videourl").val();
            var $source = $("#video_here");
            $source[0].src = videourl;
            $source.parent()[0].load();
            $("#bgVideo").removeClass("d-none");
            $("#preview_size .card-layout").removeAttr("style");
        }

        var value = $("input[name='profile_picture_shadow']").val();
        var profileShadow = "#0000004d 0px 10px 30px " + value + "px";
        $("#previewImg").css("box-shadow", profileShadow);

        var value = $("input[name='profile_picture_border']").val();
        $("#previewImg").css("border-width", value + "px");
        $("#previewImg").css("border-color", "#000000");

        var value = $("input[name='profile_picture_border_color']").val();
        $("#previewImg").css("border-color", value);

        var value = $("input[name='card_shadow']").val();
        var one = "#0000004d 0px 10px 30px " + value + "px";
        $(".preview-card-body").css("box-shadow", one);

        var value = $("input[name='card_spacing']").val();
        $(".preview-card-body").css("margin-bottom", value + "px");

        var value = $("input[name='text_font']").val();
        var font = '"' + value + '", sans-serif';
        $("#preview_size").css("font-family", font);

    }

    //design script
    $(
        '.preview-layout img[src$=".svg"], .tactile-item img[src$=".svg"], .preview_share img[src$=".svg"]'
    ).each(function () {
        var $img = jQuery(this);
        var imgURL = $img.attr("src");
        var attributes = $img.prop("attributes");

        $.get(
            imgURL,
            function (data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find("svg");

                // Remove any invalid XML tags
                $svg = $svg.removeAttr("xmlns:a");

                // Loop through IMG attributes and apply on SVG
                $.each(attributes, function () {
                    $svg.attr(this.name, this.value);
                });

                // Replace IMG with SVG
                $img.replaceWith($svg);
            },
            "xml"
        );
    });

    var color = "#b1f3b3";

    $(document).on("input", "#primary-background input", function () {
        // $("#previewImg").css("border-width", $(this).val() + "px");
        $(".card-layout").css("background-color", $(this).val());

        color = $(this).val();
        var rgbaCol =
            "rgba(" +
            parseInt(color.slice(-6, -4), 16) +
            "," +
            parseInt(color.slice(-4, -2), 16) +
            "," +
            parseInt(color.slice(-2), 16) +
            ",0.9)";
        $("#preview_size").css("background-color", rgbaCol);
    });

    $(document).on("input", "#primary-text-color input", function () {
        $(".preview-all, .powered-by, .link-text").css("color", $(this).val());
        $(".preview-all .selected-social-icon .selected-icon path").css(
            "fill",
            $(this).val()
        );
        $(".link-img path, .share_vcard_icons svg").css(
            "stroke",
            $(this).val()
        );
    });

    $("#mobile_layout").on("click", function () {
        $("#website_layout").removeClass("selected");
        $("#preview_size").addClass("mobile_size");
        $(this).addClass("selected");
    });

    $("#website_layout").on("click", function () {
        $("#mobile_layout").removeClass("selected");
        $("#preview_size").removeClass("mobile_size");
        $(this).addClass("selected");
    });

    $(document).on("input", "#profile_img_border", function () {
        $("#previewImg").css("border-width", $(this).val() + "px");
        $("#previewImg").css("border-color", "#000000");
    });

    $(document).on("input", "#profile-picture-border-color input", function () {
        $("#previewImg").css("border-color", $(this).val());
    });

    $(document).on("input", "#profileShadow", function () {
        // console.log("shadow", $(this).val());
        if ($(this).val() > 0) {
            var profileShadow =
                "#0000004d 0px 10px 30px " + $(this).val() + "px";
            $("#previewImg").css("box-shadow", profileShadow);
        } else {
            $("#previewImg").css("box-shadow", "");
        }
    });

    $("#fonts .font-item").on("click", function () {
        if ($(this).hasClass("opan-sans")) {
            var font = '"Open Sans", sans-serif';
            $("#preview_size").css("font-family", font);
        } else if ($(this).hasClass("roboto")) {
            var font = '"Roboto", sans-serif';
            $("#preview_size").css("font-family", font);
        } else if ($(this).hasClass("lato")) {
            var font = '"Lato", sans-serif';
            $("#preview_size").css("font-family", font);
        } else if ($(this).hasClass("dosis")) {
            var font = '"Dosis", sans-serif';
            $("#preview_size").css("font-family", font);
        } else if ($(this).hasClass("fuggles")) {
            var font = '"Fuggles", sans-serif';
            $("#preview_size").css("font-family", font);
        }
        $("#text_font").val($(this).data("id"));
    });

    // custom background js
    $("#selectColor .select-color").on("click", function () {
        $("#selectColor .select-color.selected").removeClass("selected");
        $(this).addClass("selected");
        $('#primary_background_type').val($(this).data('type'));
        $("#background_type_preset").addClass("d-none");
        $("#background_type_gradient").addClass("d-none");
        $("#background_type_color").addClass("d-none");
        $("#background_type_image").addClass("d-none");
        $("#background_type_video").addClass("d-none");
        $("#bgVideo").addClass("d-none");

        if ($(this).hasClass("preset")) {
            $("#mainTitleBackground").html("Preset");
            $("#background_type_preset").removeClass("d-none");
        } else if ($(this).hasClass("custom-gradient")) {
            $("#mainTitleBackground").html("Custom Gradient");
            $("#background_type_gradient").removeClass("d-none");
        } else if ($(this).hasClass("custom-color")) {
            $("#mainTitleBackground").html("Custom Color");
            $("#background_type_color").removeClass("d-none");
        } else if ($(this).hasClass("custom-image")) {
            $("#mainTitleBackground").html("Custom Image");
            $("#background_type_image").removeClass("d-none");
        } else if ($(this).hasClass("custom-video")) {
            $("#mainTitleBackground").html("Custom Video");
            $("#background_type_video").removeClass("d-none");
            $("#background_type_video_input").val("");
        }

        // console.log("selecttype", $(this).text());
    });

    $("#background_type_preset input").on("click", function () {
        $('#primary_background_preset').val($(this).val());
        $("#preview_size .card-layout").css("background-image", $(this).val());
    });

    $(document).on(
        "input",
        "#settings_background_type_gradient_color_one",
        function () {
            $("#preview_size .card-layout").css(
                "background-image",
                "linear-gradient(135deg, " +
                    $(this).val() +
                    " 10%, " +
                    $("#settings_background_type_gradient_color_two").val() +
                    " 100%)"
            );
        }
    );

    $(document).on(
        "input",
        "#settings_background_type_gradient_color_two",
        function () {
            $("#preview_size .card-layout").css(
                "background-image",
                "linear-gradient(135deg, " +
                    $("#settings_background_type_gradient_color_one").val() +
                    " 10%, " +
                    $(this).val() +
                    " 100%)"
            );
        }
    );

    $(document).on("input", "#settings_background_type_color", function () {
        $("#preview_size .card-layout").css("background-image", "");
        $("#preview_size .card-layout").css("background-color", $(this).val());
    });

    $(document).on("input", "#background_type_image_input", function (event) {
        var imageUrl = URL.createObjectURL(event.target.files[0]);
        $("#background_type_image_preview").attr("src", imageUrl);
        $("#preview_size .card-layout").css(
            "background-image",
            "url(" + imageUrl + ")"
        );
        $("#preview_size .card-layout").css("background-color", "");
        $("#preview_size .card-layout").css("background-repeat", "no-repeat");
        $("#preview_size .card-layout").css("background-size", "cover");
        $("#preview_size .card-layout").css(
            "background-position",
            "center center"
        );
        $("#preview_size .card-layout").css("min-height", "100%");
    });

    $(document).on("change", "#background_type_video_input", function (evt) {
        var $source = $("#video_here");
        $source[0].src = URL.createObjectURL(this.files[0]);
        $source.parent()[0].load();
        $("#bgVideo").removeClass("d-none");
        $("#preview_size .card-layout").removeAttr("style");
    });

});
