<div class="example-box">
	<h3>
	编辑图书信息
	</h3>
	<div class="example-box">
	 <div class="example-code">
        <form id="demo-form-2" action="/manager/addBook" class="col-md-10 center-margin" method="POST" enctype="multipart/form-data">
        	<input type="hidden" value="<?=$editBook['book-id']?>" name="id"> 
        	<div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        书名:
	                        <span class="required">*</span>
	                    </label>
	                </div>
	                <div class="form-input col-md-6">
						<input type="text" id="bookName" value='<?=$editBook['book-name']?>' name="bookName">                
	                </div>
                </div>
                
            </div>
            <div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        作者:
	                        <span class="required">*</span>
	                    </label>
	                </div>
	                <div class="form-input col-md-6">
						<input type="text" id="author" value='<?=$editBook['author']?>' name="author">                
	                </div>
                </div>
                
            </div>
            <div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        出版社:
	                        <span class="required">*</span>
	                    </label>
	                </div>
	                <div class="form-input col-md-6">
						<input type="text" id="publishing" value='<?=$editBook['publishing']?>' name="publishing">                
	                </div>
                </div>
                
            </div>
            
            
            <div class="form-row">
            		<div class="form-label col-md-2">
	                    <label for="">
	                        类别:
	                    </label>
	                </div>
           			<div class="form-input col-md-6">
						<input type="text" id="categoryId" value='<?=$editBook['category-id']?>' name="categoryId">                
	                </div>
            
       		</div>
       		<div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        价格:
	                        <span class="required">*</span>
	                    </label>
	                </div>
	                <div class="form-input col-md-6">
						<input type="text" id="price" value='<?=$editBook['price']?>' name="price">                
	                </div>
                </div>
                
            </div>
            
            <div class="form-row">
        		<div>
	                <div class="form-label col-md-2">
	                    <label for="">
	                        入库数:
	                        <span class="required">*</span>
	                    </label>
	                </div>
	                <div class="form-input col-md-6">
						<input type="text" id="quantityIn" value='<?=$editBook['quantity-in']?>' name="quantityIn">                
	                </div>
                </div>
                
            </div>
            
             <div class="form-row">
	                <div class="form-label col-md-2">
	                    <label for="">
	                        图书封面:
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
