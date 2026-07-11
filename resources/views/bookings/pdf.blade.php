<!DOCTYPE html>
<html>
<head>
    <title>Booking Report</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #111827;
        }

        h1 {
            text-align: center;
            margin-bottom: 5px;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #1e3a8a;
            color: white;
            padding: 8px;
            border: 1px solid #ddd;
        }

        td {
            padding: 8px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <h1>Room Booking Report</h1>
    <p>Generated on {{ date('d M Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Room</th>
                <th>User</th>
                <th>Date</th>
                <th>Time</th>
                <th>Purpose</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->room->room_name }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                    <td>{{ $booking->purpose }}</td>
                    <td>{{ $booking->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>