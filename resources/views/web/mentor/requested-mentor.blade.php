<h2>Requested Student for Session</h2>
@foreach($requested_student as $student)
<h3>Name  : {{$student->first_name}} {{$student->last_name}}</h3>
<p>Agenda :{{$student->agenda}}</p>
<p>status : {{$student->session_status}}</p>
<p>date: {{$student->date}}</p>
@php
 $endtdate = new DateTime($student->from_time, new \DateTimeZone('UTC'));
 $endtdate->setTimezone(new \DateTimeZone('Asia/Kolkata'));
 $Start_time = $endtdate->format('g:i a');
@endphp
<p>Time: {{$Start_time}} </p>
@endforeach