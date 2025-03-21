<section class="info" id="info">
    <div class="container">
        <div class="section-body">
            <div class="section-body_prorab">
                <div class="section-body_prorab-img wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <img src="<?php echo e(asset('img/prorab.png')); ?>" alt="">
                </div>
                <div class="section-body_prorab-module wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <h3> Иван Иванов иванович</h3>
                    <p>Цитата о компании, пару слов от самого лица компании. Цитата о компании, пару слов от самого
                        лица компании. </p>
                    <div class="section-body-page__buttons">
                        <button class="blick" onclick="openQuizModal()" >Записаться сейчас <img src="<?php echo e(asset('img/icon/comment.svg ')); ?>"
                                alt=""></button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('home/infocards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
<?php /**PATH C:\OSPanel\domains\yg\resources\views/admin/info.blade.php ENDPATH**/ ?>