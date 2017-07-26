<?php /* Smarty version 2.6.13, created on 2014-02-14 17:36:34
         compiled from application/admin//apps/list-user.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'application/admin//apps/list-user.html', 88, false),)), $this); ?>
<script>
	<?php echo '
	
	$(document).on(\'change\',\'#status\',function(){
		var id = $(this).attr(\'prop\'); 
		var photo_moderation = $(this).val(); 
		
		$.post(basedomain+"listuser/ajaxconfirmed" ,{photo_moderation:photo_moderation, id:id}, function(confirmedajax){			
			
			if (photo_moderation == 1){
				alert(\'photo verified\');				
			}else if(photo_moderation==0){
				alert(\'pending\');
			}else{
				alert(\'failed\');
			}
			
		},"JSON");
	});
	
	'; ?>

</script>

<?php if ($this->_tpl_vars['user']->leaderdetail->type == 1): ?>
<div id="theContainer" class="inboxPage">
    <div class="theContainer">
		<div class="head-title">
			<h1 class="fl">This Page For Highest User Leveling Only.</h1>
		</div>
	</div>
</div>
<?php else: ?>  
<div id="theContainer" class="inboxPage">
    <div class="theContainer">
        <div class="head-title">
            <h1 class="fl">List User</h1>
        </div> <!-- /.head-title -->
        <div class="short2">
            <form method="POST" action="<?php echo $this->_tpl_vars['basedomain']; ?>
listuser" id="shorter" class="formsubmitmanualmoderation" >
                <div class="date-range fl"> 
										Timespan&nbsp;&nbsp;
					<input type="text" class="half-width" id="datepicker" name="startdate" value="<?php echo $this->_tpl_vars['startdate']; ?>
" style="width:100px" />
					<span>to</span>
					<input type="text" class="half-width" id="datepicker2" name="enddate" value="<?php echo $this->_tpl_vars['enddate']; ?>
" style="width:100px"  />
                </div>
                <div class="input-append fr">
                    <input type="text" size="16" id="search" name="search" class="span2" onfocus="if(this.value=='Search...')this.value='';" onblur="if(this.value=='')this.value='Search...';" value="<?php if ($this->_tpl_vars['search']):  echo $this->_tpl_vars['search'];  else: ?>Search...<?php endif; ?>"/>
					<input type="hidden" name="filter" value="searchform"/>
					<button type="submit" class="btn">Go!</button>
                </div>
            </form>
        </div><!-- /.short -->
        <div class="theContent">
			<table cellpadding="0" cellspacing="0" border="0" id="table1" class="stdtable">
			<colgroup>
				<col class="con0" style="width: 4%" />
				<col class="con1" />
				<col class="con0" />
				<col class="con1" />
				<col class="con0" />
				<col class="con1" />
				<col class="con0" />
			</colgroup>
			<thead>
				<tr>
					<th class="head0">No</th>
					<th class="head0">Name</th>
					<th class="head0">Email</th>
					<th class="head0">City</th> 
					<th class="head0">Register Date</th> 
					<th class="head0">Photo</th> 
					<th class="head0">status</th> 
				</tr>
			</thead>
			<tbody>
				<?php if ($this->_tpl_vars['list']): ?>
					<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<tr>
						<td width="10"><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['no']; ?>
&nbsp;<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
"></td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['last_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
						<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['email']; ?>
</td>
						<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['cityname']; ?>
</td>
						<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['register_date']; ?>
</td> 
						<td><a href="javascript:void(0)" class="arkPopupImages" call="<?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['image_profile'] == ''):  echo $this->_tpl_vars['basedomainpath']; ?>
public_assets/profile/default.jpg<?php else:  echo $this->_tpl_vars['basedomainpath']; ?>
public_assets/profile/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['image_profile'];  endif; ?>">
						<?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['image_profile'] == ''): ?><img height="70px" width="70px" src="<?php echo $this->_tpl_vars['basedomainpath']; ?>
public_assets/profile/default.jpg" /><?php else: ?><img height="70px" width="70px" src="<?php echo $this->_tpl_vars['basedomainpath']; ?>
public_assets/profile/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['image_profile']; ?>
 " /><?php endif; ?></a>
						</td> 
						<td align="center">
							<select id="status"  prop="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" >
								<option value="" class="green" > - </option>
								<option value="0" class="blue" <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['photo_moderation'] == 0): ?> selected <?php endif; ?>>Pending</option>
								<option value="1" class="red" <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['photo_moderation'] == 1): ?> selected <?php endif; ?>>Verified</option>
							</select>
						</td>
					</tr>
					<?php endfor; endif; ?>
				<?php endif; ?>
			</tbody>
			</table>
            <div class="pagingbox">
                <a href="#" class="prev">&laquo; PREV</a>
                <a href="#">1</a>
                <a href="#" class="current">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#" class="next">NEXT &raquo;</a>
            </div><!-- END .pagingbox -->
        </div> <!-- /.theContent -->
		<script>
				var startdate = "<?php echo $this->_tpl_vars['startdate']; ?>
";
				var enddate = "<?php echo $this->_tpl_vars['enddate']; ?>
";
				var search = "<?php echo $this->_tpl_vars['search']; ?>
";
				var publishedtype = "<?php echo $this->_tpl_vars['publishedtype']; ?>
";
				<?php echo '
					$(document).on(\'change\',\'#publishedtype\',function(){
						$(".formsubmitmanualmoderation").submit();
					})
				'; ?>

		</script>
		<?php if ($this->_tpl_vars['timeline']): ?>
			<?php if ($this->_tpl_vars['act'] != 'galleryList'): ?>
				<div class="paging" id="pagingpostmoderation"></div> <!-- END .paging -->			
				<script>				 
					getpaging(0,<?php echo $this->_tpl_vars['total']; ?>
,"pagingpostmoderation","paging_ajax_postmoderation",10);
				</script>
		 
			<?php else: ?>
				<div class="paging" id="pagingpostmoderation"></div> <!-- END .paging -->			
				<script>
					getpaging(0,<?php echo $this->_tpl_vars['total']; ?>
,"pagingpostmoderation","paging_ajax_gallerymoderation",10);
				</script>
			<?php endif; ?>
		<?php endif; ?>
    </div> <!-- /.theContainer -->
</div> <!-- /#theContainer -->


<?php endif; ?>


	<script>
		var searchType = '<?php echo $this->_tpl_vars['searchType']; ?>
';
	<?php echo '
		$(document).on("change","#moderationtype",function(){
			var modetype = $(this).val();
			window.location = basedomain+"moderation/"+modetype;
		
		});

		$(document).ready(function(){
			$(\'input.searchType\').on(\'change\',function(){
				searchType = $(this).val();
			});
		});
	'; ?>

	</script>