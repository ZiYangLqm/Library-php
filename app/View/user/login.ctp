<!DOCTYPE html>
    <html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>图书用户登陆系统</title>
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

<!--         <link rel="stylesheet" type="text/css" href="/assets/themes/fides/common.css"> -->
<!--         <link rel="stylesheet" type="text/css" href="/assets/themes/fides/responsive.css"> -->

        <!-- Fides Admin JS -->

        <script type="text/javascript" src="/assets/js/minified/aui-production.min.js"></script>
		<script>
		
		$(document).ready(function(){
		
		
		});
		</script>
    </head>
    <body>
        

        <div id="loading" class="ui-front loader ui-widget-overlay bg-white opacity-100">
            <img src="/assets/images/loader-dark.gif" alt="">
        </div>

<!--         <div class="theme-customizer"> -->
<!--             <a href="javascript:;" class="change-theme-btn" title="Change theme"> -->
<!--                 <i class="glyph-icon icon-cog"></i> -->
<!--             </a> -->
<!--             <div class="theme-wrapper"> -->

<!--                 <div class="popover-title">Color schemes</div> -->
<!--                 <div class="pad10A clearfix change-layout-theme"> -->
<!--                     <p class="font-gray-dark font-size-11 pad0B">More color schemes will be available soon!</p> -->
<!--                     <div class="divider mrg10T mrg10B"></div> -->
<!--                     <a href="javascript:;" class="choose-theme" layout-theme="dark-blue" title=""> -->
                        <span style="background: #2381E9;"></span>
<!--                     </a> -->
<!-- <!--                         <a href="javascript:;" class="choose-theme opacity-30" layout-theme="white-blue" title=""> -->
<!--                         <span style="background: #2381E9;"></span> -->
<!--                     </a> --> -->
<!--                     <a href="javascript:;" class="choose-theme" layout-theme="dark-green" title="D"> -->
                        <span style="background: #78CE12;"></span>
<!--                     </a> -->
<!-- <!--                         <a href="javascript:;" class="choose-theme opacity-30" layout-theme="white-green" title="D"> -->
<!--                         <span style="background: #78CE12;"></span> -->
<!--                     </a> --> -->
<!--                     <a href="javascript:;" class="choose-theme" layout-theme="dark-orange" title=""> -->
                        <span style="background: #FF6041;"></span>
<!--                     </a> -->
<!-- <!--                         <a href="javascript:;" class="choose-theme opacity-30" layout-theme="white-orange" title=""> -->
<!--                         <span style="background: #FF6041;"></span> -->
<!--                     </a> --> -->
<!--                     <a href="javascript:;" class="choose-theme" layout-theme="inverse-blue" title=""> -->
                        <span style="background: #20242A;"></span>
<!--                     </a> -->
<!--                     <a href="javascript:;" class="choose-theme" layout-theme="dark-gray" title=""> -->
                        <span style="background: #646464;"></span>
<!--                     </a> -->
<!--                 </div> -->
<!--                 <div class="popover-title">Layout options</div> -->
<!--                 <div class="pad10A clearfix"> -->
<!--                     <a class="fluid-layout-btn hidden bg-blue-alt medium btn" href="javascript:;" title=""><span class="button-content">Full width layout</span></a> -->
<!--                     <a class="boxed-layout-btn bg-blue-alt medium btn" href="javascript:;" title=""><span class="button-content">Boxed layout</span></a> -->

<!--                     <a class="enable-animations hidden bg-blue-alt medium btn" href="javascript:;" title=""><span class="button-content">Enable animations</span></a> -->
<!--                     <a class="disable-animations bg-blue-alt medium btn" href="javascript:;" title=""><span class="button-content">Disable animations</span></a> -->
<!--                 </div> -->
<!--                 <div class="popover-title">Boxed layout backgrounds</div> -->
<!--                 <div class="pad10A clearfix"> -->
                    <a href="javascript:;" class="choose-bg" boxed-bg="#000" style="background: #000;" title=""></a>
                    <a href="javascript:;" class="choose-bg" boxed-bg="#333" style="background: #333;" title=""></a>
<!--                    <a href="javascript:;" class="choose-bg" boxed-bg="#666" style="background: #666;" title=""></a>-->
<!--                    <a href="javascript:;" class="choose-bg" boxed-bg="#888" style="background: #888;" title=""></a>-->
<!--                    <a href="javascript:;" class="choose-bg" boxed-bg="#383d43" style="background: #383d43;" title=""></a>-->
<!--                    <a href="javascript:;" class="choose-bg" boxed-bg="#fafafa" style="background: #fafafa; border: #ccc solid 1px;" title=""></a>-->
<!--                    <a href="javascript:;" class="choose-bg" boxed-bg="#fff" style="background: #fff; border: #eee solid 1px;" title=""></a>-->
<!--                 </div> -->

<!--             </div> -->
<!--         </div> -->

<img src="/assets/images/login-bg.png" class="login-img" alt="">
<div class="ui-widget-overlay bg-black opacity-60"></div>
    
<div id="login-page">
<!--  	<form action="/index/login" method="POST"> -->
 	<form id="demo-form-2" method="POST"  name="bindform">

        <div class="ui-dialog col-md-4 center-margin form-vertical modal-dialog" id="login-form">
            <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                <span class="ui-dialog-title">图书用户登陆系统</span>
            </div>
            <div class="pad20A pad0B ui-dialog-content ui-widget-content">
            	<div class="infobox clearfix infobox-close-wrapper success-bg mrg20B" style="<?php if(isset($error)){echo '';} else {echo 'display:none;';}  ?>">
                    <a href="#" title="Close Message" class="glyph-icon infobox-close icon-remove"></a>
                    <p id="infobox_content"><?php if(isset($error)){echo $error;} else {echo '';}  ?></p>
                </div>
                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="">
                            读者账户:
                        </label>
                    </div>
                    <div class="form-input col-md-10">
                        <div class="form-input-icon">
                            <i class="glyph-icon icon-envelope-o ui-state-default"></i>
                            <input placeholder="请输入账户" type="text" name="account" id="account" data-trigger="keyup" data-required="true" class="parsley-validated">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="">
                            密码:
                        </label>
                    </div>
                    <div class="form-input col-md-10">
                        <div class="form-input-icon">
                            <i class="glyph-icon icon-unlock-alt ui-state-default"></i>
                            <input placeholder="请输入密码(默认手机号后6位)" type="password" name="password" id="password"  data-trigger="change" data-required="true" class="parsley-validated">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-checkbox-radio col-md-6">
                        <input type="checkbox" class="custom-checkbox" name="remember-password" id="remember-password">
                        <label for="remember-password" class="pad5L">记住密码?</label>
                    </div>
                    <div class="form-checkbox-radio text-right col-md-6">
                        <a href="#" class="toggle-switch" switch-target="#login-forgot" switch-parent="#login-form" title="Recover password">忘记密码</a>
                    </div>
                </div>
            </div>
            <div class="ui-dialog-buttonpane text-center">
                <button type="submit" class="btn large primary-bg text-transform-upr font-bold font-size-11 radius-all-4" id="demo-form-valid" data-layout="top" data-type="success" onclick="javascript:if($('#demo-form-2').parsley( 'validate' ))bindform.submit();" title="登录">
                   <span class="button-content">
                        登陆
                    </span>
                </button>
            </div>
        </div>

        <div class="ui-dialog col-md-4 center-margin form-vertical modal-dialog mrg15T hide" id="login-forgot">
            <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                <span class="ui-dialog-title">Recover password</span>
            </div>
            <div class="pad20A ui-dialog-content ui-widget-content">
                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="">
                            Email address:
                        </label>
                    </div>
                    <div class="form-input col-md-10">
                        <div class="form-input-icon">
                            <i class="glyph-icon icon-envelope-o ui-state-default"></i>
                            <input placeholder="Email address" type="text" name="" id="">
                        </div>
                    </div>
                </div>


            </div>
            <div class="ui-dialog-buttonpane text-center">
                <button type="submit" class="btn large primary-bg radius-all-4" id="demo-form-valid" onclick="javascript:$(&apos;#demo-form&apos;).parsley( &apos;validate&apos; );" title="Validate!">
                    <span class="button-content">
                        Recover Password
                    </span>
                </button>
                <a href="javascript:;" switch-target="#login-form" switch-parent="#login-forgot" class="btn large transparent no-shadow toggle-switch font-bold font-size-11 radius-all-4" id="demo-form-valid" onclick="javascript:$(&apos;#demo-form&apos;).parsley( &apos;validate&apos; );" title="Validate!">
                    <span class="button-content">
                        Cancel
                    </span>
                </a>
            </div>
        </div>

    </form>

</div>


    </body>
</html>