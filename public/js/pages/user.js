
$( document ).ready(function() {

    $('#password_confirmation').on('keyup', function () {
        if ($('#password').val() == $('#password_confirmation').val()) {
            $('#password-hint').html('');
        } else
        $('#password-hint').html('Password Must be Matching').css('color', 'red');
    });

    //listing page
    if($('#UserTableList').length){
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
            var url = "user/getdata?page="+page;
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
                    $('#users').html(data);
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

    //listing page
    if($('#LinkTableList').length){
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
            var url = "link/getdata?page="+page;
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
                    $('#links').html(data);
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

    $(document).on("click", ".blockModal", function () {
        var url = $(this).data('url');
        $(".blockUrl").attr('href',url);
    });

    $(document).on("click", ".passwordModal", function () {
        var id = $(this).data('id');
        $("#userId").val(id);
    });

});

//form page
if($('#userForm').length){

}

$(document).on("click", ".totallink", function () {
    var time = $(this).data('id');
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        url: "/admin/getactivity?type=totallink&time="+time,
        success:function(data)
        {
            $('#totallinks').html(data);
            if(time == '7'){ var txt = 'Last 7 days';}
            if(time == '30'){ var txt = 'Last 30 days';}
            if(time == '90'){ var txt = 'Last 3 months';}
            if(time == '365'){ var txt = 'In Year';}
            $('.totallinktext').text(txt);
        }
    });
});

$(document).on("click", ".linkview", function () {
    var time = $(this).data('id');
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        url: "/admin/getactivity?type=link&time="+time,
        success:function(data)
        {
            $('#linkviews').html(data);
            if(time == '7'){ var txt = 'Last 7 days';}
            if(time == '30'){ var txt = 'Last 30 days';}
            if(time == '90'){ var txt = 'Last 3 months';}
            if(time == '365'){ var txt = 'In Year';}
            $('.linkviewtext').text(txt);
        }
    });
});

$(document).on("click", ".totalclick", function () {
    var time = $(this).data('id');
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        url: "/admin/getactivity?type=block&time="+time,
        success:function(data)
        {
            $('#totalclicks').html(data);
            if(time == '7'){ var txt = 'Last 7 days';}
            if(time == '30'){ var txt = 'Last 30 days';}
            if(time == '90'){ var txt = 'Last 3 months';}
            if(time == '365'){ var txt = 'In Year';}
            $('.totalclicktext').text(txt);
        }
    });
});

$(document).on("click", ".totalpage", function () {
    var time = $(this).data('id');
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        url: "/admin/getactivity?type=linkvisitor&time="+time,
        success:function(data)
        {
            $('#tblpages').html(data);
            if(time == '7'){ var txt = 'Last 7 days';}
            if(time == '30'){ var txt = 'Last 30 days';}
            if(time == '90'){ var txt = 'Last 3 months';}
            if(time == '365'){ var txt = 'In Year';}
            $('.totalpagestext').text(txt);
        }
    });
});

var time = 7;
// var markers = [];
var datavalues = {};
var visitors = {};
loadMap(time);

$(document).on("click", ".chartmap", function () {
    var time = $(this).data('id');
    loadMap(time);
    if(time == '7'){ var txt = 'Last 7 days';}
    if(time == '30'){ var txt = 'Last 30 days';}
    if(time == '90'){ var txt = 'Last 3 months';}
    if(time == '365'){ var txt = 'In Year';}
    $('.chartmaptext').text(txt);
});

function loadMap(time){
    datavalues = {};
    visitors = {};
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        url: "/admin/getmarkers?time="+time,
        success:function(data)
        {
            for (let i = 0; i < data.length; i++) {
                // markers.push({latLng: [data[i].latitude,data[i].longitude], name: data[i].country_name+' - Visitors '+data[i].visitors});
                datavalues[data[i].country_code] = 1430.02;
                visitors[data[i].country_code] = data[i].visitors;
            }
            setMap();
        }
    });
}

function setMap(){
    $('#map1').html('');
    // $('#focus-single').click(function(){
    //     $('#map1').vectorMap('set', 'focus', {region: 'AU', animate: true});
    // });
    // $('#focus-multiple').click(function(){
    //     $('#map1').vectorMap('set', 'focus', {regions: ['AU', 'JP'], animate: true});
    // });
    // $('#focus-coords').click(function(){
    //     $('#map1').vectorMap('set', 'focus', {scale: 7, lat: 35, lng: 33, animate: true});
    // });
    // $('#focus-init').click(function(){
    //     $('#map1').vectorMap('set', 'focus', {scale: 1, x: 0.5, y: 0.5, animate: true});
    // });
    $('#map1').vectorMap({
        map: 'world_mill_en',
        panOnDrag: true,
        // focusOn: {
        //     x: 0.5,
        //     y: 0.5,
        //     scale: 2,
        //     animate: true
        // },
        // markers: [
        //     {latLng: [41.90, 12.45], name: 'Vatican City'},
        //     {latLng: [43.73, 7.41], name: 'Monaco'},
        //     {latLng: [-0.52, 166.93], name: 'Nauru'},
        //     {latLng: [-8.51, 179.21], name: 'Tuvalu'},
        //     {latLng: [21.754400253296, 70.622299194336], name: 'India'}
        // ],
        // markers:markers,
        onRegionTipShow: function (e, el, code){
            if(visitors[code]){
                el.html(el.html() + ' - Visitors '+ visitors[code]);
            }else{
                // el.html('');
            }
        },
        series: {
            regions: [{
            scale: ['#C8EEFF', '#0071A4'],
            normalizeFunction: 'polynomial',
            values:datavalues,
            // values: {
                //     "AF": 16.63,
                //     "AL": 11.58,
                //     "DZ": 158.97,
                //     "AO": 85.81,
                //     "AG": 1.1,
                //     "AR": 351.02,
                //     "AM": 8.83,
                //     "AU": 1219.72,
                //     "AT": 366.26,
                //     "AZ": 52.17,
                //     "BS": 7.54,
                //     "BH": 21.73,
                //     "BD": 105.4,
                //     "BB": 3.96,
                //     "BY": 52.89,
                //     "BE": 461.33,
                //     "BZ": 1.43,
                //     "BJ": 6.49,
                //     "BT": 1.4,
                //     "BO": 19.18,
                //     "BA": 16.2,
                //     "BW": 12.5,
                //     "BR": 2023.53,
                //     "BN": 11.96,
                //     "BG": 44.84,
                //     "BF": 8.67,
                //     "BI": 1.47,
                //     "KH": 11.36,
                //     "CM": 21.88,
                //     "CA": 1563.66,
                //     "CV": 1.57,
                //     "CF": 2.11,
                //     "TD": 7.59,
                //     "CL": 199.18,
                //     "CN": 5745.13,
                //     "CO": 283.11,
                //     "KM": 0.56,
                //     "CD": 12.6,
                //     "CG": 11.88,
                //     "CR": 35.02,
                //     "CI": 22.38,
                //     "HR": 59.92,
                //     "CY": 22.75,
                //     "CZ": 195.23,
                //     "DK": 304.56,
                //     "DJ": 1.14,
                //     "DM": 0.38,
                //     "DO": 50.87,
                //     "EC": 61.49,
                //     "EG": 216.83,
                //     "SV": 21.8,
                //     "GQ": 14.55,
                //     "ER": 2.25,
                //     "EE": 19.22,
                //     "ET": 30.94,
                //     "FJ": 3.15,
                //     "FI": 231.98,
                //     "FR": 2555.44,
                //     "GA": 12.56,
                //     "GM": 1.04,
                //     "GE": 11.23,
                //     "DE": 3305.9,
                //     "GH": 18.06,
                //     "GR": 305.01,
                //     "GD": 0.65,
                //     "GT": 40.77,
                //     "GN": 4.34,
                //     "GW": 0.83,
                //     "GY": 2.2,
                //     "HT": 6.5,
                //     "HN": 15.34,
                //     "HK": 226.49,
                //     "HU": 132.28,
                //     "IS": 12.77,
                //     "IN": 1430.02,
                //     "ID": 695.06,
                //     "IR": 337.9,
                //     "IQ": 84.14,
                //     "IE": 204.14,
                //     "IL": 201.25,
                //     "IT": 2036.69,
                //     "JM": 13.74,
                //     "JP": 5390.9,
                //     "JO": 27.13,
                //     "KZ": 129.76,
                //     "KE": 32.42,
                //     "KI": 0.15,
                //     "KR": 986.26,
                //     "KW": 117.32,
                //     "KG": 4.44,
                //     "LA": 6.34,
                //     "LV": 23.39,
                //     "LB": 39.15,
                //     "LS": 1.8,
                //     "LR": 0.98,
                //     "LY": 77.91,
                //     "LT": 35.73,
                //     "LU": 52.43,
                //     "MK": 9.58,
                //     "MG": 8.33,
                //     "MW": 5.04,
                //     "MY": 218.95,
                //     "MV": 1.43,
                //     "ML": 9.08,
                //     "MT": 7.8,
                //     "MR": 3.49,
                //     "MU": 9.43,
                //     "MX": 1004.04,
                //     "MD": 5.36,
                //     "MN": 5.81,
                //     "ME": 3.88,
                //     "MA": 91.7,
                //     "MZ": 10.21,
                //     "MM": 35.65,
                //     "NA": 11.45,
                //     "NP": 15.11,
                //     "NL": 770.31,
                //     "NZ": 138,
                //     "NI": 6.38,
                //     "NE": 5.6,
                //     "NG": 206.66,
                //     "NO": 413.51,
                //     "OM": 53.78,
                //     "PK": 174.79,
                //     "PA": 27.2,
                //     "PG": 8.81,
                //     "PY": 17.17,
                //     "PE": 153.55,
                //     "PH": 189.06,
                //     "PL": 438.88,
                //     "PT": 223.7,
                //     "QA": 126.52,
                //     "RO": 158.39,
                //     "RU": 1476.91,
                //     "RW": 5.69,
                //     "WS": 0.55,
                //     "ST": 0.19,
                //     "SA": 434.44,
                //     "SN": 12.66,
                //     "RS": 38.92,
                //     "SC": 0.92,
                //     "SL": 1.9,
                //     "SG": 217.38,
                //     "SK": 86.26,
                //     "SI": 46.44,
                //     "SB": 0.67,
                //     "ZA": 354.41,
                //     "ES": 1374.78,
                //     "LK": 48.24,
                //     "KN": 0.56,
                //     "LC": 1,
                //     "VC": 0.58,
                //     "SD": 65.93,
                //     "SR": 3.3,
                //     "SZ": 3.17,
                //     "SE": 444.59,
                //     "CH": 522.44,
                //     "SY": 59.63,
                //     "TW": 426.98,
                //     "TJ": 5.58,
                //     "TZ": 22.43,
                //     "TH": 312.61,
                //     "TL": 0.62,
                //     "TG": 3.07,
                //     "TO": 0.3,
                //     "TT": 21.2,
                //     "TN": 43.86,
                //     "TR": 729.05,
                //     "TM": 0,
                //     "UG": 17.12,
                //     "UA": 136.56,
                //     "AE": 239.65,
                //     "GB": 2258.57,
                //     "US": 14624.18,
                //     "UY": 40.71,
                //     "UZ": 37.72,
                //     "VU": 0.72,
                //     "VE": 285.21,
                //     "VN": 101.99,
                //     "YE": 30.02,
                //     "ZM": 15.69,
                //     "ZW": 5.57
            //     }
            }]
        }
    });
}
