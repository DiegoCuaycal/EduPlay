<style>
  .text-justify {
    text-align: justify;
  }

  .contact-info {
    text-align: left;
  }

  .footer .row {
    display: flex;
    justify-content: space-between;
    /* Asegura que las columnas estén separadas a ambos lados */
    align-items: flex-start;
    /* Alinea las columnas al inicio verticalmente */
  }

  .footer .col-lg-5 {
    flex-basis: 45%;
    /* Asegura que ambas columnas ocupen espacio equilibrado */
  }

  /* Para mejorar la alineación del texto de contacto */
  .contact-info p {
    margin-bottom: 0.5rem;
    /* Espaciado entre los elementos de contacto */
  }

  /* Ajuste adicional para dispositivos más pequeños */
  @media (max-width: 768px) {
    .footer .row {
      flex-direction: column;
      /* Hace que las columnas sean verticales en pantallas pequeñas */
    }

    .footer .col-lg-5 {
      flex-basis: 100%;
      /* Ocupa todo el ancho en pantallas pequeñas */
      text-align: center;
      /* Centra el texto en pantallas pequeñas */
    }

    .contact-info {
      text-align: center;
      /* También centra los contactos en pantallas pequeñas */
    }
  }
</style>

<footer class="footer py-5" style="background-color: #e9ecef; margin-top: 3rem;">
  <div class="container">
    <div class="row">
      <!-- Sección de Descripción -->
      <div class="col-lg-5 mb-4 text-justify"> <!-- Añadido text-justify -->
        <h5 class="text-center">Gamificación en la Enseñanza TIC</h5>
        <p>Este proyecto tiene como objetivo desarrollar una herramienta educativa interactiva que permita evaluar los
          conocimientos de los estudiantes de forma dinámica y entretenida. La plataforma ofrecerá a los profesores la
          capacidad de crear preguntas y realizar evaluaciones en tiempo real, promoviendo un aprendizaje más
          participativo y atractivo</p>
      </div>

      <!-- Sección de Contacto -->
      <div class="col-lg-5 mb-4 contact-info"> <!-- Añadido contact-info -->
        <h5 class="text-center">Contáctanos</h5>
        <p><i class="fas fa-envelope"></i> info@utn.edu.ec</p>
        <p><i class="fas fa-phone"></i> +593 06 2997800</p>
        <p><i class="fas fa-map-marker-alt"></i> Av. 17 de julio 5-21, Ibarra, Ecuador</p>
      </div>
    </div>

    <!-- Redes Sociales -->
    <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
      <a href="https://x.com/UTN_Ibarra" target="_blank" class="text-secondary me-xl-4 me-4">
        <span class="text-lg fab fa-twitter" aria-hidden="true"></span>
      </a>
      <a href="https://www.facebook.com/FECYTUTN/" target="_blank" class="text-secondary me-xl-4 me-4">
        <span class="text-lg fab fa-facebook" aria-hidden="true"></span>
      </a>
      <a href="https://www.instagram.com/utn_ec/" target="_blank" class="text-secondary me-xl-4 me-4">
        <span class="text-lg fab fa-instagram" aria-hidden="true"></span>
      </a>
      <a href="https://www.youtube.com/user/canalutnuniversity" target="_blank" class="text-secondary me-xl-4 me-4">
        <span class="text-lg fab fa-youtube" aria-hidden="true"></span>
      </a>
    </div>
  </div>
</footer>

<!-- Sección de Copyright -->
<div class="copyright-section" style="background-color: #adb5bd; width: 100%; padding: 10px 0; margin-top: 0;">
  <div class="container text-center">
    <p class="mb-0 text-dark">&copy; 2024 Gamificación TIC. Todos los derechos reservados.</p>
  </div>
</div>