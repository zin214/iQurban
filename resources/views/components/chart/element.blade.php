<div class="card card-{{ \App\Configuration::where('key','cardColor')->first()->value }}">
    <div class="card-header">
      <h3 class="card-title">{{ $title ?? '' }}</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="chart">
        <canvas id="{{ $id ?? '' }}" style="{{ $style ?? 'min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;' }}"></canvas>
      </div>
    </div>
    <!-- /.card-body -->
  </div>