<?php /* Smarty version 2.6.13, created on 2014-02-13 15:18:52
         compiled from application/admin/widgets/module-permission-list.html */ ?>
<div id="theContainer2" class="galleryPage">
    <div class="theContainer2">
        <div class="theContent2">
        	<div class="col-content">
                <div class="theBox">
                    <div class="theBox-title">
                        <h2 class="fl">LISTS USER PERMISSION </h2>
                       
                    </div><!-- /.theBox-title -->
                    <div class="theBox-content">
                        <div class="forms">
							<table border="1px" width=100% >
							<td><a class="Btn" href="<?php echo $this->_tpl_vars['basedomain']; ?>
administrator/modulespermissionform" > add Modules </a></td>
							<td><a class="Btn" href="<?php echo $this->_tpl_vars['basedomain']; ?>
administrator/roles" > user permission </a></td>
							</tr>
							<tr><th>Module Name</th><th colspan='2' >Class</th></tr>
							<?php $_from = $this->_tpl_vars['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
							<tr><th><?php echo $this->_tpl_vars['v']['module']; ?>
</th><th><?php echo $this->_tpl_vars['v']['classcall']; ?>
</th></tr>
							<?php endforeach; endif; unset($_from); ?>
							</table>
                        </div> <!-- /.forms -->
                    </div> <!-- /.theBox-content -->
                </div> <!-- /.theBox -->
            </div><!-- /.col-content -->
          
        </div> <!-- /.theContent2 -->
    </div> <!-- /.theContainer -->
</div> <!-- /#theContainer -->