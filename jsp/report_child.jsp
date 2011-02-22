<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>
            Missing Children Finder
        </title>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            
            <%@include file="shared/includes.jsp" %>
        </head>
    </head>
    <body>
        <div class="container">
            <h1>Missing Children Finder</h1>
            <hr/>
            <div class="span-6 border">
                <%@include file="shared/child_search_form.jsp" %>
                <hr/>
                <%@include file="shared/report_missing_child.jsp" %>
            </div>
            <div class="span-18 last">
                <h2>Report a Missing Child</h2>
                
                <label>I have...</label>
                <input type="radio" id="radio_lost_child" name="what_event" /><label for="radio_lost_child">lost a child.</label>
                <input type="radio" id="radio_orphaned_child" name="what_event" /><label for="radio_orphaned_child">found an orphaned child.</label>
                
                <h4>Basic Information</h4>
                <label>Name:</label>
                <input type="text" class="title" />
                
                <label>Gender:</label>
                <input type="radio" name="gender" id="radio_gender_male_report"/>
                <label for="radio_gender_male_report">Male</label>
                <input type="radio" name="gender" id="radio_gender_female_report"/>
                <label for="radio_gender_female_report">Female</label>
                
                <label>Date of Birth:</label>
                <input type="text" />
                <label>(OR)</label>
                <label>Age:</label>
                <input type="text" />
                
                <label>Photos:</label>
                <a href="javacript: void(0);">Select</a>
                
            </div>
        </div>
    </body>
</html>