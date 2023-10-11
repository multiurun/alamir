@if($paginator->hasPages())
<nav aria-label="...">
  <ul class="pagination pagination-lg  justify-content-center">
    <li class="page-item ">
      
    </li>
    {{-- Previous Page Link --}}
    <li class="page-item disabled">
            @if ($paginator->onFirstPage())
            <a class="page-link " href="#" tabindex="-1">السابق</a>
    </li>
            @else
                <li class="page-item">
                <a class="page-link" href="{{$paginator->previousPageUrl()}}" tabindex="-1">السابق</a>
                </li>
            @endif
   
    {{-- Pagination Elements --}}
            @foreach ($elements as $element)
              

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

    {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="page-item">
             <a class="page-link" href="{{$paginator->nextPageUrl()}}">التالي</a>
           </li>
            @else
            <li class="page-item disabled">
            <a class="page-link" href="#">التالي</a>
             </li>
            @endif
  </ul>
</nav>

@endif