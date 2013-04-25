<h1>Pages</h1>

<form action="<?PHP echo base_url('admin/page_add.php')?>">
	<select name="type">
		<?PHP echo $types; ?> 
	</select>
<input type="submit" value="Create page" />
</form>

<table>
 <tr>
  <th>Name</th>
  <th>Type</th>
  <th></th>
</tr>
<?PHP foreach ($pages as $page): ?>
 <tr>
  <td><?PHP echo $page['name'] ?></td>
  <td><?PHP echo $page['type'] ?></td>
  <td>  <a class="right deleteicon" href="<?PHP echo base_url('admin/page_delete.php').'?id='.$page['id'] ?>"> </a>
        <a class="right editicon" href="<?PHP echo base_url('admin/page_edit.php').'?id='.$page['id'] ?>"> </a>
  </td>
 </tr>
<?PHP endforeach; ?>
</table>