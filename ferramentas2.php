<?php include __DIR__ . '/components/head.php'; ?>
<?php include __DIR__ . '/components/header.php'; ?>  
  
  
  <main id="main">

  <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Mesclar CSV</li>
        </ol>
        <h2>Mesclar CSV</h2>

      </div>
    </section><!-- End Breadcrumbs -->

<body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <h1>Juntar e Salvar em .zip</h1>
    
    <!-- Input para carregar as planilhas CSV -->
    <input type="file" id="fileInput" accept=".csv" multiple>
    
    <!-- Botão para iniciar a junção e salvar em .zip -->
    <button id="mergeButton">Juntar e Salvar em .zip</button>

    <script>
        document.getElementById('mergeButton').addEventListener('click', function () {
            const fileInput = document.getElementById('fileInput');
            const mergedData = new JSZip();

            if (fileInput.files.length === 0) {
                alert('Selecione pelo menos uma planilha para juntar.');
                return;
            }

            const promises = [];
            for (const file of fileInput.files) {
                const promise = new Promise((resolve, reject) => {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const content = e.target.result;
                        const fileName = file.name;
                        mergedData.file(fileName, content);
                        resolve();
                    };

                    reader.readAsText(file);
                });

                promises.push(promise);
            }

            Promise.all(promises).then(() => {
                // Gere o arquivo ZIP
                mergedData.generateAsync({ type: 'blob' }).then(function (blob) {
                    // Salve o arquivo ZIP
                    saveAs(blob, 'planilhas_unidas.zip');
                });
            });
        });
    </script>
</body>
  </main><!-- End #main -->

<?php include __DIR__ . '/components/footer.php'; ?>
