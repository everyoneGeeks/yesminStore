    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?php echo e($subTitle); ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
       <?php echo e($slot); ?>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
         <?php echo e($footer ?? ''); ?>

        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>