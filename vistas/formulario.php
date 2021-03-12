<label for="titulo">Titulo</label>
        <br>
        <input type="text" name="titulo" value="<?php echo $titulo; echo $resultado[0]['titulo'] ?? '';?>" required>
        <br>

        <label for="contenido">Contenido</label>
        <br>
        <textarea name="contenido" required>
        <?php echo $resultado[0]['contenido'] ?? '';?>
        </textarea>
        <br>

        <label for="descripcion">Descripcion</label>
        <br>
        <textarea name="descripcion" id="" required>
        <?php echo $resultado[0]['descripcion'] ?? '';?>
        </textarea>
        <br>

        <label for="fecha">Fecha</label>
        <br>
        <input type="date" name="fecha" id="" required></input>
        <br>

        <label for="url">Url</label>
        <br>
        <input type="text" name="url" value="<?php echo $resultado[0]['url'] ?? '';?>" required>
        <input type="submit">