<div class="flex justify-center items-center bg-gray-100">
    <div class="bg-white shadow-md rounded-lg p-4 max-w-md w-full mb-2">
        <h2 class="font-bold text-xl mb-2">Заявка от {{ $order->created_at ? $order->created_at->format('d.m.Y') : 'Неизвестное время' }}</h2>
        <p><strong>Клиент:</strong> {{ $order->client->name ?? 'Неизвестный клиент' }}</p> 
        <p><strong>Время:</strong> {{ $order->time }}</p>
        <p><strong>Дата:</strong> 
        <span>
            {{ $order->date}}
        </span></p>
        <p><strong>Время:</strong> 
        <span>
            {{ $order->time}}
        </span></p>
        <p><strong>Тип мебели:</strong> 
        <span>
            {{ $order->type}}
        </span></p>
        <p><strong>Оплата:</strong> 
        <span>
            {{ $order->payment}}
        </span></p>
        <p><strong>Колличество:</strong> 
        <span>
            {{ $order->count }}
        </span></p>
        </p>
    </div>
</div>


