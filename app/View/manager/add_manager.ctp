<div class="example-box">
	<h3>
	添加管理员账户
	</h3>
	<div class="example-box">
	 <div class="example-code">
        <form id="demo-form-2" action="/manager/addManager" class="col-md-10 center-margin" method="POST" enctype="multipart/form-data">
        	<div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        管理员账户:
	                        <span class="required">*</span>
	                    </label>
	                </div>
	                <div class="form-input col-md-6">
						<input type="text" id="account" name="account">                
	                </div>
                </div>
                
            </div>
            
            <div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        管理员密码:
	                        <span class="required">*</span>
	                    </label>
	                </div>
	                <div class="form-input col-md-6">
						<input type="text" id="password" name="password">                
	                </div>
                </div>
                
            </div>
            <div class="form-row">
            		<div class="form-label col-md-2">
	                    <label for="">
	                        权限等级:
	                    </label>
	                </div>
           			<div class="form-input col-md-2">
                    	<select data-placeholder="权限等级" id="level" name="level"  class="chosen-select" >
                        	<?php for ($i=$myInfo['level']+1; $i<16; $i++){?>
                        	<option value="<?=$i?>"><?=$i?></option> 
                        	<?php }?>
                    	</select>
                    </div>
            
       		</div>
            
             <div class="form-row">
	                <div class="form-label col-md-2">
	                    <label for="">
	                        管理员头像:
	                    </label>
	                </div>
	                <div class="form-label col-md-3" id = "fileup">
	                <input type="file" name="file" id="file" />
	                </div>
        	</div>
            <div class="divider"></div>
            <div class="form-row">
                <div class="form-input col-md-10 col-md-offset-2">
                    <a href="javascript:;" class="btn x-large bg-orange radius-all-4" id="demo-form-2-valid" onclick="javascript:checkAndSubmit();" title="Validate!">
                        <span class="button-content">
                            添加
                        </span>
                    </a>
                    
                </div>
            </div>
              
       
        </form>
        </div>
       </div>
     
      
</div>




<script>
function checkAndSubmit() {
	var account = $("#account").val();
	var password =$("#password").val();
	if (account == ''){
		alert("请输入账户信息");
		return false;
	}else if(password==""){
		alert("请输入密码");
		return false;
	}
	$('#demo-form-2').submit();
}

</script>
