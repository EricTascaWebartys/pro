<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>ADG Devis</title>
        <style media="screen">
        table {
            border: 1px solid #333;

        }
            table,
            td {
                /* border: 1px solid #333; */
            }

            /* thead,
            tfoot {
                background-color: #066eab;
                color: #fff;
            } */
            thead {
                background-color: #066eab;
                color: #fff;
            }

        </style>
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"> --}}

    </head>
    <body>
        <div style="width:595px;height:841px; margin:0 auto">
            <div style="padding-top:30px;display:block; height:220px">

                    <div style="width:255px;display:inline-block">
                        <div style="margin:0 auto">
                            <img src="{{ asset("img/logo-web-artys-web.png")}}" alt="WEB ARTYS" style="width:200px;">
                            <p>
                                18 bis avenue de Verdun <br>
                                38 800 Le-Pont-De-Claix <br>

                                <strong>Tél</strong> : 06 88 28 23 27 <br>
                                <strong>Email</strong> : adg.nettoyage@gmail.com <br>
                                <strong>Siret : </strong>53803545200027 <br>
                                <strong>N° Intracom : </strong>FR81538035452 <br>
                                <strong>NAF : </strong>8121Z <br>

                            </p>

                        </div>
                    </div>
                    <div style="width:255px;display:inline-block;margin-left:55px">
                        <div style="margin:0 auto; width:250px;border:solid 1px black; border-radius:3px; padding: 0 10px;">

                            <p>
                                {{ $devis->user()->full_name() }} <br>
                                Entreprise : {{ $devis->user()->company }} <br>
                                {{ $devis->user()->address }} <br>
                                {{ $devis->user()->zip }} {{ $devis->user()->city }}
                            </p>
                            <p>N° siret : {{ $devis->user()->siret }}</p>

                        </div>

                    </div>

            </div>
            <div style="display:block; margin-top:20px; width:595px; height:50px;">
                <div style="margin:0 auto;border:solid 1px black; border-radius:3px; padding: 0 10px;">
                    <p>
                        Devis n° : XXXXXXXXXXXXXX <span style="float:right">Fait le : <strong>{{ date("d/m/Y") }}</strong></span>
                    </p>

                </div>
            </div>
            <div style="display:block; margin-top:20px; width:595px;">
                <p style="text-align:center">Durée de validité : <strong>30 jours</strong>   (prix en Euro)</p>

            </div>


            <div style="padding-top:10px;width:585px;margin:0 auto">
                <table style="text-align:center;margin-bottom:40px">
                    <thead>
                        <tr>
                            <th style="width:250px">Désignation</th>
                            <th style="width:64px">QTE</th>
                            <th style="width:60px">UNITE</th>
                            <th style="width:60px">P.U. HT</th>
                            <th style="width:60px">P.U. NET</th>
                            <th style="width:60px">MT HT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($devis->descriptions() as $key => $d)
                            <tr>
                                <td style="padding:10px;padding-bottom: 20px;">{{ $d->designation }}</td>
                                <td style="padding:10px;padding-bottom: 20px;border-left:solid 1px #000">{{ $d->quantite }}</td>
                                <td style="padding:10px;padding-bottom: 20px;border-left:solid 1px #000">{{ $d->unite }}</td>
                                <td style="padding:10px;padding-bottom: 20px;border-left:solid 1px #000">{{ $d->pu }}</td>
                                <td style="padding:10px;padding-bottom: 20px;border-left:solid 1px #000">{{ $d->pu_net() }}</td>
                                <td style="padding:10px;padding-bottom: 20px;border-left:solid 1px #000">{{ $d->montant_ht() }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                </div>
                <div style="width:100%; display:block; height:180px">
                    <div style="width:250px;float:left">
                        <table style="text-align:center">
                            <thead>
                                <tr>
                                    <th style="width:60px">Taux TVA</th>
                                    <th style="width:60px">Montant HT</th>
                                    <th style="width:60px">Montant TVA</th>
                                    <th style="width:60px">Montant TTC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding:10px;padding-bottom: 60px;">20 %</td>
                                    <td style="padding:10px;padding-bottom: 60px;border-left:solid 1px #000">{{ $devis->total_ht() }}</td>
                                    <td style="padding:10px;padding-bottom: 60px;border-left:solid 1px #000">{{ $devis->total_tva() }}</td>
                                    <td style="padding:10px;padding-bottom: 60px;border-left:solid 1px #000">{{ $devis->total_ttc() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="width:250px;float:right">
                        <div style="border:solid 1px #000; padding:10px">
                            <p>
                                Total HT : <span style="float:right">{{ $devis->total_ht() }}</span> <br>
                                Total TVA : <span style="float:right">{{ $devis->total_tva() }}</span> <br>
                                Total TTC : <span style="float:right">{{ $devis->total_ttc() }}</span>
                            </p>
                            <p> <strong>Net à payer : </strong> <span style="float:right">{{ $devis->total_ttc() }} €</span> </p>

                        </div>
                    </div>
                </div>

                <p style="text-align:center"><strong>BON POUR ACCORD</strong> </p>
            </div>


        {{-- </div> --}}

{{--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> --}}
    </body>
</html>
