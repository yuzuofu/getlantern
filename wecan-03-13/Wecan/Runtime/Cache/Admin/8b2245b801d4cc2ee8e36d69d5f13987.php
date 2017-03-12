<?php if (!defined('THINK_PATH')) exit();?><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">删除餐桌</h4>
</div>
<div class="modal-body">
    <form action="<?php echo U('Desk/delete');?>" method="post">
        <p>确定删除桌号为<?php echo ($name); ?>餐桌吗?</p>
        <input type="hidden" name="id" value="<?php echo ($id); ?>" />
        <button class="btn btn-primary" type="submit">确定</button>
    </form>
</div>