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
                @foreach ($achat as $act)
           <br> <p style="display: inline">Nom Fournisseur/Societé  : <b>{{$act->fournisseur->nom}}</b></p>
           <br> <p style="display: inline">Adresse : <b>{{$act->fournisseur->adresse}}</b></p>
           <br> <p style="display: inline">Téléphone :<b>{{$act->fournisseur->telephone}}</b></p>
           <br> <p style="display: inline">Email : <b>{{$act->fournisseur->email}}</b><p>                
             <p style="display: inline"><b>Maroc</b></p> 
                 @endforeach            
            </span>
    </div><br><br>
    </div> 
     <br><br><div style="float: left;width: 50%;"> 
    <div style=" border:1px solid black;
            border-radius: 6px;width: 95%;padding: 5px">
        Nom SOCIETE : <p style="display: inline"><b> G-stock </b></p></div><br>
        @foreach ($achat as $act)
    <div style=" border:1px solid black;
            border-radius: 6px;width: 95%;padding: 5px"> Bon de commande N° : <p style="display: inline"></p> <b>{{$act->id}}</b></div><br>
        </div> 
        @endforeach  
    </div>
        <table id="t1" style="width:100%;border: 1px solid black;border-collapse: collapse;">
            <caption style="border: 1px solid black;border-radius: 6px;padding: 5px;margin-bottom: 20px;">FACTURE N° : {{$facture}} </caption><br>
            
        <tr>
            <th style="background-color: black;color: white;border: 1px solid black;">Produit</th>
            <th style="background-color: black;color: white;border: 1px solid black;">Quantité</th>
            <th style="background-color: black;color: white;border: 1px solid black;">Date achat</th>
        </tr>
        @foreach ($achat as $act)
        <tr style="text-align: center">
            <td style="border-left: 1px solid black;">{{$act->produit->design_produit}}</td>
            <td style="border-left: 1px solid black;">{{$act->qte_achat}}</td>
            <td style="border-left: 1px solid black;">{{ date('j/m/Y',strtotime($act->created_at)) }}</td>
        </tr>
        @endforeach

        </table><br><br>
        
       
         <table style="float:right;border: 1px solid black;border-radius: 10px;">
            <tr>
            <th>NEt a Payer</th></tr>
            @foreach ($achat as $act)
           <tr>
            <td style="border-top: 1px solid black;height: 40px;text-align: center;"><strong>{{$act->montant}} DH</strong></td>
           </tr>
           @endforeach
            </table><br><br><br><br>
        <br>
    <div style="border: 1px solid black;text-align: center;padding-bottom: 10px;"><u>ARRETEE LA PRESENTE FACTURE A LA SOMME DE :</u><br><br>
        @php
            foreach ($achat as $act) {
                
                echo "<b>".NumConvert::word($act->montant)."</b>";
            }
        @endphp 
        </div>
        <br>
        <div style="border: 2px solid black;">
        </div>
    </body>
</html>