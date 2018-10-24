
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
    h2{
        font-size: 12px;
        text-align: left;
    }
    li{
        font-size: 10px;
        list-style-type: none;
        text-align: left;
    }
    @media only screen and (max-device-width: 480px) {
        .card-header,
        .card-body,
        .header,
        .footer {
            flex-flow: column !important;
            align-items: center !important;
        }

        .card-body {
            flex-direction: column-reverse !important;
        }
        .fotoEvento {
            width: 100% !important;
        }
        .detalleEvento {
            margin: 1em 0 !important;
            line-height: 1em !important;
        }
        .detalleTickets {
            width: 100% !important;
            margin-top: 2em !important;
        }
        .logoFooter,
        .address,
        .social {
            text-align: center !important;
            margin: 1em 0 !important;
        }
        .tableSummary th,
        .tableSummary td,
        .table th,
        .table td {
            padding: 0.3rem !important;
            font-size: 10px
        }
        .orderNum {
            text-align: center !important;
            margin-top: 1em !important;
        }
    }
</style>
</head>

<body>
    <div class="email-background" style="background-color: #FAFAFA;width: 100%;height: 100%;">
        <div class="email-container" style="max-width: 800px;background-color: #FFFFFF;text-align: center;font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif;font-size: 1.2em;margin: 0 auto;padding: 0;overflow: hidden;color: #808080;">
            <div class="header" style="background-color: #000;padding: 20px;display: flex;align-items: center;">
                <img class="logo" src="https://www.printinglab.com/Firmas/logo-printing-lab.png" style="width: 161px;height: auto;border: 0;">
                <div class="orderNum" style="flex-grow: 1;justify-self: right;font-size: 1em;color: #FFFFFF;text-align: right;">
                    {{$datos['date']}}<br>
                    @foreach ($datos['result'] as $dto )
                    <b>Orden: #{{$dto->numero_venta}}</b>
                    @endforeach
                </div>
            </div>
            <p class="titulo-centrado" style="font-size: 1.5em;font-weight: bold;color: #243642;margin: 1.5em;text-align: center;">
                Hi, {{$datos['cltname']}}!<br>
                Your order has been received and is now being processing.
            </p>
            <div class="orderSummary" style="margin: 2em 1em;">
                <div class="titulo" style="font-size: 1.5em;font-weight: bold;color: #243642;margin: 1em 0;text-align: left;">Order
                Summary</div>
                <table class="tableSummary" style="width: 100%;margin-bottom: 1rem;background-color: transparent;border: 0;border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="padding: 0.5rem;vertical-align: bottom;border: 0;color: #466A83;text-transform: capitalize;font-size: 1em;">Product Details</th>
                            <th style="padding: 0.5rem;vertical-align: bottom;border: 0;color: #466A83;text-transform: capitalize;font-size: 1em;">Pay Method</th>
                            <th style="padding: 0.5rem;vertical-align: bottom;border: 0;color: #466A83;text-transform: capitalize;font-size: 1em;">Shipping Method</th>
                            <th style="padding: 0.5rem;vertical-align: bottom;border: 0;color: #466A83;text-transform: capitalize;font-size: 1em;">Tax</th>
                            <th style="padding: 0.5rem;vertical-align: bottom;border: 0;color: #466A83;text-transform: capitalize;font-size: 1em;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($datos['sales'] as $dt )
                        <tr>
                            <td style="padding: 0.5rem;vertical-align: top;border: 0;color: #808080;font-size: 1em;border-top: 1px solid #909090;"><h2>{{$dt->nombre}}</h2>
                                <li><strong>Size: </strong>{{$dt->attr1}}
                                </li>
                                <li><strong>Paper Type: </strong>{{$dt->attr2}}
                                </li>
                                <li><strong>Edge Color: </strong>{{$dt->attr6}}
                                </li>
                                <li><strong> Printed Side: </strong>{{$dt->attr3}}
                                </li>
                                <li><strong>Coating: </strong>{{$dt->attr4}}
                                </li>
                                <li><strong>Corners: </strong>{{$dt->attr5}}
                                </li>
                                <li><strong>Ships In: </strong>{{$dt->attr11}}
                                </li>
                                <li><strong>Quantity: </strong>{{$dt->attr10}}
                                </li></td>
                                <td style="padding: 0.5rem;vertical-align: top;border: 0;color: #808080;font-size: 1em;border-top: 1px solid #909090;">{{$datos['paytype']}}</td>
                                <td style="padding: 0.5rem;vertical-align: top;border: 0;color: #808080;font-size: 1em;border-top: 1px solid #909090;"> <li><strong>Address: </strong>{{$datos['cltadress']}}
                                </li>
                                <li><strong>Phone: </strong>{{$datos['cltphone']}}
                                </li>
                                <li><strong>Method: </strong>{{$dt->Shiping}}
                                </li>
                                <li><strong>Value: </strong>${{$dt->Shipingtotal}}
                                </li></td>
                                <td style="padding: 0.5rem;vertical-align: top;border: 0;color: #808080;font-size: 1em;border-top: 1px solid #909090;">${{$dt->tax}}</td>
                                <td style="text-align: right;padding: 0.5rem;vertical-align: top;border: 0;color: #808080;font-size: 1em;border-top: 1px solid #909090;">${{$dt->attr12}}</td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                    @foreach ($datos['result'] as $dto )
                    <div class="total" style="font-size: 1.1em;color: #243642;text-align: right;font-weight: bold;">Order
                    Total: ${{$dt->total}}</div>
                    @endforeach
              
                </div>
                <div class="contactInfo" style="margin: 3em 1em;text-align: center;font-size: 0.8em;">
                    <div class="subtitulo" style="font-size: 1.4em;color: #707070;margin-bottom: 1em;">For any assistance
                    please call us</div>
                    <img class="phone" src="https://www.printinglab.com/Firmas/phone.png" style="width: 40px;height: 40px;">
                    <div class="titulo-centrado" style="margin: 0.5em 0px;font-size: 1.5em;font-weight: bold;color: #243642;text-align: center;">(201) 305 0404</div>
                </div>
                <div class="footer" style="background-color: #000000;padding: 20px;display: flex;align-items: center;font-size: 0.8em;color: #FFFFFF;">
                    <div class="logoFooter" style="text-align: left;">
                        <img class="logo" src="https://www.printinglab.com/Firmas/logo-printing-lab.png"" style="width: 161px;height: auto;border: 0;margin-bottom: 5px;">
                    </div>

                    <div class="address" style="flex-grow: 1;text-align: center;">
                        609 55th Street<br>
                        West New York<br>
                        NJ 07093
                    </div>

                    <div class="social">
                        <img class="iconSocial" src="https://www.printinglab.com/Firmas/facebook.png" style="width: 40px;height: 40px;padding: 1em;">
                        <img class="iconSocial" src="https://www.printinglab.com/Firmas/instagram.png" style="width: 40px;height: 40px;padding: 1em;">
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>