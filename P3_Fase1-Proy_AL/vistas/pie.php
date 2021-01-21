</section>
    </main>
    <footer>

        <a href="#">Condiciones legales</a>
        <a href="#">Cookies</a>
        <a href="#">Privacidad</a>

        <p>Lognisa SL Corporation</p>
        
        <p class="copyright">
            &copy;
            <?php
            setlocale(LC_TIME, 'Spanish');
            $fecha = strftime("%A, %d  %B %Y");
            echo utf8_encode($fecha);
            ?> Todos los derechos reservados
        </p>
        

    </footer>
</body>

</html>