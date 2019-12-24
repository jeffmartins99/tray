<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Relatório Filmes mais Votados</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    
                    <?php if($insert == 'limite'): ?>
                        <p style="color:red">Quantidade de votos excedidas</p>
                    <?php elseif($insert == true): ?>
                        <p style="color:green">Voto Computado com Sucesso!!</p>
                    <?php else: ?>
                        <p style="color:red">Erro ao Votar!!</p>
                    <?php endif; ?>

                   
                    
                    <div class="content">
                        <div class=" m-b-md">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Episódio</th>
                                        <th scope="col">Diretor</th>
                                        <th scope="col">Ano</th>
                                        <th scope="col">Like</th>
                                        <th scope="col">Dislike</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=0;//substr($a->url,13,17)
                                    ?>
                                    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <?php if($i < 2): ?>
                                                <th scope="row"><a href="<?php echo e(url('/detalhe', ['detalhe' => $a->episode])); ?>" ><?php echo e($a->title); ?></a></th>
                                            <?php else: ?>
                                                <th scope="row"><?php echo e($a->title); ?></th>
                                            <?php endif; ?>
                                            <td><?php echo e($a->episode); ?></td>
                                            <td><?php echo e($a->diretor); ?></td>
                                            <td><?php echo e($a->ano); ?></td>
                                            <td><?php echo e($a->like); ?></td>
                                            <td><?php echo e($a->dislike); ?></td>
                                        </tr>
                                        <?php
                                            $i++;
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tray\resources\views//home.blade.php ENDPATH**/ ?>