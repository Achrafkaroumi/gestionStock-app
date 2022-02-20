<html>
<head>
    <style>
    </style>
    </head>
<body>
    
        <div class="header">
        <div style="width: 50%;float: right">
        <span style="padding-right: 60px;float: right;"><p style="display: inline" id="ville"><b>RABAT </p> le <p style="display: inline" id="date_1">{{ date('d/m/Y') }}</p></b></span><br><br>
        
        <div style="border:1px solid black;
            border-radius: 6px;padding-left: 4px;">
            <span>
                @foreach ($vente as $vt)
           <br> <p style="display: inline">Nom Client/Societé  : <b>{{$vt->relatedClient->Nom_Cl}}</b></p>
           <br> <p style="display: inline">Adresse : <b>{{$vt->relatedClient->Adresse_Cl}}</b></p>
           <br> <p style="display: inline">Téléphone :<b>{{$vt->relatedClient->Tel_Cl}}</b></p>
           <br> <p style="display: inline">Email : <b>{{$vt->relatedClient->Email_Cl}}</b><p>                
             <p style="display: inline"><b>Maroc</b></p> 
                 @endforeach            
            </span>
    </div><br><br>
    </div> 
     <br><br><div style="float: left;width: 50%;"> 
    <div style=" border:1px solid black;
            border-radius: 6px;width: 95%;padding: 5px">
        Nom SOCIETE : <p style="display: inline"><b> G-stock </b></p></div><br>
        @foreach ($vente as $vt)
    <div style=" border:1px solid black;
            border-radius: 6px;width: 95%;padding: 5px"> Bon de commande N° : <p style="display: inline"></p> <b>{{$vt->id}}</b></div><br>
        </div> 
        @endforeach  
    </div>
        <table id="t1" style="width:100%;border: 1px solid black;border-collapse: collapse;">
            <caption style="border: 1px solid black;border-radius: 6px;padding: 5px;margin-bottom: 20px;">FACTURE N° : {{$facture}} </caption><br>
            
        <tr>
            <th style="background-color: black;color: white;border: 1px solid black;">Produit</th>
            <th style="background-color: black;color: white;border: 1px solid black;">Quantité</th>
            <th style="background-color: black;color: white;border: 1px solid black;">Prix</th>
            <th style="background-color: black;color: white;border: 1px solid black;">Date vente</th>
        </tr>
        @foreach ($vente as $vt)
        <tr style="text-align: center">
            <td style="border-left: 1px solid black;">{{$vt->produit->design_produit}}</td>
            <td style="border-left: 1px solid black;">{{$vt->qte_vente}}</td>
            <td style="border-left: 1px solid black;">{{$vt->prix}} DH</td>
            <td style="border-left: 1px solid black;">{{ date('j/m/Y',strtotime($vt->created_at)) }}</td>
        </tr>
        @endforeach

        </table><br><br>
        
       
         <table style="float:right;border: 1px solid black;border-radius: 10px;">
            <tr>
            <th>NEt a Payer</th></tr>
            @foreach ($vente as $vt)
           <tr>
            <td style="border-top: 1px solid black;height: 40px;text-align: center;"><strong>{{$vt->montant}} DH</strong></td>
           </tr>
           @endforeach
            </table><br><br><br><br>
        <br>
    <div style="border: 1px solid black;text-align: center;padding-bottom: 10px;"><u>ARRETEE LA PRESENTE FACTURE A LA SOMME DE :</u><br><br>
        @php
            foreach ($vente as $vt) {
                
                echo "<b>".NumConvert::word($vt->montant)."</b>";
            }
        @endphp 
        </div>
        <br>
        <div style="border: 2px solid black;">
        </div>
    </body>
</html>