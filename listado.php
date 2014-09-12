<?php 
	if(isset($_SESSION['listado'])){
		$listado = $_SESSION['listado'];
	}
	else 
	{
		$listado = [];
	}

?>

<div class="row clearfix">
		<div class="col-md-12 column">
			<table class="table">
				<thead>
					<tr>
						<th>
							ID
						</th>
						<th>
							Apellido
						</th>
						<th>
							Nombre
						</th>
						<th>
							Edad
						</th>
						<th>
							
						</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($listado)>0): ?>
						<?php foreach($listado as $fila): ?>
							<tr>
								<td>
									<?php echo $fila['id']; ?>
								</td>
								<td>
									<?php echo $fila['apellido']; ?>
								</td>
								<td>
									<?php echo $fila['nombre']; ?>
								</td>
								<td>
									<?php echo $fila['edad']; ?>
								</td>
								<th>
									<a href="controller/controller.php?op=edit&row=<?php echo $fila['id'] ?>"> <i class="glyphicon glyphicon-edit"></i> </a>
                                                                        <a href="controller/controller.php?op=remove&row=<?php echo $fila['id'] ?>" onclick="return confirm('realmente desea eliminar este cliente?');"> <i class="glyphicon glyphicon-trash"></i> </a>
								</th>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<td colspan = "4"> NO HAY DATOS </td>
					<?php endif; ?>
						
				
				</tbody>
			</table>
		</div>
	</div>