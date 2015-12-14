<div class="example-box">
	<h3>
	编辑管理员账户
	</h3>
	<div class="example-box">
	 <div class="example-code">
        <form id="demo-form-2" action="/manager/editManager" class="col-md-10 center-margin" method="POST">
        	<input type="hidden" value="<?=$editAdmin['id']?>" name="id"> 
        	<div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        管理员账户:
	                    </label>
	                </div>
	                <div class="form-input col-md-6">
						<input type="text" id="account" name="account" value='<?=$editAdmin['account']?>' disabled>                
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
                        	<?php for ($i=$editAdmin['level']+1; $i<16; $i++){?>
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
	                <ul class="imagSavedToDelete">
						<li>
        					<div class="imgbox"><img src="<?=$editAdmin['imagUrl']?>">
               	 			</div>
    					</li>
					</ul>
	                </div>
        	</div>
            <div class="divider"></div>
            <div class="form-row">
                <div class="form-input col-md-10 col-md-offset-2">
                    <a href="javascript:;" class="btn x-large bg-orange radius-all-4" id="demo-form-2-valid" onclick="javascript:checkAndSubmit();" title="Validate!">
                        <span class="button-content">
                            修改
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
	$('#demo-form-2').submit();
}

</script>
