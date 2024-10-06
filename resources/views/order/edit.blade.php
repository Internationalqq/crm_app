@foreach ($orders as $order)
    <div class="modal fade" id="editOrderModal-{{ $order->id }}" tabindex="-1"
        aria-labelledby="editOrderModalLabel-{{ $order->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOrderModalLabel-{{ $order->id }}">Редактировать заказ
                        №{{ $order->user_order_id }}</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x fa-lg"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('order.update', $order->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <!-- Поля для редактирования заказа -->
                        <div class="form-group">
                            <label for="status">Статус</label>
                            <select name="status" id="status" class="form-control" required>
                                <option class="text-primary" value="0" {{ $order->status == 0 ? 'selected' : '' }}>
                                    В работе</option>
                                <option class="text-success" value="1" {{ $order->status == 1 ? 'selected' : '' }}>
                                    Готов</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="due_date">Крайний срок</label>
                            <input type="date" class="form-control" id="due_date" name="due_date"
                                value="{{ $order->due_date }}" required>
                        </div>

                        <div class="form-group">
                            <label for="manager">Менеджер</label>
                            <input type="text" class="form-control" id="manager" name="manager"
                                value="{{ $order->manager }}" required>
                        </div>

                        <div class="form-group">
                            <label for="order_type">Тип заказа</label>
                            <input type="text" class="form-control" id="order_type" name="order_type"
                                value="{{ $order->order_type }}" required>
                        </div>

                        <div class="form-group">
                            <label for="device_type">Тип устройства</label>
                            <input type="text" class="form-control" id="device_type" name="device_type"
                                value="{{ $order->device_type }}" required>
                        </div>

                        <div class="form-group">
                            <label for="device">Устройство</label>
                            <input type="text" class="form-control" id="device" name="device"
                                value="{{ $order->device }}" required>
                        </div>

                        <div class="form-group">
                            <label for="issue">Неисправность</label>
                            <input type="text" class="form-control" id="issue" name="issue"
                                value="{{ $order->issue }}" required>
                        </div>

                        <div class="form-group">
                            <label for="contractor">Контрагент</label>
                            <select class="form-control" id="contractor" name="contractor_id">
                                @foreach ($contractors as $contractor)
                                    <option value="{{ $contractor->id }}"
                                        {{ $contractor->id == $order->contractor_id ? 'selected' : '' }}>
                                        {{ $contractor->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="amount">Сумма</label>
                            <input type="number" class="form-control" id="amount" name="amount"
                                value="{{ $order->amount }}" required>
                        </div>

                        <div class=" d-flex justify-content-between mt-4">
                            <div>
                                <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                <a href="{{ route('order.print', $order->id) }}" class="btn btn-secondary"
                                    target="_blank">
                                    <i class="bi bi-printer"></i> Печать квитанции
                                </a>
                            </div>
                            <div>
                                <button type="button" class="btn text-danger" data-toggle="modal"
                                    data-target="#deleteOrderModal-{{ $order->id }}">
                                    Удалить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('order.delete')
    </div>
@endforeach
