@if($pages->count > 1)
    @php($navigate = $query)
    <nav>
        <ul class="pagination justify-content-center">
            @php($navigate['page'] = $pages->current - 1)
            <li class="page-item {{$pages->current == 1 ? 'disabled' : ''}}">
                <a class="page-link" href="?{{http_build_query($navigate)}}">«</a>
            </li>
            @if($pages->current > 2)
                @php($navigate['page'] = 1)
                <li class="page-item">
                    <a class="page-link" href="?{{http_build_query($navigate)}}">1</a>
                </li>
                @if($pages->current > 3)
                    <li class="page-item disabled"><a href="" class="page-link">...</a></li>
                @endif
            @endif
            @php(
                $start = $pages->current < $pages->count
                    ? ($pages->current > 1 ? $pages->current - 1 : 1)
                    : $pages->current - ($pages->current > 3 ? 2 : 1)
            )
            @php(
                $end = $pages->current < $pages->count
                    ? $pages->current + (($pages->current < 3 and $pages->count > 3) ? 2 : 1)
                    : $pages->count
            )
            @for($i = $start; $i <= $end; $i++)
                @php($navigate['page'] = $i)
                <li class="page-item {{$pages->current == $i ? 'disabled' : ''}}">
                    <a class="page-link" href="?{{http_build_query($navigate)}}">{{$i}}</a>
                </li>
            @endfor
            @if($pages->current < $pages->count - 1)
                @if($pages->current < $pages->count - 2)
                    <li class="page-item disabled"><a href="" class="page-link">...</a></li>
                @endif
                @php($navigate['page'] = $pages->count)
                <li class="page-item">
                    <a class="page-link" href="?{{http_build_query($navigate)}}">{{$pages->count}}</a>
                </li>
            @endif
            @php($navigate['page'] = $pages->current + 1)
            <li class="page-item {{$pages->current == $pages->count ? 'disabled' : ''}}">
                <a class="page-link" href="?{{http_build_query($navigate)}}">»</a>
            </li>
        </ul>
    </nav>
@endif