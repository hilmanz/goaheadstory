<?php /* Smarty version 2.6.13, created on 2014-02-17 10:53:04
         compiled from application/admin//apps/aspiration-travia-list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'application/admin//apps/aspiration-travia-list.html', 88, false),)), $this); ?>
<script>
	<?php echo '
	
	$(document).on(\'change\',\'#status\',function(){
		var id = $(this).attr(\'prop\'); 
		var n_status = $(this).val(); 
		
		$.post(basedomain+"aspiration/ajaxconfirmed" ,{n_status:n_status, id:id}, function(confirmedajax){			
				
			if (n_status == 1){
				alert(\'Approved\');				
			}else if(n_status == 2){
				alert(\'Moderation Needed\');
			}else if(n_status == 3){
				alert(\'Previous Asp\');
			}else{
				alert(\'Banned\');
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
            <h1 class="fl">Aspiration</h1>
        </div> <!-- /.head-title -->
        <div class="short2">
            <form method="POST" action="<?php echo $this->_tpl_vars['basedomain']; ?>
aspirationtravia" id="shorter" class="formsubmitmanualmoderation" >
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
					<th class="head0">Email</th> 
					<!-- <th class="head0">Username</th>  -->
					<th class="head0">Aspiration</th>  
					<th class="head0">Art Work</th> 
					<th class="head0">Action</th> 
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
						<td width="10"><?php echo $this->_tpl_vars['no']++; ?>
&nbsp;<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
"></td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['user_aspiration_email'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td> 
						
						<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['user_aspiration']; ?>
</td> 
						
						<td align="center">
							<?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['user_aspiration_images']): ?>
							<img width="300" height="300" src="<?php echo $this->_tpl_vars['basedomainpath']; ?>
public_assets/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['user_aspiration_images']; ?>
">
							<?php else: ?>
							<img width="300" height="300" src="<?php echo $this->_tpl_vars['basedomainpath']; ?>
assets/content/thumb/default_image.jpg">
							<?php endif; ?>
						</td>
							<td align="center">
							<nobr>  
							<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
aspirationtravia/view/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['user_aspiration_id']; ?>
" class="red" >View</a>
							| <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
aspirationtravia/hapus?id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['user_aspiration_id']; ?>
" class="red" onclick="return confirm('Are you sure you want to delete this?')">delete</a>
							</nobr>
						</td>
					</tr>
					<?php endfor; endif; ?>
				<?php endif; ?>
			</tbody>
			</table>
      	<div class="pagingbox">
			<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
aspirationtravia?start=<?php echo $this->_tpl_vars['start']; ?>
" class="prev">&laquo; PREV</a>
				<?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)1;
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['total']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
					  <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
aspirationtravia?start=<?php echo $this->_sections['foo']['index']; ?>
"><?php echo $this->_sections['foo']['index']; ?>
</a>
				<?php endfor; endif; ?>
				<?php if (!(1 & ($this->_tpl_vars['next'] / $this->_tpl_vars['total']))): ?>
					<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
aspirationtravia?start=<?php echo $this->_tpl_vars['next']; ?>
" class="next">NEXT&raquo;</a>
				<?php else: ?>
					 <a href="#pagingbox" class="next"> NEXT &raquo;</a>
				<?php endif; ?>
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