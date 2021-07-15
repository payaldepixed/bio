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
        $("#preview_size .preview-card-body ").removeClass("no_tactile");
        $("#preview_size .preview-card-body ").removeClass("tactile_one");
        $("#preview_size .preview-card-body ").removeClass("tactile_two");
        $("#preview_size .preview-card-body ").removeClass("tactile_three");
        $("#preview_size .preview-card-body ").removeClass("tactile_four");
        if ($(this).hasClass("tactile_no")) {
            // console.log("tactile_1");
        } else if ($(this).hasClass("tactile_1")) {
            $("#preview_size .card-layout").css("background-color", "#b1f3b3");
            $("#preview_size .preview-card-body ").addClass("tactile_one");
        } else if ($(this).hasClass("tactile_2")) {
            $("#preview_size .card-layout").css("background-color", "#b1f3b3");
            $("#preview_size .preview-card-body ").addClass("tactile_two");
        } else if ($(this).hasClass("tactile_3")) {
            $("#preview_size .card-layout").css("background-color", "#b1f3b3");
            $("#preview_size .preview-card-body ").addClass("tactile_three");
        } else if ($(this).hasClass("tactile_4")) {
            $("#preview_size .card-layout").css("background-color", "#b1f3b3");
            $("#preview_size .preview-card-body ").addClass("tactile_four");
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
});
