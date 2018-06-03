@component('mail::message')
# Hi, {{ $emp->first_name }} {{ $emp->middle_name }}

Your Leave Request ({{ $leave->leave_start }} to {{ $leave->leave_end }}) {{ $leave->status == 1 ? 'Approved':'Rejected' }} By {{ $leave->approved_by }}

@component('mail::button', ['url' => 'http://localhost:8000'])
    Login to the system
@endcomponent

Thanks,<br>
Intel Access HRM
@endcomponent
