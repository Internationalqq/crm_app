<div>
    <table class="table custom-table table-sm table-hover">
        <thead>
            <tr>
                <th>Заказ</th>
                <th>Статус</th>
                <th>Крайний срок</th>
                <th>Менеджер</th>
                <th>Тип заказа</th>
                <th>Тип устройства</th>
                <th>Устройство</th>
                <th>Неисправность</th>
                <th>Контрагент</th>
                <th>Сумма</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($orders as $order)
                <tr style="cursor: pointer">
                    <td data-toggle="modal" data-target="#editOrderModal-{{ $order->id }}">
                        {{ $order->user_order_id }}
                    </td>
                    <td data-toggle="modal" data-target="#editOrderModal-{{ $order->id }}">
                        <span style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .70rem;"
                            class="{{ $order->status == 0 ? 'btn btn-primary btn-sm' : 'btn btn-success btn-sm' }}">
                            {{ $order->status == 0 ? 'В работе' : 'Готов' }}
                        </span>
                    </td>
                    <td data-toggle="modal" data-target="#editOrderModal-{{ $order->id }}">
                        {{ \Carbon\Carbon::parse($order->due_date)->format('d.m.Y') }}</td>
                    <td data-toggle="modal" data-target="#editOrderModal-{{ $order->id }}">{{ $order->manager }}</td>
                    <td data-toggle="modal" data-target="#editOrderModal-{{ $order->id }}">{{ $order->order_type }}
                    </td>
                    <td data-toggle="modal" data-target="#editOrderModal-{{ $order->id }}">
                        {{ $order->device_type }}</td>
                    <td data-toggle="modal" data-target="#editOrderModal-{{ $order->id }}">{{ $order->device }}
                    </td>
                    <td data-toggle="modal" data-target="#editOrderModal-{{ $order->id }}">{{ $order->issue }}</td>
                    <td>
                        {!! $order->contractor
                            ? '<a class="contractor-link text-primary" data-toggle="modal" data-target="#editContractorModal-' .
                                $order->contractor->id .
                                '">' .
                                $order->contractor->title .
                                '</a><br><span style="color: #919191">' .
                                $order->contractor->contractor_phone .
                                '</span>'
                            : 'Не указан' !!}
                    </td>
                    <td data-toggle="modal" data-target="#editOrderModal-{{ $order->id }}">{{ $order->amount }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
