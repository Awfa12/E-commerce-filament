<x-mail::message>
# Order Placed Successfully!

Your order has been placed successfully. 

Your order number is: {{ $order->id }}

We are currently processing your order and will notify you once it has been shipped.

If you have any questions or need assistance, feel free to contact our support team.

<x-mail::button :url="$url">
View Order
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
