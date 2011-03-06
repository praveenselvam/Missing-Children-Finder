<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>
            Missing Children Finder
        </title>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            
            <?php include 'shared/includes.php'; ?>
        </head>
    </head>
    <body>
        <div class="container">
            
            <?php include 'shared/header.php'; ?>
            
            <div class="notice">
                We believe you are in <strong>Chennai, Tamil Nadu, India</strong>. <a href="javascript: void(0);">I'm not from here.</a>
            </div>
            <div class="span-6 border">
                <?php include 'shared/child_search_form.php'; ?>
                <hr/>
                <?php include 'shared/report_missing_child.php'; ?>
            </div>
            <div class="span-18 last">
                <h2>Search Results</h2>
                <div class="span-9">
                    238 children found
                </div>
                <div class="span-9 last">
                    <a href="../../missing/php/search_results_map.php">Map View</a>
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
                        <?php
                            for($i = 1; $i <= 20; $i++) {
                        ?>
                                <tr>
                                    <td><a href="/missing/php/child_profile.php">Kannan</a></td>
                                    <td>13 years</td>
                                    <td>Male</td>
                                    <td>Trichy, Tamil Nadu, India (within 5 kms)</td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>