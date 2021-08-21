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
