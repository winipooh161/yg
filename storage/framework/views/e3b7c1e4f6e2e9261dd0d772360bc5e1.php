<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <style>
        body {
            padding-top: 60px;
            font-family: 'Onest', sans-serif;
        }
        .admin-panel {
            background-color: #343a40;
            color: #fff;
            padding: 15px 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10000;
        }
        .admin-panel__content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        .admin-welcome {
            font-size: 16px;
        }
        .admin-links a {
            color: #ffc107;
            font-size: 16px;
            margin-left: 20px;
            text-decoration: none;
        }
        .admin-links a:hover {
            color: #fd7e14;
        }
    </style>
</head>
<body>
    <div class="admin-panel">
        <div class="admin-panel__content">
            <div class="admin-welcome">
                Добро пожаловать, <?php echo e(Auth::user()->name ?? 'Администратор'); ?>!
            </div>
            <div class="admin-links">
                <a href="<?php echo e(route('admin.dashboard')); ?>">Главная</a>
                <a href="<?php echo e(route('feedback.index')); ?>">Отзывы</a>
                <a href="<?php echo e(route('admin.projects')); ?>">Проекты</a>
                <a href="<?php echo e(route('admin.messages')); ?>">Сообщения</a>
                <a href="<?php echo e(route('admin.users')); ?>">Пользователи</a>
                <a href="<?php echo e(route('welcome')); ?>">На сайт</a>
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Выход
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\OSPanel\domains\yg\resources\views\layouts\admin.blade.php ENDPATH**/ ?>