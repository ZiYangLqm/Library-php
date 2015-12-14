<div id="page-content" style="min-height: 91px;">
<h3>
	已借阅图书
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
                    <th>借阅日期</th>
                    <th>应还日期</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>

             <?php if (isset($borrowInfo)){foreach( $borrowInfo as $v ){ 
             ?>
                <tr>
                    <td class="font-bold text-left"><?=$v['0']['book-name']?></td>
                    <td class="font-bold text-left">
        					<img height="30" width="30"src="<?=$v['0']['imagUrl']?>">
                    </td>
                    <td class="font-bold text-left"><?=$v['0']['author']?></td>
                    <td class="font-bold text-left"><?=$v['0']['publishing']?></td>
                    <td class="font-bold text-left"><?=$v['0']['category-id']?></td>
                    <td class="font-bold text-left"><?=date('Y-m-d H:i',$v['Borrow']['date-borrow'])?></td>
                    <td class="font-bold text-left"><?=date('Y-m-d',$v['Borrow']['date-return'])?></td>
                    <td>
                    	<?php if ($v['Borrow']['loss']==0){?>
                    	<a data-opacity='60' data-theme='bg-gray' data-style='dark' style='height:25px; line-height:25px;' class='btn x-large primary-bg' href='/user/lossBook/<?=$v['0']['book-id']?>/<?=$v['Borrow']['id']?>'>
                            <span style='line-height:24px; font-size:12px; padding:0 8px;' class='button-content'>挂失</span>
                        </a>
                        <?php }else {?>
                        <a data-opacity='60' data-theme='bg-gray' data-style='dark' style='height:25px; line-height:25px;' bookid='<?=$v['0']['book-id']?>' borrowId='<?=$v['Borrow']['id']?>' class='btn x-large primary-bg disabled' href='javascript:;'>
                            <span style='line-height:24px; font-size:12px; padding:0 8px;' class='button-content1'>已挂失</span>
                        </a>
                        <?php }?>
                        
                    
                    </td>
                </tr>
                <?php }}?>
            </tbody>
        </table>

    </div>
    
</div>

</div>


<script>
$(".button-content1").hover(
	function(){
		$(this).html('取消挂失');
		$(this).parent().attr('href','/user/unLossBook/'+$(this).parent().attr('bookid')+'/'+$(this).parent().attr('borrowId'))
		$(this).parent().addClass('bg-red');
		$(this).parent().removeClass('disabled');
	},
	function(){
		$(this).html('已挂失');
		$(this).parent().addClass('disabled');
		$(this).parent().removeClass('bg-red');
	}
);
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