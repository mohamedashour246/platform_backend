<?php
    header("Content-type: text/css; charset: UTF-8");
?>


<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PDF</title>
  <style>


    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #0087C3;
      text-decoration: none;
    }

    body {
      direction: rtl;
      position: relative;
      width: 100%;  
      height: 29.7cm; 
      margin: 0 auto; 
      color: #555555;
      background: #FFFFFF; 

      font-family: 'Almarai' , sans-serif;
      /*font-family: DejaVu Sans;*/


      /*font-family: 'Tajawal', sans-serif;*/
      font-size: 12px; 
      font-weight: bold;
    }

    header {
      padding: 10px 0;
      margin-bottom: 20px;
      border-bottom: 1px solid #AAAAAA;
    }


    #company {
      float: right;
      text-align: right;
    }


    #details {
      margin-bottom: 50px;
    }

    #client {
      padding-left: 6px;
      border-left: 6px solid #0087C3;
      float: left;
    }

    #client .to {
      color: #777777;
    }

    h2.name {
      font-size: 1.4em;
      font-weight: normal;
      margin: 0;
    }

    #invoice {
      float: right;
      text-align: right;
    }

    #invoice h1 {
      color: #0087C3;
      font-size: 2.4em;
      line-height: 1em;
      font-weight: normal;
      margin: 0  0 10px 0;
    }

    #invoice .date {
      font-size: 1.1em;
      color: #777777;
    }


    #thanks{
      font-size: 2em;
      margin-bottom: 50px;
    }

    #notices{
      padding-left: 6px;
      border-left: 6px solid #0087C3;  
    }

    #notices .notice {
      font-size: 1.2em;
    }

    footer {
      color: #777777;
      width: 100%;
      height: 30px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #AAAAAA;
      padding: 8px 0;
      text-align: center;
    }

    table {
      text-align: center;
    }


    table thead tr th {
      background-color: #3b8668;
      color: white;
    }


  </style>
</head>
<body dir="rtl">

<main>
  <div id="details" class="clearfix">
{{--     <div id="client">
      <div class="to">INVOICE TO:</div>
      <h2 class="name">John Doe</h2>
      <div class="address">796 Silver Harbour, TX 79273, US</div>
      <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
    </div>
    <div id="invoice">
      <h1>INVOICE 3-2-1</h1>
      <div class="date">Date of Invoice: 01/06/2014</div>
      <div class="date">Due Date: 30/06/2014</div>
    </div> --}}
  </div>
  <table border="1" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th>#</th>
       <th>الراسل</th>
       <th>المستقبل</th>
       <th>تاريخ الاستلام</th>
       <th>تاريخ التسليم</th>
       <th>السائق</th>
       <th>سعر الطلب</th>
       <th>سعر التوصيل</th>
       <th>طريقه الدفع</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($trips as $trip)
      <tr>
        <td style="text-align: center">{{$trip->id  }}</td>
        <td style="text-align: center">{{ optional($trip->market)->name   }}</td>
        <td style="text-align: center">{{ optional($trip->address)->name  }}</td>
        <td style="text-align: center">{{ $trip->receipt_date_from_market->format('Y-m-d h:i A')  }}</td>
        <td style="text-align: center">{{ $trip->delivery_date_to_customer->format('Y-m-d h:i A')   }}</td>
        <td style="text-align: center">{{ optional($trip->driver)->name }}</td>
        <td style="text-align: center"> {{$trip->order_price }} </td>
        <td style="text-align: center">{{ $trip->delivery_price }}</td>
        <td style="text-align: center">{{ optional($trip->payment_method)->name_ar }}</td>
      </tr>
      @endforeach

    </tbody>
  </table>

  <br>
  <br>
  <br>

  <hr>

  <table border="1" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th>مجموع الكاش </th>
        <th>مجموع التوصيل</th>
        <th>مجموع كى نت</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td> {{ $trips->where('payment_method_id' , 1)->sum('order_price') }} </td>
        <td>{{ $trips->sum('delivery_price') }}</td>
        <td> {{  $trips->where('payment_method_id' , 2)->sum('order_price') }}</td>
      </tr>
    </tbody>
  </table>

</main>

</body>
</html>