<div id="shorter">
    <div id="left_menu">
    	<ul>
        	<li class="current"><a href="index.php?menu=dj-booth">Highlights</a></li>
            <li><a href="index.php?menu=dj-booth-article">Articles</a></li>
            <li><a href="#">Contest</a></li>
        </ul>
    </div><!-- END #left_menu -->
    <div id="right_menu">
        <form method="post" action="" class="searchTop" id="searchTop">
				<input type="text" value="Search..."  onBlur="if(this.value=='')this.value='Search...';" onFocus="if(this.value=='Search...')this.value='';"/>
            <input type="submit" value="&nbsp;" id="querySubmit">					               
		</form>
    	<ul>
            <li>
                <div class="toggle">
                    <div class="title">
                    <a href="#" class="toggle">Category</a>
                    </div>
                    <div class="inner">
                        <a href="#">Solo</a>
                        <a href="#">Full Band</a>
                        <a href="#">Instrument</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="toggle">
                    <div class="title">
                    <a href="#" class="toggle">Newest</a>
                    </div>
                    <div class="inner">
                        <a href="#">Dayly</a>
                        <a href="#">Weekly</a>
                        <a href="#">Monthly</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="toggle">
                    <div class="title">
                    <a href="#" class="toggle">Band</a>
                    </div>
                    <div class="inner">
                        <a href="#">Pop</a>
                        <a href="#">Jazz</a>
                        <a href="#">Alternative</a>
                        <a href="#">Accoustic</a>
                        <a href="#">Dangdut</a>
                        <a href="#">Etnic</a>
                    </div>
                </div>
            </li>
        </ul>
   </div><!-- END #right_menu -->
</div><!-- END #shorter -->

<div class="section">
    <ul class="columns-content page-content clearfix">
        <li class="col-sidebar">
           <?php include('widget/tag.php'); ?>
           <?php include('widget/weekly_popular.php'); ?>
           <?php include('widget/side_banner.php'); ?>
        </li> <!-- END .col-sidebar -->
        <li class="col-main">
        	<div id="articlePage">
                <div class="blog-content clearfix">
                	<div id="hotArticle" class="article_boxBig">
                        <a href="#popup-music" class="showPopup thumb250"><img src="content/thumb/image_rev.jpg" /></a>
                        <div class="pita_rev"></div>
                        <div class="isi_boxBig">
                        	<div class="judul">
                                <h3>Rumah Sakit</h3>
                                <span>1 + 2</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur 
adipiscing elit. Ut condimentum nisl at ipsum volutpat ut aliquam.</p>
							<p>Lorem ipsum dolor sit amet, consectetur 
adipiscing elit. Ut condimentum nisl at ipsum volutpat ut aliquam.</p>
							<div class="boxBottom">
                                <div class="content_action">
                                    <ul>
                                        <li><a class="icon_love" href="#">55</a></li>
                                        <li><a class="icon_comment" href="#">35</a></li>
                                        <li><a class="icon_view" href="#">60</a></li>
                                    </ul>
                                </div><!--END .content_action-->
                                <div class="mp3Player fr">
                                    <audio src="content/mp3/SepertiKekasihku.mp3" type="audio/mp3" controls="controls" width="150"></audio>	
                                </div><!-- end .mp3Player -->
                            </div><!--END .boxBottom-->
                        </div><!--END .isi_boxBig-->
                    </div><!--END .article_boxBig-->
                    <ul class="columns-2">
                    	<li class="col2">
                            <div class="article_box interview">
                                <a href="#" class="thumb300"><img class="greyscale" src="content/thumb/img_content1.jpg" /></a>
                                <div class="pita_interview"></div>
                                <div class="article_isi">
                                    <h3>Lorem ipsum dolor sit ame</h3>
                                    <span>8 January 2013</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut condimentum nisl.</p>
                                    <div class="content_action">
                                        <ul>
                                            <li><a class="icon_love" href="#">55</a></li>
                                            <li><a class="icon_comment" href="#">35</a></li>
                                            <li><a class="icon_view" href="#">60</a></li>
                                        </ul>
                                    </div><!--END .content_action-->
                                </div><!--END .article_isi-->
                            </div><!--END .article_box-->
                        </li><!-- END .clos2-->
                    	<li class="col2">
                            <div class="article_box interview">
                                <a href="#" class="thumb300"><img class="greyscale" src="content/thumb/img_content1.jpg" /></a>
                                <div class="pita_interview"></div>
                                <div class="article_isi">
                                    <h3>Lorem ipsum dolor sit ame</h3>
                                    <span>8 January 2013</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut condimentum nisl.</p>
                                    <div class="content_action">
                                        <ul>
                                            <li><a class="icon_love" href="#">55</a></li>
                                            <li><a class="icon_comment" href="#">35</a></li>
                                            <li><a class="icon_view" href="#">60</a></li>
                                        </ul>
                                    </div><!--END .content_action-->
                                </div><!--END .article_isi-->
                            </div><!--END .article_box-->
                        </li>
                    	<li class="col2">
                            <div class="box_little">
                                <a href="#popup-music" class="showPopup thumb120"><img src="content/thumb/img_content7.jpg" /></a>
                                <div class="isi_boxLittle">
                                    <h3><a href="#popup-music" class="showPopup">Payung Teduh</a></h3>
                                <span>Berdua Saja</span>
                                <div class="mp3Player">
                                    <audio src="content/mp3/SepertiKekasihku.mp3" type="audio/mp3" controls="controls" width="150"></audio>	
                                </div><!-- end .mp3Player -->
                                <div class="content_action">
                                    <ul>
                                        <li><a class="icon_love" href="#">55</a></li>
                                        <li><a class="icon_comment" href="#">35</a></li>
                                        <li><a class="icon_view" href="#">60</a></li>
                                    </ul>
                                </div><!--END .content_action-->
                            </div><!--END .isi_boxLittle-->
                        </li><!-- END .clos2-->
                    	<li class="col2">
                            <div class="box_little">
                                <a href="#popup-music" class="showPopup thumb120"><img src="content/thumb/img_content7.jpg" /></a>
                                <div class="isi_boxLittle">
                                    <h3><a href="#popup-music" class="showPopup">Payung Teduh</a></h3>
                                <span>Berdua Saja</span>
                                <div class="mp3Player">
                                    <audio src="content/mp3/SepertiKekasihku.mp3" type="audio/mp3" controls="controls" width="150"></audio>	
                                </div><!-- end .mp3Player -->
                                <div class="content_action">
                                    <ul>
                                        <li><a class="icon_love" href="#">55</a></li>
                                        <li><a class="icon_comment" href="#">35</a></li>
                                        <li><a class="icon_view" href="#">60</a></li>
                                    </ul>
                                </div><!--END .content_action-->
                            </div><!--END .isi_boxLittle-->
                        </li>
                    	<li class="col2">
                            <div class="box_little">
                                <a href="#popup-music" class="showPopup thumb120"><img src="content/thumb/img_content7.jpg" /></a>
                                <div class="isi_boxLittle">
                                    <h3><a href="#popup-music" class="showPopup">Payung Teduh</a></h3>
                                <span>Berdua Saja</span>
                                <div class="mp3Player">
                                    <audio src="content/mp3/SepertiKekasihku.mp3" type="audio/mp3" controls="controls" width="150"></audio>	
                                </div><!-- end .mp3Player -->
                                <div class="content_action">
                                    <ul>
                                        <li><a class="icon_love" href="#">55</a></li>
                                        <li><a class="icon_comment" href="#">35</a></li>
                                        <li><a class="icon_view" href="#">60</a></li>
                                    </ul>
                                </div><!--END .content_action-->
                            </div><!--END .isi_boxLittle-->
                        </li><!-- END .clos2-->
                    	<li class="col2">
                            <div class="box_little">
                                <a href="#popup-music" class="showPopup thumb120"><img src="content/thumb/img_content7.jpg" /></a>
                                <div class="isi_boxLittle">
                                    <h3><a href="#popup-music" class="showPopup">Payung Teduh</a></h3>
                                <span>Berdua Saja</span>
                                <div class="mp3Player">
                                    <audio src="content/mp3/SepertiKekasihku.mp3" type="audio/mp3" controls="controls" width="150"></audio>	
                                </div><!-- end .mp3Player -->
                                <div class="content_action">
                                    <ul>
                                        <li><a class="icon_love" href="#">55</a></li>
                                        <li><a class="icon_comment" href="#">35</a></li>
                                        <li><a class="icon_view" href="#">60</a></li>
                                    </ul>
                                </div><!--END .content_action-->
                            </div><!--END .isi_boxLittle-->
                        </li>
                    	<li class="col2">
                            <div class="box_little">
                                <a href="#popup-music" class="showPopup thumb120"><img src="content/thumb/img_content7.jpg" /></a>
                                <div class="isi_boxLittle">
                                    <h3><a href="#popup-music" class="showPopup">Payung Teduh</a></h3>
                                <span>Berdua Saja</span>
                                <div class="mp3Player">
                                    <audio src="content/mp3/SepertiKekasihku.mp3" type="audio/mp3" controls="controls" width="150"></audio>	
                                </div><!-- end .mp3Player -->
                                <div class="content_action">
                                    <ul>
                                        <li><a class="icon_love" href="#">55</a></li>
                                        <li><a class="icon_comment" href="#">35</a></li>
                                        <li><a class="icon_view" href="#">60</a></li>
                                    </ul>
                                </div><!--END .content_action-->
                            </div><!--END .isi_boxLittle-->
                        </li><!-- END .clos2-->
                    	<li class="col2">
                            <div class="box_little">
                                <a href="#popup-music" class="showPopup thumb120"><img src="content/thumb/img_content7.jpg" /></a>
                                <div class="isi_boxLittle">
                                    <h3><a href="#popup-music" class="showPopup">Payung Teduh</a></h3>
                                <span>Berdua Saja</span>
                                <div class="mp3Player">
                                    <audio src="content/mp3/SepertiKekasihku.mp3" type="audio/mp3" controls="controls" width="150"></audio>	
                                </div><!-- end .mp3Player -->
                                <div class="content_action">
                                    <ul>
                                        <li><a class="icon_love" href="#">55</a></li>
                                        <li><a class="icon_comment" href="#">35</a></li>
                                        <li><a class="icon_view" href="#">60</a></li>
                                    </ul>
                                </div><!--END .content_action-->
                            </div><!--END .isi_boxLittle-->
                        </li>
                    </ul>
                </div> <!-- END .blog-content -->
                 <div class="paging">
                     <p class="clearfix">
                        <a href="#" class="prev">&nbsp;</a>
                        <a href="#">1</a>
                        <a href="#" class="current">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">7</a>
                        <a href="#">8</a>
                        <a href="#">9</a>
                        <a href="#">10</a>
                        <a href="#" class="next">&nbsp;</a>
                     </p>
                </div> <!-- END .paging -->
              </div><!-- END #articlePage -->
            </li><!-- END .col-main -->    
    </ul><!-- END .page-content -->
</div><!-- END .section -->
<?php include('widget/popup_music.php'); ?>