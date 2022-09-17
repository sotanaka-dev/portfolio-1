@switch($sort_by)
    @case('created_at,desc')
        <i class="fa-solid fa-arrow-down-9-1 fa-2xl"></i>
    @break

    @case('created_at,asc')
        <i class="fa-solid fa-arrow-down-1-9 fa-2xl"></i>
    @break

    @case('name,asc')
        <i class="fa-solid fa-arrow-down-a-z fa-2xl"></i>
    @break

    @case('name,desc')
        <i class="fa-solid fa-arrow-down-z-a fa-2xl"></i>
    @break

    @case('price,asc')
        <i class="fa-solid fa-arrow-down-short-wide fa-2xl"></i>
    @break

    @case('price,desc')
        <i class="fa-solid fa-arrow-down-wide-short fa-2xl"></i>
    @break

    @default
        <i class="fa-solid fa-sort fa-2xl"></i>
@endswitch
