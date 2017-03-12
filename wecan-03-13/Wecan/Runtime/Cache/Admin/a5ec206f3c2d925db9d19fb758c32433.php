<?php if (!defined('THINK_PATH')) exit();?><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">删除菜品</h4>
</div>
<div class="modal-body">
    <form action="<?php echo U('Menu/delete');?>" method="post">
        <p>确定删除菜品名为<?php echo ($menu["name"]); ?>的菜品吗?</p>
        <input type="hidden" name="id" value="<?php echo ($menu["id"]); ?>" />
        <button class="btn btn-primary" type="submit">确定</button>
    </form>
</div>