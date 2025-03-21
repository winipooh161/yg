

<?php $__env->startSection('content'); ?>
<div class="admin-container">

    <div class="admin-card">
        <div class="admin-dashboard">
            <h1 class="dashboard-title wow fadeInUp">Административная панель</h1>
            <div class="stats">
                <div class="stat">
                    <div class="stat-header">Пользователи</div>
                    <div class="stat-number spanAnim"><?php echo e($usersCount); ?></div>
                    <div class="stat-footer">
                        <a href="<?php echo e(route('admin.users')); ?>" class="admin-btn admin-btn--link">Управление</a>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-header">Проекты</div>
                    <div class="stat-number spanAnim"><?php echo e($projectsCount); ?></div>
                    <div class="stat-footer">
                        <a href="<?php echo e(route('admin.projects')); ?>" class="admin-btn admin-btn--link">Управление</a>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-header">Отзывы</div>
                    <div class="stat-number spanAnim"><?php echo e($feedbackCount); ?></div>
                    <div class="stat-footer">
                        <a href="<?php echo e(route('feedback.index')); ?>" class="admin-btn admin-btn--link">Управление</a>
                    </div>
                </div>
            </div>
            <div class="actions flex-between" style="margin-top:20px;">
                <div class="action wow fadeInLeft">
                    <h2>Добавить новый проект</h2>
                    <p>Создайте новый проект</p>
                    <a href="<?php echo e(route('admin.projects.create')); ?>" class="admin-btn">Добавить проект</a>
                </div>
                <div class="action wow fadeInRight">
                    <h2>Просмотреть сообщения</h2>
                    <p>Проверьте новые сообщения</p>
                    <a href="<?php echo e(route('admin.messages')); ?>" class="admin-btn">Посмотреть</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.adm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\yg\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>