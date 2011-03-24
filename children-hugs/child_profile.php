 <?php include 'controller/child_profile_controller.php'; ?>
 <?php include_once 'config/app_config.php';?>
 
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
            	<?php //http://1.bp.blogspot.com/_su4BWzt0qII/Sc-oK-XUYuI/AAAAAAAAAFY/pGKoKNQ4IWs/s400/azharuddin.jpg ?>
                <img src="images/<?php echo (($_REQUEST['response'][0]['photo']) != null )?"/uploads/rz_".($_REQUEST['response'][0]['photo']):"unknown.jpeg"; ?>" style="width: 100%;" />
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
                    <?php
                    	 $additionalInfo = $_REQUEST['add_info'];
                    ?>
                    <?php
                    	if(empty($additionalInfo))
                    	{ 
                    ?>
                    	<dd>
                    		No additional information found.
                    	</dd>	
                    <?php }else {
                    	foreach($additionalInfo as $info)
                    	{
                    ?>
	                    <dd>
	                    	<?php echo nl2br(htmlentities($info["create_date"], ENT_QUOTES, "UTF-8"));?>
	                        <?php echo nl2br(htmlentities($info["info_text"], ENT_QUOTES, "UTF-8"));?>
	                    </dd>
                    <?php
                    	} 
                    }?>
                </dl>                
                <form method="POST" action="child_profile.php?id1=<?php echo ($_REQUEST["id1"]);?>&id2=<?php echo ($_REQUEST["id2"]);?>">
                	<h4>Know more information about <?php echo $_REQUEST['response'][0]['name']; ?>?</h4>
                	<label>Enter it here:</label>
	                <textarea name="profile_text">
	                	
	                </textarea>
	                <input type="hidden" value="<?php echo ($_REQUEST["id1"]);?>" name="id1"/>
	                <input type="hidden" value="<?php echo ($_REQUEST["id2"]);?>" name="id2"/>
	                
	                <?php include 'shared/captcha.php'; ?>
	                
	                <input type="submit" value="Save" class="right" />
	            </form>
            </div>
        </div>
         <?php include 'shared/errors_to_browser.php'; ?>
    </body>
</html>