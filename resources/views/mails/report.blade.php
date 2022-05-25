@component('mail::message')
# Hi, {{ $user->fullname }}

Last week, total revenue is {{ $order }} vnđ.

Admin management
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent