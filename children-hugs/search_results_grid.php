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
            
            <?php include 'shared/left_pane.php'; ?>
            
            <div class="span-18 last" id="children_results_grid">
                <h2>Search Results</h2>
                <div class="span-14 summary">
                    <span>238 children</span>
                    found for "<strong>Kannan, M, 28 years, Trichy</strong>".
                </div>
                <div class="span-4 last">
                    <a href="./search_results_map.php">Map View</a>
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
                                    <td><a href="./child_profile.php">Kannan</a></td>
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