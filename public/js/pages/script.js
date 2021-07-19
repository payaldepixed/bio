$(document).ready(function () {
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

    // layout change profile deatils start

    $(document).on("input", "#profileName", function () {
        $("#PreviewName").html($(this).val());
    });

    $(document).on("input", "#profileBio", function () {
        $("#previewBio").html($(this).val());
    });

    // layout change profile deatils end

    // layout change mobile & website start

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

    // layout change mobile & website end

    // Tactile Cards js start

    $("#tactileCard .tactile-item").on("click", function () {
        $("#preview_size .card-layout").css("background-color", "");
        $("#preview_size").css("background-color", "");
        $("#preview_size .preview-card-body ").removeClass("no_tactile");
        $("#preview_size .preview-card-body ").removeClass("tactile_one");
        $("#preview_size .preview-card-body ").removeClass("tactile_two");
        $("#preview_size .preview-card-body ").removeClass("tactile_three");
        $("#preview_size .preview-card-body ").removeClass("tactile_four");
        $(".noTactileCard").css("display", "block");
        $(".preview-card-body").css("border-width", "0px");
        $(".preview-card-body").css("margin-bottom", "15px");
        $("#card_border").val(0);

        if ($(this).hasClass("tactile_no")) {
            // $("#card-color input").val();
            $("#preview_size .preview-card-body").css(
                "background-color",
                $("#card-color input").val()
            );
            // console.log("tactile_1");
        } else if ($(this).hasClass("tactile_1")) {
            var color = "#b1f3b3";
            var rgbaCol =
                "rgba(" +
                parseInt(color.slice(-6, -4), 16) +
                "," +
                parseInt(color.slice(-4, -2), 16) +
                "," +
                parseInt(color.slice(-2), 16) +
                ",0.9)";
            $("#preview_size").css("background-color", rgbaCol);
            $("#preview_size .card-layout").css("background-color", "#b1f3b3");
            $("#preview_size .preview-card-body ").addClass("tactile_one");
            $(".noTactileCard").css("display", "none");
        } else if ($(this).hasClass("tactile_2")) {
            var color = "#b1f3b3";
            var rgbaCol =
                "rgba(" +
                parseInt(color.slice(-6, -4), 16) +
                "," +
                parseInt(color.slice(-4, -2), 16) +
                "," +
                parseInt(color.slice(-2), 16) +
                ",0.9)";
            $("#preview_size").css("background-color", rgbaCol);
            $("#preview_size .card-layout").css("background-color", "#b1f3b3");
            $("#preview_size .preview-card-body ").addClass("tactile_two");
            $(".noTactileCard").css("display", "none");
        } else if ($(this).hasClass("tactile_3")) {
            var color = "#b1f3b3";
            var rgbaCol =
                "rgba(" +
                parseInt(color.slice(-6, -4), 16) +
                "," +
                parseInt(color.slice(-4, -2), 16) +
                "," +
                parseInt(color.slice(-2), 16) +
                ",0.9)";
            $("#preview_size").css("background-color", rgbaCol);
            $("#preview_size .card-layout").css("background-color", "#b1f3b3");
            $("#preview_size .preview-card-body ").addClass("tactile_three");
            $(".noTactileCard").css("display", "none");
        } else if ($(this).hasClass("tactile_4")) {
            var color = "#b1f3b3";
            var rgbaCol =
                "rgba(" +
                parseInt(color.slice(-6, -4), 16) +
                "," +
                parseInt(color.slice(-4, -2), 16) +
                "," +
                parseInt(color.slice(-2), 16) +
                ",0.9)";
            $("#preview_size").css("background-color", rgbaCol);
            $("#preview_size .card-layout").css("background-color", "#b1f3b3");
            $("#preview_size .preview-card-body").css("background-color", "");
            $("#preview_size .preview-card-body ").addClass("tactile_four");
            $(".noTactileCard").css("display", "none");
        }
        $("#tactileCard .tactile-item.selected").removeClass("selected");
        $(this).addClass("selected");
    });

    // Tactile Cards js end

    // Social & Sharing start

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

    // Social & Sharing end

    // other start

    $("#links_branding").change(function () {
        if (this.checked) {
            $("#preview_footer").show();
        } else {
            $("#preview_footer").hide();
        }
    });
    // other end
    // upload profile image start
    $(document).on("input", "#inputFile", function (event) {
        var imageUrl = URL.createObjectURL(event.target.files[0]);
        $("#previewImg img").attr("src", imageUrl);
        $("#designImg").css("background-image", "url(" + imageUrl + ")");
        $("#designSIdeAciton").removeClass("d-none");
    });

    // upload profile image end

    // remove profile image start

    $(document).on("click", "#designImgRemove", function () {
        var imageRemoveUrl = "/static/template_svg/image_icon.svg";
        $("#previewImg img").attr("src", "/static/default_user.png");
        $("#designImg").css("background-image", "url(" + imageRemoveUrl + ")");
        $("#designSIdeAciton").addClass("d-none");
    });

    // remove profile image start

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

    $(document).on("input", "#primary-background input", function () {
        // $("#previewImg").css("border-width", $(this).val() + "px");
        $(".card-layout").css("background-color", $(this).val());

        var color = $(this).val();
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

    // card js start

    $(document).on("input", "#card-color input", function () {
        $(".preview-card-body").css("background-color", $(this).val());
    });

    $(document).on("input", "#text-color input", function () {
        $(
            ".preview-card-body .main-title, .preview-card-body .subtitle-title"
        ).css("color", $(this).val());
    });

    $(document).on("input", "#card_corner", function () {
        $(".preview-card-body").css("border-radius", $(this).val() + "px");
        // $("#previewImg").css("border-color", "#000000");
    });

    $(document).on("input", "#card_border", function () {
        $(".preview-card-body").css("border-width", $(this).val() + "px");
        $(".preview-card-body").css("border-color", "#000000");
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

    // card js end

    // change fonts start
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
    });

    // change fonts end

    // New Link model start

    $("#selectCardLayout .card-view-layout").on("click", function () {
        $("#selectCardLayout .card-view-layout.selected").removeClass(
            "selected"
        );
        $(this).addClass("selected");
        $("#linkPreview").removeClass("normal");
        $("#linkPreview").removeClass("thumbnail-basic");
        $("#linkPreview").removeClass("button-image-background");
        $("#linkPreview").removeClass("thumbnail-highlight");
        $("#linkPreview").removeClass("thumbnail-grid");
        $("#linkPreview").removeClass("thumbnail-carousel");

        if ($(this).hasClass("normal")) {
            $("#linkPreview").addClass("normal");
        } else if ($(this).hasClass("thumbnail-basic")) {
            $("#linkPreview").addClass("thumbnail-basic");
        } else if ($(this).hasClass("button-image-background")) {
            $("#linkPreview").addClass("button-image-background");
        } else if ($(this).hasClass("thumbnail-highlight")) {
            $("#linkPreview").addClass("thumbnail-highlight");
        } else if ($(this).hasClass("thumbnail-grid")) {
            $("#linkPreview").addClass("thumbnail-grid");
        } else if ($(this).hasClass("thumbnail-carousel")) {
            $("#linkPreview").addClass("thumbnail-carousel");
        }
    });

    // New Link model end

    // New Instagram Scraper model start

    $("#scrapedCardLayout .card-view-layout").on("click", function () {
        $("#scrapedCardLayout .card-view-layout.selected").removeClass(
            "selected"
        );
        $(this).addClass("selected");
        $("#scrapedLinkPreview").removeClass("thumbnail-basic");
        $("#scrapedLinkPreview").removeClass("thumbnail-highlight");
        $("#scrapedLinkPreview").removeClass("thumbnail-grid");
        $("#scrapedLinkPreview").removeClass("thumbnail-carousel");

        if ($(this).hasClass("thumbnail-basic")) {
            $("#scrapedLinkPreview").addClass("thumbnail-basic");
        } else if ($(this).hasClass("thumbnail-highlight")) {
            $("#scrapedLinkPreview").addClass("thumbnail-highlight");
        } else if ($(this).hasClass("thumbnail-grid")) {
            $("#scrapedLinkPreview").addClass("thumbnail-grid");
        } else if ($(this).hasClass("thumbnail-carousel")) {
            $("#scrapedLinkPreview").addClass("thumbnail-carousel");
        }
    });

    // New Instagram Scraper model end
});
