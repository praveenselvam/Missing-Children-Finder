 <?php include 'controller/child_profile_controller.php'; ?>
 
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
            
            <div class="span-5">
                <img src="http://1.bp.blogspot.com/_su4BWzt0qII/Sc-oK-XUYuI/AAAAAAAAAFY/pGKoKNQ4IWs/s400/azharuddin.jpg" style="width: 100%;" />
            </div>
            <div class="span-13 last">
                <h2><?php echo $_REQUEST['response'][0]['name']; ?></h2>
                <h3>
                    <?php echo (($_REQUEST['response'][0]['gender']) == "M" )?"Male":"Female"; ?>,
                    <?php echo $_REQUEST['response'][0]['age']; ?> years <?php /* TODO: Not implemented yet | Lives within 10 kms from your location. */ ?>
                </h3>
                <div class="info">
                     This child was <?php echo (($_REQUEST['response'][0]['status']) == "LOST" )?"lost":"orphaned"; ?>                     
                     recently and is now under safe custody. Some information about the child's home is available, which can be found below. We need help in reaching out to them and letting folks at home know that the child is here.
                </div>
                <dl>
                    <dt>Missing since:</dt>
                    <dd><?php echo ($_REQUEST['response'][0]['missing_since'] == null || "" == trim($_REQUEST['response'][0]['missing_since']))?"Uknown":$_REQUEST['response'][0]['missing_since']; ?></dd>
                    
                    <dt>Home Address:</dt>
                    <dd><?php echo $_REQUEST['response'][0]['locality']; ?>,
                    <?php echo $_REQUEST['response'][0]['city']; ?>,
                    <?php echo $_REQUEST['response'][0]['state']; ?> 
                    </dd>
                    
                    <dt>Other Information:</dt>
                    <dd>
                        Father's Name: Muthusamy<br/>
                        His Occupation: Dobhi<br/>
                        Mother Tongue: Tamil
                    </dd>
                </dl>                
                <form>
                	<h4>Know more information about Kannan?</h4>
                	<label>Enter it here:</label>
	                <textarea></textarea>
	                <input type="hidden" value="<?php echo ($_REQUEST["id1"]);?>" name="id1"/>
	                <input type="hidden" value="<?php echo ($_REQUEST["id2"]);?>" name="id2"/>
	                
	                <?php include 'shared/captcha.php'; ?>
	                
	                <input type="button" value="Save" class="right" />
	            </form>
            </div>
        </div>
    </body>
</html>