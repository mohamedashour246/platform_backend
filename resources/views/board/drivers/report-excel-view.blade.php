<?php
    header("Content-type: text/css; charset: UTF-8");
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

  <style>
    th{
      color: white;
      background-color: #3b8668;
      text-align: center;
    }
  </style>
</head>
<body >
  <table>
   <thead>
     <tr>
       <th  style="background-color:  #3b8668; color: #FFFFFF; text-align: center; font-weight: bold" >#</th>
       <th  style="background-color:  #3b8668; color: #FFFFFF; text-align: center; font-weight: bold" >الراسل</th>
       <th  style="background-color:  #3b8668; color: #FFFFFF; text-align: center; font-weight: bold" >المستقبل</th>
       <th  style="background-color:  #3b8668; color: #FFFFFF; text-align: center; font-weight: bold" >تاريخ الاستلام</th>
       <th  style="background-color:  #3b8668; color: #FFFFFF; text-align: center; font-weight: bold" >تاريخ التسليم</th>
       <th  style="background-color:  #3b8668; color: #FFFFFF; text-align: center; font-weight: bold" >السائق</th>
       <th  style="background-color:  #3b8668; color: #FFFFFF; text-align: center; font-weight: bold" >سعر الطلب</th>
       <th  style="background-color:  #3b8668; color: #FFFFFF; text-align: center; font-weight: bold" >سعر التوصيل</th>
       <th  style="background-color:  #3b8668; color: #FFFFFF; text-align: center; font-weight: bold" >طريقه الدفع</th>
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
  <table border="1" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th style="background-color:  #3b8668; color: #FFFFFF; text-align: center; font-weight: bold" >مجموع الكاش </th>
        <th style="background-color:  #3b8668; color: #FFFFFF; text-align: center; font-weight: bold" >مجموع التوصيل</th>
        <th style="background-color:  #3b8668; color: #FFFFFF; text-align: center; font-weight: bold" >مجموع كى نت</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-align: center" > {{ $trips->where('payment_method_id' , 1)->sum('order_price') }} </td>
        <td style="text-align: center" >{{ $trips->sum('delivery_price') }} </td>
        <td style="text-align: center" > {{  $trips->where('payment_method_id' , 2)->sum('order_price') }}</td>
      </tr>
    </tbody>
  </table>

</body>

</html>


