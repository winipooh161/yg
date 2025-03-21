
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <section class="projects" id="projects">
        <div class="container">
            <div class="title">
                <h2 class="wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    Только за 2024 год сделали ремонт <br> в 50+ объектах по всей<span class="color-text"> Ростовской области </span>
                </h2>
                <p class="wow fadeInDown" data-wow-duration="1.2s" data-wow-delay="1.2s">
                    <strong>Профессиональный</strong> ремонт с многоступенчатым <strong>контролем качества,</strong> <br>
                    опытными специалистами и <strong>выгодными ценами</strong> без посредников
                </p>
            </div>
            
            <div class="projects-grid">
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('projects.show', $project->id)); ?>" class="project-card-link">
                    <div class="section-body_infocards__card wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="<?php echo e(0.2 * $loop->iteration); ?>s">
                        <div class="section-body_infocards__card-img">
                            <img src="<?php echo e(asset($project->image)); ?>" alt="<?php echo e($project->title); ?>">
                        </div>
                        <div class="section-body_infocards__card-info">
                            <h4><?php echo e($project->title); ?></h4>
                            <ul class="section-body_infocards__card-info__swiper">
                                <li>
                                    <p>Площадь</p>
                                    <h3><?php echo e($project->area); ?></h3>
                                </li>
                                <li>
                                    <p>Сроки</p>
                                    <h3><?php echo e($project->time); ?></h3>
                                </li>
                            </ul>
                        </div>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    
    <?php echo $__env->make('layouts/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\yg\resources\views/projects/index.blade.php ENDPATH**/ ?>