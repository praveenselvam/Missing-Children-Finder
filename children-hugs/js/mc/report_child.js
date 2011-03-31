;(function($) {
    
    $.widget('ui.ReportChild', {
        
        _init: function(){
            
            this._bindEvents();
            this.refresh();
            this.showerrors();
            
        },
        
        _bindEvents: function(){
            var titleToSwap = this.element.find('#child_address_title');
            
            this.element.find('#radio_lost_child').click(function(){
                titleToSwap.text("Where is the child from?");
            });
            
            this.element.find('#radio_orphaned_child').click(function(){
                titleToSwap.text("Where is the child now?");
            });
        },
        
        refresh: function(){
            $([this.element.find('#radio_lost_child'), this.element.find('#radio_orphaned_child')]).each(function(){
                if($(this).attr('checked')){
                    $(this).click();
                }
            });
        },
        
        showerrors: function() {
        		//alert(PAGE_ERRORS.length);
        		$(PAGE_ERRORS).each(function(index,item) {
        			for(var key in item)
        			{
        				$('#err_'+key).html(item[key]);
        			}
        		});
        }
        
    });
    
    $(document).ready(function(){
        $('#report_missing_child_form').ReportChild();
    });
    
})(jQuery);