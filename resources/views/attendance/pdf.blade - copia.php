<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Asistencia</title>
    <style>
        body {
            font-size: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        h1, h2 {
            margin: 0;
            padding: 5px 0;
        }
        h2 {
            color: green;
        }
        .sunday {
            font-weight: bold;
            font-size: 9px;
        }
        .holiday {
            font-weight: bold;
            background-color: #f8e6e6;
        }
        .free {
            text-align: center;
            background-color: #f0f0f0;
            font-style: italic;
        }
        .no-record {
            text-align: center;
            font-style: italic;
            background-color: #ffeeee;
        }
    </style>
</head>
<body>
    <center><h1> {{ env('APP_NAME', 'Sistema') }}</h1></center>
    <center><h2>Desde {{ \Carbon\Carbon::parse($from)->format('d/m/Y') }} hasta {{ \Carbon\Carbon::parse($to)->format('d/m/Y') }}</h2></center>

    @php
        $holidays = [
            '01/01' => 'Año Nuevo',
            '09/01' => 'Día de los Mártires',
            '01/05' => 'Día del Trabajo',
            '03/11' => 'Separación de Panamá de Colombia',
            '04/11' => 'Día de la Bandera',
            '10/11' => 'Primer Grito de Independencia',
            '28/11' => 'Independencia de Panamá de España',
            '08/12' => 'Día de las Madres',
            '25/12' => 'Navidad',
        ];

        $holidayDates = array_keys($holidays);
        $fromDate = \Carbon\Carbon::parse($from);
        $toDate = \Carbon\Carbon::parse($to);

        $dateRange = [];
        $currentDate = $fromDate->copy();
        while ($currentDate <= $toDate) {
            $dateRange[] = $currentDate->copy();
            $currentDate->addDay();
        }

        $absencesByDate = []; // Lista para empleados que faltaron agrupados por fecha
    @endphp

    @foreach ($data as $employeeName => $records)
        @php
            $records = collect($records)->keyBy(function ($record) {
                return \Carbon\Carbon::parse($record['BusinessDate'])->format('Y-m-d');
            });
        @endphp

        <h3 style="color: blue; font-weight: bold;">{{ $employeeName }} (ID Empleado: {{ $records->first()['employee_id'] ?? 'N/A' }})</h3>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>BreakOut</th>
                    <th>BreakIn</th>
                    <th>Horas</th>
                    <th>Balanceado</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dateRange as $date)
                    @php
                        $formattedDate = $date->format('Y-m-d');
                        $record = $records->get($formattedDate);
                        $isSunday = $date->dayOfWeek == \Carbon\Carbon::SUNDAY;
                        $isHoliday = in_array($date->format('d/m'), $holidayDates);
                        $isFree = $record && $record['excuse'] === 'Libre';

                        if (!$record && !$isFree) {
                            $absencesByDate[$formattedDate][] = $employeeName; // Agregar a la lista de ausencias
                        }
                    @endphp
                    <tr>
                        <td class="{{ $isSunday ? 'sunday' : '' }} {{ $isHoliday ? 'holiday' : '' }}">
                            {{ $isHoliday ? '**' : '' }}{{ $date->format('d/m/Y') }}
                        </td>
                        @if ($isFree)
                            <td colspan="4" class="free">Libre</td>
                            <td colspan="3" class="free"></td>
                        @elseif ($record)
                            <td>{{ $record['entrance'] }}</td>
                            <td>{{ $record['exit'] }}</td>
                            <td>{{ $record['lunch_departure'] }}</td>
                            <td>{{ $record['lunch_entry'] }}</td>
                            <td>{{ $record['hours_worked'] }}</td>
                            <td>{{ $record['excuse'] }}</td>
                            <td></td>
                        @else
                            <td colspan="7" class="no-record">Faltó</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
<div>
    <h3>Empleados que faltaron por fecha:</h3>
    @php
        ksort($absencesByDate); // Ordenar las fechas de forma ascendente
    @endphp
    @if (count($absencesByDate) > 0)
        <ul>
            @foreach ($absencesByDate as $date => $employees)
                <li><strong>{{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}:</strong>
                    <ul>
                        @foreach ($employees as $employee)
                            <li>{{ $employee }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hubo empleados que faltaron en este periodo.</p>
    @endif
</div>

</body>
</html>
