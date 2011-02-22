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
            
            <%@include file="shared/header.jsp" %>
            
            <div class="notice">
                We believe you are in <strong>Chennai, Tamil Nadu, India</strong>. <a href="javascript: void(0);">I'm not from here.</a>
            </div>
            <div class="span-6 border">
                <%@include file="shared/child_search_form.jsp" %>
                <hr/>
                <%@include file="shared/report_missing_child.jsp" %>
            </div>
            <div class="span-18 last">
                <h2>Search Results</h2>
                <div class="span-9">
                    238 children found
                </div>
                <div class="span-9 last">
                    Map View
                    &nbsp;|&nbsp;
                    <a href="/missing/jsp/search_results_grid.jsp">Grid View</a>
                </div>
                <iframe width="710" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?ie=UTF8&amp;hq=&amp;hnear=N+Parade+Rd,+Alandur,+Chennai,+Tamil+Nadu,+India&amp;ll=10.816445,78.697128&amp;spn=0.168611,0.243416&amp;z=12&amp;output=embed"></iframe>
            </div>
        </div>
    </body>
</html>