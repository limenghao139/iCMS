<?php /**
 * @package iCMS
 * @copyright 2007-2017, iDreamSoft
 * @license http://www.idreamsoft.com iDreamSoft
 * @author coolmoo <idreamsoft@qq.com>
 */
defined('iPHP') OR exit('What are you doing?');
?>
<script type="text/javascript">
$(function(){
    <?php if(iCMS::$config['system']['patch'] && members::is_superadmin()){?>
        window.setTimeout(function(){
            $.getJSON('<?php echo __ADMINCP__;?>=patch&do=check&ajax=1&jt=<?php echo time(); ?>',
                function(json){
                    if(json.code=="0"){
                        return;
                    }
                    iCMS.dialog({
                        content: json.msg,
                        okValue: '马上更新',
                        ok: function () { window.location.href=json.url;},
                        cancelValue: '以后在说',
                        cancel: function () {return true;}
                    });
                }
            );
        },1000);
    <?php } ?>
});
</script>
