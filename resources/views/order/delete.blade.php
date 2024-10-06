<div class="modal" id="deleteOrderModal-{{ $order->id }}" tabindex="-1"
    aria-labelledby="deleteOrderModalLabel-{{ $order->id }}" aria-hidden="true">
    <div class="modal-dialog-delete">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteOrderModalLabel-{{ $order->id }}">Подтверждение удаления</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Вы уверены, что хотите удалить заказ №<strong>{{ $order->user_order_id }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('order.delete', $order->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
