<div id="<?php echo e($id ?? 'customModal'); ?>" class="custom-modal">
    <div class="custom-modal-content">
        <div class="custom-modal-header">
            <h5 class="custom-modal-title"><?php echo e($title ?? 'Модальное окно'); ?></h5>
            <span class="custom-modal-close" onclick="hideModal('<?php echo e($id ?? 'customModal'); ?>')">&times;</span>
        </div>
        <div class="custom-modal-body">
            <?php echo e($slot ?? 'Содержимое модального окна'); ?>

        </div>
        <?php if(isset($footer)): ?>
            <div class="custom-modal-footer">
                <?php echo e($footer); ?>

            </div>
        <?php else: ?>
            <div class="custom-modal-footer">
                <button class="admin-btn" onclick="hideModal('<?php echo e($id ?? 'customModal'); ?>')">Закрыть</button>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\OSPanel\domains\yg\resources\views\components\modal.blade.php ENDPATH**/ ?>