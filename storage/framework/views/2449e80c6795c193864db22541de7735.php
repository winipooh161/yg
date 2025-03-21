

<?php $__env->startSection('content'); ?>
<div class="admin-container">
    <h1 class="admin-title wow fadeInDown">Модерация отзывов</h1>
    
    <?php if(session('message')): ?>
        <div class="admin-alert-success">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>
    
    <div class="admin-tabs">
        <ul class="admin-nav-tabs">
            <li class="admin-nav-tab active" data-target="pending">
                Неодобренные отзывы <span class="admin-badge-warning"><?php echo e($feedbacks->where('approved', false)->count()); ?></span>
            </li>
            <li class="admin-nav-tab" data-target="approved">
                Одобренные отзывы <span class="admin-badge-success"><?php echo e($feedbacks->where('approved', true)->count()); ?></span>
            </li>
        </ul>
    </div>
    
    <div class="admin-card wow fadeInUp">
        <div class="admin-tab-content" id="pending">
            <?php if($feedbacks->where('approved', false)->count() > 0): ?>
                <div class="feedback-list">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Отзыв</th>
                                <th>Дата</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $feedbacks->where('approved', false); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($feedback->id); ?></td>
                                <td><?php echo e($feedback->name); ?></td>
                                <td><?php echo e($feedback->email); ?></td>
                                <td class="feedback-text" data-feedback="<?php echo e($feedback->comment); ?>">
                                    <?php echo e(Str::limit($feedback->comment, 50)); ?>

                                </td>
                                <td data-sort="<?php echo e($feedback->created_at->timestamp); ?>">
                                    <?php echo e($feedback->created_at->format('d.m.Y H:i')); ?>

                                </td>
                                <td class="actions">
                                    <form action="<?php echo e(route('feedback.approve', $feedback->id)); ?>" method="POST" class="inline-form">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="admin-btn admin-btn--success">Одобрить</button>
                                    </form>
                                    <button class="admin-btn admin-btn--danger delete-btn" 
                                            data-id="<?php echo e($feedback->id); ?>" 
                                            data-name="<?php echo e($feedback->name); ?>">Удалить</button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="no-feedback">Нет отзывов, ожидающих модерации.</p>
            <?php endif; ?>
        </div>
        
        <div class="admin-tab-content" id="approved" style="display:none;">
            <?php if($feedbacks->where('approved', true)->count() > 0): ?>
                <div class="feedback-list">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Отзыв</th>
                                <th>Дата</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $feedbacks->where('approved', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($feedback->id); ?></td>
                                <td><?php echo e($feedback->name); ?></td>
                                <td><?php echo e($feedback->email); ?></td>
                                <td class="feedback-text" data-feedback="<?php echo e($feedback->comment); ?>">
                                    <?php echo e(Str::limit($feedback->comment, 50)); ?>

                                </td>
                                <td data-sort="<?php echo e($feedback->created_at->timestamp); ?>">
                                    <?php echo e($feedback->created_at->format('d.m.Y H:i')); ?>

                                </td>
                                <td class="actions">
                                    <form action="<?php echo e(route('feedback.disapprove', $feedback->id)); ?>" method="POST" class="inline-form">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="admin-btn admin-btn--warning">Отозвать одобрение</button>
                                    </form>
                                    <button class="admin-btn admin-btn--danger delete-btn" 
                                            data-id="<?php echo e($feedback->id); ?>" 
                                            data-name="<?php echo e($feedback->name); ?>">Удалить</button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="no-feedback">Нет одобренных отзывов.</p>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Модальное окно для просмотра полного отзыва -->
    <div class="custom-modal" id="feedbackModal">
        <div class="custom-modal-content">
            <div class="custom-modal-header">
                <h5 class="custom-modal-title">Полный текст отзыва</h5>
                <span class="custom-modal-close">&times;</span>
            </div>
            <div class="custom-modal-body">
                <p id="fullFeedbackText"></p>
            </div>
            <div class="custom-modal-footer">
                <button class="admin-btn" onclick="hideModal('feedbackModal')">Закрыть</button>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно подтверждения удаления -->
    <div class="custom-modal" id="deleteModal">
        <div class="custom-modal-content">
            <div class="custom-modal-header">
                <h5 class="custom-modal-title">Подтверждение удаления</h5>
                <span class="custom-modal-close">&times;</span>
            </div>
            <div class="custom-modal-body">
                <p>Вы действительно хотите удалить отзыв от <strong id="deleteName"></strong>?</p>
            </div>
            <div class="custom-modal-footer">
                <button class="admin-btn" onclick="hideModal('deleteModal')">Отмена</button>
                <form id="deleteForm" method="POST" style="display: inline-block;">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="admin-btn admin-btn--danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Простой переключатель вкладок
    document.querySelectorAll('.admin-nav-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.admin-nav-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            const target = this.getAttribute('data-target');
            document.querySelectorAll('.admin-tab-content').forEach(content => {
                content.style.display = content.id === target ? 'block' : 'none';
            });
        });
    });
    
    // Открытие модального окна полного отзыва при клике по тексту
    document.querySelectorAll('.feedback-text').forEach(el => {
        el.style.cursor = 'pointer';
        el.addEventListener('click', function() {
            const feedback = this.getAttribute('data-feedback');
            document.getElementById('fullFeedbackText').innerText = feedback;
            showModal('feedbackModal');
        });
    });
    
    // Подтверждение удаления через модальное окно
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            
            document.getElementById('deleteName').textContent = name;
            document.getElementById('deleteForm').action = "<?php echo e(route('feedback.index')); ?>/" + id;
            
            showModal('deleteModal');
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\yg\resources\views/admin/feedback.blade.php ENDPATH**/ ?>