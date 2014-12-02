<?php defined('coursework') or die('Access denied'); ?>

		<div class="content">
        <?php echo $_SESSION['answer'];
		unset($_SESSION['answer']);
		?>
			<h2>Пользователи</h2>
			<table class="tabl" cellspacing="1">
			  <tr>
				<th class="number">id</th>
				<th class="str_name">ФИО</th>
				<th class="str_sort">Логин</th>
                <th class="str_sort">Пароль</th>
                <th class="str_sort">Телефон</th>
                <th class="str_sort">Адрес</th>
                <th class="str_sort">E-mail</th>
				<th class="str_action">Действие</th>
			  </tr>
			  <tr>
              <?php $i = 1; ?>
				<?php foreach($users as $item): ?>
				<td><?=$i;?></td>
				<td class="name_page"><?=$item['fio'];?></td>
                <td><?=$item['login'];?></td>
                <td><?=$item['password'];?></td>
                <td><?=$item['phone'];?></td>
                <td><?=$item['address'];?></td>
				<td><?=$item['email'];?></td>
				<td><a href="?view=edit_user&amp;id_user=<?=$item['id_user'];?>" class="edit">изменить</a>&nbsp; | &nbsp;<a href="?view=del_user&amp;id_user=<?=$item['id_user'];?>" class="del">удалить</a></td>
			  </tr>
              <?php $i++; ?>
				<?php endforeach; ?>  
			</table>
			<!-- <a href="?view=add_user" class="eddelement">Добавить пользователя</a> -->

		</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>
	