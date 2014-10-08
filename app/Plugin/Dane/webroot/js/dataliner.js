var Dataliner = Class.extend({
	
	init: function(div) {
		
		this.div = $(div);
		this.timeline_div = this.div.find('.timeline');
		this.filters_div = this.div.find('.filters');
		
		this.requestData = this.div.data('requestdata');
		this.filterField = this.div.data('filterfield');

		console.log('this.requestdata', this.requestData);
		
		this.initData = [];
		
		var lis = this.timeline_div.find('ul li');
		for( var i=0; i<lis.length; i++ ) {
			
			var li = jQuery( lis[i] );
			this.initData.push({
				type: li.data('type') ? li.data('type') : 'Element',
				date: li.find('> .date').html(),
				title: li.find('> .title').html(),
				content: li.find('> .content').html()
			});
			
		}
		
		this.timeline_div.html('').show();			
		
		this.filters_div_select = this.filters_div.find('select');
		if( this.filters_div_select.length ) {
			
			this.filters_div.slideDown();
			
			this.filters_div_select.multipleSelect({
	            filter: false,
	            placeholder: "Filtry...",
	            width: 300,
	            selectAll: true,
	            onClick: $.proxy(this.onFilterClick, this)
	        });
			
		}
		
		this.timeline = new Timeline(this.timeline_div, this.initData);
		this.timeline.setOptions({
			order: 'desc'
		});
	    this.timeline.display();
		
	},
	
	onFilterClick: function(view) {
		
		this.loadData(1);
		
	},
	
	loadData: function(page) {
		
		
		console.log('this.requestData', this.requestData);

		var data = this.requestData;		
		data['conditions'][ this.filterField ] = this.filters_div_select.val();
		data['page'] = page;
				
		$.ajax('/dane/dataliner/index.json', {
            type     : 'GET',
            dataType : 'json',
            data     : data,
            success  : $.proxy(function(page, data) {
                
                console.log('data', data);                
                
                if( page==1 ) {
					
					console.log('reset', this.timeline);
					
					this.timeline_div.html('');
					
					this.timeline = new Timeline(this.timeline_div, data);
					this.timeline.setOptions({
						order: 'desc'
					});
				    this.timeline.display();
					
				} else {
                	
                	console.log('continue');
	                this.timeline.appendData(data);
				
				}
                
            }, this, page)
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