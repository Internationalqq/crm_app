<div class="modal" id="deleteContractorModal-{{ $contractor->id }}" tabindex="-1"
    aria-labelledby="deleteContractorModalLabel-{{ $contractor->id }}" aria-hidden="true">
    <div class="modal-dialog-delete">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteContractorModalLabel-{{ $contractor->id }}">Подтверждение удаления</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Вы уверены, что хотите удалить контрагента <strong>{{ $contractor->title }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('contractor.delete', $contractor->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
