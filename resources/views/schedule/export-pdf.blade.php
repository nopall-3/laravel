<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Tiket</title>
    <style>
        .ticket-wrapper{
            width: 50%;
            margin-left: 20%;
        }
        .ticket-item{
            width: 340px;
            padding: 18px 22px;
        }
        .studio-title{
            margin: 0;

        }
        .separator {
            margin: 1px;
            height: 1px;
            border: none;
            background: rgb(0,0,0,0.2);
        }
        .ticket-title{
            margin: 0 0 8px 0;
            font-weight: bold;
        }
        .ticket-details small{
            font-weight: bold;
            display: inline-block;
            width: 60px;
        }
    </style>
</head>

<body>
    <div class="tickets-wrapper">
        @foreach ($ticket['rows_of_seats'] as $item)
            <div class="ticket-item">
                <div class="ticket-header">
                    <div class=""><b>{{ $ticket['schedule']['cinema']['name'] }}</b></div>
                    <div class="">
                        <h5 class="studio-title">STUDIO</h5>
                    </div>
                </div>

                <hr class="separator">
                <div class="ticker-body">
                    <p class="ticket-title">{{ $ticket['schedule']['movie']['title'] }}</p>
                    <div class="ticker-details">
                        <small>tanggal</small>
                        {{ \Carbon\Carbon::parse($ticket['ticket_payment']['booked_date'])->format('d F,Y') }}
                        <br>
                        <small>Waktu: </small>
                        {{ \Carbon\Carbon::parse($ticket['hour'])->format('H:i') }}
                        <br>
                        <small>kursi: </small>{{ $item }} <br>
                        <small>Price: </small>Rp. {{ number_format($ticket['schedule']['price']) }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
