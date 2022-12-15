jQuery(document).ready(function($){	
    //$('body').on('click', '.projects-wrapper .pagination-wrapper .page-numbers', function (e){    
	/*$('.track-form').submit(function(e){
		e.preventDefault();
		var form_data = $(this).serialize();
		console.log(form_data);
        $.ajax({
            url: mos_ajax_object.ajax_url, // or example_ajax_obj.ajaxurl if using on frontend
            type:"POST",
            dataType:"json",
            data: {
                'action': 'order_tracking',
                'form_data' : form_data,
            },
            success: function(result){
                // console.log(result);
                $('.track-output').html(result);
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
	});*/
    

    $('body').on('click', '.load-more-posts', function (){
    //$('.load-more-jobs').click(function(){
        let $this = $(this);
        let data = JSON.parse($this.closest('.common-btn').find('.data').val());
        let loaded = $this.data('loaded');
        let btnHtml = $this.html();
//        console.log(data);
//        console.log(loaded);
        
        
        $.ajax({
            url: mos_ajax_object.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
            type:"POST",
            dataType:"json",
            data: {
                'action': 'load_more_posts',
                'data' : data,
                'loaded' : loaded,
            },
            beforeSend: function() {
                $this.html('Loading...');
            },
            success: function(result){
//                console.log(result);
                
//                $this.closest('.more-btn').before(result);
                $this.closest('.blogs-post').find('.load-more-below').append(result);
                let resultCount = parseInt(loaded) + parseInt(data.count);
//                console.log(resultCount);
                if (resultCount < data.total){
                    $this.html(btnHtml).data('loaded', resultCount);
                }
                else 
                    $this.closest('.common-btn').remove();
                
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
    }); 
    
    $('body').on('click', '.load-more-projects', function (){
    //$('.load-more-jobs').click(function(){
        let $this = $(this);
        let data = JSON.parse($this.closest('.common-btn').find('.data').val());
        let loaded = $this.data('loaded');
        let btnHtml = $this.html();
//        console.log(data);
//        console.log(loaded);
        
        
        $.ajax({
            url: mos_ajax_object.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
            type:"POST",
            dataType:"json",
            data: {
                'action': 'load_more_projects',
                'data' : data,
                'loaded' : loaded,
            },
            beforeSend: function() {
                $this.html('Loading...');
            },
            success: function(result){
//                console.log(result);
                $this.closest('.isotop-wrapper').find('.grid').isotope('insert', $(result));
//                $this.closest('.more-btn').before(result);
//                $this.closest('.blogs-post').find('.load-more-below').append(result);
                let resultCount = parseInt(loaded) + parseInt(data.count);
//                console.log(resultCount);
                if (resultCount < data.total){
                    $this.html(btnHtml).data('loaded', resultCount);
                }
                else 
                    $this.closest('.common-btn').remove();
                
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
        
    });    
    
});