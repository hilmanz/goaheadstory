<?php /* Smarty version 2.6.13, created on 2014-02-23 00:30:40
         compiled from application/web/widgets/goahead-gallery.html */ ?>
<div id="articlePage">
	<div class="blog-content clearfix">	
		<div id="photo_gallery" class="article_image_content" >
		<div style="float:right" ><button class="join">Join</button></div>
			<?php if ($this->_tpl_vars['aspiration']): ?>
				<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['aspiration']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
					<div class="box photo cols2">
						<?php if ($this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['hasfile']): ?>
							<a href="#popup-photography" class="showPopup thumb120 articledetail" articleType="music"  contentid="<?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_id']; ?>
">
									<img class="greyscale" src="" />
							</a>
						<?php else: ?>
						<a href="#popup-photography" class="thumb300 countGallery"  counttype="views" count="<?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_view']; ?>
" contentid="<?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_id']; ?>
" datacaption="view">
														<img class="greyscale" src="<?php if ($this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_images']):  echo $this->_tpl_vars['basedomain']; ?>
assets/content/thumb/default_image.jpg<?php else:  if ($this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_images']):  echo $this->_tpl_vars['basedomain']; ?>
public_assets/article/<?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_images'];  else:  echo $this->_tpl_vars['basedomain']; ?>
assets/content/thumb/default_image.jpg<?php endif;  endif; ?>"/>
						</a>
						<?php endif; ?>
						
						
						<div class="entry-box">
							<div class="judul_galery">
								<a href="#popup-photography" class="showPopup thumb300 articledetail"  contentid="<?php echo $this->_tpl_vars['article'][$this->_sections['i']['index']]['id']; ?>
">
								<h3><?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration']; ?>
</h3>
								</a>
								<span></span>
							</div>
							
							<div class="content_action right articleAct">
								<ul>
								<li><a title="add favourite" class="icon_love countGallery"  contentid="<?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_id']; ?>
" count="<?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_like']; ?>
" datacaption="like" href="javascript:void(0)"><?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_like']; ?>
</a></li>
								<li><a title="total comment" style="display:inline;"  class="icon_comment  " counttype="views" count="<?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_comment']; ?>
" datacaption="comentar" contentid="<?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_id']; ?>
" href="#popup-photography"><?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_comment']; ?>
</a></li>
								<li><a title="total  view" class="icon_view countGallery" counttype="views" count="<?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_view']; ?>
" contentid="<?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_id']; ?>
" datacaption="view" href="javascript:void(0)"><?php echo $this->_tpl_vars['aspiration'][$this->_sections['i']['index']]['user_aspiration_view']; ?>
</a></li>
								</ul>
						  </div>
						</div>
					
					</div>
				<?php endfor; endif; ?>
			<?php else: ?>
				<div class="notFound">
					<br>
					<p><?php echo $this->_tpl_vars['locale']['notfounddatagoaheadgallery']; ?>
</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="paging" id="goaheadGalleryPaging"></div>
</div>

<!-- this will trigger auto popup if content id is existing -->

<?php echo '
	<script>
	
		$(document).ready(function(){$("#autopopupdetail").trigger("click");});
		$(document).on(\'click\',\'.join\', function()
		{
			
			$.ajax({
				type: "get",
				url: basedomain+\'travia/join\',
				dataType: "json",
				success: function( strData ){
				
							if(strData.status==1)
							{
								window.location.href = basedomain+\'travia/traviaUser\';
							}
							else if(strData.status==2)
							{
								//alert(\'anda belum login ,login dulu ya\');
								window.location.href = basedomain+\'travia/result\';
							
							}
							else 
							{
								alert(\'anda belum login ,login dulu ya\');
								//window.location.href = basedomain+\'travia\';
							
							}
						}
			});
		
		});
		$(document).on(\'click\',\'.closePopup\', function()
		{
			$(\'#popup-notification\').attr(\'style\',\'display: none;\');
		});
		/*$(document).on(\'click\',\'.likeGal\', function()
		{
			var cid = $(this).attr(\'contentid\');
			var cLike = $(this).attr(\'like\');
		
			var parent = $(this);
			$.ajax({
				type: "POST",
				url: basedomain+\'travia/likeGaleri\',
				data: {cid:cid,cLike:cLike},
				dataType: "json",
				success: function( strData ){
							if(strData.status==1)
							{
								
								parent.attr(\'like\',strData.counLike);
								parent.html(strData.counLike);
							}
							else
							{
								alert(\'anda sudah pernah like\');
							
							}
						
						}
			});
		
		});
		$(document).on(\'click\',\'.viewGal\', function()
		{
			
			var cid = $(this).attr(\'contentid\');
			var cview = $(this).attr(\'count\');
		
			var parent = $(this);
			$.ajax({
				type: "POST",
				url: basedomain+\'travia/viewGalerry\',
				data: {cid:cid,cview:cview},
				dataType: "json",
				success: function( strData ){
							if(strData.status==1)
							{
								
								parent.attr(\'count\',strData.counView);
								parent.html(strData.counView);
							}
						
						}
			});
		});
		$(document).on(\'click\',\'.popComent\', function()
		{
			$.ajax({
				type: "POST",
				url: \'travia/join\',
				success: function( strData ){
							window.location.href = \'traviaUser\';
						}
			});
		
		});*/
		$(document).on(\'click\',\'.countGallery\', function()
		{
			var cid = $(this).attr(\'contentid\');
			var cCount = $(this).attr(\'count\');
			var cCaption = $(this).attr(\'datacaption\');
			var comentar = $(this).attr(\'comentar\');
			var parent = $(this);
			
			$.ajax({
				type: "POST",
				url: basedomain+\'travia/countGallery\',
				data: {cid:cid,cCount:cCount,caption:cCaption},
				dataType: "json",
				success: function( strData ){
							if(strData.status==1)
							{
								if(cCaption!=\'view\')
								{
									parent.attr(\'count\',strData.cCount);
									parent.html(strData.cCount);
									
									$(\'#popup-notification\').attr(\'style\',\'display: none;\');
								}
								else
								{
									//parent.attr(\'count\',strData.cCount);
									//parent.html(strData.cCount);
									$(\'.icon_view\').attr(\'count\',strData.cCount);
									$(\'.icon_view\').html(strData.cCount);
									//window.location.herf(basedomain+\'travia/detail\');
									var html =\'\';
									var isicomentar ="";
									$(\'#popup-notification\').attr(\'style\',\'display: block;\');
									html += \'<h2>\'+strData.user_aspiration+\'</h2>\';
									html += \'<textarea name="comentar" class="commentarwahyu" /> <button class="btnComentar" > submit </button>\';
									html += \'<div class="listComentar"><div class="loaders"><img src="http://localhost/go-ahead-story/trunk/goaheadstory/public_html/assets/images/loader.gif"></div></div>\';
									$(\'.popupContent\').html(html);
									
									$.ajax({
											type: "POST",
											url: basedomain+\'travia/commentGalerry\',
											data: {cid:cid},
											dataType: "json",
											success: function( comnData ){
											
												if(comnData.status==1)
													{												
														$.each(comnData.query, function( index, value ) {
														
																//alert(index+":"+value.aspiration_comment);
																isicomentar += \' <div><b>email : \'+value.user_email+\'</b></div>\';
																isicomentar += \' <div>comentar : \'+value.aspiration_comment+\'</div>\';
														
														});
														$(\'.loaders\').remove();
														$(\'.listComentar\').html(isicomentar);
														btnComentar(cid);
													}
												else
													{
													
														isicomentar += \' <div>kosong</div>\';
														$(\'.listComentar\').html(isicomentar);
														btnComentar(cid);
													}
											}
											
											});
									
									
								}
							}
							else
							{
								alert(strData.msg);
							
							}
						
						}
			});
		
		});
	function btnComentar(cid)
	{
		$(document).on(\'click\',\'.btnComentar\', function()
		{
			var isicomentar ="";
			var comentar = $(this).prev(\'.commentarwahyu\').val();
			
			$(\'.listComentar\').html(\'<div class="loaders"><img src="http://localhost/go-ahead-story/trunk/goaheadstory/public_html/assets/images/loader.gif"></div>\');
			$.ajax({
						type: "POST",
						url: basedomain+\'travia/countGallery\',
						data: {cid:cid,Coment:comentar,caption:\'comment\'},
						dataType: "json",
						success: function( comnData ){
							if(comnData.status==1)
							{
								
								$.each(comnData.query, function( index, value ) {
														
															isicomentar += \' <div><b>email : \'+value.user_email+\'</b></div>\';
																isicomentar += \' <div>comentar : \'+value.aspiration_comment+\'</div>\';
														
														});
								$(\'.loaders\').remove();
								$(\'.listComentar\').html(isicomentar);
							}
							
						}
										
				});
									
			
		
		});
	
	}
	
	function popupContent(contenthtml)
	{
			$(".popupLoader").append(\'<div class="loaders"><img src="fgf/assets/images/loader.gif"></div>\');
			$(\'.popupDetail\').show();
			$(\'.loaders\').remove();
			$(".popupDetail").html(contenthtml);
	}	
	</script>	
'; ?>



<script>
	var filter_goaheadGallery = "<?php echo $this->_tpl_vars['filter_goaheadGallery']; ?>
"
	getpaging(<?php echo $this->_tpl_vars['start']; ?>
,<?php echo $this->_tpl_vars['total']; ?>
,"goaheadGalleryPaging","paging_ajax_goaheadGallery",10);
</script>