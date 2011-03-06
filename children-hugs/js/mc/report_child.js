;(function($) {
    
    $.widget('ui.ReportChild', {
        
        _init: function(){
            
            this._bindEvents();
            this.refresh();
            
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
        }
        
    });
    
    $(document).ready(function(){
        $('#report_missing_child_form').ReportChild();
    });
    
})(jQuery);