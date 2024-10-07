<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Квитанция</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            margin: 0 !important;
            padding: 0;
            font-size: 0.75rem;
            line-height: 0.82rem;
        }

        p {
            margin: 0 !important;
        }

        h1 {
            line-height: 1.5;
            font-size: 1.3rem;
            border-bottom: #383838 1px solid;
        }

        h4 {
            margin: 0 !important;
        }

        ol {
            font-size: 0.75rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Квитанция № {{ $order->user_order_id }} от {{ \Carbon\Carbon::now()->format('d.m.Y') }}</h1>
        <div style="display: flex; margin-bottom: 20px">
            <div style="margin-right: 40px">
                <h4>Исполнитель: </h4>
                <p>Адрес: </p>
                <p>Телефон: </p>
                <h4>Заказчик: </h4>
                <p>Телефон: </p>
            </div>
            <div>
                <p>{{ $order->manager }}</p>
                <p>Автозаводцев 65, Миасс</p>
                <p>+7 (952) 523-39-99</p>
                <p>{{ $order->contractor->title }}</p>
                <p>{{ $order->contractor->contractor_phone }}</p>
            </div>
        </div>
        <p><b>Марка/модель:</b> {{ $order->device }}</p>
        <p><b>Комплектация:</b></p>
        <p><b>Внешний вид:</b> царапины, потертости</p>
        <p><b>Причина ремонта со слов заказчика:</b> {{ $order->issue }}</p>
        <p><b>Предоплата:</b> 0,00</p>
        <p><b>Ориентировочная стоимость ремонта:</b> {{ $order->amount }}</p>
        <p><b>Ориентировочная дата готовности:</b> {{ $order->due_date }}</p>
        <h4>Примечание:</h4>
        <ol style="margin-top: 10px; padding: 0;">
            <li>1. Технический центр не несёт ответственности за возможную потерю данных в памяти устройства, связанную
                с
                заменой плат, установкой программного обеспечения, заменой носителя информации.</li>
            <li>2. Заказчик принимает на себя риск возможной полной или частичной утраты работоспособности устройства в
                процессе ремонта (тепловой обработки), в случае грубых нарушений пользователем условий эксплуатации,
                наличия
                следов попадания токопроводящей жидкости (коррозии), либо механических повреждений.</li>
            <li>3. На восстановленные после попадания жидкости на устройство гарантия не распространяется и не
                продлевается.</li>
            <li>4. Срок бесплатного хранения устройства составляет 30 дней с момента приёма его в ремонт. В случае,
                если по
                истечении указанного срока клиентом не заявлено требование о выдаче устройства, оно принимается на
                ответственное хранение. Стоимость услуг по ответственному хранению составляет 0 руб в сутки.
                Максимальный
                срок ответственного хранения составляет 30 дней. В случае, если в течение указанного срока Клиент не
                требует
                возврата устройства (либо с Клиентом не представляется возможным связаться по указанному в квитанции
                телефону), устройство утилизируется без компенсации его стоимости клиенту.</li>
            <li>5. В случае отказа заказчика от ремонта устройства стоимость диагностики неисправности платная.</li>
            <li>6. В случае утери квитанции, устройство выдаётся по предъявлению паспорта на имя заказчика.</li>
        </ol>
        <div style="display: flex; justify-content: space-between">
            <div>
                <p>Исполнитель: _____________ / {{ $order->manager }}/</p>
            </div>
            <div style="width: 300px">
                <div>
                    <p> _______________ / {{ $order->contractor->title }}/
                </div>
                <br>
                <div>
                    с условием гарантии ознакомлен и согласен
                </div>
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Квитанция № {{ $order->user_order_id }} от {{ \Carbon\Carbon::now()->format('d.m.Y') }}</h1>
        <div style="display: flex; margin-bottom: 20px">
            <div style="margin-right: 40px">
                <h4>Исполнитель: </h4>
                <p>Адрес: </p>
                <p>Телефон: </p>
                <h4>Заказчик: </h4>
                <p>Телефон: </p>
            </div>
            <div>
                <p>{{ $order->manager }}</p>
                <p>Автозаводцев 65, Миасс</p>
                <p>+7 (952) 523-39-99</p>
                <p>{{ $order->contractor->title }}</p>
                <p>{{ $order->contractor->contractor_phone }}</p>
            </div>
        </div>
        <p><b>Марка/модель:</b> {{ $order->device }}</p>
        <p><b>Комплектация:</b></p>
        <p><b>Внешний вид:</b> царапины, потертости</p>
        <p><b>Причина ремонта со слов заказчика:</b> {{ $order->issue }}</p>
        <p><b>Предоплата:</b> 0,00</p>
        <p><b>Ориентировочная стоимость ремонта:</b> {{ $order->amount }}</p>
        <p><b>Ориентировочная дата готовности:</b></p>
        <h4>Примечание:</h4>
        <ol style="margin-top: 10px; padding: 0;">
            <li>1. Технический центр не несёт ответственности за возможную потерю данных в памяти устройства, связанную
                с
                заменой плат, установкой программного обеспечения, заменой носителя информации.</li>
            <li>2. Заказчик принимает на себя риск возможной полной или частичной утраты работоспособности устройства в
                процессе ремонта (тепловой обработки), в случае грубых нарушений пользователем условий эксплуатации,
                наличия
                следов попадания токопроводящей жидкости (коррозии), либо механических повреждений.</li>
            <li>3. На восстановленные после попадания жидкости на устройство гарантия не распространяется и не
                продлевается.</li>
            <li>4. Срок бесплатного хранения устройства составляет 30 дней с момента приёма его в ремонт. В случае,
                если по
                истечении указанного срока клиентом не заявлено требование о выдаче устройства, оно принимается на
                ответственное хранение. Стоимость услуг по ответственному хранению составляет 0 руб в сутки.
                Максимальный
                срок ответственного хранения составляет 30 дней. В случае, если в течение указанного срока Клиент не
                требует
                возврата устройства (либо с Клиентом не представляется возможным связаться по указанному в квитанции
                телефону), устройство утилизируется без компенсации его стоимости клиенту.</li>
            <li>5. В случае отказа заказчика от ремонта устройства стоимость диагностики неисправности платная.</li>
            <li>6. В случае утери квитанции, устройство выдаётся по предъявлению паспорта на имя заказчика.</li>
        </ol>
        <div style="display: flex; justify-content: space-between">
            <div>
                <p>Исполнитель: _____________ / {{ $order->manager }}/</p>
            </div>
            <div style="width: 300px">
                <div>
                    <p> _______________ / {{ $order->contractor->title }}/
                </div>
                <br>
                <div>
                    с условием гарантии ознакомлен и согласен
                </div>
                </p>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>
