<!DOCTYPE html>
<?php
include_once "header.php";
?>
        <section id="entradas">
            
        

<?php

forEach($resultado as $fila) {
?>
            <article class="resumen">
                <header class="info-resumen">
                    <h2><a href="/blog/posts/<?php echo $fila['url']; ?>"><?php echo $fila['titulo']?></a></h2>
                    <div class="info-cabecera">Fecha: <?php echo $fila['fecha_pub'] ?>. Autor: <a href="#" class="autor"><?php echo $fila['nombre']?></a>. <a href="#" class="categorias">Soleda Etla</a>.</div>
                    
                </header>
                <div class="contenido">
                    <p>
                        <?php /* Aquí va un resumen */?>
                    </p>
                </div>
            </article>
<?php
}

?>
          
<p>Código en c</p>
<pre><code class="language-c">#include &lt;iostream&gt;

int main(int argv, int argc) {
    printf("%s\n", "hola mundo");
}
</code></pre>

<p>Código en Java</p>
<pre><code class="language-java">public class Imprimir {
    public void static void main(String[] args) {
        System.out.println("hola perra, ¿Cómo estas?");
    }
}
</code></pre>

        </section>
<?php
include_once "footer.php";
?>