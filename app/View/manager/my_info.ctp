<div id="page-content" style="min-height: 478px;">


<h3>
管理员账户：<?php
	if (isset($myInfo)) {
		echo $myInfo['account'];
	}else{
		echo '信息错误!请联系超级管理员!';
	}
?>
</h3>

<div class="example-box">
    <div class="example-code">
        	
        	<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                       权限等级:
                    </label>
                </div>
                <div class="form-input col-md-10">
                <?php if ($myInfo['level'] == 0){?>
                    <a href="javascript:;" class="btn medium serviceType bg-orange" title="权限等级">
		                    <span class="button-content">超级管理员</span>
		            </a>
		        <?php }else{?>
		        	<a href="javascript:;" class="btn medium serviceType bg-orange" title="权限等级">
		                    <span class="button-content"><?=$myInfo['level']?>级管理员</span>
		            </a>
		        <?php }?>
		            
                </div>
            </div>
        	
        	<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                       所有权限:
                    </label>
                </div>
                <div class="form-input col-md-10">
                   
                <?php if ($myInfo['level'] == 0){?>
                    <a href="javascript:;" class="btn medium serviceType bg-gray" title="权限等级">
		                    <span class="button-content">增加任何等级管理员</span>
		            </a>
		            <a href="javascript:;" class="btn medium serviceType bg-gray" title="权限等级">
		                    <span class="button-content">删除任何等级管理员</span>
		            </a>
		            <a href="javascript:;" class="btn medium serviceType bg-gray" title="权限等级">
		                    <span class="button-content">用户管理</span>
		            </a>
		        <?php }else if($myInfo['level'] == 15){?>
		        	<a href="javascript:;" class="btn medium serviceType bg-gray" title="权限等级">
		                    <span class="button-content">用户管理</span>
		            </a>
		        <?php }else{?>
		        	<a href="javascript:;" class="btn medium serviceType bg-gray" title="权限等级">
		                    <span class="button-content">增加<?=$myInfo['level']?>级以下管理员</span>
		            </a>
		            <a href="javascript:;" class="btn medium serviceType bg-gray" title="权限等级">
		                    <span class="button-content">删除<?=$myInfo['level']?>级以下管理员</span>
		            </a>
		            <a href="javascript:;" class="btn medium serviceType bg-gray" title="权限等级">
		                    <span class="button-content">用户管理</span>
		            </a>
		        <?php }?>
		         </br>
		         <span>除超级管理员，数字越低等级越高！</span>
		        </div>
            </div>
        	
        	
        	
        
            
   
            
        	<div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        创建者:
	                    </label>
	                </div>
	                <div class="form-input col-md-2">
	                	 <a href="javascript:;" class="btn medium serviceType bg-gray" title="创建者">
		                    <span class="button-content"><?=$myInfo['account']?></span>
		           		 </a>
	                </div>
                </div>
                
                <div>
	                <div class="form-row">
		                <div class="form-label col-md-2">
		                    <label for="">
		                        创建时间:
		                    </label>
		                </div>
		                <div class="form-input col-md-3">
		                	<a href="javascript:;" class="btn medium serviceType bg-gray" title="创建时间">
		                    	<span class="button-content"><?=date('Y-m-d H:i',$myInfo['create_time'])?></span>
		           			</a>
		                </div>
		            </div>
                
                </div>
                
            </div>
            
            <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                       上次登录时间:
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <a href="javascript:;" class="btn medium serviceType bg-blue" title="上次登录时间">
                    	<?php if(!empty($myInfo['login_time'])){?>
		                    <span class="button-content"><?=date('Y-m-d H:i',$myInfo['login_time'])?></span>
		                <?php }else{?>
		                	<span class="button-content">本次为第一次登录</span>
		                <?php }?>
		            </a>
		        
		            
                </div>
            </div>
            
            
            

</div>

