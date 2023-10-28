<style>
  .pagination ul{
    display: flex;
    align-items: center;
    background-color: #e5e7eb;
    border-radius: 9999px;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
  }

  .pagination ul li a,
  .pagination ul li span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 15px;
    color: #006837;
  }

  .pagination ul li a:hover,
  .pagination ul li .active {
    background-color: #006837;
    color: #fff;
  }

  .pagination svg,
  .pagination a {
    fill: currentColor !important;
  }
</style>

@php
  $pageCount = 2;
@endphp

@if ($paginator->hasPages())
  <!-- Pagination -->
  <div class="pagination">
    <ul>
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li>
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M13.939 4.939 6.879 12l7.06 7.061 2.122-2.122L11.121 12l4.94-4.939z"></path></svg>
          </span>
        </li>
      @else
        <li>
          <a href="{{ $paginator->previousPageUrl() }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M13.939 4.939 6.879 12l7.06 7.061 2.122-2.122L11.121 12l4.94-4.939z"></path></svg>
          </a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
        {{-- Array Of Links --}}
        @if (is_array($element))
          @php
            $dotleft = false;
            $dotright = false;
          @endphp
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li>
                <span class="active">{{ $page }}</span>
              </li>

            @elseif ($page <= $pageCount || (abs($paginator->currentPage() - $page) <= $pageCount && $paginator->currentPage() != 1 && $paginator->currentPage() != $paginator->lastPage()) || $page > $paginator->lastPage() - $pageCount)
              <li>
                <a href="{{ $url }}">{{ $page }}</a>
              </li>

            @elseif ($page > $pageCount && $page < $paginator->currentPage() && $dotleft == false)
              @php
                $dotleft = true
              @endphp
              <li>
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                </span>
              </li>

            @elseif ($page <= $paginator->lastPage() - $pageCount && $page > $paginator->currentPage() && $dotright == false)
              @php
                $dotright = true
              @endphp
              <li>
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                </span>
              </li>
            @endif
          @endforeach
        @endif
      @endforeach

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li>
          <a href="{{ $paginator->nextPageUrl() }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path></svg>
          </a>
        </li>
      @else
        <li>
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path></svg>
          </span>
        </li>
      @endif
    </ul>
  </div>
  <!-- Pagination -->
@endif