<?php include __DIR__ . '/components/head.php'; ?>
<?php include __DIR__ . '/components/header.php'; ?>  
  
  
  <main id="main">

    

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Separador de CSV</li>
        </ol>
        <h2>Separador de CSV</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>


    <h1>Dividir e Salvar em .zip</h1>

    <!-- Input para carregar a planilha CSV -->
    <input type="file" id="fileInput" accept=".csv">

    <!-- Input para especificar o número de divisões -->
    <label for="numDivisoes">Número de Divisões:</label>
    <input type="number" id="numDivisoes" min="1">

    <!-- Botão para iniciar a divisão e salvar em .zip -->
    <button id="splitButton">Dividir e Salvar em .zip</button>

    <!-- Div para exibir as partes divididas -->
    <div id="result"></div>

    <script>
        document.getElementById('splitButton').addEventListener('click', function () {
            const fileInput = document.getElementById('fileInput');
            const numDivisoes = parseInt(document.getElementById('numDivisoes').value);

            if (numDivisoes <= 0) {
                alert('Número de divisões inválido');
                return;
            }

            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const reader = new FileReader();

                reader.onload = function (e) {
                    const content = e.target.result;
                    const lines = content.split('\n');
                    const linesPerPart = Math.ceil(lines.length / numDivisoes);

                    let parts = [];
                    for (let i = 0; i < numDivisoes; i++) {
                        const startIndex = i * linesPerPart;
                        const endIndex = startIndex + linesPerPart;
                        parts.push(lines.slice(startIndex, endIndex).join('\n'));
                    }

                    const zip = new JSZip();
                    parts.forEach((part, index) => {
                        zip.file(`parte${index + 1}.csv`, part);
                    });

                    zip.generateAsync({ type: 'blob' }).then(function (blob) {
                        saveAs(blob, 'partes.zip');
                    });

                    // Exibir mensagem de sucesso
                    const resultDiv = document.getElementById('result');
                    resultDiv.innerHTML = 'Partes divididas e salvas em partes.zip!';
                };

                reader.readAsText(file);
            } else {
                alert('Selecione um arquivo para dividir.');
            }
        });
    </script>
    <p>

    </p>
  </main><!-- End #main -->

<?php include __DIR__ . '/components/footer.php'; ?>
