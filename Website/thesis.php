<?php
  include_once 'head.php';
?>

<title>Visualization for Jazz Musicians</title>
<div class="v4j">
    <h1><b>Visualization for Jazz Musicians</b></h1>
    <p>Thesis title for master degree, Interest of music topic, Applied by data visualization</p>
    <hr>
    <h4><b>Yi-Hsin Lu</b></h4>
    <h4><b>Prof. Chen-Hai Andy Tsao</b></h4>
    <h4><b>Master, Applied Mathematics in National Dong Hwa University</b></h4>
    <h4><b>Presentation: <a href="https://yihsinlu.github.io/Jazz.io/OralExam20230613.html" style="color: #DB7093;">Oral Exam<span style="color: #DB7093;">, </span>
    <a href="https://yihsinlu.github.io/Jazz.io/JazzVisaul_2023STSC.html" style="color: #DB7093;">Conference (32nd STSC)</a></b></h4>
    <h4><b>Thesis: <a href="https://yihsinlu.github.io/yhlu.io/PDF/Visualization4JazzMusicians.pdf" style="color: #DB7093;">01.pdf</a></b></h4>
    <hr/>
    <h3><b>Abstract</b></h3>
    <p style="text-align: left;">We created jazz musician maps that displayed the similarities between musicians in terms of instruments, genres, and active years. For jazz musician data visualization, we selected 229 musicians associated with Wynton Marsalis and Roy Hargrove and used their instruments, genres, and active years as variables. We separated the data matrix by variable and turned each into an affinity matrix, and then we combined all of the affinity matrices and utilized PCA and t-SNE to reduce the matrix to two dimensions, resulting in jazz musician maps that were more informative than Linked Jazz. When we colored by variables, the instruments and genres were multi-value variables, meaning the musicians played more than one instrument or genre. Therefore, we presented that utilized the three primary colors of the CMYK color system to represent three groups and then tuned the color based on the number of each group to be the progressing method of coloring.</p>
    <hr />
    <h2><b><a href="https://yihsinlu.github.io/Jazz.io/JazzMusicianMaps/JazzMusicianMaps.html" style="color: #DB7093;">Results</a></b></h2>
    <p><b>Points are musicians, Color by instruments, Distance are similarities based on mainly instruments, genres, and active years</b></p>
    <img src="figures/visual4jazz/4tSNE_instruments_color.png" style="width:90%;">
    <hr />
    <p><b>Genres</b></p>
    <img src="figures/visual4jazz/4PCA_genres_color.png" style="width:90%;">
    <hr />
    <p><b>Active years = Width * Midian of active decades</b></p>
    <img src="figures/visual4jazz/4tSNE_lenactiveyears.png" style="width:50%;"><img src="figures/visual4jazz/4tSNE_midactiveyears.png" style="width:50%;">
</div>




</body>




</div>
<?php
  include_once 'footer.php';
?>