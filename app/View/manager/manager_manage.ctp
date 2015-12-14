<div id="page-content" style="min-height: 91px;">
<h3>
	管理员管理
</h3>
<div class="example-box">
    <div class="example-code">

        <table class="table table-condensed" id="example122">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>管理员账户</th>
                    <th>头像</th>
                    <th>权限等级</th>
                    <th>创建者</th>
                    <th>创建时间</th>
                    <th>上次登录时间</th>
                    <th>操作</th>
                    
                </tr>
            </thead>
            <tbody>

             <?php foreach( $allAdmin as $v ){ 
             	if ($v['Admin']['id'] != $myInfo['id']){
             ?>
                <tr>
                    <td class="font-bold text-left"><?=$v['Admin']['id']?></td>
                    <td class="font-bold text-left"><?=$v['Admin']['account'] ?></td>
                    <td class="font-bold text-left">
        					<img height="30" width="30"src="<?=$v['Admin']['imagUrl']?>">
                    </td>
                    <td class="font-bold text-left">
                     <a data-opacity='60' data-theme='bg-gray' data-style='dark' style='height:25px; line-height:25px;' title='' class='btn x-large <?=($myInfo['level'] > $v['Admin']['level'])?'bg-orange':'bg-gray-alt'?>'>
                    <?=$v['Admin']['level']?>
                    </a>
                    </td>
                    <td class="font-bold text-left"><?=$v['Admin']['create_admin']?></td>
                    <td class="font-bold text-left"><?=date('Y-m-d H:i',$v['Admin']['create_time']) ?></td>
                    <td class="font-bold text-left"><?=empty($v['Admin']['login_time'])?'未登录':date('Y-m-d H:i',$v['Admin']['login_time'])?></td>
                    <td>
                    
                    	<a data-opacity='60' data-theme='bg-gray' data-style='dark' style='height:25px; line-height:25px;' title='' class='btn x-large primary-bg <?=($myInfo['level'] > $v['Admin']['level'])?'disabled':''?>' href='<?=($myInfo['level'] <= $v['Admin']['level'])?'/manager/editManager/'.$v['Admin']['id']:'javascript:;'?>'>
                            <span style='line-height:24px; font-size:12px; padding:0 8px;' class='button-content'>编辑</span>
                        </a>
                        
                        <a data-opacity='60' data-theme='bg-gray' data-style='dark' style='height:25px; line-height:25px;' title='' class='btn x-large bg-red <?=($myInfo['level'] > $v['Admin']['level'])?'disabled':''?>' href='<?=($myInfo['level'] <= $v['Admin']['level'])?'/manager/deleteManager/'.$v['Admin']['id']:'javascript:;'?>'>
                            <span style='line-height:24px; font-size:12px; padding:0 8px;' class='button-content'>删除</span>
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