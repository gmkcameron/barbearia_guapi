<?php
// Verifica se o mapa já foi incluído
if (!isset($mapa_incluido)) {
    $mapa_incluido = true;
?>
    <?php include 'includes/header.php'; ?>

    <section>
        <h2>Localização</h2>
        <p>Localizado na Rua Q, lote 18, quadra 91, Guapimirim-RJ</p>
    </section>

    <!-- Mapa com a localização marcada -->
    <div style="text-align: center;">
        <iframe width="600" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-42.99944%2C-22.5715%2C-42.99812%2C-22.57079&amp;layer=mapnik&amp;marker=-22.57114%2C-42.99878" style="border: 1px solid black"></iframe><br /><small><a href="https://www.openstreetmap.org/way/752874142#map=18/-22.57114/-42.99878">Ver mapa ampliado</a></small>
    </div>

    <?php include 'includes/footer.php'; ?>
<?php
}
?>
