$(document).ready(function () {
    //block script
    var link_id = $("#link_id").val();
    fetchBlocks();
    if ($("#socialForm").length) {
        $(".sociallinks").on("change", function (e) {
            var type = $(this).val();
            if ($(this).is(":checked")) {
                $(".social_" + type).show();
            } else {
                $(".social_" + type).hide();
                $("#social_link_" + type).hide();
                e.preventDefault();
                submitSocial();
            }
            $("#" + type).val("");
        });

        $(".removeSocial").on("click", function (e) {
            var type = $(this).data("type");
            $(".social_" + type).hide();
            $("#" + type).val("");
            $("input[id='type_" + type + "']:checkbox").prop("checked", false);
            $("#social_link_" + type).hide();
            e.preventDefault();
            submitSocial();
        });

        $(".types").keyup(function () {
            var type = $(this)[0].id;
            var url = $(this).val();
            if (url) {
                $("#social_link_" + type).show();
            } else {
                $("#social_link_" + type).hide();
            }
            $("#social_error_" + type).text(
                type == "email" ? validateEmail(url) : validateUrl(url)
            );
        });

        $(".types").focusout(function (e) {
            e.preventDefault();
            submitSocial();
            var type = $(this)[0].id;
            var url = $(this).val();
            $("#social_link_" + type).show();
            $("#social_link_" + type).attr("href", url);
            $("#social_error_" + type).text(
                type == "email" ? validateEmail(url) : validateUrl(url)
            );
        });

        function validateEmail(url) {
            if (
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i.test(
                    url
                )
            ) {
                return "";
            } else {
                return "Please enter a valid Email Address";
            }
        }

        function validateUrl(url) {
            if (
                /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(
                    url
                )
            ) {
                return "";
            } else {
                return "Please enter a valid URL";
            }
        }

        function submitSocial() {
            var form = $("#socialForm");
            var url = form.attr("action");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function () {
                    //$('#socialData').html(data);
                    //$('#socialSort').trigger('sortupdate');
                },
            });
        }
    }

    function fetchBlocks() {
        $.ajax({
            url: window.location.origin + "/getblocks/" + link_id,
            method: "get",
            success: function (data) {
                $("#blocks").html(data);
            },
        });
        $.ajax({
            url: window.location.origin + "/previewblocks/" + link_id,
            method: "get",
            success: function (data) {
                $("#preview-blocks").html(data);
                setDesign();
            },
        });
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
        type = type ? type : "color";
        $("#selectColor .select-color.selected").removeClass("selected");
        $(".custom-" + type).addClass("selected");

        if (type == "preset") {
            var background = $("#primary_background_preset").val();
            $("#preview_size .card-layout").css("background-image", background);
        }
        if (type == "gradient") {
            var background = $(
                "#settings_background_type_gradient_color_one"
            ).val();
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
        if (type == "color") {
            var background = $("#settings_background_type_color").val();
            $("#preview_size .card-layout").css("background-image", "");
            $("#preview_size .card-layout").css("background-color", background);
        }
        if (type == "image") {
            var imgurl = $("#imgurl").val();
            $("#background_type_image_preview").attr("src", imgurl);
            $("#preview_size .card-layout").css(
                "background-image",
                "url(" + imgurl + ")"
            );
            $("#preview_size .card-layout").css("background-color", "");
            $("#preview_size .card-layout").css(
                "background-repeat",
                "no-repeat"
            );
            $("#preview_size .card-layout").css("background-size", "cover");
            $("#preview_size .card-layout").css(
                "background-position",
                "center center"
            );
            // $("#preview_size .card-layout").css("min-height", "100%");
        }
        if (type == "video") {
            var videourl = $("#videourl").val();
            var $source = $("#video_here");
            $source[0].src = videourl;
            $source.parent()[0].load();
            $("#bgVideo").removeClass("d-none");
            $("#preview_size .card-layout").removeAttr("style");
        }

        // var color = $("input[name='primary_background']").val();
        // $(".card-layout").css("background-color", color);
        // var rgbaCol =
        //     "rgba(" +
        //     parseInt(color.slice(-6, -4), 16) +
        //     "," +
        //     parseInt(color.slice(-4, -2), 16) +
        //     "," +
        //     parseInt(color.slice(-2), 16) +
        //     ",0.9)";
        // $("#preview_size").css("background-color", rgbaCol);

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

        var value = $("input[name='button_color']").val();
        $(".preview-card-body, #preview_size .details").css(
            "background-color",
            value
        );

        var value = $("input[name='button_text_color']").val();
        $(
            ".preview-card-body .main-title, .preview-card-body .subtitle-title, #preview_size .details .title, #preview_size .details .dec"
        ).css("color", value);

        var value = $("input[name='button_corner']").val();
        $(".preview-card-body").css("border-radius", value + "px");

        var value = $("input[name='button_border']").val();
        $(".preview-card-body").css("border-width", value + "px");
        $(".preview-card-body").css("border-color", "#000000");

        var value = $("input[name='button_border_color']").val();
        $(".preview-card-body").css("border-color", value);

        var card = $("input[name='tactile_card']").val();
        if (card != 0) {
            $(".tactile_" + card).trigger("click");
        }
    }

    $(".addText,.addMedia,.addDivider,.addLink").on("click", function (e) {
        e.preventDefault();
        var formname = $(e.currentTarget).attr("data-id");
        submitBlock(formname);
    });

    function submitBlock(formname) {
        var form = $("#" + formname);
        var url = form.attr("action");
        var contentType = false;
        if (formname == "addText") {
            var data = form.serialize();
            var description = $("#summernote").summernote("code");
            data = data + "&description=" + description + "&link_id=" + link_id;
            contentType = "application/x-www-form-urlencoded";
        } else {
            var data = new FormData(form[0]);
            data.append("link_id", link_id);
        }
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: url,
            data: data,
            contentType: contentType,
            cache: false,
            processData: false,
            success: function () {
                $(".modal").modal("hide");
                fetchBlocks();
                $("input[name='id']").val("");
            },
        });
    }

    $(document).on("click", ".deleteBlock", function () {
        var id = $(this).data("id");
        $(".deleteBlockBtn").data("id", id);
    });

    $(document).on("click", ".deleteBlockBtn", function () {
        var id = $(this).data("id");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/admin/block/remove",
            data: { id: id },
            success: function () {
                fetchBlocks();
            },
        });
    });

    $(document).on("click", ".copyBlock", function () {
        var id = $(this).data("id");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/admin/block/copy",
            data: { id: id },
            success: function () {
                fetchBlocks();
            },
        });
    });

    $(document).on("click", ".card-view-layout", function () {
        var type = $(this).data("type");
        setClass(type);
        $(".card-view-layout").removeClass("selected");
        $(this).addClass("selected");
        $("#layout").val(type);
        $(".links_preview").hide();
        $("#layout_preview_" + type).show();
        if (type != 1) {
            $("#file").show();
        } else {
            $("#file").hide();
        }
        if (type == 5) {
            $("#grid").show();
        } else {
            $("#grid").hide();
        }
        if (type == 4 || type == 5 || type == 6) {
            $("#labelDiv").show();
        } else {
            $("#labelDiv").hide();
        }
    });

    $("#link_title").change(function () {
        var type = $("#layout").val();
        $("#layout_title_" + type).html($("#link_title").val());
    });

    $("#link_description").change(function () {
        var type = $("#layout").val();
        $("#layout_desc_" + type).html($("#link_description").val());
    });

    $("#divider_title").change(function () {
        $("#divider_title1").text($(this).val());
        $("#divider_title2").text($(this).val());
    });

    $("#media_url").change(function () {
        $("#embed_preview_default").hide();
        $("#embed_preview").show();
        $("#iframeUrl").attr("src", $(this).val());
    });

    $("#summernote").on("summernote.change", function (e) {
        $("#text_preview").html($("#summernote").summernote("code"));
    });

    $(document).on("click", ".editBlock", function () {
        var type = $(this).data("type");
        var id = $(this).data("id");
        $("input[name='id']").val(id);
        $("#edit_" + type).text("Edit " + type);
        var title, url, description, grid, label, animation, layout;
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/admin/getblock",
            data: { id: id },
            success: function (data) {
                title = data.title;
                url = data.url;
                description = data.description;
                grid = data.grid;
                label = data.label;
                layout = data.layout;
                animation = data.animation;
                $("#layout").val(layout);
                if (type == "link") {
                    if (data.medias[0] != undefined) {
                        $("#removeImg").attr("data-id", data.medias[0].id);
                        $("#fileAction").show();
                    } else {
                        $("#fileAction").hide();
                    }
                    $(".links_preview").hide();
                    $("#layout_preview_" + layout).show();
                    setClass(layout);
                    $(".card-view-layout").removeClass("selected");
                    $(".layout_" + layout).addClass("selected");
                    $("#link_url").val(url);
                    $("#link_title").val(title);
                    $("#link_description").val(description);
                    $("#grid_size").val(grid);
                    $("#label").val(label);
                    $("#animation").val(animation);
                    $("#layout_title_" + layout).html(title);
                    $("#layout_desc_" + layout).html(description);
                    if (layout != 1) {
                        $("#file").show();
                    } else {
                        $("#file").hide();
                    }
                    if (layout == 5) {
                        $("#grid").show();
                    } else {
                        $("#grid").hide();
                    }
                    if (layout == 4 || layout == 5 || layout == 6) {
                        $("#labelDiv").show();
                    } else {
                        $("#labelDiv").hide();
                    }
                    $("#new_link").modal("show");
                }
                if (type == "divider") {
                    $("#divider_title").val(title);
                    $("#new_divider").modal("show");
                }
                if (type == "media") {
                    $("#media_url").val(url);
                    $("#embed_preview_default").hide();
                    $("#embed_preview").show();
                    $("#iframeUrl").attr("src", url);
                    $("#new_media").modal("show");
                }
                if (type == "text") {
                    $("#summernote").summernote("code", description);
                    $("#new_text").modal("show");
                }
            },
        });
    });

    $(document).on("click", "#uploadFile", function () {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var type = $("#layout").val();
                if (type == 2) {
                    $("#layout_img_2").attr("src", e.target.result);
                }
                if (type == 4) {
                    $("#layout_img_4").attr("src", e.target.result);
                }
                if (type == 5) {
                    $("#layout_img_5").attr("src", e.target.result);
                }
                if (type == 6) {
                    $("#layout_img_6").attr("src", e.target.result);
                }
                if (type == 3) {
                    $("#layout_img_3").css(
                        "background-image",
                        "url(" + e.target.result + ")"
                    );
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on("click", "#removeImg", function () {
        var id = $(this).data("id");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/admin/block/media/remove",
            data: { id: id },
            success: function () {},
        });
    });

    $(document).on("click", ".model-card", function () {
        $("input[name='id']").val("");
        $("#edit_text").text("New text");
        $("#edit_media").text("New media");
        $("#edit_link").text("New link");
        $("#edit_divider").text("New divider");
        $("#summernote").summernote("code", "");
        $("#text_preview").html(
            "<h2>This is example text</h2>\
        <p>Start writing in the text box to add your own 🙌</p>"
        );
        $("#addLink")[0].reset();
        $("#addDivider")[0].reset();
        $("#addMedia")[0].reset();
        $("#addText")[0].reset();
    });

    function setClass(type) {
        $("#linkPreview").removeClass("normal");
        $("#linkPreview").removeClass("thumbnail-basic");
        $("#linkPreview").removeClass("button-image-background");
        $("#linkPreview").removeClass("thumbnail-highlight");
        $("#linkPreview").removeClass("thumbnail-grid");
        $("#linkPreview").removeClass("thumbnail-carousel");
        if (type == 1) {
            $("#linkPreview").addClass("normal");
        }
        if (type == 2) {
            $("#linkPreview").addClass("thumbnail-basic");
        }
        if (type == 3) {
            $("#linkPreview").addClass("button-image-background");
        }
        if (type == 4) {
            $("#linkPreview").addClass("thumbnail-highlight");
        }
        if (type == 5) {
            $("#linkPreview").addClass("thumbnail-grid");
        }
        if (type == 6) {
            $("#linkPreview").addClass("thumbnail-carousel");
        }
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

    // layout change profile deatils start
    $(document).on("input", "#profileName", function () {
        $("#PreviewName").html($(this).val());
    });

    $(document).on("input", "#profileBio", function () {
        $("#previewBio").html($(this).val());
    });

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
        // console.log("sdfas", $(this).val());
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

    $("#tactileCard .tactile-item").on("click", function () {
        // $("#preview_size .card-layout").css("background-color", "");
        // $("#preview_size").css("background-color", "");
        $(
            "#preview_size .preview-card-body, #preview_size .details "
        ).removeClass("no_tactile");
        $(
            "#preview_size .preview-card-body, #preview_size .details "
        ).removeClass("tactile_one");
        $(
            "#preview_size .preview-card-body, #preview_size .details "
        ).removeClass("tactile_two");
        $(
            "#preview_size .preview-card-body, #preview_size .details "
        ).removeClass("tactile_three");
        $(
            "#preview_size .preview-card-body, #preview_size .details "
        ).removeClass("tactile_four");
        $(".noTactileCard").css("display", "block");
        $(".preview-card-body").css("border-width", "0px");
        $(".preview-card-body").css("margin-bottom", "15px");
        $("#button_border").val(0);

        if ($(this).hasClass("tactile_no")) {
            // $("#card-color input").val();
            $("#preview_size .preview-card-body, #preview_size .details").css(
                "background-color",
                $("#card-color input").val()
            );
            // console.log("tactile_1");
        } else if ($(this).hasClass("tactile_1")) {
            // var color = "#b1f3b3";
            var rgbaCol =
                "rgba(" +
                parseInt(color.slice(-6, -4), 16) +
                "," +
                parseInt(color.slice(-4, -2), 16) +
                "," +
                parseInt(color.slice(-2), 16) +
                ",0.9)";
            // $("#preview_size").css("background-color", rgbaCol);
            // $("#preview_size .card-layout").css("background-color", color);
            $(
                "#preview_size .preview-card-body, #preview_size .details "
            ).addClass("tactile_one");
            $(".noTactileCard").css("display", "none");
        } else if ($(this).hasClass("tactile_2")) {
            // var color = "#b1f3b3";
            var rgbaCol =
                "rgba(" +
                parseInt(color.slice(-6, -4), 16) +
                "," +
                parseInt(color.slice(-4, -2), 16) +
                "," +
                parseInt(color.slice(-2), 16) +
                ",0.9)";
            // $("#preview_size").css("background-color", rgbaCol);
            // $("#preview_size .card-layout").css("background-color", color);
            $(
                "#preview_size .preview-card-body, #preview_size .details "
            ).addClass("tactile_two");
            $(".noTactileCard").css("display", "none");
        } else if ($(this).hasClass("tactile_3")) {
            // var color = "#b1f3b3";
            var rgbaCol =
                "rgba(" +
                parseInt(color.slice(-6, -4), 16) +
                "," +
                parseInt(color.slice(-4, -2), 16) +
                "," +
                parseInt(color.slice(-2), 16) +
                ",0.9)";
            // $("#preview_size").css("background-color", rgbaCol);
            // $("#preview_size .card-layout").css("background-color", color);
            $(
                "#preview_size .preview-card-body, #preview_size .details "
            ).addClass("tactile_three");
            $(".noTactileCard").css("display", "none");
        } else if ($(this).hasClass("tactile_4")) {
            // var color = "#b1f3b3";
            var rgbaCol =
                "rgba(" +
                parseInt(color.slice(-6, -4), 16) +
                "," +
                parseInt(color.slice(-4, -2), 16) +
                "," +
                parseInt(color.slice(-2), 16) +
                ",0.9)";
            // $("#preview_size").css("background-color", rgbaCol);
            // $("#preview_size .card-layout").css("background-color", color);
            $("#preview_size .preview-card-body, #preview_size .details").css(
                "background-color",
                ""
            );
            $(
                "#preview_size .preview-card-body, #preview_size .details "
            ).addClass("tactile_four");
            $(".noTactileCard").css("display", "none");
        }
        $("#tactileCard .tactile-item.selected").removeClass("selected");
        $(this).addClass("selected");
        $("#tactile_card").val($(this).data("id"));
    });

    $("#enable_vcard").change(function () {
        if (this.checked) {
            $(".preview_vcard").show();
        } else {
            $(".preview_vcard").hide();
        }
    });

    $("#enable_share").change(function () {
        if (this.checked) {
            $(".preview_share").show();
        } else {
            $(".preview_share").hide();
        }
    });

    $("#links_branding").change(function () {
        if (this.checked) {
            $("#preview_footer").hide();
        } else {
            $("#preview_footer").show();
        }
    });

    $(document).on("click", "#designImgRemove", function () {
        var imageRemoveUrl = "/static/template_svg/image_icon.svg";
        $("#previewImg img").attr("src", "/static/default_user.png");
        $("#designImg").css("background-image", "url(" + imageRemoveUrl + ")");
        $("#designSIdeAciton").addClass("d-none");
        $.ajax({
            type: "GET",
            url: "/admin/delete/media",
            success: function () {},
        });
    });

    $(document).on("click", ".link_preview_click", function () {
        var id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "/block/view/" + id,
            success: function () {},
        });
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

    $(document).on("input", "#card-color input", function () {
        $(".preview-card-body, #preview_size .details").css(
            "background-color",
            $(this).val()
        );
    });

    $(document).on("input", "#text-color input", function () {
        $(
            ".preview-card-body .main-title, .preview-card-body .subtitle-title, #preview_size .details .title, #preview_size .details .dec"
        ).css("color", $(this).val());
    });

    $(document).on("input", "#button_corner", function () {
        $(
            ".live-preview, .live-preview a, .preview-card-body, iframe, .live-preview .thumbnail-grid-img img, .link_preview.button-image-background .live-preview .details "
        ).css("border-radius", $(this).val() + "px");
        $(
            ".live-preview .thumbnail-carousel-img img, .live-preview .thumbnail-highlight-img img, .link_preview.thumbnail-basic .live-preview .thumbnail-img img "
        ).css("border-top-left-radius", $(this).val() + "px");
        $(
            ".live-preview .thumbnail-carousel-img img, .live-preview .thumbnail-highlight-img img, .link_preview.thumbnail-basic .live-preview .details "
        ).css("border-top-right-radius", $(this).val() + "px");
        $(
            ".link_preview.thumbnail-carousel .live-preview .details, .link_preview.thumbnail-highlight .live-preview .details, .link_preview.thumbnail-basic .live-preview .thumbnail-img img "
        ).css("border-bottom-left-radius", $(this).val() + "px");
        $(
            ".link_preview.thumbnail-carousel .live-preview .details, .link_preview.thumbnail-highlight .live-preview .details, .link_preview.thumbnail-basic .live-preview .details "
        ).css("border-bottom-right-radius", $(this).val() + "px");
    });

    $(document).on("input", "#button_border", function () {
        $(".preview-card-body").css("border-width", $(this).val() + "px");
        // $(".preview-card-body").css("border-color", "#000000");
    });

    $(document).on("input", "#card-border-color input", function () {
        $(".preview-card-body").css("border-color", $(this).val());
    });

    $(document).on("input", "#card_shadow", function () {
        // console.log("shadow", $(this).val());
        var one = "#0000004d 0px 10px 30px " + $(this).val() + "px";
        $(".preview-card-body").css("box-shadow", one);
    });

    $(document).on("input", "#card_spacing", function () {
        $(".preview-card-body").css("margin-bottom", $(this).val() + "px");
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

    // drag and drop js
    if ($("#blocks").length) {
        $("#blocks").sortable({
            update: function () {
                var order = $(this).sortable("toArray");
                var positions = order.join(",");
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    type: "POST",
                    url: "/admin/block/sorting",
                    data: { positions: positions },
                    success: function () {
                        fetchBlocks();
                    },
                });
            },
        });
    }
    // drag and drop js

    // custom background js
    $("#selectColor .select-color").on("click", function () {
        $("#selectColor .select-color.selected").removeClass("selected");
        $(this).addClass("selected");
        $("#primary_background_type").val($(this).data("type"));
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
        $("#primary_background_preset").val($(this).val());
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

    $(document).on("click", ".themepreview", function () {
        var id = $(this).data("id");
        if (id) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "GET",
                url: "/admin/theme/details?id=" + id,
                success: function (data) {
                    var primary_text_color = data.primary_text_color;
                    $("input[name='primary_text_color']").val(
                        primary_text_color
                    );
                    $(".preview-all, .powered-by, .link-text").css(
                        "color",
                        primary_text_color
                    );
                    $(
                        ".preview-all .selected-social-icon .selected-icon path"
                    ).css("fill", primary_text_color);

                    var type = data.primary_background_type;
                    $("input[name='primary_background_type']").val(type);
                    type = type ? type : "color";
                    $("#selectColor .select-color.selected").removeClass(
                        "selected"
                    );
                    $(".custom-" + type).addClass("selected");
                    if (type == "preset") {
                        var background = data.primary_background;
                        $("#primary_background_preset").val(background);
                        $("#preview_size .card-layout").css(
                            "background-image",
                            background
                        );
                    }
                    if (type == "gradient") {
                        var background = data.primary_background;
                        $("#settings_background_type_gradient_color_one").val(
                            background
                        );
                        var background2 = data.secondary_background;
                        $("input[name='secondary_background']").val(
                            background2
                        );
                        $("#preview_size .card-layout").css(
                            "background-image",
                            "linear-gradient(135deg, " +
                                background +
                                " 10%, " +
                                background2 +
                                " 100%)"
                        );
                    }
                    if (type == "color") {
                        var background = data.primary_background;
                        $("#settings_background_type_color").val(background);
                        $("#preview_size .card-layout").css(
                            "background-image",
                            ""
                        );
                        $("#preview_size .card-layout").css(
                            "background-color",
                            background
                        );
                    }
                    if (type == "image") {
                        var imgurl = data.imgurl;
                        $("#imgurl").val(imgurl);
                        $("#back_url").val(data.primary_background);
                        $("#background_type_image_preview").attr("src", imgurl);
                        $("#preview_size .card-layout").css(
                            "background-image",
                            "url(" + imgurl + ")"
                        );
                        $("#preview_size .card-layout").css(
                            "background-color",
                            ""
                        );
                        $("#preview_size .card-layout").css(
                            "background-repeat",
                            "no-repeat"
                        );
                        $("#preview_size .card-layout").css(
                            "background-size",
                            "cover"
                        );
                        $("#preview_size .card-layout").css(
                            "background-position",
                            "center center"
                        );
                        // $("#preview_size .card-layout").css("min-height", "100%");
                    }
                    if (type == "video") {
                        var videourl = data.videourl;
                        $("#videourl").val(videourl);
                        var $source = $("#video_here");
                        $source[0].src = videourl;
                        $source.parent()[0].load();
                        $("#bgVideo").removeClass("d-none");
                        $("#preview_size .card-layout").removeAttr("style");
                        $("#back_url").val(data.primary_background);
                        // console.log(data.primary_background);
                    }

                    if (type != "image") {
                        $("#imgurl").val("");
                        $("#background_type_image_preview").attr("src", "");
                    }

                    if (type != "video") {
                        $("#bgVideo").addClass("d-none");
                        // $("#preview_size .card-layout").addAttr("style");
                        $("#videourl").val("");
                        var $source = $("#video_here");
                        $source[0].src = "";
                    }

                    var value = data.profile_picture_shadow;
                    $("input[name='profile_picture_shadow']").val(value);
                    var profileShadow =
                        "#0000004d 0px 10px 30px " + value + "px";
                    $("#previewImg").css("box-shadow", profileShadow);

                    var value = data.profile_picture_border;
                    $("input[name='profile_picture_border']").val(value);
                    $("#previewImg").css("border-width", value + "px");
                    $("#previewImg").css("border-color", "#000000");

                    var value = data.profile_picture_border_color;
                    $("input[name='profile_picture_border_color']").val(value);
                    $("#previewImg").css("border-color", value);

                    var value = data.text_font;
                    $("input[name='text_font']").val(value);
                    var font = '"' + value + '", sans-serif';
                    $("#preview_size").css("font-family", font);
                },
            });
        } else {
            var primary_text_color = "#000000";
            $("input[name='primary_text_color']").val(primary_text_color);
            $(".preview-all, .powered-by, .link-text").css(
                "color",
                primary_text_color
            );
            $(".preview-all .selected-social-icon .selected-icon path").css(
                "fill",
                primary_text_color
            );
            var type = "color";
            $("input[name='primary_background_type']").val(type);
            $("#selectColor .select-color.selected").removeClass("selected");
            $(".custom-" + type).addClass("selected");
            var background = "#ffffff";
            $("#settings_background_type_color").val(background);
            $("#preview_size .card-layout").css("background-image", "");
            $("#preview_size .card-layout").css("background-color", background);
            var value = 0;
            $("input[name='profile_picture_shadow']").val(value);
            var profileShadow = "#0000004d 0px 10px 30px " + value + "px";
            $("#previewImg").css("box-shadow", profileShadow);
            var value = 0;
            $("input[name='profile_picture_border']").val(value);
            $("#previewImg").css("border-width", value + "px");
            $("#previewImg").css("border-color", "#000000");
            var value = "#000000";
            $("input[name='profile_picture_border_color']").val(value);
            $("#previewImg").css("border-color", value);
            var value = "Open Sans";
            $("input[name='text_font']").val(value);
            var font = '"' + value + '", sans-serif';
            $("#preview_size").css("font-family", font);
        }
    });

    // function getThemes(){
    //     $.ajax({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         type: "GET",
    //         url: "/admin/getthemes",
    //         success:function(data)
    //         {
    //             $('#themes').html(data);
    //         }
    //     });
    // }

    // $(".social-inputs").sortable({
    if ($("#socialSort").length) {
        $("#socialSort").sortable({
            // connectWith: ".social-inputs",
            update: function () {
                var order = $(this).sortable("toArray");
                var positions = order.join(",");
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    type: "POST",
                    url: "/admin/social/sorting",
                    data: { positions: positions },
                    success: function () {
                        fetchBlocks();
                    },
                });
            },
        });
    }
});

var $modal = $("#crop-image");
var image = document.getElementById("image");
var cropper;
$("body").on("change", "#inputFile", function (e) {
    var fileExtension = ["jpeg", "jpg", "png", "bmp", "webp"];
    if (
        $.inArray(
            $(this).val().split(".").pop().toLowerCase(),
            fileExtension
        ) == -1
    ) {
        if ($(this).val().split(".").pop().toLowerCase() == "gif") {
            var imageUrl = URL.createObjectURL(e.target.files[0]);
            $("#previewImg img").attr("src", imageUrl);
            $("#designImg").css("background-image", "url(" + imageUrl + ")");
            $("#designSIdeAciton").removeClass("d-none");
        } else {
            alert("Only images allowed!");
        }
    } else {
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal("show");
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    }
});
$modal
    .on("shown.bs.modal", function () {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: ".preview",
        });
    })
    .on("hidden.bs.modal", function () {
        cropper.destroy();
        cropper = null;
    });
$("#crop").click(function () {
    canvas = cropper.getCroppedCanvas({
        width: 160,
        height: 160,
    });
    canvas.toBlob(function (blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function () {
            var base64data = reader.result;
            $("#previewImg img").attr("src", base64data);
            $("#designImg").css("background-image", "url(" + base64data + ")");
            $("#designSIdeAciton").removeClass("d-none");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                dataType: "json",
                url: window.location.origin + "/admin/crop/image",
                data: { image: base64data },
                success: function (data) {
                    $modal.modal("hide");
                    // alert("Crop image successfully uploaded");
                },
            });
        };
    });
});

$(".themeLayout .preview-layout").on("click", function () {
    $(".themeLayout .preview-layout.active").removeClass("active");
    $(this).addClass("active");
    $("#theme").val($(this).data("id"));
});
