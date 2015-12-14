<script src="/datetimepicker/jquery.datetimepicker.js"></script>
<link rel="stylesheet" type="text/css" href="/datetimepicker/jquery.datetimepicker.css">
<style type="text/css">
.clear { display: none; position: absolute; width: 24px; height: 24px; margin: 6px 0 0 -20px; background: url(/datetimepicker/clear.png?1) no-repeat; outline: none; }
</style>

<script>
$(document).ready(function(){
	$('#birthday').datetimepicker({lang:'ch',timepicker:false,format:'Y-m-d'});
	$("#birthday").bind("click",function(){
		$("#birthday"+"a").show();
	});
});



function clearValue(obj){
	$("#"+obj).val('');
	$("#"+obj+"a").hide();
}
</script>

<div class="example-box">
	<h3>
	编辑读者信息
	</h3>
	<div class="example-box">
	 <div class="example-code">
        <form id="demo-form-2" action="/manager/addReader" class="col-md-10 center-margin" method="POST" enctype="multipart/form-data">
        	<input type="hidden" value="<?=$editReader['reader-id']?>" name="id"> 
        	<div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        姓名:
	                        <span class="required">*</span>
	                    </label>
	                </div>
	                <div class="form-input col-md-4">
						<input type="text" id="ReaderName" value='<?=$editReader['reader-name']?>' name="ReaderName">                
	                </div>
                </div>
                
            </div>
            <div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        性别:
	                        <span class="required">*</span>
	                    </label>
	                </div>
	                <div class="form-input col-md-2">
                    	<select data-placeholder="权限等级" id="sex" name="sex"  class="chosen-select" >
                        	<option value="男" <?=$editReader['sex']=='男'?'selected':''?>>男</option> 
                        	<option value="女" <?=$editReader['sex']=='女'?'selected':''?>>女</option> 
                    	</select>
                    </div>
                </div>
                
            </div>
            <div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        生日:
	                        <span class="required">*</span>
	                    </label>
	                </div>
	                <div class="form-input col-md-4">
						<input type="text" id="birthday" value='<?=$editReader['birthday']?>' name="birthday" placeholder="申请时间" > 
						<a class="clear" id="birthdaya" href="javascript:clearValue('birthday');" style="top:1px; right:12px;"></a>               
	                </div>
                </div>
                
            </div>
            
            
            <div class="form-row">
            		<div class="form-label col-md-2">
	                    <label for="">
	                        手机:
	                    </label>
	                </div>
           			<div class="form-input col-md-4">
						<input type="text" id="phone" value='<?=$editReader['phone']?>' name="phone">                
	                </div>
            
       		</div>
       		<div class="form-row">
            		<div class="form-label col-md-2">
	                    <label for="">
	                        电话:
	                    </label>
	                </div>
           			<div class="form-input col-md-4">
						<input type="text" id="Mobile" value='<?=$editReader['Mobile']?>' name="Mobile">                
	                </div>
            
       		</div>
       		 <div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        证件:
	                        <span class="required">*</span>
	                    </label>
	                </div>
	                <div class="form-input col-md-2">
                    	<select data-placeholder="权限等级" id="cardName" name="cardName"  class="chosen-select" >
                        	<option value="身份证" <?=$editReader['card-name']=='身份证'?'selected':''?>>身份证</option> 
                        	<option value="学生证" <?=$editReader['card-name']=='学生证'?'selected':''?>>学生证</option> 
                    	</select>
                    </div>
                </div>
                
            </div>
       		<div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        证件号码:
	                        <span class="required">*</span>
	                    </label>
	                </div>
	                <div class="form-input col-md-4">
						<input type="text" id="cardId" value='<?=$editReader['card-id']?>' name="cardId">                
	                </div>
                </div>
                
            </div>
            
             <div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        等级:
	                        <span class="required">*</span>
	                    </label>
	                </div>
	                <div class="form-input col-md-2">
                    	<select data-placeholder="权限等级" id="level" name="level"  class="chosen-select" >
                        	<option value="9" <?=$editReader['level']==9?'selected':''?>>普通</option> 
                        	<option value="8" <?=$editReader['level']==8?'selected':''?>>银卡</option> 
                        	<option value="7" <?=$editReader['level']==7?'selected':''?>>金卡</option> 
                    	</select>
                    </div>
                </div>
                
            </div>
            
             <div class="form-row">
	                <div class="form-label col-md-2">
	                    <label for="">
	                        头像:
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
	var bookName = $("#bookName").val();
	var author =$("#author").val();
	var publishing = $("#publishing").val();
	var categoryId =$("#categoryId").val();
	var price = $("#price").val();
	var quantityIn =$("#quantityIn").val();
	if (bookName == ''){
		alert("请输入书名");
		return false;
	}else if(author==""){
		alert("请输入作者");
		return false;
	}else if(publishing==""){
		alert("请输入出版社");
	}else if(categoryId==""){
		alert("请输入类别");
	}else if(price==""){
		alert("请输入价格");
	}else if(quantityIn==""){
		alert("请输入入库数");
	}
	$('#demo-form-2').submit();
}

</script>
