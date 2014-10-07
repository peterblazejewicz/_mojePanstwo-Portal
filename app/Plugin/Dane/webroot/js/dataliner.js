var Dataliner = Class.extend({
	
	init: function(div) {
		
		this.div = $(div);

		this.params = this.div.data('params');
		
		this.timeline = new Timeline(this.div, this.params.initData);
		this.timeline.setOptions({
			order: 'asc'
		});
	    this.timeline.display();
		this.loadData();
		
	},
	
	loadData: function() {
		
		var data = this.params.requestData;
		data['page'] = 2;
		
		
		$.ajax('/dane/dataliner/index.json', {
            type     : 'GET',
            dataType : 'json',
            data     : data,
            success  : $.proxy(function(data) {
                
                console.log('success', data);                
                this.timeline.appendData(data);

                // scroll to new data
                // $.scrollTo('#timeline_date_separator_' + year, 500);
                
            }, this)
        });
		
	},
	
	getDataFromDiv: function() {
		
		// var data = [];
		// var lis = this.div.find('ul li');
		
	}
	
});

var __dataliners = [];

$(document).ready(function() {
    
    var elements = $('.dataliner');
    for( var i=0; i<elements.length; i++ ) {
	    
	    var dataliner = new Dataliner(elements[i]);
		__dataliners.push( dataliner );
	    
    }    
    
})






		/*

var init_data = [
            {
                type:     'blog_post',
                date:     '2013-12-09',
                title:    'Blog Post',
                content:  '<b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
            },
            {
                type:     'blog_post',
                date:     '2013-11-09',
                title:    'Blog Post',
                content:  '<b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
            }
        ];

        var timeline = new Timeline($(elements[i]), init_data);
        timeline.setOptions({
            animation:       true,
            lightbox:        true,
            first_separator: true,
            separator:       'year',
            columnMode:      'dual',
            order:           'desc'
        });
        timeline.display();
		
		
        // menu click
        $(document).on('click', '#menu > div', function(e) {
            $.scrollTo('#timeline_date_separator_' + $(this).text(), 500);
        });

        // load more click
        var year = 2013;
        $('#loadmore').on('click', function(e) {
            var button = $(this);

            if (button.hasClass('loading')) {
                return;
            }

            year--;
            button.addClass('loading').text('Loading...');

            $.ajax('ajax_data.php', {
                type     : 'POST',
                dataType : 'json',
                data     : {year: year},
                success  : function(data) {
                    // remove loading
                    button.removeClass('loading').text('Load More');

                    // add a new menu item
                    $('<div>').text(year).appendTo($('#menu'));

                    // append new data
                    timeline.appendData(data);

                    // scroll to new data
                    $.scrollTo('#timeline_date_separator_' + year, 500);
                }
            });
        });
		
	    // var timeline = new Timeline($(  ), timeline_data);
	    // timeline.display();
	    
	    */