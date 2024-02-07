<?php include __DIR__ . '/components/head.php'; ?>
<?php include __DIR__ . '/components/header.php'; ?>

<body>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Portfolio Desenvolvimento</li>
        </ol>
        <h2>HTMLIZER</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/portfolio-details/portfolio-htmlizer.png" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Informação do Projeto</h3>
              <ul>
                <li><strong>Categoria</strong>: Desenvolvimento</li>
                <li><strong>Ferramentas</strong>: HTMLIZER</li>
                <li><strong>Github</strong>: <a href="https://github.com/mv-taliani/htmlizer">https://github.com/mv-taliani/htmlizer</a></li>
              </ul>

            </div>
            <div class="portfolio-description">
              <h2>Como funciona ?</h2>
              <p>
                Gerador de HTML automatico com python
                    <p>
                      • Escreve HTML de forma rapida;
                    </p>
                    <p>
                      • String viram paragrafos;
                    </p>
                    <p>
                      • Dict transforma em propriedade do HTML;
                    </p>
                    <p>
                      • Renderiza campos com o WTForms;
                    </p>
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

 
</body>

<?php include __DIR__ . '/components/footer.php'; ?>