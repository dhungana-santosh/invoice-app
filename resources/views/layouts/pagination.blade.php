<div class="card-footer clearfix">
  <ul class="pagination pagination-sm m-0 float-right">
    @if ($invoices->onFirstPage())
      <li class="page-item disabled"><span class="page-link">«</span></li>
    @else
      <li class="page-item"><a class="page-link" href="{{ $invoices->previousPageUrl() }}">«</a></li>
    @endif

    @foreach ($invoices->getUrlRange(1, $invoices->lastPage()) as $page => $url)
      <li class="page-item {{ $page == $invoices->currentPage() ? 'active' : '' }}">
        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
      </li>
    @endforeach

    @if ($invoices->hasMorePages())
      <li class="page-item"><a class="page-link" href="{{ $invoices->nextPageUrl() }}">»</a></li>
    @else
      <li class="page-item disabled"><span class="page-link">»</span></li>
    @endif
  </ul>
</div>