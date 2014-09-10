<div class="row clearfix">

    <div class="col-md-12 column">
        <?php if (isset($conf)): ?>
            <div class="alert alert-dismissable alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Cliente guardado correctamente</strong> 
            </div>
        <?php endif; ?>
        <?php if (isset($err)): ?>
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>El cliente no se guardo</strong> 
            </div>
        <?php endif; ?>
        <form role="form" method="POST" action = "controller/controller.php">

            <input type="hidden" name="formulario" value="nuevo">
            <div class="form-group">
                <label for="Apellido">Apellido</label><input type="text" class="form-control" name="apellido" placeholder="Ingrese un Apellido" required />
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label><input type="text" class="form-control" name="nombre" placeholder="Ingrese un nombre" required />
            </div>
            <div class="form-group">
                <label for="edad">Edad</label><select  class="form-control" name="edad">
                    <option value="">Seleccione Edad</option>
                    <?php for ($i = 1; $i < 100; $i++) : ?>
                        <option value="<?php echo $i ?>" ><?php echo $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
     <button type="submit" class="btn btn-primary pull-right">Guardar</button>
</form>
</div>
</div>