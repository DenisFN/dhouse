
<div class="w-100 pt-4 pb-5">
    <h2>Список сотрудников</h2>
    {{--Список всех сотрудников--}}
    <div class="float-left mr-4 mt-2">
        <div class="bg-info position-absolute rounded-circle" style="width: 18px; height: 18px; margin-top: 5px;"></div>
        <div class="badge badge-pill badge-light ml-4">Все сотрудники</div>
    </div>

    {{--Список сотрудников выбранного отдела--}}
    @php $i=0; @endphp
    @foreach($units::where('id_section','LIKE',"%'".$page->id."'%")->get() as $units)
        @php $i++; @endphp
        <div class="float-left mr-4 mt-2">
            <span class="badge badge-pill badge-warning">@php echo $i; @endphp</span>
            <span class="badge badge-pill badge-light">{{ $units->fio }}</span>
        </div>
    @endforeach
</div>
