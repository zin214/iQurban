<div class="filtr-item col-sm-4" data-category="{{ $category ?? '' }}" data-sort="{{ $sortCategory ?? '' }}">
    <a href='{{ $getUrl }}' data-toggle="lightbox" data-title="{{ $title ?? '' }}" data-type="{{ $type ?? '' }}">
      <img src='{{ $type == 'image' ? $getUrl : $thumbnail }}' class="img-fluid mb-2" alt="{{ $sortCategory ?? '' }}"/>
        {{ $slot }}
    </a>
  </div>
