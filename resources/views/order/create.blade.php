<div class="modal fade" id="createOrderModal" tabindex="-1" aria-labelledby="createOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="due_date">Крайний срок</label>
                                <input type="date" class="form-control" id="due_date" name="due_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="manager">Менеджер</label>
                                <input type="text" class="form-control" id="manager" name="manager" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="order_type">Тип заказа</label>
                                <input type="text" class="form-control" id="order_type" name="order_type" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="device_type">Тип устройства</label>
                                <input type="text" class="form-control" id="device_type" name="device_type" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="device">Устройство</label>
                                <input type="text" class="form-control" id="device" name="device" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="issue">Неисправность</label>
                                <input type="text" class="form-control" id="issue" name="issue" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <div style="flex: 1;">
                                <select class="form-control" id="contractor" name="contractor_id" required>
                                    <option value="" disabled selected>Выберите контрагента</option>
                                    @foreach ($contractors as $contractor)
                                        <option value="{{ $contractor->id }}">{{ $contractor->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button" class="my-3 btn btn-outline-primary btn-sm ms-2"
                                id="add-contractor-btn">Добавить нового контрагента</button>
                        </div>
                    </div>

                    <div class="mt-2" id="new-contractor-fields" style="display: none;">
                        <h6 class="text-primary">Новый контрагент</h6>
                        <div class="form-group">
                            <label for="new_contractor_title">Имя контрагента</label>
                            <input type="text" class="form-control" id="new_contractor_title"
                                name="new_contractor_title">
                        </div>
                        <div class="form-group">
                            <label for="new_contractor_phone">Телефон контрагента</label>
                            <input type="text" class="form-control" id="new_contractor_phone"
                                name="new_contractor_phone" placeholder="+7 (800) 555-35-35"
                                oninput="formatPhone(this)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="amount">Сумма</label>
                        <input type="number" class="form-control" id="amount" name="amount required" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
        </div>
    </div>
</div>
