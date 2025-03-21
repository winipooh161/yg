

<?php $__env->startSection('content'); ?>
<div class="admin-container">
    <h1 class="admin-title">Управление сообщениями</h1>

    <?php if(session('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>

    <div class="admin-card">
        <div class="card-header">
            <h2>Список сообщений</h2>
        </div>
        <div class="card-body">
            <?php if(isset($messages) && count($messages) > 0): ?>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Сообщение</th>
                            <th>Дата</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($message->id); ?></td>
                                <td><?php echo e($message->name); ?></td>
                                <td><?php echo e($message->email); ?></td>
                                <td><?php echo e($message->phone ?? 'Не указан'); ?></td>
                                <td class="message-text"><?php echo e(Str::limit($message->message, 50)); ?></td>
                                <td><?php echo e($message->created_at->format('d.m.Y H:i')); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm" 
                                            data-id="<?php echo e($message->id); ?>" 
                                            data-message="<?php echo e($message->message); ?>"
                                            onclick="viewMessage(this)">
                                            Просмотр
                                        </button>
                                        <form action="<?php echo e(route('admin.messages.destroy', $message->id)); ?>" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить это сообщение?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Сообщений пока нет.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Модальное окно для просмотра сообщения -->
<div id="messageModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Просмотр сообщения</h5>
            <span class="close" onclick="closeMessageModal()">&times;</span>
        </div>
        <div class="modal-body">
            <div id="fullMessage"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeMessageModal()">Закрыть</button>
        </div>
    </div>
</div>

<script>
    function viewMessage(element) {
        const message = element.getAttribute('data-message');
        document.getElementById('fullMessage').textContent = message;
        document.getElementById('messageModal').style.display = 'flex';
    }

    function closeMessageModal() {
        document.getElementById('messageModal').style.display = 'none';
    }

    // Закрытие модального окна при клике вне содержимого
    window.onclick = function(event) {
        const modal = document.getElementById('messageModal');
        if (event.target == modal) {
            closeMessageModal();
        }
    }
</script>

<style>
    .message-text {
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        cursor: pointer;
    }
    
    .message-text:hover {
        color: #CD602C;
        text-decoration: underline;
    }
    
    #messageModal {
        display: none;
        position: fixed;
        z-index: 1050;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        justify-content: center;
        align-items: center;
    }
    
    #fullMessage {
        white-space: pre-line;
        line-height: 1.7;
        font-size: 1rem;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\yg\resources\views\admin\messages.blade.php ENDPATH**/ ?>