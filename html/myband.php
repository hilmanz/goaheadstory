<div class="section profilePage">
    <ul class="columns-content page-content clearfix">
        <li class="col-sidebar">
           <?php include('widget/band_profile.php'); ?>
           <?php include('widget/band_member.php'); ?>
           <?php include('widget/side_banner.php'); ?>
        </li> <!-- END .col-sidebar -->
        <li class="col-main">
        	<div class="imgContentPorfile">
        		<div class="headbanner">
                	<img src="content/banner/image_banner1.jpg" />
                </div>
                <div class="edit_cover">
        			<a href="#" class="profile">Edit Cover</a>
       	 		</div>
            </div><!-- END .imgContentPorfile -->
            <div class="profileActivity" id="tabs" >
            	<div class="Activity_menu">
                    <ul class="nav clearfix">
                        <li><a href="#activity-list">Band Activity</a></li>
                        <li><a href="#play-list">Songs</a></li>
                        <li><a href="#gallery-list">Gallery</a></li>
                        <li><a href="#calendar-list">Calendar</a></li>
                    </ul>
                </div><!--END .Activity_menu-->
			   <?php include('widget/list_activity.php'); ?>
               <?php include('widget/list_playlist.php'); ?>
               <?php include('widget/list_gallery.php'); ?>
               <?php include('widget/list_calendar.php'); ?>
            </div><!-- END .profileActivity -->
		</li><!-- END .col-main -->    
    </ul><!-- END .page-content -->
</div><!-- END .section -->