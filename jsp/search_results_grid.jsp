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
                    <a href="/missing/jsp/search_results_map.jsp">Map View</a>
                    &nbsp;|&nbsp;
                    Grid View
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <%
                            for(int i=1; i<=20; i++){
                        %>
                                <tr>
                                    <td><a href="/missing/jsp/child_profile.jsp">Kannan</a></td>
                                    <td>13 years</td>
                                    <td>Male</td>
                                    <td>Trichy, Tamil Nadu, India (within 5 kms)</td>
                                </tr>
                        <%
                            }
                        %>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>