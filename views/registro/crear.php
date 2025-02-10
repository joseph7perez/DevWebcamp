<main class="registro">
    <h2 class="registro-heading"><?php echo $titulo; ?></h2>
    <p class="registro-descripcion">Elige el plan de tu referencia</p>

    <div class="paquetes-grid">
        <div class="paquete">
            <h3 class="paquete-nombre">Pase Gratis</h3>
            <ul class="paquete-lista">
                <li class="paquete-elemento">Acceso Virtual</li>
            </ul>
            <p class="paquete-precio">$0</p>

            <form action="/finalizar-registro/gratis" method="post">
                <input type="submit" class="paquetes-submit" value="Inscripción gratis"> 
            </form>
        </div>

        <div class="paquete">
            <h3 class="paquete-nombre">Pase Presencial</h3>
            <ul class="paquete-lista">
                <li class="paquete-elemento">Acceso Presencial</li>
                <li class="paquete-elemento">Acceso a talleres y conferencias</li>
                <li class="paquete-elemento">Acceso a las grabaciones</li>
                <li class="paquete-elemento">Pase por 2 dias</li>
                <li class="paquete-elemento">Alimentacion</li>
                <li class="paquete-elemento">Camiseta</li>
            </ul>
            <p class="paquete-precio">$199</p>

            <style>.pp-6V8G96URB4TWE{text-align:center;border:none;border-radius:0.25rem;min-width:11.625rem;padding:1.5rem 2rem;font-weight:bold;background-color:#0551b5;color:#ffffff;font-family:"Helvetica Neue",Arial,sans-serif;font-size:1.6rem;line-height:1.25rem;cursor:pointer;}</style>
            <form action="https://www.sandbox.paypal.com/ncp/payment/6V8G96URB4TWE" method="post" target="_blank" style="display:grid;justify-content:center;align-content:start;gap:1rem;">
                <input class="pp-6V8G96URB4TWE" type="submit" value="Comprar ahora" />
                <img src=https://www.paypalobjects.com/images/Debit_Credit_APM.svg alt="cards" />
                <section> Con la tecnología de <img src="https://www.paypalobjects.com/paypal-ui/logos/svg/paypal-wordmark-color.svg" alt="paypal" style="height:0.875rem;vertical-align:middle;"/></section>
            </form>
        </div>

        <div class="paquete">
            <h3 class="paquete-nombre">Pase Virtual</h3>
            <ul class="paquete-lista">
                <li class="paquete-elemento">Acceso Virtual</li>
                <li class="paquete-elemento">Enlace a talleres y conferencias</li>
                <li class="paquete-elemento">Acceso a las grabaciones</li>
                <li class="paquete-elemento">Pase por 2 dias</li>
            </ul>
            <p class="paquete-precio">$49</p>
        </div>
    </div>
</main>