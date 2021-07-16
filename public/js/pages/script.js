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

    $(document).on("input", "#profile_img_border", function () {
        $("#previewImg").css("border-width", $(this).val() + "px");
        $("#previewImg").css("border-color", "#000000");
    });
    $(document).on("input", "#profile-picture-border-color input", function () {
        $("#previewImg").css("border-color", $(this).val());
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
        // $(".preview-card-body").css(
        //     "box-shadow",
        //     "#0000004d 0px 10px 30px" + $(this).val() + "px"
        // );
        var one = $(this).val() + "px";
        $(".preview-card-body").css(
            "box-shadow",
            "10px",
            "10px",
            "5px",
            one,
            "#0000004d"
        );
    });

    $(document).on("input", "#card_spacing", function () {
        $(".preview-card-body").css("margin-bottom", $(this).val() + "px");
    });

    // card js end
});
