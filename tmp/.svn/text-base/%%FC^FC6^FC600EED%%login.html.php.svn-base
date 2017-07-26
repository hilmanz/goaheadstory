<?php /* Smarty version 2.6.13, created on 2014-02-17 10:05:23
         compiled from application/admin//login.html */ ?>
    <link href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/bootstrap-overrides.css" rel="stylesheet">
	<link href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet">
    <link href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/bin.css" rel="stylesheet">
	<link href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/components/signin.css" rel="stylesheet" type="text/css">   

<div id="login-container">
    <div class="account-container login">
        <div class="content clearfix">
        	<div class="login_logo">
            	<div class="">
					ADMINISTRATION SITE 
                </div>
            </div>
            <form id="loginBeat" method="POST" action="<?php echo $this->_tpl_vars['basedomain']; ?>
login/local" >	
                <div class="login-fields">
                    <div class="field">
                        <label for="username">Username :</label>
                        <input type="text" id="username" class="required" name="username" value="" placeholder="Username" class="login" />
                    </div> <!-- /field -->
                    <div class="field">
                        <label for="password">Password:</label>
                       
                        <input type="password" id="password" class="required" name="password" value="" placeholder="Password" class="login"/>
                    </div> <!-- /password -->
					<div id="chaptcha">
                    	<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
captcha.php"/>
                    	<input type="text" class="chaptcha" name="captcha"/>
                	</div>
                </div> <!-- /login-fields -->
                <div class="login-actions">
					 <?php if ($this->_tpl_vars['res']): ?>	 
						<?php else:  if ($this->_tpl_vars['msg'] == 'null'): ?>  <?php else: ?>  <?php echo $this->_tpl_vars['msg']; ?>
 <?php endif; ?>
					 <?php endif; ?>
					 <br>
					 <input type="hidden" id="" name="login" value="1" />
                    <button class="button"><span>LOGIN</span></button>
                </div> <!-- .actions -->
            </form>
        </div> <!-- /content -->
    </div> <!-- /account-container -->
</div> <!-- /login-container -->