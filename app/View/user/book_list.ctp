<div id="page-content" style="min-height: 91px;">
<h3>
	图书列表
</h3>

<div class="example-box">
    <div class="example-code">

        <table class="table table-condensed" id="example122">
            <thead>
                <tr>
                    <th>书名</th>
                    <th>封面</th>
                    <th>作者</th>
                    <th>出版社</th>
                    <th>类别</th>
                    <th>入库数</th>
                    <th>剩余数</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>

             <?php if (isset($allBook)){foreach( $allBook as $v ){ 
             	$remainBook = $v['Book']['quantity-in']-$v['Book']['quantityOut']-$v['Book']['quantityLoss'];
             ?>
                <tr>
                    <td class="font-bold text-left"><?=$v['Book']['book-name']?></td>
                    <td class="font-bold text-left">
        					<img height="30" width="30"src="<?=$v['Book']['imagUrl']?>">
                    </td>
                    <td class="font-bold text-left"><?=$v['Book']['author']?></td>
                    <td class="font-bold text-left"><?=$v['Book']['publishing']?></td>
                    <td class="font-bold text-left"><?=$v['Book']['category-id']?></td>
                    <td class="font-bold text-left"><?=$v['Book']['quantity-in']?></td>
                    <td class="font-bold text-left"><?=$remainBook?></td>
                    <td>
                    
                    	<a data-opacity='60' data-theme='bg-gray' data-style='dark' style='height:25px; line-height:25px;' class='btn x-large primary-bg <?=$remainBook>0?'':'disabled'?>' href='<?=$remainBook>0?'/user/borrowBook/'.$v['Book']['book-id']:'javascript:;'?>'>
                            <span style='line-height:24px; font-size:12px; padding:0 8px;' class='button-content'>借阅</span>
                        </a>
                        
                    
                    </td>
                </tr>
                <?php }}?>
            </tbody>
        </table>

    </div>
    
</div>

</div>


<script>
$(function(){
    $("#example122").dataTable({
        sScrollY:500,
        bJQueryUI:!0,
        sPaginationType:"full_numbers",
        aaSorting:[ [1, 'asc'], [0, 'desc'] ],
        "oLanguage": {
            "sUrl": "/assets/cn.txt"
        },
        aLengthMenu:[20,40,100],
        iDisplayLength:20,
    }),
    $(".dataTable .ui-icon-carat-2-n").addClass("icon-sort-up"),
    $(".dataTable .ui-icon-carat-2-s").addClass("icon-sort-down"),
    $(".dataTable .ui-icon-carat-2-n-s").addClass("icon-sort"),
    $(".dataTables_paginate a.first").html('<i class="icon-caret-left"></i>'),
    $(".dataTables_paginate a.previous").html('<i class="icon-angle-left"></i>'),
    $(".dataTables_paginate a.last").html('<i class="icon-caret-right"></i>'),
    $(".dataTables_paginate a.next").html('<i class="icon-angle-right"></i>')
});
</script>