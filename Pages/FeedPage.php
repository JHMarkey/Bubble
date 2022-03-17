<?php 
require("../Templates/Head.php");
require("../Templates/FeedHeader.php");
require("../BackEndProcesses/PostSQL.php");
	session_start();
	$errorPArea = "";
	$post = true;
	if(isset($_POST["confirm"])){
		if($_POST["PostArea"] == NULL){
			$errorPArea = "You must add text before posting!";
			$post = false;
		}
		if($post){
			sendPost();
		}
	} 	

	$posts = getPost();

	
?>



<div class="container bootstrap snippets bootdeys" style = "border:1px; margin-left:35%;">
    <div class="col-md-7 col-md-offset-2">
        <div class="panel">
            <div class="panel-body">
				<form method="post">
					<div class="form-outline">
                        <input type="text" id="PostArea" name ="PostArea" class="form-control form-control-lg" />
                        <label class="form-label" for="PostArea">What are you thinking?</label>
                        <span style="color:red"><?php echo $errorPArea; ?></span>
                    </div>
					<div class="mar-top clearfix">
						<div class="mt-4 pt-2">
                            <input style="float:right" class="btn btn-primary btn-sm" type="submit" value="Submit" id="confirm" name="confirm"/>
                        </div>
						<a class="btn btn-trans btn-icon fa fa-video-camera add-tooltip" href="#" data-original-title="Add Video" data-toggle="tooltip"></a>
						<a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#" data-original-title="Add Photo" data-toggle="tooltip"></a>
						<a class="btn btn-trans btn-icon fa fa-file add-tooltip" href="#" data-original-title="Add File" data-toggle="tooltip"></a>
					</div>
				</form>
        	</div>
        </div>
        <div class="panel panel-body">
    		<div class="timeline">
    			<div class="timeline-header">
    				<div class="timeline-header-title bg-success">Now</div>
    			</div>
    			<?php				
					for($i = 0; $i < $_SESSION["nPosts"]; $i++){
						if($posts[$i]["Status"] == "verified"){
							$time = $posts[$i]["PostTime"];
							$content = $posts[$i]["UserFirstName"]. "<br>". $posts[$i]["PostContent"];
							echo("<div class=\"timeline-entry\">	
									<div class=\"timeline-stat\">
										<div class=\"timeline-icon bg-dark\"><i class=\"fa fa-file-text-o fa-lg\"></i>
										</div>
										<div class=\"timeline-time\">".$time."</div>
									</div>
									<div class=\"timeline-label\">
										<p>". $content ."</p>
									</div>
								</div>");
						}
					}
					
					if($_SESSION["nPosts"] == 0){
						echo("<div class=\"timeline-entry\">
								<div class=\"timeline-stat\">
									<div class=\"timeline-icon bg-danger\"><i class=\"fa fa-file-text-o fa-lg\"></i>
									</div>
									<div class=\"timeline-time\">Now</div>
								</div>
								<div class=\"timeline-label\">
									<p>Currently no posts are avaialble.</p>
								</div>
							</div>");
					}
				?>
    			
    			
    		</div>
    	</div>
    </div>
</div>






<?php 
/*
<div class="timeline-entry">
   	<div class="timeline-stat">
    	<div class="timeline-icon"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Profile picture">
    	</div>
    	<div class="timeline-time">3 Hours ago</div>
    	</div>
    	<div class="timeline-label">
    		<p class="mar-no pad-btm"><a href="#" class="btn-link text-semibold">Lisa D.</a> commented on <a href="#">The Article</a>
    		</p>
    		<blockquote class="bq-sm bq-open">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</blockquote>
    	</div>
    			</div>
    			<div class="timeline-entry">
    				<div class="timeline-stat">
    					<div class="timeline-icon bg-purple"><i class="fa fa-check fa-lg"></i>
    					</div>
    					<div class="timeline-time">5 Hours ago</div>
    				</div>
    				<div class="timeline-label">
    					<img class="img-xs img-circle" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Profile picture">
    					<a href="#" class="btn-link text-semibold">Bobby Marz</a> followed you.
    				</div>
    			</div>
    
    			<div class="timeline-header">
    				<div class="timeline-header-title bg-dark">Yesterday</div>
    			</div>
    
    			<div class="timeline-entry">
    				<div class="timeline-stat">
    					<div class="timeline-icon bg-info"><i class="fa fa-envelope fa-lg"></i>
    					</div>
    					<div class="timeline-time">15:45</div>
    				</div>
    				<div class="timeline-label">
    					<h4 class="text-info mar-no pad-btm">Lorem ipsum dolor sit amet</h4>
    					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
    				</div>
    			</div>
    			<div class="timeline-entry">
    				<div class="timeline-stat">
    					<div class="timeline-icon bg-success"><i class="fa fa-thumbs-up fa-lg"></i>
    					</div>
    					<div class="timeline-time">13:27</div>
    				</div>
    				<div class="timeline-label">
    					<img class="img-xs img-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Profile picture">
    					<a href="#" class="btn-link text-semibold">Michael Both</a> Like <a href="#">The Article</a>
    				</div>
    			</div>
    			<div class="timeline-entry">
    				<div class="timeline-stat">
    					<div class="timeline-icon"></div>
    					<div class="timeline-time">11:27</div>
    				</div>
    				<div class="timeline-label">
    					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
    				</div>
    			</div>
				*/
?>