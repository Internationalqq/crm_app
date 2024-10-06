<div class="modal fade" id="createOrderModal" tabindex="-1" aria-labelledby="createOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createOrderModalLabel">Создать заказ</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x fa-lg"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('order.store') }}" method="post" id="createOrderForm">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="status">Статус</label>
                        <input type="text" class="form-control" id="status" name="status"
                            placeholder="Введите статус" required>
                    </div> --}}
                    <div class="form-group">
                        <label for="due_date">Крайний срок</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" required>
                    </div>
                    <div class="form-group">
                        <label for="manager">Менеджер</label>
                        <input type="text" class="form-control" id="manager" name="manager"
                            placeholder="Введите имя менеджера" required>
                    </div>
                    <div class="form-group">
                        <label for="order_type">Тип заказа</label>
                        <input type="text" class="form-control" id="order_type" name="order_type"
                            placeholder="Введите тип заказа" required>
                    </div>
                    <div class="form-group">
                        <label for="device_type">Тип устройства</label>
                        <input type="text" class="form-control" id="device_type" name="device_type"
                            placeholder="Введите тип устройства" required>
                    </div>
                    <div class="form-group">
                        <label for="device">Устройство</label>
                        <input type="text" class="form-control" id="device" name="device"
                            placeholder="Введите устройство" required>
                    </div>
                    <div class="form-group">
                        <label for="issue">Неисправность</label>
                        <input type="text" class="form-control" id="issue" name="issue"
                            placeholder="Введите неисправность" required>
                    </div>
                    <select class="form-control my-4" id="contractor" name="contractor_id" required>
                        <option value="" disabled selected>Контрагент</option>
                        @foreach ($contractors as $contractor)
                            <option {{ old('contractor_id') == $contractor->id ? 'selected' : '' }}
                                value="{{ $contractor->id }}" required>
                                {{ $contractor->title }}</option>
                        @endforeach
                    </select>
                    @error('contractor_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="amount">Сумма</label>
                        <input type="number" class="form-control" id="amount" name="amount"
                            placeholder="Введите сумму" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
        </div>
    </div>
</div>
