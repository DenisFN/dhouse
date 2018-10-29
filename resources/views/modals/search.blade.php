
<div class="modal fade modal-base-form" id="modal_search" tabindex="-1" role="dialog" aria-labelledby="modal-base-form-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-center" id="modal-base-form-label">
                    Поиск сотрудника
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form class="p-3" action="/search" method="post">
                {{ csrf_field() }}
                <div class="form-group float-left w-75">
                    <input type="text" class="form-control" name="search_fio" placeholder="Введите ФИО">
                </div>
                <button type="submit" class="btn btn-warning ml-3">Найти</button>
            </form>

            <div class="modal-footer">
                <div class="w-100">* Введите ФИО или часть имени для поиска сотрудника</div>
            </div>

        </div>
    </div>
</div>
