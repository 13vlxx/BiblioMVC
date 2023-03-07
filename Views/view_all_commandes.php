Résultat de votre recherche :
<br />


<table class='table table-bordered table-responsive-md bg_table'>
	<thead>
		<tr>
			<th>Id commande</th>
			<th>Id livre</th>
			<th>Id_client</th>
			<th>Id_fournisseur</th>
			<th>auteur_livre</th>
			<th>titre_livre</th>
			<th>rsociale_fournisseur</th>
			<th>date_achat</th>
			<th>prix_achat</th>
			<th>nbr_exemplaires</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($commandes as $c): ?>
			<tr>
				<td>
					<?= $c->Id_commande ?>
				</td>
				<td>
					<?= $c->Id_livre ?>
				</td>
				<td>
					<?= $c->Id_client ?>
				</td>
				<td>
					<?= $c->Id_fournisseur ?>
				</td>
				<td>
					<?= $c->auteur_livre ?>
				</td>
				<td>
					<?= $c->titre_livre ?>
				</td>
				<td>
					<?= $c->rsociale_fournisseur ?>
				</td>
				<td>
					<?= $c->date_achat ?>
				</td>
				<td>
					<?= $c->prix_achat ?>
				</td>
				<td>
					<?= $c->nbr_exemplaires ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>