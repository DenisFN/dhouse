
<div class="modal fade modal-base-form" id="modal_future" tabindex="-1" role="dialog" aria-labelledby="modal-base-form-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-center" id="modal-base-form-label">
                    Информация
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form class="modal-body">
                {{--@foreach($page::where('id_category', '=', '2')->get() as $page)--}}
                    {{--<a class="btn btn-warning mr-2 mb-2" href="/sections/{{$page->url}}">{{$page->h1}}</a>--}}
                {{--@endforeach--}}
                <div class="text-dark">Модуль находится в процессе разработки )))</div>
            </form>

            <div class="modal-footer">
                {{--<div class="w-100">* Выберите нужный отдел для перехода</div>--}}
            </div>

        </div>
    </div>
</div>
