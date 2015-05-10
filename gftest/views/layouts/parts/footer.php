<footer class="footer">
    <p> &COPY; Nikolay Velhev 2015</p>
</footer>
</div> <!-- /container -->


<!-- Latest compiled and minified JavaScript -->
<script src="/js/bootstrap.min.js"></script>
<?php foreach ($this->scripts as $scripts): ?> 
      <script src="/js/<?= $scripts ?>.js"></script>
  <?php endforeach; ?>
</body>
</html>
