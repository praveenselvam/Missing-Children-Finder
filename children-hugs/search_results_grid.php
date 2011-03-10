<?php include "controller/search_controller.php";?>
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
            
            <div class="span-18 middle_container last" id="children_results_grid">
            	<?php 
            		if($_REQUEST['error'] == 1) {
            	?>
            	<div class="span-14 summary">Error occurred while processing request. <br/> <?php echo $_REQUEST['response']; ?> <br/> </div>
            	<?php 
            		}else if($_REQUEST['error'] == 0){
            	?>
                <h2>Search Results</h2>
                <div class="span-14 summary">
                    <span><?php echo count($_REQUEST['response']); ?></span>
                    matches found for "<strong><?php echo $_GET['name'].", ".$_GET['gender'].", ".$_GET['origin']; ?></strong>
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
                        	$result=array();
                        	$result=$_REQUEST['response'];
                        	$size=count($result);
                            for($i = 0; $i < $size; $i++) {
                        ?>
                                <tr>
                                    <td><a href="./child_profile.php"><?php echo $result[$i]['name'];?></a></td>
                                    <td><?php echo $result[$i]['age']; ?></td>
                                    <td><?php $gender=($result[$i]['gender']=="M"?"Male":"Female"); echo $gender;?></td>
                                    <td><?php echo $result[$i]['city'].", ".$result[$i]['state']; ?></td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <?php 
            		}else{
            			echo "Internal error occurred while processing your request. Pls try again later <br>";
            		}
            	?>
            </div>
        </div>
    </body>
</html>