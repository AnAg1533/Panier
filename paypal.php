
<!--PAYPAL-->
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input name="amount" type="hidden" value=<?php echo montant_global(); ?> /> <!-- Indication du montant HT du panier ou TTC si la TVA n'est pas détaillée  -->
    <input name="currency_code" type="hidden" value="EUR" /><!-- Indication de la devise  -->
    <input name="shipping" type="hidden" value="transport" /><!-- Indication du montant des frais de port  -->
    <input name="tax" type="hidden" value=<?php echo $taxes; ?> /><!--  Indication du montant de la TVA (ou 0.00)  -->
  <!--    Indication de l'URL de retour automatique  -->
    <input name="return" type="hidden" value="https://panier.000webhostapp.com/LabPanierr/ipn.php" />  <!--PARAMETRAGE DU SITE ! COLLER LE LIEN ICI-->
    <!-- /* Indication de l'URL de retour si annulation du paiement */ -->
    <input name="cancel_return" type="hidden" value="" />
    <!-- /* Indication de l'URL de retour pour contrôler le paiement */ -->
    <input name="notify_url" type="hidden" value="https://panier.000webhostapp.com/LabPanierr/ipn.php" />
  <!--   /* Indication du type d'action */ -->
    <input name="cmd" type="hidden" value="_xclick" />
    <!-- /* Indication de l'adresse e-mail test du vendeur (a remplacer par l'e-mail de votre compte Paypal en production) */ -->
    <input name="business" type="hidden" value="sb-blvck3812485@business.example.com" />
   <!--  /* Indication du libellé de la commande qui apparaitra sur Paypal */ -->
    <input name="item_name" type="hidden" value="Le texte que vous voulez" />
    <!-- /* Indication permettant à l'acheteur de laisser un message lors du paiement */ -->
    <input name="no_note" type="hidden" value="1" />
   <!--  /* Indication de la langue */ -->
    <input name="lc" type="hidden" value="FR" />
    <!-- /* Indication du type de paiement */ -->
    <input name="bn" type="hidden" value="PP-BuyNowBF" />
   <!--  /* Indication du numéro de la commande (très important) */ -->
    <input name="custom" type="hidden" value="<?php echo $id_commande;?>" />
    <input type="hidden" name="rm" value="2">
   <!--  /* Bouton pour valider le paiement */ -->
  

<input type="hidden" name="hosted_button_id" value="2M4RQKKTW2T8N">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

   
    </div>
