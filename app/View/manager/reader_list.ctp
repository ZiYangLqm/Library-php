<div id="page-content" style="min-height: 91px;">
<h3>
	图书列表
</h3>

<div class="example-box">
    <div class="example-code">

        <table class="table table-condensed" id="example122">
            <thead>
                <tr>
                    <th>姓名</th>
                    <th>头像</th>
                    <th>性别</th>
                    <th>生日</th>
                    <th>办证日期</th>
                    <th>手机号</th>
                    <th>电话号</th>
                    <th>证件</th>
                    <th>证件号</th>
                    <th>会员级别</th>
                   
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>

             <?php if (isset($allReader)){foreach( $allReader as $v ){ ?>
                <tr>
                    <td class="font-bold text-left"><?=$v['Reader']['reader-name']?></td>
                    <td class="font-bold text-left">
        					<img height="40" width="40"src="<?=$v['Reader']['imagUrl']?>">
                    </td>
                    <td class="font-bold text-left"><?=$v['Reader']['sex']?></td>
                    <td class="font-bold text-left"><?=$v['Reader']['birthday']?></td>
                    <td class="font-bold text-left"><?=date('Y-m-d H:i',$v['Reader']['day'])?></td>
                    <td class="font-bold text-left"><?=$v['Reader']['phone']?></td>
                    <td class="font-bold text-left"><?=$v['Reader']['Mobile']?></td>
                    <td class="font-bold text-left"><?=$v['Reader']['card-name']?></td>
                    <td class="font-bold text-left"><?=$v['Reader']['card-id']?></td>
                    <td class="font-bold text-left">
                    <?=$v['Reader']['level']==9?'普通':($v['Reader']['level']==8?'银卡':'金卡')?>
                    </td>
                    <td>
                    
                    	<a data-opacity='60' data-theme='bg-gray' data-style='dark' style='height:25px; line-height:25px;' title='' class='btn x-large primary-bg' href='/manager/editReader/<?=$v['Reader']['reader-id']?>'>
                            <span style='line-height:24px; font-size:12px; padding:0 8px;' class='button-content'>编辑</span>
                        </a>
                        
                        <a data-opacity='60' data-theme='bg-gray' data-style='dark' style='height:25px; line-height:25px;' title='' class='btn x-large bg-red' href='/manager/deleteReader/<?=$v['Reader']['reader-id']?>'>
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