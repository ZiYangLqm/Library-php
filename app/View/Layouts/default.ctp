<!DOCTYPE html>
    <html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>图书管理系统</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Favicons -->

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/icons/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/icons/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/icons/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/assets/images/icons/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="/assets/images/icons/favicon.png">

        <!--[if lt IE 9]>
          <script src="/assets/js/minified/core/html5shiv.min.js"></script>
          <script src="/assets/js/minified/core/respond.min.js"></script>
        <![endif]-->

        <!-- Fides Admin CSS Core -->

        <link rel="stylesheet" type="text/css" href="/assets/css/minified/aui-production.min.css">

        <!-- Theme UI -->

        <link id="layout-theme" rel="stylesheet" type="text/css" href="/assets/themes/minified/fides/color-schemes/dark-blue.min.css">

        <!-- Fides Admin Responsive -->

        <link rel="stylesheet" type="text/css" href="/assets/themes/minified/fides/common.min.css">

        <link id="theme-animations" rel="stylesheet" type="text/css" href="/assets/themes/minified/fides/animations.min.css">

        <link rel="stylesheet" type="text/css" href="/assets/themes/minified/fides/responsive.min.css">

        <!-- Fides Admin JS -->

        <script type="text/javascript" src="/assets/js/minified/aui-production.min.js"></script>
        <script type="text/javascript" src="/assets/js/minified/core/raphael.min.js"></script>
<!--         <script type="text/javascript" src="/assets/js/jquery.timers-1.2.js"></script> -->
<!--         <script type="text/javascript" src="/assets/js/minified/widgets/charts-justgage.min.js"></script> -->
<!-- 		<script type="text/javascript" src="/assets/js/public_function.js"></script> -->
		
		<script>
		
// 		function showNoty () {
		
// 			$.post("/manager/queryOrderCount",{"uuid":"","status":3,"remark":""},function(result){
// 		    	var result = eval('('+result+')');
// 		    	var colorClass = '';
// 		    	var msg = "";
// 		    	if(result.totalNum >0){
// 		    		noty({
// 			            text        : '<i class="glyph-icon icon-cog mrg5R"></i>美丽的小羽注意啦注意啦，现在有新的订单啦；好好和客户唠唠啊～～',
// 			            type        : 'warning',
// 			            dismissQueue: true,
// 			            theme: 'agileUI',
// 			            layout      : 'bottom'
// 			        });
// 		    	}else{
// 		    		noty().close();
// 		    	}
	    	
// 	    	});

// 	        return false;
// 	    }
	    
	    //$(document).ready(function(){
	    	//showNoty();
	    	
	    	//$('body').everyTime('30s',showNoty);
	    //});
	    
		</script>

    </head>
    <body>
        

        <div id="loading" class="ui-front loader ui-widget-overlay bg-white opacity-100">
            <img src="/assets/images/loader-dark.gif" alt="">
        </div>

        <div id="page-wrapper" class="demo-example">

            <?php
		        echo $this->element('page_header');
            ?>
            <!-- #page-header -->
			
			<?php
		        echo $this->element('page_sidebar');
            ?>
			<!-- #page-sidebar -->
           
            <div id="page-content-wrapper">
            	<?php if(isset($title)) {?>
                <div id="page-title">

					<h3>
					    Dashboard
					    <small>
					        Some examples to get you started
					    </small>
					</h3>
				</div><!-- #page-title -->
				<?php }?>
				
				
				<?php echo $content_for_layout; ?>
				<!-- #page-content -->
            </div><!-- #page-main -->
        </div><!-- #page-wrapper -->

    </body>
</html>
