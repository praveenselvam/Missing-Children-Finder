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
            <div class="span-12 border">
                <?php include 'shared/current_location_children.php'; ?>
            </div>
            <div class="span-6 last">
                <?php include 'shared/recently_missing_children.php'; ?>
            </div>
        </div>
    </body>
</html>