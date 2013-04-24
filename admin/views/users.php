<h1>Users</h1>
<hr>
<p>
	<a href="<?PHP echo base_url('admin/user_add.php') ?>" class="button buttrans greenbut"><img class="icon" src="images/icons/add.png" alt="" /><span>Add user</span></a>
</p>

<table>
 <tr>
  <th>Username</th>
  <th>User role</th>
  <th>Name</th>
  <th>Surname</th>
  <th>E-mail</th>
  <th></th>
</tr>
<?PHP foreach ($users as $user): ?>
 <tr>
  <td><?PHP echo $user['username'] ?></td>
  <td><?PHP echo user_role_name($user['level']) ?></td>
  <td><?PHP echo $user['name'] ?></td>
  <td><?PHP echo $user['surname'] ?></td>
  <td><?PHP echo $user['email'] ?></td>
  <td>  <a class="right deleteicon" href="<?PHP echo base_url('admin/user_delete.php').'?username='.$user['username'] ?>"> </a>
        <a class="right editicon" href="<?PHP echo base_url('admin/user_edit.php').'?username='.$user['username'] ?>"> </a>
  </td>
 </tr>
<?PHP endforeach; ?>
</table>

