
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <section class="project-detail" id="project-detail">
        <div class="container">
            <div class="project-header">
                <div class="project-header__title">
                    <div class="section-body-page__info wow fadeInLeft blick" data-wow-duration="2s" data-wow-delay="2s">
                        <p>По 02.02.2025 скидка на все 5%</p>
                    </div>
                    <h1 class="wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <?php echo e($project->title); ?>

                    </h1>
                    <div class="description-content wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <?php echo nl2br(e($project->description)); ?>

                    </div>
                    <div class="project-meta wow fadeInDown" data-wow-duration="0.8s" data-wow-delay="0.8s">
                        <div class="project-meta-item">
                            <span>Площадь</span>
                            <strong><?php echo e($project->area); ?></strong>
                        </div>
                        <div class="project-meta-item">
                            <span>Сроки</span>
                            <strong><?php echo e($project->time); ?></strong>
                        </div>
                        <?php if($project->price): ?>
                        <div class="project-meta-item">
                            <span>Стоимость работы</span>
                            <strong><?php echo e($project->price); ?> руб</strong>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="section-body-page__buttons wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay="1.2s">
                        <button class="case_button"> <img src="<?php echo e(asset('img/icon/radio.svg')); ?>" alt=""> Еще  кейсы</button>
                        <button class="blick" onclick="openQuizModal()">Хочу тоже! <img src="<?php echo e(asset('img/icon/comment.svg ')); ?>"
                                alt=""></button>
                    </div>
                   
                </div>
                  
            <div class="project-main-image wow fadeInDown" data-wow-duration="1s" data-wow-delay="1s">
                <img src="<?php echo e(asset($project->image)); ?>" alt="<?php echo e($project->title); ?>">
            </div>
            
            </div>
         
         
            
            <?php if(count($galleryImages) > 0): ?>
            <div class="project-gallery wow fadeInDown" data-wow-duration="1.4s" data-wow-delay="1.4s">
                <h2>Галерея проекта</h2>
                
                <div class="project-gallery-slider">
                    <swiper-container class="projectGallerySwiper" pagination="true" slides-per-view="3" slides-per-group="3"
                    space-between="30" grid-rows="3" grid-fill="row">
                        <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <swiper-slide>
                            <div class="gallery-slide">
                                <img src="<?php echo e(asset($image)); ?>" alt="<?php echo e($project->title); ?> - фото <?php echo e($loop->iteration); ?>" 
                                     onclick="openImageModal('<?php echo e(asset($image)); ?>')">
                            </div>
                        </swiper-slide>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </swiper-container>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="section-body-page__buttons section-body-page__buttons-bottom wow fadeInDown" data-wow-duration="1.6s" data-wow-delay="1.6s">
                <a href="<?php echo e(route('projects.index')); ?>" class="back-button">
                    <i class="fas fa-arrow-left"></i> Вернуться к проектам
                </a>
                <button class="blick" onclick="openQuizModal()">Получить консультацию <img src="<?php echo e(asset('img/icon/phone.svg')); ?>" alt=""></button>
            </div>
        </div>
    </section>
 
    <?php echo $__env->make('layouts/quiz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\yg\resources\views/projects/show.blade.php ENDPATH**/ ?>