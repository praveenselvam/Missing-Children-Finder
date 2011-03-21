<div id="search_child_widget" class="form clearfix widget_box">
    <form action="./search_results_grid.php">
        
        <h3>Search for a Child</h3>
        
        <label class="span-2 clear">Name:</label>
        <input type="text" class="span-3 last" name="name"/>
        
        <label class="span-2 clear">Gender:</label>
        <div class="span-3 last">
            <input type="radio" name="gender" value="M"/>
            <label>M</label>
            <input type="radio" name="gender" value="F"/>
            <label>F</label>
        </div>
        
        <label class="span-2 clear">Age:</label>
        <input type="text" class="span-3 last" name="age"/>
        
        <label class="span-2 clear">Origin:</label>
        <input type="text" class="span-3 last" name="origin"/>
        
        <label class="span-2 clear">Duration:</label>
        <select class="span-3 last" name="duration">
            <option>1 month</option>
            <option>3 months</option>
            <option>1 year</option>
            <option>More than a year</option>
        </select>
        <?php
        	/* TODO: Not yet implemented. 
        	<label class="span-2 clear">Photo:</label>
        	<a href="javascript: void(0);" class="span-3 last">Select file...</a>
        	*/
        ?>
        
        <div class="buttons span-3 push-2 clear">
            <input type="submit" value="Search" class="span-2 button" />
        </div>
    </form>
</div>