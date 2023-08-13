<!DOCTYPE html>
<html>
<head>
    <title>Text Analysis Tool</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

        <header>
            <div class="container">
                <h1>Text Analysis Tool</h1>
            </div>
        </header>

        <main>

        <div class="container wrapper">
            <div class="left">
            <h1 class="top-counter"><span class="word">0</span> words <span class="char">0</span> characters</h1>

              <form method="post" enctype="multipart/form-data" class="analysis-form">
    <h2 class="form-title">Text Input</h2>
    <textarea class="form-control input-text" name="input_text" placeholder="Paste or type your text here..." id="inputText"><?php echo isset($_POST['input_text']) ? htmlspecialchars($_POST['input_text']) : ''; ?></textarea>
    <div class="button-section">
        <button type="button" class="action-button btn btn-primary" id="clearButton">Clear</button>
        <button type="button" class="action-button btn btn-primary" id="copyButton">Copy</button>
        <button type="button" class="action-button btn btn-primary" id="pasteButton">Paste</button>
        <button type="button" class="action-button btn btn-primary" id="uppercase">Convert to UpperCase</button>
        <button type="button" class="action-button btn btn-primary" id="lowercase">Convert to LowerCase</button>
        <button type="submit" name="analyze_text" class="analyze-button btn btn-primary">Analyze Text</button>
        <button type="button" class="action-button btn btn-primary" id="saveButton">Save</button>
    </div>

    <div class="input-section">
        <div class="input-box">
            <input type="text" name="url" placeholder="Enter URL to analyze" value="<?php echo isset($_POST['url']) ? htmlspecialchars($_POST['url']) : ''; ?>" class="input-url">
        </div>
        <div class="input-box">
            <input type="file" name="uploaded_file" class="input-file">
        </div>
    </div>

</form>
</div>

<div class="right">
<div class="accordion p-0" id="accordionExample">
  <div class="accordion-item p-0">
    <h2 class="accordion-header p-0">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Details
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse show p-0" data-bs-parent="#accordionExample">

      <div class="accordion-body p-0">
        <ul class="list">
            <li><p>Words</p> <span class="word">0</span></li>
            <li><p>Characters</p> <span class="char">0</span></li>
            <li><p>Sentences</p> <span class="sentence">0</span></li>
            <li><p>Paragraphs</p> <span class="para">0</span></li>
            <li><p>Reading Time</p> <span class="reading">0</span></li>
            <li><p>Speaking Time</p> <span class="speaking">0</span></li>
        </ul>
      </div>

    </div>
  </div>
</div>
</div>
    </div>


            <div class="analysis-results">
                <?php
                if (isset($_POST['analyze_text'])) {
                    include 'text_analysis.php';
                }
                 if (!empty($url)) {
            $fetchedContent = file_get_contents($url);
            $sanitizedContent = strip_tags($fetchedContent);
            $inputText .= " " . $sanitizedContent;
        }

        $wordCount = countWords($inputText);
        $charCount = countCharacters($inputText);
        $sentenceCount = countSentences($inputText);
        $paragraphCount = countParagraphs($inputText);
        $averageLength = averageWordLength($inputText);
        $commonWords = mostCommonWords($inputText, 5);
        $readingTime = readingTime($inputText);
        $speakingTime = speakingTime($inputText);

        echo "<h2>Analysis Results:</h2>";
        echo "<p>Word count: $wordCount</p>";
        echo "<p>Character count: $charCount</p>";
        echo "<p>Sentence count: $sentenceCount</p>";
        echo "<p>Paragraph count: $paragraphCount</p>";
        echo "<p>Average word length: $averageLength</p>";

        echo "<h3>Most Common Words:</h3>";
        echo "<ul>";
        foreach ($commonWords as $word => $freq) {
            echo "<li>$word: $freq</li>";
        }
        echo "</ul>";

        echo "<p>Estimated reading time: $readingTime minutes</p>";
        echo "<p>Estimated speaking time: $speakingTime minutes</p>";
                ?>
              
            </div>
</main>


</body>
</html>
