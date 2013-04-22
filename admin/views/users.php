<h1>Users</h1>
<hr>
<p>
	<a href="<?PHP echo base_url('admin/user_add.php') ?>" class="button buttrans bluebut"> Add user</a>
</p>

<table>
 <tr>
  <th>Username</th>
  <th>User role</th>
  <th>name</th>
  <th>surname</th>
  <th>email</th>
  <th></th>
</tr>
<?PHP foreach ($users as $user): ?>
 <tr>
  <td><?PHP echo $user['username'] ?></td>
  <td><?PHP echo user_role_name($user['level']) ?></td>
  <td><?PHP echo $user['name'] ?></td>
  <td><?PHP echo $user['surname'] ?></td>
  <td><?PHP echo $user['email'] ?></td>
  <td><a href="<?PHP echo base_url('admin/user_edit.php').'?username='.$user['username'] ?>">Edit</a> 
  	<a href="<?PHP echo base_url('admin/user_delete.php').'?username='.$user['username'] ?>">Delete</a></td>
 </tr>
<?PHP endforeach; ?>
</table>

