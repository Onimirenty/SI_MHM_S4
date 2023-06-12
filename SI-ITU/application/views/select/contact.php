<?php
 // On récupère tous les contacts
 $query = $this->db->get('Contact');
 $contacts = $query->result();

 // On affiche les contacts dans un tableau
?>
<div class="container">
 <div class="card mt-5">
   <div class="card-header">
     <h2>CONTACT</h2>
   </div>
   <div class="card-body">
     <table class="table table-bordered">
       <tr>
         <th>IDSociete</th>
         <th>Adresse</th>
         <th>telephone</th>
         <th>mail</th>
       </tr>
       <?php foreach($contacts as $contact): ?>
         <tr>
           <td><?php echo $contact->idSociete; ?></td>
           <td><?php echo $contact->adresse; ?></td>
           <td><?php echo $contact->telephone; ?></td>
           <td><?php echo $contact->mail; ?></td>
           <td>
             <a href="<?php echo site_url('update/Update/contact?id='.$contact->id) ?>" class="btn btn-info">Modifier</a>
             <a onclick="return confirm('EST TU SUR DE VOULOIR EFFACER CETTE LIGNE?')" href="<?php echo site_url('delete/Delete/contact?id='.$contact->id) ?>" class='btn btn-danger'>Effacer </a>
           </td>
         </tr>
       <?php endforeach; ?>
     </table>
   </div>
 </div>
</div>
    </section>

    <script src="<?php echo $burl ?>assets/js/script.js"></script>

   
</body>
</html>