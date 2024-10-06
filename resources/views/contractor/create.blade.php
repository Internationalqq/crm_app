<div class="modal fade" id="createContractorModal" tabindex="-1" aria-labelledby="addContractorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addContractorModalLabel">Добавить контрагента</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x fa-lg"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('contractor.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Имя контрагента</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Имя контрагента" required>
                    </div>
                    <div class="form-group">
                        <label for="contractor_phone">Телефон контрагента</label>
                        <input type="text" class="form-control" id="contractor_phone" name="contractor_phone"
                            placeholder="+7 (800) 555-35-35" required oninput="formatPhone(this)">

                    </div>
                    <button type="submit" class="btn btn-success">Добавить контрагента</button>
                </form>
            </div>
        </div>
    </div>
</div>
