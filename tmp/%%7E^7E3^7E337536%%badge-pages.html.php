<?php /* Smarty version 2.6.13, created on 2014-02-13 15:18:04
         compiled from application/admin/apps/badge-pages.html */ ?>
<div id="theContainer" class="inboxPage">
    <div class="theContainer">
        <div class="head-title">
            <h1 class="fl">Badges</h1>
        </div> <!-- /.head-title -->
					        <div class="theContent">
			<table cellpadding="0" cellspacing="0" border="0" id="table1" class="stdtable">
			<colgroup>
				<col class="con0" style="width: 4%" />
				<col class="con1" />
				<col class="con0" />
				<col class="con1" />
				<col class="con0" />
				<col class="con1" />
			</colgroup>
			<thead>
				<tr>
					<th class="head0">No</th>
					<th class="head0">Name</th>
					<th class="head0">Image</th>
					<th class="head0">Description</th>
					<th class="head1">Type</th>
					<th class="head1">Point</th>
					<th class="head1">Prob</th>
					<th class="head1">Action</th>
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
&nbsp;</td>
						<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['name']; ?>
</td>
						<td><img height="50px" width="50px" src="<?php echo $this->_tpl_vars['basedomainpath']; ?>
assets/images/badges/badges-<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
.png" ></td>
						<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['desc']; ?>
</td>
						<td align="center"><?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['type'] == 0): ?> <span class="green">Common</span>
							<?php elseif ($this->_tpl_vars['list'][$this->_sections['i']['index']]['type'] == 1): ?> <span class="orange">Special</span>
							<?php else: ?>
							<?php endif; ?>
						</td>
						<td align="center"><nobr><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['point']; ?>
</nobr></td>
						<td align="center"><nobr><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['prob']; ?>
</nobr></td>
						<td align="center">
							<nobr>
							<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
badges/badgesedit?id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" class="green"> update </a>
							| <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
badges/hapus?id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" class="red" onclick="return confirm('Are you sure you want to delete this?')">delete</a>
							</nobr>
						</td>
					</tr>
					<?php endfor; endif; ?>
				<?php endif; ?>
			</tbody>
            	<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
badges/newDataInput" class="fr addNewContent"> add new </a>
			</table>
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