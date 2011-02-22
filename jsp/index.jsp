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
            <div class="notice">
                We believe you are in <strong>Chennai, Tamil Nadu, India</strong>. <a href="javascript: void(0);">I'm not from here.</a>
            </div>
            <div class="span-6 border">
                <%@include file="shared/child_search_form.jsp" %>
                <hr/>
                <%@include file="shared/report_missing_child.jsp" %>
            </div>
            <div class="span-12 border">
                <%@include file="shared/current_location_children.jsp" %>
            </div>
            <div class="span-6 last">
                <%@include file="shared/recently_missing_children.jsp" %>
            </div>
        </div>
    </body>
</html>