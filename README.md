# GROUPE11
<!DOCTYPE html>
<html>
   <head>
      <title>Créer un compte A</title>
      <meta charset="utf-8">
   </head>
   <body>
      <h2>Créer un compte A</h2>
      <form action="DataBaseA.php" method="post">

         <table>
            
            <tr>
               <td>Nom:</td>
               <td><input type="text" name="Nom"></td>
            </tr>
            <tr>
               <td>Prenom:</td>
               <td><input type="text" name="Prenom"></td>
            </tr>
            <tr>
               <td>Identifiant:</td>
               <td><input type="text" name="Identifiant"></td>
            </tr>
            <tr>
               <td>Email:</td>
               <td><input type="text" name="Email"></td>
            </tr>
            <tr>
               <td>Mot de passe:</td>
               <td><input type="password" name="MDP"></td>
               
            </tr>
            <tr>
               <td>VilleU:</td>
               <td><input type="text" name="VilleU"></td>
            </tr>
            <tr>
               <td>Code postaleU:</td>
               <td><input type="text" name="CPU"></td>
            </tr>
            <tr>
               <td>AdresseU:</td>
               <td><input type="text" name="AdresseU"></td>
           
            </tr>
            <tr>
               <td>VilleL:</td>
               <td><input type="text" name="VilleL"></td>
            </tr>
            <tr>
               <td>Code postaleL:</td>
               <td><input type="text" name="CPL"></td>
            </tr>
            <tr>
               <td>AdresseL:</td>
               <td><input type="text" name="AdresseL"></td>
           
            </tr>
            <tr>
               <td>Type de carte:</td>
				<td> <SELECT name="TypeC" size="1">
				<OPTION>Visa
				<OPTION>Master card
				<OPTION>American Express
				</SELECT> </td>
            </tr>
            <tr>
               <td>Numero carte:</td>
               <td><input type="text" name="NumeroCarte"></td>
            </tr>
            <tr>
               <td>Nom carte:</td>
               <td><input type="text" name="NomCarte"></td>
            </tr>
            <tr>
               <td>Date expiration:</td>
               <td><input type="text" name="DateExpiration"></td>
            </tr>
            <tr>
               <td>Code de sécurité:</td>
               <td><input type="text" name="CodeSecu"></td>
            </tr>
            <tr>
               <td colspan="2" align="center">
                  <input type="submit" name="button2" value="Ajouter">
               </td>
            </tr>
         </table>
      </form>
   </body>
</html>
