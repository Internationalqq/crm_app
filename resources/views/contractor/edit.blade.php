@foreach ($contractors as $contractor)
    <div class="modal fade" id="editContractorModal-{{ $contractor->id }}" tabindex="-1"
        aria-labelledby="editContractorModalLabel-{{ $contractor->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editContractorModalLabel-{{ $contractor->id }}">Редактировать контрагента
                        {{ $contractor->title }}</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x fa-lg"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('contractor.update', $contractor->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">Имя контрагента</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $contractor->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="contractor_phone">Телефон контрагента</label>
                            <input type="text" class="form-control" id="contractor_phone" name="contractor_phone"
                                value="{{ $contractor->contractor_phone }}" required oninput="formatPhone(this)">

                        </div>
                        <div class=" d-flex justify-content-between items-center mt-3">
                            <button type="submit" class="btn btn-success">Сохранить изменения</button>
                            <button type="button" class="btn text-danger mt-2" data-toggle="modal"
                                data-target="#deleteContractorModal-{{ $contractor->id }}">
                                Удалить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('contractor.delete')
    </div>
@endforeach
